//== Class Initialization
jQuery(document).ready(function () {
    Form.Init();
});


var Form = {
    Init: function () {
        $("#formEditStaff").validate({
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
    var btn = $("#btnEditStaff");

    btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

    var params = {
        Status: status,
        // Status: $("#btnStatus").prop('checked'),
        IDUser: $("#tbxUserID").val(),
        NIK: $("#tbxNIK").val(),
        NamaLengkap: $("#tbxFullName").val(),
        Email: $("#tbxEmail").val(),
        IDRole: $("#slsRole").val(),
        Password: $("#tbxNewPassword").val(),
        
    }
    

    $.ajax({
        url: "/api/user/",
        type: "PUT",
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(params),
    }).done(function (data, textStatus, jqXHR) {
        if (Common.CheckError.Object(data) == true)
            Common.Alert.SuccessRoute("Edit User Success", '/halamanStaff');
        else
            Common.Alert.Error(data.ErrorMessage);
        btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
    }).fail(function (jqXHR, textStatus, errorThrown) {
        Common.Alert.Error(errorThrown)
        btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
    })
};
