//== Class Initialization
jQuery(document).ready(function () {
    Control.Init();

    $("#slsNamaProyek").on("change", function () {
        $("#alertPilihProyekLaporan").hide();
        var IDProyek = $("#slsNamaProyek").val();
        $("#divLaporanList").mDatatable("destroy");
        console.log(IDProyek);
        Table.test(IDProyek);
    })
});

var Table = {
    test: function (IDProyek) {
        // $("#divLaporanList").html("");
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
            columns: [{
                    field: "StatusPemrosesan",
                    title: "Status Pemrosesan",
                    sortable: false,
                    textAlign: "center",
                    template: function (t) {
                        if(t.StatusTindakan != "0")
                            var strBuilder = '<button onclick="Modal.statuslaporan('+t.IDTrxLapor+')" class="btn btn-success" style="width: 100px;"><span><small>Sudah</small></span></button>';
                        else
                            var strBuilder = '<button onclick="Modal.statuslaporan('+t.IDTrxLapor+')" class="btn btn-danger" style="width: 100px;"><span><small>Belum</small></span></button>';
                        return strBuilder;
                    }
                },
                {
                    field: "LampiranPelapor",
                    title: "Lampiran Pelapor",
                    sortable: false,
                    textAlign: "center",
                    template: function (t) {
                        var strBuilder = '<a href="/api/download/ ' + t.IDTrxTugas + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Download Lampiran"><i class="la la-download"></i></a>\t\t\t\t\t\t';
                        return strBuilder;
                    }
                },
                {
                    field: "NamaProyek",
                    title: "Nama Proyek",
                    textAlign: "center"
                },
                {
                    field: "InisialTugas",
                    title: "Inisial Tugas",
                    textAlign: "center"
                },
                {
                    field: "NamaTugas",
                    title: "Nama Tugas",
                    textAlign: "center"
                },
                {
                    field: "NamaLengkap",
                    title: "Pelapor",
                    textAlign: "center"
                },
                {
                    field: "Catatan",
                    title: "Catatan Pelapor",
                    textAlign: "center"
                },
                {
                    field: "WaktuLapor",
                    title: "Waktu Pelaporan",
                    sortable: false,
                    textAlign: "center",
                    template: function (t) {
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

                $("#slsNamaProyek").select2({
                    placeholder: "Pilih Proyek"
                });
                $("#slsNamaProyek").append(html);
                $("#slsNamaProyek").selectpicker("refresh");

            },
            error: function (xhr) {
                alert(xhr.responseText)
            }
        });

    }
}

var Modal = {
    statuslaporan: function (id) {
        $("#modalstatusproseslaporan").modal({
            backdrop: "static"
        });
        var btn = $("#submitStatusProsesLaporan");
        btn.on("click", function(){
            var model = new FormData();
			model.append("IDTrxLapor", id);
            model.append("Catatan", $("tbxRemark").val());
            
            $('input[type="file"]').each(function($i){
                model.append("Attachment", $(this)[0].files[0]);
            });
            
        	btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

        	console.log(model.get("IDTrxLapor"))

        	$.ajax({
                url: "/api/lapor/tindakan",
                type: 'POST',
                data: model,
                dataType: "json",
                contentType: false,
                processData: false
            }).done(function (data, textStatus, jqXHR) {
                console.log(data);
                var link = '/halamanLaporan/' + data.IDProyek;
                if (Common.CheckError.Object(data) == true) {
                    Common.Alert.SuccessRoute("Berhasil Menindaklanjuti", link);
                }
                btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
            }).fail(function (jqXHR, textStatus, errorThrown) {
                Common.Alert.Error(errorThrown);
                btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
            })
        })
        $("#btnClose").on("click", function(){
        	$("#divLaporanList").mDatatable("reload");

        })
    }
}
