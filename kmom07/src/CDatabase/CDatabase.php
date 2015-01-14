<?php

class CDatabase{

	private $options;                   // Options used when creating the PDO object
	private $db   = null;               // The PDO object
  private $stmt = null;               // The latest statement used to execute a query
 	private static $numQueries = 0;     // Count all queries made
  private static $queries = array();  // Save all queries for debugging purpose
 	private static $params = array();   // Save all parameters for debugging purpose

 	public function __construct($options) {
 		//Database options
 		$default = array(
 			'dsn' => null,
 			'username' => null,
 			'password' => null,
 			'options' => null,
 			'fetch_style' => PDO::FETCH_OBJ,
 			);

 		$this->options = array_merge($default, $options);
 		//connect to the database
 		try {
 			$this->db = new PDO($this->options['dsn'], $this->options['username'], $this->options['password'], $this->options['options'] );
 		}
 		catch(Exception $e) {
 			throw new PDOException('Could not connect to database, hiding connection details');
 		}
 	$this->db->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $this->options['fetch_style']);
 	}

 	/**
  	 * Execute a select-query with arguments and return the resultset.
 	 * 
 	 * @param string $query the SQL query with ?.
	 * @param array $params array which contains the argument to replace ?.
	 * @param boolean $debug defaults to false, set to true to print out the sql query before executing it.
 	 * @return array with resultset.
  	 */

 	public function executeSelectQueryAndFetchAll($query, $params=array(), $debug=false) {
 
	    self::$queries[] = $query; 
	    self::$params[]  = $params; 
	    self::$numQueries++;
	 
	    if($debug) {
	      echo "<p>Query = <br/><pre>{$query}</pre></p><p>Num query = " . self::$numQueries . "</p><p><pre>".print_r($params, 1)."</pre></p>";
	    }
	 
	$this->stmt = $this->db->prepare($query);
	$this->stmt->execute($params);
	return $this->stmt->fetchAll();
  }

  public function ExecuteQuery($query, $params = array(), $debug=false) {

    // Make the query
    $this->stmt = $this->db->prepare($query);
    $res = $this->stmt->execute($params);

    // Log details on the query
    $error = $res ? null : "\n\nError in executing query: " . $this->ErrorCode() . " " . print_r($this->ErrorInfo(), 1);
    $logQuery = $query . $error;
    self::$queries[] = $logQuery; 
    self::$params[]  = $params; 
    self::$numQueries++;

    // Debug if set
    if($debug) {
      echo "<p>Query = <br/><pre>".htmlentities($logQuery)."</pre></p><p>Num query = " . self::$numQueries . "</p><p><pre>".htmlentities(print_r($params, 1))."</pre></p>";
    }

    return $res;
  }

  /**
   * Get a html representation of all queries made, for debugging and analysing purpose.
   * 
   * @return string with html.
   */
  
  public function dump() {
    $html  = '<p><i>You have made ' . self::$numQueries . ' database queries.</i></p><pre>';
    foreach(self::$queries as $key => $val) {
   		$params = empty(self::$params[$key]) ? null : htmlentities(print_r(self::$params[$key], 1)) . '<br/></br>';
    	$html .= $val . '<br/></br>' . $params;
    }
    $html .= '</pre>';
    return $html;
  }
   public function ErrorCode() {
    return $this->stmt->errorCode();
  }



  /**
   * Return textual representation of last error, see PDO::errorInfo().
   *
   * @return array with information on the error.
   */
  public function ErrorInfo() {
    return $this->stmt->errorInfo();
  }

  public function countentries(){ 

    return $this->executeSelectQueryAndFetchAll('SELECT COUNT(*) as rows FROM ProjektMovie')[0]->rows; 
  } 

}

?>