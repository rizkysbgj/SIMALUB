//== Class Initialization
jQuery(document).ready(function () {
	Form.Init();
	Control.Init();
});

var Control = {
	Init: function () {
		Control.BootstrapDatepicker();
		Control.Select2();
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
	Select2: function () {
		$.ajax({
			url: "/api/user/list/3",
			type: "GET"
		}).done(function (data, textStatus, jqXHR) {
			$("#slsProjectManager").html("<option></option>");
			$.each(data, function (i, item) {
				$("#slsProjectManager").append("<option value='" + item.IDUser + "'>" + item.NamaLengkap + "</option>");
			})
			$("#slsProjectManager").select2({ placeholder: "Pilih Penanggung Jawab" });
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
		})
	}
}

var Form = {
	Init: function () {
		$("#formNewProject").validate({
			invalidHandler: function (e, r) {
				var i = $("#msgProjectFail");
				i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
			},
			submitHandler: function (e) {
				Transaction();
			}
		})
	}
}

var Transaction = function () {
	var btn = $("#btnCreate");

	var params = {
		NamaProyek: $("#tbxProjectName").val(),
        InisialProyek: $("#tbxProjectInitial").val(),
		PinKeMenu: $("#cbx").is(":checked"),
		Percepatan: $("#cbxPercepatan").is(":checked"),
		PenanggungJawab: $('#slsProjectManager').val(),
		TanggalMulai: $('#tbxKickOffDate').val(),
		RencanaSelesai: $("#tbxDeadline").val(),
		RealitaSelesai: $("#tbxRealitaSelesai").val(),
		DeskripsiProyek: $("#tbxProjectDescription").val(),
		SponsorProyek: $("#tbxProjectSponsor").val()
	}

	btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

	$.ajax({
		url: "/api/proyek",
		type: "POST",
		dataType: "json",
		contentType: "application/json",
		data: JSON.stringify(params),
		cache: false,
	}).done(function (data, textStatus, jqXHR) {
		console.log(data);
		if (Common.CheckError.Object(data) == true)
			Common.Alert.SuccessRoute("Proyek Berhasil dibuat", '/halamanProject');
		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	}).fail(function (jqXHR, textStatus, errorThrown) {
		Common.Alert.Error(errorThrown);
		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	})
};
