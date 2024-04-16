<?php 

/**
* 
*/
class LoginAdminController extends Controllers
{
	
	function __construct()
	{
		
		parent::__construct();
			}


	public function index(){
		$this->view->render($this,'index',"");

	}

    public function login(){
        
        if(isset($_POST['user'])){

            $params = array(
                $_POST['user'],
                sha1($_POST['password'])
            );
            $response = $this->model->execute_function('func_login_user_admin',$params);

            if(isset($response[0])){
                $_SESSION['userAdmin'] = $response;
                $_SESSION['outh'] = 1;
                $_SESSION['userFullName'] = $response[0]['user_full_name'];

                if($_SESSION['userAdmin'][0]['user_type_user'] == 1){
                    echo URL.'AppAdmin/app';
                }
                if($_SESSION['userAdmin'][0]['user_type_user'] == 2){
                    echo URL.'AssignmentDomiciliary/index';
                }
                if($_SESSION['userAdmin'][0]['user_type_user'] == 3){
                    echo URL.'ManageDelivery/index';
                }
           
            }else{
                echo 0;
            }
        
        }else{
            $this->view->render($this,'login',array(1)); 
        }

    }

    public function logout(){
        session_destroy();
        $this->view->render($this,'login',array(1)); 
    }
}

 ?>