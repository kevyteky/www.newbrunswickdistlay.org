<?php
///*
//echo '<!DOCTYPE html>';
//print_r(array_keys($_POST));
//echo "<br />";
//print_r(array_Values($_POST));
//echo "<br />";
//print_r(array_keys($_GET));
//echo "<br />";
//print_r(array_Values($_GET));
//echo "<br />";
//print_r(array_keys($_FILES));
//echo "<br />";
//print_r(array_Values($_FILES));
//*/

include "PDO/connect.php";

error_log("Made it to getThis.php page!", 0);
if(isSet($_POST['iDentified'])){
   error_log("Made it to identified!", 0);
   $getThis = $_POST['iDentified'];
   $st = $db->prepare("SELECT * FROM nbdl_eventCalendar_copy WHERE id='$getThis'");
   $st->execute();
   $row = $st->fetch(PDO::FETCH_OBJ);
   echo json_encode($row);
}

if(isSet($_POST['dAte'])){  
   $getThis = date('Y-m-d', strtotime($_POST['dAte']));
   $st = $db->prepare("SELECT * FROM nbdl_eventCalendar_copy WHERE date='$getThis' and event != '_____________________'");
   $st->execute();
   $rows = $st->fetchAll();
   $i = 0; 
   foreach ($rows as $row => $entry){
       error_log($rows[$i]['event']. $i);
       $i++;
   }
   echo json_encode($rows);
   error_log("Made it to date Again!", 0);
}

if(isSet($_POST['fileToUpload'])){
    $target_dir = "images/";
    $target_file = $target_dir . basename($_POST["fileToUpload"]);
    error_log($target_file);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if (move_uploaded_file($_POST["fileToUpload"], $target_file)) {
          echo json_encode("The file ". basename( $_POST["fileToUpload"]). " has been uploaded.");
    } else {
          echo json_encode("Sorry, there was an error uploading your file.");
    }
}

if (isSet($_POST['additionalAttachments'])){
   $ref = "rF#=".$_POST['additionalAttachments']; 
   $st = $db->prepare("SELECT * FROM nbdl_eventCalendar_copy WHERE event='$ref'");
   $st->execute();
   $rows = $st->fetchAll();
   $i = 0; 
   foreach ($rows as $row => $entry){
       error_log($rows[$i]['type']. $i);
       $i++;
   }
   echo json_encode($rows);
   error_log("Made it to Additional Again!", 0);

}


?>
