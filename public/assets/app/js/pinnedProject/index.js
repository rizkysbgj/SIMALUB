// var KeyID = $("#inptKeyID").val();
// var TaskID = $("#inptTaskID").val();
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
	// GetData.TaskList();
	Page.Init();
	// $("#sidebarShow").hide();

	$("#minimizeTaskLeft").on('click', function (){
		$("#removeTaskList").hide();
		$("#sidebarShow").show();
		
	});

	$("#minimizeTaskRight").on('click', function (){
		$("#removeTaskList").show();
		$("#sidebarShow").hide();
		
	});

	// if (TaskID != -1) {
	// 	Page.Init();
	// }
});

var Ctrl = {
	Select2: function () {
		var milestone = $("#inptMilestone").val();
		var role = 0;
		if (milestone == 3 || milestone == 9 || milestone == 11 || milestone == 13)
			role = 6;
		else if (milestone == 6)
			role = 5;
		$.ajax({
			url: "/api/user/list?roleID=" + role,
			type: "GET"
		}).done(function (data, textStatus, jqXHR) {
			$("#slsUser").html("<option></option>");
			$.each(data, function (i, item) {
				$("#slsUser").append("<option value='" + item.UserID + "'>" + item.FullName + "</option>");
			})
			$("#slsUser").select2({ placeholder: "Select People" });
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
		})
	}
}

var Button = {
	Init: function () {
		$(".btn-generate").on("click", function () {
			var Code = this.id;
			var done = false;
			var params = {
				TaskID: $("#inptTaskID").val(),
				TaskMilestoneID: $("#inptMilestone").val(),
				PIC: $("#inptPICID").val(),
				Remarks: "",
				ManHours: 0,
				ProjectID: $("#inptProjectID").val(),
				Code: Code
			};

			var model = new FormData();
			model.append("TaskID", params.TaskID);
			model.append("TaskMilestoneID", params.TaskMilestoneID);
			model.append("ProjectID", params.ProjectID);
			model.append("Code", params.Code);

			if (Code == "START" || Code == "GOLIVE") {
				$(".btn-generate").addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
				model.append("PIC", params.PIC);

				TaskTransaction.Init(model, params);
			}
			else {
				$("#btnSubmit-" + Code).on("click", function () {
					var fileInput;
					var uploadedFile;
					var Regex;
					var Remark;
					if (!done) {
						if (Code == "DONE") {
							fileInput = document.getElementById("inputFile");
							uploadedFile = fileInput.files[0];

							Remark = $("#tbxRemark-" + Code).val();
							Regex = /(<([^>]+)>)/gi;
							Remark = Remark.replace(Regex, "");

							params.Remarks = Remark;

							if ($("#tbxRemark-" + Code).val() == "") {
								Common.Alert.Warning("Please Input Remarks!");
								return false;
							}

							model.append("Remarks", Remark);
							model.append('Document', uploadedFile);
						}
						else if (Code == "ASSIGN") {

							params.PIC = $("#slsUser").val();
							params.ManHours = $("#tbxHours").val();

							if (params.PIC == "" || params.ManHours == "") {
								Common.Alert.Warning("Please Input ManHours!");
								return false;
							}

							model.append("PIC", params.PIC);
							model.append("ManHours", params.ManHours);

						}
						else if (Code == "FEEDBACK") {
							fileInput = document.getElementById("inputFile");
							uploadedFile = fileInput.files[0];

							Remark = $("#tbxRemark-" + Code).val();
							Regex = /(<([^>]+)>)/gi;
							Remark = Remark.replace(Regex, "");

							params.Remarks = Remark;

							if ($("#tbxRemark-" + Code).val() == "") {
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

						$("#btnSubmit-" + Code).addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
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
		GetData.TaskDetail(IDTugas);

		//Event
		$(".TaskOrderBy").on("click", function () {
			var order = (this.id).replace("Order-", "");
			GetData.TaskList(order);
		});

		$('#showTask').on('click', '.divShowDetail', function () {
			// var IDTugas = this.id;
			// $(this).css({ background: "whitesmoke" }).siblings().css({ background: "transparent" });
			// $(this).addClass("selected").siblings().removeClass("selected");
			console.log("AAAAAA");
			// GetData.TaskDetail(IDTask);
		});
	},
}

var TaskTransaction = {
	Init: function (model, data) {
		var btn = $("#btnSubmit-" + data.Code);
		if (data.Code == "START" || data.Code == "GOLIVE") {
			btn = $(".btn-generate");
		}

		$.ajax({
			url: "/api/task/TaskTransaction",
			type: 'POST',
			data: model,
			dataType: "json",
			contentType: false,
			processData: false
		}).done(function (data, textStatus, jqXHR) {
			console.log(data);
			if (Common.CheckError.Object(data) == true) {
				if ($("#inptMilestone").val() == 7) {
					Common.Alert.SuccessRoute("Success", '/BugTracker/Create/' + data.SITProjectID);
				}
				else {
					var link = pageNow == "PinnedProject" ? "/PinnedProject/" + data.ProjectID : "/MyTask/"
					Common.Alert.SuccessRoute("Success", link);
				}
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
		var link = "/halamananpinnedProject/TaskList/" + IDProyek;
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
		var link = "/halamanpinnedProject/DetailTask/" + IDTugas;
		$.ajax({
			url: link,
			type: "GET",
			data: { IDTugas: IDTugas },
			success: function (data) {
				$("#detailTask").html(data);
				// Function.ChangeFormatDate();
				Button.Init();
				Ctrl.Select2();
				Summernote.Init();
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