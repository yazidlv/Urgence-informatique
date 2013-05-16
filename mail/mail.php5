<?php


include "class.phpmailer.php"; // bibliotheque envoi d'un e-mail
include "class.pop3.php";
include "class.smtp.php";



$message=" tu a beaucoup de mails maintenant";

for($i=0;$i<10;$i++)
{
    $mail = new PHPmailer();
	$mail->IsSMTP(true);
	$mail->IsHTML(true);
	//$mail->Host='hote_smtp';
	//$mail->From='';
	$mail->AddAddress('nadiaboyer2002@hotmail.fr');
	$mail->AddReplyTo('votre@adresse');
	$mail->Subject='tu a beaucoup de mails maintenant';
	$mail->Body=$message;
	//$mail->Body.='<img src="C:\Users\Public\Pictures\Sample Pictures\Koala.jpg">';
	$mail->Body.='</center></body></html>';

	if(!$mail->Send()){
	  echo $mail->ErrorInfo;
	}
	else{
	  echo 'Mail envoyé avec succès<br>';
	}
	$mail->SmtpClose();
	unset($mail);
}

