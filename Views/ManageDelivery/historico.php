<?php 
      
      $deliverys = $array[0];
      $statuses = $array[1];
      ?>
      <script>

var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

      </script>
      
      <section class="banner_main" style="padding: 140px 0px 0px 0px;">
      <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal" style="display:none"></a>
         <input type="hidden" id="countDeliveries" name="countDeliveries" value=<?php echo count($deliverys); ?>>
         <input type="hidden" id="id_user" name="id_user" value="<?php echo $_SESSION['userAdmin'][0]['domiciliary_id']; ?>">
         <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container-fluid">
                     <div class="carousel-caption">

                        <div class="row" id="DinamicContentDesktop">
            
                           <div class="col-md-12 col-lg-12">
                              <div class="row w-100 text-dark"  >
                                 <div class="card shadow mb-4 w-100 "> 
                                    <div >
                                       <div><h2>Histórico de Domicilios</h2></div>
                                       <div class="table-responsive">
                                          <table class="table table-bordered" id="dataTableDomiciliary" width="100%" cellspacing="0">
                                                <thead>
                                                   <tr>
                                                      <th>Guia</th>
                                                      <th>Cliente</th>
                                                      <th>Domiciliario</th>
                                                      <th>Origen</th>
                                                      <th>Destino</th>
                                                      <th>Estado</th>                                                      
                                                      <!--<th style="width: 5%;">Gestionar</th>-->
                                                   </tr>
                                                </thead>
                                                <tfoot>
                                                   <tr>
                                                      <th>Guia</th>
                                                      <th>Cliente</th>
                                                      <th>Domiciliario</th>
                                                      <th>Origen</th>
                                                      <th>Destino</th>
                                                      <th>Estado</th>                                                      
                                                      <!--<th style="width: 5%;">Gestionar</th>-->
                                                   </tr>
                                                </tfoot>
                                                <tbody>

                                                <?php 
                                                    if(count($deliverys)>0){
                                                      foreach ($deliverys as $key => $value) {
                                                         $domiciliary = "Sin Asignar";
                                                         if($value['id_domiciliary']!=''){
                                                            $domiciliary = $value['name_domiciliary'];
                                                         }
                                                            echo '<tr class="odd gradeX">'; 
                                                            
                                                            echo '<td class="text-left">'.$value['code'].str_pad($value['consecutive'], 4, '0', STR_PAD_LEFT).'</td>';
                                                            echo '<td class="text-left">'.$value['name_client'].'</td>';
                                                            echo '<td class="text-left">'.$domiciliary.'</td>';
                                                            echo '<td class="text-left">'.$value['address_client'].'</td>';
                                                            echo '<td class="text-left">'.$value['recipient_address'].'</td>';
                                                            echo '<td class="text-left">'.$value['name_status'].'</td>';
                                                            //echo '<td class="text-center"><a style="cursor:pointer;"  class="btnEdit" data-id="'.$value['idd'].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'images/view.png"></a></td>';                                                            echo '</tr>';
                                                      } 
                                                   }else{
                                                      echo '<tr class="odd"><td valign="top" colspan="7" class="dataTables_empty">No se encontraron registros</td></tr>';
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


                        <div class="row" id="DinamicContentMovile" style="margin-right:0px !important; margin-left:0px !important; ">
                           <div class="col-md-12 col-lg-12" style="padding-right: 0px !important; padding-left:0px !important; ">
                              <div class="w-100 text-dark"  >
                                 <div class="card shadow mb-4 w-100 ">
                                    <div class="card shadow mb-4 w-100 "  style="padding: 10px;">
                                       <div><h2 class="font-weight-bold text-primary text-uppercase">Filtro</h2></div>
                                       <label class="font-weight-bold text-primary text-uppercase">Año</label>
                                       <select class="form-control" id="filter_year" name="filter_year">
                                          <option>2023</option>
                                          <option selected>2024</option>
                                       </select>
                                       <label class="font-weight-bold text-primary text-uppercase">Mes</label>
                                       <select class="form-control" id="filter_month" name="filter_month">
                                          <option value="0">Selecciona</option>
                                          <option value="13">Todos los meses</option>
                                          <option value="01" <?php if(date("m") == '01'){ echo 'selected'; }?>>Enero</option>
                                          <option value="02" <?php if(date("m") == '02'){ echo 'selected'; }?>>Febrero</option>
                                          <option value="03" <?php if(date("m") == '03'){ echo 'selected'; }?>>Marzo</option>
                                          <option value="04" <?php if(date("m") == '04'){ echo 'selected'; }?>>Abril</option>
                                          <option value="05" <?php if(date("m") == '05'){ echo 'selected'; }?>>Mayo</option>
                                          <option value="06" <?php if(date("m") == '06'){ echo 'selected'; }?>>Junio</option>
                                          <option value="07" <?php if(date("m") == '07'){ echo 'selected'; }?>>Julio</option>
                                          <option value="08" <?php if(date("m") == '08'){ echo 'selected'; }?>>Agosto</option>
                                          <option value="09" <?php if(date("m") == '09'){ echo 'selected'; }?>>Septiembre</option>
                                          <option value="10" <?php if(date("m") == '10'){ echo 'selected'; }?>>Octubre</option>
                                          <option value="11" <?php if(date("m") == '11'){ echo 'selected'; }?>>Noviembre</option>
                                          <option value="12" <?php if(date("m") == '12'){ echo 'selected'; }?>>Diciembre</option>
                                       </select>
                                       <table>
                                          <tr>
                                             <td class="font-weight-bold text-primary text-uppercase">Exitosos</td>
                                             <td class="font-weight-bold text-primary text-uppercase">En Ruta</td>
                                          </tr>
                                          <tr>
                                             <td id="content_exitosos">0</td>
                                             <td id="content_ruta">0</td>
                                          </tr>
                                          <tr>
                                             <td class="font-weight-bold text-primary text-uppercase">Con Novedad</td>
                                             <td class="font-weight-bold text-primary text-uppercase">Cancelados</td>
                                          </tr>
                                          <tr>
                                             <td id="content_novedad">0</td>
                                             <td id="content_cancelado">0</td>
                                          </tr>
                                          <tr>
                                             <td class="font-weight-bold text-primary text-uppercase" colspan = 2>Domis Pagados</td>
                                          </tr>
                                          <tr>
                                             <td id="content_pagados" colspan = 2>0</td>
                                          </tr>
                                       </table>
                                    </div> 
                                    
                                    <div>
                                       <div><h2 class="font-weight-bold text-primary text-uppercase">Histórico</h2></div>
                                       <?php 
                                          if(count($deliverys)>0){
                                          foreach ($deliverys as $key => $value) {
                                             $domiciliary = "Sin Asignar";
                                             if($value['id_domiciliary']!=''){
                                                $domiciliary = $value['name_domiciliary'];
                                             }
                                             $origin_address = $value['address_client'];
                                             $recipient_address = $value['recipient_address'];
                                             $phone_origin = $value['phone_client'];
                                             $phone_recipient = $value['recipient_phone'];
                                             if($value['delivery_mode'] == 2){
                                                $recipient_address = $value['address_client'];
                                                $origin_address = $value['recipient_address']; 
                                                $phone_origin = $value['recipient_phone'];
                                                $phone_recipient = $value['phone_client'];
                                             }
                                             if( $phone_origin ==''){
                                                $phone_origin = 'No Tiene Teléfono';
                                             }
                                             if($phone_recipient ==''){
                                                $phone_recipient = 'No Tiene Teléfono';
                                             }

                                          ?>


                                          <table style="width:100%">
                                             <tr>
                                                <td style="width:40%; vertical-align: top;">
                                                   <table style="width:100%">

                                                      <tr>
                                                         <td>
                                                            <div class="table-responsive">
                                                               <div class="col-xl-3 col-md-6" style="padding-right:0px !important; padding-left: 0px !important;">
                                                                  <div class=" card border-left-primary shadow h-100 py-2"><div>
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div class="col mr-2">
                                                                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Guía</div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                           <i class="fas fa-donate fa-2x text-gray-300"></i>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td>
                                                            <div class="table-responsive">
                                                               <div class="col-xl-3 col-md-6" style="padding-right:0px !important; padding-left: 0px !important;">
                                                                  <div class=" card border-left-primary shadow h-100 py-2"><div>
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div class="col mr-2">
                                                                           

                                                                           <div style="text-align: center; color: red; font-size: 20px;">
                                                                                 <?php echo $value['code'].str_pad($value['consecutive'], 4, '0', STR_PAD_LEFT); ?>
                                                                                 <input type="hidden" class="id_delivery" id="id_delivery<?php echo $value['idd']; ?>" name="id_delivery<?php echo $value['idd']; ?>" value="<?php echo $value['idd']; ?>">
                                                                                 <input type="hidden" class="uuidClient" id="uuidClient<?php echo $value['idd']; ?>" name="uuidClient<?php echo $value['idd']; ?>" value="<?php echo $value['uuid_client']; ?>">
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                           <i class="fas fa-donate fa-2x text-gray-300"></i>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td>
                                                            <div class="table-responsive">
                                                               <div class="col-xl-3 col-md-6" style="padding-right:0px !important; padding-left: 0px !important;">
                                                                  <div class=" card border-left-primary shadow h-100 py-2"><div>
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div class="col mr-2">
                                                                           <div class=" text-xs font-weight-bold text-primary text-uppercase mb-1">Gestión</div>

                                                                        </div>
                                                                        <div class="col-auto">
                                                                           <i class="fas fa-donate fa-2x text-gray-300"></i>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td>
                                                            <div class="table-responsive">
                                                               <div class="col-xl-3 col-md-6" style="padding-right:0px !important; padding-left: 0px !important;">
                                                                  <div class=" card border-left-primary shadow h-100 py-2"><div>
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div class="col mr-2">
                                                                           <div class=" text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                                              <select class="form-control id_delivery_status" id="id_delivery_status<?php echo $value['idd']; ?>" data-id="<?php echo $value['idd']; ?>" name="id_delivery_status<?php echo $value['idd']; ?>" style="font-weight: bold; text-align:center" disabled required>
                                                                                 <option value="">Seleccione un estado</option>
                                                                                 <?php 
                                                                                    foreach ($statuses as $valueSel) {
                                                                                       if($value['id_status'] == $valueSel['id'] ){
                                                                                          echo '<option value='.$valueSel['id'].' selected>'.$valueSel['name'].'</option>';
                                                                                       }else{
                                                                                          echo '<option value='.$valueSel['id'].'>'.$valueSel['name'].'</option>';
                                                                                       }
                                                                                          
                                                                                    }
                                                                                 ?>
                                                                              </select>
                                                                           </div>

                                                                        </div>
                                                                        <div class="col-auto">
                                                                           <i class="fas fa-donate fa-2x text-gray-300"></i>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                     <!-- <tr>
                                                         <td>
                                                            <div class="table-responsive">
                                                               <div class="col-xl-3 col-md-6" style="padding-right:0px !important; padding-left: 0px !important;">
                                                                  <div class=" card border-left-primary shadow h-100 py-2"><div>
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div class="col mr-2">
                                                                          

                                                                        <div id="text_status<?php //echo $value['idd']; ?>" class=" text-xs font-weight-bold text-uppercase mb-2" style="font-size: 25px; margin: 0px !important;">
                                                                                 <?php //echo $value['name_status']; ?>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                           <i class="fas fa-donate fa-2x text-gray-300"></i>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </td>
                                                      </tr>-->
                                                      <tr>
                                                         <td>
                                                            <div class="table-responsive">
                                                               <div class="col-xl-3 col-md-6" style="padding-right:0px !important; padding-left: 0px !important;">
                                                                  <div class=" card border-left-primary shadow h-100 py-2"><div>
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div class="col mr-2">
                                                                          

                                                                        <div id="text_status<?php echo $value['idd']; ?>" class=" text-xs font-weight-bold text-uppercase mb-2" style="font-size: 15px; margin: 0px !important; color:red">
                                                                                 <?php echo $value['name_type_service'].': $'. number_format($value['price_total'], 0, ',', '.');; ?>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                           <i class="fas fa-donate fa-2x text-gray-300"></i>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                   </table>
                                                         
                                                
                                                </td>
                                                <td>
                                                   <table style="width:100%">

                                                      <tr>
                                                         <td>
                                                            <div class="table-responsive">
                                                               <div class="col-xl-3 col-md-6" style="padding-right:0px !important; padding-left: 0px !important;">
                                                                  <div class=" card border-left-primary shadow h-100 py-2"><div>
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div class="col mr-2">
                                                                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">ORIGEN</div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                           <i class="fas fa-donate fa-2x text-gray-300"></i>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td>
                                                            <div class="table-responsive">
                                                               <div class="col-xl-3 col-md-6" style="padding-right:0px !important; padding-left: 0px !important;">
                                                                  <div class=" card border-left-primary shadow h-100 py-2"><div>
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div class="col mr-2">
                                                                           <div style="text-align: center; font-size: 15px;">
                                                                           <?php echo $origin_address; ?>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                           <i class="fas fa-donate fa-2x text-gray-300"></i>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td>
                                                            <div class="table-responsive">
                                                               <div class="col-xl-3 col-md-6" style="padding-right:0px !important; padding-left: 0px !important;">
                                                                  <div class=" card border-left-primary shadow h-100 py-2"><div>
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div class="col mr-2">
                                                                        

                                                                           <div style="text-align: center; font-size: 15px;">
                                                                                 <?php 
                                                                                    echo  $phone_origin; 
                                                                                    if($phone_origin != 'No Tiene Teléfono'){
                                                                                       echo '<a target=blank href="https://wa.me/'.$phone_origin.'"><img style="float: right;" src="'.URL.VIEWS.DTF.'images/icono_whatsapp.png"></a>';
                                                                                    }
                                                                                 ?>
                                                                                 
                                                                                 
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                           <i class="fas fa-donate fa-2x text-gray-300"></i>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td>
                                                            <div class="table-responsive">
                                                               <div class="col-xl-3 col-md-6" style="padding-right:0px !important; padding-left: 0px !important;">
                                                                  <div class=" card border-left-primary shadow h-100 py-2"><div>
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div class="col mr-2">
                                                                        
                                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">DESTINO</div>
                                                                
                                                                        </div>
                                                                        <div class="col-auto">
                                                                           <i class="fas fa-donate fa-2x text-gray-300"></i>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td>
                                                            <div class="table-responsive">
                                                               <div class="col-xl-3 col-md-6" style="padding-right:0px !important; padding-left: 0px !important;">
                                                                  <div class=" card border-left-primary shadow h-100 py-2"><div>
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div class="col mr-2">
                                                                        

                                                                           <div style="text-align: center; font-size: 15px;">
                                                                           <?php echo $recipient_address; ?>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                           <i class="fas fa-donate fa-2x text-gray-300"></i>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td>
                                                            <div class="table-responsive">
                                                               <div class="col-xl-3 col-md-6" style="padding-right:0px !important; padding-left: 0px !important;">
                                                                  <div class=" card border-left-primary shadow h-100 py-2"><div>
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div class="col mr-2">
                                                                        

                                                                           <div style="text-align: center; font-size: 15px;">
                                                                              <?php 
                                                                                 echo  $phone_recipient;
                                                                                 if($phone_recipient != 'No Tiene Teléfono'){
                                                                                    echo '<a target=blank href="https://wa.me/'.$phone_recipient.'"><img style="float: right;" src="'.URL.VIEWS.DTF.'images/icono_whatsapp.png"></a>';
                                                                                 }
                                                                              ?>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                           <i class="fas fa-donate fa-2x text-gray-300"></i>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      
                                                      </table>
                                                </td>
                                                
                                             </tr>
                                             <tr>
                                                <td colspan="2">
                                                   <div class="table-responsive">
                                                               <div class="col-xl-12 col-md-12" style="padding-right:0px !important; padding-left: 0px !important;">
                                                                  <div class=" card border-left-primary shadow h-100 py-2"><div>
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div class="col mr-2">
                                                                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Observaciones</div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td colspan="2">
                                                      <div class="table-responsive">
                                                         <div class="table-responsive">
                                                               <div class="col-xl-3 col-md-6" style="padding-right:0px !important; padding-left: 0px !important;">
                                                                  <div class=" card border-left-primary shadow h-100 py-2"><div>
                                                                     <div class="row no-gutters align-items-center">
                                                                        <div class="col mr-2">
                                                                           <div style="text-align: center; font-size: 15px;">
                                                                           <?php echo '<b>Cliente: </b>'.$value['recipient_name'].'<br>'. $value['observation']; ?>
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                           <i class="fas fa-donate fa-2x text-gray-300"></i>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                   </td>
                                                </tr>
                                          </table>
                                          <hr style="background-color: #007bff; border-top: 3px solid #007bff">
                                       <?php 
                                          }
                                          }else{
                                            echo '<h3 style="color:red">No hay guías con este estado</h3>';
                                         }
                                       ?>
                                       
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

      
        if($('#countDeliveries').val() > 0){
         $('#dataTableDomiciliary').DataTable({
            order: [[0, 'desc']]
         });

         $('#dataTableDomiciliary_length').css({'text-align':'left'});
         $('#dataTableDomiciliary_info').css({'text-align':'left'});
      }

      $('#filter_month').on('change', function(){
         $.ajax({
               type:"POST",
               url: "<?php echo URL; ?>ManageDelivery/countDeliverybyDomiciliary",
               data: {  id_user:parseInt($("#id_user").val()),
                        year:parseInt($('#filter_year').val()),
                        month:parseInt($('#filter_month').val())
                     },
               success: function(response){
                  if(response != 0){
                        response = JSON.parse(response);
                        $('#content_exitosos').text(response[0]['domicilios_exitosos']);
                        $('#content_ruta').text(response[0]['domicilios_en_ruta']);
                        $('#content_novedad').text(response[0]['domicilios_con_novedad']);
                        $('#content_cancelado').text(response[0]['domicilios_cancelados']);
                        $('#content_pagados').text(response[0]['domicilios_pagados']);
                     }else{
                        console.log('error');
                     }
               }
            });
      })
      
      $('#filter_year').on('change', function(){
         $('#filter_month').val(0);
      });
    
      $('#filter_month').change();

      
      $('.btnEdit').on('click', function(){
         window.location.href = "<?php echo URL; ?>ManageDelivery/view/"+$(this).attr("data-id"); 
      }); 

      if(isMobile.any()) {
         console.log('Esto es un dispositivo móvil, si especificar cuál');
         $( "#DinamicContentDesktop" ).hide();
         $( "#DinamicContentMovile" ).show();
         $("#btnMenu").attr('src',"https://logistica.comerciovirtualseguro.com/Views/Default/images/icono_menu_mobile.png");
      }else{
         console.log('Desktop');
         $( "#DinamicContentDesktop" ).show();
         $( "#DinamicContentMovile" ).hide();
      }


      $(".id_delivery_status").on('change',function () {
         event.preventDefault();
         if($(this).val() != ''){
            //console.log($(this).val());
            //console.log($('#id_delivery_status'+$(this).attr("data-id")+' option:selected').text());
            //console.log($(this).attr("data-id") );
            //console.log($('#uuidClient'+$(this).attr("data-id")).val());
            
            var id_delivery = $.trim($(this).attr("data-id") );
            var id_delivery_status = $.trim($(this).val());
            var description_delivery_status = $.trim($('#id_delivery_status'+$(this).attr("data-id")+' option:selected').text());
            var uuidClient = $.trim($('#uuidClient'+$(this).attr("data-id")).val());
            //console.log(description_delivery_status);
            //console.log(uuidClient);

            $.ajax({
               type:"POST",
               url: "<?php echo URL; ?>ManageDelivery/statusDelivery",
               data: {  id_delivery:id_delivery,
                        id_delivery_status:id_delivery_status,
                        description_delivery_status:description_delivery_status,
                        uuidClient:uuidClient
                     },
               success: function(response){
                  if(response != 0){
                        jQuery("#modalMessage").text('Guía gestionada correctamente!');
                        jQuery("#modalMessage").css({ 'color': 'green'});
                        jQuery("#showGeneralModal")[0].click();
                        jQuery('#btnAceptarModal').bind( "click", function() {
                        //window.location.href = "<?php echo URL; ?>ManageDelivery/index/"; 
                           //$("#text_status"+id_delivery).text(description_delivery_status);
                        });
                     }else{
                        jQuery("#modalMessage").text('No se pudo gestionar la guía, valida por favor!');
                        jQuery("#modalMessage").css({ 'color': 'red'});
                        jQuery("#showGeneralModal")[0].click();
                     }
               }
            });
         }
         
        
      });

      

} );

      </script>




