//== Class Initialization
jQuery(document).ready(function () {
    Header.KlikNotif();
});

var Header = {
    KlikNotif: function(){
        $(".klikNotif").on("click", function (){
            // console.log(this.id);
            var param = {
                IDNotifikasi: this.id
            }
            
            $.ajax({
                url: "/api/notifikasi/",
                type: "PUT",
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(param),
            }).done(function (data, textStatus, jqXHR) {
                window.location.href = data.Aksi;
            }).fail(function (jqXHR, textStatus, errorThrown) {
                alert("gagal");    
            })
		});
    }
}