@extends('layouts.directive')

@section('content')
<div class="row">
    <div class="container">
        <div class="col-md-10">
            <div id="container" class="col-md-12"></div>
        </div>
    </div>
</div>
@php
$q1a=10;
$q1b=20;

@endphp


    <script src="/js/highcharts.js"></script>
    <script src="/js/exporting.js"></script>
    <script type="text/javascript">
        Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: null,
            type: 'pie'
        },
        title: {
            text: 'Campus Norte '
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:.0f} puntos </b>'
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
                    }
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Puntos Encuesta',
            colorByPoint: true,
            data: [{
                name: 'Si',
                y: {{$q1a}}
            }, {
                name: 'No',
                y: {{$q1b}}
            }]
        }]
        });
    </script>

@endsection
