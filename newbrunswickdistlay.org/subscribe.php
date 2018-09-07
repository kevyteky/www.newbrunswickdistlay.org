<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/files/style.css" title="wsite-theme-css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="icon" type="image/png" sizes="16x16" href="/favicon.ico">
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69897613-1', 'auto');
  ga('send', 'pageview');
</script>


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
include "PDO/connectSubscribers.php";
//require 'Classes.php'; 
//require 'myPDF.php';
//require 'newsLetter_pdf.php';
$user = 'KevyTeky';
$title = $_GET['menuOption'];
$uN='';
$uP='';

$lastN = $_GET["lname"];
$firstN = $_GET["fname"];
$subscriber = $_GET["subscriber"];
$unSubscriber = $_GET["unsubscribing"];
$send = $_GET["subscribe"];
$confirming = $_GET["verify"];
$date = date('Y-m-d');
$Message = $_GET["mess"];

if (isSet($send)){
  try {
    $st = $db->prepare("INSERT INTO users (fname, lname, email) VALUES ('$lastN','$firstN','$subscriber')");
    $st->execute(); 
    if (!$st){  
      $st->$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
  } catch (PDOException $e){
    error_log($e->getMessage());
    echo $e->getMessage();
    $temp = str_replace("SQLSTATE[23000]: Integrity constraint violation: 1062","****ERROR:: ", $e->getMessage());
    $temp = str_replace("'","\"", $temp);
    echo "<script> var Mess = '$temp'; var subscriber = '$subscriber'; </script>";
    echo "<script> alert('Sorry your request has been denied!  Please note error and Try Again.'); window.location.href = 'http://newbrunswickdistlay.org/subscribe.php?subscriber='+subscriber+'&mess='+Mess; </script>";
    die();
  }
  
  //////////////////////////////  PHPMailer  Start //////////////////////////////////////////////////
  $From = 'newbrunslaypr@newbrunswickdistlay.org'; 
  $Name = $firstN.' '.$lastN;
  $To = $subscriber;
  require 'PHPMailer-master/PHPMailerAutoload.php';
  $mail = new PHPMailer;
  //$mail->SMTPDebug = 3;                               // Enable verbose debug output \
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->smtpConnect([
		      'ssl' => [
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
				]
		      ]);
  $mail->Host = 'mail.newbrunswickdistlay.org;127.0.0.1';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'Newbrunslaypr@newbrunswickdistlay.org';                 // SMTP username
  $mail->Password = 'nbdlS3cr3t!';                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 25;                                    // TCP port to connect to

  $mail->setFrom($From, 'New Brunswick District Lay Public Relations Director');
  $mail->addAddress($To, $Name);     // Add a recipient
  //$mail->addAddress('ellen@example.com');               // Name is optional
  //$mail->addReplyTo('info@example.com', 'Information');
  //$mail->addCC('cc@example.com');
  //$mail->addBCC('bcc@example.com');
  //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = "Welcome to the New Brunswick District Lay Quaterly Newsletter";
  $Message = "<pre>Hello $firstN, 

     You are receiving this email because you have selected to receive New Brunswick District Lay's Good News Newsletter.

If you have any comments / questions do not reply to this email.

Send comments / questions to <a href='http://www.newbrunswickdistlay.org/?menuOption=Contact%20Us' target='_blank'> New Brunswick District Lay Public Relations Director</a>.

     <b>In order to verify it was you who actually requested our quarterly newsletter,</b> <a href='http://www.newbrunswickdistlay.org/subscribe.php?verify=$To' target='_blank'><input type='button' value='Verify $To' style='background-color:#0071c1;color:white;text-align:white;' /></a>.

Thank you, 
New Brunswick District Lay Public Relations Director
Subscription Center</pre>";
  $mail->Body    = $Message;  // 'This is the HTML message body <b>in bold!</b>';
  $mail->AltBody = $Message;  //'This is the body in plain text for non-HTML mail clients';

  if(!$mail->send()) {
    echo '<script> alert("Message Could Not Be Sent\n'. $mail->ErrorInfo.'"); </script>';
    // echo '<script>window.location="http://workspace.com?menuOption=Contact Us";</script>';
    header('Location: http://www.newbrunswickdistlay.org?menuOption=Contact Us');
  } else {
    echo '<script> alert("Email has been sent to '.$To.' for your confirmation "); </script>';
    header("Location: http://www.newbrunswickdistlay.org/subscribe.php?thankYou=$Name&subcriber=$To");
  }
}


echo "<script >
     var pag = '".$_GET['menuOption']."';
     var page = pag.replace('%20', ' ');
     var user = '".$user."';
     var menuItems = ['Home','Learn','History','About'];

     var currentM = '".date('M')."';
     var currentY = '".date('Y')."';

     var calendarArray = 'Calendar&post='+currentM+'&year='+currentY ;

     var menuOptions = ['Welcome','Connect','Explore','Register'];
     var pageOptions = ['Home','District Lay Leadership','Local Churches','Events','Newsletter','Calendar','Resources','Contact Us'];
     document.write(\"<div height='20' style='background-color:#1855c8;'></div>\");
     </script>";
echo "<title> Subscription Center </title>";


echo "<script> 
        $(function() {
           var ht = $('.center').height() - 345;
           $('#container-wrap2').height(ht); 
           $('#'+page).css('background-color', '#fff');           
        });</script>";
?>
        
<br/>
</head>

<body>
<br/>
<div id="header-wrap" >
<br/>
<div class="center" align="center" > <!-- ALL Datat goes here -->
<br/> <div id="image-wrap" >
<img id="banner" src="/files/header_images/Banner_nbdl_3828.jpg" alt="NBDL Banner">                                                    
</div> 
<br style="display:block;margin:4px 0;" />

<?php
echo "<div  >
     <table class='menuNavigation'>
     <tr>
     <script>
     function goto(x){
        if (x == 'Calendar'){
           window.location = 'http://newbrunswickdistlay.org?menuOption='+calendarArray;
        }else{
           window.location = 'http://newbrunswickdistlay.org?menuOption='+x;
        }
     }
     
     function sel(x){
           if(page != x.value){
              x.style.background = '#fff';
              x.style.color = '#8083ca';
           }else{
              x.style.background = '#0071c1';
              x.style.color = '#c5c6e4';
           } 
     }

     function desel(x){
        if(page != x.value){
           x.style.background = '#0071c1';
           x.style.color = '#c5c6e4';
        }else{
           x.style.background = '#fff';
           x.style.color = '#8083ca';       
        }
     }

     for(var i=0;i<=pageOptions.length;i++){
        if (pageOptions[i] == null){
	break;}
        document.write('<td><input type=\'button\' id=\''+pageOptions[i]+'\' value=\''+pageOptions[i]+'\' style=\'border:none;padding:0;background:transparent;font-size:15px;color:#c5c6e4;font-weight:bold;padding: 10px 5px;\' onmouseover=\'sel(this)\' onmouseout=\'desel(this)\' onclick=\'goto(this.value)\' /></td>');
     }
     </script>";

echo "</tr>
      </table>
      </div>
      <div id='center' >
       
      <br/> <br/>";

$menuOption = $_GET['menuOption']; 

if ($menuOption == 'Home'){
    echo $Home;
}elseif ($menuOption == 'District Lay Leadership'){
    echo $District_Lay_Leadership;
}elseif ($menuOption == 'Local Churches'){
    echo $Local_Churches;
}elseif ($menuOption == 'Events'){
    echo $Events;
}elseif ($menuOption == 'Newsletter'){
    require './newsLetterPDF/pdf.php'; 
}elseif ($menuOption == 'Calendar'){
    echo $calHeader;
    require 'calendar.php';
}elseif ($menuOption == 'Resources'){
    echo $Resources;
}elseif ($menuOption == 'Contact Us'){
    echo $Contact_Us;
}else {
    if (isSet($confirming)){
        try {
	  $st = $db->prepare("UPDATE users SET subscribed='$date' WHERE email='$confirming'");
	  $st->execute(); 
	  if (!$st){  
	    $st->$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  }
	} catch (PDOException $e){
	  error_log($e->getMessage());
	  echo str_replace('SQLSTATE[23000]: Integrity constraint violation: 1062', 'Error= ', $e->getMessage());
	  echo "<script> alert('Sorry your request has been denied!  Please note error and Try Again.'); window.history.back(); </script>";
	  die();
	}
        Echo "<h1> New Brunswick District Lay's Good News Newsletter </h1>";
        echo "<h2> Will Now Be Sent To: </h2>";
        echo "<h3 style='color:#0071c1;'> $confirming </h3>";
        echo "<div style='text-align:left;padding:.5cm .5cm .5cm .5cm'><br/><br/>";
        echo "<pre>Thank you, 
New Brunswick District Lay Public Relations Director
Subscription Center</pre></div>";
    }else{   
      if (isSet($Message)){
	echo "<H1 style='color:red;'> ".str_replace('%20', ' ', $Message)."<br/>Please Try Again.</H1>";
      }
      echo "<div style='text-align:left;padding:.5cm .5cm .5cm .5cm'> <form id='subscribe' action='".$_SERVER['PHP_SELF']."' method='GET'>";
      echo "<H2>Subscribe to New Brunswick District Lay Good News Newsletter:</H2> <br/><br/>";
      echo "<b>Name</b>  <font id='name*' color='red' size='4' > &ast;</font><br/><br/>";
      echo "&nbsp;&nbsp;&nbsp;&nbsp;First <input id='firstName' type='text' name='fname' maxlength='30' size='30' />&nbsp;&nbsp;&nbsp;&nbsp;";
      echo "Last <input id='lastName' type='text' name='lname' maxlength='30' size='30' /><br/><br/>";
      echo "<b>Email</b> <font id='email*' color='red' size='4' > &ast;</font><br/><br/>";
      echo "&nbsp;&nbsp;&nbsp;&nbsp;<input id='subscriberEmail' type='text' name='subscriber' maxlength='50' size='50' value='$subscriber' /><br/><br/><br/>";
      echo "<font id='name*' color='red' size='4' > &ast;&ast;</font>To ensure that you continue to receive emails from us, add newbrunslaypr@newbrunswickdistlay.org to your address book today. If you no longer wish to receive emails, DO NOT REPORT AS SPAM, instead click the unsubscribe link which will be provided below email.<br/>";
      echo "<pre>Thank you, 
New Brunswick District Lay Public Relations Director
Subscription Center</pre></div>";
      echo "<input type='submit' name='subscribe' value='Subscribe' style='background-color:#0071c1;color:white;font-size:18px' /></form>";
    }
}

?>

</div>

</div>


</div>

<div id="container-wrap1">
<br/> 
</div>
   <!--<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>-->

<div id="container-wrap2" style="height:<script> document.write(ht); <script>px;"></div>

<div id="footer"><br/><br/>
<font size="2" > Hosted by KevyTeky &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-follow" data-href="https://www.facebook.com/newbrunswickdistrictlay" data-layout="standard" data-size="small" data-show-faces="true"></div>

</body>
</html>
