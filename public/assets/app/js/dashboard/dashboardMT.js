jQuery(document).ready(function () {
    //BootstrapSwitch.init();
    Control.Init();
});

var GetData = {
    Kesalahan: function(IDProyek) {
        $.ajax({
            url: "/api/dashboardmanajerteknis/kesalahan/" + IDProyek,
            type: 'GET',
            success: function (data) {
                var total = 0;
                $.each(data, function(index, item){
                    total += item.TotalKesalahanAnalisis;
                })
                total = total;
                $("#totalSalah").html(total);
                Control.GraphTotalSalahAnalisis(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    },
    Telat: function(IDProyek){
        $.ajax({
            url: "/api/dashboardmanajerteknis/telat/" + IDProyek,
            type: 'GET',
            success: function (data) {
                $("#waktuTelat").html(data.SelisihMax);
                Control.GraphTotalWaktuSalahAnalisis(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }
}

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
                    GetData.Kesalahan(IDProyek);
                    GetData.Telat(IDProyek);
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
    },
    GraphTotalSalahAnalisis: function(data) {
        
        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("totalSalahAnalisis", am4charts.XYChart);
        chart.data = [];
        
        // Add data
        $.each(data, function(index, item){
            var params = {
                NamaTugas: item.NamaTugas,
                Kesalahan: item.TotalKesalahanAnalisis
            }
            chart.data.push(params);
        })

        // Create axess
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "NamaTugas";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;

        categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
        if (target.dataItem && target.dataItem.index & 2 == 2) {
            return dy + 25;
        }
        return dy;
        });

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

        // Create series
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = "Kesalahan";
        series.dataFields.categoryX = "NamaTugas";
        series.name = "Kesalahan";
        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
        series.columns.template.fillOpacity = .8;

        var columnTemplate = series.columns.template;
        columnTemplate.strokeWidth = 2;
        columnTemplate.strokeOpacity = 1;
    },
    GraphTotalWaktuSalahAnalisis: function(data){
        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("totalWaktuSalahAnalisis", am4charts.PieChart);
        chart.data = [];

        // Add data
        $.each(data, function(index, item){
            var params = {
                NamaTugas: item.NamaTugas,
                Telat: item.Selisih
            }
            chart.data.push(params);
        })

        // Set inner radius
        chart.innerRadius = am4core.percent(50);

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "Telat";
        pieSeries.dataFields.category = "NamaTugas";
        pieSeries.slices.template.stroke = am4core.color("#fff");
        pieSeries.slices.template.strokeWidth = 2;
        pieSeries.slices.template.strokeOpacity = 1;
        pieSeries.slices.template.tooltipText = "{category}: {value}[/] hari";
        pieSeries.labels.template.text = "{category}: {value}[/] hari";
        // pieSeries.ticks.template.tooltipText = "{category}: [bold]{value} hari[/]";

        // This creates initial animation
        pieSeries.hiddenState.properties.opacity = 1;
        pieSeries.hiddenState.properties.endAngle = -90;
        pieSeries.hiddenState.properties.startAngle = -90;    
    }
}






