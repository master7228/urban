<?php 

class ManageDeliveryController extends Controllers
{
	public $model;
    public $view;
	function __construct()
	{
		
		parent::__construct();
			}


	public function index(){
        $data = array();
        $params = array( $_SESSION['userAdmin'][0]['domiciliary_id']);
        $deliverys = $this->model->execute_function('func_delivery_select_all_assigned_by_domiciliary',$params);
        $params = array();
        $statuses = $this->model->execute_function('func_delivery_statuses_select_all',$params);
        array_push($data, $deliverys, $statuses);
		$this->view->render($this,'index',$data);

	} 
    
    public function historico(){
        $data = array();
        $params = array( $_SESSION['userAdmin'][0]['domiciliary_id']);
        $deliverys = $this->model->execute_function('func_delivery_select_all_by_domiciliary',$params);
        $params = array();
        $statuses = $this->model->execute_function('func_delivery_statuses_select_all',$params);
        array_push($data, $deliverys, $statuses);
		$this->view->render($this,'historico',$data);

	} 

    public function exitosos(){
        $data = array();
        $params = array( $_SESSION['userAdmin'][0]['domiciliary_id']);
        $deliverys = $this->model->execute_function('func_delivery_select_all_exitosos_by_domiciliary',$params);
        $params = array();
        $statuses = $this->model->execute_function('func_delivery_statuses_select_all',$params);
        array_push($data, $deliverys, $statuses);
		$this->view->render($this,'exitosos',$data);

	} 

    public function novedad(){
        $data = array();
        $params = array( $_SESSION['userAdmin'][0]['domiciliary_id']);
        $deliverys = $this->model->execute_function('func_delivery_select_all_novedad_by_domiciliary',$params);
        $params = array();
        $statuses = $this->model->execute_function('func_delivery_statuses_select_all',$params);
        array_push($data, $deliverys, $statuses);
		$this->view->render($this,'novedad',$data);

	}

    public function cancelados(){
        $data = array();
        $params = array( $_SESSION['userAdmin'][0]['domiciliary_id']);
        $deliverys = $this->model->execute_function('func_delivery_select_all_cancelados_by_domiciliary',$params);
        $params = array();
        $statuses = $this->model->execute_function('func_delivery_statuses_select_all',$params);
        array_push($data, $deliverys, $statuses);
		$this->view->render($this,'cancelados',$data);

	}

    public function view($id_delivery){
        $data = array();
        $params = array(
            $id_delivery
        );
        $delivery = $this->model->execute_function('func_delivery_select_by_id',$params);
        $params = array();
        $statuses = $this->model->execute_function('func_delivery_statuses_select_all',$params);
        array_push($data, $delivery, $statuses);
        $this->view->render($this,'view',$data);

    }

    public function statusDelivery(){
        if(isset($_POST['id_delivery'])){
            $params = array(
                $_POST['id_delivery'],
                $_POST['id_delivery_status'],
                $_POST['description_delivery_status'],
                $_POST['uuidClient'],
                $_POST['price_delivery']
                
            );
            $response = $this->model->execute_function('func_delivery_save_status',$params); 
            print_r($response);
        }else{
            echo 0;
        }
    }

    public function countDeliverybyDomiciliary(){
        if(isset($_POST['id_user'])){
            $params = array(
                $_SESSION['userAdmin'][0]['domiciliary_id'],
                $_POST['month'],
                $_POST['year']
            );
            $response = $this->model->execute_function('func_delivery_count_by_domiciliary',$params); 
            print_r(json_encode($response));
        }else{
            echo 0;
        }
    }
}

 ?>