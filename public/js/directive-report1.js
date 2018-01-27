window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title:{
        text: "Reporte de Región"
    },  
    axisY: {
        title: "Encuestas contestadas",
        titleFontColor: "#4F81BC",
        lineColor: "#4F81BC",
        labelFontColor: "#4F81BC",
        tickColor: "#4F81BC"
    },

    toolTip: {
        shared: true
    },
    legend: {
        cursor:"pointer",
        itemclick: toggleDataSeries
    },
    data: [{
        type: "column",
        name: "Encuestas contestadas",
        legendText: "Encuestas contestadas",
        showInLegend: true, 
        dataPoints:[
    <?php
        foreach ($estadisticas as $estadistica) {
            $dato=$estadistica->total_contestados+$estadistica->total_incidentes;
            echo "{ label: ".'"'.$estadistica->campus_name.'"'.",y: ".$dato."},\n";
        }
    ?>

        ]
    },
    {
        type: "column", 
        name: "Encuestas aun no contestadas",
        legendText: "Encuestas aun no contestadas",
        showInLegend: true,
        dataPoints:[
    <?php
        foreach ($estadisticas as $estadistica) {
            $faltante=$estadistica->total_encuestados-($estadistica->total_contestados+$estadistica->total_incidentes);
            echo "{ label: ".'"'.$estadistica->campus_name.'"'.",y: ".$faltante."},\n";
        }
    ?>
            



        ]
    }]
});
chart.render();


function toggleDataSeries(e) {
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    }
    else {
        e.dataSeries.visible = true;
    }
    chart.render();
}
var chart = new CanvasJS.Chart("chartContainergrl", {
    backgroundColor: "transparent",
    animationEnabled: true,
    title: {
        text: "Avance General en la Región"
    },

    data: [{
        type: "pie",
        startAngle: 90,
        yValueFormatString: "##0.00\"%\"",
        indexLabel: "{label} {y}",
        dataPoints: [
            {y:<?php echo $totalgrl ?> , label: "Avance General"},
            {y:<?php echo 100-$totalgrl ?>, label: "Restante"}

        ]
    }]
});

chart.render();



var chart2 = new CanvasJS.Chart("chartContaineralum", {
    backgroundColor: "transparent",
    animationEnabled: true,
    title: {
        text: "Avance General Alumnos en la Region"
    },
    data: [{
        type: "pie",
        startAngle: 90,
        yValueFormatString: "##0.00\"%\"",
        indexLabel: "{label} {y}",
        dataPoints: [
            {y: <?php echo $totalalum?> , label: "Avance General Alumnos"},
            {y: <?php echo 100-$totalalum?> , label: "Restante Alumnos"}

        ]
    }]
});

chart2.render();

var chart3 = new CanvasJS.Chart("chartContaineremp", {
    backgroundColor: "transparent",
    animationEnabled: true,
    title: {
        text: "Avance General Empleados en la Region"
    },
    data: [{
        type: "pie",
        startAngle: 90,
        yValueFormatString: "##0.00\"%\"",
        indexLabel: "{label} {y}",
        dataPoints: [
            {y: <?php echo $totaltra ?> , label: "Avance General Alumnos"},
            {y: <?php echo 100-$totaltra?>, label: "Restante Empleados"}

        ]
    }]
});

chart3.render();


}