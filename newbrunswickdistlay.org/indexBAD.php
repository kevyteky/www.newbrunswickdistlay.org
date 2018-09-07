<?php 
ob_start();
session_start();
$myusername = $_SESSION["mysession"];
$myemail = $_SESSION["myemail"];
$myusername = strtolower(ucwords($myusername));
$myemail = strtolower(ucwords($myemail));
/*
print_r(array_keys($_POST));
echo "<br />";
print_r(array_Values($_POST));
echo "<br />";
print_r(array_keys($_GET));
echo "<br />";
print_r(array_Values($_GET));
*/ 
include "PDO/connect.php";

$browser = $_SERVER['HTTP_USER_AGENT'];
if (strpos($browser, 'Edge')){
  $webB = 'Edge';
}elseif (strpos($browser, 'Trident')){
  $webB = 'IE';
}elseif (strpos($browser, 'Chrome')){
  $webB = 'Chrome';
}elseif (strpos($browser, 'Firefox')){
  $webB = 'Firefox';
}
//echo $webB.'<br>';

echo "<!DOCTYPE html><HTML><HEAD>";
echo "<link rel='stylesheet' type='text/css' href='/VIEW/style.css' title='wsite-theme-css'>";
echo "<link rel='stylesheet' type='text/css' href='/VIEW/dropzone.css' title='wsite-theme-css'>";
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>";
echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css'>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js'></script>";
echo '<script src="js/dropzone.js"></script>';
echo '<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">';
echo "<style>
    a:link {
    color: #F1C40F; 
    background-color: transparent; 
    text-decoration: none;
    } 

    a:visited {
    color: pink;
    background-color: transparent;
    text-decoration: none;
    }

    a:hover {
    color: green;
    background-color: transparent;
    text-decoration: underline;
    }

    a:active {
    color: yellow;
    background-color: transparent;
    text-decoration: underline;
    }
    .dropzone .dz-remove {
    color: #000000;
    }
    #myModal {
    ##display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 300px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }
  .modal-header {
    background-color: #000000;
    color:  #FFFFFF;
    width:  80%;
  }

  /* The Close Button */
  .close {
    color: #aaaaaa;
    float: right;
    font-size: 48px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: #FF0000;
    text-decoration: none;
    cursor: pointer;
  }</style>";
echo "<SCRIPT>";
$mos = ["Januaray","February","March","April","May","June","July","August","September","October","November","December"];

echo "$(function(){";
foreach ($mos as $val){
    echo "$('#delete_$val').on('click',function(){
             var chk = $(this).is(':checked');
             if (chk == true){
                $('.{$val}_chk').prop('checked',true);
             }
             if (chk == false){
                $('.{$val}_chk').prop('checked',false);
             }
          });
          $('.{$val}H').on('click',function(){
             $('.$val').toggle();
          });";
}
echo "});";

