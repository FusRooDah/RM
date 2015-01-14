<?php   
include(__DIR__.'/config.php'); 

$FRD['title'] = 'Logga in';
$FRD['main'] = "<h3>Logga in här</h3>"; 
$FRD['main'] .= <<<EOD
        <form method='POST'> 
        <fieldset> 
            <p> 
                Username: <input type='text' name='acronym'> 
            </p> 
            <p> 
                Password:  
                <input type='password' name='password'> 
            </p> 
            <p> 
                <input type='submit' name='doLogin' value='Logga in'> 
            </p> 
        </fieldset></form> 
EOD;

$db = $FRD['database']; 
$inlogg = new CUser(); 

$sql = $inlogg->loggedIn(); 

$result = $db->executeSelectQueryAndFetchAll($sql[0], $sql[1]); 
if(isset($_POST['doLogin'])){ 

    if(isset($result[0])){ 
        $_SESSION['user'] = $result[0]; 
        header('Location: content.php'); 
    } 
} 

include(FRD_THEME_PATH); 
?> 