<?php 

/**
* 
*/
class QueryManager
{
	
	public $link;
	function __construct($HOST,$USER,$PASS,$DB)
	{	

		$this->link = @pg_connect("host=$HOST dbname=$DB user=$USER password=$PASS");
		
		if(!$this->link){
				return false;
		}
	}

	function execute_function($function,$params){
		  $paramsCont = "";
		  for ($i=1; $i <= count($params) ; $i++) { 
			$paramsCont .= "$".$i;
			if($i < count($params) ){
				$paramsCont .= ",";
			}
		  }

		  $query = "SELECT * FROM ".$function." (".$paramsCont.")";
		  
		  $result = pg_query_params($this->link, $query, $params);
	  
		  if (!$result) {
			$nombreBaseDatos = pg_dbname($this->link,);
			  echo "Error al ejecutar la consulta. " .$nombreBaseDatos;
			  echo '<br>';
			  exit;
		  }
		$res = [];
		while ($row = pg_fetch_assoc($result)) {
			array_push($res, $row);
		}
		pg_free_result($result);
		return $res;
	}

	function execute_query($query){
		$result = pg_query($this->link, $query);
		$res = [];
		while ($row = pg_fetch_assoc($result)) {
			array_push($res, $row);
		}
		pg_free_result($result);
		return $res;
	}

	function disconect(){
		pg_close($this->link);
	}
}

 ?>