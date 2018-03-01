window.onload = function() {

/*var chart = new CanvasJS.Chart("chartContainer", {
    backgroundColor: "transparent",
    animationEnabled: true,
    title: {
        text: "Avance General"
    },

    data: [{
        type: "pie",
        startAngle: 90,
        yValueFormatString: "##0.00\"%\"",
        indexLabel: "{label} {y}",
        dataPoints: [
            {y: <?php echo $porcentajeavance; ?>  , label: "Avance General"},
            {y: <?php echo 100-$porcentajeavance; ?>, label: "Restante"},

        ]
    }]
});

chart.render();*/

var chart = new CanvasJS.Chart("canales", {
    backgroundColor: "transparent",
    animationEnabled: true,
    data: [{
        type: "pie",
        startAngle: 90,
        showInLegend: true,
        yValueFormatString: "##0.00\"\"",
        indexLabel: "{label} {y}",
        dataPoints: [
            {y: <?php echo $conexion; ?>,label:"Conexion"  , name: "Conexion"},
            {y: <?php echo $facebook; ?>,label:"Facebook"  , name: "Facebook"},
            {y: <?php echo $hp12c; ?>,label:"HPC12C"  , name: "HP12C"},
            {y: <?php echo $mail; ?>,label:"Mail"  , name: "Mail"},
            {y: <?php echo $online; ?>,label:"Online"  , name: "Online"},
            {y: <?php echo $sistema; ?>,label:"Sistema"  , name: "Sistema"},

        ]
    }]
});

chart.render();

/*var chart2 = new CanvasJS.Chart("chartContaineralum", {
    backgroundColor: "transparent",
    animationEnabled: true,
    title: {
        text: "Avance General Alumnos"
    },
    data: [{
        type: "pie",
        startAngle: 90,
        yValueFormatString: "##0.00\"%\"",
        indexLabel: "{label} {y}",
        dataPoints: [
            {y: '<?php echo $porcentajeavancealum; ?>', label: "Avance General Alumnos"},
            {y: '<?php echo 100-$porcentajeavancealum; ?>', label: "Restante Alumnos"}

        ]
    }]
});

chart2.render();*/

/*var chart3 = new CanvasJS.Chart("chartContaineremp", {
    backgroundColor: "transparent",
    animationEnabled: true,
    title: {
        text: "Avance General Empleados"
    },
    data: [{
        type: "pie",
        startAngle: 90,
        yValueFormatString: "##0.00\"%\"",
        indexLabel: "{label} {y}",
        dataPoints: [

        ]
    }]
});

chart3.render();*/

}