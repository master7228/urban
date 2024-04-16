<?php 

/**
* 
*/
class IndexController extends Controllers
{
	
	function __construct()
	{
		
		parent::__construct();
			}


	public function index(){
		$this->view->render($this,'index',"");

	}
}

 ?>