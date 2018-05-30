<?php 
$Empresa = $_POST['empresa'];
$Nombre = $_POST['nombre'];
$Vacante = $_POST['vacante'];
$Correo = $_POST['email'];
$Mensaje = $_POST['descripcion'];

// $secret = "6LdkqVsUAAAAABQS0mfH6b7nSsFH6Jrt6wAn4rzz";
// $response = $_POST["g-recaptcha-response"];
// $url = "https://www.google.com/recaptcha/api/siteverify";
// $ip = $_SERVER['REMOTE_ADDR'];
// $finalResponse = file_get_contents($url."?secret=".$secret."&response=".$response."&remoteip=".$ip);

$header = "From: ". $_POST["nombre"] . "<" . $_POST["email"] . ">" . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// $header .= "Content-Type: text/plain";

$headerDos = "From: Daniel Cruz CV". " \r\n";
$headerDos .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$headerDos .= "Mime-Version: 1.0 \r\n";
$headerDos .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// $mensaje = "Este mensaje fue enviado por" . $Empresa . ",\r\n";
// $mensaje = "De parte de" . $Nombre . ",\r\n";
// $mensaje = "La vacante que tiene es" . $Vacante . ",\r\n";
// $mensaje .= "Su e-mail es:" . $Correo . ", \r\n";
// $mensaje .= "Mensaje:" . $_POST['descripcion'] . ", \r\n";
// $mensaje .= "Los datos del captcha son:" . $finalResponse . ", \r\n";
// $mensaje .= "Enviado el" . date('d/m/Y', time());

$mensaje = '<html>'.
	'<head><title></title></head>'.
	'<body><h2>Daniel Cruz Cv dice:</h2>'.
	'<img style="width: 160px;" src="https://78.media.tumblr.com/296896565cfff19b19b77b34125c90a2/tumblr_ovx1qr3iOl1r8sc3ro5_r1_1280.jpg"><br>'.
	'<p style="font-size: 18px;color: #00c0ff;">Este mensaje fue enviado por: ' . $Empresa . ",\r\n". '</p>'.
	'<p style="font-size: 18px;color: #00c0ff;">De parte de: ' . $Nombre . ",\r\n". '</p>'.
	'<p style="font-size: 18px;color: #00c0ff;">La vacante que tiene es: ' . $Vacante . ",\r\n". '</p>'.
	'<p style="font-size: 18px;color: #00c0ff;">Su e-mail es: ' . $Correo . ", \r\n". '</p>'.
	'<p style="font-size: 18px;color: #00c0ff;">El mensaje que dejo es: ' . $_POST['descripcion'] . ", \r\n". '</p>'.
	'<p style="font-size: 18px;color: #00c0ff;">Enviado el ' . date('d/m/Y', time()). '</p>'.
	// '<hr>'.
	// 'Enviado por mi programa en PHP'. //aqui seria como una firma
	'</body>'.
	'</html>';

$mensajeDos = '<html>'.
	'<head><title></title></head>'.
	'<body><h2>Muchas gracias por contactarme '. $Nombre . ':</h2>'.
	'<p style="font-size: 16px;color: #03A9F4;">Pronto me pondre en contacto contigo para concertar una entrevista, mientras tanto te invito a seguir revisando mi portafolios en http://danielcruz.esy.es/ ' . "\r\n". '</p>'.
	'<img style="width: 250px;margin: 0 auto; display: block;" src="https://pbs.twimg.com/media/DCFqHLxUAAAhadB.jpg"><br>'.
	'</body>'.
	'</html>';

$para = 'cruzmmh@gmail.com';
$paraDos = $Correo;
$asunto = 'Mensaje de Daniel Cruz CV';

mail($para, $asunto, utf8_decode($mensaje), $header);
mail($paraDos, $asunto, utf8_decode($mensajeDos), $headerDos);

header("Location:gracias.php");
 ?>