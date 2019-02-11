//== Class Initialization
jQuery(document).ready(function () {
    Form.Init();
    Control.Init();
    BootstrapSwitch.init();


    $('#tbxConfirmNewPassword').on('keyup', function () {
        if ($('#tbxNewPassword').val() == $('#tbxConfirmNewPassword').val()) {
            $('#message').html('');
        } else
            $('#message').html('Password Not Match').css('color', 'red');
    });
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

var BootstrapSwitch = {
    init: function () {
        $("[data-switch=true]").bootstrapSwitch();
    }
}

var Control = {
    Init: function () {
        Control.Select2();
    },
    Select2: function () {
        var IDRole = $("#inptRoleID").val();
        $.ajax({
            url: "/api/role",
            type: "GET"
        }).done(function (data, textStatus, jqXHR) {
            $("#slsRole").html("<option></option>");
            $.each(data, function (i, item) {
                if (item.IDRole == IDRole)
                    $("#slsRole").append("<option value='" + item.IDRole + "'selected >" + item.Role + "</option>");
                else
                    $("#slsRole").append("<option value='" + item.IDRole + "'>" + item.Role + "</option>");
            })
            $("#slsRole").select2({ placeholder: "Select Role" });
        }).fail(function (jqXHR, textStatus, errorThrown) {
            Common.Alert.Error(errorThrown);
        });
        $("#slsRole").select2({ placeholder: "Select Role", minimumResultsForSearch: 1 / 0 });
    }
}

var Transaction = function () {
    var btn = $("#btnEditStaff");

    btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

    // var model = new FormData();

    if($("#btnStatus").prop('checked')) {
        var status = 1;
    }
    else {
        var status = 2;
    }

    var params = {
        Status: status,
        // Status: $("#btnStatus").prop('checked'),
        IDUser: $("#tbxUserID").val(),
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
