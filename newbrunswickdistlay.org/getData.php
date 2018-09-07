<?php

include "PDO/managers.php";
/*
print_r(array_keys($_POST));
echo "<br />";
print_r(array_Values($_POST));
echo "<br />";
print_r(array_keys($_GET));
echo "<br />";
print_r(array_Values($_GET));
*/

$check = trim(strtolower($_POST['nameCheck']));
$checking = explode(" ", $check);
if (isSet($checking[1])){
    echo "<red>Username must only be one word<red>";
    exit();
}    
$size = strlen($check);
if(!preg_match("/[a-z]/i", $check)){
    echo "<red>Username must be suppled<red>";
    exit();
}
if (is_numeric($check)) {
    echo "<red>Username must not be all numbers <red>";
    exit();
}
if ($size <= 2){
    echo "<red> Username must be at 3 charachers long <red>";
    exit();
}

///////////////////////////////////////////////////////// Jquery AJAX 

$st = $db->prepare("SELECT user_name from managers"); 
$st->execute();
$res = $st->fetchAll(); 
foreach ($res as $result){
    if ($result['user_name'] == $check){
      echo "<red><strong> Username already exists </strong></red>";
    }else{
      echo "<green><strong> Available</strong> </green>";
    }
}

?>