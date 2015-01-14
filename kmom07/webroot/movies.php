<?php  
include(__DIR__.'/config.php');

$FRD['title'] = "Filmer";

$db = $FRD['database'];
$user = new CUser($db);
$movietable = new CMovieTable($db);
$user = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

$id = isset($_GET['id']) ? $_GET['id'] : null;
$genre = isset($_GET['genre']) ? $_GET['genre'] : null;
$search = isset($_GET['search']) ? $_GET['search'] : null;


$FRD['main'] = "<article>";
$FRD['main'] = "<div id='genre'>
				<p>
				<a href='movies.php?genre=Action'>Action</a><span> | </span><a href='movies.php?genre=Adventure'>Adventure</a><span> | </span><a href='movies.php?genre=Sci-Fi'>Sci-Fi</a>
				<span> | </span><a href='movies.php?genre=Crime'>Crime</a><span> | </span><a href='movies.php?genre=Thriller'>Thriller</a><span> | </span><a href='movies.php?genre=Drama'>Drama</a>
				<span> | </span><a href='movies.php?genre=Mystery'>Mystery</a><span> | </span><a href='movies.php?genre=Fantasy'>Fantasy</a>
				</p>
				</div>";
	$FRD['main'] .= $movietable->generateTable();



$FRD['main'] .= "</article>";

include(FRD_THEME_PATH);