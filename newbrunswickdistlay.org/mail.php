<?php 
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

//echo phpinfo();
/*
$from = "webmaster@kevyteky.com";
$to = "kryals@universitylanguage.com";
$subject = "PHP Mail Test script";
$message = "This is a test to check the PHP Mail functionality at time ".date("h:i:sa");
$headers = "FROM:<".$from.">,username:".$from.",password:EatMe123";
mail($to,$subject,$message,$headers);

//mail('kevyteky@kenosia.net', 'testing mail time at 3:45pm', 'this is only a test');
echo "Test email sent";
*/

?>
<HTML>
<HEAD>
</HEAD>
<BODY>

<form method="post" action="email.php">
  Email: <input name="email" id="email" type="text" /><br />

  Message:<br />
  <textarea name="message" id="message" rows="15" cols="40"></textarea><br />

  <input type="submit" value="Submit" />
</form>

</BODY>
</HTML>