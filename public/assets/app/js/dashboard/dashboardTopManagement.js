jQuery(document).ready(function () {
  //Control.Init();
  Table.Init();
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


// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("proyek", am4charts.XYChart);
chart.scrollbarX = new am4core.Scrollbar();

// Add data
chart.data = [{
  "country": "USA",
  "visits": 3025
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
}];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.labels.template.horizontalCenter = "right";
categoryAxis.renderer.labels.template.verticalCenter = "middle";
categoryAxis.renderer.labels.template.rotation = 270;
categoryAxis.tooltip.disabled = true;
categoryAxis.renderer.minHeight = 110;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.minWidth = 50;

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.sequencedInterpolation = true;
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
series.columns.template.strokeWidth = 0;

series.tooltip.pointerOrientation = "vertical";

series.columns.template.column.cornerRadiusTopLeft = 10;
series.columns.template.column.cornerRadiusTopRight = 10;
series.columns.template.column.fillOpacity = 0.8;

// on hover, make corner radiuses bigger
var hoverState = series.columns.template.column.states.create("hover");
hoverState.properties.cornerRadiusTopLeft = 0;
hoverState.properties.cornerRadiusTopRight = 0;
hoverState.properties.fillOpacity = 1;

series.columns.template.adapter.add("fill", (fill, target)=>{
  return chart.colors.getIndex(target.dataItem.index);
})

// Cursor
chart.cursor = new am4charts.XYCursor();
