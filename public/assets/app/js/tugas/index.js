//== Class Initialization
jQuery(document).ready(function () {
	// Control.Init();
	Table.Init();
});

var Table = {
	Init: function () {
		var IDProyek = $("#ProjectID").val();
		t = $("#divStoryList").mDatatable({
			data: {
				type: "remote",
				source: {
					read: {
						url: "/api/tugas/list/" + IDProyek,
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
			search: {
				input: $("#tbxSearch")
			},
			columns: [
				{
					field: "TaskID", title: "Actions", sortable: false, textAlign: "center", template: function (t) {
						var strBuilder = '<a href="/Story/Edit/' + t.ProjectID + '/' + t.TaskID + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Story"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
						strBuilder += '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="Document"><i class="la la-file"></i></a>';
						return strBuilder;
					}
				},
				{ field: "KodeTugas", title: "Kode Tugas", textAlign: "center" },
				{ field: "NamaTugas", title: "Nama Tugas", textAlign: "center" },
				{
					field: "RencanaMulai", title: "Tanggal Penugasan", sortable: false, textAlign: "center", template: function (t) {
						return t.RencanaMulai != null ? Common.Format.Date(t.RencanaMulai) : "-"
					}
				},
				{
					field: "RencanaSelesai", title: "Tanggal Deadline", sortable: false, textAlign: "center", template: function (t) {
						return t.RencanaSelesai != null ? Common.Format.Date(t.RencanaSelesai) : "-"
					}
				},
				{
					field: "RealitaMulai", title: "Realita Mulai", sortable: false, textAlign: "center", template: function (t) {
						return t.RealitaMulai != null ? Common.Format.Date(t.RealitaMulai) : "-"
					}
				},
				{
					field: "RealitaSelesai", title: "Realita Selesai", sortable: false, textAlign: "center", template: function (t) {
						return t.RealitaSelesai != null ? Common.Format.Date(t.RealitaSelesai) : "-"
					}
				},
			]
		})


	}
}

// var Control = {
// 	Init: function () {
// 		if ($("#errorMsg").val() != "-") {

// 			Common.Alert.ErrorRoute($("#errorMsg").val(), document.referrer);
// 		}
// 		$.ajax({
// 			url: "/api/task/listcategory",
// 			type: "GET",
// 			dataType: "json",
// 			contenType: "application/json",
// 			success: function (data) {
// 				var html = "<option value=''>All</option>";
// 				var select = $("#slsTaskCategory");

// 				$.each(data, function (i, item) {
// 					html += '<option value="' + item.TaskCategory + '">' + item.TaskCategory + '</option>';
// 				});

// 				$("#slsTaskCategory").append(html);
// 				$("#slsTaskCategory").selectpicker("refresh");
// 			},
// 			error: function (xhr) {
// 				alert(xhr.responseText)
// 			}
// 		});

// 		$("#slsTaskCategory").on("change", function () {
// 			t.search($(this).val(), "TaskCategory")
// 		})
// 	}
// }