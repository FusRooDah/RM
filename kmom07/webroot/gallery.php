<?php
include(__DIR__ . '/config.php');
$FRD['title'] = "Gallery";

$gallery = new CGallery('img');
$gallery->loadStylesheets();

$path = isset($_GET['path']) ? $_GET['path'] : null;
$path = "{$gallery->getBaseDir()}/{$path}";

$FRD['main'] = '<h3>Galleri</h3>';
$FRD['main'] .= $gallery->createBreadcrumb($path);
if(is_file($path)){
    $FRD['main'] .= $gallery->readItem($path);
}else{
    $FRD['main'] .= $gallery->readAllItemsInDir($path);
}
include(FRD_THEME_PATH); 