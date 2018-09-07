<?PHP
include 'Classes.php';

$p = str_replace('+',' ', $_GET['page']);
$path = './files';

$objs = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);

foreach($objs as $name => $object){
    $TorF = endsWith($name, $p); 
    if ($TorF === TRUE){
        $p = str_replace('./files\\','', $name);
    }
}

if (isSet($_GET['show'])){
    echo '<embed src="http://newbrunswickdistlay.org/'.$p.'" width="100%" height="100%" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">';
    echo '<br/>';
} elseif (isSet($_GET['download'])){
    Header("Content-type: application/octet-stream"); 
    Header("Content-type: application/pdf"); 
    Header("Content-Disposition: attachment; filename=$p"); 
    readfile($p);
    exit();
} elseif (isSet($_GET['forward'])){
    echo "<script>javascript:window.open('forward.php?attachment=".$p."', 'nbdl Newsletter', 'width=550,height=175')</script>";
    echo "<script>window.close();</script>";
}



echo '<br/>';

/*
echo '<iframe src="http://newbrunswickdistlay.org/files/'.$p.'.pdf" 
style="width:100%; height:500px;" frameborder="0"></iframe>';
*/









?>