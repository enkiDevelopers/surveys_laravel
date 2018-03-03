window.onload = function () {

/*var chart = new CanvasJS.Chart("chartContainer", {
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
    
            



        ]
    }]
});
chart.render();*/


/*function toggleDataSeries(e) {
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    }
    else {
        e.dataSeries.visible = true;
    }
    chart.render();
}*/
/*var chart = new CanvasJS.Chart("chartContainergrl", {
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

        ]
    }]
});

chart.render();*/



/*var chart2 = new CanvasJS.Chart("chartContaineralum", {
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

        ]
    }]
});

chart3.render();*/

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
  var idencuesta=document.getElementById("idencuesta").value;
  var region=document.getElementById("region").value;
 
        $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/buscargeneralr',
              data : {"idencuesta":idencuesta,
                      "region":region},
              async:true,
              cache:false,
              beforeSend: function () {
                $("#cargar").html("Cargando Regiones...");
              },
              success : function(response){
              //console.log(response["infot"]);
              leg=response["infot"].length;
              var dato="";
              i=0;
              //var ENC=0; FAL=0;  Total=0;  SIS=0;  OLN=0;  CNX=0;  FBK=0;  HP12=0; EMAIL=0;  PRM=0;  DET=0;  NPS=0;  Avance=0;
              var json=jQuery.parseJSON(JSON.stringify(response["infot"]));
              var json2=jQuery.parseJSON(JSON.stringify(response["info"]));//completo
              while(i<leg){
                  var ENC=0; FAL=0;  Total=0;  SIS=0;  OLN=0;  CNX=0;  FBK=0;  HP12=0; EMAIL=0;  PRM=0;  DET=0;  NPS=0;  Avance=0;
                  for(post in json2){
                    if(json[i].modalidad==json2[post].modalidad){
                      Total++;
                    if(json2[post].contestado=="1"){
                      ENC++;
                    }
                    if(json2[post].contestado=="0"){
                      FAL++;
                    }
                    if(json2[post].canal=="sistema"){
                      SIS++;
                    }
                    if(json2[post].canal=="online"){
                      OLN++;
                    }
                    if(json2[post].canal=="conexion"){
                      CNX++;
                    }
                    if(json2[post].canal=="facebook"){
                      FBK++;
                    }
                    if(json2[post].canal=="hp12c"){
                      HP12++;
                    }
                    if(json2[post].canal=="mail"){
                      EMAIL++;
                    } 
}

                  }
                                    Avance=(100*ENC)/Total;
                    dato +="<tr>"
                    dato+="<td>"+json[i].lineaNegocio+"</td>"
                    dato+="<td>"+json[i].modalidad+"</td>"
                    dato+="<td>"+ENC+"</td>"
                    dato+="<td>"+FAL+"</td>"
                    dato+="<td>"+ENC+"</td>"
                    dato+="<td>"+SIS+"</td>"
                    dato+="<td>"+OLN+"</td>"
                    dato+="<td>"+CNX+"</td>"
                    dato+="<td>"+FBK+"</td>"
                    dato+="<td>"+HP12+"</td>"
                    dato+="<td>"+EMAIL+"</td>"
                   /* dato+="<td>"+json[i].lineaNegocio+"</td>"
                    dato+="<td>"+json[i].lineaNegocio+"</td>"
                    dato+="<td>"+json[i].lineaNegocio+"</td>"*/
                    dato+="<td>"+Avance+"%"+"</td>"
                    dato +="</tr>";
                  $("#tabla").html(dato);
                  i++;
}
                
              },
              error : function(error) {
                console.log(error);
              }
          });


}