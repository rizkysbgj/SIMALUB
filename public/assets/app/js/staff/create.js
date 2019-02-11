//== Class Initialization
jQuery(document).ready(function () {
    Form.Init();
    Control.Init();
    BootstrapSwitch.init();
    // ClearForm.init();
    // FileValidation.Init();

    $('#tbxConfirmNewPassword').on('keyup', function () {
        if ($('#tbxNewPassword').val() == $('#tbxConfirmNewPassword').val()) {
            $('#message').html('');
        } else
            $('#message').html('Password Not Match').css('color', 'red');
    });
}); 

var FileValidation = {
    Init: function () {
        window.URL = window.URL || window.webkitURL;
        var elBrowse = document.getElementById("inputPhotoProfile"),
            elPreview = document.getElementById("preview"),
            useBlob = false && window.URL;

        function readImage(file) {
            var reader = new FileReader();
            reader.addEventListener("load", function () {
                var image = new Image();
                var msg = "";
                image.addEventListener("load", function () {
                    elPreview.appendChild(this);
                    if (Math.round(file.size / 1024) > 625000)
                        msg += "Max Size 5MB";
                    if (file.type != "image/png" && file.type != "image/jpg" && file.type != "image/jpeg")
                        msg += "Extension jpg/png/jpeg";
                    if ((image.width / image.height == 1))
                        msg += "";
                    else
                        msg += "Resolution should be 1:1";
                    if (msg != "") {
                        Common.Alert.Error(msg);
                        $("#inputPhotoProfile").val("");
                        $("#preview").html("");
                    }
                    $("#preview").html("");
                    if (useBlob) {
                        window.URL.revokeObjectURL(image.src);
                    }
                });
                if (msg == "")
                    image.src = useBlob ? window.URL.createObjectURL(file) : reader.result;
            });
            reader.readAsDataURL(file);
        }
        elBrowse.addEventListener("change", function () {
            var files = this.files;
            var errors = "";
            if (!files) {
                errors += "File upload not supported by your browser.";
            }
            if (files && files[0]) {
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    if ((/\.(png|jpeg|jpg)$/i).test(file.name)) {
                        readImage(file);
                    } else {
                        errors += file.name + " Unsupported Image extension\n";
                    }
                }
            }
            if (errors) {
                Common.Alert.Error(errors);
                $("#inputPhotoProfile").val("");
                $("#preview").html("");
            }
        });
    }
}

var ClearForm = {
    init: function () {
        $("#tbxUserID").val("");
        $("#tbxFullName").val("");
        $("#tbxInitialName").val("");
        $("#tbxEmail").val("");
        $("#tbxNewPassword").val("");
    }
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

var Form = {
    Init: function () {
        $("#formCreateUser").validate({
            invalidHandler: function (e, r) {
                var i = $("#msgLogFail");
                i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
            },
            submitHandler: function (e) {
                if ($('#message').html() != 'Password Not Match')
                    Transaction();
            }
        })
    },
}

var Transaction = function () {
    var btn = $("#btnAddUser");

    btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);


    // var fileInput = document.getElementById("inputPhotoProfile");
    // var uploadedFile = fileInput.files[0];

    console.log($("#btnStatus").val());

    var model = new FormData();

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
        NIK: $("#tbxNIK").val(),
        NamaLengkap: $("#tbxFullName").val(),
        Email: $("#tbxEmail").val(),
        IDRole: $("#slsRole").val(),
        Password: $("#tbxNewPassword").val(),
        
    }
    // model.append('Status', $("#btnStatus").prop('checked'));
    // model.append('IDUser', $.trim($("#tbxUserID").val()));
    // model.append('NIK', $.trim($("#tbxNIK").val()));
    // model.append('NamaLengkap', $.trim($("#tbxFullName").val()));
    // model.append('Email', $.trim($("#tbxEmail").val()));
    // model.append('IDRole', $.trim($("#slsRole").val()));
    // model.append('Password', $.trim($("#tbxNewPassword").val()));
    // model.append('Avatar', uploadedFile);

    $.ajax({
        url: "/api/user",
        type: 'POST',
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify(params),
        cache: false,
    }).done(function (data, textStatus, jqXHR) {
        if (Common.CheckError.Object(data) == true)
            Common.Alert.SuccessRoute("Add User Success", '/halamanStaff');
        else
            Common.Alert.Warning(data.ErrorMessage);
        btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
    }).fail(function (jqXHR, textStatus, errorThrown) {
        Common.Alert.Error(errorThrown)
        btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
    })
};