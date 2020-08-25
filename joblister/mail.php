
<!-- <?php
$sub = "Thanks for creating account!";
//the message
$msg = "Hi there, thanks for creating account, please feel free to explore jobs and you can even create your own job.";
//recipient email here
$rec = "jaison8940@gmail.com";
//send email
if(mail($rec,$sub,$msg)){
	echo "mailed!";

}
else{
	echo "Error occurred!";
	echo error_get_last();

}

?> 
 -->
<?php

use PHPMailer\PHPMailer\PHPMailer;
require_once 'PHPMailer-master/src/PHPMailer.php';
require_once 'PHPMailer-master/src/SMTP.php';
require_once 'PHPMailer-master/src/Exception.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'joblister.notification@gmail.com';
$mail->Password = 'joblister@123';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('joblister.notification@gmail.com', 'JobLister');
$mail->addAddress('jaisonlouis90@gmail.com', 'Me');
$mail->Subject = 'Welcome to Joblister!';

$mail->isHTML(TRUE);
$mail->Body = '<html>Hi there, thanks for creating account, please feel free to explore jobs and to list your own job. </html>';


if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?> 