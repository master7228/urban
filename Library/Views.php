<?php 

/**
* 
*/
class Views
{
	
	function __construct()
	{
		
	}

	function render($controller,$view,$array){
		
		 $controllers = (preg_replace('/Controller/m',"", get_class($controller)));
        require_once VIEWS.DTF.'head.php';
        /*if($view != "login"){
			//require_once ROOT.'authentication/seguridad.php';
			if($_SESSION["datauser"]['admin_db'] == 'master' && $_SESSION["datauser"]['admin_namelogin'] == 'meserovirtual'){
				require_once VIEWS.DTF.'menuAdmin.php';
			}else{
				require_once VIEWS.DTF.'menu.php';
			}
            
        }*/
		require_once VIEWS.$controllers.'/'.$view.'.php';
		if($view != "login"){
           //require_once VIEWS.DTF.'menu.php';
        }
		require_once VIEWS.DTF.'footer.php';
	}
}

 ?>