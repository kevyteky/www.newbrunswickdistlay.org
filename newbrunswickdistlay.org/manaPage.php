<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/files/style.css" title="wsite-theme-css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="icon" type="image/png" sizes="16x16" href="/favicon.ico">


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

$lastN = $_GET["lname"];
$firstN = $_GET["fname"];
$from = $_GET["email"];
$mesg = $_GET["comment"];

if (isSet($firstN) or isSet($lastN)){
    mail("kryals@universitylanguage.com", "Re: Comment from web visitor", $mesg);
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
  echo $change_me;
    echo "<h1 style='color:#0071c1;'>Please Log In to Managage site</h1>";
    echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post" accept-charset="UTF-8">';
    echo "<h4 style='color:#0071c1;'>Username <input type='text' name='manager' maxlength='25'/></h4>";
    echo "<h4 style='color:#0071c1;'>Password <input type='password' name='pass' maxlength='25'/></h4>";
    echo "<h6 style='color:#0071c1;'><input type='checkbox' onClick='showPass();'> Show password</h6>";
    echo "<a href='http://newbrunswickdistlay.org/requestingMan.php'> Request to become a manager </a><br/><br/>";
    echo "<input type='submit' name='logInManager' value='Log On' maxlength='25' style='background-color:#0071c1;color:white;' /><br/><br/>";
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