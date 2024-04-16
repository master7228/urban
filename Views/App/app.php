      <?php
      $today = getdate();
      $fulltoday = $today['year'].'-'.$today['mon'].'-'.$today['mday'];
      $fechaHoy = date("Y-m-d", strtotime($fulltoday));
      
      $todayData = array();
      foreach ($array as $key => $value) {
         $fechaGuia = date("Y-m-d", strtotime($value['date_service']));
         if(  $fechaGuia >= $fechaHoy){
            array_push($todayData, $value );
         }
      }

      ?>
      
      <section class="banner_main" style="padding: 140px 0px 0px 0px;">
         <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container-fluid">
                     <div class="carousel-caption">

                        <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal" style="display:none"></a>
                       
                           <div class="row text-left">
                              <div class="col-md-5">
                                 <div class="choose_box" style="display: inline-grid;">
                                    <i><img src="https://comerciovirtualseguro.com/system/users/avatars/eba/96a/9d-/thumb/<?php echo $_SESSION['client']['avatar_file_name']; ?>" alt="#"/></i>
                                    <h3><?php echo $_SESSION['client']['name'].' '.$_SESSION['client']['last_name'] ; ?></h3>
                                    <p>
                                       <b>Correo: </b><?php echo $_SESSION['client']['email']; ?></br>
                                       <b>Teléfono: </b><?php echo $_SESSION['client']['phone']; ?></br>
                                       <b>Cantidad guías generadas: </b><?php echo count($array); ?></br>
                                       <b>Prefijo: </b><?php echo $_SESSION['client']['urban_code']; ?> 
                                    </p>
                                 </div>
                              </div>
                              <input type="hidden" id="cantGuias" value="<?php echo count($array); ?>">
                              <div class="col-md-5 offset-md-2" style="text-align: right; padding-right: 30px;">
                                 <div class="choose_box">
                                    <button class="get_now btn_primary mb-10" id="btnNewDelivery" style="max-width: 250px !important;margin-top: 10px;">Nueva Guía</button>
                                    <!--<button class="get_now btn_primary" id="goApp" name="goApp" style="max-width: 250px !important;margin-top: 10px;">Estado de Cuenta</button>-->
                                 </div>
                              </div>
                           </div>
                        <div class="row">
            
                        <div class="col-md-12 col-lg-12">
                              <div class="row w-100 text-dark" >
                                 <div class="card shadow mb-4 w-100 ">
                                    <div class="card-body">
                                       <div><h2>Mis guías de Hoy</h2></div>
                                       <div class="table-responsive">
                                          <table class="table table-bordered" id="dataTableDeliveryToDay" width="100%" cellspacing="0">
                                                <thead>
                                                   <tr>
                                                      <th>Guia</th>
                                                      <th>Nombre Destinatario</th>
                                                      <th>Dirección Destinatario</th>
                                                      <th>Fecha</th>
                                                      <th>Estado</th>
                                                      <th style="width: 5%;">Ver</th>
                                                      <th style="width: 5%;">Guía</th>
                                                      <th style="width: 5%;">Cancelar</th>
                                                   </tr>
                                                </thead>
                                                <tfoot>
                                                   <tr>
                                                      <th>Guia</th>
                                                      <th>Nombre Destinatario</th>
                                                      <th>Dirección Destinatario</th>
                                                      <th>Fecha</th>
                                                      <th>Estado</th>
                                                      <th>Ver</th>
                                                      <th>Guía</th>
                                                      <th>Cancelar</th>
                                                   </tr>
                                                </tfoot>
                                                <tbody>

                                                <?php 
                                                    if(count($todayData)>0){
                                                      foreach ($todayData as $key => $value) {
                                                            $recipient_name = $value['recipient_name'];
                                                            $recipient_address = $value['recipient_address'];
                                                            if($value['delivery_mode'] == 2){
                                                               $recipient_name = $_SESSION['client']['name'].' '.$_SESSION['client']['last_name'];
                                                               $recipient_address = $value['address_client']; 
                                                            }
                                                            echo '<tr class="odd gradeX">'; 
                                                            echo '<td>'.$value['code'].str_pad($value['consecutive'], 3, '0', STR_PAD_LEFT).'</td>';
                                                            echo '<td class="text-left">'.$recipient_name.'</td>';
                                                            echo '<td class="text-left">'.$recipient_address.'</td>';
                                                            echo '<td>'.$value['date_service'].'</td>';
                                                            echo '<td>'.$value['name_status'].'</td>';
                                                            echo '<td class="text-center"><a style="cursor:pointer;"  class="btnView" data-id="'.$value['id'].'" data-client="'.$_SESSION['client']['id'].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'images/view.png"></a></td>';
                                                            echo '<td class="text-center"><a style="cursor:pointer;"  class="btnPDF" data-id="'.$value['id'].'" data-client="'.$_SESSION['client']['id'].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'images/downloadPdf.png" style="max-width: 35%;"></a></td>';
                                                            echo '<td class="text-center"><a style="cursor:pointer;"  class="btnCancel" data-id="'.$value['id'].'" data-client="'.$_SESSION['client']['id'].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'images/cancelar.png" style="max-width: 25%;"></a></td>';
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

                           <div class="col-md-12 col-lg-12">
                              <div class="row w-100 text-dark" >
                                 <div class="card shadow mb-4 w-100 ">
                                    <div class="card-body">
                                       <div><h2>Todas Mis guías</h2></div>
                                       <div class="table-responsive">
                                          <table class="table table-bordered" id="dataTableDelivery" width="100%" cellspacing="0">
                                                <thead>
                                                   <tr>
                                                      <th>Guia</th>
                                                      <th>Nombre Destinatario</th>
                                                      <th>Dirección Destinatario</th>
                                                      <th>Fecha</th>
                                                      <th>Estado</th>
                                                      <th style="width: 5%;">Ver</th>
                                                      <th style="width: 5%;">Guía</th>
                                                      <th style="width: 5%;">Cancelar</th>
                                                   </tr>
                                                </thead>
                                                <tfoot>
                                                   <tr>
                                                      <th>Guia</th>
                                                      <th>Nombre Destinatario</th>
                                                      <th>Dirección Destinatario</th>
                                                      <th>Fecha</th>
                                                      <th>Estado</th>
                                                      <th>Ver</th>
                                                      <th>Guía</th>
                                                      <th>Cancelar</th>
                                                   </tr>
                                                </tfoot>
                                                <tbody>

                                                <?php 
                                                    if(count($array)>0){
                                                      foreach ($array as $key => $value) {
                                                            $recipient_name = $value['recipient_name'];
                                                            $recipient_address = $value['recipient_address'];
                                                            if($value['delivery_mode'] == 2){
                                                               $recipient_name = $_SESSION['client']['name'].' '.$_SESSION['client']['last_name'];
                                                               $recipient_address = $value['address_client']; 
                                                            }

                                                            echo '<tr class="odd gradeX">'; 
                                                            echo '<td>'.$value['code'].str_pad($value['consecutive'], 3, '0', STR_PAD_LEFT).'</td>';
                                                            echo '<td class="text-left">'.$recipient_name.'</td>';
                                                            echo '<td class="text-left">'.$recipient_address.'</td>';
                                                            echo '<td>'.$value['date_service'].'</td>';
                                                            echo '<td>'.$value['name_status'].'</td>';
                                                            echo '<td class="text-center"><a style="cursor:pointer;"  class="btnView" data-id="'.$value['id'].'" data-client="'.$_SESSION['client']['id'].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'images/view.png"></a></td>';
                                                            echo '<td class="text-center"><a style="cursor:pointer;"  class="btnPDF" data-id="'.$value['id'].'" data-client="'.$_SESSION['client']['id'].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'images/downloadPdf.png" style="max-width: 35%;"></a></td>';
                                                            echo '<td class="text-center"><a style="cursor:pointer;"  class="btnCancel" data-id="'.$value['id'].'" data-client="'.$_SESSION['client']['id'].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'images/cancelar.png" style="max-width: 25%;"></a></td>';
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

        if($('#cantGuias').val() > 0 ){
            $('#dataTableDelivery').DataTable({
               order: [[3, 'desc']]
            });
            $('#dataTableDelivery_length').css({'text-align':'left'});
            $('#dataTableDelivery_info').css({'text-align':'left'});
         
        }
        

      $('#btnNewDelivery').on('click', function(){
         window.location.href = "<?php echo URL; ?>Delivery/create"; 
      });

      $('.btnView').on('click', function(event){
         event.preventDefault();
         window.location.href = "<?php echo URL; ?>Delivery/view/"+$(this).attr("data-id")+"/"+$(this).attr("data-client"); 
      });

      $('.btnPDF').on('click', function(event){
         event.preventDefault();
         window.location.href = "<?php echo URL; ?>Delivery/pdf/"+$(this).attr("data-id"); 
      });

      $('.btnCancel').on('click', function(event){
         event.preventDefault();

         if (confirm("Está seguro de cancelar la guía.") == true) {
            var uuidClient = $(this).attr("data-client");
            var id_delivery = $(this).attr("data-id");
            $.ajax({
                  type:"POST",
                  url: "<?php echo URL; ?>ManageDelivery/statusDelivery",
                  data: {  
                           id_delivery:id_delivery,
                           id_delivery_status:5,
                           description_delivery_status:'Cancelada por el cliente',
                           uuidClient:uuidClient
                        },
                  success: function(response){
                     if(response != 0){
                           jQuery("#modalMessage").text('Guía cancelada correctamente!');
                           jQuery("#modalMessage").css({ 'color': 'green'});
                           jQuery("#showGeneralModal")[0].click();
                           jQuery('#btnAceptarModal').bind( "click", function() {
                           window.location.href = "<?php echo URL; ?>App/app/"+uuidClient; 
                           });
                        }else{
                           jQuery("#modalMessage").text('No se puedo cancelar la guía, valida de nuevo por favor!');
                           jQuery("#modalMessage").css({ 'color': 'red'});
                           jQuery("#showGeneralModal")[0].click();
                        }
                  }
               });
            } 
        
      });
      
      

} );

      </script>




