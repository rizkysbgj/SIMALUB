var today = new Date();
var tahun = today.getFullYear();
var bulan = today.getMonth()+1;

jQuery(document).ready(function () {
    Control.Init();
    GetData.Init(tahun,bulan);

    $("#tbxTahun").val(tahun);
    $("#tbxBulan").val(bulan);
});

var Control = {
    Init: function () {
        $('#tbxTahun').keypress(function(event){
            $("#alertTahunKosong").hide();
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                if($("#tbxTahun").val() == ""){
                    $("#alertTahunKosong").show();
                    $("#alertAdaPerformaAnalis").hide();
                }
                else{
                    $("#alertAdaPerformaAnalis").show();
                    GetData.Init($("#tbxTahun").val(),$("#tbxBulan").val()); 
                }
            }
        });

        $("#btnSearch").click(function(){
            if($("#tbxTahun").val() == ""){
                $("#alertTahunKosong").show();
                $("#alertAdaPerformaAnalis").hide();
            }
            else{
                $("#alertTahunKosong").hide();
                $("#alertAdaPerformaAnalis").show();
                GetData.Init($("#tbxTahun").val(),$("#tbxBulan").val());
            }
        });
    }
}

var GetData = {
    Init: function (tahun,bulan) {
        // console.log(bulan);
        // console.log("lalala");
        $.ajax({
            url: "/api/dashboardperforma/"+ bulan +"/" + tahun,
            type: "GET",
            dataType: "json",
            contenType: "application/json",
            success: function (data) {
                Graph.Performa(data);
                // if(data.totalProyek != 0){
                //     $("#alertTidakAdaPerformaAnalis").hide();
                //     $("#alertAdaPerformaAnalis").show();
                   
                //     Graph.Performa(data);

                // }
                // else {
                //     $("#alertAdaPerformaAnalis").hide();
                //     $("#alertTidakAdaPerformaAnalis").show();
                // }
                    
            },
            error: function (xhr) {
                alert(xhr.responseText)
            }
        });
    }
}

var Graph = {
    Performa: function (data){
        // Themes begin
        function am4themes_animated(target) {
            if (target instanceof am4core.ColorSet) {
                target.list = [
                am4core.color("#5a8dde"),
                am4core.color("#34bfa3"),
                am4core.color("#f4516c")
                ];
            }
        }
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("chartPerformaAnalis", am4charts.XYChart);
        chart.data = [];

        // Add data
        $.each(data.performaList, function(index, item){
            var params = {
                NamaLengkap: item.NamaLengkap,
                TotalAnalisisPercepatan: item.TotalAnalisisPercepatan,
                TotalAnalisisBiasa: item.TotalAnalisisBiasa,
                TotalSelia: item.TotalSelia
            }
            // console.log(params);
            chart.data.push(params);
        })

        // Create axes
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "NamaLengkap";
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
        series.dataFields.categoryX = "NamaLengkap";
        series.name = name;
        series.columns.template.tooltipText = "{name}: [bold]{valueY}[/]";
        series.stacked = stacked;
        series.columns.template.width = am4core.percent(95);
        }

        createSeries("TotalAnalisisBiasa", "Analisis Biasa", false);
        createSeries("TotalAnalisisPercepatan", "Analisis Dipercepat", true);
        createSeries("TotalSelia", "Sebagai Penyelia", false);

        // Add legend
        chart.legend = new am4charts.Legend();
    }
}