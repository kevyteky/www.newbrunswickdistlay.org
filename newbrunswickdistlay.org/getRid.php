<?php 
//error_log("Made it to getRid.php page!", 0);
include "PDO/connect.php";
if(isset($_POST['newsLetter'])){
   $file = $_POST['newsLetter'];
   $response = 0;

   if(file_exists($file)){
      unlink($file);
      echo $response = 1;
   }else{
      echo $response;
   }
}

if(isset($_POST['attached'])){
   $file = $_POST['attached'];
   $response = 0;

   if(file_exists($file)){
      unlink($file);
      echo $response = 1;
   }else{
      echo $response;
   }
}

if(isset($_POST['target'])){
   $file = $_POST['target'];
   $iD = $_POST['iD'];
   $Date = $_POST['date'];
   $Type = $_POST['type'];
   if(isSet($_POST['attached2Event'])){
       $set = $_POST['attached2Event'];
   }
   if(strpos($Type, '<a download=') !== false){
     $pic = $Type;
     $Type = 'pic';
   }
   //error_log("set= $set & type= $Type $ id= $iD & date = $Date");
   $response = 0;
   exit();
   //if(isSet($set)){
     if($Type == 'pic'){
       $st = $db->prepare("UPDATE nbdl_eventCalendar_copy SET type = NULL WHERE id = '$iD' and date = '$Date'");
       $st->execute();
     }else{
       $st = $db->prepare("UPDATE nbdl_eventCalendar_copy SET type = NULL, attachment = NULL WHERE id = '$iD' and date = '$Date'");
       $st->execute();
     }
     echo $response = 1;
   }else{
     if($Type == 'pic'){
       $st = $db->prepare("DELETE FROM nbdl_eventCalendar_copy WHERE event = 'rF#=$iD' AND date = '$Date' AND type LIKE '%{$file}%' ");
       $st->execute();
     }else{
       $st = $db->prepare("DELETE FROM nbdl_eventCalendar_copy WHERE event = 'rF#=$iD' AND date = '$Date' AND attachment = '$file' ");
       $st->execute();
     }
     echo $response = 1;
   }
/*
   if ($Type == 'pic'){
      $checkToSeeIfAttachmentIsStillNeeded = $db->prepare("SELECT id from nbdl_eventCalendar_copy WHERE type = '$pic'");
      $checkToSeeIfAttachmentIsStillNeeded->execute();
      $check = $checkToSeeIfAttachmentIsStillNeeded->fetch(PDO::FETCH_OBJ);
      if ($check != 0){
          echo "<script> if(confirm('The file $File is no longer being used, Delete it?')){
                              $.ajax({
                                      url: '/getRid.php',
                                      type: 'post',
                                      data: {'target':x,'iD':Id,'date':Date,'type':responses[0]['type']},                        
                                      success: function(response) {


*/
}


?>