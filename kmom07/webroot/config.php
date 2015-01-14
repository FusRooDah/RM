<?php

error_reporting(-1);             
ini_set('display_errors', 1);     
ini_set('output_buffering', 0);   

define('FRD_INSTALL_PATH', __DIR__ . '/..');
define('FRD_THEME_PATH', FRD_INSTALL_PATH . '/theme/render.php');


include(FRD_INSTALL_PATH . '/src/bootstrap.php');

session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();

$FRD = array();
$user = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

$FRD['database'] = new CDatabase(array(
	'dsn'		=>	'mysql:host=blu-ray.student.bth.se;dbname=kepa14;',
	'username'	=>	'kepa14',
	'password'	=>	't#[hn3=F',
	'options'	=>	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"),
));

$FRD['lang']         = 'sv';
$FRD['title_append'] = ' | RM';



if($user){
	$FRD["menu"] = array(
	'Startsida'  => array('text'=>'Startsida',  'url'=>'index.php'),
	'Filmer' => array('text'=>'Filmer', 'url'=>'movies.php'),
	'Nyheter' => array('text' =>'Nyheter', 'url'=>'content.php'),
  	'Information' => array('text'=>'Information', 'url'=>'info.php'),
	'Logout' => array('text' =>'Logout', 'url'=>'logout.php'),
	'Admin' => array('text' =>'Admin', 'url'=>'admin.php'),
);}

else{
	$FRD["menu"] = array(
	'Startsida'  => array('text'=>'Startsida',  'url'=>'index.php'),
	'Filmer' => array('text'=>'Filmer', 'url'=>'movies.php'),
	'Nyheter' => array('text' =>'Nyheter', 'url'=>'content.php'),
  	'Information' => array('text'=>'Information', 'url'=>'info.php'),
	'Login' => array('text' =>'Login', 'url'=>'login.php'),
);}


$FRD['header'] = <<<EOD
<h1 id="headerFont">RM movie rental</h1>
<img id="floatright" src="img/film.png">

<form id="right" action="movies.php">
<label>
<input type="text" name="search" placeholder="Search">
</label>
</form>
EOD;

$FRD['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) RM Movie Rental | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;

$FRD['stylesheets'] = array('css/style.css');
$FRD['favicon']    = 'favicon.ico';

$FRD['modernizr'] = 'js/modernizr.js';
$FRD['jquery'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
$FRD['javascript_include'] = array();

$FRD['google_analytics'] = 'UA-22093351-1';