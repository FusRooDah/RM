<?php    
include(__DIR__.'/config.php');    
$FRD['title'] = "Nyheter"; 

$db = $FRD['database'];
$content = new CContent($db);
$user = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

$FRD['main'] = "<article>";
$FRD['main'] .= $content->showAllContent($db);
$FRD['main'] .= "</article>";

include(FRD_THEME_PATH);