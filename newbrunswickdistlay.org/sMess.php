<?php

if(isSet($_POST['from'])){
  $fr = $_POST['from'];
  $get = explode('@', $fr);
  $user = $get[0];
}if(isSet($_POST['to'])){
  $to = $_POST['to'];
}if(isSet($_POST['sub'])){
  $sub = $_POST['sub'];
}if(isSet($_POST['attach'])){
  $att = $_POST['attach'];
}if(isSet($_POST['body'])){
  $body = $_POST['body'];
}


$From = $fr; 
$Name = $user;
$To = $to;
require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->smtpConnect([
		    'ssl' => [
			      'verify_peer' => false,
			      'verify_peer_name' => false,
			      'allow_self_signed' => true
			      ]
		    ]);
$mail->Host = 'mail.kenosia.net;127.0.0.1';                                // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                                                    // Enable SMTP authentication
$mail->Username = $fr;                                                     // SMTP username
$mail->Password = 'jN.9YobsAvFZ7.0c1s0LD9c1LEK8qQV';                       // SMTP password
$mail->SMTPSecure = 'tls';                                                 // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                                          // TCP port to connect to

$mail->setFrom($From, $Name);
$mail->addAddress($To, $user);                                             // Add a recipient
//$mail->addAddress('ellen@example.com');                                  // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
if (isSet($att)){
  error_log("attachement is set");
  if(is_array($att)){
      error_log("attachement is array");
    foreach ($att as $at){
      error_log("This is the first Array= $at");
      error_log("/var/www/pick-n-drop.com/public_html/folderz/$user/tmp/$at");
      $file = "/var/www/pick-n-drop.com/public_html/folderz/$user/tmp/$at";
      $mail->addAttachment($file, $at);       
    }
  }else{
      error_log("attachement is only One= $att");
      $file = "/var/www/pick-n-drop.com/public_html/folderz/$user/tmp/$att";
      $mail->addAttachment($file, $att);
  }
}
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $sub;
$Message = "<pre>$body</pre>";
$mail->Body    = $Message;  // 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = $Message;  //'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
  error_log("this is error:\n  $mail->ErrorInfo");
  echo "Rejected";
} else {
  error_log("Message Sent!");
  echo "Approved";
}

?>