<?php
require_once("constants.php");

class Database{
 	private $connection;
	public $last_query;

	function __construct(){
			$this->openConnection();
		}
	
	public function openConnection(){
		$this->connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
		if (!$this->connection) {
			die("Database connection failed: " . mysqli_error());
		}
		$db_select = mysqli_select_db($this->connection, DB_NAME);
		if (!$db_select) {
			die("Database selection failed: " . mysqli_error());
		}
	 }
	
	public function closeConnection(){
		 if(isset($this->connection))
				{
					 mysqli_close($this->connection);
					 unset($this->connection);
		     	}			
		}

	public function query($sql){
		$this->last_query = $sql;
		$result = mysqli_query($this->connection, $sql);
		$this->confirmQuery($result);
		return $result;
	}
	
	private function confirmQuery($result){
		if (!$result)
		{
			$output = "Database query failed: ".mysqli_error($this->connection)."<br/><br/>";
			$output .= "Last SQL Query: ".$this->last_query;
			die($output);
		}
	}
	
	public function sqlFormat( $value ) {
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysqli_real_escape_string" ); // i.e. PHP >= v4.3.0
		if( $new_enough_php ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysqli_real_escape_string can do the work
			if( $magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysqli_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	} 

	public function fetchArray($result_set){
		return mysqli_fetch_array($result_set, MYSQL_ASSOC);
	}
	
	public function numRows($result_set){
		return mysqli_num_rows($result_set);
	}
	
	public function lastInsertedId(){
		return mysqli_insert_id($this->connection);
	}
	
	public function affectedRows(){
		return mysqli_affected_rows($this->connection);
	}
	
}

   $db = new Database();
?>
