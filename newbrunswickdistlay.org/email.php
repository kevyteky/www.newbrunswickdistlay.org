<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

$From = $_POST['email']; 
$Name = $_POST['fname'].' '.$_GET['lname'];
$Message = $_POST['comment'];

$To = 'kryals@universitylanguage.com';

echo "This is who the email is from= ".$From .' '.$Name;
echo "<br/>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  Echo '<br/> Server is POST <br/>';
}else{
  Echo '<br/> Server is GET <br/>';
}

require '/PHPMAILER-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.kevyteky.com;127.0.0.1';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'webmaster@kevyteky.com';                 // SMTP username
$mail->Password = 'EatMe123';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($From, $Name);
$mail->addAddress($To, 'Kevin Ryals');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    =  $Message;  // 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo '<script> alert("Message Could Not Be Sent\n'. $mail->ErrorInfo .'"); </script>';
    echo '<script>window.location="http://newbrunswickdistlay.org?menuOption=Contact Us";</script>';

    //header('Location: http://newbrunswickdistlay.org?menuOption=Contact Us');
} else {
    echo '<script> alert("Message has been sent"); </script>';
    header('Location: http://newbrunswickdistlay.org?menuOption=Contact Us');
}


?>