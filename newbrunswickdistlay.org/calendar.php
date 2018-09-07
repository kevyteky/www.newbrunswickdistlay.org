<?php
session_start();
//print_r(array_keys($_POST));
//echo "<br />";
//print_r(array_Values($_POST));

$mO = date('M');
$mOl = date('F');

$yR = date('Y');
$toD = date('D');
$toDl = date('l');
$calDay = str_replace('0', '', date('d'));

$wDays = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
$y2013Days = array('Tue','Wed','Thu','Fri','Sat','Sun','Mon');
$months = array('END','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
$years = array('END','2010','2011','2012','2013','2014','2015','2016','2017','2018','2019','2020');
$MaxYear2013 = '365';
$calYear = $_GET['year'];


//echo $_GET['prev'];

if ($_GET['prev'] === 'Feb'){
	$d = new DateTime($_GET['year'].'-02-1st');
	goto ref1;
}

if (isSet($_GET['prev'])){
	$d = new DateTime($_GET['year'].'-'.date('m', strtotime($_GET['prev'])).'-1st');
} elseif (isSet($_GET['post'])) {
	$d = new DateTime($_GET['year'].'-'.date('m', strtotime($_GET['post'])).'-1st');
} else {
	$d = new DateTime($yR.'-'.date('m').'-'.date('d'));
}
ref1:
$d->modify('first day of the month');
$dayOfMo = $d->format('l, F j\s\t, Y');


//////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////  BUILD CALENDAR  ///////////////////////////////////////////////////////


if (isSet($dayOfMo)){
	$build = explode(' ', $dayOfMo);
	$fDay = substr($build[0], 0, 3);
	$fullDay = $build[0];
	$replace = array('s','n','t');
	//$fDate = str_replace($replace, '', substr($build[2], 0, 2));
	$fMonth = substr($build[1], 0, 3);
	$fullMonth = $build[1];
	$fYear = substr($build[3], 0, 4);
}

$date = array_search($fMonth, $months);

$days = cal_days_in_month(CAL_GREGORIAN, $date, $fYear);

$nD = new DateTime($fYear.'-'.$fullMonth.'-'.$build[2]);
$nD->modify('first day of +1 month');
$nextMoOf = $nD->format('l, F j\s\t, Y');

$pD = new DateTime($fYear.'-'.$fullMonth.'-'.$build[2]);
$pD->modify('first day of -1 month');
$prevMoOf = $pD->format('l, F j\s\t, Y');

if (isSet($nextMoOf)){
	$build = explode(' ', $nextMoOf);
	$nDay = substr($build[0], 0, 3);
	$nfullDay = $build[0];
	$replace = array('s','n','t');
	$nDate = str_replace($replace, '', substr($build[2], 0, 2));
	$nMonth = substr($build[1], 0, 3);
	$nfullMonth = $build[1];
	$nYear = substr($build[3], 0, 4);
}

if (isSet($prevMoOf)){
	$build = explode(' ', $prevMoOf);
	$pDay = substr($build[0], 0, 3);
	$pfullDay = $build[0];
	$replace = array('s','n','t');
	$pDate = str_replace($replace, '', substr($build[2], 0, 2));
	$pMonth = substr($build[1], 0, 3);
	$pfullMonth = $build[1];
	$pYear = substr($build[3], 0, 4);
}

////////////////////////////////////////////////////////////////////////////////////////////////////////
//echo '<HTML>';
//echo '<!DOCTYPE html>';
//echo '<HEAD>';
//echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
echo '<link rel="stylesheet" type="text/css" href="/calStyleSheets.css" >';


//echo '</HEAD>';
//echo '<BODY>';
$cc = new DOMDocument;
$cc->validateOnParse = true;
//$cc->appendChild($PrintCal = $cc->createElement('Input'));
//$PrintCal->setAttribute('type', 'button');
//$PrintCal->setAttribute('value', 'Print '.$fullMonth.'Calendar');
//$PrintCal->setAttribute('onClick', 'printCalendar();');
$cc->appendChild($ccDiv = $cc->createElement('div'));
$ccDiv->setAttribute('id', 'FullMonthCalendar');
$ccDiv->setAttribute('style', 'width:980px;');
//$ccDiv->setAttribute('align', 'center');
/////// Div
$ccDiv->appendChild($ccTable = $cc->createElement('table'));
$ccTable->setAttribute('id', 'Calendar');
$ccTable->setAttribute('style', 'border-collapse: collapse; table-layout: fixed; margin-left: 0px; width: 100%; height: 100%;');
$ccTable->setAttribute('border', 0);
$ccTable->setAttribute('cellpadding', 0);
$ccTable->setAttribute('cellspacing', 0);


for ($colx = 1 ; $colx <= 14 ; $colx++ ){
	$ccTable->appendChild($col = $cc->createElement('col'));
	//$col->setAttribute('style', 'white-space:nowrap');
	if ($colx % 2 == 0){
		$col->setAttribute('width', 130);
	}else{
		$col->setAttribute('width', 10);
	}
}

$ccTable->appendChild($ccTBody = $cc->createElement('tbody'));
$ccTBody->appendChild($row1 = $cc->createElement('tr'));
$row1->setAttribute('class', 'Sapro965583');
$row1->setAttribute('height', 30);
$row1->setAttribute('width', 100);
$row1->appendChild($cel1 = $cc->createElement('td', ''));
$cel1->setAttribute('id', 'metaData');
$cel1->setAttribute('colspan', 2);
$cel1->setAttribute('class', 'Sapro1025583');
$cel1->setAttribute('style', 'height: 18.75pt; width: 170px;');
$cel1->setAttribute('height', 25);
$cel1->appendChild($href1 = $cc->createElement('a'));
$href1->setAttribute('href', '?menuOption=Calendar&prev='.$pMonth.'&year='.$pYear);
$href1->setAttribute('title', $pMonth.' '.$pYear.' Calendar');
$href1->setAttribute('style', 'color: #F8F9DB ');
$href1->appendChild($cel1span1 = $cc->createElement('span', '&#8592;'.$pMonth.' '.$pYear));

$row1->appendChild($cel2 = $cc->createElement('td','&nbsp;'));
$cel2->setAttribute('id', 'metaData');
$cel2->setAttribute('class', 'Sapro975583');
$cel2->setAttribute('style', 'width: 17pt;');
$cel2->setAttribute('width', 23);

$row1->appendChild($cel3 = $cc->createElement('td','&nbsp;'));
$cel3->setAttribute('id', 'metaData');
$cel3->setAttribute('class', 'Sapro985583');
$cel3->setAttribute('nowrap', 'nowrap');
$cel3->setAttribute('width', 68);

$row1->appendChild($cel4 = $cc->createElement('td'));
$cel4->appendChild($head1 = $cc->createElement('h1', $fullMonth.' '. $fYear));
$cel4->setAttribute('id', 'metaData');
$cel4->setAttribute('colspan', 6);
$cel4->setAttribute('class', 'Sapro975583');
$cel4->setAttribute('style', 'width: 204pt;');
$cel4->setAttribute('align', 'center');
$cel4->setAttribute('width', 273);

$row1->appendChild($cel5 = $cc->createElement('td','&nbsp;'));
$cel5->setAttribute('id', 'metaData');
$cel5->setAttribute('class', 'Sapro985583');
$cel5->setAttribute('style', 'width: 17pt;');
$cel5->setAttribute('width', 23);

$row1->appendChild($cel6 = $cc->createElement('td','&nbsp;'));
$cel6->setAttribute('id', 'metaData');
$cel6->setAttribute('class', 'Sapro975583');
$cel6->setAttribute('nowrap', 'nowrap');
$cel6->setAttribute('width', 68);

$row1->appendChild($cel7 = $cc->createElement('td'));
$cel7->appendChild($href2 = $cc->createElement('a'));
$href2->setAttribute('href', '?menuOption=Calendar&post='.$nMonth.'&year='.$nYear);
$href2->setAttribute('title', $nMonth.' '.$nYear.' Calendar');
$href2->setAttribute('style', 'color: #F8F9DB ');
$href2->appendChild($cel1span2 = $cc->createElement('span', $nMonth.' '. $nYear .'&#8594; ' ));
$cel7->setAttribute('colspan', 2);
$cel7->setAttribute('class', 'Sapro1045583');
$cel7->setAttribute('style', 'border-right: 1.5pt solid rgb(58, 98, 147); width: 68pt;');
$cel7->setAttribute('id', 'metaData');
$cel7->setAttribute('width', 91);

/////////////////////////////////////////////////////////////////////////////////////////////////////////

$ccTable->appendChild($row2 = $cc->createElement('tr'));
$row2->setAttribute('height', 40);
$row2->setAttribute('width', 100);

for ($celx = 1; $celx <=7; $celx++){
	$row2->appendChild($cel = $cc->createElement('TH', $wDays[$celx-1]));
	$cel->setAttribute('colspan', 2);
	$cel->setAttribute('id', 'metaData');
	if ($wDays[$celx] === 'Sun'){
		$cel->setAttribute('class', 'Sapro995583');
		$cel->setAttribute('style', 'height: 13.5pt; width: 170px;');
		$cel->setAttribute('height', 18);
	} elseif ($wDays[$celx] === 'Sat'){
		$cel->setAttribute('class', 'Sapro1005583');
	} else {
		$cel->setAttribute('class', 'Sapro1005583');
		$cel->setAttribute('style', 'border-left; medium none;');
	}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////  Rows to build calendar
/////  First rows with Header Date & Holiday

function getWeek($date){
	return((floor(($date - 1)/7)))+1;
}

function getDayOfWeek($date, $week, $offset){
	return ($date -(($week - 1)*7))+offset;
}

function getOffset($firstDayOfMonth){
	if ($firstDayOfMonth === 'Sun'){
		return 1;
	}
	if ($firstDayOfMonth === 'Mon'){
		return 2;
	}
	if ($firstDayOfMonth === 'Tue'){
		return 3;
	}
	if ($firstDayOfMonth === 'Wed'){
		return 4;
	}
	if ($firstDayOfMonth === 'Thu'){
		return 5;
	}
	if ($firstDayOfMonth === 'Fri'){
		return 6;
	}
	if ($firstDayOfMonth === 'Sat'){
		return 7;
	}
}

function getdaysleft($day){
	$equal = 8 - $day;
	return $equal;
}

$dayOffset = getOffset($fDay);
$daysLeft = getdaysleft($dayOffset);

$ccTable->appendChild($row3 = $cc->createElement('tr'));
$row3->setAttribute('height', 30);

// first week
for ($wk1 = 1 ; $wk1 <= $daysLeft  ; $wk1++){
	$rowIndex = 3;
	$cell_value_array[$dayOffset][$rowIndex][1] = $wk1.')';
	${'cel'.$dayOffset.'_'.$rowIndex.val1} = $wk1.')';
		$dayOffset++;
}



// middle weeks
for ($rowIndex = 4; $rowIndex < 7; $rowIndex++) {
	for ($wk2 = 1 ; $wk2 <= 7  ; $wk2++){
		$daysLeft++;
		$cell_value_array[$wk2][$rowIndex][1] = $daysLeft.')';
		${'cel'.$wk2.'_4val1'} = $daysLeft.')';
	}
}

// last week
$wk5=1;
for ($run = $daysLeft; $run < $days  ; $run++){
	$daysLeft++;
 	$cell_value_array[$wk5][$rowIndex][1] = $daysLeft.')';
	${'cel'.$wk5.'_7val1'} = $daysLeft.')';
		$wk5++;
}

$fDate = 1;
$set = getOffset($fDay);

///////////////////////////////////////  Sunday Cell 1
$rowIndex = 3;
for ($day = 1; $day <= 7; $day++){		
	$row3->appendChild($cell_array[$day][$rowIndex][1] = $cc->createElement('td', $throwAway  = (isSet($cell_value_array[$day][$rowIndex][1])? $cell_value_array[$day][$rowIndex][1] : '')));
	$cell_array[$day][$rowIndex][1]->setAttribute('class', 'Sapro905583');
	$cell_array[$day][$rowIndex][1]->setAttribute('nowrap', 'nowrap');
	$cell_array[$day][$rowIndex][1]->setAttribute('height', '30');
	$row3->appendChild($cell_array[$day][$rowIndex][2] = $cc->createElement('td', '&nbsp;'));
	$cell_array[$day][$rowIndex][2]->setAttribute('class', 'Sapro915583');
	$cell_array[$day][$rowIndex][2]->setAttribute('nowrap', 'nowrap');
	$cell_array[$day][$rowIndex][2]->setAttribute('height', '30');

	if (!isSet($cell_value_array[$day][$rowIndex][1])){
		$cell_array[$day][$rowIndex][1]->setAttribute('class', 'Sapro1135583');
		$cell_array[$day][$rowIndex][2]->setAttribute('class', 'Sapro1095583');
	}
}

for ($w1fdate = $set; $w1fdate <= 7 ; $w1fdate++){
	$cell_array[$w1fdate][$rowIndex][1]->setAttribute('id', $fMonth.'_'.$fDate.'_'.$fYear);
	$fDate++;
}
	
if (isSet($cell_value_array[1][$rowIndex][1])){ 
	$cell_array[1][$rowIndex][1]->setAttribute('class', 'Sapro945583');
	$cell_array[1][$rowIndex][1]->setAttribute('style', 'height: 15pt; width: 170pt;');
	$cell_array[1][$rowIndex][1]->setAttribute('height', '30');
	$cell_array[1][$rowIndex][2]->setAttribute('class', 'Sapro955583');
	$cell_array[1][$rowIndex][2]->setAttribute('nowrap', 'nowrap');
	$cell_array[1][$rowIndex][2]->setAttribute('height', '30');
} else {
	$cell_array[1][$rowIndex][1]->setAttribute('class', 'Sapro1135583');
}

if (isSet($cell_value_array[7][$rowIndex][1])){
	$cell_array[7][$rowIndex][1]->setAttribute('class', 'Sapro925583');
	$cell_array[7][$rowIndex][1]->setAttribute('nowrap', 'nowrap');
	$cell_array[7][$rowIndex][1]->setAttribute('height', '30');
	$cell_array[7][$rowIndex][2]->setAttribute('class', 'Sapro935583');
	$cell_array[7][$rowIndex][2]->setAttribute('nowrap', 'nowrap');
	$cell_array[7][$rowIndex][2]->setAttribute('height', '30');
}

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////  Colomns to insert data /////////////////  Week 1 colomns Row 1


for ($r=1;$r<=7;$r++){
$row3->appendChild($Col[$r][1] = $cc->createElement('tr'));
$Col[$r][1]->setAttribute('height', '25');
}
	for ($c = 1; $c <= 7; $c++){
		$n = 1;
		$Col[$c][1]->appendChild($column[1][$n][$c] = $cc->createElement('td'));
		if (strpos($cell_value_array[$n][$rowIndex][1], ')')) {
		$column[1][$n][$c]->setAttribute('class','Sapro1165583');
		} else {
		$column[1][$n][$c]->setAttribute('class','Sapro1115583');
		}
		$column[1][$n][$c]->setAttribute('colspan', '2');
		$column[1][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[1][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
		$Col[$c][1]->setAttribute('style', 'display:none');
		}
		$n = 2;
		$Col[$c][1]->appendChild($column[1][$n][$c] = $cc->createElement('td'));
		if (strpos($cell_value_array[$n][$rowIndex][1], ')')) {
			$column[1][$n][$c]->setAttribute('class','Sapro1185583');
		} else {
			$column[1][$n][$c]->setAttribute('class','Sapro1135583');
		}
		$column[1][$n][$c]->setAttribute('colspan', '2');
		$column[1][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[1][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][1]->setAttribute('style', 'display:none');
		}
		$n = 3;
		$Col[$c][1]->appendChild($column[1][$n][$c] = $cc->createElement('td'));
		if (strpos($cell_value_array[$n][$rowIndex][1], ')')) {
			$column[1][$n][$c]->setAttribute('class','Sapro1185583');
		} else {
			$column[1][$n][$c]->setAttribute('class','Sapro1135583');
		}
		$column[1][$n][$c]->setAttribute('colspan', '2');
		$column[1][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[1][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][1]->setAttribute('style', 'display:none');
		}
		$n = 4;
		$Col[$c][1]->appendChild($column[1][$n][$c] = $cc->createElement('td'));
		if (strpos($cell_value_array[$n][$rowIndex][1], ')')) {
			$column[1][$n][$c]->setAttribute('class','Sapro1185583');
		} else {
			$column[1][$n][$c]->setAttribute('class','Sapro1135583');
		}
		$column[1][$n][$c]->setAttribute('colspan', '2');
		$column[1][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[1][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][1]->setAttribute('style', 'display:none');
		}
		$n = 5;
		$Col[$c][1]->appendChild($column[1][$n][$c] = $cc->createElement('td'));
		if (strpos($cell_value_array[$n][$rowIndex][1], ')')) {
			$column[1][$n][$c]->setAttribute('class','Sapro1185583');
		} else {
			$column[1][$n][$c]->setAttribute('class','Sapro1135583');
		}
		$column[1][$n][$c]->setAttribute('colspan', '2');
		$column[1][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[1][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][1]->setAttribute('style', 'display:none');
		}
		$n = 6;
		$Col[$c][1]->appendChild($column[1][$n][$c] = $cc->createElement('td'));
		if (strpos($cell_value_array[$n][$rowIndex][1], ')')) {
			$column[1][$n][$c]->setAttribute('class','Sapro1185583');
		} else {
			$column[1][$n][$c]->setAttribute('class','Sapro1135583');
		}
		$column[1][$n][$c]->setAttribute('colspan', '2');
		$column[1][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[1][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][1]->setAttribute('style', 'display:none');
		}
		$n = 7;
		$Col[$c][1]->appendChild($column[1][$n][$c] = $cc->createElement('td'));
		$column[1][$n][$c]->setAttribute('class','Sapro1145583');
		$column[1][$n][$c]->setAttribute('colspan', '2');
		$column[1][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px; width: 68pt; border-right: 1.5pt solid rgb(58, 98, 147);');
		$column[1][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][1]->setAttribute('style', 'display:none');
		}

	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////  ROW 1 week 2
	/////////////  SUNDAY 

	$ccTable->appendChild($row4 = $cc->createElement('tr'));
	$row4->setAttribute('height', 20);
	
	$rowIndex = 4;
	for ($day = 1; $day <= 7; $day++){
		$row4->appendChild($cell_array[$day][$rowIndex][1] = $cc->createElement('td', $throwAway  = (isSet($cell_value_array[$day][$rowIndex][1])? $cell_value_array[$day][$rowIndex][1] : '')));
		$cell_array[$day][$rowIndex][1]->setAttribute('id', $fMonth.'_'.str_replace(")","", $cell_value_array[$day][$rowIndex][1]).'_'.$fYear);
		$cell_array[$day][$rowIndex][1]->setAttribute('class', 'Sapro905583');
		$cell_array[$day][$rowIndex][1]->setAttribute('nowrap', 'nowrap');
		$cell_array[$day][$rowIndex][1]->setAttribute('height', '30');
		$row4->appendChild($cell_array[$day][$rowIndex][2] = $cc->createElement('td', '&nbsp;'));
		$cell_array[$day][$rowIndex][2]->setAttribute('class', 'Sapro915583');
		$cell_array[$day][$rowIndex][2]->setAttribute('nowrap', 'nowrap');
		$cell_array[$day][$rowIndex][2]->setAttribute('height', '30');
	
	}
	$cell_array[1][$rowIndex][1]->setAttribute('class', 'Sapro945583');
	$cell_array[1][$rowIndex][2]->setAttribute('class', 'Sapro955583');
	$cell_array[7][$rowIndex][1]->setAttribute('class', 'Sapro925583');
	$cell_array[7][$rowIndex][2]->setAttribute('class', 'Sapro935583');


	////////////////////////////////////////////////////////////////////////////////////////////////////////////


	////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////  Colomns to insert data ///////////////// Week 2 Colomn 10 Row 1
	for ($r=1;$r<=7;$r++){
		$row4->appendChild($Col[$r][2] = $cc->createElement('tr'));
		$Col[$r][2]->setAttribute('height', '25');
	}
	for ($c = 1; $c <= 7; $c++){
		$n = 1;
		$Col[$c][2]->appendChild($column[2][$n][$c] = $cc->createElement('td'));
		$column[2][$n][$c]->setAttribute('class','Sapro1165583');
		$column[2][$n][$c]->setAttribute('colspan', '2');
		$column[2][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[2][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][2]->setAttribute('style', 'display:none');
		}
		$n = 2;
		$Col[$c][2]->appendChild($column[2][$n][$c] = $cc->createElement('td'));
		$column[2][$n][$c]->setAttribute('class','Sapro1185583');
		$column[2][$n][$c]->setAttribute('colspan', '2');
		$column[2][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[2][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][2]->setAttribute('style', 'display:none');
		}
		$n = 3;
		$Col[$c][2]->appendChild($column[2][$n][$c] = $cc->createElement('td'));
		$column[2][$n][$c]->setAttribute('class','Sapro1185583');
		$column[2][$n][$c]->setAttribute('colspan', '2');
		$column[2][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[2][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][2]->setAttribute('style', 'display:none');
		}
		$n = 4;
		$Col[$c][2]->appendChild($column[2][$n][$c] = $cc->createElement('td'));
		$column[2][$n][$c]->setAttribute('class','Sapro1185583');		
		$column[2][$n][$c]->setAttribute('colspan', '2');
		$column[2][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[2][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][2]->setAttribute('style', 'display:none');
		}
		$n = 5;
		$Col[$c][2]->appendChild($column[2][$n][$c] = $cc->createElement('td'));
		$column[2][$n][$c]->setAttribute('class','Sapro1185583');
		$column[2][$n][$c]->setAttribute('colspan', '2');
		$column[2][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[2][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][2]->setAttribute('style', 'display:none');
		}
		$n = 6;
		$Col[$c][2]->appendChild($column[2][$n][$c] = $cc->createElement('td'));
		$column[2][$n][$c]->setAttribute('class','Sapro1185583');
		$column[2][$n][$c]->setAttribute('colspan', '2');
		$column[2][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[2][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][2]->setAttribute('style', 'display:none');
		}
		$n = 7;
		$Col[$c][2]->appendChild($column[2][$n][$c] = $cc->createElement('td'));
		$column[2][$n][$c]->setAttribute('class','Sapro1145583');
		$column[2][$n][$c]->setAttribute('colspan', '2');
		$column[2][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px; width: 68pt; border-right: 1.5pt solid rgb(58, 98, 147);');
		$column[2][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][2]->setAttribute('style', 'display:none');
		}
	
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////  ROW 5 week 3
	/////////////  SUNDAY 15

	$ccTable->appendChild($row5 = $cc->createElement('tr'));
	$row5->setAttribute('height', 20);
	
	$rowIndex = 5;
	for ($day = 1; $day <= 7; $day++){
		$row5->appendChild($cell_array[$day][$rowIndex][1] = $cc->createElement('td', $throwAway  = (isSet($cell_value_array[$day][$rowIndex][1])? $cell_value_array[$day][$rowIndex][1] : '')));
		$cell_array[$day][$rowIndex][1]->setAttribute('id', $fMonth.'_'.str_replace(")","", $cell_value_array[$day][$rowIndex][1]).'_'.$fYear);
		$cell_array[$day][$rowIndex][1]->setAttribute('class', 'Sapro905583');
		$cell_array[$day][$rowIndex][1]->setAttribute('nowrap', 'nowrap');
		$cell_array[$day][$rowIndex][1]->setAttribute('height', '30');
		$row5->appendChild($cell_array[$day][$rowIndex][2] = $cc->createElement('td', '&nbsp;'));
		$cell_array[$day][$rowIndex][2]->setAttribute('class', 'Sapro915583');
		$cell_array[$day][$rowIndex][2]->setAttribute('nowrap', 'nowrap');
		$cell_array[$day][$rowIndex][2]->setAttribute('height', '30');
	
	}
	$cell_array[1][$rowIndex][1]->setAttribute('class', 'Sapro945583');
	$cell_array[1][$rowIndex][2]->setAttribute('class', 'Sapro955583');
	$cell_array[7][$rowIndex][1]->setAttribute('class', 'Sapro925583');
	$cell_array[7][$rowIndex][2]->setAttribute('class', 'Sapro935583');
	

	////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////  Colomns to insert data ///////////////// Week 3 Colomns Row 14

	for ($r=1;$r<=7;$r++){
		$row5->appendChild($Col[$r][3] = $cc->createElement('tr'));
		$Col[$r][3]->setAttribute('height', '25');
	}
	for ($c = 1; $c <= 7; $c++){
		$n = 1;
		$Col[$c][3]->appendChild($column[3][$n][$c] = $cc->createElement('td'));
		$column[3][$n][$c]->setAttribute('class','Sapro1165583');
		$column[3][$n][$c]->setAttribute('colspan', '2');
		$column[3][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[3][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][3]->setAttribute('style', 'display:none');
		}
		$n = 2;
		$Col[$c][3]->appendChild($column[3][$n][$c] = $cc->createElement('td'));
		$column[3][$n][$c]->setAttribute('class','Sapro1185583');
		$column[3][$n][$c]->setAttribute('colspan', '2');
		$column[3][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[3][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][3]->setAttribute('style', 'display:none');
		}
		$n = 3;
		$Col[$c][3]->appendChild($column[3][$n][$c] = $cc->createElement('td'));
		$column[3][$n][$c]->setAttribute('class','Sapro1185583');
		$column[3][$n][$c]->setAttribute('colspan', '2');
		$column[3][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[3][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][3]->setAttribute('style', 'display:none');
		}
		$n = 4;
		$Col[$c][3]->appendChild($column[3][$n][$c] = $cc->createElement('td'));
		$column[3][$n][$c]->setAttribute('class','Sapro1185583');
		$column[3][$n][$c]->setAttribute('colspan', '2');
		$column[3][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[3][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][3]->setAttribute('style', 'display:none');
		}
		$n = 5;
		$Col[$c][3]->appendChild($column[3][$n][$c] = $cc->createElement('td'));
		$column[3][$n][$c]->setAttribute('class','Sapro1185583');
		$column[3][$n][$c]->setAttribute('colspan', '2');
		$column[3][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[3][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][3]->setAttribute('style', 'display:none');
		}
		$n = 6;
		$Col[$c][3]->appendChild($column[3][$n][$c] = $cc->createElement('td'));
		$column[3][$n][$c]->setAttribute('class','Sapro1185583');
		$column[3][$n][$c]->setAttribute('colspan', '2');
		$column[3][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[3][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][3]->setAttribute('style', 'display:none');
		}
		$n = 7;
		$Col[$c][3]->appendChild($column[3][$n][$c] = $cc->createElement('td'));
		$column[3][$n][$c]->setAttribute('class','Sapro1145583');
		$column[3][$n][$c]->setAttribute('colspan', '2');
		$column[3][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px; width: 68pt; border-right: 1.5pt solid rgb(58, 98, 147);');
		$column[3][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][3]->setAttribute('style', 'display:none');
		}
	
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////  ROW 6 week 4
	/////////////  SUNDAY 22

	$ccTable->appendChild($row6 = $cc->createElement('tr'));
	$row6->setAttribute('height', 20);
	
	$rowIndex = 6;
	for ($day = 1; $day <= 7; $day++){
		$row6->appendChild($cell_array[$day][$rowIndex][1] = $cc->createElement('td', $throwAway  = (isSet($cell_value_array[$day][$rowIndex][1])? $cell_value_array[$day][$rowIndex][1]  : '')));
		$cell_array[$day][$rowIndex][1]->setAttribute('id', $fMonth.'_'.str_replace(")","", $cell_value_array[$day][$rowIndex][1]).'_'.$fYear);
		$cell_array[$day][$rowIndex][1]->setAttribute('class', 'Sapro905583');
		$cell_array[$day][$rowIndex][1]->setAttribute('nowrap', 'nowrap');
		$cell_array[$day][$rowIndex][1]->setAttribute('height', '30');
		$row6->appendChild($cell_array[$day][$rowIndex][2] = $cc->createElement('td', '&nbsp;'));
		$cell_array[$day][$rowIndex][2]->setAttribute('class', 'Sapro915583');
		$cell_array[$day][$rowIndex][2]->setAttribute('nowrap', 'nowrap');
		$cell_array[$day][$rowIndex][2]->setAttribute('height', '30');
	
	}
	$cell_array[1][$rowIndex][1]->setAttribute('class', 'Sapro945583');
	$cell_array[1][$rowIndex][2]->setAttribute('class', 'Sapro955583');
	$cell_array[7][$rowIndex][1]->setAttribute('class', 'Sapro925583');
	$cell_array[7][$rowIndex][2]->setAttribute('class', 'Sapro935583');
	

	////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////  Colomns to insert data ///////////////// Week 4 Colomns Row 18

	for ($r=1;$r<=7;$r++){
		$row6->appendChild($Col[$r][4] = $cc->createElement('tr'));
		$Col[$r][4]->setAttribute('height', '25');
	}
	for ($c = 1; $c <= 7; $c++){
		$n = 1;
		$Col[$c][4]->appendChild($column[4][$n][$c] = $cc->createElement('td'));
		$column[4][$n][$c]->setAttribute('class','Sapro1165583');
		$column[4][$n][$c]->setAttribute('colspan', '2');
		$column[4][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[4][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][4]->setAttribute('style', 'display:none');
		}
		$n = 2;
		$Col[$c][4]->appendChild($column[4][$n][$c] = $cc->createElement('td'));
		$column[4][$n][$c]->setAttribute('class','Sapro1185583');
		$column[4][$n][$c]->setAttribute('colspan', '2');
		$column[4][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[4][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][4]->setAttribute('style', 'display:none');
		}
		$n = 3;
		$Col[$c][4]->appendChild($column[4][$n][$c] = $cc->createElement('td'));
		$column[4][$n][$c]->setAttribute('class','Sapro1185583');
		$column[4][$n][$c]->setAttribute('colspan', '2');
		$column[4][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[4][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][4]->setAttribute('style', 'display:none');
		}
		$n = 4;
		$Col[$c][4]->appendChild($column[4][$n][$c] = $cc->createElement('td'));
		$column[4][$n][$c]->setAttribute('class','Sapro1185583');
		$column[4][$n][$c]->setAttribute('colspan', '2');
		$column[4][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[4][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][4]->setAttribute('style', 'display:none');
		}
		$n = 5;
		$Col[$c][4]->appendChild($column[4][$n][$c] = $cc->createElement('td'));
		$column[4][$n][$c]->setAttribute('class','Sapro1185583');
		$column[4][$n][$c]->setAttribute('colspan', '2');
		$column[4][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[4][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][4]->setAttribute('style', 'display:none');
		}
		$n = 6;
		$Col[$c][4]->appendChild($column[4][$n][$c] = $cc->createElement('td'));
		$column[4][$n][$c]->setAttribute('class','Sapro1185583');
		$column[4][$n][$c]->setAttribute('colspan', '2');
		$column[4][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
		$column[4][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][4]->setAttribute('style', 'display:none');
		}
		$n = 7;
		$Col[$c][4]->appendChild($column[4][$n][$c] = $cc->createElement('td'));
		$column[4][$n][$c]->setAttribute('class','Sapro1145583');
		$column[4][$n][$c]->setAttribute('colspan', '2');
		$column[4][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px; width: 68pt; border-right: 1.5pt solid rgb(58, 98, 147);');
		$column[4][$n][$c]->setAttribute('height', '25');
		if ($c >= 5){
			$Col[$c][4]->setAttribute('style', 'display:none');
		}
	
	}	


	//////////////////////////  ROW 7 week 4
	/////////////  SUNDAY 29
$rowIndex = 7;

		$ccTable->appendChild($row7 = $cc->createElement('tr'));
		$row7->setAttribute('height', 20);
		for ($day = 1; $day <= 7; $day++){
			$row7->appendChild($cell_array[$day][$rowIndex][1] = $cc->createElement('td', $throwAway  = (isSet($cell_value_array[$day][$rowIndex][1])? $cell_value_array[$day][$rowIndex][1] : '&nbsp;')));
			$cell_array[$day][$rowIndex][1]->setAttribute('id', $fMonth.'_'.str_replace(")","", $cell_value_array[$day][$rowIndex][1]).'_'.$fYear);
			$cell_array[$day][$rowIndex][1]->setAttribute('class', 'Sapro905583');
			$cell_array[$day][$rowIndex][1]->setAttribute('nowrap', 'nowrap');
			$cell_array[$day][$rowIndex][1]->setAttribute('height', '30');
			$row7->appendChild($cell_array[$day][$rowIndex][2] = $cc->createElement('td', '&nbsp;'));
			$cell_array[$day][$rowIndex][2]->setAttribute('class', 'Sapro915583');
			$cell_array[$day][$rowIndex][2]->setAttribute('wordwrap', 'wordwrap');
			$cell_array[$day][$rowIndex][2]->setAttribute('height', '30');
		}
		$cell_array[1][$rowIndex][1]->setAttribute('class', 'Sapro945583');
		$cell_array[1][$rowIndex][2]->setAttribute('class', 'Sapro955583');
		$cell_array[7][$rowIndex][1]->setAttribute('class', 'Sapro925583');
		$cell_array[7][$rowIndex][2]->setAttribute('class', 'Sapro935583');
		
		
		
///////////////////////////////////////
////////////////////////////////////// COLUMNS FOR WEEK 7

		for ($r=1;$r<=7;$r++){
			$row7->appendChild($Col[$r][5] = $cc->createElement('tr'));
			$Col[$r][5]->setAttribute('height', '25');
		}
		for ($c = 1; $c <= 7; $c++){
			If (isSet($cell_value_array[1][7][1])){
			$n = 1;
			$Col[$c][5]->appendChild($column[5][$n][$c] = $cc->createElement('td'));
			$column[5][$n][$c]->setAttribute('class','Sapro1165583');
			$column[5][$n][$c]->setAttribute('colspan', '2');
			$column[5][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
			$column[5][$n][$c]->setAttribute('height', '25');
			if ($c >= 5){
				$Col[$c][5]->setAttribute('style', 'display:none');
			}
			}else { $cell_array[1][$rowIndex][1]->setAttribute('style', 'display:none; border-left: 0'); $cell_array[1][$rowIndex][2]->setAttribute('style', 'display:none; border-right: 0'); }
			If (isSet($cell_value_array[2][7][1])){
			$n = 2;
			$Col[$c][5]->appendChild($column[5][$n][$c] = $cc->createElement('td'));
			$column[5][$n][$c]->setAttribute('class','Sapro1185583');
			$column[5][$n][$c]->setAttribute('colspan', '2');
			$column[5][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
			$column[5][$n][$c]->setAttribute('height', '25');
			if ($c >= 5){
				$Col[$c][5]->setAttribute('style', 'display:none');
			}
			}else { $cell_array[2][$rowIndex][1]->setAttribute('style', 'display:none; border-left: 0'); $cell_array[2][$rowIndex][2]->setAttribute('style', 'display:none; border-right: 0'); }
			If (isSet($cell_value_array[3][7][1])){
			$n = 3;
			$Col[$c][5]->appendChild($column[5][$n][$c] = $cc->createElement('td'));
			$column[5][$n][$c]->setAttribute('class','Sapro1185583');
			$column[5][$n][$c]->setAttribute('colspan', '2');
			$column[5][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
			$column[5][$n][$c]->setAttribute('height', '25');
			if ($c >= 5){
				$Col[$c][5]->setAttribute('style', 'display:none');
			}
			}else { $cell_array[3][$rowIndex][1]->setAttribute('style', 'display:none; border-left: 0'); $cell_array[3][$rowIndex][2]->setAttribute('style', 'display:none; border-right: 0'); }
			If (isSet($cell_value_array[4][7][1])){
			$n = 4;
			$Col[$c][5]->appendChild($column[5][$n][$c] = $cc->createElement('td'));
			$column[5][$n][$c]->setAttribute('class','Sapro1185583');
			$column[5][$n][$c]->setAttribute('colspan', '2');
			$column[5][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
			$column[5][$n][$c]->setAttribute('height', '25');
			if ($c >= 5){
				$Col[$c][5]->setAttribute('style', 'display:none');
			}
			}else { $cell_array[4][$rowIndex][1]->setAttribute('style', 'display:none; border-left: 0'); $cell_array[4][$rowIndex][2]->setAttribute('style', 'display:none; border-right: 0'); }
			If (isSet($cell_value_array[5][7][1])){
			$n = 5;
			$Col[$c][5]->appendChild($column[5][$n][$c] = $cc->createElement('td'));
			$column[5][$n][$c]->setAttribute('class','Sapro1185583');
			$column[5][$n][$c]->setAttribute('colspan', '2');
			$column[5][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
			$column[5][$n][$c]->setAttribute('height', '25');
			if ($c >= 5){
				$Col[$c][5]->setAttribute('style', 'display:none');
			}
			}else { $cell_array[5][$rowIndex][1]->setAttribute('style', 'display:none; border-left: 0'); $cell_array[5][$rowIndex][2]->setAttribute('style', 'display:none; border-right: 0'); }
			If (isSet($cell_value_array[6][7][1])){
			$n = 6;
			$Col[$c][5]->appendChild($column[5][$n][$c] = $cc->createElement('td'));
			$column[5][$n][$c]->setAttribute('class','Sapro1185583');
			$column[5][$n][$c]->setAttribute('colspan', '2');
			$column[5][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
			$column[5][$n][$c]->setAttribute('height', '25');
			if ($c >= 5){
				$Col[$c][5]->setAttribute('style', 'display:none');
			}
			}else { $cell_array[6][$rowIndex][1]->setAttribute('style', 'display:none; border-left: 0'); $cell_array[6][$rowIndex][2]->setAttribute('style', 'display:none; border-right: 0'); }
			If (isSet($cell_value_array[7][7][1])){
			$n = 7;
			$Col[$c][5]->appendChild($column[5][$n][$c] = $cc->createElement('td'));
			$column[5][$n][$c]->setAttribute('class','Sapro1145583');
			$column[5][$n][$c]->setAttribute('colspan', '2');
			$column[5][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px; width: 68pt; border-right: 1.5pt solid rgb(58, 98, 147);');
			$column[5][$n][$c]->setAttribute('height', '25');
			if ($c >= 5){
				$Col[$c][5]->setAttribute('style', 'display:none');
			}
			}else { $cell_array[7][$rowIndex][1]->setAttribute('style', 'display:none; border-left: 0'); $cell_array[7][$rowIndex][2]->setAttribute('style', 'display:none; border-right: 0');  }
		}
		
		
	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////  ROW 7 week 4
	/////////////  SUNDAY 30
	if (isSet($cell_value_array[8][7][1])){
		$ccTable->appendChild($row8 = $cc->createElement('tr'));
		$row8->setAttribute('height', 20);

		$row8->appendChild($cell_array[1][8][1] = $cc->createElement('td', $throwAway = (isSet($cell_value_array[8][7][1]))? $cell_value_array[8][7][1] : '&nbsp;'));
		$cell_array[1][8][1]->setAttribute('id', $fMonth.'_'.str_replace(")","", $cell_value_array[$day][$rowIndex][1]).'_'.$fYear);
		$cell_array[1][8][1]->setAttribute('class', 'Sapro945583');
		$cell_array[1][8][1]->setAttribute('style', 'height: 15pt; width: 170pt;');
		$cell_array[1][8][1]->setAttribute('height', '30');

		$row8->appendChild($cell_array[1][8][2] = $cc->createElement('td', $row8_cel1_2 = (isSet($cel1_2_8val1))? $cel1_2_8val1 : ''));
		$cell_array[1][8][2]->setAttribute('class', 'Sapro955583');
		$cell_array[1][8][2]->setAttribute('wordwrap', 'wordwrap');
		$cell_array[1][8][2]->setAttribute('height', '30');
	}

	/////////////////////////////////////////////////////////////////////////////
	/////////////  MONDAY 31

	if (isSet($cell_value_array[9][7][1])){

		$row8->appendChild($cell_array[2][8][1] = $cc->createElement('td', $throwAway = (isSet($cell_value_array[9][7][1]))? $cell_value_array[9][7][1] : '&nbsp;'));
		$cell_array[2][8][1]->setAttribute('id', $fMonth.'_'.++$fDate.'_'.$fYear);
		$cell_array[2][8][1]->setAttribute('class', 'Sapro905583');
		$cell_array[2][8][1]->setAttribute('wordwrap', 'wordwrap');
		$cell_array[2][8][1]->setAttribute('height', '30');

		$row8->appendChild($cell_array[2][8][2] = $cc->createElement('td', $row8_cel37_2_8 = (isSet($cel2_2_8val1))? $cel2_2_8val1 : '&nbsp;'));
		$cell_array[2][8][2]->setAttribute('class', 'Sapro915583');
		$cell_array[2][8][2]->setAttribute('wordwrap', 'wordwrap');
		$cell_array[2][8][2]->setAttribute('height', '30');
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////  Colomns to insert data ///////////////// Week 5 Colomns Row 1
	
		

		/////////////////////////////////////////////////////////////////////////////////////////////////////////
		//   COL ROW 8
		if (isSet($cell_value_array[8][7][1])){
			for ($r=1;$r<=7;$r++){
				$row8->appendChild($Col[$r][6] = $cc->createElement('tr'));
				$Col[$r][6]->setAttribute('height', '25');
			}
			for ($c = 1; $c <= 7; $c++){
				$n = 1;
				$Col[$c][6]->appendChild($column[6][$n][$c] = $cc->createElement('td'));
				$column[6][$n][$c]->setAttribute('class','Sapro1165583');
				$column[6][$n][$c]->setAttribute('colspan', '2');
				$column[6][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
				$column[6][$n][$c]->setAttribute('height', '25');
				if ($c >= 5){
					$Col[$c][6]->setAttribute('style', 'display:none');
				}
				
		     if (isSet($cell_value_array[9][7][1])){
				$n = 2;
				$Col[$c][6]->appendChild($column[6][$n][$c] = $cc->createElement('td'));
				$column[6][$n][$c]->setAttribute('class','Sapro1185583');
				$column[6][$n][$c]->setAttribute('colspan', '2');
				$column[6][$n][$c]->setAttribute('style', 'height: 12.75pt; width: 170px;');
				$column[6][$n][$c]->setAttribute('height', '25');
				if ($c >= 5){
					$Col[$c][6]->setAttribute('style', 'display:none');
				}			
			}
			}
		}

	////////////////////////////////////////////////////////////////////////////////////////////////////////



	require "myCalendarInsert.php";

//echo "</div>"; // CLOSES OFF PrintGlance

	echo $cc->saveHTML();

//echo '</BODY>';
//	echo '</HTML>';

	?>