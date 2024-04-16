<?php 

/**
* 
*/
require_once 'vendor/autoload.php';

use \Com\Tecnick\Color\Model\Cmyk as ColorCMYK;
use \Com\Tecnick\Color\Model\Gray as ColorGray;
use \Com\Tecnick\Color\Model\Hsl as ColorHSL;
use \Com\Tecnick\Color\Model\Rgb as ColorRGB;
class DeliveryController extends Controllers
{
	public $model;
    public $view;
	function __construct()
	{
		
		parent::__construct();
			}


	public function index(){
		$this->view->render($this,'index',"");

	}

    public function create(){
        if(isset($_POST['uuidCliente'])){

            $uuidCliente = $_POST['uuidCliente'];
            $nameClient = $_POST['nameClient'];
            $phoneClient = $_POST['phoneClient'];
            $typeService = $_POST['typeService'];
            $id_status = $_POST['id_status'];
            $code = $_POST['code'];
            $date_service = $_POST['date_service'];
            $address_client = $_POST['address_client'];
            $recipient_name = $_POST['recipient_name'];
            $recipient_product_name = $_POST['recipient_product_name'];
            $recipient_address = $_POST['recipient_address'];
            $recipient_phone = $_POST['recipient_phone'];
            $recipient_observation = $_POST['recipient_observation'];
            $delivery_mode = $_POST['delivery_mode'];
            $recipient_price = $_POST['recipient_price'];
            $price_delivery = $_POST['price_delivery'];
            $price_total = $_POST['price_total'];
            $id_departamento = $_POST['id_departamento'];
            $id_ciudad = $_POST['id_ciudad'];
            $params = array(
                $uuidCliente
                );
            $consecutive = $this->model->execute_function('func_get_max_consecutive_delivery_by_client',$params);
            $consecutive = ($consecutive[0]['func_get_max_consecutive_delivery_by_client'])+1;

            $params = array(
                $uuidCliente,
                $nameClient,
                $phoneClient,
                $typeService,
                $id_status,
                $code,
                $consecutive,
                $date_service,
                $address_client,
                $recipient_product_name,
                $recipient_name,
                $recipient_address,
                $recipient_phone,
                $recipient_observation,
                $price_delivery,
                $recipient_price,
                $price_total,
                $delivery_mode,
                $id_departamento,
                $id_ciudad
                );
                $response = $this->model->execute_function('func_delivery_save',$params);
                print_r($response);
        }else{
            $params = array();
            $data = array();
            $typeServices = $this->model->execute_function('func_type_services_select_all',$params);
            $params = array();
            $deptos = $this->model->execute_function('func_deptos_select_all',$params);
            
            //$params = array();
            //$lastConsecutive = $this->model->execute_function('func_get_max_consecutive_delivery_by_client',$params);
            array_push($data, $typeServices, $deptos);
            $this->view->render($this,'create',$data); 
        }
    }   

    public function view($getparams){
        $dataFull = array();
        $params = array(
            $getparams[0]
        );
        $delivery = $this->model->execute_function('func_delivery_select_by_id',$params);
        $params = array(
            $getparams[1]
        );
        $dataClient = $this->model->execute_function('func_client_uuid',$params);
        $params = array();
        $deptos = $this->model->execute_function('func_deptos_select_all',$params);
        $typeServices = $this->model->execute_function('func_type_services_select_all',$params);

		array_push($dataFull, $delivery, $dataClient, $deptos, $typeServices );
        
        $this->view->render($this,'view',$dataFull);
    }

    public function viewadmin($getparams){
        $dataFull = array();
        $params = array(
            $getparams[0]
        );
        $delivery = $this->model->execute_function('func_delivery_select_by_id',$params);
        $params = array(
            $getparams[1]
        );
        $dataClient = $this->model->execute_function('func_client_uuid',$params);
        $params = array();
        $deptos = $this->model->execute_function('func_deptos_select_all',$params);
        $typeServices = $this->model->execute_function('func_type_services_select_all',$params);

		array_push($dataFull, $delivery, $dataClient, $deptos, $typeServices );
        
        $this->view->render($this,'viewadmin',$dataFull);
    }

    public function update(){
        $dataFull = array();
        print_r($_POST['phoneClient']);
        $params = array(
            $_POST['id'],
            $_POST['uuidCliente'],
            $_POST['nameClient'],
            $_POST['phoneClient'],
            $_POST['typeService'],
            $_POST['date_service'],
            $_POST['address_client'],
            $_POST['recipient_product_name'],
            $_POST['recipient_name'],
            $_POST['recipient_address'],
            $_POST['recipient_phone'],
            $_POST['recipient_observation'],
            $_POST['price_delivery'],
            $_POST['recipient_price'],
            $_POST['delivery_mode'],
            $_POST['id_departamento'],
            $_POST['id_ciudad']
        );
        $this->model->execute_function('func_delivery_update',$params);
        echo 1;
        $this->view->render($this,'view',$_POST['id']);
    }

