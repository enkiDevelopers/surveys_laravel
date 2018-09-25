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
                    imagen+="<img class='card-img-top' style='border-radius: 10px;' alt='Card image cap' src='/img/iconos/"+response["0"].imagePath+"' width='50%' height='90px' onerror=\"this.src='/img/Por_Ti_EXPERIENCIA_UVM.png'\">";

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
                    imagen+="<img class='card-img-top' style='border-radius:150px;' alt='Card image cap' src='/img/iconos/"+response["0"].imagePath+"' width='50%' height='90px' onerror=\"this.src='/img/Por_Ti_EXPERIENCIA_UVM.png'\">";

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
            var dirt = $('select[name="cmbcampus"] option:selected').text();
            var cmbre =$('select[name="cmbregion"] option:selected').text();
            var url = 'http://uvmmejoraporti.mx/UVM_Dashboard/Dashboard.php?idE='+id+"&Region='"+dirt+"'"+"&Campus='"+cmbre+"'";
            var ventana=window.open(url,'_blank');
            ventana.focus();
        }
        function getURLRegion(){
            var id   = document.getElementById('idencues').innerText;
            var cmbre =$('select[name="cmbregion"] option:selected').text();
            var url = 'http://uvmmejoraporti.mx/UVM_Dashboard/Dashboard.php?idE='+id+"&Region='"+cmbre+"'";
            var ventana=window.open(url,'_blank');
            ventana.focus();
        }

        function getURLCorp(id,dirt,cmbre){
            //var id=document.getElementById('variable').innerText;
            //var dirt=$('select[name="cmbregioncorp"] option:selected').text();
            //var cmbre =$('select[name="regionescorp"] option:selected').text();
            var url = 'http://uvmmejoraporti.mx/UVM_Dashboard/Dashboard.php?idE='+id+"&Region='"+dirt+"'"+"&Campus='"+cmbre+"'";
            var ventana=window.open(url,'_blank');
            ventana.focus();
        }
        function getURLRegionCorp(id,cmbre){
            //var id   = document.getElementById('variable').innerText;
            //var cmbre=$('select[name="cmbregioncorp"] option:selected').text();
            var url = 'http://uvmmejoraporti.mx/UVM_Dashboard/Dashboard.php?idE='+id+"&Region='"+cmbre+"'";
            var ventana=window.open(url,'_blank');
            ventana.focus();
        }
        function getURLGeneral(id){
            //var id   = document.getElementById('variable').innerText;
            var url = 'http://uvmmejoraporti.mx/UVM_Dashboard/Dashboard.php?idE='+id;
            var ventana=window.open(url,'_blank');
            ventana.focus();
        }
