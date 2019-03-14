jQuery(document).ready(function () {
    //BootstrapSwitch.init();
    Control.Init();
});

var Control = {
    Init: function () {
        $.ajax({
            url: "/api/proyek",
            type: "GET",
            dataType: "json",
            contenType: "application/json",
            success: function (data) {
                var html = "<option value=''></option>";
                var select = $("#slsNamaProyek");

                $.each(data, function (i, item) {
                    html += '<option value="' + item.IDProyek + '">' + item.NamaProyek + '</option>';
                });

                $("#slsNamaProyek").select2({placeholder: "Pilih Proyek"});
                $("#slsNamaProyek").append(html);
                $("#slsNamaProyek").selectpicker("refresh");
                
            },
            error: function (xhr) {
                alert(xhr.responseText)
            }
        });

        $("#slsNamaProyek").on("change", function () {
            var IDProyek = $("#slsNamaProyek").val();
            $.ajax({
                url: "/dashboardmanajerteknis/" + IDProyek,
                type: 'GET',
                data: { IDProyek: IDProyek },
                success: function (data) {
                    $("#dashboard").html(data);
                    Control.BootstrapDatepicker();
                    $("#filter").show()
                    // Graph.Init(IDProyek);
                    Control.DateFormat();
                    // GetData.Init(null, null);
                    // Control.Filter();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
    },
    BootstrapDatepicker: function () {
        $(".datepicker").datepicker({
            format: 'dd-M-yyyy',
            todayBtn: "linked", clearBtn: !0, todayHighlight: !0, templates: {
                leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'
            }
        })
    },
    Filter: function () {
        $("#btnResourcesList").on("click", function(){
            var startDate = $("#tbxStartDate").val();
            var endDate = $("#tbxEndDate").val();
            GetData.Init(startDate, endDate);
        })
    },
    DateFormat: function () {
        $("#targetSelesai").text(Common.Format.Date($("#targetSelesai").text()));
    },
    TaskDetail: function (IDTugas) {
		// var link = pageNow == "PinnedProject" ? "/PinnedProject/DetailTask" : "/MyTask/DetailTask"
		var link = "/halamanpinnedProject/detailTask/" + IDTugas;
		$.ajax({
			url: link,
			type: "GET",
			// data: { IDTugas: IDTugas },
			success: function (data) {
                $("#dashboard").html(data);
                $("#buttonBack").show();
                $("#buttonHide").hide();
				Control.ChangeFormatDate();
				// Button.Init();
				// Ctrl.Select2();
				// Ctrl.SelectAdmin();
				Control.Milestone(IDTugas);

			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
    },
    BackDetail: function (IDProyek){
        $.ajax({
            url: "/dashboardmanajerteknis/" + IDProyek,
            type: 'GET',
            data: { IDProyek: IDProyek },
            success: function (data) {
                $("#dashboard").html(data);
                Control.BootstrapDatepicker();
                $("#filter").show()
                Control.DateFormat();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    },
    ChangeFormatDate: function () {
		document.getElementById("txtStartPlan").innerHTML = Common.Format.Date(document.getElementById("txtStartPlan").innerHTML);
		document.getElementById("txtEndPlan").innerHTML = Common.Format.Date(document.getElementById("txtEndPlan").innerHTML);
    },
    Milestone: function (IDTugas) {
		t = $("#tabelmemoAnalisis").mDatatable({
			data: {
				type: "remote",
				source: {
					read: {
						url: "/api/memo/" + IDTugas,
						method: "GET",
						map: function (r) {
							var e = r;
							return void 0 !== r.data && (e = r.data), e;
						}
					}
				},
				pageSize: 10,
				saveState: {
					cookie: true,
					webstorage: true
				},
				serverPaging: false,
				serverFiltering: false,
				serverSorting: false
			},
			layout: {
				scroll: false,
				footer: false
			},
			sortable: true,
			pagination: true,
			toolbar: {
				items: {
					pagination: {
						pageSizeSelect: [10, 20, 30, 50, 100]
					}
				}
			},
			columns: [
				{
					field: "TaskID", title: "Actions", sortable: false, textAlign: "center", width: 100, template: function (t) {
						if(t.Attachment != null)
							var strBuilder = '<a href="/api/download/ ' + t.IDTrxTugas + '" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Download Lampiran"><i class="la la-download"></i></a>\t\t\t\t\t\t';
						return strBuilder;
					}
				},
				{ field: "MilestoneTugas", title: "Milestone", textAlign: "center" },
				{ field: "NamaLengkap", title: "Nama Lengkap", textAlign: "center" },
				{
					field: "WaktuMulai", title: "Waktu Mulai", sortable: false, textAlign: "center", template: function (t) {
						return t.WaktuMulai != null ? Common.Format.Date(t.WaktuMulai) : "-"
					}
				},
				{
					field: "WaktuSelesai", title: "Waktu Selesai", sortable: false, textAlign: "center", template: function (t) {
						return t.WaktuSelesai != null ? Common.Format.Date(t.WaktuSelesai) : "-"
					}
				},
				{ field: "Catatan", title: "Catatan", textAlign: "center", width: 500 },
			]
		})
	}
}



