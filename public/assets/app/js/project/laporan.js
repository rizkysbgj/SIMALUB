//== Class Initialization
jQuery(document).ready(function () {
    //Control.Init();
    Table.Init();
});

var Table = {
    Init: function () {
        t = $("#divLaporanList").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        url: "/api/role",
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
                    field: "IDTugas", title: "Action", sortable: false, textAlign: "center", width: 200, template: function (t) {
                        var strBuilder = '<a href="/editJabatan/' + t.IDRole + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Edit"><i class="la la-edit"></i></a>\t\t\t\t\t\t';
                        // strBuilder += '<a href="/Role/Delete/' + t.IDRole + '" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Hapus"><i class="la la-eraser"></i></a>';
                        strBuilder += '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="Dokumen"><i class="la la-file"></i></a>\t\t\t\t\t\t';
                        return strBuilder;
                    }
                },
                { field: "InisialTugas", title: "Inisial Tugas", textAlign: "center", width: 300 },
                { field: "NamaTugas", title: "Nama Tugas", textAlign: "center", width: 300 },
                { field: "Pelapor", title: "Pelapor", textAlign: "center", width: 300 },
                { field: "Catatan", title: "Catatan", textAlign: "center", width: 300 },
                {
					field: "WaktuLapor", title: "Waktu Pelaporan", sortable: false, textAlign: "center", template: function (t) {
						return t.WaktuLapor != null ? Common.Format.Date(t.WaktuLapor) : "-"
					}
				},
            ]
        })


    }
}

var Control = {
    Init: function () {

        $.ajax({
            url: "/api/user/list",
            type: "GET",
            dataType: "json",
            contenType: "application/json",
            success: function (data) {
                var html = "<option value=''>All</option>";
                var select = $("#slsNamaProyek");

                $.each(data, function (i, item) {
                    html += '<option value="' + item.FullName + '">' + item.FullName + '</option>';
                });

                $("#slsNamaProyek").append(html);
                $("#slsNamaProyek").selectpicker("refresh");
            },
            error: function (xhr) {
                alert(xhr.responseText)
            }
        });

        $("#slsNamaProyek").on("change", function () {
            t.search($(this).val(), "slsNamaProyek")
        })
    }
}
