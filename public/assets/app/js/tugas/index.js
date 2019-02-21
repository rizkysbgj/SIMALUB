//== Class Initialization
jQuery(document).ready(function () {
	// Control.Init();
	Table.Init();
	Table.Subkontrak();
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
						var strBuilder = '<a href="/editTugas/' + t.IDTugas + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Tugas"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
						strBuilder += '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="Dokumen"><i class="la la-file"></i></a>';
						strBuilder += '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="Kaji Ulang" data-toggle="modal" data-target="#kajiulang"><i class="la la-clipboard"></i></a>';
						return strBuilder;
					}
				},
				{
					field: "#", title: "Kaji Ulang Analisis", sortable: false, textAlign: "center", template: function (t) {
						// var strBuilder = '<a href="/editTugas/' + t.IDTugas + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Story"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
						var strBuilder = '<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#kajiulang" style="width: 100px;"><span><small>Belum Dikaji</small></span></a>';
						return strBuilder;
					}
					
				},
				{ field: "InisialTugas", title: "Kode Tugas", textAlign: "center" },
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
	},
	Subkontrak: function () {
		var IDProyek = $("#ProjectID").val();
		t = $("#divSubkontrakList").mDatatable({
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
						var strBuilder = '<a href="/editTugas/' + t.IDTugas + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Tugas"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
						strBuilder += '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="Download Dokumen"><i class="la la-download"></i></a>';
						return strBuilder;
					}
				},
				{ field: "NamaTugas", title: "Nama Tugas", textAlign: "center" },
				{
					field: "RencanaMulai", title: "Waktu Dikirim", sortable: false, textAlign: "center", template: function (t) {
						return t.RencanaMulai != null ? Common.Format.Date(t.RencanaMulai) : "-"
					}
				},
				{
					field: "RencanaSelesai", title: "Waktu Diterima", sortable: false, textAlign: "center", template: function (t) {
						return t.RencanaSelesai != null ? Common.Format.Date(t.RencanaSelesai) : "-"
					}
				},
				{ field: "PenanggungJawab", title: "Penanggung Jawab", textAlign: "center" },
				{
					field: "#", title: "Status", sortable: false, textAlign: "center", template: function (t) {
						// var strBuilder = '<a href="/editTugas/' + t.IDTugas + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Story"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
						var strBuilder = '<a href="#" class="btn btn-danger"  style="width: 100px;"><span><small>Belum Selesai</small></span></a>';
						return strBuilder;
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