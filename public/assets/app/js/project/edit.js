//== Class Initialization
jQuery(document).ready(function () {
	Form.Init();
	Control.Init();
});

var Control = {
	Init: function () {
		Control.BootstrapDatepicker();
		Control.Select2();
		Control.ChangeFormatDate();
	},
	BootstrapDatepicker: function () {
		$(".datepicker").datepicker({
            format: 'dd-M-yyyy',
            // format: 'dd-M-yyyy',
			todayBtn: "linked", clearBtn: !0, todayHighlight: !0, templates: {
				leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
			}
		})
	},
	// Select2: function () {
	// 	var ProjectManagerID = $("#inptProjectManagerID").val();
	// 	$.ajax({
	// 		url: "/api/user/list?roleID=4",
	// 		type: "GET"
	// 	}).done(function (data, textStatus, jqXHR) {
	// 		$("#slsProjectManager").html("<option></option>");
	// 		$.each(data, function (i, item) {
	// 			if (item.UserID == ProjectManagerID)
	// 				$("#slsProjectManager").append("<option value='" + item.UserID + "'selected >" + item.FullName + "</option>");
	// 			else
	// 				$("#slsProjectManager").append("<option value='" + item.UserID + "'>" + item.FullName + "</option>");
	// 		})
	// 		$("#slsProjectManager").select2({ placeholder: "Select Project Manager" });
	// 	}).fail(function (jqXHR, textStatus, errorThrown) {
	// 		Common.Alert.Error(errorThrown);
	// 	})
    // },
    Select2: function () {
        var IDUser = $("#inptProjectManager").val();
		$.ajax({
			url: "/api/user/list/3",
			type: "GET"
		}).done(function (data, textStatus, jqXHR) {
			$("#slsProjectManager").html("<option></option>");
			$.each(data, function (i, item) {
                if (item.IDUser == IDUser)
                    $("#slsProjectManager").append("<option value='" + item.IDUser + "'selected >" + item.NamaLengkap + "</option>");
                else
                    $("#slsProjectManager").append("<option value='" + item.IDUser + "'>" + item.NamaLengkap + "</option>");
			})
			$("#slsProjectManager").select2({ placeholder: "Pilih Penanggung Jawab" });
		}).fail(function (jqXHR, textStatus, errorThrown) {
			Common.Alert.Error(errorThrown);
		})
	},
	ChangeFormatDate: function () {
		if ($("#tbxKickOffDate").val() != "") {
			var TanggalMulai = Common.Format.Date($("#tbxKickOffDate").val());
			$("#tbxKickOffDate").val(TanggalMulai);
		}
		if ($("#tbxDeadline").val() != "") {
			var TanggalMulai = Common.Format.Date($("#tbxDeadline").val());
			$("#tbxDeadline").val(TanggalMulai);
		}
		if ($("#tbxRealitaSelesai").val() != "") {
			var TanggalMulai = Common.Format.Date($("#tbxRealitaSelesai").val());
			$("#tbxRealitaSelesai").val(TanggalMulai);
		}
	}
}

var Form = {
	Init: function () {
		$("#formEditProject").validate({
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
	var btn = $("#btnEdit");

	var params = {
        IDProyek: $("#tbxProjectID").val(),
		NamaProyek: $("#tbxProjectName").val(),
        InisialProyek: $("#tbxProjectInitial").val(),
        PinKeMenu: $("#cbx").is(":checked"),
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
		type: "PUT",
		dataType: "json",
		contentType: "application/json",
		data: JSON.stringify(params),
		cache: false,
	}).done(function (data, textStatus, jqXHR) {
		if (Common.CheckError.Object(data) == true)
			Common.Alert.SuccessRoute("Project Edited", '/halamanProject');
		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	}).fail(function (jqXHR, textStatus, errorThrown) {
		Common.Alert.Error(errorThrown);
		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
	})
};
