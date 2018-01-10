<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>borrar</title>
  </head>
  <body>

        <h4>
        </h4>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <input type="file" name="upload" onchange="validaArchivo(this,1);"><br /><br />
        <span></span><br /><br />
        <img width="200" alt="Imagen" />


<script type="text/javascript">
function validaArchivo(tField,iType){
    file=tField.value;
    if (iType==1) {
        extArray = new Array(".gif",".jpg",".png");
        }
    if (iType==2) {
        extArray = new Array(".swf");
    }
    if (iType==3) {
        extArray = new Array(".exe",".sit",".zip",".tar",".swf",".mov",".hqx",".ra",".wmf",".mp3",".qt",".med",".et");
    }
    if (iType==4) {
        extArray = new Array(".mov",".ra",".wmf",".mp3",".qt",".med",".et",".wav");
    }
    if (iType==5) {
        extArray = new Array(".html",".htm",".shtml");
    }
    if (iType==6) {
        extArray = new Array(".xls");
    }
    allowSubmit = false;

    if (!file) return;
    while (file.indexOf("\\") != -1) file = file.slice(file.indexOf("\\") + 1);
    ext = file.slice(file.indexOf(".")).toLowerCase();
    for (var i = 0; i < extArray.length; i++) {
            if (extArray[i] == ext) {
            allowSubmit = true;
            break;
            }
    }
    if (allowSubmit) {
      $(document).on('change', 'input[type=file]', function(e) {
        // Obtenemos la ruta temporal mediante el evento
        var TmpPath = URL.createObjectURL(e.target.files[0]);
        // Mostramos la ruta temporal
        $('span').html(TmpPath);
        $('img').attr('src', TmpPath);
      });
    } else {
    tField.value="";
    alert("Usted solo puede subir archivos con extensiones " + (extArray.join(" ")) + "\nPor favor seleccione otro archivo");
    }
}

</script>

  </body>
</html>
