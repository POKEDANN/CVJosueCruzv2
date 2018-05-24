<?php 

require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/class.phpmailer.php';
require 'phpmailer/class.smtp.php';

require 'dbconect.php';


function enviaMail($name,$email,$mensaje){
	    //Mail para administrador
        $mail2 = new PHPMailer;
		//$mail2->SMTPDebug = 3;
		$mail2->isSMTP();
		//$mail2->Host = 'smtp.gmail.com';
		$mail->Host      = 'subastasventura.com';
		$mail2->SMTPAuth = true;
		$mail2->SMTPSecure = "tls";
		//$mail2->Username = 'erik@concepthaus.mx'; //se envia mail  a user desde este (solo se envia)
		$mail->Username = 'contacto@autoefectivo.com';
		$mail->Password = 'C0nt4ct0';//se envia mail  a user desde este (solo se envia)

		$mail2->Port = 587;
		//$mail2->setFrom('erik@concepthaus.mx','Erik Rodriguez');  //se envia mail  a user desde este (solo se envia)
		$mail->SetFrom('contacto@autoefectivo.com','Contacto Autoefectivo');
		$mail->addReplyTo('contacto@autoefectivo.com', 'Contacto Autoefectivo');
		//$mail2->addAddress('erik@concepthaus.mx','Erik Rodriguez'); //aqui llega el mail para el administrador
		$mail2->isHTML(true);
		$mail2->CharSet = 'UTF-8';
		$mail2->Subject = 'Nuevo Registro en Autoefectivo'; 
		$mail2->Body = "<html> <h1>Se han registrado en el landing de Autoefectivo con los siguientes datos:</h1><br>
						 <strong> Nombre: ".$name."</strong><br><br>
						  <strong>Email: ".$email."</strong><br><br>
						  <strong>Mensaje: </html>".$mensaje; 
        $mail2->send();

		
		/*if(!$mail -> Send()){
			echo 'El mensaje no se pudo enviar.';
			echo 'Mail Error: ' .$mail->ErrorInfo;
		} else{
			echo 'Mensaje Enviado';
		}
		*/


}


function checkMail($mail){
	//Revisa si el mail es correcto
	if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $mail)){

		return true;

	}	

	else { 

		return false;

			  }

}
	


//Checa si están completos los datos función principal -- main
/*Revise que el usuario ingreso datos */
	if( isset($_POST['nombre']) && !empty($_POST['nombre']) 
		AND
		isset($_POST['email']) && !empty($_POST['email'])

		AND 
		isset($_POST['mensaje']) && !empty($_POST['mensaje'])){

			$name = $_POST['nombre'];
			$mail = $_POST['email'];
			$mensaje = $_POST['mensaje'];

			if(checkMail($mail)){



				$sql="INSERT INTO AutoEfe(`id`, `nombre`,`correo`,`sugerencias`) VALUES
				('','$name','$mail','$mensaje')";
			    $saveDB = mysqli_query($db, $sql);
				if($saveDB){

				

                enviaMail($name,$mail,$mensaje);
				 echo " <div id='DivAjaxAuto'></div>
				 <script>document.getElementById('LandingAuto').reset(); </script> 
												<script>sweetAlert({title:'¡Gracias!',text:'Datos guardados con éxito', confirmButtonColor:'#6a9c2d' ,type:'success'});</script>
												</div>";
												}

				
			else {

			 echo "<div id='DivAjaxAuto'>
											<script>sweetAlert({title:'Error',text:'Ocurrio un error en la base de datos',confirmButtonColor:'#F06060' ,type:'error' 
													}); $('#submit').prop( 'disabled', false ); </script>
													</div>"; 
						echo   mysqli_error($db);
				//Error mail inválido
			}


	} 

	else {

		 echo " <div id='DivAjaxAuto'></div>

	<script>sweetAlert({title:'Error',text:'Error mail invalido',confirmButtonColor:'#F06060',type:'error'});
	$('#submit').prop( 'disabled', false ); </script></div>";
		//error datos no válidos
	}
 


    }

	else {

		 echo " <div id='DivAjaxAuto'></div>

		 

	<script>sweetAlert({title:'Error',text:'Datos incompletos',confirmButtonColor:'#F06060',type:'error'}); 
    $('#submit').prop( 'disabled', false ); </script></div>";
		//error datos no válidos
	}





 ?>