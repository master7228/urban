<?php 

/**
* 
*/
class AppController extends Controllers
{
	
	function __construct()
	{
		
		parent::__construct();
			}


	public function app($value){

		$host = "138.197.10.249";
		$port = "5432";
		$dbname = "cvs_urban";
		$user = "comercio";
		$password = "j0rg32022";
		
		$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
		
		if (!$connection) {
			die("Error de conexión: " . pg_last_error());
		}
          
		$query = "SELECT * FROM func_delivery_select_by_uuid($1)";
		$result = pg_query_params($connection, $query, array($value));          
		if (!$result) {
			die("Error en la consulta: " . pg_last_error());
		}
		
		$data = array();
		while ($row = pg_fetch_assoc($result)) {
			$data[] = $row;
		}
		$this->view->render($this,'app',$data);

	}
}

 ?>