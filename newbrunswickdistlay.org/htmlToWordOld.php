<?php 


$month = $_GET['month'];
$year = $_GET['year'];

include "PDO/connect.php";
require_once 'vendor/phpoffice/phpword/bootstrap.php';
require_once 'vendor/autoload.php';

// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

$sectionStyle = array(
                      'marginLeft'    => 200,
                      'marginRight'   => 0,
                      'marginTop'     => 0,
                      'marginBottom'  => 0
                      );

$section = $phpWord->addSection($sectionStyle);
$Head = $section->addHeader();
$tRun = $Head->addTextRun();
$tRun->addImage(
    'images/nb_district_lay_newsletter_-_december_2015_-_final_img_109.png',
    array(
        'width'         => 50,
        'height'        => 50,
        'marginTop'     => -1,
        'marginLeft'    => -1,
        'wrappingStyle' => 'inline'
    )
);
$tRun->addText("NEW BRUNSWICK DISTRICT LAY - CHURCHES SPECIAL EVENTS", array('size'=>10, 'bold'=>true, 'italic'=>true), array('keepNext'=>true));

$tRun->addImage(
    'images/nb_district_lay_newsletter_-_december_2015_-_final_img_110.png',
    array(
        'width'         => 50,
        'height'        => 50,
        'marginTop'     => -1,
        'marginLeft'    => -1,
        'wrappingStyle' => 'inline',
        'float'         => 'left'
    )
);
///////////////////////////////////////////////////////////////////// END HEADER
$tableStyle = array(
    'borderColor' => '006699',
    'borderSize'  => 6,
    'cellMargin'  => 50,
    'padding'     => '15px'
);
$firstRowStyle = array('bgColor' => '000000');
$styleCell = array('valign'=>'center','bgColor' => '000000', 'width'=>100);
$phpWord->addTableStyle('Month & Year', $tableStyle);
$table = $section->addTable('Month & Year');
$table->addRow();
//$pageNum = (string)$section->getStyle()->setPageNumberingStart(1);
$cell = $table->addCell(3000, $styleCell)->addText($month.' '.$year , array('size'=>16, 'bold'=>true, 'color'=>'FFFFFF', 'name'=>'Bookman Old', 'valign'=>'bottom') );

$phpWord->addTableStyle('myCalendar', $tableStyle);
$table = $section->addTable('myCalendar');
$table->addRow();
$for = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
$styleCell = array('bgColor' => '0070c0');
foreach ($for as $val){
  $cell = $table->addCell(1500, $styleCell)->addText($val, array('size'=>12, 'bold'=>true, 'color'=>'FFFFFF', 'name'=>'Times New Roman','valign'=>'bottom') );
}
//$table->addRow();
$firstDay = date('N', strtotime("first day of $month $year"));
$lastDay = date('N', strtotime("last day of $month $year"));
$mo =  date('m', strtotime("$month"));
$st = $db->prepare("SELECT * FROM nbdl_eventCalendar_copy WHERE date LIKE '%$year-$mo-%' ORDER BY date");
$st->execute();
$rows = $st->fetchALL();
$eventData = [];
//foreach ($rows as $data){
//  error_log(substr($data['date'], -2));
//}
//$cell = $table->addCell(1500)->addText( "This is the first Monday of $month= $firstMonday");
$seq = 0;
$format = 1;
$start = 1;
$answer = is_int($firstDay);
error_log("this is the first day= $lastDay is int=$answer" );
//foreach ($rows as $data){
//  error_log(substr($data['date'], -2));
//}
$iStyle = array(
        'width'         => 50,
        'height'        => 50,
        'marginTop'     => -1,
        'marginLeft'    => -1,
        'wrappingStyle' => 'inline'
      );

for($i=1;$i<=6;$i++){  //////////////////////////////////////////////////// 6 calendar rows.  
  $table->addRow();
  foreach($for as $val){ /////////////////////////////////////////////////  7 calendar columns.
    $cell = $table->addCell(1500);
    $cell = $cell->addTextRun();
    if($format > $firstDay){
      if($start > $lastDay){
	return;
      }
      $cell->addText($start.'</w:t><w:br/><w:t>', array('size'=>11, 'bold'=>true, 'color'=>'000000', 'name'=>'Times New Roman','valign'=>'bottom'));
      //$cell->addText('the last date= '.$lastDay.'</w:t><w:br/><w:t>', array('size'=>10, 'color'=>'000000', 'name'=>'Times New Roman','valign'=>'bottom'));
      $start++;
    }else{
      $cell->addText('</w:t><w:br/><w:t>', array('size'=>11, 'bold'=>true, 'color'=>'000000', 'name'=>'Times New Roman','valign'=>'bottom'));
      //$cell->addText('COLDDDDDD</w:t><w:br/><w:t>', array('size'=>10, 'color'=>'000000', 'name'=>'Times New Roman','valign'=>'bottom'));
    }
    $format++;
  }
}

// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('files/calendars/NB_District_Lay-Churches_'.$month.' '.$year.' Calendar.docx');

// Saving the document as ODF file...
//$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
//$objWriter->save('files/calendars/NB_District_Lay-Churches_'.$month.' '.$year.' Calendar.odt');

// Saving the document as HTML file...
//$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
//$objWriter->save('helloWorld.html');

/* Note: we skip RTF, because it's not XML-based and requires a different example. */
/* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */





?>