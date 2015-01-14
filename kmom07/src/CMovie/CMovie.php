<?php
    class CMovie{
    private $db = null;

    public function __construct($db){
        $this->db = $db;
    }
    public function editForm($id,$db){ 
            $sql = 'SELECT * FROM ProjektMovie WHERE id = ?'; 
            $res = $db->executeSelectQueryAndFetchAll($sql, array($id)); 
            if(isset($res[0])) { 
            $c = $res[0]; 
            }else { 
                die('Misslyckades: Finns inget sådant ID'); 
            }
            $title = htmlentities($c->title, null, 'UTF-8');
            $year = htmlentities($c->year, null, 'UTF-8');
            $image = htmlentities($c->image, null, 'UTF-8');
            $pris = htmlentities($c->pris, null, 'UTF-8');
            $infotext = htmlentities($c->infotext, null, 'UTF-8');
            $youtube = htmlentities($c->youtube, null, 'UTF-8');
            $imdb = htmlentities($c->imdb, null, 'UTF-8');
            $genre = htmlentities($c->genre, null, 'UTF-8');
             
            $html = "<form method=post> 
                        <fieldset> 
                            <legend>Uppdatera innehåll</legend> 
                            <input type='hidden' name='id' value='{$id}'/> 
                            <p><label>Titel:<br/><input type='text' name='title' value='{$title}'/></label></p> 
                            <p><label>Text:<br/><textarea name='infotext'>{$infotext}</textarea></label></p>
                            <p><label>Year:<br/><input type='text' name='year' value='{$year}'/></label></p>
                            <p><label>Image:<br/><input type='text' name='image' value='{$image}'/></label></p>
                            <p><label>Pris:<br/><input type='text' name='pris' value='{$pris}'/></label></p>
                            <p><label>Youtube:<br/><input type='text' name='youtube' value='{$youtube}'/></label></p>
                            <p><label>Imdb:<br/><input type='text' name='imdb' value='{$imdb}'/></lable></p>
                            <p><label>Genre:<br/><input type='text' name='genre' value='{$genre}'/></label></p>
                            <p class=buttons><input type='submit' name='save' value='Spara'/></p> 
                            <p><a href='content.php'>Visa alla</a></p> 
                        </fieldset> 
                     </form>"; 
                return $html; 
        }

   public function saveEdit($id, $db){
            if(isset($_POST['save']))
            if(isset($_POST['id']) && is_numeric($_POST['id'])) $id = $_POST['id']; else $id = null;
            $title  = isset($_POST['title']) ? $_POST['title'] : null;
            $year = isset($_POST['year']) ? $_POST['year'] : null;
            $image = isset($_POST['image']) ? $_POST['image'] : null;
            $infotext = isset($_POST['infotext']) ? $_POST['infotext'] : array();
            $youtube = isset($_POST['youtube']) ? $_POST['youtube'] : null;
            $imdb = isset($_POST['imdb']) ? $_POST['imdb'] : null;
            $genre = isset($_POST['genre']) ? $_POST['genre'] : null;
            $save = isset($_POST['save'])  ? true : false;

            $sql = "UPDATE ProjektMovie SET title = ?, year = ?, image = ?, infotext = ?, youtube = ?, imdb = ?, genre = ? WHERE id = {$id}"; 
            
                $params = array($title, $year, $image, $infotext, $youtube, $imdb, $genre); 
                $res = $db->ExecuteQuery($sql, $params); 
                if($res) { 
                    $html = 'Informationen sparades.'; 
                } 
                else { 
                    $html = 'Informationen sparades EJ.<br><pre>' . print_r($db->ErrorInfo(), 1) . '</pre>'; 
                } 
                 
                return $html;
        }

    public function createNew(){        
            $html = "<form method=post>  
                    <fieldset>  
                    <legend>Lägg till en ny film</legend>  
                    <p><label>Titel:<br/><input type='text' name='title' value=''/></label></p> 
                    <p><label>Text:<br/><textarea name='infotext'></textarea></label></p>
                    <p><label>Year:<br/><input type='text' name='year' value=''/></label></p>
                    <p><label>Image:<br/><input type='text' name='image' value=''/></label></p>
                    <p><label>Pris:<br/><input type='text' name='pris' value=''/></label></p>
                    <p><label>Youtube:<br/><input type='text' name='youtube' value=''/></label></p>
                    <p><label>Imdb:<br/><input type='text' name='imdb' value=''/></lable></p>
                    <p><label>Genre:<br/><input type='text' name='genre' value=''/></label> Skriv genre med endast , mellan</p>
                    <p class=buttons><input type='submit' name='save' value='Skapa'/>  
                    <p><a href='content.php'>Visa alla</a></p>  
                    </fieldset>  
                    </form>  
                    ";  

                return $html;  
        }  
    
    public function saveNew(){  
            $title = isset($_POST['title']) ? $_POST['title'] : null;
            $year = isset($_POST['title']) ? $_POST['title'] : null;
            $image = isset($_POST['image']) ? $_POST['image'] : null;
            $infotext = isset($_POST['infotext']) ? $_POST['infotext'] : array();
            $youtube = isset($_POST['youtube']) ? $_POST['youtube'] : null;
            $imdb = isset($_POST['imdb']) ? $_POST['imdb'] : null;
            $genre = isset($_POST['genre']) ? $_POST['genre'] : null;
              
             $sql = '  
                INSERT INTO ProjektMovie (title, year, image, infotext, youtube, imdb, genre)
                VALUES (?,?,?,?,?,?,?)'; 
                  
                $params = array($title, $year, $image, $infotext, $youtube, $imdb, $genre);  
                $res = $this->db->executeQuery($sql, $params);  
                if($res) {  
                    $output = 'Informationen sparades.'; 
                    header('Location: movies.php');
                }  
                else {  
                    $output = 'Informationen sparades EJ.<br><pre>' . print_r($this->db->ErrorInfo(), 1) . '</pre>';  
                }  
                return $output;  
        }  
    }