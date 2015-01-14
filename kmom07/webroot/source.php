<?php
include(__DIR__.'/config.php'); 


$FRD['stylesheets'][] = 'css/source.css';


//$source = new CSource();
$source = new CSource(array('secure_dir' => '..', 'base_dir' => '..'));


$FRD['title'] = "Visa källkod";

$FRD['main'] = "<h1>Visa källkod</h1>\n" . $source->View();


include(FRD_THEME_PATH);
