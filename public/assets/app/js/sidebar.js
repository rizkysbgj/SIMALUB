//== Class Initialization
jQuery(document).ready(function () {
    Pinned.Init();
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
