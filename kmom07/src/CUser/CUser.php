<?php 

    class CUser{ 
        
        //If you hit the loggin button the SQL code will be tested against the database 
        public function loggedIn(){ 
            $logginSql = " "; 
            $params = array(); 
            if(isset($_POST['doLogin'])){ 
                $logginSql = "SELECT acronym FROM USER WHERE acronym = ? AND password = md5(concat(?,salt))"; 
                $params[] = $_POST['acronym']; 
                $params[] = $_POST['password']; 
            } 
            return array($logginSql, $params); 
        }         
} 

