var today = new Date();
var tahun = today.getFullYear();

jQuery(document).ready(function () {
  Control.Init();
  Table.Init();
  GetData.Init(tahun);
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
                
                var jumlahProyek = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                $.each(data.statistikBulanan, function(index, item){
                    jumlahProyek[item.Bulan - 1] = item.TotalProyek;
                })
                DashboardBulan.init(jumlahProyek);

                Graph.Persentase(data);

                $("#totalProyek").html(data.totalProyek);
                $("#totalProyekSelesai").html(data.totalProyekSelesai);
                $("#totalProyekBerlangsung").html(data.totalProyekBerlangsung);
                
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
  }
}

var DashboardBulan = function(data) {
    return {
        init:function(data) {
            var e,
            t;
            console.log("la la la");
            !function() {
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