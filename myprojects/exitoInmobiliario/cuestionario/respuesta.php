<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"> 
    <title>Éxito inmobiliario</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/quality.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!--Sweet Alert -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>



<?php 
require '../server/connectdb.php';

if(isset($_GET['correo']) && !empty($_GET['correo']) AND isset($_GET['hash']) && !empty($_GET['hash'])){ 
                         $hash = $_GET['hash'];
                         $correoo = $_GET['correo'];
                         $nomm = $_GET['nombre'];
                         $sql = "SELECT `correo`, `hash` FROM Formulario  WHERE `correo` = '$correoo' AND `hash`='$hash';";
                         $result = mysqli_query($db, $sql); 

                            if(mysqli_num_rows($result) == 1)
                            {



?>





<body id="page-top" class="mailResponse">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="img/logo.svg"></a>
            </div>
            <h1>¡Éxito Inmobiliario Ya!</h1>

            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container whiteBg">
        <div class="intro-text">
            <div class="col-md-5">
                <div class="videoQltMail">
                    <iframe src="https://www.youtube.com/embed/BVthJY8wTmM" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-7">
                
                    <h2 class="text-left"><b style= "text-transform: uppercase;">  <?php echo $nomm ?></b>, GRACIAS POR <b>TU INTERÉS</b></h2>
                    <p class="textResponse">Si estás interesado en aprender a comercializar inmuebles, déjanos tus datos:</p>

                    <form  id="cuestion"  class="infoForm row">
                    <div class="col-xs-12">
                        <input type="text" name="mail" class="form-control" readonly="form-control" value ="<?php echo $correoo; ?>">
                    </div>

                    <div class="col-xs-12">
                        <input type="text" name="nom"  class="form-control" placeholder="Nombre completo">
                    </div>
                    <div class="col-sm-12">
                        <input type="text" name="ciudaduser" class="form-control" placeholder="Ciudad">
                    </div>

                    <div class="col-sm-12">
                        <input type="text" name="tel" class="form-control" placeholder="Número Telefónico (celular de preferencia)">
                    </div>


                    <div class="col-sm-12">
                        <p class="inmo">¿Tienes conocimiento del sector inmobiliario?</p>
                    </div>
                     <div class="col-sm-7 col-xs-5">
                        <select name="conocimientoInmobil">
                          <option  value="si" selected>Si</option>
                          <option  value="no" >No</option>

                        </select>
                    </div>

                    <div class="col-sm-12">

                          <p   class="inmo">¿Cuál es la principal razón por la que estás interesado en el negocio inmobiliario?</p>
                          <input type="text" rows="3" name="PrincipalRazon" class="form-control">
                    </div>
                

                    <div class="col-sm-12">

                    <p class="inmo" >¿Cuál es tu objetivo de ingresos mensuales con la comercialización de inmuebles?</p>
                    <input type="text" name="ObjIngresos" class="form-control">
                    </div>

                    <div class="col-sm-12">
                       <p class="inmo" >¿Cuál crees que es el MAYOR obstáculo que ha impedido que aument​es​ rápidamente tus ingresos?</p>
                       <input type="text" name="MayorObstaculo" class="form-control">
                    </div>

                    

                    <div  class="col-sm-12">
                            Si alguien te aconsejara a invertir $700  dólares en un sistema probado para triplicar tus ingresos por medio de los bienes raíces, tú:
                            <br><input type="radio" name="OpcionRespuesta" value="Tienes los recursos financieros para invertir en un entrenamiento de educación financiera que te permita triplicar tus ingresos por medio de los bienes raíces."  > "Tienes los recursos financieros para invertir en un entrenamiento de educación financiera que te permita triplicar tus ingresos por medio de los bienes raíces."<br>
                            <input type="radio" name="OpcionRespuesta" value="No cuentas con recursos, pero estás muy interesado y buscarás la manera de conseguirlos para aprender a triplicar tus ingresos en bienes raíces." > "No cuentas con recursos, pero estás muy interesado y buscarás la manera de conseguirlos para aprender a triplicar tus ingresos en bienes raíces."<br>
                    </div>

                    <div class="col-xs-12 text-center">
                        <button class="submQual" type="submit" value="ENVIAR">ENVIAR</button>
                    </div>
               </form> 
            </div>
        </div>
    </div>


    <?php }  } else{ ?>


    <body id="page-top" class="index errorPg">

                                    
                                    <div class="container floatBg">
                                            <div class="intro-text">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <h2>LO SENTIMOS, <b>NO TIENES ACCESO A ESTA PAGINA</b></h2>
                                                        <p class="textResponse">Inténtalo de nuevo, o regresa a la <a href="/exitoInmobiliario/">página principal</a></p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
  <?php } ?>



    <div id="AjaxAct"></div>
    
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6 text-right">
                  <strong class="transformar"><a href="#">Aviso de privacidad</a></strong>
                </div>
                <div class="col-xs-6 text-left">
                Powered by <a target="#blank" href="http://concepthaus.mx/">CONCEPT HAUS</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
         $(document).click(function (event) {
          var clickover = $(event.target);
          var $navbar = $(".navbar-collapse");               
          var _opened = $navbar.hasClass("in");
          if (_opened === true && !clickover.hasClass("navbar-toggle")) {      
              $navbar.collapse('hide');
          }
      });
     </script>

     <script>
         var maxLength = 160;
            $('#largeText > option').text(function(i, text) {
                if (text.length > maxLength) {
                    return text.substr(0, maxLength) + '...';
                }
            });
     </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

       <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>

            <!-- Plugin JavaScript -->
            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
            
           
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>       
          




    <!--Cuestionario action -->
            <script>
                 $(function(){
                    var form = $('form#cuestion');
                    form.submit(function(e){
                        e.preventDefault();
                        dataString = form.serialize();

                        $.ajax({
                            type:'POST',
                            url:'../server/Cuestionario.php',
                            data: dataString,
                            beforeSend: function(){
                               swal({   title: "Procesando",   
                                        text: "Estamos validando tus datos...", 
                                       showConfirmButton: false });
                                
                             },
                            success:function(data){
                                $('#AjaxAct').replaceWith(data);
                                
                            },
                            complete:function(){


                            }
                        });
                        return false;
                    })
                }) ;
     </script>

</body>

</html>
