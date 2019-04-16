var today = new Date();
var tahun = today.getFullYear();

jQuery(document).ready(function () {
  Control.Init();
  Table.Init();
  Table.Uraian();
  GetData.Init(tahun);
  Graph.ReviewCustomer();
});

var Control = {
    Init: function () {
        $('#tbxTahun').keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                var tahun = $("#tbxTahun").val();
                GetData.Init(tahun); 
            }
        });
        $("#btnSearch").click(function(){
            var tahun = $("#tbxTahun").val();
            GetData.Init(tahun);
        });
    }

}

var GetData = {
    Init: function (tahun) {
        console.log("lalala");
        $.ajax({
            url: "/api/dashboardmanajerpuncak/" + tahun,
            type: "GET",
            dataType: "json",
            contenType: "application/json",
            success: function (data) {
                
                if(data.totalProyek != 0){
                    $("#alertTidakAdaProyekTahun").hide();
                    $("#alertAdaProyek").show();
                    var jumlahProyek = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                    $.each(data.statistikBulanan, function(index, item){
                        jumlahProyek[item.Bulan - 1] = item.TotalProyek;
                    })
                    DashboardBulan.init(jumlahProyek);

                    Graph.Persentase(data);

                    $("#totalProyek").html(data.totalProyek);
                    $("#totalProyekSelesai").html(data.totalProyekSelesai);
                    $("#totalProyekBerlangsung").html(data.totalProyekBerlangsung);
                }
                else {
                    $("#alertAdaProyek").hide();
                    $("#alertTidakAdaProyekTahun").show();
                }
                    
            },
            error: function (xhr) {
                alert(xhr.responseText)
            }
        });
    }
}

