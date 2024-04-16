<?php 

/**
* 
*/
class AppAdminController extends Controllers
{
	
	function __construct()
	{
		
		parent::__construct();
			}


	public function app($value){

		$host = "138.197.10.249";
		$port = "5432";
		$dbname = "cvs_production";
		$user = "comercio";
		$password = "j0rg32022";
		
		$connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
		
		if (!$connection) {
			die("Error de conexión: " . pg_last_error());
		}
          
		$query = "SELECT * FROM users";
		$result = pg_query_params($connection, $query, array());          
		if (!$result) {
			die("Error en la consulta: " . pg_last_error());
		}
		
		$data = array();
		while ($row = pg_fetch_assoc($result)) {
			$data[] = $row;
		}
		$_SESSION['clients'] = $data;
		$this->view->render($this,'app',$data);

	}
}

 ?>