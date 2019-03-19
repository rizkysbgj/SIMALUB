jQuery(document).ready(function () {
  //Control.Init();
  Table.Init();
  Graph.Persentase();
});

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
  Persentase: function (){
    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("testChart", am4charts.PieChart);

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
  }
}