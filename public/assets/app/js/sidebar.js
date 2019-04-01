//== Class Initialization
jQuery(document).ready(function () {
    Pinned.Init();
    Total.Laporan();
    Total.Sertifikat();
    Header.Notifikasi();
});

var Pinned = {
    Init: function () {

        $.ajax({
            url: "/api/proyek/",
            type: "GET",
            dataType: "json",
            contentType: "application/json",
            success: function (data) {
                var html = "";

                $.each(data, function (i, item) {
                    html += '<li class="m-menu__item sidebarActive" aria-haspopup="true" id="halamanpinnedProject/' + item.IDProyek + '"><a href="/halamanpinnedProject/'+ item.IDProyek +'" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">' + item.NamaProyek + '</span></a></li>';
                });

                $('#parent').after(html);
            },
            error: function (xhr) {
                alert(xhr.responseText)
            }
        });
    }
}

var Total = {
    Laporan: function(){
        $.ajax({
            url: "/api/laporan/total",
            type: "GET",
            dataType: "json",
            contenType: "application/json",
            success: function (data) {
                
                console.log(data.totalLaporan);
                if(data.totalLaporan != 0){
                    $(".warnaBadge").show();
                    $("#TotalLaporan").html(data.totalLaporan);
                }
                else
                    $(".warnaBadge").hide();
            },
            error: function (xhr) {
                alert(xhr.responseText)
            }
        });
    },
    Sertifikat: function(){
        $.ajax({
            url: "/api/tugas/administrasi/total",
            type: "GET",
            dataType: "json",
            contenType: "application/json",
            success: function (data) {
                if(data != 0){
                    $(".warnaBadgeSertifikat").show();
                    $("#TotalPembuatanSertifikat").html(data);
                }
                else
                    $(".warnaBadgeSertifikat").hide();
            },
            error: function (xhr) {
                alert(xhr.responseText)
            }
        });
    }
}

var Header = {
    Notifikasi: function(){
        $.ajax({
            url: "/notifikasi",
            type: "GET",
            dataType: "json",
            contenType: "application/json",
            success: function (data) {
                $("#dropdownNotifikasi").html(data);
            },
            error: function (xhr) {
                alert("error")
            }
        });
    }
}