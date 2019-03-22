jQuery(document).ready(function () {
    // Control.Init();
    Graph.Performa();
});

var Control = {
    Init: function () {
        $('#tbxTahun').keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                var tahun = $("#tbxTahun").val();
                // GetData.Init(tahun); 
            }
        });
        $("#btnSearch").click(function(){
            var tahun = $("#tbxTahun").val();
            // GetData.Init(tahun);
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
                    // DashboardBulan.init(jumlahProyek);

                    // Graph.Persentase(data);

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

var Graph = {
    Performa: function (){
        // Themes begin
        function am4themes_animated(target) {
            if (target instanceof am4core.ColorSet) {
                target.list = [
                am4core.color("#67b7dc"),
                am4core.color("#5a8dde"),
                am4core.color("#f4516c")
                ];
            }
        }
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("chartPerformaAnalis", am4charts.XYChart);

        // Add data
        chart.data = [ {
        "analis": "Rio Al Rasyid",
        "analisisbiasa": 3,
        "analisisdipercepat": 2,
        "menyelia": 4
        
        }, {
        "analis": "Rizky Subagja",
        "analisisbiasa": 2,
        "analisisdipercepat": 3,
        "menyelia": 5
        
        }, {
        "analis": "Rio Subagja",
        "analisisbiasa": 3,
        "analisisdipercepat": 3,
        "menyelia": 2
        
        } ];

        // Create axes
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "analis";
        categoryAxis.title.text = "";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 20;
        categoryAxis.renderer.cellStartLocation = 0.1;
        categoryAxis.renderer.cellEndLocation = 0.9;

        var  valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.min = 0;
        valueAxis.title.text = "Jumlah Tugas yang dikerjakan";

        // Create series
        function createSeries(field, name, stacked) {
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = field;
        series.dataFields.categoryX = "analis";
        series.name = name;
        series.columns.template.tooltipText = "{name}: [bold]{valueY}[/]";
        series.stacked = stacked;
        series.columns.template.width = am4core.percent(95);
        }

        createSeries("analisisbiasa", "Analisis Biasa", false);
        createSeries("analisisdipercepat", "Analisis Dipercepat", true);
        createSeries("menyelia", "Sebagai Penyelia", false);

        // Add legend
        chart.legend = new am4charts.Legend();
    }
}