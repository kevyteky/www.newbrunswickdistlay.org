<?PHP
//echo '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>';
////  HOLIDAYS

$NewYear = date('j', strtotime('First day of January'. $fYear));
$NewYearDay = date('D', strtotime('First day of January'. $fYear));
$MLK = date('j', strtotime('Third Monday of January'. $fYear));
$WashingtonBD = date('d', strtotime('Third Monday of February'. $fYear));
$Ash = date('j', strtotime('First Wednesday of March'. $fYear));
$GoodFriday = 14;
$Easter = 16;//date('j', strtotime('Last Sunday of March '.$fYear));
$Palm = 9; //date('j', strtotime('-7 day Last Sunday of March'. $fYear));
$Memorial = date('j', strtotime('Last Monday of May'. $fYear));
$July4 = date('j', strtotime('4th July'. $fYear));
$July4Day = date('D', strtotime('4th July'. $fYear));
$Labor = date('j', strtotime("first Monday of September". $fYear));
$Columbus = date('d', strtotime('Second Monday of October'. $fYear));
$Thanksgiving = date('d', strtotime('Fourth Thursday of November'. $fYear));
$xMas = date('j', strtotime("25th December". $fYear));
$xMasDay = date('D', strtotime("25th December". $fYear));
$toDay = date('j', strtotime("now"));
$thisMonth = date('M', strtotime("now"));

echo '<script>
function wordIt(fMonth){
            var yr = "'.$fYear.'";
            alert(fMonth + yr);
            $.ajax({url:"/htmlToWord.php", type:"GET", data:{"month":fMonth,"year":yr}, success: function(result){ alert("complete"); }});
}
$(document).ready(function(){
	$("#ulsCalendar").ready(function(){
  if('.$fYear.' == '.date('Y', strtotime("now")).'){
      $("[id^='.$thisMonth.'_'.$toDay.'_]").html(" '.$toDay.') <p> Today <br/><font size=\"1\"> </p>");              
  }
var $NewYears = "'.$NewYearDay.'";					
		if ($NewYears === "Sat"){
				$("[id^=Jan_'.$NewYear.'_]").html(" '.$NewYear.') <p> Happy New Years <br/><font size=\"1\"></p>");
				$("[id^=Jan_3_]").html(" 3) <p> In lieu of New Years <br/><font size=\"1\"> Official Holiday </p>");		
		}else if ($NewYears === "Sun"){
				$("[id^=Jan_'.$NewYear.'_]").html(" '.$NewYear.') <p> Happy New Years <br/><font size=\"1\"></p>");
				$("[id^=Jan_2_]").html(" 2) <p> In lieu of New Years <br/><font size=\"1\"> Official Holiday </p>");		
		}else {
				$("[id^=Jan_'.$NewYear.'_]").html(" '.$NewYear.') <p> Happy New Years <br/><font size=\"1\"> Official Holiday </p>");
		}										
  $("[id^=Jan_'.$MLK.'_]").html(" '.$MLK.') <p> Martin Luther King Day <br/><font size=\"1\"> </p>");
  $("[id^=Feb_'.$WashingtonBD.'_]").html(" '.$WashingtonBD.') <p> Washington\'s Birthday <br/><font size=\"1\"> (President\'s Day)<br/>Official Holiday </p>");
  $("[id^=Mar_'.$Ash.'_]").html(" '.$Ash.') <p> Ash Wednesday <br/><font size=\"1\"> (First day of Lent)</font> </p>");
  $("[id^=Apr_'.$Palm.'_]").html(" '.$Palm.') <p> Palm Sunday <br/><font size=\"1\"> </p>");
  $("[id^=Apr_'.$GoodFriday.'_]").html(" '.$GoodFriday.') <p> Good Friday <br/><font size=\"1\"> </p>");
  $("[id^=Apr_'.$Easter.'_]").html(" '.$Easter.') <p> Resurrection Sunday <br/><font size=\"1\"> </p>");
  $("[id^=May_'.$Memorial.'_]").html(" '.$Memorial.') <p> Memorial Day <br/><font size=\"1\"> Official Holiday </p>");
var $July4 = "'.$July4Day.'";					
		if ($July4 === "Sat"){
				$("[id^=Jul_'.$July4.'_]").html(" '.$July4.') <p> Independence Day <br/><font size=\"1\">4th Of July</p>");
				$("[id^=Jul_6_]").html(" 6) <p> In lieu of Independence<br/>Day<br/><font size=\"1\"> Official Holiday </p>");		
		}else if ($July4 === "Sun"){
				$("[id^=Jul_'.$July4.'_]").html(" '.$Jul4.') <p> Independence Day <br/><font size=\"1\">4th Of July</p>");
				$("[id^=Jul_5_]").html(" 5) <p> In lieu of Independence<br/>Day <br/><font size=\"1\"> Official Holiday </p>");		
		}else {
				$("[id^=Jul_'.$July4.'_]").html(" '.$July4.') <p> Independence Day <br/><font size=\"1\"> Official Holiday </p>");
		}	  			
  $("[id^=Sep_'.$Labor.'_]").html("'.$Labor.') <p> Labor Day <br/><font size=\"1\"> Official Holiday </p>");	
  $("[id^=Nov_'.$Thanksgiving.'_]").html(" '.$Thanksgiving.') <p> Happy ThanksGiving <br/><font size=\"1\"> Official Holiday </p>");
  $("[id^=Nov_'.++$Thanksgiving.'_]").html(" '.$Thanksgiving.') <p> Day After ThanksGiving <br/><font size=\"1\"> Official Holiday </p>");
var $xMas = "'.$xMasDay.'";					
		if ($xMas === "Sat"){
				$("[id^=Dec_'.$xMas.'_]").html(" '.$xMas.') <p> Chirstmas Day <br/><font size=\"1\">Happy Holidays</p>");
				$("[id^=Dec_27_]").html(" 27) <p> In lieu of Chirstmas Day <br/><font size=\"1\"> Official Holiday </p>");		
		}else if ($xMas === "Sun"){
				$("[id^=Dec_'.$xMas.'_]").html(" '.$xMas.') <p> Chirstmas Day <br/><font size=\"1\">Happy Holidays</p>");
				$("[id^=Dec_26_]").html(" 26) <p> In lieu of Chirstmas<br/>Day <br/><font size=\"1\"> Official Holiday </p>");		
		}else {
				$("[id^=Dec_25_]").html(" '.$xMas.') <p> Chirstmas Day <br/><font size=\"1\"> Official Holiday </p>");
		}
  		
  		
		});
		});
		</script>';

