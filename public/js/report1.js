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
                console.log(response);
              var  dato="";
              var ENC=0; FAL=0;  Total=0;  SIS=0;  OLN=0;  CNX=0;  FBK=0;  HP12=0; EMAIL=0;  PRM=0;  DET=0;  NPS=0;  Avance=0;
              var json=jQuery.parseJSON(JSON.stringify(response));
              var json2=jQuery.parseJSON(JSON.stringify(response));
              for(post in json2){
                ENC++;
                if(json[post].contestado==0){
                  FAL++;
                }
                if(json[post].canal=="sistema"){
                  SIS++;
                }
                if(json[post].canal=="online"){
                  OLN++;
                }
                if(json[post].canal=="conexion"){
                  CNX++;
                }
                if(json[post].canal=="facebook"){
                  FBK++;
                }
                if(json[post].canal=="hp12c"){
                  HP12++;
                }
                if(json[post].canal=="mail"){
                  EMAIL++;
                } 

              }
              for(post in json){
              dato +="<tr>";
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].modalidad+"</td>"
                dato+="<td>"+ENC+"</td>"
                dato+="<td>"+FAL+"</td>"
                dato+="<td>"+ENC+"</td>"
                dato+="<td>"+SIS+"</td>"
                dato+="<td>"+OLN+"</td>"
                dato+="<td>"+CNX+"</td>"
                dato+="<td>"+FBK+"</td>"
                dato+="<td>"+HP12+"</td>"
                dato+="<td>"+EMAIL+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
              dato +="</tr>";
              }
              $("#tabla").html(dato);

                
              },
              error : function(error) {
                console.log(error);
              }
          });

}