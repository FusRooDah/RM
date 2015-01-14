<?php  

include(__DIR__.'/config.php');  

$FRD['title'] = "Startsida"; 

$FRD['main'] = <<<EOD
<article>
<h1>Startsida</h1>
<p>Välkommen till RM movie rentals.
</p>
</article>
EOD;

include(FRD_THEME_PATH); 