function populateEvents($event, $type, $attach, $day){   
         $date = date('M_j_Y', strtotime($day));
         //$day  =	date('j\)', strtotime($date));
         //echo "this is the event days= $date<br/>";
         if ( preg_match('/rF#=/', $event) ){
           $event = '';
	 }else{
           $event = $event.'<br/>';
	 }
	 if (isset($_SERVER['HTTP_USER_AGENT'])) {
	     $agent = $_SERVER['HTTP_USER_AGENT'];
	 }
	 if (strlen(strstr($agent,"Firefox")) > 0 ){      
             $browser = 'fireFox';
	 }
         if ($browser == 'fireFox'){
             $event = wordwrap($event, 24, "<br/>");
         }else{
             $event = wordwrap($event, 25, "<br/>");
	 }
         echo '<script> 
	 $(document).ready(function(){
	 $("#Calendar").ready(function(){ '. ((!empty($attach)) ? '$("#'.$date.'").append(" <div style=\"font-weight:normal\">'.$event.'<img src=\"/images/'.$type.'.png\" width=\"30pixels\" onclick=\"window.location.href= \'/images/'.$attach.'\'; \" \"><br/><small style=\"font-size:8px;\">'.((strlen($attach) > 37) ? substr($attach, 0, 24)."...$type": $attach) .'</small> </div>");});}); </script>' : '$("#'.$date.'").append(" <div style=\"font-weight:normal\">'. $event .'<small style=\"font-size:8px\">'.$type.'</small></div>");});}); </script>')  ;	    	
}

$std = $db->prepare("SELECT event, type, attachment, date from nbdl_eventCalendar_copy where date is not null or 0000-00-00 ");
$std->execute();
$result = $std->fetchALL(PDO::FETCH_FUNC, 'populateEvents');

