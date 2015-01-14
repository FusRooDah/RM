<?php 
include(__DIR__.'/config.php'); 
$FRD['title'] = "Film editering"; 

$db = $FRD['database'];
$movie = new CMovie($db);

$FRD['main'] = $movie->createNew(); 
$save = isset($_POST['save']) ? true : false; 

if($save==true){ 
    $FRD['main'] .=$movie->saveNew(); 
    $FRD['main'] .="<a href='content.php'>Tillbaka</a>"; 
} 

include(FRD_THEME_PATH); 