//== Class Initialization
jQuery(document).ready(function () {

    Form.Init();
    //ClearForm.init();

});

var Form = {
    Init: function () {
        $("#formCreateRole").validate({
            invalidHandler: function (e, r) {
                var i = $("#msgLogFail");
                i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
            },
            submitHandler: function (e) {
                Transaction();
            }
        })
    },
}

var Transaction = function () {
    var btn = $("#btnAddRole");

    var params = {
        Role: $("#tbxRoleName").val(),
    }

    btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

    $.ajax({
        url: "/api/role",
        type: "POST",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify(params),
        cache: false,
    }).done(function (data, textStatus, jqXHR) {
        console.log(data);
        if (Common.CheckError.Object(data) == true)
            Common.Alert.SuccessRoute("Add Role Success", '/halamanJabatan');
        btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
    }).fail(function (jqXHR, textStatus, errorThrown) {
        Common.Alert.Error(errorThrown);
        btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
    })
};