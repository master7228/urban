<?php 


class DomiciliaryController extends Controllers
{
	
	function __construct()
	{
		
		parent::__construct();
			}


	public function index(){
        $params = array();
        $response = $this->model->execute_function('func_domiciliary_select_all',$params);
		$this->view->render($this,'index',$response);

	}

    public function create(){
        if(isset($_POST['domiciliary_document'])){
            $params = array(
                    $_POST['domiciliary_document']
                );
            $response = $this->model->execute_function('func_domiciliary_select_by_document',$params);

            if(empty($response)){
                $params = array(
                    $_POST['domiciliary_document_type'],
                    $_POST['domiciliary_document'],
                    $_POST['domiciliary_name'],
                    $_POST['domiciliary_phone'],
                    $_POST['domiciliary_vehicle'],
                    $_POST['domiciliary_plate_vehicle'],
                    $_POST['domiciliary_status']
                    );

                    $response = $this->model->execute_function('func_domiciliary_save',$params);
                    echo 1;

            }else{
                echo 0;
            }
        }else{
            $this->view->render($this,'create',array()); 
        }
    }   

    public function edit($id_domiciliary){
        if(isset($_POST['domiciliary_id'])){

        $params = array(
            $_POST['domiciliary_id'],
            $_POST['domiciliary_name'],
            $_POST['domiciliary_phone'],
            $_POST['domiciliary_vehicle'],
            $_POST['domiciliary_plate_vehicle'],
            $_POST['domiciliary_status']
            );

            $response = $this->model->execute_function('func_domiciliary_update',$params);
            echo 1;
        }else{
            $params = array(
                $id_domiciliary
            );
            $response = $this->model->execute_function('func_domiciliary_select_by_id',$params);
            $this->view->render($this,'edit',$response);
        }
        
        

    }

    public function pdf($id_delivery){
        $params = array(
            $id_delivery
        );
        $response = $this->model->execute_function('func_delivery_select_by_id',$params);
        $data = $response[0];

				$mpdf = new \Mpdf\Mpdf();

				// HTML que deseas convertir en PDF
				$html = '<div style="text-align: center; display: inline-flex;">
                <img src="http://urban.comerciovirtualseguro.com/Views/Default/images/logoCVSUrban.jpeg" style="width: 100px;  float: left;">
            </div>  
                                  <div class="row" style="max-width: 1100px;text-align: center; margin-bottom: 20px; background-color: #e1e0e066; margin-top: 10px;">
                                     <div class="col-md-12">
                                        <span style="color: red; font-size: 20px; font-weight: bolder;">N° Guía</span>
                                           <h3>'.$data['code'].str_pad($data['consecutive'], 4, '0', STR_PAD_LEFT).'</h3>
                                     </div>
                                  </div>
                                   
                                           
                                        
                                                <table border="1" style="width:100%;">
                                                    <tr>
                                                        <td style="text-align:center" colspan="2"><h3>Origen</h3></td>
                                                    </tr>
                                                    <tr>
                                                    
                                                        <td style="width:50%;">
                                                             <b>Nombre: </b> '.$_SESSION["cliente"]['name'].' '.$_SESSION["cliente"]['last_name'].'<br>
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
                                                          <b>Valor: </b>'.$data['recipient_price'].'<br>
                                                          <b>Obervación: </b><br>'.$data['observation'].'<br>
                                               
                                                    </tr>



                                                </table>
                ';
				
				// Agregar el HTML al PDF
				$mpdf->WriteHTML($html);
				
				// Generar el PDF
				$mpdf->Output($data['code'].str_pad($data['consecutive'], 4, '0', STR_PAD_LEFT).'-'.$data['recipient_address'].'-'.$data['recipient_name'].'.pdf', 'D');
    }
}

 ?>