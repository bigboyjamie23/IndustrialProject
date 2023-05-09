<?php
function connectDB($database='') {
  //global $db;
  require_once('credentials.php');
  // initiate a new database connection
  if($database=='') $database = 'puref';
  $db = new db_connection("mysql");
  if($db->connect("mysql-server-1.macs.hw.ac.uk", "", $dbUsername, $dbPassword, 0,$database)) return $db;
  else return false;
}

class db_connection {
	var $connection;

	function __construct($type="") { }
	// connect to the database server
	
	function connect($host, $port, $login, $password, $pconnect, $database="") {
		if($port) { $host .= ":$port"; }		
		if( !($this->connection = mysqli_connect($host, $login, $password)) ) return false;
		if($database!='') if(!mysqli_select_db($this->connection, $database)) return false;
		return true;
	}

	function query($query) {
		return mysqli_query($this->connection,$query);
	}

	function error(){
		return mysqli_error($this->connection);
	}
	
	function numrows($result){
		return mysqli_num_rows($result);
	}
	
	function fetcharray($result){
		return mysqli_fetch_array($result);
	}
}