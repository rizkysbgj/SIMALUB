//== Class Initialization
jQuery(document).ready(function () {
    Control.Init();
    // Table.Init(IDProyek);
});

var Table = {
    Init: function (IDProyek) {
        $("#divLaporanList").html("");
        t = $("#divLaporanList").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        url: "/api/lapor/" + IDProyek,
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
                    field: "IDTugas", title: "Action", sortable: false, textAlign: "center", template: function (t) {
                        var strBuilder = '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Dokumen"><i class="la la-download"></i></a>\t\t\t\t\t\t';
                        return strBuilder;
                    }
                },
                { field: "NamaProyek", title: "Nama Proyek", textAlign: "center" },
                { field: "InisialTugas", title: "Inisial Tugas", textAlign: "center" },
                { field: "NamaTugas", title: "Nama Tugas", textAlign: "center" },
                { field: "NamaLengkap", title: "Pelapor", textAlign: "center" },
                { field: "Catatan", title: "Catatan", textAlign: "center" },
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
            url: "/api/proyek",
            type: "GET",
            dataType: "json",
            contenType: "application/json",
            success: function (data) {
                var html = "<option value=''></option>";
                var select = $("#slsNamaProyek");

                $.each(data, function (i, item) {
                    html += '<option value="' + item.IDProyek + '">' + item.NamaProyek + '</option>';
                });

                $("#slsNamaProyek").select2({placeholder: "Pilih Proyek"});
                $("#slsNamaProyek").append(html);
                $("#slsNamaProyek").selectpicker("refresh");
                
            },
            error: function (xhr) {
                alert(xhr.responseText)
            }
        });
        
        $("#slsNamaProyek").on("change", function () {
            var IDProyek = $("#slsNamaProyek").val();
            Table.Init(IDProyek);
            
        })
    }
}
