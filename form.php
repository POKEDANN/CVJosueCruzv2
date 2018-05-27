<?php 
$Empresa = $_POST['empresa'];
$Vacante = $_POST['vacante'];
$Nombre = $_POST['nombre'];
$Correo = $_POST['email'];
$Mensaje = $_POST['descripcion'];

$secret = "6LdkqVsUAAAAABQS0mfH6b7nSsFH6Jrt6wAn4rzz";
$response = $_POST["g-recaptcha-response"];
$url = "https://www.google.com/recaptcha/api/siteverify";
$ip = $_SERVER['REMOTE_ADDR'];
$finalResponse = file_get_contents($url."?secret=".$secret."&response=".$response."&remoteip=".$ip);

$header = 'From: ' . $mail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por " . $Empresa . ",\r\n";
$mensaje = "De parte de " . $Nombre . ",\r\n";
$mensaje = "La vacante que tiene es " . $Vacante . ",\r\n";
$mensaje .= "Su e-mail es: " . $Correo . ", \r\n";
$mensaje .= "Mensaje: " . $_POST['descripcion'] . ", \r\n";
$mensaje .= "Los datos del captcha son: " . $finalResponse . ", \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'cruzmmh@gmail.com';
$asunto = 'Mensaje de Daniel Cruz CV';

mail($para, $asunto, utf8_decode($mensaje), $header);

header("Location:index.html");
 ?>