/*
Function sortCal($name, $date, $month, $year, $slot, $desc, $code, $col){
  Global $db;
  Global $fYear;
  Global $fMonth;
  Global $fDay;
  Global $cc;
  Global $cell_array; 
  Global $column;
 
  
    $editDate = $date;

  if ($editDate === '1' or $editDate === '21' or $editDate === '31'){
    $editDate .= 'st';
  }elseif($editDate === '2' or $editDate === '22'){
    $editDate .= 'nd';
  }elseif($editDate === '3' or $editDate === '23'){
    $editDate .= 'rd';
  }else {
    $editDate .= 'th';
  }
  
  echo '<p style="background-color:#F8F9DB;" align="center"><b>'.$name.'</b> Has set the date of '.$month.' '.$editDate.' to <b>'.$slot. '</b>'; 
 
  If ($desc !== 'Enter Event Description Here'){
 echo '<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; With the following info:  ';  
 echo '<u>'.$desc.'</u></p>';
} else {
	echo '</p>';

}

$row1 = date('j', strtotime('First Saturday of '.$fMonth.' '.$fYear));

if ($date <= $row1){
  $place = 1;
}elseif ($date <= ($row1 + 7)){
  $place =2;
}elseif ($date <= ($row1 + 14)){
  $place = 3;
}elseif ($date <= ($row1 + 21)){
  $place = 4;
}elseif ($date <= ($row1 + 28)){
  $place = 5;
}else{
  $place = 6;
}

//$place = floor(($date + 1)/7)+1;  // ROW ON CALENDAR // Replaced by Above $place

$format = $year.'-'.date('m', strtotime($month)).'-'.$date; // FORMAT TO GET DAY POSITION

$day = date('w', strtotime(date('D', strtotime($format))))+1;  // POSITION FOR DAY

$column[$place][$day][$col]->removeAttribute('class');
$column[$place][$day][$col]->SetAttribute('BGCOLOR',$code);
$column[$place][$day][$col]->appendChild($valz = $cc->createElement('a', $name.': '.$slot));
$valz->setAttribute('title', $desc);
$valz->setAttribute('href', 'mailto:'.strtolower($name[0]).trim(strrchr(strtolower($name),' ')).'@alsintl.com?subject=Re: '.$slot);

}

$run = $db->prepare("Select * from nbdl_calendar where month='$fMonth' and Year='$fYear' ORDER BY date");
$run->execute();
$results = $run->fetchALL(PDO::FETCH_FUNC, "sortCal");

*/


$thisYear = date("Y");
$Yselection = array($thisYear=>$thisYear,
		++$thisYear=>$thisYear,
		++$thisYear=>$thisYear,
		++$thisYear=>$thisYear,
		++$thisYear=>$thisYear,
		++$thisYear=>$thisYear,
		++$thisYear=>$thisYear,
		++$thisYear=>$thisYear,
		++$thisYear=>$thisYear,
		++$thisYear=>$thisYear
);

//print_r($Yselection);

$Mselection  = array(date('M')=>" Select Month ",
		"Jan"=>"January",
		"Feb"=>"February",
		"Mar"=>"March",
		"Apr"=>"April",
		"May"=>"May",
		"Jun"=>"June",
		"Jul"=>"July",
		"Aug"=>"August",
		"Sep"=>"September",
		"Oct"=>"October",
		"Nov"=>"November",
		"Dec"=>"December",
);

