//== Class Initialization
jQuery(document).ready(function () {
	Form.Init();
	Control.Init();
});

var Control = {
	Init: function () {
		Control.BootstrapDatepicker();
		Control.ChangeFormatDate();
	},
	BootstrapDatepicker: function () {
		$(".datepicker").datepicker({
            // format: 'yyyy-m-dd',
            format: 'dd-M-yyyy',
			todayBtn: "linked", clearBtn: !0, todayHighlight: !0, templates: {
				leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
			}
		})
	},
	ChangeFormatDate: function () {
		if ($("#tbxStartPlan").val() != "") {
			var RencanaMulai = Common.Format.Date($("#tbxStartPlan").val());
			$("#tbxStartPlan").val(RencanaMulai);
		}
		if ($("#tbxEndPlan").val() != "") {
			var RencanaSelesai = Common.Format.Date($("#tbxEndPlan").val());
			$("#tbxEndPlan").val(RencanaSelesai);
		}
	}
}

var Form = {
	Init: function () {
		$("#formEditStory").validate({
			invalidHandler: function (e, r) {
				var i = $("#msgStoryFail");
				i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
			},
			submitHandler: function (e) {
				Transaction();
			}
		})
	}
}

var Transaction = function () {
	var btn = $("#btnEdit");
	var IDProyek = $("#ProjectID").val();
	var params = {

        NamaTugas:$("#tbxTaskName").val(),
        DeskripsiTugas: $("#tbxTaskDescription").val(),
        IDProyek: $('#ProjectID').val(),
        RencanaMulai: $("#tbxStartPlan").val(),
        RencanaSelesai:$("#tbxEndPlan").val()
	};

	btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

	$.ajax({
		url: "/api/tugas",
		type: "PUT",
		dataType: "json",
		contentType: "application/json",
		data: JSON.stringify(params),
		cache: false,
	}).done(function (data, textStatus, jqXHR) {
		if (Common.CheckError.Object(data) == true)
			Common.Alert.SuccessRoute("Project Edited", '/halamanTugas/' + IDProyek);
		else
			Common.Alert.Error(data.ErrorMessage);
		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	}).fail(function (jqXHR, textStatus, errorThrown) {
		Common.Alert.Error(errorThrown);
		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	})
};
