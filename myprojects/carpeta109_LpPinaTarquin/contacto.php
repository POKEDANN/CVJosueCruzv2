<meta charset="utf-8">
<meta http-equiv="refresh"content="3;url=index.html"/>
<?php

$Nombre = $_POST['first_name'];
$Correo = $_POST['email'];
$Telefono = $_POST['phone'];
$Mensaje = $_POST['message'];

$email_to = "info@pinajarquin.com.mx, formulariosreachlocal@gmail.com";//siempre dejar formulario y yuri
$email_subject = "Contacto desde Landing Pina Jarquin";
$email_from=$_POST['email'];

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre: " . $_POST['first_name'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
$email_message .= "Telefono: " . $_POST['phone'] . "\n\n";
$email_message .= "Mensaje: " . $_POST['message'] . "\n\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- incluye aqui tu propio mensaje de Éxito-->

<h1 style="text-align:center">¡Gracias! Nos pondremos en contacto contigo a la brevedad</h1>