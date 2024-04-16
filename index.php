<?php 
session_start();
$_SESSION['test'] = 1;
date_default_timezone_set("America/Bogota");
require_once 'Config/config.php';

$url = isset($_GET['url']) ? $_GET['url']:"Index/index";

if($url != "Index/index" && $url != "Login/login" &&  $url != "Login/logout"  &&  $url != "LoginAdmin/login"  ){
	if(!isset($_SESSION['outh'])){
		
		$url ="Index/index";
	}		
}



	$url = explode("/", $url);
	$controller = "";
	$method = "";
	

	

	if(isset($url[0])){
		$controller = $url[0];
	}
	if(isset($url[1])){
		if($url[1] != ''){
			$method = $url[1];
		}
	}
	if(isset($url[2]) && isset($url[3])){
		$params = array();
		if($url[1] != ''){
	
			array_push($params, $url[2], $url[3]);
		}
	}else if(isset($url[2])){
		if(isset($url[2])){
			if($url[1] != ''){
				$params = $url[2];
			}
		}
	}else{
		$params = "";
	}



	spl_autoload_register(function($class){
		if(file_exists(LBS.$class.".php")){
			include_once(LBS.$class.".php");
		}
	});

	//new Controllers(); 
	$controllerPath = 'Controllers/'.$controller.'Controller.php';

	if(file_exists($controllerPath)){
		
		require_once $controllerPath;
		$controller = $controller.'Controller';
		$controller = new $controller();
		if(isset($method)){

			if(method_exists($controller, $method)){
				
				if (isset($params)) {
					$controller->{$method}($params);
				}else{
					$controller->{$method}();
				}
			}
		}
	}else{
		echo "Error en la direccion no existe el controlador";
	}

	
?>
