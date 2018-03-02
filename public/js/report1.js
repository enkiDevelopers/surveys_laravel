function sltlinea(busq){
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
  let id = busq;
  var idencuesta=document.getElementById("idencuesta").value;
  var campus=document.getElementById("campus").value;
 
        $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/buscarlinea',
              data : {"id": id,
                      "idencuesta":idencuesta,
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


function sltmodalidades(busq){

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
  let id = busq;
  var idencuesta=document.getElementById("idencuesta").value;
  var campus=document.getElementById("campus").value;
 
        $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/buscarmodalidad',
              data : {"id": id,
                      "idencuesta":idencuesta,
                      "campus":campus},
              async:true,
              cache:false,
              beforeSend: function () {
                $("#cargar").html("Cargando Regiones...");
              },
              success : function(response){
              console.log(response["infot"].length);
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
                  /*  dato+="<td>"+json[i].lineaNegocio+"</td>"
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