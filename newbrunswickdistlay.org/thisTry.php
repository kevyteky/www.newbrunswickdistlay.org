<?php
echo '<!DOCTYPE html>';
print_r(array_keys($_POST));
echo "<br />";
print_r(array_Values($_POST));
echo "<br />";
print_r(array_keys($_GET));
echo "<br />";
print_r(array_Values($_GET));
/*
if (isset($_SERVER['HTTP_USER_AGENT'])) {
  foreach ($_SERVER['HTTP_USER_AGENT'] as $key => $val){
    echo "<br/> This Key= $key  -&-  this Value";
}
}
*/

if(isSet($_GET['fileType'])){
  $fileType = $_GET['fileType'];
  echo "<script> 
         file = '".$_GET['fileType']."';
         var fileType = '$fileType';
         if (fileType == 'pic'){
             fileType = 'Picture';
         }else if (fileType == 'doc'){
             fileType = 'Document';
         }else if (fileType == 'xls'){
             fileType = 'Spreadsheet';
         }else if (fileType == 'ppt'){
             fileType = 'Power Point Presentation';
         }
       </script>";
}


//echo '<!DOCTYPE html>';
echo "<HTML >";
echo "<HEAD >";
echo '<link rel="stylesheet" type="text/css" href="/files/styleX.css" title="wsite-theme-css">';
echo '<link href="jS/dropzone-4.3.0/dist/dropzone.css" type="text/css" rel="stylesheet">';
echo "<script src='jS/dropzone-4.3.0/dist/dropzone.js'></script>";
echo "<title>New Brunswick District Lay ~ Drop Zone</title>";
echo "</HEAD >";

echo "<script>
      //var addIt = window.opener.document.getElementById('addIt');
      var targetAdding = window.opener.document.getElementById('targetAdd');
      var targetAdd = targetAdding.value;
      //var addIt = addIt.value;
      //var targetType = window.opener.document.getElementById('file_Type'+targetAdd - 1);
      var acceptedFormat = '.'+fileType;
      //alert('accepted format is= '+file);
      function feedback(data){
               //alert('Made it to function Feedback this is the TargetAdd= '+ targetItem);
               //targetLabel.show();
               //targetItem.show();
               targetItem.val(data);
               //targetType.val(file);
               //targetPosition.append('<input type=\"hidden\" id=\"file_Type\" name=\"attachmentType_'+targetAdd+'\" value=\"\" ><label class=\"displayAttach\" style=\"background-color:#0905A4;color:#dbe5f1;float:top;display:none;\"><b>Attached File:</b></label><input id=\"uploadFile\" type=\"text\" name=\"fileToUpload_'+targetAdd+'\"  size=\"35px\" style=\"display:none;\"  readonly/><br/>');    
               //targetItem.attr('id',data);
               //targetType.attr('id',data);
               targetAdding.value = +targetAdd + 1;
               top.close();                              
      }
 
      Dropzone.options.dropZone = {
        paramName: 'file',
        maxFiles: 1,
        dictDefaultMessage: 'Drag a '+fileType+' in here to upload, or click to select a '+fileType+' to upload',
        init: function() {
          this.on('success', function( file, resp ){
            feedback(file.name);
          });
        }  
      }
        </script>";

echo "<BODY >";


echo "<div id='container' >";
echo "<div id='left ' style='float:left;width:100px;position:;'>";
echo "&nbsp;";
echo "</div>";
echo "<div id='center' align='center' class='center' style='width:600px;float:left;position:relative;' >";

echo '<form action="'.$_SERVER["PHP_SELF"].'"
      class="dropzone"
      id="dropZone"
      style="height:500px;width:300px;align:center;"></form>';

echo "</div>";
echo "<div id='right ' style='float:left;width:100px;float:left;position:relative;'>";
echo "&nbsp;";
echo "</div>";
echo "</div>";











$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = '/images';   //2

if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
     
    }


echo "</BODY >";
echo "</HTML >";









?>