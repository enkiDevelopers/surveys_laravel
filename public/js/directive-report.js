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

        ]
    }]
});

chart.render();*/
<?php
    $total=0;
    $conexion2=0;
    $facebook2=0;
    $mail2=0;
    $online2=0;
    $sistema2=0;

    $total=$conexion+$facebook+$mail+$online+$sistema;
    if($total==0){

    }else{
     $conexion2=number_format((100*$conexion)/$total);
     $facebook2=number_format((100*$facebook)/$total);
     $mail2=number_format((100*$mail)/$total);
     $online2=number_format((100*$online)/$total);
     $sistema2=number_format((100*$sistema)/$total);
     $total;
 }
?>
var chart = new CanvasJS.Chart("canales", {
    backgroundColor: "transparent",
    animationEnabled: true,
    data: [{
        type: "pie",
        startAngle: 90,
        showInLegend: true,
        yValueFormatString: "##0\"\"",
        indexLabel: "{label} {y}",
        dataPoints: [
            {y: <?php echo $conexion; ?>,label:"Conexion: ["+<?php echo $conexion2; ?>+"%]"  , name: "Conexion"},
            {y: <?php echo $facebook; ?>,label:"Facebook: ["+<?php echo $facebook2; ?>+"%]"  , name: "Facebook"},
            {y: <?php echo $mail; ?>,label:"Mail: ["+<?php echo $mail2; ?>+"%]"  , name: "Mail"},
            {y: <?php echo $online; ?>,label:"Online: ["+<?php echo $online2; ?>+"%]"  , name: "Online"},
            {y: <?php echo $sistema; ?>,label:"Sistema: ["+<?php echo $sistema2; ?>+"%]"  , name: "Sistema"},

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
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
  var idencuesta=document.getElementById("idencuesta").value;
  var campus=document.getElementById("campus").value;
 
        $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/buscargeneral',
              data : {"idencuesta":idencuesta,
                      "campus":campus},
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