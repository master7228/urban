<?php 


class AssignmentDomiciliaryController extends Controllers
{
	
	function __construct()
	{
		
		parent::__construct();
			}


	public function index(){
        $data = array();
        $params = array();
        $delivery = $this->model->execute_function('func_delivery_select_all',$params);
        $domiciliarys = $this->model->execute_function('func_domiciliary_select_all',$params);
        array_push($data, $delivery, $domiciliarys);
		$this->view->render($this,'index',$data);

	}  

    public function view($id_delivery){
        $data = array();
        $params = array(
            $id_delivery
        );
        $delivery = $this->model->execute_function('func_delivery_select_by_id',$params);
        $params = array();
        $domiciliarys = $this->model->execute_function('func_domiciliary_select_all',$params);
        $params = array();
        $deptos = $this->model->execute_function('func_deptos_select_all',$params);
        array_push($data, $delivery, $domiciliarys, $deptos);
        $this->view->render($this,'view',$data);

    }

    public function assignment(){
        if(isset($_POST['id_delivery'])){
            $params = array(
                $_POST['id_delivery'],
                $_POST['id_domiciliary']
            );
            $response = $this->model->execute_function('func_delivery_assignment_domiciliary',$params); 
            echo $response;
        }else{
            echo 0;
        }
    }
}

 ?>