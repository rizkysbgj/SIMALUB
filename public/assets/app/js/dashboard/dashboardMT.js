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
                    Control.GraphTotalSalahAnalisis();
                    Control.GraphTotalWaktuSalahAnalisis();
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
    GraphTotalSalahAnalisis: function() {
        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("totalSalahAnalisis", am4charts.PieChart);

        // Add data
        chart.data = [ {
        "country": "Lithuania",
        "litres": 501.9
        }, {
        "country": "Czech Republic",
        "litres": 301.9
        }, {
        "country": "Ireland",
        "litres": 201.1
        }, {
        "country": "Germany",
        "litres": 165.8
        }, {
        "country": "Australia",
        "litres": 139.9
        }, {
        "country": "Austria",
        "litres": 128.3
        }, {
        "country": "UK",
        "litres": 99
        }, {
        "country": "Belgium",
        "litres": 60
        }, {
        "country": "The Netherlands",
        "litres": 50
        } ];

        // Set inner radius
        chart.innerRadius = am4core.percent(50);

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "litres";
        pieSeries.dataFields.category = "country";
        pieSeries.slices.template.stroke = am4core.color("#fff");
        pieSeries.slices.template.strokeWidth = 2;
        pieSeries.slices.template.strokeOpacity = 1;

        // This creates initial animation
        pieSeries.hiddenState.properties.opacity = 1;
        pieSeries.hiddenState.properties.endAngle = -90;
        pieSeries.hiddenState.properties.startAngle = -90;
    },
    GraphTotalWaktuSalahAnalisis: function(){
        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("totalWaktuSalahAnalisis", am4charts.XYChart);

        // Add data
        chart.data = [{
        "country": "USA",
        "visits": 2025
        }, {
        "country": "China",
        "visits": 1882
        }, {
        "country": "Japan",
        "visits": 1809
        }, {
        "country": "Germany",
        "visits": 1322
        }, {
        "country": "UK",
        "visits": 1122
        }, {
        "country": "France",
        "visits": 1114
        }, {
        "country": "India",
        "visits": 984
        }, {
        "country": "Spain",
        "visits": 711
        }, {
        "country": "Netherlands",
        "visits": 665
        }, {
        "country": "Russia",
        "visits": 580
        }, {
        "country": "South Korea",
        "visits": 443
        }, {
        "country": "Canada",
        "visits": 441
        }, {
        "country": "Brazil",
        "visits": 395
        }];

        // Create axes

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "country";
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
        series.dataFields.valueY = "visits";
        series.dataFields.categoryX = "country";
        series.name = "Visits";
        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
        series.columns.template.fillOpacity = .8;

        var columnTemplate = series.columns.template;
        columnTemplate.strokeWidth = 2;
        columnTemplate.strokeOpacity = 1;    
    }
}






