//== Class Initialization
jQuery(document).ready(function () {
	Table.Subkontrak();
});

var Table = {
	Subkontrak: function () {
		var IDProyek = $("#IDProyek").val();
		t = $("#divSubkontrakList").mDatatable({
			data: {
				type: "remote",
				source: {
					read: {
						url: "/api/subkontrak/" + IDProyek,
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
					field: "#", title: "Status Tugas Subkontrak", sortable: false, textAlign: "center", template: function (t) {
						// var strBuilder = '<a href="/editTugas/' + t.IDTugas + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Story"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
						var strBuilder = '<button onclick="Modal.statussubkontrak()" class="btn btn-danger" style="width: 100px;"><span><small>Belum</small></span></button>';
                        return strBuilder;
					}
					
				},
				{
					field: "TaskID", title: "Actions", sortable: false, textAlign: "center", template: function (t) {
						// var strBuilder = '<a href="/editTugas/' + t.IDTugas + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Tugas"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
						var strBuilder = '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="Download Dokumen"><i class="la la-download"></i></a>\t\t\t\t\t\t';
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
			]
		})
	}
}
var Modal = {
	statussubkontrak:function(){
		$("#modalstatussubkontrak").modal({
			backdrop: "static"
		});
	}
}
