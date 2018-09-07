<?PHP 
echo '<!DOCTYPE html>';
print_r(array_keys($_POST));
echo "<br />";
print_r(array_Values($_POST));
echo "<br />";
print_r(array_keys($_GET));
echo "<br />";
print_r(array_Values($_GET));
/*
$.ajax({
                            url: '/getThis.php',
                            type: 'post',
                            data: {'fileToUpload':fileToUpload}, 
                            dataType: 'json',                      
                            success: function(response) {


                            }
                     });
*/

$preFix = 1;
//echo '<!DOCTYPE html>';
echo '<HTML>';
include "PDO/connect.php";
require 'Classes.php'; 
require 'myPDF.php';
require 'newsLetter_pdf.php';
echo '<Head>';
echo '<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
//echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
echo '<link rel="stylesheet" type="text/css" href="/files/style.css" title="wsite-theme-css">';
echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">';
$title = $_GET['menuOption'];
echo '<link rel="icon" type="image/png" sizes="16x16" href="/favicon.ico">';
echo '<link rel="stylesheet" href="/resources/demos/style.css">';
//echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
//echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>';
echo '<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>';
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>';
//echo '<script src="https://code.jquery.com/jquery-1.12.4.js"></script>';
echo '<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>';
/// addAgain = addAnother();  dataItem.addAgain = addAgain;  
echo "<input id='targetAdd' type='hidden' value=1 />";
echo "<input id='attachedMents' type='hidden' value=0 />";
$aNum = 0;
 
echo "<input id='addIt' type='hidden' value=0 />";
echo "<script>
     var attachedFiles = $('#attachedMents').val();
     
     //var targetAdd = $('#targetAdd').val();
     //addingAnother = $('#targetAdd').val();
     //addIt = addingAnother - 1;
     addAnother = 0;
     $(document).ready(function(){
       $( '#datepicker' ).datepicker({ dateFormat: 'M-dd-yy' });
       $( '.datepicker' ).datepicker({ dateFormat: 'M-dd-yy' });
     }); 
     var noCopy = [];

     function formatDate(Dated){
     }

  
     function addDateTo(){                    
                    selectedDate = $('#datepicker').val();
                    alert(selectedDate);
                    if (addAnother == 0 ){
                        if (matchIt != selectedDate){                               
                           $('#addDateTo_'+addAnother).show();
                           addAnother = addAnother + 1;
                           noCopy.push(selectedDate);
                           exit();
                        }else{
                           alert('Do Not Repeat Date');
                           exit();
                        }   
                    }
                    noCopy.forEach(function (entry){
                        alert('in noCopy object= '+entry);
                    });
                    alert('Made it '+addAnother);
                    var formatIt = '/^Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec-\d{2}-\d{4}/';
                    alert('Made it here');
                    var matchIt = $('#addDateTo'+ (addAnother - 1)).val();
                    alert('Made it to matchIt= '+matchIt);                   
                    //var chk = noCopy.includes(matchIt);
                    var chk = noCopy.indexOf(matchIt);
                    alert('this is the check= '+chk);
                    if (chk >= 0){
                        if (matchIt == selectedDate){
                            $('#addDateTo'+ (addAnother - 1)).val('');
                            //$('#addDateTo'+ (addAnother - 1)).hide();
                            alert('Do Not Repeat Date');
                            exit();
                        }
                        $('#addDateTo'+ (addAnother - 1)).val('');
                        //$('#addDateTo'+ (addAnother - 1)).hide();
                        alert('Do Not Repeat Date');
                        exit();
                    }
                    if ( matchIt.match(formatIt)){
                        $('#addDateTo_'+ addAnother).show();
                        addAnother = addAnother + 1;
                        noCopy.push(matchIt);
                    }
                    
     }   
     tryMe = 0;
     filePosition = 0;
     function updateUpload(type,num){
                    var selectedVal = type.value;
                    alert(selectedVal +' plus '+num);
                    $('#fileType select').val(type);
                    function getAttach(selectedVal,num){
                                  if (num == 0) {
                                     targetItem = $('#fileToUpload');
                                  }else{
                                      targetItem = $('#fileToUpload_'+num);
                                  } 
                                  //targetPosition = $('#addHere here');
                                  var dataItem = window.open('http://newbrunswickdistlay.org/thisTry.php?fileType='+selectedVal, 'Upload '+selectedVal, 'width=810px,height=600px,');
                                  //dataItem.targetType = targetType;
                                  dataItem.targetItem = targetItem;
                                  //dataItem.targetPosition = targetPosition;
                                  //dataItem.targetLabel = targetLabel;
                                  //dataItem.targetAdd = targetAdd;
                                  }
                    getAttach(selectedVal,num);
}
  



     function activateUpload(type){
                    var selectedVal = type.value;
                    alert(selectedVal);
                    document.getElementById('fileType').selectedIndex = 0;
                    if (tryMe == 0){
                       var selectedEl = $('#fileToUpload');
                       tryMe = tryMe + 1;
                    }else{
                       var selectedEl = $('#fileToUpload_'+filePosition);
                       filePosition = filePosition + 1;
                    }
                    if (selectedVal == 'Select a file type'){
                          exit();
                    }else{
                          function getAttach(selectedVal){
                                  targetType = $('#file_Type');
                                  targetItem = $('#uploadFile');
                                  targetPosition = $('#addHere here');
                                  targetLabel = $('.displayAttach');
                                  var dataItem = window.open('http://newbrunswickdistlay.org/tryThis.php?fileType='+selectedVal, 'Upload '+selectedVal, 'width=810px,height=600px,');
                                  dataItem.targetType = targetType;
                                  dataItem.targetItem = targetItem;
                                  dataItem.targetPosition = targetPosition;
                                  dataItem.targetLabel = targetLabel;
                                  //dataItem.targetAdd = targetAdd;
                                  }
                          getAttach(selectedVal);
                          //if (addAnotherAttachment == 0 ){
                          //   document.getElementById('file_Type').value = selectedVal;
                          //}else{
                          //   document.getElementById('file_Type'+addAnotherAttachment).value = selectedVal;
                          //}
                          //addAnotherAttachment = addAnotherAttachment + 1;
                    }
                    //alert(dataItem.targetAdd);
     }

     function uploadThis(){
                    var fileToUpload = $('#uploadFile').val();
                    $.ajax({
                            url: '/getThis.php',
                            type: 'post',
                            data: {'fileToUpload':fileToUpload}, 
                            dataType: 'json',                      
                            success: function(response) {
                                    alert(response);
                            }
                     });

                    
     } 
     $(function(){
       $( '#datepicker' ).change(function(){
          var Date = this.value;
          $('#addHere').html('');
          $('#allEvents').val('select');
          $.ajax({
                  url: '/getThis.php',
                  type: 'post',
                  data: {'dAte':Date},  
                  dataType: 'json',                                          
                  success: function(response) {                           
                           attachedFiles = 0;
                           $(function(){
                                $( '.datepicker' ).datepicker({ dateFormat: 'M-dd-yy' });
                           });
                           var numberEvents = 0;
                           if (response == ''){
                              $('#addHere').append('<label ><b> This Date  has no events, feel free to add one </b> </label>');
                           }else{
                              var b = response[0]['event'];
                              if (!b.match('rF#=')){
                                 var Id = response[0]['id'];
                              }
                           }
                           var Display = '';
                           var num = 1;
                           if (Id != null){
                               $('#addHere').append('<label ><b> This Date already has <label id=\"numberEvents\">0</label> event(s), feel free to add more </> </label>');
                               $('#addHere').append('<div id=\"currentEvents\" style=\"background-color:#dbe5f1;font-size:13px;\" title=\"'+Date+' Events\"><label ><b>'+ Date +' Events:</b></label>')
                               $('#addHere div').append('<ol  >');
                               response.forEach(function(currentEvent){
                                          Display = currentEvent['event'].replace(/(<([^>]+)>)/ig, '');
                                          if (!Display.match('rF#=')){
                                             $('#addHere ol').append('<li>'+ num +'.) &#10015;'+ Display + '</li>');
                                             num++;
                                             $('#numberEvents').html(num - 1);
                                          }else{
                                             $('#addHere ol').append('<li style=\'font-size:10px;\'> &#128206; Attachment for aboved event </li>');
                                          } 
                               });
                               $('#addHere li').append('</ol></div>');
                           }
                           $('#addHere').append('<div style=\"background-color:#dbe5f1;font-size:13px;\" >');
                           $('#addHere').append('<form enctype=\"multipart/form-data\" action=\"?menuOption=Calendar\"  method=\"POST\" style=\"background-color:#dbe5f1;font-size:13px;\" >');
                           if (Id != null){
                               $('#addHere form').append('<input type=\"hidden\" name=\"eventBorder\" value=\"_____________________\" />'); 
                           }
                           $('#addHere form').append('<label style=\"background-color:#0905A4;color:#dbe5f1;float:top;width:170px;display:inline-block;\"><b> Event: </b></label><br/>')
                           $('#addHere form').append('<textarea name=\"event\" cols=\"21\" rows=\"10\" ></textarea><br/>');
                           $('#addHere form').append('<label style=\"background-color:#0905A4;color:#dbe5f1;float:top;\"><b> Event Style:-</b></label>');
                           $('#addHere form').append('<input type=\"checkbox\" name=\"eventBold\" value=\"bold\" ><b>Bold</b></input>'); 
                           $('#addHere form').append('<input type=\"checkbox\" name=\"eventItalics\" value=\"italics\" ><i>Italics</i></input>'); 
                           $('#addHere form').append('<input type=\"checkbox\" name=\"eventUnderline\" value=\"underline\" ><u>Underline</u></input>');
                           $('#addHere form').append('<input type=\"checkbox\" name=\"eventBlue\" value=\"blue\" ><label style=\"color:Blue;\"> Blue </label></input>');
                           $('#addHere form').append('<input type=\"checkbox\" name=\"eventBlack\" value=\"black\" ><label style=\"color:#000000;\"> Black </label></input><br/>'); 
                           $('#addHere form').append('<here>');
                           $('#addHere here').append('<label for=\"type\"  style=\"background-color:#0905A4;color:#dbe5f1;float:top;\"  > <b> Add Attachment:  </b> </label>'); 
                           $('#addHere here').append('<select id=\"fileType\" onChange=\"activateUpload(this);\">');
                           $('#addHere select').append('<option value=\"none\">Select a file type</option>');
                           $('#addHere select').append('<option value=\"doc\">Document</option>');
                           $('#addHere select').append('<option value=\"pic\">Picture</option>');
                           $('#addHere select').append('<option value=\"pdf\">PDF</option>');
                           $('#addHere select').append('<option value=\"ppt\">Power Point</option>');
                           $('#addHere select').append('<option value=\"xls\">Excel</option>');
                           $('#addHere here').append('</select>');                           
                           $('#addHere here').append('<br/><label class=\"displayAttach\" style=\"background-color:#0905A4;color:#dbe5f1;float:top;display:none;\"><b>Attached File:</b></label><input type=\"hidden\" id=\"file_Type\" name=\"attachmentType_\" value=\"\" > <input id=\"uploadFile\" type=\"text\" name=\"fileToUpload\" size=\"35px\" style=\"display:none;\" readonly/><br/>');
                           $('#addHere form').append('</here>');
                           $('#addHere form').append('<there>');
                           for (i = 0;i < 14;i++){
                               $('#addHere there').append('<div id=\"addDateTo_'+i+'\" style=\display:none;\"> <input type=\"text\" id=\"addDateTo'+i+'\" class=\"datepicker\" name=\"addToDate_'+i+'\" size=\"8\" onChange=\"formatDate(this.value);\"/></div>');
                           }
                           $('#addHere form').append('</there>');
                           $('#addHere form').append('<input type=\"hidden\" name=\"date\" value=\"'+Date+'\" size=\"8\" />');                          
                           $('#addHere form').append('<input type=\"button\"  style=\"background-color:#0905A4;color:#dbe5f1;float:top;\" value=\" Add to Another Date:\" onClick=\" addDateTo() \"/><br/>');
                           $('#addHere form').append('<input type=\"submit\" name=\"submit\" value=\"Submit\" style=\"background-color:#0905A4;color:#dbe5f1;\" />');
                           $('#addHere').append('</form>');                          
                  }
          });         
       });
     });
