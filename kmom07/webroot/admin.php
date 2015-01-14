<?php 
include(__DIR__.'/config.php'); 
$FRD['title'] = "Admin";

$db = $FRD['database'];
$user = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

$FRD['main'] = "<article>";
if($user){
	$FRD['main'] .= "<p><a href='create.php'>Ny nyhet</a></p>";
	$FRD['main'] .= "<p><a href='createMovie.php'>Ny film</a></p>";
	$FRD['main'] .= "<a href='logout.php'>Logga ut här</a>";
}else{
	$FRD['main'] .= "Du måste logga in för att få ändra saker";
}

$FRD['main'] .= "</article>";
include(FRD_THEME_PATH); 