<?PHP
/*
//Check POST Keys & Values
print_r(array_keys($_POST));
echo "<br />";
print_r(array_Values($_POST));
echo "<br />";
print_r(array_keys($_GET));
echo "<br />";
print_r(array_Values($_GET));
*/

$attach = $_GET['attachment'];

if ($_POST['submitEmail'] == "Send"){

$To = $_POST['To:']; 
if ($_POST['Name:'] == "Optional"){
  $Name = "";
}else{
  $Name = $_POST['Name:'];
}
$Attachment = $_POST['attachment'];
$Subject = $_POST['Subject:'];
$Message = $_POST['message'];

$From = $_POST['From:'];

require("./PHPMailer-master/PHPMailerAutoload.php");
      
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
/*
$mail->smtpConnect([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ]
]);
*/
$mail->Host = 'newbrunswickdistlay.org;127.0.0.1';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'newbrunslaypr@newbrunswickdistlay.org';                 // SMTP username
$mail->Password = 'nbdlS3cr3t!';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($From, $Name);
$mail->addAddress($To);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment($Attachment, substr($Attachment, 13));  // Add attachments , & name of attachment
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject =  $Subject;
$mail->Body    =  $Message;  // 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody =  $Message; //'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo '<script> alert("Message Could Not Be Sent\n'. $mail->ErrorInfo .'"); window.close() </script>';
    //    echo '<script>window.location="http://newbrunswickdistlay.org?menuOption=Contact Us";</script>';
    //header('Location: http://newbrunswickdistlay.org?menuOption=Contact Us');
} else {
    echo '<script> alert("Message has been sent"); window.close() </script>';
    //    header('Location: http://newbrunswickdistlay.org?menuOption=Contact Us');
}
}else{

echo '<!DOCTYPE html><html lang="en">';
echo '<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>New Brunswick District Lay - Email Newsletter </title><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script></head>';
 

echo '<Body background="/files/laylogo3_lrg2.jpg" style="background-repeat:repeat;background-position: center ;background-attachment:fixed;left:50%">'; 

echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post" accept-charset="UTF-8">';
echo 'From:  <input id="from" type="text" name="From:" value="newbrunslaypr@newbrunswickdistlay.org" size=50 readonly></br>';
echo 'Your Name:  <input id="name" type="text" name="Name:" value="Optional" onclick="this.value=\'\'"><br/>';
echo 'To:  <input id="addSubmit" type="text" name="To:" value="Add Recipient Here" size=70 onclick="this.value=\'\'"><br/>';
echo 'Subject:  <input id="subject" type="text" name="Subject:" value="New Brunswick District Lay NewsLetter " size=50 readonly><br/>';
//echo 'Attachment:  <img src=\'./images/pdf.png\' height=20 width=20> <small> '.substr($attach, 13).'</small> <br/>';

$message = "<pre>Dear Friend,

You have received the New Brunswick District Lay Good News Newsletter. 
<a href='http://www.newbrunswickdistlay.org/?menuOption=Newsletter' target='_blank'>".substr($attach, 13)."</a>
   
If you have any comments / questions do not reply to this email.

Send comments / questions to <a href='http://www.newbrunswickdistlay.org/?menuOption=Contact%20Us' target='_blank'> New Brunswick District Lay Public Relations Director</a>.

If you wish to SUBSCRIBE to our quarterly newsletter, <a id='addEmail' href='http://www.newbrunswickdistlay.org/subscribe.php' target='_blank'>Click Here</a>.

Thank you, 
New Brunswick District Lay Public Relations Director
Subscription Center
</pre>"; 

echo '<input type="hidden" name="attachment" value="'.$attach.'">';
echo '<input id="appendSubmit" type="hidden" name="message" value="'.$message.'">';

echo '<input id="submitEmail" type="submit" name="submitEmail" value="Send" align="right" disabled="disabled">';

echo "<script>
$(document).ready(function(){
  var oldEmail = $('#addSubmit').val(); 
  $('#addSubmit').bind('change',function(){
    var newEmail = $('#addSubmit').val();
    var contains = newEmail.indexOf('@') > 2;
    if (contains == true){
      var Vals = $('#addSubmit').val();
      $('#addEmails').attr('href','http://www.newbrunswickdistlay.org/subscribe.php?subscriber='+Vals);
      $('#submitEmail').removeAttr('disabled');
      $('#submitEmail').css({'background-color':'#0071c1','color':'white'});
    }else{
      alert('You must submit a valid email to send email.');
}
});
});
</script>";
        
echo '</form></body></html>';

}








?>