$jumpTo = new DOMDocument();
$jumpTo->appendChild($div = $jumpTo->createElement('Div'));
$div->setAttribute('Class','Calendar JumpTo');
$div->setAttribute('style','width:800px; margin:0 auto;');
$div->setAttribute('align','center');
$div->appendChild($form = $jumpTo->createElement('form'));
$form->setAttribute('name', 'jumpTo');
$form->setAttribute('action', $_SERVER['PHP_SELF']);
$form->setAttribute('method', 'GET');
$form->appendChild($selectYear = $jumpTo->createElement('label', 'Year: '));
$selectYear->appendChild($yearSelect = $jumpTo->createElement('Select'));
$yearSelect->setAttribute('id','yearS');
$yearSelect->setAttribute('name','year');
foreach ($Yselection as $opt => $val){
	$yearSelect->appendChild($yearOption = $jumpTo->createElement('option'));
	$yearOption->setAttribute('value',$opt);
	$yearOption->appendChild($yearOptionsVals = $jumpTo->createElement('p',$val));
}
$form->appendChild($selectMonth = $jumpTo->createElement('label', '&nbsp;&nbsp;    Month: '));
$selectMonth->appendChild($monthSelect = $jumpTo->createElement('Select'));
$monthSelect->setAttribute('id','monthSelect');
$monthSelect->setAttribute('name','post');
foreach ($Mselection as $opt => $val){
	$monthSelect->appendChild($monthOption = $jumpTo->createElement('option'));
	$monthOption->setAttribute('value',$opt);
	$monthOption->appendChild($monthOptionsVals = $jumpTo->createElement('p',$val));
}
$form->appendChild($submitDate = $jumpTo->createElement('input'));
$submitDate->setAttribute('type','Submit');
$submitDate->setAttribute('name','menuOption');
$submitDate->setAttribute('Value','Calendar');


$CALarr = [];
$CALarr[] = 'Select Calendar';
$path = 'files/calendars/';
$CALoptions = [];


$objs = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);

foreach($objs as $name => $object){
    $names = explode('\\', $name);
    $num = 1;
    foreach ($names as $val){
      
        if ($val === '..' && '.'){
	    continue;
        }
	if ($val == 'files/calendars'){
	    continue; 
	}
	if ($val == 'header_images'){
	    continue;
	}
        if (preg_match('/.jpg|.JPG|.png|.PNG|.pdf|.PDF|.txt|.TXT|.ppt|.PPT|.html|.HTML|.htm|.HTM|.php|.PHP/', $val)){ 
	    continue;
        }
	if (preg_match('/.doc|.DOC|.docx|.DOCX/', $val)){
	    $CALarr[] = $val; 
	}
  }
}
 
//echo "<br/> this is the size of Img Array " . sizeof($CALarr)   ." <br/>"; 

//arsort($CALarr);


$eachOne = array_count_values($CALarr);  //thisarr);

echo "<script>
      function download_Calendar(){
                       var selectCal = document.getElementById('calendar_selected');                      
                       var selectedCal = selectCal.options[selectCal.selectedIndex].value;
                       if (selectedCal == 'Select Calendar'){
                           alert('Select a Calendar first');
                       }else{
                           window.open('http://newbrunswickdistlay.org/'+selectedCal);
                       }
       }
      </script>";


$form->appendChild($calDownload = $jumpTo->createElement("Label", "&nbsp;&nbsp;Download Calendar:&nbsp;"));
$calDownload->appendChild($calSelect = $jumpTo->createElement('Select'));
$calSelect->setAttribute('id','calendar_selected');
$caseThis = 0;
foreach ($CALarr as $opt => $val){
	$calSelect->appendChild($calOption = $jumpTo->createElement('option'));
	$calOption->setAttribute('value',$val);
        $value = preg_replace('{files/calendars/_NB_District_Lay-Churches_Calendar_|files/calendars/NB_District_Lay-Churches_}', '', $val);
        $calOption->appendChild($calOptionsVals = $jumpTo->createElement('p',$value));
        if($val == 'Select Calendar'){
	   $calOption->setAttribute('selected','selected');
	}
           
}

$form->appendChild($wFile = $jumpTo->createElement('input'));
$wFile->setAttribute('type','button');
$wFile->setAttribute('value','Save '.$fullMonth.' Calendar');
$wFile->setAttribute("onClick","wordIt('$fullMonth');");

$form->appendChild($jumpTo->createElement('text','&nbsp;&nbsp;'));
$form->appendChild($downloadCal = $jumpTo->createElement('img'));
$downloadCal->setAttribute('src', '/images/download.png');
$downloadCal->setAttribute('height', '15px');
$downloadCal->setAttribute('alt', 'Download Calendar');
$downloadCal->setAttribute('onClick', 'download_Calendar();');


//$form->appendChild($jumpTo->createElement('br'));

echo $jumpTo->saveHTML();


?>