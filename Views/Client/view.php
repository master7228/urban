      <?php 
      //print_r($_SESSION['userAdmin'][0]['user_type_user']);
      //print_r($_SESSION['clients'][$array[0]]);
      $_SESSION["cliente"]['id'] = $_SESSION['clients'][$array[0]]['id'];
      $_SESSION["cliente"]['urban_code'] = $_SESSION['clients'][$array[0]]['urban_code'];
      $_SESSION["cliente"]['avatar_file_name'] = $_SESSION['clients'][$array[0]]['avatar_file_name'];
      $_SESSION["cliente"]['name'] = $_SESSION['clients'][$array[0]]['name'];
      $_SESSION["cliente"]['last_name'] = $_SESSION['clients'][$array[0]]['last_name'];
      $_SESSION["cliente"]['temp'] = 1;
      $_SESSION["cliente"]['idDB'] = $array[0];
      //$_SESSION['cliente'] = $array[0];

      //print_r($array[3][(count($array[3]))-1]);
      $last_balance = (!empty($array[3]))?$array[3][(count($array[3]))-1]:0;
      $array[2][0]['balance'] = (!empty($array[2][0]['balance']))? $array[2][0]['balance'] : 0;
      //print_r(count($array[3])-1);
      //print_r($_SESSION["cliente"]);
      ?>
      
      <section class="banner_main" style="padding: 140px 0px 0px 0px;">
         <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container-fluid">
                     <div class="carousel-caption">

                     
                       <input type="hidden" id="uuid_client" name="uuid_client" value="<?php echo $_SESSION['clients'][$array[0]]['id'];?>">
                     <div class="row text-left">
                              <div class="col-md-5">
                                 <div class="choose_box" style="display: inline-grid;">
                                    <i><img src="https://comerciovirtualseguro.com/system/users/avatars/eba/96a/9d-/thumb/<?php echo $_SESSION['clients'][$array[0]]['avatar_file_name']; ?>" alt="#"/></i>
                                    <h3><?php echo $_SESSION['clients'][$array[0]]['name'].' '.$_SESSION['clients'][$array[0]]['last_name']; ?></h3>
                                    <p>
                                       <b>Correo: </b><?php echo $_SESSION['clients'][$array[0]]['email']; ?></br>
                                       <b>Teléfono: </b><?php echo $_SESSION['clients'][$array[0]]['phone']; ?></br>
                                       <b>Prefijo: </b><?php echo $_SESSION['clients'][$array[0]]['urban_code']; ?> </br>
                                       <b>Fecha Creación: </b><?php echo date("d/m/Y H:i", strtotime($_SESSION['clients'][$array[0]]['created_at'])) ; ?> 
                                    </p>
                                 </div>
                              </div>
                              <div class="col-md-5 offset-md-2" style="text-align: right; padding-right: 30px;">
                                 
                                    <div class="choose_box" style="display: inline-grid; margin-bottom: 10px;">
                                       <h3>Estado de Cuenta</h3>
                                       <p>
                                          <b>Estado Actual de la Cuenta: </b><?php if($array[2][0]['balance'] < 0){ echo '<b style="color:red"> $' . number_format($array[2][0]['balance'], 0, ',', '.').'</b>'; }else{echo '<b style="color:white"> $'.number_format($array[2][0]['balance'], 0, ',', '.').'</b>'; } ?></br>
                                          <b>Último abono: </b><b style="color:white;">$<?php if($last_balance != 0 ){ echo number_format($last_balance['value_paid'], 0, ',', '.');}else{ echo 0; }?></b></br>
                                          <b>Fecha último abono: </b><b style="color:white;"><?php if($last_balance != 0 ){ echo date("d/m/Y H:i", strtotime($last_balance['date_pay'])) ;}  ?></b></br>
                                          <b>Cantidad de guías generadas: </b><b style="color:white;"><?php echo count($array[1]); ?> </b></br>
                                          <b>Fecha Creación: </b><b style="color:white;"><?php echo date("d/m/Y H:i", strtotime($_SESSION['clients'][$array[0]]['created_at'])) ; ?> </b>
                                       </p>
                                       <button class="get_now btn_primary" id="btnViewMoviments" style="max-width: 250px !important;margin-top: 10px;">Ver Movimientos</button>
                                       <button class="get_now btn_primary" id="goApp" name="goApp" style="max-width: 250px !important;margin-top: 10px;">volver</button>
                                    </div>
                                    
                                    
                                 
                              </div>
                           </div>


                        <div class="row">
            
                           <div class="col-md-12 col-lg-12">
                              <div class="row w-100 text-dark" >
                                 <div class="card shadow mb-4 w-100 ">
                                    <div class="card-body">
                                       <div><h2>Guías</h2></div>
                                       <div class="table-responsive">
                                       <table class="table table-bordered" id="dataTableDelivery" width="100%" cellspacing="0">
                                                <thead>
                                                   <tr>
                                                      <th>Guia</th>
                                                      <th>Nombre Destinatario</th>
                                                      <th>Dirección Destinatario</th>
                                                      <th>Fecha</th>
                                                      <th>Estado</th>
                                                      <th>Valor</th>
                                                      <th style="width: 5%;">Descargar</th>
                                                      <th>Ver</th>
                                                   </tr>
                                                </thead>
                                                <tfoot>
                                                   <tr>
                                                      <th>Guia</th>
                                                      <th>Nombre Destinatario</th>
                                                      <th>Dirección Destinatario</th>
                                                      <th>Fecha</th>
                                                      <th>Estado</th>
                                                      <th>Valor</th>
                                                      <th>Descargar</th>
                                                      <th>Ver</th>
                                                   </tr>
                                                </tfoot>
                                                <tbody>

                                                <?php 
                                                    if(count($array[1])>0){
                                                      foreach ($array[1] as $key => $value) {
                                                            echo '<tr class="odd gradeX">'; 
                                                            echo '<td>'.$value['code'].str_pad($value['consecutive'], 4, '0', STR_PAD_LEFT).'</td>';
                                                            echo '<td class="text-left">'.$value['recipient_name'].'</td>';
                                                            echo '<td class="text-left">'.$value['recipient_address'].'</td>';
                                                            echo '<td>'.$value['date_service'].'</td>';
                                                            echo '<td>'.$value['name_status'].'</td>';
                                                            echo '<td>$'.number_format($value['recipient_price'], 0, ',', '.').'</td>';
                                                            echo '<td class="text-center"><a style="cursor:pointer;"  class="btnPDF" data-id="'.$value['id'].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'images/downloadPdf.png" style="max-width: 20%;"></a></td>';
                                                            echo '<td class="text-center"><a style="cursor:pointer;"  class="btnView" data-id="'.$value['id'].'" data-client="'.$_SESSION['clients'][$array[0]]['id'].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'images/view.png"></a></td>';
                                                            echo '</tr>';
                                                      } 
                                                   }else{
                                                      echo '<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No se encontraron registros</td></tr>';
                                                   }
                                                      
                                                   ?> 
                                                </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <script>
       
    $(document).ready( function () {
       /* $('#dataTableDelivery').DataTable(function(){
         order: [[3, 'desc']]
        });*/
        $('#dataTableDelivery').DataTable({
            order: [[3, 'desc']]
         });
         $('#dataTableDelivery_length').css({'text-align':'left'});
         $('#dataTableDelivery_info').css({'text-align':'left'});
      
      $('#goApp').on('click', function(event){
         event.preventDefault();
         window.location.href = "<?php echo URL; ?>AppAdmin/app"; 
      });
      $('#btnViewMoviments').on('click', function(event){
         event.preventDefault();
         window.location.href = "<?php echo URL; ?>Client/viewFinancialStatus/"+$('#uuid_client').val(); 
      });    
      
      $('.btnPDF').on('click', function(event){
         event.preventDefault();
         window.location.href = "<?php echo URL; ?>Delivery/pdf/"+$(this).attr("data-id"); 
      });
      $('.btnView').on('click', function(event){
         event.preventDefault();
         window.location.href = "<?php echo URL; ?>Delivery/viewadmin/"+$(this).attr("data-id")+"/"+$(this).attr("data-client"); 
      });

      

} );

      </script>