echo "$(function(){ 
        $('.closeOpt').on('click',function(){
           $('.closeX').hide();
           $('.emailWrapper').hide();
           return false;
        });
       $('.close').on('click',function(){
           alert('made it');
       });
        $('#createUO').on('click',function(){
           $('#manageOpt').hide();
           $('#searchOpt').hide();
           $('#requestOpt').hide();
           $('#messagesOpt').hide(); 
           $('#calendarOpt').hide();
           $('#containerSearch').hide();
           $('#userSearches').hide();
           $('#containerSearch').hide();
           $('#clientSearches').hide();
           $('#clientsMan').hide();
           $('#containerMan').hide();
           $('#pickupsMan').hide();
           $('#dropsMan').hide();
           $('.emailWrapper').hide();
           $('#createOpt').show();
        });
        $('#creatingCloud').on('click',function(){
           $('#cloudContainer').show();
           $('#myClient').hide();
           $('#myPickups').hide();
           $('#myDrops').hide();
        });
        $('#creatingClient').on('click',function(){
           $('#myClient').show();
           $('#cloudContainer').hide();
           $('#myPickups').hide();
           $('#myDrops').hide();
        });
        $('#creatingPickups').on('click',function(){
           $('#myPickups').show();
           $('#cloudContainer').hide();
           $('#myClient').hide();
           $('#myDrops').hide();
        });
        $('#creatingDrops').on('click',function(){
           $('#myDrops').show();
           $('#cloudContainer').hide();
           $('#myClient').hide();
           $('#myPickups').hide();
        });
        $('#searchUO').on('click',function(){
           $('#createOpt').hide();
           $('#manageOpt').hide();
           $('#requestOpt').hide();
           $('#messagesOpt').hide(); 
           $('#calendarOpt').hide();
           $('#cloudContainer').hide();
           $('#myClient').hide();
           $('#myPickups').hide();
           $('#myDrops').hide();
           $('#clientsMan').hide();
           $('#containerMan').hide();
           $('#pickupsMan').hide();
           $('#dropsMan').hide();
           $('.emailWrapper').hide();
           $('#searchOpt').show();
        });
        $('#cloudSearch').on('click',function(){
           $('#containerSearch').show();
           $('#userSearches').hide();  
           $('#clientSearches').hide();       
        });
        $('#userSearch').on('click',function(){
           $('#containerSearch').hide();
           $('#clientSearches').hide();
           $('#userSearches').show();          
        });
        $('#clientSearch').on('click',function(){
           $('#userSearches').hide();
           $('#containerSearch').hide()
           $('#clientSearches').show();
        });
        $('#manageUO').on('click',function(){           
           $('#createOpt').hide();
           $('#searchOpt').hide();
           $('#requestOpt').hide();
           $('#messagesOpt').hide();
           $('#calendarOpt').hide();
           $('#cloudContainer').hide();
           $('#myClient').hide();
           $('#myPickups').hide();
           $('#myDrops').hide();
           $('#userSearches').hide();
           $('#containerSearch').hide(); 
           $('#clientSearches').hide();
           $('.emailWrapper').hide();
           $('#manageOpt').show();
        });
        $('#manContainer').on('click',function(){
           $('#containerMan').show();
           $('#clientsMan').hide();
           $('#pickupsMan').hide();
           $('#dropsMan').hide();
        });
        $('#manClients').on('click',function(){
           $('#clientsMan').show();
           $('#containerMan').hide();
           $('#pickupsMan').hide();
           $('#dropsMan').hide();
        });
        $('#manPickups').on('click',function(){
           $('#pickupsMan').show();
           $('#containerMan').hide();
           $('#clientsMan').hide();
           $('#dropsMan').hide();
        });
        $('#manDrops').on('click',function(){
           $('#dropsMan').show();
           $('#containerMan').hide();
           $('#clientsMan').hide();
           $('#pickupsMan').hide();
        });           
        $('#requestUO').on('click',function(){           
           $('#createOpt').hide();
           $('#searchOpt').hide();
           $('#manageOpt').hide();
           $('#messagesOpt').hide();
           $('#calendarOpt').hide(); 
           $('#cloudContainer').hide();
           $('#myClient').hide();
           $('#myPickups').hide();
           $('#myDrops').hide();
           $('#userSearches').hide();
           $('#containerSearch').hide();
           $('#clientSearches').hide();
           $('#clientsMan').hide();
           $('#containerMan').hide();
           $('#pickupsMan').hide();
           $('#dropsMan').hide();
           $('#requestOpt').show();
        });
        $('#messagesUO').on('click',function(){           
           $('#createOpt').hide();
           $('#searchOpt').hide();
           $('#manageOpt').hide();
           $('#requestOpt').hide();
           $('#calendarOpt').hide();
           $('#cloudContainer').hide();
           $('#myClient').hide();
           $('#myPickups').hide();
           $('#myDrops').hide();
           $('#userSearches').hide();
           $('#containerSearch').hide();
           $('#clientSearches').hide();
           $('#clientsMan').hide();
           $('#containerMan').hide();
           $('#pickupsMan').hide();
           $('#dropsMan').hide();
           $('#messagesOpt').show();
           $('#inboxM').show(); 
        });
        attArray = [];
        //function sendMessage(){
       $('#sendMessage').on('click',function(){
           var sFrom = $('#sendFrom').val();
           var sTo = $('#sendTo').val();
           var sSubject = $('#sendSubject').val();
           var sAtt = attArray;
           var sBody = $('#sendBody').val();
           $.ajax({
                   url:       'sMess.php',
                   type:      'POST',
                   data:      {'from':sFrom,'to':sTo,'sub':sSubject,'attach':sAtt,'body':sBody},
                   async:     false,
                   success:   function(){
                                 alert('this is the response=');
                              }
           });
        });
        $('#submitSend').on('click',function(){
        });
        $('#selectTo').on('click',function(){
           var size = $('#addClient').children('option').length;
           if (size > 1 ){
             $('#addClient').show();
           }
        });
        $('#selectAtt').on('click',function(){
           
        });      
        $('#addClient').on('change',function(){
           var apnd = $('#to').val();
           $('#to').val(apnd +$(this).val()+';');
           $('#addClient option[value='+$(this).val()+']').remove();
           $(this).hide();
        });
        $('.closeSend').on('click',function(){
           $('#myModal').hide();
           $('#sentBody').hide();
           ('#myModal').children().last().remove();
        });
        $('#newM').on('click',function(){
           $('#myModal').show();
           $('#sentBody').show();
           $('#sentBody').appendTo('#myModal');
        });
        $('#sentMessages').on('click',function(){
           $('#sentMessages').hide();
           $('#inboxMessages').show();
           $('#inboxM').hide();
           $('#sentM').show();
           return false;
        });
        $('#inboxMessages').on('click',function(){
           $('#inboxMessages').hide();
           $('#sentMessages').show();
           $('#sentM').hide();
           $('#inboxM').show();           
           return false;
        });
        $('#deleteM').on('click',function(){
           var oneToMany = $('[class$=_chk]:checkbox:checked');
           if(Object.keys(oneToMany).length <= 2){
               alert('You must select a email');
               return;
           }else if (Object.keys(oneToMany).length == 3){
               var Title = 'Delete Email Confirm';
           }else {
               var Title = 'Delete Emails Confirm';
           }
           $.confirm({
              title: Title,
              content: 'This action can not be undone!',
              buttons: {
                 confirm: function () {
                    $.alert('Confirmed!');
                    $('[class$=_chk]:checkbox:checked').each(function(){
                       var folderN = '$myusername';
                       var Del = $(this).val();
                       var Hide = $(this).attr('name');
                       $.ajax({
                             url: 'removeM.php',
                             type:  'POST',
                             data:  {'deleting':Del,'folder':folderN,'attach':Hide}, 
                             success: function(result){
                                $('#'+Hide).parent().hide();
                             }
                       });
                    });
                 },
                 cancel: function () {
                    $.alert('Canceled!');
                 }
              }
           });
        });
        $('.messShow').on('click',function(){
           var show = $(this).attr('id');
           $('#show_'+show).show();
        });
        $('.openMessage').on('click',function(){
           var mess = $(this).attr('id');
           $('.showMess'+mess).show();
        });
        $('.closeMessage').on('click',function(){
           var mess = $(this).attr('value');
           $('#'+mess).hide();           
        });
        $('#expandM').on('click',function(){
           //alert('made it to Expand');
           $(this).hide();
           $('#collapseM').show();
           $('#myModal').show();
           //$('#messagesUO').clone(true).appendTo('#myModal');
           $('#messagesUO').appendTo('#myModal');
        });
        $('#collapseM').on('click',function(){
           //alert('made it to Collapse');
           $('#calendarUO').before($('#messagesUO'));
           $('#myModal').children().last().remove();
           $('#collapseM').hide();
           $('#expandM').show();
           $('#myModal').hide();
        });
        
        $('#calendarUO').on('click',function(){           
           $('#createOpt').hide();
           $('#searchOpt').hide();
           $('#manageOpt').hide();
           $('#requestOpt').hide();
           $('#messagesOpt').hide(); 
           $('#cloudContainer').hide();
           $('#myClient').hide();
           $('#myPickups').hide();
           $('#myDrops').hide();
           $('#userSearches').hide();
           $('#containerSearch').hide();
           $('#clientSearches').hide();
           $('#clientsMan').hide();
           $('#containerMan').hide();
           $('#pickupsMan').hide();
           $('#dropsMan').hide();
           $('.emailWrapper').hide();
           $('#calendarOpt').show();
        });


});";

