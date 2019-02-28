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
var IDTugas = $("#IDTugas").val();

//== Class Initialization
jQuery(document).ready(function () {
	// console.log(IDTugas);
	// GetData.TaskList();
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


	// if (TaskID != -1) {
	// 	Page.Init();
	// }
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
				$("#slsUser").append("<option value='" + item.IDUser + "'>" + item.NamaLengkap + "</option>");
			})
			$("#slsUser").select2({ placeholder: "Pilih Analis" });
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
							model.append("Remarks", Remark);
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

		//Event
		// $(".TaskOrderBy").on("click", function () {
		// 	var order = (this.id).replace("Order-", "");
		// 	GetData.TaskList(order);
		// });

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
			var link = '/halamanpinnedProject/' + data.IDProyek;
			// Common.Alert.SuccessRoute("success", '/halamanpinnedProject/' + data.IDProyek);
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
			var link = '/halamanpinnedProject/' + data.IDProyek;
			// Common.Alert.SuccessRoute("success", '/halamanpinnedProject/' + data.IDProyek);
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
				Ctrl.Select2();
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
	Milestone: function (TaskID) {
		t = $("#divMilestoneList").mDatatable({
			data: {
				type: "remote",
				source: {
					read: {
						url: "/api/task/ListTransactionTask/" + TaskID,
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
					field: "trxTaskID", title: "Actions", sortable: false, textAlign: "center", width: 100, template: function (t) {
						if(t.Attachment != null)
							var strBuilder = '<a href="/PinnedProject/Download/ ' + t.trxTaskID + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Download Attachment"><i class="la la-download"></i></a>\t\t\t\t\t\t';
						return strBuilder;
					}
				},
				{ field: "TaskMilestone", title: "Milestone", textAlign: "center" },
				{ field: "FullName", title: "Fullname", textAlign: "center" },
				{ field: "ManHours", title: "Man Hours", textAlign: "center" },
				{
					field: "StartDate", title: "Start Date", sortable: false, textAlign: "center", template: function (t) {
						return t.StartDate != null ? Common.Format.Date(t.StartDate) : "-"
					}
				},
				{
					field: "EndDate", title: "End Date", sortable: false, textAlign: "center", template: function (t) {
						return t.EndDate != null ? Common.Format.Date(t.EndDate) : "-"
					}
				},
				{ field: "Remarks", className: 'dt-head-center', title: "Remark", textAlign: "center", width: 500 },
			]
		})
	},
	Worklog: function (TaskID) {
		t = $("#divWorkLogList").mDatatable({
			data: {
				type: "remote",
				source: {
					read: {
						url: "/api/task/ListWorkLog/" + TaskID,
						method: "GET",
						map: function (r) {
							var e = r;
							return void 0 !== r.data && (e = r.data), e;
						}
					}
				},
				pageSize: 10,
				saveState: {
					cookie: false,
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
				{ field: "FullName", title: "Full Name", width: 100, textAlign: "center" },
				{
					field: "Date", title: "Date", sortable: false, textAlign: "center", template: function (t) {
						return t.Date != null ? Common.Format.Date(t.Date) : "-"
					},
				},
				{ field: "Duration", title: "Duration", textAlign: "center" },
			]
		})
	},
	History: function (TaskID) {
		t = $("#divHistoryList").mDatatable({
			data: {
				type: "remote",
				source: {
					read: {
						url: "/api/task/ListTransactionTaskLog/" + TaskID,
						method: "GET",
						map: function (r) {
							var e = r;
							return void 0 !== r.data && (e = r.data), e;
						}
					}
				},
				pageSize: 10,
				saveState: {
					cookie: false,
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
				{ field: "Milestone", title: "Action", width: 100, textAlign: "center" },
				{ field: "FullName", title: "Fullname", textAlign: "center" },
				{
					field: "CreatedDate", title: "Action Date", sortable: false, textAlign: "center", template: function (t) {
						return t.CreatedDate != null ? Common.Format.Date(t.CreatedDate) : "-"
					},
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