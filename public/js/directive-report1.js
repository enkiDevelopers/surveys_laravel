window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
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
            {y: <?php echo $porcentajeavance ?>, label: "Avance General"},
            {y: <?php echo 100-$porcentajeavance ?>, label: "Avance restante"}

        ]
    }]
});

chart.render();



var chart2 = new CanvasJS.Chart("chartContaineralum", {
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
            {y: <?php echo $porcentajeavancealum ?>, label: "Avance General Alumnos"},
            {y: <?php echo 100-$porcentajeavancealum ?>, label: "Avance Restante Alumnos"}

        ]
    }]
});

chart2.render();

var chart3 = new CanvasJS.Chart("chartContaineremp", {
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
            {y: <?php echo $porcentajeavanceemp ?>, label: "Avance General Alumnos"},
            {y: <?php echo 100-$porcentajeavanceemp ?>, label: "Avance Restante Alumnos"}

        ]
    }]
});

chart3.render();

}