<?php
require 'connectdb.php';
require 'phpmailer/PHPMailerAutoload.php';


    function enviaMail($nombre,$email,$hash){

        //Template User Formulario
        $templateUser = file_get_contents('MailUserForm.html');
        $templateUser = str_replace('%name%', $nombre,$templateUser);
        $templateUser = str_replace('%email%', $email,$templateUser);
        $templateUser = str_replace('%hash%', $hash,$templateUser);

       
        //Template Admin
        $templateAdmin = file_get_contents('MailAdminForm.html');
        $templateAdmin = str_replace('%name%', $nombre,$templateAdmin);
        $templateAdmin = str_replace('%email%', $email,$templateAdmin);
        $templateAdmin = str_replace('%hash%', $hash,$templateAdmin);

       

        //Envia Mail Admin
        $mail2 = new PHPMailer;
        $mail2->isSMTP();
        //$mail2->SMTPDebug = 1;
        $mail2->Host = 'mail.exitoinmobiliarioya.com';
        $mail2->SMTPAuth = true;
        //$mail2->SMTPSecure = "ssl";
        $mail2->Username = 'contacto@exitoinmobiliarioya.com';
        //$mail2->Username = 'erik@concepthaus.mx'; //Mail para pruebas
        $mail2->Password = 'Fcw=mTlgAEU[';
        //$mail2->Username = 'franquiciasquality@gmail.com'; //se envia mail  a user desde este (solo se envia)
        //$mail2->Password = 'franquicias135';//se envia mail  a user desde este (solo se envia)
        $mail2->Port =  26;
        //$mail2->setFrom('franquiciasquality@gmail.com','Exito Inmmobiliario');  //se envia mail  a user desde este (solo se envia)
        $mail2->setFrom('contacto@exitoinmobiliarioya.com','Exito Inmobiliario'); //Pruebas se envía de este
        //$mail2->addAddress('erik@concepthaus.mx','Exito Inmobiliario'); //aqui llega el mail para el 
        $mail2->addAddress('contacto@exitoinmobiliarioya.com','Exito Inmobiliario'); //aqui llega el mail para el administrador
        $mail2->isHTML(true);
        $mail2->CharSet = 'UTF-8';
        $mail2->Subject = 'Nuevo cliente'; 
        $mail2->Body = $templateAdmin;
        $mail2->send();

        

         //Envia Mail Cliente
         $mail2 = new PHPMailer;
         //$mail->SMTPDebug = 3;
         $mail2->isSMTP();
         $mail2->Host = 'mail.exitoinmobiliarioya.com';
         $mail2->SMTPAuth = true;
         //$mail2->SMTPSecure = "tls";
         $mail2->Username = 'contacto@exitoinmobiliarioya.com';
         //$mail->Username = 'erik@concepthaus.mx'; //Mail para pruebas
         $mail2->Password = 'Fcw=mTlgAEU[';
         //$mail2->Username = 'franquiciasquality@gmail.com';//se envia mail  a user desde este (solo se envia)
         //$mail2->Password = 'franquicias135';//se envia mail  a user desde este (solo se envia)
         //$mail->Port = 587;
         $mail2->Port = 26;
         $mail2->setFrom('contacto@exitoinmobiliarioya.com','Exito Inmobiliario'); //Pruebas se envía de este
         //$mail2->setFrom('franquiciasquality@gmail.com','Exito Inmobiliario'); //se envia mail  a user desde este (solo se envia)
         //$mail->setFrom('erik@concepthaus.mx','Erik Rodriguez'); //Pruebas se envía de este 
         $mail2->addAddress($email,$nombre);
         //$mail2->addAddress('erik@concepthaus.mx','Erik Rodriguez');// Aquí llega el correo en pruebas.
         $mail2->isHTML(true);
         $mail2->CharSet = 'UTF-8';
         $mail2->Subject = 'Gracias por tu apoyo'; 
         $mail2->Body = $templateUser;
         $mail2->send();

        

    
        }
       


function  checkmailf1($correoo){
if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$correoo))
{
return true;
}
else{
return false;
}
}





if(isset($_POST['nombre']) && !empty($_POST['nombre']) AND
  isset($_POST['correo']) && !empty($_POST['correo'])) 
{	

$nomm = mysqli_real_escape_string($db,$_POST['nombre']);
$correoo = mysqli_real_escape_string($db,$_POST['correo']);
$hash = sha1(rand(0,1000)); //En la base de datos esta como varchar y 40 caracteres.
$longnom = strlen ($nomm);
$query = "SELECT `correo` FROM Formulario WHERE `correo` = '$correoo';";	
$result = mysqli_query($db, $query); 



if(checkmailf1($correoo)){
     

if(mysqli_num_rows($result) == 0){

    if(!is_numeric($nomm))
    {
    	if($longnom > 3)
{
	




				$sql="INSERT INTO Formulario(`id`, `nombre`,`correo`,`hash`,`status`) VALUES
				('','$nomm','$correoo','$hash','0')";
			    $saveDB = mysqli_query($db, $sql);
				if($saveDB){

                    enviaMail($nomm,$correoo,$hash);
							echo "<div id='AjaxAct'><script>document.getElementById('f1').reset(); </script> 
							<script>document.getElementById('f2').reset(); </script> 

												<script>swal({   title: 'Datos guardados con éxito.',   text: 'Te hemos enviado un correo de bienvenida',   type: 'success',   showCancelButton: true,   confirmButtonColor: '#a3db63',   confirmButtonText: 'Ver video',   closeOnConfirm: true},function(){
													window.open('/cuestionario/respuesta.php?correo=$correoo&hash=$hash&nombre=$nomm','_blank' ); 
												 }); </script></div>"; //En este script de swal incrustamos otro de jquery para direccionar a otra pagina.
                                               

                                               //poner inm

			                }

			    else{

						echo "<div id='AjaxAct'>
											<script>sweetAlert({title:'Error',text:'Ocurrio un error en la base de datos',confirmButtonColor:'#F06060' ,type:'error'}); </script></div>"; 
						echo   mysqli_error($db);
				    }

}else
{
echo "<div id='AjaxAct'>
											<script>sweetAlert({title:'Error',text:'Tu nombre debe contener 4 letras como minimo',confirmButtonColor:'#F06060' ,type:'error'}); </script></div>"; 
}

}
else {
	echo "<div id='AjaxAct'>
											<script>sweetAlert({title:'Error',text:'El campo nombre debe ser texto ',confirmButtonColor:'#F06060' ,type:'error'}); </script></div>"; 
}
}
else{

	    echo "<div id='AjaxAct'> 
							 	<script>sweetAlert({title:'Error',text:'Este e-mail ya existe en nuestra base de datos',confirmButtonColor:'#F06060',type:'error'}); </script></div>";
							 	echo   mysqli_error($db);

	 }

	

	}

else{

	    echo "<div id='AjaxAct'> 
							 	<script>sweetAlert({title:'Error',text:'Este e-mail es incorrecto',confirmButtonColor:'#F06060',type:'error'}); </script></div>";
	 }
}

		
else{
	echo "<div id='AjaxAct'>
	<script>sweetAlert({title:'Error',text:'Datos incompletos',confirmButtonColor:'#F06060',type:'error'});</script></div>";
}


		

		?>
