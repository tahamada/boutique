<?php
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	function sendMail($title,$expediteur,$body,$from=array('mymarket@mymarket.com' => 'MyMarket')){
		$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
		  ->setUsername('MyMarketBoutique@gmail.com')
		  ->setPassword('MyMarketBoutique123456');

		$mailer = Swift_Mailer::newInstance($transport);

		$message = Swift_Message::newInstance($title)
		  ->setFrom($from)
		  ->setTo(array($expediteur))
		  ->setBody($body);

		$result = $mailer->send($message);
	}

	function smtpMailer($subject, $to, $body, $from="mymarket@mymarket.com", $from_name="MyMarket") {
		$mail = new PHPMailer();  // Cree un nouvel objet PHPMailer
		$mail->IsSMTP(); // active SMTP
		$mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
		$mail->SMTPAuth = true;  // Authentification SMTP active
		$mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
		$mail->SMTPDebug = 3;
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->Username = "MyMarketBoutique@gmail.com";
		$mail->Password = "MyMarketBoutique123456";
		$mail->SetFrom($from, $from_name);
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->AddAddress($to);
		if(!$mail->Send()) {
			return 'Mail error: '.$mail->ErrorInfo;
		} else {
			return true;
		}
	}
?>