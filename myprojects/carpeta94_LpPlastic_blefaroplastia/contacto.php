<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Formulario</title> <!-- Aquí va el título de la página -->

</head>

<body>
<?php

$Nombre = $_POST['first_name'];
$Correo = $_POST['email'];
$Mensaje = $_POST['message'];
$Telefono = $_POST['phone'];

if ($Nombre=='' || $Correo=='' || $Telefono=='' || $Mensaje==''){

echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

}else{


    require("includes/class.phpmailer.php");
    $mail = new PHPMailer();

    $mail->From     = ("leeds@seoenmexico.com.mx"); //Dirección desde la que se enviarán los mensajes. Debe ser la misma de los datos de el servidor SMTP.
    $mail->FromName = $Nombre; 
    $mail->AddAddress("m.rodriguez@seoenmexico.com.mx"); // Dirección a la que llegaran los mensajes.

// Aquí van los datos que apareceran en el correo que reciba

    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "Contacto desde Landing Blefaroplastía";
    $mail->Body     =  "Nombre: $Nombre \n<br />".
    "Email: $Correo \n<br />".
    "Tel: $Telefono \n<br />".
    "Mensaje: $Mensaje \n<br />";

// Datos del servidor SMTP

    $mail->IsSMTP(); 
    $mail->Host = "gator4128.hostgator.com";  // Servidor de Salida.
    $mail->SMTPAuth = true; 
    $mail->Username = "leeds@seoenmexico.com.mx";  // Correo Electrónico
    $mail->Password = "leeds$2017"; // Contraseña
    $mail->Port ="587"; //Puerto

    if ($mail->Send())
    echo "<script>alert('Formulario Enviado');location.href ='http://blefaroplastia.mx/';</script>";
    else
    echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";
!!!!!
}

?>
</body>
</html>