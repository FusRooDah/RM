<?php 
class CMovieTable{
    private $db;

    public function __construct($db) {
            $this->db = $db;
    }

    public function orderby($column) { 
        $asc = "<a href='?";
        $desc = "<a href='?";
        if(isset($_GET['title'])){
            $title = $_GET['title'];
            $asc .= "title={$title}&amp;";
            $desc .= "title={$title}&amp;";
        }if(isset($_GET['limit'])){
            $limit = $_GET['limit'];
            $asc .= "limit={$limit}&amp;";
            $desc .= "limit={$limit}&amp;";
        }

        $asc .= "column={$column}&amp;order=asc'>&darr;</a>"; 
        $desc .="column={$column}&amp;order=desc'>&uarr;</a>";
        
        $html = $asc;
        $html .= $desc;
        return $html;
    }

    public function generateTable(){
        $sql = $this->getSQL();
        $result = $this->db->executeSelectQueryAndFetchAll($sql);
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $genre = isset($_GET['genre']) ? $_GET['genre'] : null;
        $search = isset($_GET['search']) ? $_GET['search'] : null;
        $user = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null; 
        $html = "";

        if($id){
            foreach($result AS $key => $val){
                $html .= "<h1>{$val->title}</h1>";
                if($user){
                    $html .= "<p><a href='movieEdit.php?id={$id}'>editera</a></p>";
                }
                $kategory = explode(",",$val->genre);
                $number = count($kategory);
                $html .= "<p>Genre: ";
                for($i = 0; $i < $number;$i++){
                    $html .= "<a href='?genre={$kategory[$i]}'> {$kategory[$i]} </a>";
                }
                $html .= "</p>";
                $html .= "<div id='trailer'><iframe float='left' width='560' height='315' src='{$val->youtube}' frameborder=0 allowfullscreen></iframe>";
                $html .= "<div id='right'><img src='img.php?src={$val->image}&width=250&height=315&'></div></div>";
                $html .= "<div id='info'>{$val->infotext}</div>";
                $html .= "<div id='imdb'>Imdb: <a href='{$val->imdb}'>{$val->title}</a></div>";
            }
        }
        else{
                $html .= "<table border>";
                $html .= "<tr><th>Titel" . $this->orderby('title') ."</th><th>Bild</th><th>Synopsis</th><th>Pris per dag" . $this->orderby('pris') . "</th>";
                foreach($result AS $key => $val){ 
                    $html .= "<tr><td>{$val->title}</td><td><a href='movies.php?id={$val->id}'><img id='pic' src='img.php?src={$val->image}&width=79&height=116' alt='{$val->title}'></a></td><td>{$val->infotext}</td><td>{$val->pris}:-</td></tr>";
            }
                $html .= "</table>";
                $html .= $this->pages();
        }
       
        return $html;
    }

    public function getSQL(){
        $sql = "SELECT * FROM ProjektMovie ";
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $genre = isset($_GET['genre']) ? $_GET['genre'] : null;
        $search = isset($_GET['search']) ? $_GET['search'] : null;
        $column = isset($_GET['column']) ? $_GET['column'] : null;
        $order = isset($_GET['order']) ? $_GET['order'] : null;
        $limit = isset($_GET['limit']) ? $_GET['limit'] : null;
        $offset = isset($_GET['offset']) ? $_GET['offset'] : null;

        if($id){
            $sql .= "WHERE id LIKE $id";
        }
        if($genre){
            $sql .= "WHERE genre LIKE '%$genre%'";
        }
        if($search){
            $sql .= "WHERE title LIKE '%$search%'";
        }
        if($column){
            $column = $_GET['column'];
            $sql .= " ORDER BY $column";
            if($order){
                $order = $_GET['order'];
                $sql .= " $order";
            }
            else{
                $sql .= " ORDER by $id";
            }
        }
        $sql .= " LIMIT ";
        if($limit){
            $sql .= "$limit";
        }else{
            $sql .= " 3";
        }
        if($offset){
            $sql .= " OFFSET $offset";
        }

        return $sql;
    }

    public function pages(){
        $html = "<div id='pages'>";
        $pageAmount = $this->db->countentries();
        if(isset($_GET['limit'])){
            $limit = $_GET['limit'];
        }else{
            $limit = 3;
        }

        $sites = ceil($pageAmount/$limit);
        for($i = 1; $i <= $sites; $i++){
            $html .= "<a href=?";
            if(isset($_GET['search'])){
                $search = $_GET['search'];
                $html .= "search={$search}&amp;";
            }
            if(isset($_GET['column'])){
                $column = $_GET['column'];
                $html .= "column={$column}&amp;";
            }
            if(isset($_GET['order'])){
                $order = $_GET['order'];
                $html .= "order={$order}&amp;";
            }
            $offset = $limit*($i-1);
            $html .= "limit={$limit}&amp;offset={$offset}>$i</>";
        }
        $html .= "</div>";
        return $html;
    }
}
