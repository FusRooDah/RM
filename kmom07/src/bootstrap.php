<?php

function myExceptionHandler($exception) {
  echo "FRD: Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');

function myAutoloader($class) {
  $path = FRD_INSTALL_PATH . "/src/{$class}/{$class}.php";
  if(is_file($path)) {
    include($path);
  }
}
spl_autoload_register('myAutoloader');



function dump($a) {
  echo '<pre>' . htmlentities(print_r($a, 1)) . '</pre>';
}

