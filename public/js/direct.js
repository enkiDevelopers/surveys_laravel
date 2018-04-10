function imagen(){
     $('#file-input').change(function(e) {
         addImage(e);
        });

        function addImage(e){
         var file = e.target.files[0],
         imageType = /image.*/;

         if (!file.type.match(imageType))
         {
           swal({
              title: "Su archivo no es una imagen",
              type: "error",
               });

               return;
         }
         var reader = new FileReader();
         reader.onload = fileOnload;
         reader.readAsDataURL(file);
        }

        function fileOnload(e) {
         var result=e.target.result;
         $('#imgSalida2').attr("src",result);
        }

     }
