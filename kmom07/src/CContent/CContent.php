<?php
    
    class CContent{
        /**
        * Memberstuff
        */
        private $db = null;

        public function __construct($db){
            $this->db = $db;
        }

      public function showAllContent(){
            $sql = $this->getSQL();
            $result = $this->db->executeSelectQueryAndFetchAll($sql);
            $html = "<h1>Nyhetsflöde</h1><ul>";
            $id = isset($_GET['id']) ? $_GET['id'] : null;

            if($id){
                foreach($result as $val){
                    $html .= "<div id='news'>";
                    $html .= "<h1>{$val->title}</h1>";
                    $html .= "<p>{$val->text}</p>";
                    $html .= "<p>{$val->kategory}</p>";
                    $html .= "<p>{$val->created}</p>";
                    $html .= "<p><a href='content.php'>Tillbaka</a>";
                }
            }else{
            foreach($result AS $val){
                $text = htmlentities($val->text, null, 'UTF-8');
                $html .= "<li><div id='news'>";
                $html .= "<h1 id='link'><a href='content.php?id={$val->id}'>{$val->title}</a></h1>";
                if(strlen($text) > 25){
                    $info = substr($text,0,25);
                    $info .= "...";
                }
                $html .= "<p>$info <a href='content.php?id={$val->id}'>Läs mer --></a></p>";
                $html .= "<p>{$val->kategory}</p>";
                $html .= "<p>{$val->created}</p>";
                if(isset($_SESSION['user'])){
                $html .= " <a href='edit.php?id={$val->id}'>Editera</a>";
            }
                $html .= "</div>";     
                $html .= "</li>";
            }
                $html .= '</ul>';
            }
            return $html;
        }

       public function editForm($id,$db){ 
            $sql = 'SELECT * FROM ProjektContent WHERE id = ?'; 
            $res = $db->ExecuteSelectQueryAndFetchAll($sql, array($id)); 
            if(isset($res[0])) { 
            $c = $res[0]; 
            }else { 
                die('Misslyckades: Finns inget sådant ID'); 
            } 
            $title  = htmlentities($c->title, null, 'UTF-8'); 
            $text   = htmlentities($c->text, null, 'UTF-8');
            $kategory = htmlentities($c->kategory, null, 'UTF-8');
            $created = htmlentities($c->created, null, 'UTF-8');
             
            $html= "<form method=post> 
                        <fieldset> 
                            <legend>Uppdatera innehåll</legend> 
                            <input type='hidden' name='id' value='{$id}'/> 
                            <p><label>Titel:<br/><input type='text' name='title' value='{$title}'/></label></p> 
                            <p><label>Text:<br/><input type='text' name='text' value='{$text}'/></label></p>
                            <p><label>Kategory:<br/><input type='text' name='kategory' value='{$kategory}'/></label></p>
                            <p><label>Datumupdaterad:<br/><input type='text' name='created' value='{$created}'/></label></p>
                            <p class=buttons><input type='submit' name='save' value='Spara'/> <input type='reset' value='Återställ'/></p> 
                            <p><a href='content.php'>Visa alla</a></p> 
                        </fieldset> 
                     </form>"; 
                return $html; 
        }

        public function saveEdit($id, $db){
            if(isset($_POST['save']))
            if(isset($_POST['id']) && is_numeric($_POST['id'])) $id = $_POST['id']; else $id = null;
            $title  = isset($_POST['title']) ? $_POST['title'] : null;
            $text   = isset($_POST['text'])  ? $_POST['text'] : array();
            $created = isset($_POST['created'])  ? strip_tags($_POST['created']) : array();
            $save   = isset($_POST['save'])  ? true : false;

            $sql = "UPDATE ProjektContent SET title = ?, text = ?, created = NOW() WHERE id = {$id}"; 
            
                $params = array($title, $text); 
                $res = $db->ExecuteQuery($sql, $params); 
                if($res) { 
                    $html = 'Informationen sparades.'; 
                    header('Location: content.php');
                } 
                else { 
                    $html = 'Informationen sparades EJ.<br><pre>' . print_r($db->ErrorInfo(), 1) . '</pre>'; 
                } 
                 
                return $html;
    }

    public function createNew(){  
              
            $output= "<form method=post>  
                <fieldset>  
                <legend>Skapa nytt innehåll</legend>  
                <p><label>Titel:<br/><input type='text' name='title' value=''/></label></p>  
                <p><label>Text:<br/><input type='text' name='text' value=''/></label></p>
                <p class=buttons><input type='submit' name='save' value='Skapa'/>  
                <p><a href='content.php'>Visa alla</a></p>  
                </fieldset>  
                </form>  
                ";  

                return $output;  
        }  
          
         /**   
         * saveEdit saves all the information from showCreate.  
         */   
        public function saveNew(){  
            $title  = isset($_POST['title']) ? $_POST['title'] : null;  
            $text   = isset($_POST['text'])  ? $_POST['text'] : array();  
              
             $sql = '  
                INSERT INTO ProjektContent (title, text, created)  
                VALUES (?,?,NOW())'; 
                  
                $params = array($title, $text);  
                $res = $this->db->ExecuteQuery($sql, $params);  
                if($res) {  
                    $output = 'Informationen sparades.';  
                }  
                else {  
                    $output = 'Informationen sparades EJ.<br><pre>' . print_r($this->db->ErrorInfo(), 1) . '</pre>';  
                }  
                  
                return $output;  

        }

        public function getSQL(){
            $sql = "SELECT * FROM ProjektContent ";
            $id = isset($_GET['id']) ? $_GET['id'] : null;

            if($id){
                $sql .= "WHERE id LIKE $id";
            }
            return $sql;
        }

    
}