<?php 

/**
* 
*/
class ClientController extends Controllers
{
	
	function __construct()
	{
		
		parent::__construct();
			}


	public function view($value){
        $data = array();
        $params = array($_SESSION['clients'][$value]['id']);
        $guias = $this->model->execute_function('func_delivery_select_by_uuid',$params);
        $financial_status = $this->model->execute_function('func_financial_status_client_by_id',$params);
		$payments = $this->model->execute_function('func_payments_client_by_id',$params);
        array_push($data,$value,$guias,$financial_status,$payments);
		$this->view->render($this,'view',$data);

	}

	public function viewFinancialStatus($value){
        $data = array();
        $params = array($value);
        $guias = $this->model->execute_function('func_financial_control_deliveries_by_id',$params);
        $financial_status = $this->model->execute_function('func_financial_status_client_by_id',$params);
		$payments = $this->model->execute_function('func_payments_client_by_id',$params);
        array_push($data,$value,$guias,$financial_status,$payments);
		$this->view->render($this,'viewFinancialStatus',$data);

	}

	public function makePayment(){
        $params = array($_POST['userId'],$_POST['uuidClient'],$_POST['value_pay'],$_POST['description_pay']);
        $response = $this->model->execute_function('func_client_payments_save',$params);
		$this->view->render($this,'viewFinancialStatus',$response);

	}

}

 ?>