</script>";


$user = 'KevyTeky';

$uN='';
$uP='';

$lastN = $_GET["lname"];
$firstN = $_GET["fname"];
$from = $_GET["email"];
$mesg = $_GET["comment"];
if(isSet($_GET["message"])){
   $message = $_GET["message"];
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
     $(window).on('load', function() {
           var ht = $('.center').height() - 345;
           $('#container-wrap2').height(ht); 
           $('#'+page).css('background-color', '#fff');           
        });
     </script>";


        
echo '<br/>
</Head>

<body>
<br/>
<div id="header-wrap" >
<br/>
<div class="center" align="center" > <!-- ALL Datat goes here -->
<br/> <div id="image-wrap" >
<img id="banner" src="/files/header_images/Banner_nbdl_3828.jpg" alt="NBDL Banner">                                                    
</div> 
<br style="display:block;margin:4px 0;" />';

echo "<div  >
     <table class='menuNavigation'>
     <tr>
     <script>
     function goto(x){   
        if (x == 'Calendar'){
           window.location = 'http://newbrunswickdistlay.org/managePages.php/?menuOption='+calendarArray;
        }else{
           window.location = 'http://newbrunswickdistlay.org/managePages.php/?menuOption='+x;
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

      function remove_newsLetter(x){
                       var newsLetter = x;
                       if(confirm('Are you sure you want to delete '+  newsLetter.substring(11))){
                          $.ajax({
                               url: '/getRid.php',
                               type: 'post',
                               data: {'newsLetter':newsLetter},                        
                               success: function(response) {
                                        alert('finished running ajax');
                                        if(response == 1){
                                           alert(newsLetter +' Removed!');
                                           location.reload();
                                        }else if (reponse == 0){
                                           alert('Something went wrong!');
                                        }
                               }
                          });
                        } else { alert('Deletion cancelled'); }
      }
      
      
      ( function() {
        $( '#dialog' ).dialog();
      } );

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
  echo "Here you can upload & remove events";    
    echo $Events;
}elseif ($menuOption == 'Newsletter'){ //////////////////////////////////////////////////////////////////////////////////////////////////////////  NEWSLETTER
  echo "Here you will be able to Upload & Delete News Letters from the site<br/>";
  echo "<Div style='background-color:#0071c1;color:#FFFFFF;width:700px;border-style:inset;border-radius:5px'display:inline;'><form enctype='multipart/form-data' action='?menuOption=Newsletter'  method='post' style='display:inline;'> <input type='file' name='fileToUpload' id='fileToUpload'> <input type='submit' name='submit' value='Upload' > </form>  </Div>";
  echo "<Div id='header' style='background-color:#0071c1;color:#000000;width:700px;border-style:inset;border-radius:5px'>";

$PDFarr = [];
$path = 'files/';
$pdfOptions = [];

$objs = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);

foreach($objs as $name => $object){
    $names = explode('\\', $name);
    $num = 1;
    foreach ($names as $val){
        if ($val === '..' && '.'){
	    continue;
        }
	if ($val == 'files'){
	    continue; 
	}
	if ($val == 'header_images'){
	    continue;
	}
        if (preg_match('/.jpg|.JPG|.png|.PNG|.doc|.DOC|.docx|.DOCX|.txt|.TXT|.ppt|.PPT|.html|.HTML|.htm|.HTM|.php|.PHP/', $val)){ 
	    continue;
        }
	if (preg_match('/.pdf|.PDF/', $val)){
	    $PDFarr[] = $val; 
	}
  }
}
 
//echo "<br/> this is the size of Img Array " . sizeof($PDFarr)   ." <br/>"; 

arsort($PDFarr);


$eachOne = array_count_values($PDFarr);  //thisarr);


//foreach ($eachOne as $i => $i_count){
//  echo 'this is the Pic index= '.$i .' & this is the Pic value= '. $i_count .'<br/>';
//}
$n = 0;
echo '<Div style="background-color:#FFFFFD;color:#000000;text-align:left;">';
foreach ($eachOne as $pdfNames => $chuck ){
  if ($pdfNames == '.'){
    continue; 
  }
  $pdfOptions[] = $pdfNames;  
  echo '<script>'; 
  echo "var pdf = [];";
  echo "var pdfName".$n." = '$pdfNames'; ";
  //echo "pdf['$n'] = pdfName;";
  echo '</script>';
  $pdfName = substr($pdfNames, 11);
  $add = 60 - strlen($pdfName);
  echo $pdfName.'<span style="color:#FFFFFD;">'.str_repeat('>', $add) .'</span><img src="/images/delete.png" height="15px" alt="delete Newsletter" onclick="remove_newsLetter(pdfName'.$n.');"><br/>';
  $n++;
  $preFix++; 
}
echo '</Div></Div><br/><br/>';
echo '<div id="dialog" title="Basic dialog below">
  <p><b>Progress Below.</b></p>
</div>';
$target_dir = "/files/";
$target_name = sprintf("%04s",$preFix) . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 2;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
define('SITE_ROOT', realpath(dirname(__FILE__)));
if(isset($_POST["submit"])) {
    sleep(1);
    echo "<script> $('#status').attr('value',15); $('#percentage').html('15%'); </script>";
    sleep(2);
    $check = mime_content_type($_FILES["fileToUpload"]["tmp_name"]);
    if($check == 'application/pdf') {
        echo "File is $check.";
        $uploadOk = 1;
        echo "<script> $('#status').attr('value',30); $('#percentage').html('30%'); </script>";
    } else {
        echo "File is not a PDF.";
        $uploadOk = 0;
    }
}
//echo "<br/>Is upload okay 1 for yes 0 for no= $uploadOk<br/>";
if ($uploadOk == 0) {
    echo "<br/> Sorry, your file must be a PDF.  Please try again.";
// if everything is ok, try to upload file
} elseif ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], SITE_ROOT.$target_dir.$target_name)) {
        echo "<script> var letter = ' ". basename( $_FILES["fileToUpload"]["name"])." File Uploaded Successfully';  </script>";
        echo "<script> window.location = 'newbrunswickdistlay.org/managePages.php/?menuOption=Newsletter&message='+letter; </script>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
if(isSet($message)){
  echo $message;
}
echo "<div class='progress'>
  <progress id='status' value='0' max='100' style='width:500px;' ></progress><label id='percentage'> </label>  
</div>";
/*echo "<div class='progress'>
  <div id='status' class='progress-bar progress-bar-striped active' role='progressbar' aria-valuemin='0' aria-valuemax='100' >
  <label id='percentage'> </label>  
  </div>
</div>";
*/
  //include './newsLetterPDF/pdf.php'; 
}elseif ($menuOption == 'Calendar'){ /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// CALENDAR
    echo "Select a current event: <select id='allEvents'>";
    echo "<option value='select'> Select Events </options>";
    $st = $db->prepare("SELECT * FROM nbdl_eventCalendar_copy WHERE event != '_____________________' && event NOT LIKE '%rF#=%' ORDER BY date");
    $st->execute();
    $allEntries = $st->fetchALL();
    foreach ($allEntries as $entry){
      echo "<option value='".$entry['id']."'>".date('M-d-Y', strtotime($entry['date']))." </option>";
      echo "";
    }
    echo '</select> Or Add a current Event: <input type="text" id="datepicker" class="dateSelector" /> <br/>';
    //echo '</select> Or Add a current Event 2: <input type="text" class="datepicker" /> <br/>';
    echo "<input id='addAnotherAttachment' type='hidden' value='0' />"; 
echo "<script>
      $(function(){
        $('#allEvents').change(function(){
          $('#addHere').html('');
          var iD = this.value;
          $.ajax({
                  url: '/getThis.php',
                  type: 'post',
                  data: {'iDentified':iD}, 
                  dataType: 'json',                     
                  success: function(response) {
                           $('#datepicker').val('');
                           attachedFiles = 0;
                           var Id = response['id']; 
                           var Event = response['event'];
                           var eventString = Event.toString();
                           var Display = eventString.replace(/(<([^>]+)>)/ig, '');
                           var Type = response['type'];  
                           var Attach = response['attachment'];                           
                           var Date = response['date'];
                           $(function(){
                                $('#removeThis').click(function(){ 
                                    var x = $(this).attr('value');
                                    if(confirm('Are you sure you want to remove '+ x )){
                                        $.ajax({
                                           url: '/getRid.php',
                                           type: 'post',
                                           data: {'target':x,'iD':Id,'date':Date,'type':Type,'attachment':Attach,'attached2Event':'set'},                        
                                           success: function(response) {
                                                    alert('finished running ajax');
                                                    if(response == 1){
                                                       alert(x +' Removed! from '+Date+' event');
                                                       $('#removeDiv').hide();
                                                       //location.reload();
                                                    }else if (reponse == 0){
                                                       alert('Something went wrong!');
                                                    }
                                           }
                                        });
                                    } else { alert('Deletion cancelled'); }
                                });
                           });


                           if (response['event'] == '' ){
                               Display = '****THIS IS A PLACE HOLDER FOR ADDITIONAL ATTACHMENTS FOR '+ Date  +' Event****';
                           }

                           $('#addHere').append('<div style=\"background-color:#dbe5f1;font-size:13px;\" >');
                           $('#addHere div').append('<form enctype=\"multipart/form-data\" action=\"?menuOption=Calendar\"  method=\"POST\" >');
                           $('#addHere form').append('<input type=\"hidden\" name=\"iD\" value=\"'+response['id']+'\" />');
                           $('#addHere form').append('<label style=\"background-color:#0905A4;color:#dbe5f1;float:top;width:170px;display:inline-block;\"><b> Event: </b></label><br/>')
                           $('#addHere form').append('<textarea name=\"event\" cols=\"21\" rows=\"10\" >'+ Display.trim() +'</textarea><br/>');
                           $('#addHere form').append('<label style=\"background-color:#0905A4;color:#dbe5f1;float:top;\"><b> Event Style:-</b></label>');
                           var check = Event.includes('<b>');
                           if (check == true){ 
                               $('#addHere form').append('<input type=\"checkbox\" name=\"eventBold\" value=\"bold\" checked><b>Bold</b></input>'); 
                           }else{
                               $('#addHere form').append('<input type=\"checkbox\" name=\"eventBold\" value=\"bold\" ><b>Bold</b></input>'); 
                           }
                           check = Event.includes('<i>');
                           if (check == true){ 
                               $('#addHere form').append('<input type=\"checkbox\" name=\"eventItalics\" value=\"italics\" checked><i>Italics</i></input>');
                           }else{
                               $('#addHere form').append('<input type=\"checkbox\" name=\"eventItalics\" value=\"italics\" ><i>Italics</i></input>'); 
                           }
                           check = Event.includes('<u>');
                           if (check == true){ 
                               $('#addHere form').append('<input type=\"checkbox\" name=\"eventUnderline\" value=\"underline\" checked><u>Underline</u></input>');
                           }else{
                               $('#addHere form').append('<input type=\"checkbox\" name=\"eventUnderline\" value=\"underline\" ><u>Underline</u></input>');
                           }
                           check = Event.includes('<cbl>');
                           if (check == true){ 
                               $('#addHere form').append('<input type=\"checkbox\" name=\"eventBlue\" value=\"blue\" checked><label style=\"color:Blue;\"> Blue </label></input>'); 
                           }else{
                               $('#addHere form').append('<input type=\"checkbox\" name=\"eventBlue\" value=\"blue\" ><label style=\"color:Blue;\"> Blue </label></input>');
                           }
                           check = Event.includes('<cB>');
                           if (check == true){ 
                               $('#addHere form').append('<input type=\"checkbox\" name=\"eventBlack\" value=\"black\" checked><label style=\"color:#000000;\"> Black </label></input><br/>'); 
                           }else{
                               $('#addHere form').append('<input type=\"checkbox\" name=\"eventBlack\" value=\"black\" ><label style=\"color:#000000;\"> Black </label></input><br/>'); 
                           }  
                           if (Type != null){
                               attachedFiles = +attachedFiles + 1; 
                               $('#addHere form').append('<div id=\"removeDiv\" >'); 
                               $('#removeDiv').append('<label for=\"type\"  style=\"background-color:#0905A4;color:#dbe5f1;float:top;\"  > <b> Selected file type: </b> </label>');
                               $('#removeDiv').append('<select name=\"attachmentType_\" id=\"fileType\" onchange=\"updateUpload(this,0);\">');
                               check = Type.includes('.doc');
                               if (check == true){ 
                                   $('#removeDiv select').append('<option value=\"doc\" SELECTED>Document</option>');
                               }else{ 
                                   $('#removeDiv select').append('<option value=\"doc\">Document</option>');
                               }
                               check = Type.includes('<a download=');
                               if (check == true){ 
                                   $('#removeDiv select').append('<option value=\"pic\" SELECTED> Picture </option>');
                                   //$('#removeDiv').append('<input id=\"updateAttachment\"type=\"button\" value=\"pic\" > Picture </option>');
                                   var isActivated = 'Set';
                                   var regEx = /download='\s*(.*?)\s*'/g;
                                   var a = String(Type.match(regEx));
                                   a = a.replace('download=', '');
                                   a = a.replace(\"'\", \"\");
                                   a = a.replace(\"'\", \"\");       
                               }else {
                                   $('#removeDiv select').append('<option value=\"pic\">Picture  </option>');
                                   var isActivated = 'No';
                               }
                               check = Type.includes('.pdf');
                               if (check == true){ 
                                   $('#removeDiv select').append('<option value=\"pdf\" SELECTED>PDF</option>');
                               }else {
                                   $('#removeDiv select').append('<option value=\"pdf\">PDF</option>');
                               }
                               check = Type.includes('.ppt');
                               if (check == true){ 
                                   $('#removeDiv select').append('<option value=\"ppt\" SELECTED>Power Point</option>');
                               }else {
                                   $('#removeDiv select').append('<option value=\"ppt\">Power Point</option>');
                               }
                               check = Type.includes('.xls');
                               if (check == true){ 
                                   $('#removeDiv select').append('<option value=\"xls\" SELECTED>Excel</option>');
                               }else {
                                   $('#removeDiv select').append('<option value=\"xls\">Excel</option>');
                               }
                               $('#removeDiv').append('</select>');
                               if (isActivated == 'Set'){
                                   $('#removeDiv').append('<label style=\"background-color:#0905A4;color:#dbe5f1;float:top;\"><b>Attached File:</b></label> <input type=\"text\" id=\"fileToUpload\" name=\"fileToUpload\" value=\"'+ a +'\"  size=\"50px\" readonly /><img id=\"removeThis\" src=\"/images/delete.png\" height=\"15px\" alt=\"delete Attachment\" value=\"'+a+'\"><br/>'); 
                               }else{
                                   $('#removeDiv').append('<label style=\"background-color:#0905A4;color:#dbe5f1;float:top;\"><b>Attached File:</b></label> <input type=\"text\" id=\"fileToUpload\" name=\"fileToUpload\" value=\"'+ Attach +'\" size=\"50px\"  readonly /><img id=\"removeThis\" src=\"/images/delete.png\" height=\"15px\" alt=\"delete Attachment\" value=\"'+Attach+'\"><br/>');  
                               }
                               $('#addHere form').append('</div>');
                           }
                           $.ajax({
                                   url: '/getThis.php',
                                   type: 'post',
                                   data: {'additionalAttachments':iD}, 
                                   dataType: 'json',                     
                                   success: function(responses) {
                                      var Zero = 0;
                                      var One = 1
                                         $(function(){
                                              $( '.datepicker' ).datepicker({ dateFormat: 'M-dd-yy' });
                                         });
                                         $(function(){
                                              $('#removeThis1').click(function(){
                                                   var x = $(this).attr('value');
                                                   if(confirm('Are you sure you want to remove '+ x )){
                                                      $.ajax({
                                                         url: '/getRid.php',
                                                         type: 'post',
                                                         data: {'target':x,'iD':Id,'date':Date,'type':responses[0]['type']},                        
                                                         success: function(response) {
                                                            alert('finished running ajax');
                                                               if(response == 1){
                                                                  alert(x +' Removed! from '+Date+' event');
                                                                  $('#removeDiv').hide();
                                                                  //location.reload();
                                                               }else if (reponse == 0){
                                                                  alert('Something went wrong!');
                                                               }
                                                         }
                                                      });
                                                   } else { alert('Deletion cancelled'); }
                                              });
                                         });
                                         $(function(){
                                              $('#removeThis2').click(function(){
                                                   var x = $(this).attr('value');
                                                   if(confirm('Are you sure you want to remove '+ x )){
                                                      $.ajax({
                                                         url: '/getRid.php',
                                                         type: 'post',
                                                         data: {'target':x,'iD':Id,'date':Date,'type':responses[1]['type']},                        
                                                         success: function(response) {
                                                            alert('finished running ajax');
                                                               if(response == 1){
                                                                  alert(x +' Removed! from '+Date+' event');
                                                                  $('#removeDiv').hide();
                                                                  //location.reload();
                                                               }else if (reponse == 0){
                                                                  alert('Something went wrong!');
                                                               }
                                                         }
                                                      });
                                                   } else { alert('Deletion cancelled'); }
                                              });
                                         });
                                         $(function(){
                                              $('#removeThis3').click(function(){
                                                   var x = $(this).attr('value');
                                                   if(confirm('Are you sure you want to remove '+ x )){
                                                      $.ajax({
                                                         url: '/getRid.php',
                                                         type: 'post',
                                                         data: {'target':x,'iD':Id,'date':Date,'type':responses[2]['type']},                        
                                                         success: function(response) {
                                                            alert('finished running ajax');
                                                               if(response == 1){
                                                                  alert(x +' Removed! from '+Date+' event');
                                                                  $('#removeDiv').hide();
                                                                  //location.reload();
                                                               }else if (reponse == 0){
                                                                  alert('Something went wrong!');
                                                               }
                                                         }
                                                      });
                                                   } else { alert('Deletion cancelled'); }
                                              });
                                         });
                                         $(function(){
                                              $('#removeThis4').click(function(){
                                                   var x = $(this).attr('value');
                                                   if(confirm('Are you sure you want to remove '+ x )){
                                                      $.ajax({
                                                         url: '/getRid.php',
                                                         type: 'post',
                                                         data: {'target':x,'iD':Id,'date':Date,'type':responses[3]['type']},                        
                                                         success: function(response) {
                                                            alert('finished running ajax');
                                                               if(response == 1){
                                                                  alert(x +' Removed! from '+Date+' event');
                                                                  $('#removeDiv').hide();
                                                                  //location.reload();
                                                               }else if (reponse == 0){
                                                                  alert('Something went wrong!');
                                                               }
                                                         }
                                                      });
                                                   } else { alert('Deletion cancelled'); }
                                              });
                                         });
                                         $(function(){
                                              $('#removeThis5').click(function(){
                                                   var x = $(this).attr('value');
                                                   if(confirm('Are you sure you want to remove '+ x )){
                                                      $.ajax({
                                                         url: '/getRid.php',
                                                         type: 'post',
                                                         data: {'target':x,'iD':Id,'date':Date,'type':responses[4]['type']},                        
                                                         success: function(response) {
                                                            alert('finished running ajax');
                                                               if(response == 1){
                                                                  alert(x +' Removed! from '+Date+' event');
                                                                  $('#removeDiv').hide();
                                                                  //location.reload();
                                                               }else if (reponse == 0){
                                                                  alert('Something went wrong!');
                                                               }
                                                         }
                                                      });
                                                   } else { alert('Deletion cancelled'); }
                                              });
                                         });
                                         $(function(){
                                              $('#removeThis6').click(function(){
                                                   var x = $(this).attr('value');
                                                   if(confirm('Are you sure you want to remove '+ x )){
                                                      $.ajax({
                                                         url: '/getRid.php',
                                                         type: 'post',
                                                         data: {'target':x,'iD':Id,'date':Date,'type':responses[5]['type']},                        
                                                         success: function(response) {
                                                            alert('finished running ajax');
                                                               if(response == 1){
                                                                  alert(x +' Removed! from '+Date+' event');
                                                                  $('#removeDiv').hide();
                                                                  //location.reload();
                                                               }else if (reponse == 0){
                                                                  alert('Something went wrong!');
                                                               }
                                                         }
                                                      });
                                                   } else { alert('Deletion cancelled'); }
                                              });
                                         });
                                      responses.forEach(function(entry){
                                         attachedFiles = +attachedFiles + 1; 
                                         $('#addHere form').append('<div id=\"removeDiv'+One+'\" >'); 
                                         var Type = responses[Zero]['type'];  
                                         var Attach = responses[Zero]['attachment'];
         
                                         if (responses[Zero]['type'] != null){
                                            $('#removeDiv'+One ).append('<label for=\"type\"  style=\"background-color:#0905A4;color:#dbe5f1;float:top;\"  > <b> Selected file type: </b> </label>');
                                            $('#removeDiv'+One ).append('<select id=\"fileType_'+One+'\" name=\"attachmentType_'+One+'\"  onchange=\"updateUpload(this,'+One+');\" >');
                                            //alert('number '+One+'= '+Type);
                                            check = Type.includes('<a download=');
                                            if (check == true){ 
                                               //alert('picture number '+One);
                                               $('#removeDiv'+One+' select').append('<option value=\"pic\" SELECTED>Picture</option>');
                                               var isActivated = 'Set';
                                               var regEx = /download='\s*(.*?)\s*'/g;
                                               var a = String(Type.match(regEx));
                                               a = a.replace('download=', '');
                                               a = a.replace(\"'\", \"\");
                                               a = a.replace(\"'\", \"\");
                                            }else {
                                               $('#removeDiv'+One+' select').append('<option value=\"pic\">Picture</option>');
                                               var isActivated = 'False';
                                               var a = isActivated;
                                            }                                            
                                            check = Type.match(/ppt.|ppt/gi);
                                            if (Type == 'ppt'){ 
                                               //alert('power point number '+One);
                                               $('#removeDiv'+One+' select').append('<option value=\"ppt\" SELECTED>Power Point</option>');
                                            }else {
                                               $('#removeDiv'+One+' select').append('<option value=\"ppt\">Power Point</option>');
                                            }
                                            check = Type.match(/xls.|xls/gi);
                                            if (Type == 'xls'){ 
                                               //alert('excel  number '+One);
                                               $('#removeDiv'+One+' select').append('<option value=\"xls\" SELECTED>Excel</option>');
                                            }else {
                                               $('#removeDiv'+One+' select').append('<option value=\"xls\">Excel</option>');
                                            }
                                            check = Type.match(/doc.|doc/gi);
                                            if (check == true){ 
                                               $('#removeDiv'+One+' select').append('<option value=\"doc\" SELECTED>Document</option>');
                                            }else{ 
                                               $('#removeDiv'+One+' select').append('<option value=\"doc\">Document</option>');
                                            }
                                            if (Type == 'pdf'){ 
                                               $('#removeDiv'+One+' select').append('<option value=\"pdf\" SELECTED>PDF</option>');
     
                                            }else {
                                               $('#removeDiv'+One+' select').append('<option value=\"pdf\">PDF</option>');
                                            }
                                            $('#removeDiv'+One ).append('</select>');
                                            if (isActivated == 'Set'){
                                               $('#removeDiv'+One ).append('<label style=\"background-color:#0905A4;color:#dbe5f1;float:top;\"><b>Attached File:</b></label> <input type=\"text\" id=\"fileToUpload_'+One+'\" name=\"fileToUpload_'+One+'\" value=\"'+ a +'\"  size=\"50px\" readonly ><img id=\"removeThis'+One+'\" src=\"/images/delete.png\" height=\"15px\" alt=\"delete File\" value=\"'+a+'\" ><br/>'); 
                                            }else{
                                               $('#removeDiv'+One ).append('<label style=\"background-color:#0905A4;color:#dbe5f1;float:top;\"><b>Attached File:</b></label> <input type=\"text\" id=\"fileToUpload_'+One+'\" name=\"fileToUpload_'+One+'\" value=\"'+ Attach +'\" size=\"50px\" readonly ><img id=\"removeThis'+One+'\" src=\"/images/delete.png\" height=\"15px\" alt=\"delete File\" value=\"'+Attach+'\" ><br/>'); 
                                            }
                                            $('#addHere form').append('</div>');   
                                         }
                                         Zero++;
                                         One++;
                                      });
                                      alert(attachedFiles);
                                   },
                                   async: false
                           });
                           $('#addHere form').append('<label style=\"background-color:#0905A4;color:#dbe5f1;float:top;\"><b>Date:</b></label><input type=\"hidden\" name=\"origDate\" value=\"'+Date+'\"/> <input class=\"datepicker\" type=\"text\" name=\"date\" value=\"'+Date+'\" size=\"8\" /><br/>');
                           $('#addHere form').append('<input type=\"submit\" name=\"submit\" value=\"Update\" style=\"background-color:#0905A4;color:#dbe5f1;\" /><br/>');
                           $('#addHere form').append('<input type=\"submit\" name=\"submit\" value=\"Delete\" style=\"background-color:#0905A4;color:#dbe5f1;\" />');
                           $('#addHere form').append('</form>');  
                           
                           }
                  });
          });


     });
     </script>";    
if (isSet($_POST['submitted'])){
  $Sbmtd = $_POST['submitted'];
}if (isSet($_POST['submit'])){
  $Sbmt = $_POST['submit'];
}if (isSet($_POST['iD'])){
  $iD = $_POST['iD'];
}if (isSet($_POST['eventBorder'])){
  $Border = $_POST['eventBorder'];
}if (isSet($_POST['event'])){
  $Ev = $_POST['event'];
  $Ev = str_replace("'", "\'", $Ev);
}if (isSet($_POST['eventBold'])){
  $Bld = $_POST['eventBold'];
}if (isSet($_POST['eventItalics'])){     
  $Itlcs = $_POST['eventItalics'];
}if (isSet($_POST['eventUnderline'])){
  $Undln = $_POST['eventUnderline'];
}if (isSet($_POST['eventBlue'])){
  $Blu = $_POST['eventBlue'];
}if (isSet($_POST['eventBlack'])){
  $Blk = $_POST['eventBlack'];
}if (!empty($_POST['attachmentType_'])){
  $AT1 = $_POST['attachmentType_'];
  if ($AT1 == 'none'){
    $AT1 = NULL;
  } 
}if (!empty($_POST['attachmentType_1'])){
  $AT2 = $_POST['attachmentType_1'];
  if ($AT2 == 'none'){
    $AT2 = NULL;
  } 
}if (!empty($_POST['attachmentType_2'])){
  $AT3 = $_POST['attachmentType_2'];
  if ($AT3 == 'none'){
    $AT3 = NULL;
  } 
}if (!empty($_POST['attachmentType_3'])){
  $AT4 = $_POST['attachmentType_3'];
  if ($AT4 == 'none'){
    $AT4 = NULL;
  } 
}if (!empty($_POST['attachmentType_4'])){
  $AT5 = $_POST['attachmentType_4'];
  if ($AT5 == 'none'){
    $AT5 = NULL;
  } 
}if (!empty($_POST['attachmentType_5'])){
  $AT6 = $_POST['attachmentType_5'];
  if ($AT6 == 'none'){
    $AT6 = NULL;
  } 
}if (!empty($_POST['fileToUpload'])){
  $Fup1 = $_POST['fileToUpload'];
}if (!empty($_POST['fileToUpload_1'])){
  $Fup2 = $_POST['fileToUpload_1'];
}if (!empty($_POST['fileToUpload_2'])){
  $Fup3 = $_POST['fileToUpload_2'];
}if (!empty($_POST['fileToUpload_3'])){
  $Fup4 = $_POST['fileToUpload_3'];
}if (!empty($_POST['fileToUpload_4'])){
  $Fup5 = $_POST['fileToUpload_4'];
}if (!empty($_POST['fileToUpload_5'])){
  $Fup6 = $_POST['fileToUpload_5'];
}if (!empty($_POST['addToDate_0'])){
  $addDate = [];
  array_push($addDate, date('Y-m-d', strtotime($_POST['addToDate_0'])));
}if (!empty($_POST['addToDate_1'])){
  array_push($addDate, date('Y-m-d', strtotime($_POST['addToDate_1'])));
}if (!empty($_POST['addToDate_2'])){
  array_push($addDate, date('Y-m-d', strtotime($_POST['addToDate_2'])));
}if (!empty($_POST['addToDate_3'])){
  array_push($addDate, date('Y-m-d', strtotime($_POST['addToDate_3'])));
}if (!empty($_POST['addToDate_4'])){
  array_push($addDate, date('Y-m-d', strtotime($_POST['addToDate_4'])));
}if (!empty($_POST['addToDate_5'])){
  array_push($addDate, date('Y-m-d', strtotime($_POST['addToDate_5'])));
}if (!empty($_POST['addToDate_6'])){
  array_push($addDate, date('Y-m-d', strtotime($_POST['addToDate_6'])));
}if (!empty($_POST['addToDate_7'])){
  array_push($addDate, date('Y-m-d', strtotime($_POST['addToDate_7'])));
}if (!empty($_POST['addToDate_8'])){
  array_push($addDate, date('Y-m-d', strtotime($_POST['addToDate_8'])));
}if (!empty($_POST['addToDate_9'])){
  array_push($addDate, date('Y-m-d', strtotime($_POST['addToDate_9'])));
}if (!empty($_POST['addToDate_10'])){
  array_push($addDate, date('Y-m-d', strtotime($_POST['addToDate_10'])));
}if (!empty($_POST['addToDate_11'])){
  array_push($addDate, date('Y-m-d', strtotime($_POST['addToDate_11'])));
}if (!empty($_POST['addToDate_12'])){
  array_push($addDate, date('Y-m-d', strtotime($_POST['addToDate_12'])));
}if (!empty($_POST['addToDate_13'])){
  array_push($addDate, date('Y-m-d', strtotime($_POST['addToDate_13'])));
}if (isSet($_POST['date'])){
  $Date = $_POST['date'];
}if (isSet($_POST['origDate'])){
  $origDate = $_POST['origDate'];
}  

echo "<div id='addHere'>";
if ($Sbmtd == 'Deleted'){
  echo "<div style='background-color:#dbe5f1;font-size:13px;'><span style='margin-left:15px;color:white;font-weight:bold;float:right;font-size:22px;line-height:20px;cursor:pointer;transition:0.3s;><u>$Date:</u><br/> <strong>Event! </strong> $Ev <strong><br/> *Has been deleted from the New Brunswick District Lay Calendar </strong> ".$tryign = (isSet($_POST['attached'])? $_POST['attached']:'')." </span> </div>";  
}
echo "</div>";

    echo $calHeader;
    require 'calendar_copy.php';
}elseif ($menuOption == 'Resources'){
    echo $Resources;
}elseif ($menuOption == 'Contact Us'){
    echo $Contact_Us;
}else {;
    echo "<h1 style='color:#0071c1;'>Select a menu tab to change its contents</h1>";
    echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post" accept-charset="UTF-8">';
}

echo '</div></div></div>';


echo '<div id="container-wrap1">
<br/> 
</div>
   <!--<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>-->

<div id="container-wrap2" style="height:<script> document.write(ht); <script>px;"></div>

<div id="footer"><br/><br/>
<font size="2" > Hosted by KevyTeky &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font>
</div>';


echo '</body>';
echo '</HTML>';

        

if (isSet($Sbmt)){
  $Month = date('M', strtotime($Date));
  $month = date('m', strtotime($Date)); 
  $month1 = date('m', strtotime($origDate));
  $Day = date('d', strtotime($Date));
  $Day1 = date('d', strtotime($origDate));
  $Year = date('Y', strtotime($Date)); 
  $Year1 = date('Y', strtotime($origDate));
  $eDate = date('Y-m-d', strtotime($Date)); 
  $oDate = date('Y-m-d', strtotime($origDate));
  echo $eDate;
  if (isSet($Bld)){
    $Ev = '<b>'.$Ev.'</b>';
  }if(isSet($Itlcs)){
    $Ev = '<i>'.$Ev.'</i>';
  }if(isSet($Undln)){
    $Ev = '<u>'.$Ev.'</u>';
  }if(isSet($Blu)){
    $Ev = '<cbl>'.$Ev.'</cbl>';
  }if(isSet($Blk)){
    $Ev = '<cBl>'.$Ev.'</cBl>';
  }
  $Ev = trim(preg_replace('/\s+/', ' ', $Ev));
  ///////////////////////////////////////////////////////////////////////// Are Borders in place 
  $ts  = $db->prepare("SELECT * FROM nbdl_eventCalendar_copy WHERE event = 'rF#$iD' AND date = '$eDate' "); //////////////////// Number of attachements.
  $ts->execute();
  $attachmentCount = $ts->rowCount();
  
  $ts  = $db->prepare("SELECT type FROM nbdl_eventCalendar_copy WHERE event = '$Ev' AND date = '$eDate' "); ////////////////////  Plus one if above is set or just one or none.
  $ts->execute();
  $eventCount = $ts->rowCount();
  $count = $attachmentCount + $eventCount + 0; /////////////////////// if none is set = 0.  
}

if ($Sbmt == 'Update'){
echo "<script> alert('update is set'); </script>";
  $iDNext = $iD + $count;
  $iDPrev = $iD - 1;
  if ($eDate != $oDate){
    $ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE date = '$eDate' ");
    $ts->execute();
    $res = $ts->fetch(PDO::FETCH_OBJ);
    if (isSet($res->id)){
      $addBorder = $db->prepare("INSERT INTO nbdl_eventCalendar_copy (event, date) VALUES ('_____________________', '$eDate') ");
      $addBorder->execute();
    }
    $ss = $db->prepare("SELECT 'event' FROM nbdl_eventCalendar_copy WHERE date = '$oDate' AND id = '$iDPrev' ");
    $ss->execute();
    $rss = $ss->fetch(PDO::FETCH_OBJ);
    if ($rss->event == '_____________________' ){
      $delBorder = $db->prepare("DELETE FROM nbdl_eventCalendar_copy WHERE id = 'iDPrev' ");
      $delBorder->execute();
    }
    $ss = $db->prepare("SELECT 'event' FROM nbdl_eventCalendar_copy WHERE date = '$oDate' AND id = '$iDNext' ");
    $ss->execute();
    $rss = $ss->fetch(PDO::FETCH_OBJ);
    if ($rss->event == '_____________________' ){
      $delBorder = $db->prepare("DELETE FROM nbdl_eventCalendar_copy WHERE id = 'iDNext' ");
      $delBorder->execute();
    }
  }
  //echo "this is your ID= $res->id";
  //exit();
  $st = $db->prepare("UPDATE nbdl_eventCalendar_copy SET event = '$Ev', date = '$eDate' WHERE id = '$iD' ");
  $st->execute();
  if (isSet($AT1)){
    if ($AT1 == 'pic'){
      echo "<script> alert('update has a picture'); </script>";
      $AT1 = "<a download=\'$Fup1\' href=\'/images/$Fup1\' > <img src=\'/images/$Fup1\' style=\'width:500%\' /><br/> $Fup1 </a>";
      $st = $db->prepare("UPDATE nbdl_eventCalendar_copy SET event = '$Ev', date = '$eDate', type = '$AT1', attachment = NULL WHERE id = '$iD' ");
      $st->execute();
      echo "UPDATE nbdl_eventCalendar_copy SET event = '$Ev', date = '$eDate', type = '$AT1', attachment = NULL WHERE id = '$iD'";
    }else{
      echo "<script> alert('is attachment'); </script>";
      $st = $db->prepare("UPDATE nbdl_eventCalendar_copy SET event = '$Ev', date = '$eDate', type = '$AT1', attachment = '$Fup1' WHERE id = '$iD' ");
      $st->execute();
    }
  }else{
      echo "<script> alert('update is not picture'); </script>";
      $st = $db->prepare("UPDATE nbdl_eventCalendar_copy SET event = '$Ev', type = NULL, attachment = NULL, date = '$eDate' WHERE id = '$iD' ");
      $st->execute();
  }
  if(isSet($AT2)){
    goto startAt;
  }
  echo "<script> window.location.href = 'http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year'; </script>";
  exit();
}


if ($Sbmt == 'Delete'){//////////////////////////////////////////// Complete 
  $iDNext = $iD + $count;
  $iDPrev = $iD - 1;
  $ts  = $db->prepare("SELECT event FROM nbdl_eventCalendar_copy WHERE id = '$iDPrev' AND date = '$eDate' ");
  $ts->execute();
  $chk = $ts->fetch(PDO::FETCH_OBJ);
  if($chk->event == '_____________________' ){
    $ts  = $db->prepare("DELETE FROM nbdl_eventCalendar_copy WHERE id = '$iDPrev' AND date = '$eDate' ");
    $ts->execute();
  }
  $ts  = $db->prepare("SELECT event FROM nbdl_eventCalendar_copy WHERE id = '$iDNext' AND date = '$eDate' ");
  $ts->execute();
  $chk = $ts->fetch(PDO::FETCH_OBJ);
  if($chk->event == '_____________________' ){
    $ts  = $db->prepare("DELETE FROM nbdl_eventCalendar_copy WHERE id = '$iDNext' AND date = '$eDate' ");
    $ts->execute();
  }
  $st = $db->prepare("DELETE FROM nbdl_eventCalendar_copy WHERE ID = '$iD' ");
  $st->execute();
  $su = $db->prepare("DELETE FROM nbdl_eventCalendar_copy WHERE event = 'rF#=$iD' AND date = '$eDate' ");
  $su->execute();
  echo "<script> window.location.href = 'http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year'; </script>";
  exit();
}

if ($Sbmt == 'Submit'){ ////////////////////////////////////////////////////////////////  Complete all the way down... just clean.
  echo "<script> alert('submit is set and this is the eDate= $eDate '); </script>";
  if (isSet($AT1)){    ///////////////////////////////////////////////////////////////////////////////////////////////////////  If Attachment is Set 
    if ($AT1 == 'pic'){  ////////////////////////////////////////////////////////////////////////////////////////////////////   If Attachment = picture 
      $AT1 = "<a download=\'$Fup1\' href=\'/images/$Fup1\' > <img src=\'/images/$Fup1\' style=\'width:500%\' /><br/> $Fup1 </a>";
      if(!empty($addDate)){  //////////////////////////////////////////////////////////////////////////////////////////////// If more than one date added
	array_push($addDate, $eDate);
	foreach ($addDate as $val){
          echo "<script> alert('these are the dates= $val '); </script>";
	  $ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE date = '$val' ");
	  $ts->execute();
	  $res = $ts->fetch(PDO::FETCH_OBJ);
	  if (isSet($res->id)){
	    $addBorder = $db->prepare("INSERT INTO nbdl_eventCalendar_copy (event, date) VALUES ('_____________________', '$val') ");
	    $addBorder->execute();
	  }
	  $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, date) VALUES ('$Ev', '$AT1', '$val')");
	  $st->execute();
	}
      }else{ /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  If only one Date and Attachment = Picture 
	if (isSet($Border)){   //////////////////////////////////////////////////////////////////////////////////////////////   If Border is needed (break-events) 
	  $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, date) VALUES ('$Border', '$eDate')");
	  $st->execute();
	}
	$st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, date) VALUES ('$Ev', '$AT1', '$eDate')");
	$st->execute();
      }
      //  header( "Location: http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
    }else{ /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  If Attachment != Picture
      if(!empty($addDate)){
	array_push($addDate, $eDate);
	foreach ($addDate as $val){ ////////////////////////////////////////////////////////////////////////////////////////// If more than one date added
	  $ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE date = '$val' ");
	  $ts->execute();
	  $res = $ts->fetch(PDO::FETCH_OBJ);
	  if (isSet($res->id)){
	    $addBorder = $db->prepare("INSERT INTO nbdl_eventCalendar_copy (event, date) VALUES ('_____________________', '$val') ");
	    $addBorder->execute();
	  }
	  $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, attachment, date) VALUES ('$Ev', '$AT1', '$Fup1', '$val')");
	  $st->execute();
	}
      }else{ /////////////////////////////////////////////////////////////////////////////////////////////////////////////////  If only one Date and Attachment != Picture 
	if (isSet($Border)){
	  $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, date) VALUES ('$Border', '$eDate')");
	  $st->execute();
	}
	$st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, attachment, date) VALUES ('$Ev', '$AT1', '$Fup1', '$eDate')");
	$st->execute();
      }
      //header( "Location: http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");  
    }    
  }else{  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   If no Attachments only Event && Dates
    if(!empty($addDate)){
      array_push($addDate, $eDate);
      foreach ($addDate as $val){ ////////////////////////////////////////////////////////////////////////////////////////// If more than one date added
	$ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE date = '$val' ");
	$ts->execute();
	$res = $ts->fetch(PDO::FETCH_OBJ);
	if (isSet($res->id)){
	  $addBorder = $db->prepare("INSERT INTO nbdl_eventCalendar_copy (event, date) VALUES ('_____________________', '$val') ");
	  $addBorder->execute();
	}
	$st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, date) VALUES ('$Ev', '$val')");
	$st->execute();
      }
    }else{ 
      if (isSet($Border)){
	$st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, date) VALUES ('$Border', '$eDate')");
	$st->execute();
      }
      $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, date) VALUES ('$Ev', '$eDate')");
      $st->execute();
    }  
    // header( "Location: http://http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
  }
}