echo "</SCRIPT>";
echo "</HEAD>";
echo "<DIV id='mainHeader' align='right' >";
if ($myusername == null){
  echo "<DIV id='mainHeader' align='right' style='min-height:4%;background-color:#000000;'>";
  echo "<img id='userStatus' src='/IMG/loggedOff.png' alt='loggedOff'  height='35' width='35'>";
  echo "</DIV>";
}else{
  echo "<DIV id='mainHeader' align='right' style='min-height:5.5%;background-color:#000000;'>";
  echo "<div style='display:inline-block;margin-right:65px;'><img id='userStatus' src='/IMG/userIcon.png' alt='loggedOn'  height='50', width='55'></div style='display:inline-block;'><br/><div><table bgcolor='#000000' style='border: 1px solid black;'><tr><td width='175px' align='center' height='15px' style='background-color:#000000;color:#FFFFFF;'> $myusername </td></tr><td id='logOut' align='center' width='120px' style='background-color:#000000;color:#000000;'><form name='logOut' action='logOut.php' method='POST' ><input type='submit' value='LogOut' style='width:50%;height:100%;background-color:#FFFFFF;color:#000000;'></form></td></tr></table></div></div>";
}

echo "</DIV>";
if (isSet($_GET['error'])){
  $errMess = $_GET['error'];    
  $user = $_GET['user'];
  if ($errMess == 'Employees must use a company regulated email address to register on Pick~N~Drop site'){
    $user = null;
  }
  if(!isSet($user)){
    $user = null;
  }
  echo "<TITLE>PickUp & DropOff LogOn </TITLE>";
  echo "<BODY>";
  echo "<DIV align='center' style='height:50%;width:98%;position:absolute'>";
  echo "<DIV align='center' style='height:35%;width:35%;margin-top:10cm'>";
  echo "<H2>To access the <i> PickUp & DropOff</i> you must logOn</H2>";
  echo "</DIV>";
  echo "<DIV align='center' style='height:35%;width:35%%;position:'>";
  echo "There was a problem completing your request.  Please note the Errors below and reach out to us via the <a href='https://www.pick-n-drop.com/contact.php?note:".$errMess."' >Contact Page</a>.<br/>";
  echo "<span style='color:#FF0000;'>ERROR:  $errMess </span><br/>";
  echo "However, ".((isSet($user))? "you may still try to Log On using credentials you just created as $user or retry registrations process below.<br/>" :"you may retry registrations process below, but if registration code is no longer sufficient please <a href='https://www.pick-n-drop.com/contact.php?note:".$errMess."' >Contact Us</a>.<br/>"); 
  echo "<form name='entry' action='checklogin.php' method='POST'>";
  echo "<span id='username'>User Name</span><br/>";
  echo "<input type='text' size='25' name='myusernameis' ".((isSet($user))? $user : '')."/><br/>";
  echo "<span id='username'>Password</span><br/>";
  echo "<input type='password' size='25' name='mypasswordis' /><br/>";
  echo "<input type='submit' value='submit' name='enter' style='width:210px;background-color:#000000;color:#FFFFFF' /><br/>";
  echo "<input type='submit' value='Forgot Username or Password' name='lost' style='width:210px;background-color:#000000;color:#FFFFFF;' /><br/>";
  echo "<input type='submit' value='Register' name='reg' style='width:210px;background-color:#000000;color:#FFFFFF;' /></form>";
  echo "</DIV>";
  echo "</DIV>";
  die();
}

