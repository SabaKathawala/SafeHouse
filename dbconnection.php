
<?php

require_once('config.php');

class DBConnect{
	private $connection;

	function __construct()
	{
		global $config;
		$this->connection=mysqli_connect($config['DBHOST'],$config['USER'],$config['PASS'],$config['DBNAME']);
	}
	function sql_update($query){
		if(mysqli_query($this->connection,$query))
		{
			return true;
		}
		else return false;
	}
	function sql_select($query){
		return mysqli_query($this->connection,$query);
		
	}
	function sql_close(){
		mysqli_close($this->connection);
		
	}

}



?>	
