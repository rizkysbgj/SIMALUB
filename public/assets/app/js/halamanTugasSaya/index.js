var IDProyek = $("#IDProyek").val();
var IDTugas = $("#IDTugas").val();

//== Class Initialization
jQuery(document).ready(function () {
	// console.log(IDTugas);
	// GetData.TaskList();
	// GetData.TaskDetail(IDTugas);
	
	if(IDTugas != 0)
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

var Ctrl = {
	Select2: function () {
		var milestone = $("#inptMilestone").val();
		var role = 4;
		// if (milestone == 3 || milestone == 9 || milestone == 11 || milestone == 13)
		// 	role = 6;
		// else if (milestone == 6)
		// 	role = 5;
		$.ajax({
			url: "/api/user/list/" + role,
			type: "GET"
		}).done(function (data, textStatus, jqXHR) {
			$("#slsUser").html("<option></option>");
			$.each(data, function (i, item) {
				$("#slsUser").append("<option value='" + item.IDUser + "'>" + item.NamaLengkap + ", Total Pekerjaan : " + item.TotalPekerjaan +"</option>");
			})
			$("#slsUser").select2({ placeholder: "Pilih Satu Nama" });
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
		})
	},
	SelectAdmin: function () {
		var role = 6;
		// if (milestone == 3 || milestone == 9 || milestone == 11 || milestone == 13)
		// 	role = 6;
		// else if (milestone == 6)
		// 	role = 5;
		$.ajax({
			url: "/api/user/list/" + role,
			type: "GET"
		}).done(function (data, textStatus, jqXHR) {
			$("#slsAdministrasi").html("<option></option>");
			$.each(data, function (i, item) {
				$("#slsAdministrasi").append("<option value='" + item.IDUser + "'>" + item.NamaLengkap + ", Total Pekerjaan : " + item.TotalPekerjaan + "</option>");
			})
			$("#slsAdministrasi").select2({ placeholder: "Pilih Administrasi" });
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
		})
	}
}

var Button = {
	Init: function () {
		$(".btn-generate").on("click", function () {
			var Kode = this.id;
			var done = false;
			var params = {
				IDTugas: $("#inptTaskID").val(),
				IDMilestoneTugas: $("#inptMilestone").val(),
				PIC: $("#inptPICID").val(),
				Remark: "",
				IDProyek: $("#inptProjectID").val(),
				Kode: Kode
			};
			
			console.log("e");

			var model = new FormData();
			model.append("IDTugas", params.IDTugas);
			model.append("IDMilestoneTugas", params.IDMilestoneTugas);
			model.append("IDProyek", params.IDProyek);
			model.append("Kode", params.Kode);
			model.append("Remark", params.Remark);

			if (Kode == "MULAI") {
				$(".btn-generate").addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
				model.append("PIC", params.PIC);

				TaskTransaction.Init(model, params);
			}
			else if(Kode == "LAPOR")
			{
				$("#btnSubmit-" + Kode).on("click", function () {
					var Regex;
					var Remark;
					Remark = $("#tbxRemark-" + Kode).val();
					Regex = /(<([^>]+)>)/gi;
					Remark = Remark.replace(Regex, "");

					$('input[type="file"]').each(function($i){
						model.append("Attachment", $(this)[0].files[0]);
					});

					params.Remarks = Remark;
					model.append("Remark", Remark);

					$("#btnSubmit-" + Kode).addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
					TaskTransaction.Lapor(model, params);
					
					done = true;
				});
			}
			else {
				$("#btnSubmit-" + Kode).on("click", function () {
					var fileInput;
					var uploadedFile;
					var Regex;
					var Remark;
					if (!done) {
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

							model.append("PIC", params.PIC);
							model.append("Remark", Remark);
						}
						else if(Kode == "PILIHADMINISTRASI")
						{
							params.PIC = $("#slsAdministrasi").val();
							model.append("PIC", params.PIC);
						}
						else if (Kode == "PILIH") {

							params.PIC = $("#slsUser").val();
							model.append("PIC", params.PIC);

						}
						else if (Kode == "SALAH") {

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

							params.PIC = $("#slsUser").val();

							model.append("PIC", params.PIC);
							model.append("Remark", Remark);
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
		if(IDTugas != 0)
			GetData.TaskDetail(IDTugas);

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
			var link = '/halamanTugasSaya';
			if (Common.CheckError.Object(data) == true) {
				Common.Alert.SuccessRoute("Berhasil", link);
			}
			btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
			btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
		})
	},
	Lapor: function(model, data) {
		var btn = $("#btnSubmit-" + data.Kode);

		btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

		$.ajax({
			url: "/api/lapor",
			type: 'POST',
			data: model,
			dataType: "json",
			contentType: false,
			processData: false
		}).done(function (data, textStatus, jqXHR) {
			console.log(data);
			var link = '/halamanTugasSaya';
			if (Common.CheckError.Object(data) == true) {
				Common.Alert.SuccessRoute("Berhasil Melaporkan", link);
			}
			btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
			btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
		})
	}
}

var GetData = {
	TaskList: function () {
		$("#removeTaskList").addClass('m-loader m-loader--brand').attr('disabled', true);
		var link = "/halamanTugasSaya/TaskList/";
		$.ajax({
			url: link,
			type: 'GET',
			success: function (data) {
				$("#removeTaskList").removeClass('m-loader m-loader--brand').attr('disabled', true);
				$("#removeTaskList").html(data);
			},
			error: function () {
				alert("error");
			}
		});
	},
	TaskDetail: function (IDTugas) {
		$("#detailTask").addClass('m-loader m-loader--brand').attr('disabled', true);
		var link = "/halamanTugasSaya/detailTask/" + IDTugas;
		$.ajax({
			url: link,
			type: "GET",
			// data: { IDTugas: IDTugas },
			success: function (data) {
				$("#detailTask").removeClass('m-loader m-loader--brand').attr('disabled', true);
				$("#detailTask").html(data);
				Function.ChangeFormatDate();
				Button.Init();
				Ctrl.Select2();
				Ctrl.SelectAdmin();
				// Summernote.Init();
				Table.Milestone(IDTugas);
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
};

var Summernote = {
	Init: function () {
		$(".summernote").summernote({
			height: 200,
			paragraph: "justifyLeft"
		})
	}
};

var Table = {
	Milestone: function (IDTugas) {
		t = $("#tabelmemoAnalisis").mDatatable({
			data: {
				type: "remote",
				source: {
					read: {
						url: "/api/memo/" + IDTugas,
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
					field: "TaskID", title: "Actions", sortable: false, textAlign: "center", width: 100, template: function (t) {
						if(t.Attachment != null)
							var strBuilder = '<a href="/api/download/ ' + t.IDTrxTugas + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Download Lampiran"><i class="la la-download"></i></a>\t\t\t\t\t\t';
						else
							var strBuilder = '<a>-</a>\t\t\t\t\t\t';
						return strBuilder;
					}
				},
				{ field: "MilestoneTugas", title: "Milestone", textAlign: "center" },
				{ field: "NamaLengkap", title: "Nama Lengkap", textAlign: "center" },
				{
					field: "WaktuMulai", title: "Waktu Mulai", sortable: false, textAlign: "center", template: function (t) {
						return t.WaktuMulai != null ? Common.Format.Date(t.WaktuMulai) : "-"
					}
				},
				{
					field: "WaktuSelesai", title: "Waktu Selesai", sortable: false, textAlign: "center", template: function (t) {
						return t.WaktuSelesai != null ? Common.Format.Date(t.WaktuSelesai) : "-"
					}
				},
				{ field: "Catatan", title: "Catatan", textAlign: "center", width: 300, sortable: false, template: function (t) {
					if(t.Catatan != null)
						var strBuilder = t.Catatan;
					else
						var strBuilder = '<a>-</a>\t\t\t\t\t\t';
					return strBuilder;
					}
				},
			]
		})
	}
}

var Function = {
	ChangeFormatDate: function () {
		document.getElementById("txtStartPlan").innerHTML = Common.Format.Date(document.getElementById("txtStartPlan").innerHTML);
		document.getElementById("txtEndPlan").innerHTML = Common.Format.Date(document.getElementById("txtEndPlan").innerHTML);
	}
}