if ($myusername == null or isSet($_GET['wrongLogin'])){
  echo "<TITLE>PickUp & DropOff LogOn </TITLE>";
  if(isSet($_GET['wrongLogin'])){
    echo "<script> alert('Username or Password do not match'); </script>";
  }
  echo "<BODY>";
  echo "<DIV align='center' style='height:50%;width:98%;position:relative;'>";
  echo "<DIV align='center' style='height:35%;width:35%;margin-top:5cm'>";
  echo "<img id='siteLogo' src='/IMG/pick-n-drop.png' alt='Logo'  height='150', width='155'>";
  echo "<H2>To access the <i> PickUp & DropOff</i> you must logOn</H2>";
  echo "</DIV>";
  echo "<DIV align='center' style='height:35%;width:35%;'>";
  echo "<form name='entry' action='checklogin.php' method='POST'>";
  echo "<br/><br/><span id='username'>User Name</span><br/>";
  echo "<input type='text' size='25' name='myusernameis' /><br/>";
  echo "<span id='username'>Password</span><br/>";
  echo "<input type='password' size='25' name='mypasswordis' /><br/>";
  echo "<input type='submit' value='submit' name='enter' style='width:210px;background-color:#000000;color:#FFFFFF' /><br/>";
  echo "<input type='submit' value='Forgot Username or Password' name='lost' style='width:210px;background-color:#000000;color:#FFFFFF;' /><br/>";
  echo "<input type='submit' value='Register' name='reg' style='width:210px;background-color:#000000;color:#FFFFFF;' />";
  echo "</DIV>";
  echo "</DIV>";
}else{
  echo "<TITLE>PickUp & DropOff Welcome</TITLE>";
  echo "<BODY>";
  echo "<br/>";
  echo "<DIV id='bodyContainer' >";
  echo "MAIN CONTAINER";
  echo "<br/>";
  echo "<DIV id='optionContainer' >";
  echo "OPTION CONTAINER";
  echo "<br/>";

  echo "<DIV id='userOptions' >";
  $uo = ['Create','Search','Manage','Request Access','Messages','Calendar'];

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////   User Options (what users can do)
  date_default_timezone_set('UTC');
  $timeCode = date("Y-m-d H:i:sa");
  $timetokill = date("Y-m-d H:i:sa", strtotime('+3 Hours'.strtotime($timeCode)));
  $regStart = $myusername.'Jk'.$timeCode.'09n_';
  $regCode = rand(1111,9999).'AKOPL'.hash('sha384', $regStart);
  $windowsShit = "style=''";
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// Code for User Options
  echo "<DIV id='createUO' class='userOptions' >Create";
  echo "<SPAN id='createOpt' class='closeX' style='display:none;' ><SPAN class='closeOpt' style='float:right;vertical-align:top;color:red;font-size:25px;' >x</SPAN><br/><br/><span class='gridWrap' ><span id='creatingCloud' class='button' ><u>Cloud Container</u></span><span id='creatingClient' class='button' ><u>Client</u></span><span id='creatingPickups' class='button' ><u>Pickups</u></span><span id='creatingDrops' class='button' ><u>Dropoffs</u></span></span></SPAN>";
  echo "<DIV id='cloudContainer' class='closeX' style='display:none;'>
           <form name='createCloud' action='cloudCreate.php' method='POST'>
              <label > Container Name </label><br/>
              <input type='text' name='countainerName' style='width:100%;background-color:#000000;color:#FFFFFF' /><br/>
              <label > In Folder </label><br/>";
  echo "      <input type='submit' name='containerCreate' value='Create' style='width:100%;background-color:#000000;color:#FFFFFF' DISABLED />
           </form>
        </DIV>";
  echo "<DIV id='myClient' class='closeX' style='display:none;'>
           <form name='createClient' action='clientCreate.php' method='POST'>
              <label > Name </label><br/>
              <input type='text' name='clientName' style='width:100%;background-color:#000000;color:#FFFFFF' /><br/>
              <label > Email </label><br/>
              <input type='text' name='clientEmail' style='width:100%;background-color:#000000;color:#FFFFFF' /><br/>
              <label > Registration Identification Number </label><br/>
              <input type='text' name='clientRegID' style='width:100%;background-color:#000000;color:#FFFFFF' value='$regCode' READONLY/><br/>
              <input type='submit' name='clientCreate' value='Create' style='width:100%;background-color:#000000;color:#FFFFFF' DISABLED />
           </form>
        </DIV>";
  echo "<DIV id='myPickups' class='closeX' style='display:none;'>
          <form action='createTemp.php' method='POST' enctype='multipart/form-data'>
             <label ><b>Create Pickup location:</b></label><br/>
             <input id='createPickup' name='pickup' type='text' style='width:100%;background-color:#000000;color:#FFFFFF' /><br/>
             <div id='continuePU' align='center' style='display:none;'><label ><b>&darr; Please fill out all information below &darr;</b></label><br/> <span align='center' style='width:50%><label ><b>Created For</b></label></span><span align='center' style='width:50%><label ><b>Number of downloads:</b></label></span><br/>
             <input id='pickupFor' type='text' style='width:50%;background-color:#000000;color:#FFFFFF' /><input id='pickupFor' type='text' style='width:50%;background-color:#000000;color:#FFFFFF' /><br/>
             <input id='pickupFor' type='file' style='width:100%;background-color:#000000;color:#FFFFFF' /></div>    
             <input id='sendPickup' type='submit' value='Create' style='width:100%;background-color:#000000;color:#FFFFFF' DISABLED /><br/>
          </form>
        </DIV>";
  echo "<DIV id='myDrops' class='closeX' style='display:none;'>
          <form action='createTemp.php' method='POST' enctype='multipart/form-data'>
             <label ><b>Create Drop location:</b></label><br/>
             <input id='createDrops' name='drop' type='text' style='width:100%;background-color:#000000;color:#FFFFFF' /><br/>
             <div id='continueD' align='center' style='display:none;'><label ><b>&darr; Please fill out all information below &darr;</b></label><br/> <span align='center' style='width:50%><label ><b>Created For</b></label></span><span align='center' style='width:50%><label ><b>Maximum Size</b></label></span><br/>
             <input id='dropFor' type='text' style='width:50%;background-color:#000000;color:#FFFFFF' /><input id='dropSize' type='text' style='width:50%;background-color:#000000;color:#FFFFFF' /></div>    
             <input id='sendDrop' type='submit' value='Create' style='width:100%;background-color:#000000;color:#FFFFFF' DISABLED /><br/>
          </form>
        </DIV>";
  echo "</DIV>";
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  Searching user options
  echo "<DIV id='searchUO' class='userOptions' >Search &#38; Request" ;
  echo "<SPAN id='searchOpt' class='closeX' style='display:none;' ><SPAN class='closeOpt' style='float:right;vertical-align:top;color:red;font-size:25px;' >x</SPAN><br/><br/><DIV class='gridWrap' ><SPAN id='cloudSearch' class='button'><u>Cloud Containers</u></SPAN> <SPAN id='userSearch' class='button'><u>Users</u></SPAN><SPAN id='clientSearch' class='button'><u>My Clients</u></SPAN></DIV></SPAN>";
  echo "<DIV id='containerSearch' class='closeX' style='display:none;'>
          <label ><b>Type to search:</b></label><br/>
          <input id='ccSearch' type='text' style='width:100%;background-color:#000000;color:#FFFFFF' /><br/>
          <div id='ccResults'></div>
          <label ><b>Scroll to search:</b></label><br/>
          <select id='ccScroll'><option value='null'>Select a Container</option>";
  $st = $db->prepare("SELECT * FROM containerz");
  $st->execute();
  $results = $st->fetchALL();
  foreach($results as $c){
    echo "<option value='".$c['name']."'>".$c['name']."</option>";
  }
  echo "</select><br/><div id='containerzResults'></div></DIV>";
  echo "<DIV id='userSearches' class='closeX' style='display:none;'>
          <label ><b>Type to search:</b></label><br/> 
          <input id='cSearch' type='text' style='width:100%;background-color:#000000;color:#FFFFFF' /><br/>  
          <div id='cResults'></div>
          <label ><b>Scroll to search:</b></label><br/>
          <select id='uScroll'><option value='null'>Select a User</option>";   
  $st = $db->prepare("SELECT uzrName, uzrEmail FROM uzerz");
  $st->execute();
  $results = $st->fetchALL();
  foreach($results as $c){
    if ($c['uzrName'] == ''){
      continue;
    }
    echo "<option value='".$c['uzrName']."'>".$c['uzrName']." &hArr; ".$c['uzrEmail']."</option>";
  }
  echo "</select><br/><div id='usersResults'></div></DIV>";
  echo "<DIV id='clientSearches' class='closeX' style='display:none;'>
          <label ><b>Type to search:</b></label><br/> 
          <input id='uSearch' type='text' style='width:100%;background-color:#000000;color:#FFFFFF' /><br/>  
          <div id='cResults'></div>
          <label ><b>Scroll to search:</b></label><br/>
          <select id='cScroll'><option value='null'>Select a Client</option>";   
  $table = str_replace('@','_', $myemail);
  $table = str_replace('.com','', $table);
  $st = $db->prepare("Select uzerz.id, uzerz.uzrName, $table.firstname, $table.lastname, uzerz.dateCreated FROM uzerz INNER JOIN $table ON uzerz.uzrEmail = $table.uzrEmail");
  $st->execute();
  $results = $st->fetchALL();
  foreach($results as $c){
    if ($c['id'] == ''){
      continue;
    }
    echo "<option value='".$c['uzrName']."'>".$c['uzrName']." &hArr; ".$c['dateCreated']."</option>";
  }
  echo "</select><br/><div id='usersResults'></div></DIV>";
  echo "</DIV>";
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  Managing user options 
  echo "<DIV id='manageUO' class='userOptions' >Manage";
  echo "<SPAN id='manageOpt' class='closeX' style='display:none;' ><SPAN class='closeOpt' style='float:right;vertical-align:top;color:red;font-size:25px;' >x</SPAN><br/><br/><DIV class='gridWrap' ><SPAN id='manContainer' class='button' ><u>Cloud Containers</u></SPAN><SPAN id='manClients' class='button' ><u>Clients</u></SPAN><SPAN id='manPickups' class='button' ><u>Pickups</u></SPAN><SPAN id='manDrops' class='button' ><u>Dropoffs</u></SPAN></DIV></SPAN>";
  echo "<DIV id='containerMan' class='closeX' style='display:none;'>
          <label ><b>My Containers:</b></label><br/>
          <select id='myContainers'><option value='null'>Select a Container</option>";
  $st = $db->prepare("SELECT name FROM containerz WHERE createdBy='$myusername'");
  $st->execute();
  $results = $st->fetchALL();
  foreach($results as $c){
    echo "<option value='".$c['name']."'>".$c['name']."</option>";
  }
  echo "</select><br/><div id='myContainerResults'></div></DIV>";
  echo "<DIV id='clientsMan' class='closeX' style='display:none;'>
          <label ><b>My Clients:</b></label><br/>
          <select id='myClientMan'><option value='null'>Select a Client</option>";
  $st = $db->prepare("SELECT uzrName FROM uzerz, $table WHERE uzerz.uzrEmail = $table.uzrEmail");
  $st->execute();
  $results = $st->fetchALL();
  foreach($results as $c){
    echo "<option value='".$c['uzrName']."'>".$c['uzrName']."</option>";
  }
  echo "</select><br/><div id='myClientsResults'></div></DIV>";
  echo "<DIV id='pickupsMan' class='closeX' style='display:none;'>
          <label ><b>Manage Pickup locations:</b></label><br/>
          <select id='myPickups'><option value='null'>Select a Pickup</option>";
  $st = $db->prepare("SELECT name, createdFor FROM pickups WHERE createdBy = '$myusername'");
  $st->execute();
  $results = $st->fetchALL();
  foreach($results as $c){
    echo "<option value='".$c['name']."'>".$c['createdFor']." &hArr; ".$c['name']."</option>";
  }
  echo "</select><br/><div id='myPickupsResults'></div></DIV>";
  echo "<DIV id='dropsMan' class='closeX' style='display:none;'>
          <label ><b>Manage Drop locations:</b></label><br/>
          <select id='myDrops'><option value='null'>Select a DropOff</option>";
  $st = $db->prepare("SELECT name, createdFor FROM drops WHERE createdBy = '$myusername'");
  $st->execute();
  $results = $st->fetchALL();
  foreach($results as $c){
    echo "<option value='".$c['name']."'>".$c['createdFor']." &hArr; ".$c['name']."</option>";
  }
  echo "</select><br/><div id='myPickupsResults'></div></DIV>";
  echo "</DIV>";
  /*
  echo "<DIV id='requestUO' class='userOptions' >Request Access";
  echo "<SPAN id='requestOpt' class='closeX' style='display:none;' ><br/><u>Access File</u> <u>Access Folder</u> <u>Request File</u> <u>Request Folder</u> </SPAN></DIV>";
  */
  echo "<DIV id='messagesUO' class='userOptions' >Messages";  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  MESSAGES
  echo "<SPAN id='messagesOpt' class='closeX' style='display:none;' ><SPAN class='closeOpt' style='float:right;vertical-align:top;color:red;font-size:25px;' >x</SPAN><br/><br/><DIV class='gridWrap' ><SPAN id='newM'  class='button'><u>New</u></SPAN><SPAN id='sentMessages' class='button'><u>Sent</u></SPAN><SPAN id='inboxMessages' class='button' style='display:none;'><u>Inbox</u></SPAN><SPAN id='deleteM' class='button' ><u>Delete</u></SPAN><SPAN id='expandM' class='button'><u>Expand</u></SPAN><SPAN id='collapseM' class='button' style='display:none;'><u>Collapse</u></SPAN></DIV></SPAN>";
  /*
$m = $myusername.'@pick-n-drop.com';  
$mbox = imap_open("{pick-n-drop.com/novalidate-cert}", "$m", "jN.9YobsAvFZ7.0c1s0LD9c1LEK8qQV", OP_HALFOPEN)  //, OP_READONLY
    or die("can't connect: " . imap_last_error());

$list = imap_list($mbox, "{pick-n-drop.com}", "*");
if (is_array($list)) {
    foreach ($list as $val) {
        echo imap_utf7_decode($val) . "\n";
    }
} else {
    echo "imap_list failed: " . imap_last_error() . "\n";
}

imap_close($mbox);
  */
include 'inboxM.php';
include 'sentM.php';

  echo "</DIV>";
  echo "<div id='sentBody' style='height:40%;display:none;background-color:#000000;color:#FFFFFF'>
       <div>
       <div style='width:5%;float:left;font-size:16pt;'>
       &nbsp;<strong>From:</strong><br>
       &nbsp;<strong id='selectTo'>To:</strong><select id='addClient' style='display:none'><option value='Select'>Clients</option>";
  $client = ['a','b','c','d','e','ef'];
  foreach ($client as $option){
    echo "<option value='$option'>$option</option>";
  }

  echo "</select><br>";
  echo "<script>
        function phpBytes(bytes){
           $.ajax({
                   url: 'convertBytes.php',
                   type:  'POST',
                   data:  {'bytes':bytes}, 
                   success: function(response){
                               $('#attSize').html( response );
                   }
           });

        }
        var add = 0;
        Dropzone.options.dropZone = {
                                     paramName: 'file', 
                                     addRemoveLinks: true,
                                     //maxFiles: 1,  // How many files
                                     maxFilesize: 30, // MB
                                     dictFileSizeUnits: 'mb',
                                     dictDefaultMessage: 'Drag a file in here to upload, or click to select a file to upload',
                                     init: function(){
                                              this.on('removedfile', function(file){
                                                    var r = file.name;
                                                    var remove = r.replace(/[^a-zA-Z0-9]/g,'');
                                                    $('.'+remove).remove();
                                                    currentSize = $('#totalSize').html();
                                                    var minus = +currentSize - +file.size;
                                                    if(minus == 0){
                                                       $('#totalSize').html(minus);
                                                       $('#attSize').html('');                                                                                                       
                                                    }else{
                                                       phpBytes(minus);
                                                       $('#totalSize').html(minus);                                                                                                       
                                                    }
                                                    var index = attArray.indexOf(file.name);
                                                    attArray.splice(index, 1);  
                                              });
                                              this.on('success', function(file){  
                                                    var c = file.name;
                                                    var cName = c.replace(/[^a-zA-Z0-9]/g,'');        
                                                    $('#placeAtt').append('<img class=\"'+cName+'\" src=\"/IMG/addAtt.png\" alt=\"attachment'+add+'\" height=\"15\", width=\"15\"><input id=\"sendAtt'+add+'\" class=\"'+cName+'\" type=\"text\" value=\"'+file.name+'\" name=\"attachment'+add+'\" style=\"width:auto;background-color:#000000;color:#FFFFFF\" />');
                                                    add = add + 1;
                                                    currentSize = $('#totalSize').html();
                                                    if (currentSize == ''){
                                                       var byte = file.size;
                                                    }else{
                                                       var byte = +file.size + +currentSize;
                                                    }
                                                    phpBytes(byte);
                                                    $('#totalSize').html(byte);
                                                    attArray.push(file.name);
                                                    //if( byte > '15000000'){
                                                    //   $('#attSize').css('color':'yellow');
                                                    //}
                                              });
                                           }
                                     };
       </script>";
  echo "&nbsp;<strong>Subject:</strong><br>
       &nbsp;<strong id='selectAtt'>Attachment:</strong><br>
       <input id='sendMessage' type='button' value='Send' style='width:85px;height:145px;background-color:#000000;color:#FFFFFF' />
       </div>
       <div style='width:90%;float:left;'> 
       <input type='text' id='sendFrom' name='from' value='$m' style='width:310px;background-color:#000000;color:#FFFFFF' size='150' READONLY><br>
       <input type='text' id='sendTo' name='to' style='width:100%;background-color:#000000;color:#FFFFFF' size='150'><br>
       <input type='text' id='sendSubject' name='subject' style='width:100%;background-color:#000000;color:#FFFFFF' size='150'><br style='line-height: 10px' /> &nbsp; &nbsp; &nbsp; &nbsp;
       <span id='placeAtt' style='height:15px'></span>&nbsp;&nbsp;<span id='attSize' style='height:15px;color:#82E0AA'></span><span id='totalSize' style='height:15px;display:none'></span>
       <div style='color:#000000;'><form action='holdAtt.php' method='POST' class='dropzone' id='dropZone'></form></div><br>
       </div>
       <div style='width:5%;float:left;'>
       <SPAN class='closeSend' style='float:right;vertical-align:top;color:#FFFFFF;font-size:25px;' >x</SPAN>
       </div>
       </div><br>
       <div style='clear:both;background-color:#000000;color:#FFFFFF;'><pre><textarea id='sendBody' rows='20' cols='260' class='mBody' ></textarea></pre></div></div>";

  echo "<div id='myModal' class='modal' style='display:none;'></div>";
  echo "<DIV id='calendarUO' class='userOptions' >Calendar";
  echo "<SPAN id='calendarOpt' class='closeX' style='display:none;' ><br/><DIV class='gridWrap' ><u>Upload History</u> <u>Download History</u> <u>Client History</u></DIV> </SPAN></DIV>";

  echo "<br/>";
  echo "</DIV>";

  echo "<DIV id='folderOptions' >";
  // Folders, 
  $fo = ['Folders','Create','Search','Manage','Archive','Favorites'];
  
  echo "<img id='folders' src='/IMG/gotoFolders.png' alt='Folders & Files' height='75', width='75'>";
  echo "<img id='container' src='/IMG/gotoContainer.png' alt='Container' height='75', width='100'>";

  echo "<br/>";
  echo "</DIV>";

  echo "</DIV>";
  echo "</DIV>";
}
echo "</BODY>";

echo "</HTML>";
?>