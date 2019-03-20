<?php
    
    require_once('class.phpmailer.php');
	require_once('class.smtp.php');
	
    function sendmail($to,$subject,$message,$name)
    {
                  $mail             = new PHPMailer();
                  $body             = $message;
                  $mail->IsSMTP();
                  $mail->Host       = "smtp.gmail.com";                  
                  $mail->Username   = "dkinnari@gmail.com";
                  $mail->Password   = "ilovebapa";
				  $mail->SMTPSecure = 'ssl';
                  $mail->SMTPAuth   = true;
                  $mail->SetFrom('dkinnari@gmail.com', 'Davemathschool.com');
                  $mail->AddReplyTo("dkinnari@gmail.com","Davemathschool.com");
                  $mail->Subject    = $subject;
                  $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
                  $mail->MsgHTML($body);
                  $address = $to;
                  $mail->AddAddress($address, $name);
                  if(!$mail->Send()) {
                      return 0;
                  } else {
                        return 1;
                  }
    }

?>

