// var KeyID = $("#inptKeyID").val(); gausah ini ga dipakek di simalub
// var IDTugas = $("#inptTaskID").val();
// var pageNow = $("#inptPage").val();

// if (TaskID == -1) {
// 	if (pageNow == "PinnedProject")
// 		window.location.href = "/Story/Create/" + ProjectID;
// 	else
// 		$("#containerMyTask").html("<div class='m-content' style='padding-top:10px'><div class='alert alert-success m-alert--default m--align-center' role='alert' style='padding:20px;'><strong>Yay, </strong>you don't have any task right now! </div></div>");
// }
var IDProyek = $("#IDProyek").val();
//== Class Initialization
jQuery(document).ready(function () {
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
	Init: function () {
		$(".btn-generate").on("click", function () {
			var Kode = this.id;
			var done = false;
			var params = {
				IDTugas: $("#inptTaskID").val(),
				IDMilestoneTugas: $("#inptMilestone").val(),
				PIC: $("#inptPICID").val(),
				Catatan: "",
				IDProyek: $("#inptProjectID").val(),
				Kode: Kode
			};
			
			console.log("e");

			var model = new FormData();
			model.append("IDTugas", params.IDTugas);
			model.append("IDMilestoneTugas", params.IDMilestoneTugas);
			model.append("IDProyek", params.IDProyek);
			model.append("Kode", params.Kode);

			if (Kode == "MULAI") {
				$(".btn-generate").addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
				model.append("PIC", params.PIC);

				TaskTransaction.Init(model, params);
			}
			else {
				$("#btnSubmit-" + Kode).on("click", function () {
					var fileInput;
					var uploadedFile;
					var Regex;
					var Remark;
					if (!done) {
						if (Kode == "SELESAI") {
							fileInput = document.getElementById("inputFile");
							uploadedFile = fileInput.files[0];

							Remark = $("#tbxRemark-" + Kode).val();
							Regex = /(<([^>]+)>)/gi;
							Remark = Remark.replace(Regex, "");

							params.Remarks = Remark;

							if ($("#tbxRemark-" + Kode).val() == "") {
								Common.Alert.Warning("Please Input Remarks!");
								return false;
							}

							model.append("Remarks", Remark);
							model.append('Document', uploadedFile);
						}
						else if (Kode == "PILIH") {

							params.PIC = $("#slsUser").val();
							params.ManHours = $("#tbxHours").val();

							if (params.PIC == "" || params.ManHours == "") {
								Common.Alert.Warning("Please Input ManHours!");
								return false;
							}

							model.append("PIC", params.PIC);
							model.append("ManHours", params.ManHours);

						}
						else if (Kode == "FEEDBACK") {
							fileInput = document.getElementById("inputFile");
							uploadedFile = fileInput.files[0];

							Remark = $("#tbxRemark-" + Kode).val();
							Regex = /(<([^>]+)>)/gi;
							Remark = Remark.replace(Regex, "");

							params.Remarks = Remark;

							if ($("#tbxRemark-" + Kode).val() == "") {
								Common.Alert.Warning("Please Input Remarks!");
								return false;
							}

							if (params.TaskMilestoneID == 11 || params.TaskMilestoneID == 13) {
								params.PIC = $("#slsUser").val();
								params.ManHours = $("#tbxHours").val();

								if (params.PIC == "" || params.ManHours == "") {
									Common.Alert.Warning("Please Input ManHours!");
									return false;
								}
								model.append("PIC", params.PIC);
								model.append("ManHours", params.ManHours);
							}
							model.append("Remarks", Remark);
							model.append('Document', uploadedFile);
						}
						console.log(params.Remarks);

						$("#btnSubmit-" + Kode).addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
						TaskTransaction.Init(model, params);
						done = true;
					}
				});
			}
		})
	}
}

var Page = {
	Init: function () {
		GetData.TaskList();

		$('#showTask').on('click', '.divShowDetail', function () {
			var IDTugas = this.id;
			$(this).css({ background: "whitesmoke" }).siblings().css({ background: "transparent" });
			$(this).addClass("selected").siblings().removeClass("selected");
			console.log(IDTugas);
			GetData.TaskDetail(IDTugas);
		});

		
	},
}

var TaskTransaction = {
	Init: function (model, data) {
		var btn = $("#btnSubmit-" + data.Kode);

		btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

		if (data.Kode == "MULAI" ) {
			btn = $(".btn-generate");
		}

		$.ajax({
			url: "/api/pinned",
			type: 'POST',
			data: model,
			dataType: "json",
			contentType: false,
			processData: false
		}).done(function (data, textStatus, jqXHR) {
			console.log(data);
			// var link = '/halamanpinnedProject/' + data.IDProyek;
			// Common.Alert.SuccessRoute("success", '/halamanpinnedProject/' + data.IDProyek);
			// if (Common.CheckError.Object(data) == true) {
			// 	// var link = pageNow == "halamanpinnedProject" ? "/halamanpinnedProject/" + data.IDProyek : "/halamanpinnedProject/"
				var link = "/halamanpinnedProject/" + data.IDProyek;
				Common.Alert.SuccessRoute("Success", link);
			// }
			btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
			btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
		})
	}
}

var GetData = {
	TaskList: function () {
		// var link = pageNow == "PinnedProject" ? "/PinnedProject/TaskList" : "/MyTask/MyTaskList"
		var link = "/halamanpinnedProject/TaskList/" + IDProyek;
		$.ajax({
			url: link,
			type: 'GET',
			success: function (data) {
				$("#showTask").html(data);
			},
			error: function () {
				alert("error");
			}
		});
	},
	TaskDetail: function (IDTugas) {
		// var link = pageNow == "PinnedProject" ? "/PinnedProject/DetailTask" : "/MyTask/DetailTask"
		var link = "/halamanpinnedProject/detailTask/" + IDTugas;
		$.ajax({
			url: link,
			type: "GET",
			// data: { IDTugas: IDTugas },
			success: function (data) {
				$("#detailTask").html(data);
				Function.ChangeFormatDate();
				Button.Init();
				// Ctrl.Select2();
				// Summernote.Init();
				// Table.Milestone(TaskID);
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

var Summernote = {
	Init: function () {
		$(".summernote").summernote({
			height: 200,
			paragraph: "justifyLeft"
		})
	}
};


var Function = {
	ChangeFormatDate: function () {
		document.getElementById("txtStartPlan").innerHTML = Common.Format.Date(document.getElementById("txtStartPlan").innerHTML);
		document.getElementById("txtEndPlan").innerHTML = Common.Format.Date(document.getElementById("txtEndPlan").innerHTML);
	}
}