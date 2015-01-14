<?php 
include(__DIR__.'/config.php'); 
$FRD['title'] = "Skapa ny content"; 

$db = $FRD['database']; 
$content = new CContent($db); 

$FRD['main'] = $content->createNew(); 
$save = isset($_POST['save']) ? true : false; 

if($save==true){ 
    $FRD['main'] .=$content->saveNew(); 
    $FRD['main'] .="<a href='content.php'>Tillbaka</a>"; 
} 

include(FRD_THEME_PATH); 