//== Class Initialization
jQuery(document).ready(function () {
    Form.Init();
});


var Form = {
    Init: function () {
        $("#formEditRole").validate({
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
    var btn = $("#btnEditRole");

    btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

    var params = {
        RoleID : $("#inptRoleID").val(),
        Role: $("#tbxRoleName").val(),
    }
    

    $.ajax({
        url: "/api/role/{IDRole}",
        type: 'POST',
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(params),
    }).done(function (data, textStatus, jqXHR) {
        if (Common.CheckError.Object(data) == true)
            Common.Alert.SuccessRoute("Edit Role Success", '/halamanJabatan');
        else
            Common.Alert.Error(data.ErrorMessage);
        btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
    }).fail(function (jqXHR, textStatus, errorThrown) {
        Common.Alert.Error(errorThrown)
        btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
    })
};
