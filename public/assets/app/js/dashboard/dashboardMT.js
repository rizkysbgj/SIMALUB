jQuery(document).ready(function () {
    //BootstrapSwitch.init();
    Control.Init();
});

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
            $.ajax({
                url: "/dashboardmanajerteknis/" + IDProyek,
                type: 'GET',
                data: { IDProyek: IDProyek },
                success: function (data) {
                    $("#dashboard").html(data);
                    Control.BootstrapDatepicker();
                    $("#filter").show()
                    // Graph.Init(IDProyek);
                    Control.DateFormat();
                    // GetData.Init(null, null);
                    // Control.Filter();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
    },
    BootstrapDatepicker: function () {
        $(".datepicker").datepicker({
            format: 'dd-M-yyyy',
            todayBtn: "linked", clearBtn: !0, todayHighlight: !0, templates: {
                leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
            }
        })
    },
    Filter: function () {
        $("#btnResourcesList").on("click", function(){
            var startDate = $("#tbxStartDate").val();
            var endDate = $("#tbxEndDate").val();
            GetData.Init(startDate, endDate);
        })
    },
    DateFormat: function () {
        $("#targetSelesai").text(Common.Format.Date($("#targetSelesai").text()));

        
    }
}