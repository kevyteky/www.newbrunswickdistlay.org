<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/files/style.css" title="wsite-theme-css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="icon" type="image/png" sizes="16x16" href="/favicon.ico">
<style>
   b {color: #0071c1;}
   red {color: red;}
   green {color: green;}
   #pStrength {color: lightgrey;}
   #pMessage {font-size: 12px;}
   #eMessage {color: lightgrey;}
</style>

<?PHP 
print_r(array_keys($_POST));
echo "<br />";
print_r(array_Values($_POST));
echo "<br />";
print_r(array_keys($_GET));
echo "<br />";
print_r(array_Values($_GET));
include "PDO/connect.php";
require 'Classes.php'; 
require 'myPDF.php';
require 'newsLetter_pdf.php';
$user = 'KevyTeky';
$title = $_GET['menuOption'];
$uN='';
$uP='';

if(isSet($_POST["last"])){
  $lastN = $_POST["last"];
}else{ $lastN = NULL; }
if(isSet($_POST["first"])){
  $firstN = $_POST["first"];
}else{ $firstN = NULL; }
if(isSet($_POST["phone"])){
  $phone = $_POST["phone"];
}else{ $phone = NULL; }
if(isSet($_POST["ST"])){
  $st = $_POST["ST"];
}else{ $st = NULL; }
if(isSet($_POST["city"])){
  $city = $_POST["city"];
}else{ $st = NULL; }
if(isSet($_POST["address"])){
  $addr = $_POST["address"];
}else{ $addr = NULL; }
if(isSet($_POST['managerName'])){
  $userN = $_POST['managerName'];
}
if(isSet($_POST['passwd'])){
$pass = $_POST['passwd'];
}
if(isSet($_POST["email"])){
  $email = $_POST["email"];
}
if(isSet($_POST['managerReq'])){
  $activated = $_POST['managerReq']; 
}

if (isSet($activated))){
  $hashd = password_hash($pass, PASSWORD_DEFAULT);
  $st = $db->prepare("INSERT INTO managers (user_name, user_pwd, email, firstName, lastName, phone, state, city, address) VALUES ('$userN','$hashd','$email','$firstN','$lastN','$phone','$st','$city','$addr')");
  $st->execute();
  /////////////////////////////////////////////////////////////// STOPPED HERE
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
echo "<title> $title </title>";


echo "<script> 
        $(function() {
           var ht = $('.center').height() - 345;
           $('#container-wrap2').height(ht); 
           $('#'+page).css('background-color', '#fff');           
        });</script>";

echo "<script>
        $(function() {
           $('#checkName').change(function(){
             var nameCheck = $(this).val();
             $.ajax({
                    url: 'getData.php',
                    type: 'POST',
                    data:  {nameCheck: nameCheck},
                    success: function(data){
                            var status = data;
                            $('#nameResults').html(data);
                            if (status == '<green><strong> Available</strong> </green>'){
                                $('#checkPass').removeAttr('disabled');
                            }else{
                                $('#checkPass').attr('disabled','disabled');
                                $('#checkPass').val('');
                                $('#rate').val(0); 
                                $('#confirmPass').val('');
                                $('#confirmPass').attr('disabled','disabled');
                                $('#checkEmail').attr('disabled','disabled');
                            }
                    }
             });
           });
           $('#checkPass').change(function(){
              var passCheck = $(this).val();
              if(passCheck.length > 8){
                 $('#rate').val(25);
              }else{
                 $('#checkPass').val('');
                 $('#rate').val(0); 
                 $('#confirmPass').val('');
                 $('#confirmPass').attr('disabled','disabled');
                 $('#checkEmail').attr('disabled','disabled')
                 alert('Must be at least 8 characters longer');
                 exit(); 
              }
              var regex = /^(?=.*[a-z]).+$/;
              var currentNum = $('#rate').val();
              if( regex.test(passCheck) ) {
                  $('#rate').val(currentNum + 25);  
              }else{
                 $('#checkPass').val('');
                 $('#rate').val(0); 
                 $('#confirmPass').val('');
                 $('#confirmPass').attr('disabled','disabled');
                 $('#checkEmail').attr('disabled','disabled');
                 alert('Must include at least one lowercase letter');
                 exit(); 
              }
              var regex = /^(?=.*[A-Z]).+$/;
              var currentNum = $('#rate').val();
              if( regex.test(passCheck) ) {
                  $('#rate').val(currentNum + 25);  
              }else{
                 $('#checkPass').val('');
                 $('#rate').val(0); 
                 $('#confirmPass').val('');
                 $('#confirmPass').attr('disabled','disabled');
                 $('#checkEmail').attr('disabled','disabled');
                 alert('Must include at least one Capital letter');
                 exit();  
              }
              var regex = /^(?=.*[0-9_\W]).+$/;
              var currentNum = $('#rate').val();
              if( regex.test(passCheck) ) {
                  $('#rate').val(currentNum + 25);  
              }else{
                  $('#checkPass').val('');
                 $('#rate').val(0); 
                 $('#confirmPass').val('');
                 $('#confirmPass').attr('disabled','disabled');
                 $('#checkEmail').attr('disabled','disabled');
                 alert('Must include at least one special character!');
                 exit();  
              }
              $('#pStrength').css('color','Green');
              $('#confirmPass').removeAttr('disabled');
            });
           $('#confirmPass').change(function(){
             var dblCheck = $(this).val();
             var passCheck = $('#checkPass').val();
             if (dblCheck == passCheck){
                $('#confirmed').html('Accepted');
                $('#confirmed').css('color','green');
                $('#checkEmail').removeAttr('disabled');
             }else{
                $('#confirmed').html('Does not match');
                $('#confirmed').css('color','red');
                $(this).val('');
                $('#checkEmail).attr('disabled','disabled');
             } 
           });
           $('#checkEmail').change(function(){
             var emailCheck = $(this).val();
             var contains = emailCheck.indexOf('@') > 2;
             if (contains == true){
                $('#eMessage').css('color','Green');
                $('#readySend').removeAttr('disabled');
                $('#readySend').css({'background-color':'#0071c1','color':'white'});
             }else{
                $('#eMessage').css('color','red');
             }
           });
          });
       </script>";
                               
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
    echo "<h1 style='color:#0071c1;'>Please fill out below information</h1>";
    echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post" accept-charset="UTF-8">';
    echo "<b>First Name </b> <input type='text' name='first' size='25'/> <b> Last Name </b> <input type='text' name='last' size='25'/><br/>";
    echo "<div><br/> <b>Username </b> <red> &#42; </red> <input id='checkName' type='text' name='managerName' size='34'/><p id='nameResults'><strong id='pMessage'>Password must be at least 8 Characters long, including lowercase, Capital & Symbol </strong></p><br/>";
    echo "<b>Password </b> <red> &#42; </red> <input id='checkPass' type='password' name='passwd' size='35' disabled/><br/> ";
    echo "Password Strength <progress id='rate' value='0' max='100'> </progress> <strong id='pStrength'> Accepted </strong> <br/>";
    echo "<b>&nbsp;&nbsp;&nbsp; Confirm </b> <red> &#42; </red> <input id='confirmPass' type='password' name='confirm' size='35' disabled/><p id='confirmed'> </p><br/> ";
    echo "<b>Email</b> <red> &#42; </red> <input id='checkEmail' type='text' name='email' size='40' disabled/> <strong id='eMessage'> Accepted </strong> </div><br/> ";
    echo " <b> Phone# </b> <input type='text' name='phone' size='25'/> <b>State</b> <input type='text' name='ST' size='1'/><b> City</b> <input type='text' name='city' size='35'/><br/>";
    echo "<b>Address</b> <input type='text' name='address' size='100'/><br/><br/>";
    echo "<input id='readySend' type='submit' name='managerReq' value='Request' maxlength='25' disabled /><br/><br/>";
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


</body>
</html>