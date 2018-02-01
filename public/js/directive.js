//$("#divid").load(" #divid");

function corporativoModal(comp){
  let id = comp.id;
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
        $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/busquedamodal',
              data : {"id": id,},
              async:true,
              cache:false,
              success : function(response){
                var titulo="";
                var imagen="";
                    titulo+="<h4><b>"+response["0"].tituloEncuesta+"</b></h4>";
                    imagen+="<img class='card-img-top' style='border-radius: 10px;' alt='Card image cap' src='/img/iconos/"+response["0"].imagePath+"' width='50%' height='90px'>";

                 $("#titulo_encuesta").html(titulo);
                 $("#imagen").html(imagen);
                 $("#variable").html(id);
                $('#MdCorporativo').modal('show');

              },
              error : function(error) {
                console.log(error);
              }
          });

}

function regionalModal(comp){
  
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
        $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/busquedamodal',
              data : {"id": comp,},
              async:true,
              cache:false,
              success : function(response){
                var titulo="";
                var imagen="";

                    titulo+="<h4><b>"+response["0"].tituloEncuesta+"</b></h4>";
                    imagen+="<img class='card-img-top' style='border-radius:150px;' alt='Card image cap' src='/img/iconos/"+response["0"].imagePath+"' width='50%' height='90px'>";

                 $("#titulo_encuestar").html(titulo);
                 $("#imagenr").html(imagen);
                 $("#idencues").html(comp);

                $('#MdRegional').modal('show');

              },
              error : function(error) {
                console.log(error);

              }
          });

}

/*function campusModal(comp,region){
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
        $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/busquedamodal',
              data : {"id": comp,
                      "region":region},
              async:true,
              cache:false,
              success : function(response){
                var titulo="";
                var imagen="";
                var boton="";
                    titulo+="<h4><b>"+response["0"].Titulo_encuesta+"</b></h4>";
                    imagen+="<img class='card-img-top' style='border-radius:150px;' alt='Card image cap' src='/img/iconos/"+response[0].Image_path+"' width='50%' height='90px'>";

                 $("#titulo_encuestac").html(titulo);
                 $("#imagenc").html(imagen);
                 $("#btn").html(boton);
                 $('#MdCampus').modal('show');

              },
              error : function(error) {
                console.log(error);
              }
          });

}*/

function selecciona(busq){
  let id = busq;
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
        $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/buscarcampus',
              data : {"id": id},
              async:true,
              cache:false,
              beforeSend: function () {
                        $("#cargar").html("Cargando Regiones...");
              },
              success : function(response){
              dato="";
              var json=jQuery.parseJSON(JSON.stringify(response));
              for(post in json){
                dato+="<option value="+json[post].campus_id+">"+json[post].campus_name+"</option>"
              }
              $("#regionescorp").html(dato);
              $("#cargar").html("");


                
              },
              error : function(error) {
                console.log(error);
              }
          });

}

        function getURL(){
            var id=document.getElementById('idencues').innerText;
            var dirt = document.getElementById('cmbcampus').value;
            var url = '/campus/'+id+'/'+dirt;
            var ventana=window.open(url,'_blank');
            ventana.focus();
        }
        function getURLRegion(){
            var id   = document.getElementById('idencues').innerText;
            var cmbre = document.getElementById('cmbregion').value;
            var url = '/region/'+id+'/'+cmbre;
            var ventana=window.open(url,'_blank');
            ventana.focus();
        }

        function getURLCorp(){
            var id=document.getElementById('variable').innerText;
            var dirt = document.getElementById('regionescorp').value;
            var url = '/campus/'+id+'/'+dirt;
            var ventana=window.open(url,'_blank');
            ventana.focus();
        }
        function getURLRegionCorp(){
            var id   = document.getElementById('variable').innerText;
            var cmbre = document.getElementById('cmbregioncorp').value;
            var url = '/region/'+id+'/'+cmbre;
            var ventana=window.open(url,'_blank');
            ventana.focus();
        }
        function getURLGeneral(){
            var id   = document.getElementById('variable').innerText;
            var url = '/general/'+id;
            var ventana=window.open(url,'_blank');
            ventana.focus();
        }
   