    public function pdf($id_delivery){
        $params = array(
            $id_delivery
        );
        $response = $this->model->execute_function('func_delivery_select_by_id',$params);
        $data = $response[0];

				$mpdf = new \Mpdf\Mpdf();

				// HTML que deseas convertir en PDF

                if($data['delivery_mode'] == 1){
                    $html = '<div style="text-align: center; display: inline-flex;">
                    <img src="https://logistica.comerciovirtualseguro.com/Views/Default/images/LogoCVSLogistica.png" style="width: 100px;  float: left;">
                </div>  
                                      <div class="row" style="max-width: 1100px;text-align: center; margin-bottom: 20px; background-color: #e1e0e066; margin-top: 10px;">
                                         <div class="col-md-12">
                                            <span style="color: red; font-size: 20px; font-weight: bolder;">N° Guía</span>
                                               <h3>'.$data['code'].str_pad($data['consecutive'], 3, '0', STR_PAD_LEFT).'</h3>
                                         </div>
                                      </div>
                                       
                                               
                                            
                                                    <table border="1" style="width:100%;">
                                                        <tr>
                                                            <td style="text-align:center" colspan="2"><h3>Origen</h3></td>
                                                        </tr>
                                                        <tr>
                                                        
                                                            <td style="width:50%;">
                                                                 <b>Nombre: </b> '.$_SESSION["client"]['name'].' '.$_SESSION["client"]['last_name'].'<br>
                                                                 <b> Dirección: </b> '.$data['address_client'].'<br>
                                                                 <b> Fecha: </b>  '.$data['date_service'].'<br>
                                                                 <b> Estado de la guía: </b> '.$data['name_status'].'<br>
                                                             
                                                         </div>
                                                            </td>
                                                            <td style="text-align:center; width:50%;">
                                                                <h3>Bancolombia</h3><br>
                                                                <img src="https://comerciovirtualseguro.com/system/parameters/qr_codes/b25/add/f1-/medium/WhatsApp_Image_2023-07-17_at_1.02.08_PM.jpeg" width="200px">
                                                         
                                                            </td>
                                                        </tr>
    
    
                                                        <tr>
                                                            <td style="text-align:center" colspan="2" colspan="2"><h3>Destino</h3></td>
                                                        </tr>
    
    
    
                                                        <tr>
                                                            <td colspan="2">
                                                            
                                                              <b>Producto: </b>'.$data['recipient_product_name'].'<br>
                                                              <b>Nombre: </b>'.$data['recipient_name'].'<br>
                                                              <b>Dirección: </b>'.$data['recipient_address'].'<br>
                                                              <b>Teléfono: </b>'.$data['recipient_phone'].'<br>
                                                              <b>Tipo Servicio: </b>'.$data['name_type_service'].'<br>
                                                              <b>Valor Producto: </b>'.$data['recipient_price'].'<br>
                                                              <b>Valor Domi: </b>'.$data['price_delivery'].'<br>
                                                              <b>Valor Total: </b>'.$data['price_total'].'<br>
                                                              <b>Obervación: </b><br>'.$data['observation'].'<br>
                                                   
                                                        </tr>
    
    
    
                                                    </table>
                    ';
                }else{
                    $html = '<div style="text-align: center; display: inline-flex;">
                    <img src="https://logistica.comerciovirtualseguro.com/Views/Default/images/LogoCVSLogistica.png" style="width: 100px;  float: left;">
                </div>  
                                      <div class="row" style="max-width: 1100px;text-align: center; margin-bottom: 20px; background-color: #e1e0e066; margin-top: 10px;">
                                         <div class="col-md-12">
                                            <span style="color: red; font-size: 20px; font-weight: bolder;">N° Guía</span>
                                               <h3>'.$data['code'].str_pad($data['consecutive'], 3, '0', STR_PAD_LEFT).'</h3>
                                         </div>
                                      </div>
                                       
                                               
                                            
                                                    <table border="1" style="width:100%;">
                                                        <tr>
                                                            <td style="text-align:center" colspan="2"><h3>Origen</h3></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        <td colspan="2">
                                                        
                                                          <b>Producto: </b>'.$data['recipient_product_name'].'<br>
                                                          <b>Nombre: </b>'.$data['recipient_name'].'<br>
                                                          <b>Dirección: </b>'.$data['recipient_address'].'<br>
                                                          <b>Teléfono: </b>'.$data['recipient_phone'].'<br>
                                                          <b>Tipo Servicio: </b>'.$data['name_type_service'].'<br>
                                                          <b>Valor: </b>'.$data['recipient_price'].'<br>
                                                          <b>Obervación: </b><br>'.$data['observation'].'<br>
                                               
                                                    </tr>
    
                                                        <tr>
                                                            <td style="text-align:center" colspan="2" colspan="2"><h3>Destino</h3></td>
                                                        </tr>
    
    
    
                                                       
    
                                                        <tr>
                                                        
                                                        <td style="width:50%;">
                                                             <b>Nombre: </b> '.$_SESSION["client"]['name'].' '.$_SESSION["client"]['last_name'].'<br>
                                                             <b> Dirección: </b> '.$data['address_client'].'<br>
                                                             <b> Fecha: </b>  '.$data['date_service'].'<br>
                                                             <b> Estado de la guía: </b> '.$data['name_status'].'<br>
                                                         
                                                     </div>
                                                        </td>
                                                        <td style="text-align:center; width:50%;">
                                                            <h3>Bancolombia</h3><br>
                                                            <img src="https://comerciovirtualseguro.com/system/parameters/qr_codes/b25/add/f1-/medium/WhatsApp_Image_2023-07-17_at_1.02.08_PM.jpeg" width="200px">
                                                     
                                                        </td>
                                                    </tr>
    
                                                    </table>
                    ';
                }

				
				
				// Agregar el HTML al PDF
				$mpdf->WriteHTML($html);
				
				// Generar el PDF
				$mpdf->Output($data['code'].str_pad($data['consecutive'], 3, '0', STR_PAD_LEFT).'-'.$data['recipient_address'].'-'.$data['recipient_name'].'.pdf', 'D');
    }

    public function getCiudades(){
        $params = array($_POST['id_departamento']);
        $ciudades = $this->model->execute_function('func_ciudades_select_all_by_depto',$params);
        print_r(json_encode($ciudades));
    }
}

 ?>