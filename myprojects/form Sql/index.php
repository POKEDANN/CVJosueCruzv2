<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Depilacion</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
            <img alt="Brand" src="img/logo.png">
          </a>
        </div>
      </div>
    </nav>

    <section id="mainBg">
      <div class="container">
        <div class="row">
          <strong class="frase"><p class="vello">¡Sin VELLO</strong> <span class="siempre">para siempre!</span></p>
          <div class="col-sm-7">
            <p class="fraseDos"><strong>Depilación definitiva</strong> y <strong>Rejuvenecimiento</strong> de la piel</p>
            <p class="lista"><img src="img/bullets-01.png" class="palomita"> Protocolo exclusivo y patentado</p>
            <p class="lista"><img src="img/bullets-01.png" class="palomita"> Resultados en tan solo 6 sesiones</p>
            <p class="lista"><img src="img/bullets-01.png" class="palomita"> Paquetes ilimitados</p>
          </div>
          <div class="col-sm-5 formulario">
            <form action="./contacto.php" method="post">
              <p class="formTit">Diagnóstico personalizado y sesión de prueba gratis</p>
              <div class="form-group">
                <input class="form-control" id="name" name="name" placeholder="Nombre y apellido">
              </div>
              <div class="form-group">
                <input class="form-control" id="email" name="email" placeholder="Correo Electrónico">
              </div>
              <div class="form-group">
                <input class="form-control" id="cel" name="cel" placeholder="Celular">
              </div>
              <div class="checkbox">
                <p class="rosa">Horario de contacto</p>
                <label>
                  <input type="checkbox" value="1" name="horario[]">Mañana
                </label>
                <label>
                  <input type="checkbox" value="2" name="horario[]">Tarde
                </label>
                <label>
                  <input type="checkbox" value="4" name="horario[]">Noche
                </label>
              </div>
              <p class="rosa">Sucursal</p>
              <select name="sucursal">
                <option value="polanco">Polanco</option>
                <option value="condesa">La Condesa</option>
                <option value="roma">Roma</option>
              </select>
              <button type="submit" name="iniciar" class="btn btn-default tratBtn">Iniciar tratamiento >></button>
            </form>
              <p class="text-right aviso">Aviso de privacidad | Menciones Legales</p>
          </div>
        </div>
      </div>
    </section>

    <section class="fraseTres">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <p class="text-center mexico">!Únicos en todo México en garantizar los resultados definitivos!</p>
          </div>
        </div>
      </div>
    </section>

    <section class="slog">
      <div class="container clientesSlog">
        <div class="row">
          <div class="col-sm-12">
            <strong class="milC text-center"><p class="espacioB"><span class="rosa">Más de 1000 clientes </span> diarios nos avalan</p></strong>
            <div class="col-sm-6">
              <strong class="clientesTit"><p>Depilación Definitiva</p></strong>
                <p class="listaDos"><span class="rosa">&#176;</span> Con Luz pulsada intensa</p>
                <p class="listaDos"><span class="rosa">&#176;</span> Todas las partes del cuerpo</p>
                <p class="listaDos"><span class="rosa">&#176;</span> Sin dolor</p>
                <p class="listaDos"><span class="rosa">&#176;</span> Tratamiento seguro</p>
                <p class="listaDos"><span class="rosa">&#176;</span> Para pieles de fototipo I a IV</p>
            </div>
            <div class="col-sm-6">
              <strong class="clientesTit"><p>Rejuvenecimiento de la Piel</p></strong>
              <p class="listaDos"><span class="rosa">&#176;</span> Con Luz pulsada intensa</p>
              <p class="listaDos"><span class="rosa">&#176;</span> Para todas las edades y tipos de piel</p>
              <p class="listaDos"><span class="rosa">&#176;</span> Resultados visibles desde la 1era sesión</p>
              <p class="listaDos"><span class="rosa">&#176;</span> Tratamiento específico</p>
          </div>
        </div>
      </div>
    </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>