var Table = {
  Init: function () {
      t = $("#divUserPerformance").mDatatable({
          data: {
              type: "remote",
              source: {
                  read: {
                      url: "/api/role",
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
          search: {
              input: $("#tbxSearch")
          },
          columns: [
              { field: "#", title: "Nama Staff", textAlign: "center", width: 200 },
              { field: "#", title: "Total Proyek", textAlign: "center", width: 200 },
              { field: "#", title: "Total Tugas", textAlign: "center", width: 200 },
              { field: "#", title: "Total Kesalahan Analisis", textAlign: "center", width: 200 },
              { field: "#", title: "Total Keterlambatan", textAlign: "center", width: 200 },
          ]
      })
  },
  Uraian: function () {
    t = $("#divUraian").mDatatable({
        data: {
            type: "remote",
            source: {
                read: {
                    url: "/api/",
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
        search: {
            input: $("#tbxSearch")
        },
        columns: [
            { field: "#", title: "Nama Proyek", textAlign: "center", width: 200 },
            { field: "#", title: "Sponsor", textAlign: "center", width: 200 },
            {
                field: "#", title: "Waktu Dimulai", sortable: false, textAlign: "center", template: function (t) {
                    return t.WaktuDimulai != null ? Common.Format.Date(t.WaktuDimulai) : "-"
                }
            },
            {
                field: "#", title: "Waktu Selesai", sortable: false, textAlign: "center", template: function (t) {
                    return t.WaktuSelesai != null ? Common.Format.Date(t.WaktuSelesai) : "-"
                }
            },
            { field: "#", title: "Kritik dan Saran", textAlign: "center", width: 200 },
        ]
    })
    }
}

var Graph = {
    Persentase: function (dataPersentase){
        // Themes begin
        function am4themes_animated(target) {
            if (target instanceof am4core.ColorSet) {
                target.list = [
                am4core.color("#34bfa3"),
                am4core.color("#f4516c")
                ];
            }
        }
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("persentaseTotalProyekSelesai", am4charts.PieChart);

        // Add data
        chart.data = [ 
            {
                "Status": "Selesai",
                "Persentase": dataPersentase.persentaseSelesai   
            },
            {
                "Status": "Belum",
                "Persentase": dataPersentase.persentaseBelumSelesai
            }
        ];

        // Set inner radius
        chart.innerRadius = am4core.percent(50);

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "Persentase";
        pieSeries.dataFields.category = "Status";
        pieSeries.slices.template.stroke = am4core.color("#fff");
        pieSeries.slices.template.strokeWidth = 2;
        pieSeries.slices.template.strokeOpacity = 1;
        pieSeries.labels.template.disabled = true;
        pieSeries.ticks.template.disabled = true;
        pieSeries.slices.template.tooltipText = "{category}: {value}[/]%";

        // This creates initial animation
        pieSeries.hiddenState.properties.opacity = 1;
        pieSeries.hiddenState.properties.endAngle = -90;
        pieSeries.hiddenState.properties.startAngle = -90;

        chart.legend = new am4charts.Legend();
        chart.legend.position = "top";
    },
    ReviewCustomer: function (){
        // Themes begin
        function am4themes_animated(target) {
            if (target instanceof am4core.ColorSet) {
                target.list = [
                am4core.color("#5a8dde"),
                am4core.color("#67b7dc"),
                am4core.color("#f46751"),
                am4core.color("#f4516c"),
                am4core.color("#ef173a")
                ];
            }
        }
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("chartReviewCustomer", am4charts.XYChart);

        // Add data
        chart.data = [ 
            {
                "pertanyaan": "1",
                "sangatmemuaskan": 3,
                "memuaskan": 2,
                "sedang": 4,
                "tidakmemuaskan":2,
                "sangattidakmemuaskan":1    
            }, 
            {
                "pertanyaan": "2",
                "sangatmemuaskan": 2,
                "memuaskan": 3,
                "sedang": 5,
                "tidakmemuaskan":3,
                "sangattidakmemuaskan":2    
            }, 
            {
                "pertanyaan": "3",
                "sangatmemuaskan": 3,
                "memuaskan": 3,
                "sedang": 2,
                "tidakmemuaskan":1,
                "sangattidakmemuaskan":2    
            },
            {
                "pertanyaan": "4",
                "sangatmemuaskan": 4,
                "memuaskan": 2,
                "sedang": 1,
                "tidakmemuaskan":3,
                "sangattidakmemuaskan":2
            },
            {
                "pertanyaan": "5",
                "sangatmemuaskan": 5,
                "memuaskan": 2,
                "sedang": 1,
                "tidakmemuaskan":3,
                "sangattidakmemuaskan":4
            },
            {
                "pertanyaan": "6",
                "sangatmemuaskan": 2,
                "memuaskan": 3,
                "sedang": 1,
                "tidakmemuaskan":1,
                "sangattidakmemuaskan":2
            },
            {
                "pertanyaan": "7",
                "sangatmemuaskan": 5,
                "memuaskan": 1,
                "sedang": 2,
                "tidakmemuaskan":3,
                "sangattidakmemuaskan":5
            },
            {
                "pertanyaan": "8",
                "sangatmemuaskan": 5,
                "memuaskan": 1,
                "sedang": 2,
                "tidakmemuaskan":3,
                "sangattidakmemuaskan":5
            },
            {
                "pertanyaan": "9",
                "sangatmemuaskan": 5,
                "memuaskan": 1,
                "sedang": 2,
                "tidakmemuaskan":3,
                "sangattidakmemuaskan":5
            }
        ];

        // Create axes
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "pertanyaan";
        categoryAxis.title.text = "";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 20;
        categoryAxis.renderer.cellStartLocation = 0.1;
        categoryAxis.renderer.cellEndLocation = 0.9;

        var  valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.min = 0;
        valueAxis.title.text = "Frekuensi";

        // Create series
        function createSeries(field, name, stacked) {
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = field;
        series.dataFields.categoryX = "pertanyaan";
        series.name = name;
        series.columns.template.tooltipText = "{name}: [bold]{valueY}[/]";
        series.stacked = stacked;
        series.columns.template.width = am4core.percent(95);
        }

        createSeries("sangatmemuaskan", "Sangat Memuaskan", false);
        createSeries("memuaskan", "Memuaskan", false);
        createSeries("sedang", "Sedang", false);
        createSeries("tidakmemuaskan", "Tidak Memuaskan", false);
        createSeries("sangattidakmemuaskan", "Sangat Tidak Memuaskan", false);

        // Add legend
        chart.legend = new am4charts.Legend();
    }
}

var DashboardBulan = function(data) {
    return {
        init:function(data) {
            var e,
            t;
            console.log("la la la");
            !function() {
                $("#m_chart_daily_sales").remove();
                $(".chart").append('<canvas id="m_chart_daily_sales" width="282" height="120" class="chartjs-render-monitor" style="display: block; width: 282px; height: 120px;"></canvas>');
                var e=$("#m_chart_daily_sales");
                if(0!=e.length) {
                    var t= {
                        labels:["Januari",
                        "Februari",
                        "Maret",
                        "April",
                        "Mei",
                        "Juni",
                        "Juli",
                        "Agustus",
                        "September",
                        "Oktober",
                        "November",
                        "Desember"],
                        datasets:[ {
                            backgroundColor: mApp.getColor("success"), data: data
                        }
                        ,
                        {
                            backgroundColor: "#f3f3fb", data: data
                        }
                        ]
                    }
                    ;
                    new Chart(e, {
                        type:"bar", data:t, options: {
                            title: {
                                display: !1
                            }
                            , tooltips: {
                                intersect: !1, mode: "nearest", xPadding: 10, yPadding: 10, caretPadding: 10
                            }
                            , legend: {
                                display: !1
                            }
                            , responsive:!0, maintainAspectRatio:!1, barRadius:4, scales: {
                                xAxes:[ {
                                    display: !1, gridLines: !1, stacked: !0
                                }
                                ], yAxes:[ {
                                    display: !1, stacked: !0, gridLines: !1
                                }
                                ]
                            }
                            , layout: {
                                padding: {
                                    left: 0, right: 0, top: 0, bottom: 0
                                }
                            }
                        }
                    }
                    )
                }
            }
            ()
        }
    }
}();