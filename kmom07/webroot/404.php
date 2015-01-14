<?php 
/**
 * This is a FRD pagecontroller.
 *
 */
// Include the essential config-file which also creates the $FRD variable with its defaults.
include(__DIR__.'/config.php'); 



// Do it and store it all in variables in the FRD container.
$FRD['title'] = "404";
$FRD['header'] = "";
$FRD['main'] = "This is a Frd 404. Document is not here.";
$FRD['footer'] = "";

// Send the 404 header 
header("HTTP/1.0 404 Not Found");


// Finally, leave it all to the rendering phase of FRD.
include(FRD_THEME_PATH);
