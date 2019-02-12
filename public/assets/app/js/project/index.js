//== Class Initialization
jQuery(document).ready(function () {
	// Control.Init();
	Table.Init();
});

var Table = {
	Init: function () {
		t = $("#divProjectList").mDatatable({
			data: {
				type: "remote",
				source: {
					read: {
						url: "/api/proyek",
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
					field: "IDProyek", title: "Actions", sortable: false, textAlign: "center", template: function (t) {
						var strBuilder = '<a href="/editProyek/' + t.IDProyek + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
						strBuilder += '<a href="/Story/' + t.ProjectID + '" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="Story Project"><i class="la la-folder-o"></i></a>';
						return strBuilder;
					}
				},
				{ field: "NamaProyek", title: "Nama Proyek", textAlign: "center" },
				{ field: "InisialProyek", title: "Proyek Inisial", textAlign: "center" },
				{ field: "PenanggungJawab", title: "Penanggung Jawab", textAlign: "center" },
				{
					field: "TanggalMulai", title: "Tanggal Mulai", sortable: false, textAlign: "center", template: function (t) {
						return t.TanggalMulai != null ? Common.Format.Date(t.TanggalMulai) : "-"
					}
				},
				{
					field: "RencanaSelesai", title: "Rencana Selesai", sortable: false, textAlign: "center", template: function (t) {
						return t.RencanaSelesai != null ? Common.Format.Date(t.RencanaSelesai) : "-"
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
// 			url: "/api/user",
// 			type: "GET",
// 			dataType: "json",
// 			contenType: "application/json",
// 			success: function (data) {
// 				var html = "<option value=''>All</option>";
// 				var select = $("#slsProjectManager");

// 				$.each(data, function (i, item) {
// 					html += '<option value="' + item.FullName + '">' + item.FullName + '</option>';
// 				});

// 				$("#slsProjectManager").append(html);
// 				$("#slsProjectManager").selectpicker("refresh");
// 			},
// 			error: function (xhr) {
// 				alert(xhr.responseText)
// 			}
// 		});

// 		$("#slsProjectManager").on("change", function () {
// 			t.search($(this).val(), "ProjectManager")
// 		})
// 	}
// }
