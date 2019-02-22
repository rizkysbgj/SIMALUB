//== Class Initialization
jQuery(document).ready(function () {
    Pinned.Init();
    // var path = window.location.pathname;
    // path2 = path.split('/')[1];


    // $('.sidebarActive').each(function () {
    //     if (path2 == '/halamanProject') {
    //         if (this.id == path)
    //             $(this).addClass('m-menu__item--active').siblings().removeClass("m-menu__item--active");

    //     }
    //     else if (this.id == path2)
    //         $(this).addClass('m-menu__item--active').siblings().removeClass("m-menu__item--active");

    // })
    // //
});

var Pinned = {
    Init: function () {

        $.ajax({
            url: "/api/proyek/",
            type: "GET",
            dataType: "json",
            contenType: "application/json",
            success: function (data) {
                var html = "";

                $.each(data, function (i, item) {
                    html += '<li class="m-menu__item" aria-haspopup="true"><a href="/halamanpinnedProject/'+ item.IDProyek +'" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">' + item.NamaProyek + '</span></a></li>';
                });

                $('#parent').after(html);
            },
            error: function (xhr) {
                alert(xhr.responseText)
            }
        });
    }
}