startAt:
if ($Sbmt == 'Submit' or $Sbmt == 'Update'){
  if (isSet($AT2)){
    echo "<script> alert('attachment type 2 is set'); </script>";
    if ($AT2 == 'pic'){
      $AT2 = "<a download=\'$Fup2\' href=\'/images/$Fup2\' > <img src=\'/images/$Fup2\' style=\'width:500%\' /><br/> $Fup2 </a>";
      if(!empty($addDate)){  //////////////////////////////////////////////////////////////////////////////////////////////// If more than one date added
	//array_push($addDate, $eDate);
	foreach ($addDate as $val){
	  $ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE event = '$Ev' AND date = '$val' ");
	  $ts->execute();
	  $res = $ts->fetch(PDO::FETCH_OBJ);
	  if (isSet($res->id)){
	    $ref = 'rF#='.$res->id;
	  }
	  $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, date) VALUES ('$ref', '$AT2', '$val')");
	  $st->execute();
	  //header( "Location: http://http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
	}
      }else{
	$ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE event = '$Ev' AND date = '$eDate' ");
	$ts->execute();
	$res = $ts->fetch(PDO::FETCH_OBJ);
	if (isSet($res->id)){
	  $ref = 'rF#='.$res->id;
	}
	$st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, date) VALUES ('$ref', '$AT2', '$eDate')");
	$st->execute();
	//header( "Location: http://http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
      }
    }else{
      if(!empty($addDate)){  //////////////////////////////////////////////////////////////////////////////////////////////// If more than one date added
	//array_push($addDate, $eDate);
	foreach ($addDate as $val){
	  $ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE event = '$Ev' AND date = '$val' ");
	  $ts->execute();
	  $res = $ts->fetch(PDO::FETCH_OBJ);
	  if (isSet($res->id)){
	    $ref = 'rF#='.$res->id;
	  }
	  $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, attachment, date) VALUES ('$ref', '$AT2', '$Fup2', '$val')");
	  $st->execute();
	  //header( "Location: http://http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
	}
      }else{
	$st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, attachment, date) VALUES ('$ref', '$AT2', '$Fup2', '$eDate')");
	$st->execute();
	//header( "Location: http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
      }
    }
  }else{
    echo "<script> window.location.href = 'http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year'; </script>";
    exit();
  }
  /*
    if (isSet($AT3)){
    echo "<script> alert('attachment type 3 is set'); </script>";
    if ($AT3 == 'pic'){
    $AT3 = "<a download=\'$Fup3\' href=\'/images/$Fup3\' > <img src=\'/images/$Fup3\' style=\'width:500%\' /><br/> $Fup3 </a>";
    $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (type, date) VALUES ('$AT3', '$eDate')");
    $st->execute();
    //header( "Location: http://http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
    }else{
    $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (type, attachment, date) VALUES ('$AT3', '$Fup3', '$eDate')");
    $st->execute();
    //header( "Location: http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
    }
    }
  */
  if (isSet($AT3)){
    echo "<script> alert('attachment type 3 is set'); </script>";
    if ($AT3 == 'pic'){
      $AT3 = "<a download=\'$Fup3\' href=\'/images/$Fup3\' > <img src=\'/images/$Fup3\' style=\'width:500%\' /><br/> $Fup3 </a>";
      if(!empty($addDate)){  //////////////////////////////////////////////////////////////////////////////////////////////// If more than one date added
	//array_push($addDate, $eDate);
	foreach ($addDate as $val){
	  $ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE event = '$Ev' AND date = '$val' ");
	  $ts->execute();
	  $res = $ts->fetch(PDO::FETCH_OBJ);
	  if (isSet($res->id)){
	    $ref = 'rF#='.$res->id;
	  }
	  $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, date) VALUES ('$ref', '$AT3', '$val')");
	  $st->execute();
	  //header( "Location: http://http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
	}
      }else{
	$ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE event = '$Ev' AND date = '$eDate' ");
	$ts->execute();
	$res = $ts->fetch(PDO::FETCH_OBJ);
	if (isSet($res->id)){
	  $ref = 'rF#='.$res->id;
	}
	$st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, date) VALUES ('$ref', '$AT3', '$eDate')");
	$st->execute();
	//header( "Location: http://http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
      }
    }else{
      if(!empty($addDate)){  //////////////////////////////////////////////////////////////////////////////////////////////// If more than one date added
	//array_push($addDate, $eDate);
	foreach ($addDate as $val){
	  $ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE event = '$Ev' AND date = '$val' ");
	  $ts->execute();
	  $res = $ts->fetch(PDO::FETCH_OBJ);
	  if (isSet($res->id)){
	    $ref = 'rF#='.$res->id;
	  }
	  $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, attachment, date) VALUES ('$ref', '$AT3', '$Fup3', '$val')");
	  $st->execute();
	  //header( "Location: http://http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
	}
      }else{
	$st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, attachment, date) VALUES ('$ref', '$AT3', '$Fup3', '$eDate')");
	$st->execute();
	//header( "Location: http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
      }
    }
    /// header ref goes here;
  }else{
    echo "<script> window.location.href = 'http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year'; </script>";
    exit();
  }
  
  /*
    if (isSet($AT4)){
    echo "<script> alert('attachment type 4 is set'); </script>";
    if ($AT4 == 'pic'){
    $AT4 = "<a download=\'$Fup4\' href=\'/images/$Fup4\' > <img src=\'/images/$Fup4\' style=\'width:500%\' /><br/> $Fup4 </a>";
    $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (type, date) VALUES ('$AT4', '$eDate')");
    $st->execute();
    //header( "Location: http://http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
    }else{
    $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (type, attachment, date) VALUES ('$AT4', '$Fup4', '$eDate')");
    $st->execute();
    //header( "Location: http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
    }
    }
  */
  
  if (isSet($AT4)){
    echo "<script> alert('attachment type 4 is set'); </script>";
    if ($AT4 == 'pic'){
      $AT4 = "<a download=\'$Fup4\' href=\'/images/$Fup4\' > <img src=\'/images/$Fup4\' style=\'width:500%\' /><br/> $Fup4 </a>";
      if(!empty($addDate)){  //////////////////////////////////////////////////////////////////////////////////////////////// If more than one date added
	foreach ($addDate as $val){
	  $ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE event = '$Ev' AND date = '$val' ");
	  $ts->execute();
	  $res = $ts->fetch(PDO::FETCH_OBJ);
	  if (isSet($res->id)){
	    $ref = 'rF#='.$res->id;
	  }
	  $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, date) VALUES ('$ref', '$AT4', '$val')");
	  $st->execute();
	  //header( "Location: http://http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
	}
      }else{
	$ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE event = '$Ev' AND date = '$eDate' ");
	$ts->execute();
	$res = $ts->fetch(PDO::FETCH_OBJ);
	if (isSet($res->id)){
	  $ref = 'rF#='.$res->id;
	}
	$st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, date) VALUES ('$ref', '$AT4', '$eDate')");
	$st->execute();
	//header( "Location: http://http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
      }
    }else{
      if(!empty($addDate)){  //////////////////////////////////////////////////////////////////////////////////////////////// If more than one date added
	foreach ($addDate as $val){
	  $ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE event = '$Ev' AND date = '$val' ");
	  $ts->execute();
	  $res = $ts->fetch(PDO::FETCH_OBJ);
	  if (isSet($res->id)){
	    $ref = 'rF#='.$res->id;
	  }
	  $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, attachment, date) VALUES ('$ref', '$AT4', '$Fup4', '$val')");
	  $st->execute();
	  //header( "Location: http://http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
	}
      }else{
	$st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, attachment, date) VALUES ('$ref', '$AT4', '$Fup4', '$eDate')");
	$st->execute();
	//header( "Location: http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
      }
    }
  }else{
    echo "<script> window.location.href = 'http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year'; </script>";
    exit();
  }
  
  /* 
     if (isSet($AT5)){
     echo "<script> alert('attachment type 5 is set'); </script>";
     if ($AT5 == 'pic'){
     $AT5 = "<a download=\'$Fup5\' href=\'/images/$Fup5\' > <img src=\'/images/$Fup5\' style=\'width:500%\' /><br/> $Fup5 </a>";
     $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (type, date) VALUES ('$AT5', '$eDate')");
     $st->execute();
     header( "Location: http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
     }else{
     $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (type, attachment, date) VALUES ('$AT5', '$Fup5', '$eDate')");
     $st->execute();
     //header( "Location: http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
     }
     }
  */
  if (isSet($AT5)){
    echo "<script> alert('attachment type 5 is set'); </script>";
    if ($AT5 == 'pic'){
      $AT5 = "<a download=\'$Fup5\' href=\'/images/$Fup5\' > <img src=\'/images/$Fup5\' style=\'width:500%\' /><br/> $Fup5 </a>";
      if(!empty($addDate)){  //////////////////////////////////////////////////////////////////////////////////////////////// If more than one date added
	foreach ($addDate as $val){
	  $ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE event = '$Ev' AND date = '$val' ");
	  $ts->execute();
	  $res = $ts->fetch(PDO::FETCH_OBJ);
	  if (isSet($res->id)){
	    $ref = 'rF#='.$res->id;
	  }
	  $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, date) VALUES ('$ref', '$AT5', '$val')");
	  $st->execute();
	  //header( "Location: http://http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
	}
      }else{
	$ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE event = '$Ev' AND date = '$eDate' ");
	$ts->execute();
	$res = $ts->fetch(PDO::FETCH_OBJ);
	if (isSet($res->id)){
	  $ref = 'rF#='.$res->id;
	}
	$st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, date) VALUES ('$ref', '$AT5', '$eDate')");
	$st->execute();
	//header( "Location: http://http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
      }
    }else{
      if(!empty($addDate)){  //////////////////////////////////////////////////////////////////////////////////////////////// If more than one date added
	foreach ($addDate as $val){
	  $ts = $db->prepare("SELECT id FROM nbdl_eventCalendar_copy WHERE event = '$Ev' AND date = '$val' ");
	  $ts->execute();
	  $res = $ts->fetch(PDO::FETCH_OBJ);
	  if (isSet($res->id)){
	    $ref = 'rF#='.$res->id;
	  }
	  $st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, attachment, date) VALUES ('$ref', '$AT5', '$Fup5', '$val')");
	  $st->execute();
	  //header( "Location: http://http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
	}
      }else{
	$st = $db->prepare("INSERT into nbdl_eventCalendar_copy (event, type, attachment, date) VALUES ('$ref', '$AT5', '$Fup5', '$eDate')");
	$st->execute();
	//header( "Location: http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year");
      }
    }
  }else{
    echo "<script> window.location.href = 'http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year'; </script>";
    exit();
  }
echo "<script> window.location.href = 'http://www.newbrunswickdistlay.org/managePages.php/?menuOption=Calendar&prev=$Month&year=$Year'; </script>";
exit();
}
  
?>