var IDProyek = $("#IDProyek").val();

jQuery(document).ready(function () {

	if(IDProyek != 0)
		Page.Init();
	else
		$("#proyekbelumsiap").show();

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
	},
	// Download: function(){
	// 	$("#downloadBorang").on("click", function (){
	// 		console.log("lalalal");
	// 		$.ajax({
	// 			url: 'api/exportsertifikat',
	// 			type: 'GET',
	// 			success: function (data) {
	// 				console.log('yoi');
	// 			},
	// 			error: function () {
	// 				alert("error");
	// 			}
	// 		});
	// 	});
	// }
}

var TaskTransaction = {
	Init: function(model, data){
		var btn = $("#btnSubmit-" + data.Kode);

		btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

		if (data.Kode == "MULAI" ) {
			btn = $(".btn-generate");
		}

		console.log(model.get('IDProyek'));

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

		$('#removeTaskList').on('click', '.divShowDetail', function () {
			var IDProyek = this.id;
			console.log("lalala");
			$(this).css({ background: "whitesmoke" }).siblings().css({ background: "transparent" });
			$(this).addClass("selected").siblings().removeClass("selected");
			console.log(IDProyek);
			GetData.ProyekDetail(IDProyek);
		});		
	},
	
}

var Function = {
	ChangeFormatDate: function () {
		if((document.getElementById("txtStartPlan" && "txtEndPlan") ) != null ){
			document.getElementById("txtStartPlan").innerHTML = Common.Format.Date(document.getElementById("txtStartPlan").innerHTML);
			document.getElementById("txtEndPlan").innerHTML = Common.Format.Date(document.getElementById("txtEndPlan").innerHTML);
		}
	}
}

var GetData = {
	ProyekList: function () {
		// var link = pageNow == "PinnedProject" ? "/PinnedProject/TaskList" : "/MyTask/MyTaskList"
		var link = "/halamanpinnedProjectAdministrasi/proyekList/";
		$.ajax({
			url: link,
			type: 'GET',
			success: function (data) {
				$("#removeTaskList").html(data);
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
				// Button.Download();
				Button.Init();
				Table.HasilAnalisis(IDProyek);

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



var Table = {
	HasilAnalisis: function (IDProyek) {
		t = $("#tabelmemoAnalisis").mDatatable({
			data: {
				type: "remote",
				source: {
					read: { 
						url: "/api/tugas/administrasi/hasil/" + IDProyek,
						method: "GET",
						map: function (r) {
							var e = r;
							return void 0 !== r.data && (e = r.data), e;
						}
					}
				},
				pageSize: 10,
				saveState: {
					cookie: true,
					webstorage: true
				},
				serverPaging: false,
				serverFiltering: false,
				serverSorting: false
			},
			layout: {
				scroll: false,
				footer: false
			},
			sortable: true,
			pagination: true,
			toolbar: {
				items: {
					pagination: {
						pageSizeSelect: [10, 20, 30, 50, 100]
					}
				}
			},
			columns: [
				{
					field: "Attachment", title: "Actions", sortable: false, textAlign: "center", width: 100, template: function (t) {
						if(t.Attachment != null)
							var strBuilder = '<a href="/api/download/ ' + t.IDTrxTugas + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Download Lampiran"><i class="la la-download"></i></a>\t\t\t\t\t\t';
						return strBuilder;
					}
				},
				{ field: "InisialTugas", title: "Inisial Tugas", textAlign: "center" },
				{ field: "NamaTugas", title: "Nama Tugas", textAlign: "center" },
				{ field: "NamaLengkap", title: "Nama Pengunggah", textAlign: "center" },
				{
					field: "WaktuSelesai", title: "Waktu Diberikan", sortable: false, textAlign: "center", template: function (t) {
						return t.WaktuSelesai != null ? Common.Format.Date(t.WaktuSelesai) : "-"
					}
				},
				{ field: "Catatan", title: "Catatan", textAlign: "center", width: 100 },
			]
		})
	}
}