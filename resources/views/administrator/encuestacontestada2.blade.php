<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->

    <link href="https://fonts.gstatic.com/s/sourcesanspro/v11/toadOcfmlt9b38dHJxOBGEo0As1BFRXtCDhS66znb_k.woff2" rel="stylesheet">
    <link rel="stylesheet" href="https://fast.fonts.net/dv2/14/aad99a1f-7917-4dd6-bbb5-b07cedbff64f.woff2?d44f19a684109620e484167aa490e818127967a40bc2a6fac3cbfea16366c1393256e6a15be66022bd821b1eda7393f8e9df4393864db74885e8b0829bf26e9d6438d26a78ffa8c8630c7bee60ac8d2e0568b628d79fdac296a0b9874646cee94bcc34f1bc25612dab41b048fb76e05399473a60cf2d59d47dde1607d92967378b209725af01b53de0ac8e78bdfe8b6aabde76e6e052e95a06ebbfc83ce0ba708b202b91c5f9df590ce68d29e7e6c6ba988b3070cad9f20a19361c284bdbf9f930d214bb6c8c808f3722183a7155484c2895126663fa93c45be33d0c78ccf06fc7be5efd6ad0a72205&projectId=6915cd0f-6232-45f4-ba0e-01f23e4e8215">
    <link href='https://fonts.gstatic.com/s/sourcesanspro/v11/ODelI1aHBYDBqgeIAH2zlNV_2ngZ8dMf8fLgjYEouxg.woff2' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/sweetalert.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="/js/sweetalert.min.js"></script>
    <style type="text/css">
            html,body { 
            overflow:hidden; 
            }
            .col-center{
                float: none;
                margin: 0 auto;
            }
    </style>
</head>
<body>
    <div class="row">
            <div class="col-md-12" >
                    <img src="\img/default_questions.png" width="100%" height="50px">
                    <div class="col-md-5">
                            <img src="\img/UVM_Logo.jpg" class="img-responsive" width="100%" height="100%;">
                    </div>
            </div> 

            <div class="col-md-6 col-center" style="margin-top:100px;">
                <center>
                <p>Usted ya ha contestado esta encuesta <strong>¡Muchas Gracias!</strong></p>
                <a class="btn btn-primary btn-lg" href="{{ url('/logout') }}">Salir</a>
                </center>
            </div>
    </div>
</body>
</html>