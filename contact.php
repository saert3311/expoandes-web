<?php
header('Content-type: application/json');
// Build POST request to get the reCAPTCHA v3 score from Google
$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
$recaptcha_secret = '6LeYsM4iAAAAAGyH_BClLkPanZgll9lB4LtH--nn';
$recaptcha_response = $_POST['recaptcha_response'];

// Make the POST request
$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);

$recaptcha = json_decode($recaptcha);
// Take action based on the score returned
if ($recaptcha->success == true && $recaptcha->score >= 0.5 && $recaptcha->action == 'contact') {

		try {
		// EDIT A LINE BELOW AS REQUIRED

		$email_to = 'necromancer.3311@gmail.com';

		// CUSTOME YOUR EMAIL SUBJECT

		$email_subject = "Contacto desde Web";

		// COMPONENT FUNCTION
		/**
		 * @param $data
		 * @return string
		 */
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		/**
		 * @param $string
		 * @return mixed
		 */
		function clean_string($string) {
			$bad = array("content-type", "bcc:", "to:", "cc:", "href");
			return str_replace($bad, "", $string);
		}

		// GET DATA FROM AJAX

		$contact_name    = test_input($_POST['name']);
		$contact_email   = test_input($_POST['email']);
		$contact_message = test_input($_POST['comments']);
		$contact_product = test_input($_POST['product']);
		$contact_tel     = test_input($_POST['phone']);

		$email_message = "De: ".clean_string($contact_name)."\n";

		$email_message .= "Email: ".clean_string($contact_email)."\n";
		$email_message .= "Producto: ".clean_string($contact_product)."\n";

		$email_message .= "Mensaje: ".clean_string($contact_message)."\n\n"."Telefono Contacto: ".clean_string($contact_tel."\n\nMensaje Enviado desde Expoandes.cl");

		$headers = 'From:'.$contact_name.'<'.$contact_email.'>'."\r\n".

		'Reply-To: '.$contact_email."\r\n".

		'X-Mailer: PHP/'.phpversion();

		if (@mail($email_to, $email_subject, $email_message, $headers)){
			echo json_encode(array("result"=>"ok"));
		}else{
			echo json_encode(array("result"=>"error"));
		};

	} catch (Exception $e){

		echo json_encode(array("result"=>$e));
	}
} else {
	echo json_encode((array("result"=>"Bot error")));
}



