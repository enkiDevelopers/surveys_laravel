@extends('layouts.app')
<style>

@import 'https://code.highcharts.com/css/highcharts.css';

#container {
    height: 400px;
    max-width: 800px;
    margin: 0 auto;
}

/* Link the series colors to axis colors */
.highcharts-color-0 {
    fill: #DE0D0D;
    stroke: #DE0D0D;
}
.highcharts-axis.highcharts-color-0 .highcharts-axis-line {
    stroke: #DE0D0D;
}
.highcharts-axis.highcharts-color-0 text {
    fill: #DE0D0D;
}
.highcharts-color-1 {
    fill: #8a9cb1;
    stroke: #8a9cb1;
}
.highcharts-axis.highcharts-color-1 .highcharts-axis-line {
    stroke: #8a9cb1;
}
.highcharts-axis.highcharts-color-1 text {
    fill: #8a9cb1;
}


.highcharts-yaxis .highcharts-axis-line {
    stroke-width: 2px;
}
</style>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
@section('content')


<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

<br><br><br><br><br>
<div id="container2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

<br><br><br><br><br>



<div id="container3" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>




<script>
// Radialize the colors
Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});

// Build the chart
Highcharts.chart('container2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Reporte del coorporativo'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                },
                connectorColor: '#8a9cb1'
            }
        }
    },
    series: [{
        name: 'Brands',
        data: [

            { name: 'Estudiantes <br> Encuestados', y: 50 },
            { name: 'Estudiantes <br> No Encuestados', y: 100 }
        ]
    }]
});


    Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Reporte  Regional'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                },
                connectorColor: '#8a9cb1'
            }
        }
    },
    series: [{
        name: 'Brands',
        data: [

            { name: 'Pregunta 1', y: 50 },
            { name: 'Pegunta 2', y: 100 },
            { name: 'Pregunta 3', y: 10 },
            { name: 'Pregunta 4', y: 14 }
        ]
    }]
});



    Highcharts.chart('container3', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Reporte Campus Norte'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                },
                connectorColor: '#8a9cb1'
            }
        }
    },
    series: [{
        name: 'Brands',
        data: [

            { name: 'Estudiantes <br> Encuestados', y: 50 },
            { name: 'Estudiantes <br> No Encuestados', y: 10 },
        ]
    }]
});

    </script>

    @endsection
