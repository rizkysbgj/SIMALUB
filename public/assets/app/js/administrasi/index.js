var IDProyek = null;

jQuery(document).ready(function () {
	// console.log(IDTugas);
	// GetData.ProyekList();
	// GetData.TaskDetail(IDTugas);
	Page.Init();

	$("#minimizeTaskRight").hide();

	$("#minimizeTaskLeft").on("click", function () {
		$("#bebasMinimize").hide();
		$("#detailTask").addClass("col-lg-11");
		$("#removeTaskList").removeClass("col-lg-4");
		$("#minimizeTaskLeft").hide();
		$("#minimizeTaskRight").show();
		$("#sidebarShow").addClass("col-s-1");
		$("#sidebarShow").show();
	});

	$("#minimizeTaskRight").on("click", function () {
		$("#bebasMinimize").show();
		$("#detailTask").removeClass("col-lg-11");
		$("#removeTaskList").addClass("col-lg-4");
		$("#sidebarShow").removeClass("col-s-1");
		$("#sidebarShow").hide();
		$("#minimizeTaskLeft").show();
	});

});

var Button = {
	Init: function() {
		$(".btn-generate").on("click", function (){
			var Kode = this.id;
			var params = {
				IDProyek: $("#inptProjectID").val(),
				Remark: "",
				Kode: Kode
			};

			var model = new FormData();
			model.append("IDProyek", params.IDProyek);
			model.append("Remark", params.Remark);

			if (Kode == "MULAI") {
				$(".btn-generate").addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
				// console.log(params);
				TaskTransaction.Init(model, params);
			}
			else {
				$("#btnSubmit-" + Kode).on("click", function () {
					var Regex;
					var Remark;
					if (Kode == "SELESAI") {

						Remark = $("#tbxRemark-" + Kode).val();
						Regex = /(<([^>]+)>)/gi;
						Remark = Remark.replace(Regex, "");

						params.Remarks = Remark;

						if ($("#tbxRemark-" + Kode).val() == "") {
							Common.Alert.Warning("Please Input Remarks!");
							return false;
						}

						$('input[type="file"]').each(function($i){
							model.append("Attachment", $(this)[0].files[0]);
						  });
						model.append("Remark", Remark);
					}

					$("#btnSubmit-" + Kode).addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
					TaskTransaction.Init(model, params);
				});
			}
		});
	}
}

var TaskTransaction = {
	Init: function(model, data){
		var btn = $("#btnSubmit-" + data.Kode);

		btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

		if (data.Kode == "MULAI" ) {
			btn = $(".btn-generate");
		}

		$.ajax({
			url: "/api/tugas/administrasi",
			type: 'POST',
			data: model,
			dataType: "json",
			contentType: false,
			processData: false
		}).done(function (data, textStatus, jqXHR) {
			console.log(data);
			var link = '/halamanpinnedProjectAdministrasi';
			// Common.Alert.SuccessRoute("success", '/halamanpinnedProject/' + data.IDProyek);
			if (Common.CheckError.Object(data) == true) {
				Common.Alert.SuccessRoute("Berhasil", link);
			}
			btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
			btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
		})

	}
}

var Page = {
	Init: function () {
		GetData.ProyekList();

		//Event
		// $(".TaskOrderBy").on("click", function () {
		// 	var order = (this.id).replace("Order-", "");
		// 	GetData.TaskList(order);
		// });

		$('#showProyek').on('click', '.divShowDetail', function () {
			var IDProyek = this.id;
			$(this).css({ background: "whitesmoke" }).siblings().css({ background: "transparent" });
			$(this).addClass("selected").siblings().removeClass("selected");
			console.log(IDProyek);
			GetData.ProyekDetail(IDProyek);
		});

		
	},
}


var GetData = {
	ProyekList: function () {
		// var link = pageNow == "PinnedProject" ? "/PinnedProject/TaskList" : "/MyTask/MyTaskList"
		var link = "/halamanpinnedProjectAdministrasi/proyekList/";
		$.ajax({
			url: link,
			type: 'GET',
			success: function (data) {
				$("#showProyek").html(data);
				IDProyek = $("#IDProyek").val();
				GetData.ProyekDetail(IDProyek);
			},
			error: function () {
				alert("error");
			}
		});
    },
    ProyekDetail: function (IDProyek) {
		// var link = pageNow == "PinnedProject" ? "/PinnedProject/DetailTask" : "/MyTask/DetailTask"
		var link = "/halamanpinnedProjectAdministrasi/detailProyek/" + IDProyek;
		$.ajax({
			url: link,
			type: "GET",
			// data: { IDTugas: IDTugas },
			success: function (data) {
				$("#detailProyek").html(data);
				Function.ChangeFormatDate();
				Button.Init();
				// Ctrl.Select2();
				// Summernote.Init();
				// Table.Milestone(IDTugas);
				// Table.Worklog(TaskID);
				// Table.History(TaskID);

				$("#minimizeTaskRight").hide();

				$("#minimizeTaskLeft").on("click", function () {
					$("#bebasMinimize").hide();
					$("#detailTask").addClass("col-lg-11");
					$("#removeTaskList").removeClass("col-lg-4");
					$("#minimizeTaskLeft").hide();
					$("#minimizeTaskRight").show();
					$("#sidebarShow").addClass("col-s-1");
					$("#sidebarShow").show();
				});

				$("#minimizeTaskRight").on("click", function () {
					$("#bebasMinimize").show();
					$("#detailTask").removeClass("col-lg-11");
					$("#removeTaskList").addClass("col-lg-4");
					$("#sidebarShow").removeClass("col-s-1");
					$("#sidebarShow").hide();
					$("#minimizeTaskLeft").show();

				});
			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	},
}

var Function = {
	ChangeFormatDate: function () {
		document.getElementById("txtStartPlan").innerHTML = Common.Format.Date(document.getElementById("txtStartPlan").innerHTML);
		document.getElementById("txtEndPlan").innerHTML = Common.Format.Date(document.getElementById("txtEndPlan").innerHTML);
	}
}