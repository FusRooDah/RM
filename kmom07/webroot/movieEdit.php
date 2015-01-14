<?php 
include(__DIR__.'/config.php'); 
$FRD['title'] = "Edit";

$db = $FRD['database'];
$movie = new CMovie($db);

if(isset($_SESSION['user'])){
if(isset($_GET['id'])){
$id = $_GET['id'];
}
}else{
isset($_SESSION['user']) or die('Check: You must login to edit.'); 
is_numeric($id) or die('Check: Id must be numeric.'); 
}

$FRD['main'] = $movie->editForm($id,$db);
$save = isset($_POST['save']) ? true : false;
if($save == true){
	$FRD['main'] = $movie->saveEdit($id, $db);
}
include(FRD_THEME_PATH); 