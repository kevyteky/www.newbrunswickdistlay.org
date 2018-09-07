<?php 


$month = $_GET['month'];
$year = $_GET['year'];

include "PDO/connect.php";
require_once 'vendor/phpoffice/phpword/bootstrap.php';
require_once 'vendor/autoload.php';


// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

$sectionStyle = array(
                      'marginLeft'    => 100,
                      'marginRight'   => 100,
                      'marginTop'     => 0,
                      'marginBottom'  => 0
                      );

$tableStyle = array(
    'width'       => 67 * 50,
    'unit'        => 'pct',
    'align'       => 'center',
    'cellMarginLeft'  => 10,
    'cellMarginRight'  => 10,
);

$section = $phpWord->addSection($sectionStyle);
$Head = $section->addHeader();
$table = $Head->addTable($tableStyle);
$table->addRow();
$cell = $table->addCell(1000);
$tRun = $cell->addTextRun();
$tRun->addImage(
    'images/nb_district_lay_newsletter_-_december_2015_-_final_img_109.png',
    array(
        'width'         => 50,
        'height'        => 50,
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
    )
);


/*
$tRun = $Head->addTextRun();
$tRun->addImage(
    'images/nb_district_lay_newsletter_-_december_2015_-_final_img_109.png',
    array(
        'width'         => 50,
        'height'        => 50,
        'marginTop'     => -1,
        'marginLeft'    => 1000,
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
*/
///////////////////////////////////////////////////////////////////// END HEADER

$title = $section->addTextBox(array('width'=>250, 'height'=>40,'borderSize'=>2,'borderColor'=>'000000','align'=>'left','wrappingStyle' => 'infront'));
$title->addTable(array('borderSize'=>5,'borderColor' => '000000','align'=>'center','cellMarginLeft'=>600))->addRow()->addCell(3500,array('bgColor'=>'000000','valign'=>'center'))->addText($month.' '.$year, array('name'=>'Bookman Old','color'=>'FFFFFF','bold'=>true,'size'=>16)); 

//$fields = $section->addField($month.' '.$year , array('size'=>16, 'bold'=>true, 'color'=>'#FFFFFF', 'name'=>'Bookman Old'), array('PreserveFormat'));

