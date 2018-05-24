<?php
header("Access-Control-Allow-Origin: *");
//file_get_contents("php://input");
//header('Content-Type: text/html; charset=utf-8');


require 'vendor/autoload.php';
//require 'vendor/swiftmailer/swiftmailer/lib/swift_required.php';
require 'mysql.php';

//Create Transport
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com',465,'ssl')
->setUsername('lola@petmail.mx')
->setPassword('inicio00');
// $transport = Swift_SmtpTransport::newInstance('mailtrap.io',2525)
// ->setUsername('432554a45100d7379')
// ->setPassword('8b50d0b95b0e45');
//Create Mailer with our Transport
$mailer = Swift_Mailer::newInstance($transport);

$app = new \Slim\Slim(array(
		'debug' => true
	));

// DB Producción
$db = new Mysqlidb('localhost','8bc53749aba6','086fb699ccc2e708', 'petmail_server');

//DB TEST
//$db = new Mysqlidb('localhost','root','root', 'petmail_server');

/* ------  BETA TESTING TABLE   ------ */

//POST in Beta
$app->post('/api/v1/beta/comments', function() use ($db, $app, $mailer){
			 $request			=$app->request();
			 $body   			=$request->getBody();
			 $info 				=(array) json_decode($body);
			 $id 				=$db->insert('beta_testing', $info);

			 $db->where('id', $id);

			 $selectComment		=$db->getOne('beta_testing');


			 //Send Welcome Mail

	 		// Setting all needed info and passing in my email template.
   		 	$message = Swift_Message::newInstance('Nuevo comentario en Beta')
                    ->setFrom(array( 'lola@petmail.mx'=> 'Lolita Davis'))
                    ->setTo(array('lola@petmail.mx' => 'Lolita Davis'))
                    ->setBody('¡Hola team Pet Mail!<br> Alguien ha dejado un comentario acerca del sitio en fase beta.<br><br> Nombre: <b>'.$selectComment['name'].'</b>
                    			<br><br> Mail: <b>'.$selectComment['mail'].'</b>
                    			<br><br> Mensaje: <b>'.$selectComment['mensaje'].'</b>')
                    ->setContentType("text/html");

		    // Send the message
		    $results = $mailer->send($message);

		    // Print the results, 1 = message sent!
		    print($results);




});

//GET mails to Beta
$app->get('/api/v1/beta/comments', function() use($db){
			$db->orderBy("id","Desc");
			$info = $db->get('beta_testing');
			echo json_encode($info);

});





/* ------  CONTACTO TABLE   ------ */

//POST in Contacto
$app->post('/api/v1/contact', function() use ($db, $app, $mailer){
			 $request			=$app->request();
			 $body   			=$request->getBody();
			 $info 				=(array) json_decode($body);
			 $id 				=$db->insert('contacto', $info);

			 $db->where('id', $id);

			 $selectComment		=$db->getOne('contacto');

			 //Send Welcome Mail

	 		// Setting all needed info and passing in my email template.
   		 	$message = Swift_Message::newInstance('Nuevo comentario')
                    ->setFrom(array( 'lola@petmail.mx'=> 'Lolita Davis'))
                    ->setTo(array('lola@petmail.mx' => 'Lolita Davis'))
                    ->setBody('¡Hola team Pet Mail!<br> Alguien ha dejado un comentario de contacto en el sitio.<br><br> Nombre: <b>'.$selectComment['name'].'</b>
                    			<br> Mail: <b>'.$selectComment['mail'].'</b>
                    			<br> Tel: <b>'.$selectComment['tel'].'</b>
                    			<br> Mensaje: <b>'.$selectComment['mensaje'].'</b>')
                    ->setContentType("text/html");

		    // Send the message
		    $results = $mailer->send($message);

		    // Print the results, 1 = message sent!
		    print($results);




});

//GET mails to contacto
$app->get('/api/v1/contact', function() use($db){
			$db->orderBy("id","Desc");
			$info = $db->get('contacto');
			echo json_encode($info);

});

//DELETE mails de contacto
$app->get('/api/v1/contact/:id', function($id) use ($db){
	$db->where('id', $id);

	if($db->delete('contacto')){
		echo json_encode(array('message'=>'successfully deleted'));
	}else{
		echo json_encode(array('message'=>'not deleted'));
	}
});



/* ------  NEWSLETTER TABLE   ------ */


//POST in Newsletter
$app->post('/api/v1/newsletter', function() use ($db, $app, $mailer){
	 		$request		=$app->request();
	 		$body			=$request->getBody();
	 		$mail			=(array) json_decode($body);
	 		$id				=$db->insert('newsletter', $mail);

	 		$db->where('id', $id);
	 		$selectMail		=$db->getOne('newsletter');

	 		//$template_buenfin = file_get_contents('buenFinV1.html');

	 		//BUEN FIN MAILING
	 		/* $message_user = Swift_Message::newInstance('Este Buen Fin nuestras mascotas también se van de compras')
	 				 ->setFrom(array( 'lola@petmail.mx'=> 'Pet Mail'))
                     ->setTo(array($selectMail['mail'] => $selectMail['mail']))
	 				 ->setBody($template_buenfin)
	 				 ->setContentType("text/html"); */

	 		//ADMIN MAILING 
   		 	$message_admin = Swift_Message::newInstance('Nuevo registro en newsletter')
                    ->setFrom(array( 'lola@petmail.mx'=> 'Lolita Davis'))
                    ->setTo(array('lola@petmail.mx' => 'Lolita Davis'))
                    ->setBody('¡Hola team Pet Mail!<br> Alguien se ha registrado en el newsletter.<br><br> Mail: <b>'.$selectMail['mail'].'</b> 
                    																			  <br><br> Raza: <b>'.$selectMail['raza_mascota'].'</b>')
                    ->setContentType("text/html");

		    // Send the message
		    $result_admin = $mailer->send($message_admin);
		    //$result_user = $mailer->send($message_user);

		    // Print the results, 1 = message sent!
		    print($result_admin);
	        //print($result_user);



}); 

//GET mails to newsletter
$app->get('/api/v1/newsletter', function() use($db){
			$db->orderBy("id","Desc");
			$mails = $db->get('newsletter');
			echo json_encode($mails);

});


//Send Welcome mail to user
$app->get('/api/v1/newsletter/welcome/:id', function($id) use ($db, $app, $mailer){
	$status = array('status_message'=>'1');
	$db->where('id', $id);
	$selectMail = $db->getOne('newsletter');
	if($selectMail['status_message'] == 0){
		$db->where('id', $id);
			if($db->update('newsletter',$status)){
				$message = Swift_Message::newInstance('¡Saludos de Pet Mail!')
		                    ->setFrom(array('lola@petmail.mx'=> 'Lolita Davis'))
		                    ->setTo(array($selectMail['mail'] => ''))
					                    ->setBody('¡Hola! <br><br>
					Muchas gracias por tu interés en Pet Mail. Esperamos que tu mejor amigo y tú se encuentren muy bien.<br>

					Nos encantará poder darte una pata para hacer feliz a tu peludo, ¿tuviste alguna duda sobre nuestros servicios?<br>

					Los esperamos pronto para que puedan vivir la experiencia Pet Mail :) <br><br>

					¡Saludos y muchas gracias! <br><br><br><br> <img width="362" height="126" src="https://petmail.mx/server/firma_lola.png"> ')
					                    ->setContentType("text/html");

				// Send the message
				$results = $mailer->send($message);
				echo json_encode(array('mail' => $selectMail['mail']));
			}else{
				echo json_encode(array('error' => 'Ha ocurrido un error en la base de datos'));
			}
	}else{
		echo json_encode(array('error' => 'Ya se le ha enviado un correo a este usuario'));
	}


	
});

/* -------- USERS TABLE -------- */
//Cancela suscribciones de conekta
$app->get('/api/v1/users/conekta/cancel-sus/:customer', function($customer){
		require 'vendor/conekta-php-master/lib/Conekta.php';
		Conekta::setApiKey("key_GKb5BWaEr77yX7ornhdeqQ");
		Conekta::setLocale('es');

		$cliente = Conekta_Customer::find($customer);
		$subscription = $cliente->subscription->cancel();

		echo $subscription;
});

$app->get('/api/v1/users/subscriptions', function()use($db){
			$db->orderBy("id_user","Desc");
			$subscriptions = $db->get('subscription_card');
			echo json_encode($subscriptions);
});
//GET all users
$app->get('/api/v1/users', function() use($db){
	$db->orderBy("id_user","Desc");
	$db->join("users u", "u.id_user = m.id_user","LEFT");
	$db->join("users_address a", "u.id_user = a.id_user", "LEFT");
	$db->join("users_pedidos p", "u.id_user = p.id_user", "LEFT");
	$users = $db->get("users_mascotas m",null, 'u.id_user, u.fecha_registro, u.nombre_user, u.apellido_user, u.mail, m.nombre_mascota, 
												a.calle, a.num_ext, a.num_int, a.colonia, a.zipcode, a.ciudad, a.estado, p.tipo_susc, 
												p.tipo_pago, p.size_mascota, p.precio_petmail, p.envio, p.total, p.status ');
	echo json_encode($users);


});


//GET one user all information
$app->get('/api/v1/users/:id', function($id) use($db){

$db->join("users u", "m.id_user = u.id_user","LEFT");
$db->join("users_address a", "a.id_user = m.id_user", "LEFT");
$db->where('u.id_user', $id);
$one_user= $db->JsonBuilder()->get("users_mascotas m",null);
echo $one_user;

});


//GET one user pet information
$app->get('/api/v1/users/pets/:id', function($id) use($db){

$db->join("users u", "m.id_user = u.id_user","LEFT");
$db->where('u.id_user', $id);
$one_user_m = $db->JsonBuilder()->get("users_mascotas m",null,'m.nombre_mascota,m.raza,m.comentarios, m.alergias, m.birthday');
echo $one_user_m;

});

//PUT one user pet information
$app->put('/api/v1/pet/:id', function($id) use ($app){
	$request     = $app->request();
	$body        =$request->getBody();
	$params = json_decode($body);

	$sql="UPDATE users_mascotas SET raza = :raza, alergias = :alergias, birthday = :birthday, comentarios = :comentarios
			WHERE id_user = :id_user;";
	
	$db=getConnection();
	$execute = $db->prepare($sql);
	$execute->bindParam("raza",$params->raza);
	$execute->bindParam("alergias",$params->alergias);
	$execute->bindParam("birthday",$params->birthday);
	$execute->bindParam("comentarios",$params->comentarios);
	$execute->bindParam("id_user",$id);
	$execute->execute();
	$db = null;

});


//GET one user orders information
$app->get('/api/v1/users/orders/:id', function($id) use($db){

$db->join("users u", "p.id_user = u.id_user","LEFT");
$db->where('u.id_user', $id);
$one_user_p = $db->JsonBuilder()->get("users_pedidos p",null,'p.tipo_susc, p.tipo_pago, p.size_mascota, p.precio_petmail,p.envio,p.total');
echo $one_user_p;

});
//GET one user address information
$app->get('/api/v1/users/address/:id', function($id) use($db){

$db->join("users u", "a.id_user = u.id_user","LEFT");
$db->where('u.id_user', $id);
$one_user_m = $db->JsonBuilder()->get("users_address a",null,'a.calle, a.num_ext, a.num_int, a.colonia, a.zipcode,a.ciudad,a.estado');
echo $one_user_m;

});



//POST user
$app->post('/api/v1/set_payments', function() use($app){
	require 'vendor/conekta-php-master/lib/Conekta.php';
	Conekta::setApiKey("key_GKb5BWaEr77yX7ornhdeqQ");
	Conekta::setLocale('es');
	$request = $app->request();
	$body  	 = $request->getBody();
	require_once 'passwordHash.php';
	$params = json_decode($body);

	if(($params->nombre_user != null) && 
		($params->mail != null) && 
		(($params->total == 390) || ($params->total == 331.5) || ($params->total == 381.5) ||($params->total == 374) || ($params->total == 352) || ($params->total == 312) || ($params->total == 370) || ($params->total == 350) || ($params->total == 440) || ($params->total == 420) || ($params->total == 400)))
	{
			$sql = 	"INSERT INTO users (nombre_user, apellido_user, mail, password) 
								 values (:nombre_user,:apellido_user,:mail, :password);
								 SET @user_id=LAST_INSERT_ID();
					 INSERT INTO users_mascotas (id_user,nombre_mascota)
					 			  values(@user_id,:nombre_mascota);
					 INSERT INTO users_address (id_user,calle, num_ext, num_int, colonia, zipcode, ciudad, estado)
					 			  values (@user_id,:calle,:num_ext,:num_int,:colonia,:zipcode,:ciudad,:estado);
					 INSERT INTO users_pedidos (id_user, tipo_susc,tipo_pago, size_mascota,precio_petmail, envio, total)
					 			  values(@user_id,:tipo_susc,:tipo_pago,:size_mascota,:precio_petmail,:envio,:total);";
			try{

					$db = getConnection();
					$stmt = $db->prepare($sql);
					$pass = $params->password;
					$params->password = passwordHash::hash($pass);
					$stmt->bindParam("nombre_user",$params->nombre_user);
					$stmt->bindParam("apellido_user",$params->apellido_user);
					$stmt->bindParam("password",$params->password);
					$stmt->bindParam("mail",$params->mail);
					$stmt->bindParam("nombre_mascota",$params->nombre_mascota);
					$stmt->bindParam("tipo_susc",$params->tipo_susc);
					$stmt->bindParam("tipo_pago",$params->payment);
					$stmt->bindParam("size_mascota",$params->size_mascota);
					$stmt->bindParam("precio_petmail",$params->precio_petmail);
					$stmt->bindParam("envio",$params->envio);
					$stmt->bindParam("total",$params->total);
					$stmt->bindParam("calle",$params->calle);
					$stmt->bindParam("num_ext",$params->num_ext);
					$stmt->bindParam("num_int",$params->num_int);
					$stmt->bindParam("colonia",$params->colonia);
					$stmt->bindParam("zipcode",$params->zipcode);
					$stmt->bindParam("ciudad",$params->address->city->name);
					$stmt->bindParam("estado",$params->address->state->name);
					$stmt->execute();
					$params->id_user = $db->lastInsertId();
					$db = null;

				/* ----------------- Pagos caja sorpresa TDC && OXXO --------------------- */

				//Pago con tarjeta
				if($params->payment == "tarjeta-credito" && $params->tipo_susc != "Bimestral" && $params->tipo_susc != "Mensual")
					{
							try {
								$charge = Conekta_Charge::create(array(
								"amount"=>($params->total)*100,
								"currency"=>"MXN",
								"description"=>$params->tipo_susc,
								"reference_id"=>$params->id_user,
								"card"=>$params->token_card,
								"details"=>array(
									"name"=>$params->nombre_user,
									"email"=>$params->mail,
										"line_items"=> array(
										        array(
										          "name"=>$params ->tipo_susc,
										          "sku"=>$params->id_user,
										          "unit_price"=> ($params->total)*100,
										          "description"=>"Tipo de suscripción: ".$params ->tipo_susc." Total: ".$params->total,
										          "quantity"=> 1,
										          "type"=>$params ->tipo_susc
										        )
							      			)
										)
								));} catch (Conekta_Error $e){
											  echo json_encode(array('error_conekta' => $e->getMessage()));
											 //el pago no pudo ser procesado
											};

							$db = getConnection();
							$sql_card = "INSERT INTO payments_card (id_pago, id_user, id_pedido, token_card, status, cantidad) values (:id_conekta, :id_user, :id_pedido, :token_card, :status, :cantidad);
										 UPDATE users_pedidos SET status=:status WHERE id_pedido=:id_pedido;";
							$datasave = $db->prepare($sql_card);
							$datasave->bindParam("id_conekta", $charge->id);
							$datasave->bindParam("id_user", $params->id_user);
							$datasave->bindParam("id_pedido", $params->id_user);
							$datasave->bindParam("token_card", $params->token_card);
							$datasave->bindParam("status", $charge->status);
							$datasave->bindParam("cantidad", $charge->amount);
							$datasave->execute();
							echo $charge;
							$db = null;

					}
				//Pago en oxxo
				if($params->payment == "oxxo-pago")
				    {
				    	$date = new DateTime();
						$date->modify('+3 day');
						$charge = Conekta_Charge::create(array(
							    "amount"=> ($params->total)*100,
							    "currency"=> "MXN",
							    "description"=> $params ->tipo_susc,
							    "cash"=> array(
							      "type"=>"oxxo",
							      "expires_at"=>$date->format('Y-m-d')
							      ),
							    "details"=> array(
							      "name"=>$params->nombre_user,
							      "email"=>$params->mail,
							      "line_items"=> array(
							        array(
							          "name"=>$params ->tipo_susc,
							          "sku"=>$params->id_user,
							          "unit_price"=> ($params->total)*100,
							          "description"=>"Tipo de suscripción: ".$params ->tipo_susc." Total: ".$params->total,
							          "quantity"=> 1,
							          "type"=>$params ->tipo_susc
							        )
							      )
							    )
							  ));
						$db = getConnection();
						$sql_oxxo = "INSERT INTO payments_oxxo (id_pago, id_user, id_pedido, status, cantidad, fecha_exp) values (:id_conekta, :id_user, :id_pedido, :status, :cantidad, :fecha_exp);
									 UPDATE users_pedidos SET status=:status WHERE id_pedido=:id_pedido;";
						$datasave = $db->prepare($sql_oxxo);
						$datasave->bindParam("id_conekta", $charge->id);
						$datasave->bindParam("id_user", $params->id_user);
						$datasave->bindParam("id_pedido", $params->id_user);
						$datasave->bindParam("status", $charge->status);
						$datasave->bindParam("cantidad", $charge->amount);
						$datasave->bindParam("fecha_exp", $charge->payment_method->expires_at);
						$datasave->execute();
						echo $charge;
						$db = null;
					}

				/*---------------------------- Suscripciones con TDC: Bimestral y Mensual --------------------------- */
				//Suscripción Bimestral sin envío
				if($params->payment == "tarjeta-credito" && $params->tipo_susc == "Bimestral" && $params->envio == 0)
					{
						
					 try{
							
							$customer = Conekta_Customer::create(array(
								"name"=>$params->nombre_user,
								"email"=>$params->mail,
								"phone"=>"0000",
								"cards"=>array($params->token_card),
								"plan"=>"bimestral_sinenvio"
								));
						}catch(Conekta_Error $e){
							 echo json_encode(array('error_conekta' => $e->getMessage()));
						}
						if($customer->subscription->status == 'active'){
								$db = getConnection();
								$sql_card = "INSERT INTO subscription_card (id_subscription, id_user, tipo_susc, card, status) 
											values (:id_conekta, :id_user, :tipo_susc, :token_card, :status)";
								$datasave = $db->prepare($sql_card);
								$datasave->bindParam("id_conekta", $customer->subscription->id);
								$datasave->bindParam("id_user", $params->id_user);
								$datasave->bindParam("tipo_susc", $params->tipo_susc);
								$datasave->bindParam("token_card", $customer->subscription->card);
								$datasave->bindParam("status", $customer->subscription->status);
								$datasave->execute();
						}else{
							echo json_encode(array('error_conekta' => 'Hubo un problema con tu tarjeta, la suscripción falló al inicializarse'));
						}

					}
				//Suscripción Bimestral con envío
				if($params->payment == "tarjeta-credito" && $params->tipo_susc == "Bimestral" && $params->envio == 50)
					{
					try{

							$customer = Conekta_Customer::create(array(
								"name"=>$params->nombre_user,
								"email"=>$params->mail,
								"phone"=>"0000",
								"cards"=>array($params->token_card),
								"plan"=>"bimestral_conenvio"
								));
					}catch(Conekta_Error $e){
							 echo json_encode(array('error_conekta' => $e->getMessage()));
						}
					if($customer->subscription->status == 'active'){
								$db = getConnection();
								$sql_card = "INSERT INTO subscription_card (id_subscription, id_user, tipo_susc, card, status) 
											values (:id_conekta, :id_user, :tipo_susc, :token_card, :status)";
								$datasave = $db->prepare($sql_card);
								$datasave->bindParam("id_conekta", $customer->subscription->id);
								$datasave->bindParam("id_user", $params->id_user);
								$datasave->bindParam("tipo_susc", $params->tipo_susc);
								$datasave->bindParam("token_card", $customer->subscription->card);
								$datasave->bindParam("status", $customer->subscription->status);
								$datasave->execute();
						}else{
							echo json_encode(array('error_conekta' => 'Hubo un problema con tu tarjeta, la suscripción no pudo inicializarse'));
						}

					}
				//Suscripción Mensual sin envío
				if($params->payment == "tarjeta-credito" && $params->tipo_susc == "Mensual" && $params->envio == 0)
					{

						try{
								$customer = Conekta_Customer::create(array(
									"name"=>$params->nombre_user,
									"email"=>$params->mail,
									"phone"=>"0000",
									"cards"=>array($params->token_card),
									"plan"=>"mensual_sinenvio"
									));
						}catch(Conekta_Error $e){
							 echo json_encode(array('error_conekta' => $e->getMessage()));
							}
						if($customer->subscription->status == 'active'){
								$db = getConnection();
								$sql_card = "INSERT INTO subscription_card (id_subscription, id_user, tipo_susc, card, status) 
											values (:id_conekta, :id_user, :tipo_susc, :token_card, :status)";
								$datasave = $db->prepare($sql_card);
								$datasave->bindParam("id_conekta", $customer->subscription->id);
								$datasave->bindParam("id_user", $params->id_user);
								$datasave->bindParam("tipo_susc", $params->tipo_susc);
								$datasave->bindParam("token_card", $customer->subscription->card);
								$datasave->bindParam("status", $customer->subscription->status);
								$datasave->execute();
						}else{
							echo json_encode(array('error_conekta' => 'Hubo un problema con tu tarjeta, la suscripción falló al inicializarse'));
						}

					}
				//Suscripción Mensual con envío
				if($params->payment == "tarjeta-credito" && $params->tipo_susc == "Mensual" && $params->envio == 50)
					{
						try{
								$customer = Conekta_Customer::create(array(
									"name"=>$params->nombre_user,
									"email"=>$params->mail,
									"phone"=>"0000",
									"cards"=>array($params->token_card),
									"plan"=>"mensual_conenvio"
									));
						}catch(Conekta_Error $e){
							 echo json_encode(array('error_conekta' => $e->getMessage()));
							}
						if($customer->subscription->status == 'active'){
								$db = getConnection();
								$sql_card = "INSERT INTO subscription_card (id_subscription, id_user, tipo_susc, card, status) 
											values (:id_conekta, :id_user, :tipo_susc, :token_card, :status)";
								$datasave = $db->prepare($sql_card);
								$datasave->bindParam("id_conekta", $customer->subscription->id);
								$datasave->bindParam("id_user", $params->id_user);
								$datasave->bindParam("tipo_susc", $params->tipo_susc);
								$datasave->bindParam("token_card", $customer->subscription->card);
								$datasave->bindParam("status", $customer->subscription->status);
								$datasave->execute();
						}else{
							echo json_encode(array('error_conekta' => 'Hubo un problema con tu tarjeta, la suscripción falló al inicializarse'));
						}
						

					}

				} catch(PDOException $e) {
		        //echo '{"error_MySQL":{"text":'. $e->getMessage() .'}}';
		    }
		

	
	}
	
	else{echo "Ha ocurrido un error";}
});

//PAGOS PETMAIL
$app->get('/api/v1/payments_conekta', function() use($app){
	require 'vendor/conekta-php-master/lib/Conekta.php';
	Conekta::setApiKey("key_GKb5BWaEr77yX7ornhdeqQ");

		$charge = Conekta_Charge::where(array('status.in' => array('paid')));
		echo $charge;
});


//EDIT user
$app->put('/api/v1/users/:id', function($id) use($db){


});


/* --------- PEDIDOS TABLE --------- */

/* --------- PAGOS OXXO TABLE ------- */

/* --------- PAGOS TARJETA TABLE ----- */

function getConnection() {
    $dbhost="localhost";
    // $dbuser="root";
    // $dbpass="root";
    $dbuser="8bc53749aba6";
    $dbpass="086fb699ccc2e708";
    $dbname="petmail_server";
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

$app->run();