$tableStyle = array(
    'width'       => 20 * 20,
    'unit'        => 'pct',
    'borderColor' => '#000000',
    'borderSize'  => 100,
    'cellMarginLeft'  => 100,
    'padding'     => '50px',
    'marginLeft'  => 100,
    'marginRight#' => -10
);
/*
$styleCell = array('valign'=>'center','bgColor' => '#FFFFFF');
//$phpWord->addTableStyle($tableStyle);
$table = $section->addTable($tableStyle);
$table->addRow();
$cell = $table->addCell(3500, $styleCell)->addText($month.' '.$year , array('size'=>16, 'bold'=>true, 'color'=>'#000000', 'name'=>'Bookman Old') );
*/
////////////////////////////////////////////////////////////////////////// END Calender Label
$tableStyle = array(
    'unit'        => \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT,
    'width'       => 100 * 50,
    'align#'       => 'center',
    'borderColor' => '#000000',
    'borderSize'  => 10,
    'cellMarginLeft'  => 100,
);
//$phpWord->addTableStyle('myCalendar');
$table_style = new \PhpOffice\PhpWord\Style\Table;
$table_style->setBorderColor('000000');
$table_style->setBorderSize(1);
$table_style->setUnit(\PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT);
$table_style->setWidth(100 * 50);
$table = $section->addTable($table_style);
$table->addRow();
$for = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
$styleCell = array('bgColor' => '#0070c0', 'borderLeftColor'=>'#000000','valign'=>'center');
foreach ($for as $val){
  $cell = $table->addCell(1500, $styleCell)->addText($val, array('size'=>12, 'bold'=>true, 'color'=>'#000000', 'name'=>'Times New Roman') );
}
$firstDay = date('w', strtotime("first day of $month $year"));
$lastDay = date('t', strtotime("last day of $month $year"));
$mo =  date('m', strtotime("$month"));
$st = $db->prepare("SELECT * FROM nbdl_eventCalendar_copy WHERE date LIKE '%$year-$mo-%' ORDER BY date");
$st->execute();
$rows = $st->fetchALL();
//$cell = $table->addCell(1500)->addText( "This is the first Monday of $month= $firstMonday");
$seq = 0;
$format = 0;
$start = 1;
$answer = is_int($firstDay);
error_log("this is the first day= $firstDay is int=$answer" );
$styleCell = array('valign' => 'top','bgcolor' =>'#DBE5F1',);
$cellStyle = array('size'=>10,'name'=>'Ariel Narrow');
for($i=1;$i<=6;$i++){  //////////////////////////////////////////////////// 6 calendar rows.  
  if($lastDay <= $start){
	break;
    }
  $table->addRow();
  foreach($for as $val){ /////////////////////////////////////////////////  7 calendar columns.
    $cell = $table->addCell(1500, $styleCell);
    $cell = $cell->addTextRun();
    if($format >= $firstDay){
      if($lastDay <= $start){
	break;
      }
      $chk = date("d", strtotime("$year-$mo-$start"));
      $st = $db->prepare("SELECT * FROM nbdl_eventCalendar WHERE date LIKE '%$year-$mo-$chk%' ORDER BY date");
      //error_log("SELECT event, type, attachment FROM nbdl_eventCalendar_copy WHERE date LIKE '%$year-$mo-$chk%' ORDER BY date");
      $st->execute();
      $rows = $st->fetchALL();
      $cell->addText($start.'</w:t><w:br/><w:t>', array('size'=>11, 'bold'=>true, 'color'=>'000000', 'name'=>'Times New Roman'));
      foreach ($rows as $val){
        if (isSet($val['event'])){
          $ev = $val['event'];///////////////////////////////////////////////////////////////  Here we need to remove <brackets> which we'll use to formate the Event on calendar
	  $ev = str_replace('<br/>', ' ', $ev); $ev = str_replace('\"', '"', $ev); $ev = str_replace('\"', '"', $ev); 
          if (strpos($ev, '<cbl>') === false){ }else{ $cellStyle['color'] = '#0070C0'; }
	  if (strpos($ev, '<cb>') === false){ }else{ $cellStyle['color'] = '#000000'; }
	  if (strpos($ev, '<b>') === false){ $cellStyle['bold'] = false ;  }else{ $cellStyle['bold'] = true ; }
	  if (strpos($ev, '<i>') === false){ $cellStyle['italic'] = false ; }else{ $cellStyle['italic'] = true ; }
	  if (strpos($ev, '<u>') === false){ $cellStyle['underline'] = true ; }else{ $cellStyle['underline'] = true ;}
          foreach($cellStyle as $key => $value){
	    //error_log("This is of $ev style key= $key & value= $value");
	  }
          $ev = strip_tags($ev);
          $ev = str_replace('&', '&amp;', $ev); $ev = str_replace('<', '&lt;', $ev); $ev = str_replace('>', '&gt;', $ev); $ev = str_replace('"', '&quot;', $ev); $ev = str_replace("'", "&apos;", $ev);
          //error_log("this is the new event= $ev");
          if(strpos($ev, 'rF#=') === false){ 
            $cell->addText($ev.'</w:t><w:br/><w:t>', $cellStyle);
	  }else{
	    $cell->addText('</w:t><w:br/><w:t>', $cellStyle);
	  }
          if (isSet($val['type'])){
            //error_log("this is the type= ".$val['type']);
            if(strpos($val['type'], '<a download') === false){
              //$c = $val['type'];
              $c = $val['attachment'];
	      $object = "http://www.newbrunswickdistlay.org/images/$c";
	      $cell->addImage('images/'.$val['type'].'.png', array( 'width'=> 25,'height'=> 25,'marginTop' => -1,'marginLeft'=> -1,'wrappingStyle' => 'inline'));
	      $cell->addText('</w:t><w:br/><w:t>', $cellStyle);
	      $cell->addLink($object, $val['attachment'], array('size'=>8, 'underline'=>true, 'color'=>'#000000', 'name'=>'Bookman Old'));
	      $cell->addText('</w:t><w:br/><w:t>', $cellStyle);
              /*
	      if($val['type'] == 'pdf'){
                $c = $val['attachment'];
		$object = "http://www.newbrunswickdistlay.org/images/$c";
		$cell->addImage('images/'.$val['type'].'.png', array( 'width'=> 25,'height'=> 25,'marginTop' => -1,'marginLeft'=> -1,'wrappingStyle' => 'inline'));
                $cell->addText('<w:br/>', $cellStyle);
                $cell->addLink($object, $val['attachment'], array('size'=>9, 'underline'=>true, 'color'=>'#000000', 'name'=>'Bookman Old'));
	      }else{
		$c = $val['attachment'];
		//error_log($c);
		error_log($object = __DIR__ ."/images/$c");
		$cell->addObject($object, array( 'size'=> 5,'height'=>5,'backgroundcolor'=>'#DBE5F1'));
	      }
              */
	    }else{
	      $c = $val['type'];
	      $test = preg_match("/<a download='\s*(.*?)\s*'/i", $c, $matches);
              //error_log($matches[1]);
              $object = "http://www.newbrunswickdistlay.org/images/$matches[1]";
              //$cell->addText('<w:br/>', $cellStyle);
              $cell->addImage('images/'.$matches[1], array( 'width'=> 50,'height'=> 50,'marginTop' => -1,'marginLeft'=> -1,'wrappingStyle' => 'inline'));
              $cell->addText('</w:t><w:br/><w:t>', $cellStyle);
	      $cell->addLink($object, $matches[1], array('size'=>8, 'underline'=>true, 'color'=>'#000000', 'name'=>'Bookman Old'));
              $cell->addText('</w:t><w:br/><w:t>', $cellStyle);
	    }
	  }
	}else{
	  $cell->addText($start.'</w:t><w:br/><w:t>', array('size'=>11, 'bold'=>true, 'color'=>'000000', 'name'=>'Times New Roman','valign'=>'bottom'));
	  $cell->addText('</w:t><w:br/><w:t>', array('size'=>10, 'color'=>'000000', 'name'=>'Times New Roman','valign'=>'bottom','bold'=>false));
	}
      }
      $start++;
    }else{
      $cell->addText('</w:t><w:br/><w:t>', array('size'=>10));
      $cell->addText('</w:t><w:br/><w:t>', array('size'=>10));
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