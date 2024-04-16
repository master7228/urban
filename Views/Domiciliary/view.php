
<section class="banner_main" style="padding:180px 0px 0px 80px;">
      <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal" style="display:none"></a>
         <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">
         <?php 
         $data = $array;
         print_r($data);
            
            $type_services = $array[0];
         ?>
                  <div class="container-fluid">
                     <form id="frmDelivery" class="needs-validation">

                     <div class="row" style="text-align: center;margin-top: 20px; width: 100%;">
                              <div class="col-md-12">
                                 <button class="get_now btn_primary" id="goApp" name="goApp">Mis Guías</button>
                              </div>
                           </div>
                        <div class="row" style="text-align: center;  width: 100%; margin-bottom: 20px; background-color: #e1e0e066; margin-top: 10px;">
                           <div class="col-md-12">
                              <span style="color: red; font-size: 20px; font-weight: bolder;">N° Guía</span>
                                 <h3><?php echo $data[0]['code'].str_pad($data[0]['consecutive'], 4, '0', STR_PAD_LEFT); ?></h3>
                           </div>
                        </div>


                        
                           <div id="container" class="row" style="width: 100%;">
                           
                              <div id="content1" class="col-md-7 col-lg-5" style="border: 1px solid;">
                                 
                                    <div class="col-lg-12 text-center"> <p>Origen</p></div>
                                       <div id="box1">
                                       <div class="row">
                                    
                                          <div class="col-lg-12">
                                                <div class="col-md-12 " style="display: inline-flex;">
                                                   <div class="col-md-7" style="text-align: center;padding-top: 30px;">
                                                      <img src="https://comerciovirtualseguro.com/system/users/avatars/eba/96a/9d-/thumb/<?php echo $_SESSION['client']['avatar_file_name'] ?>">
                                                      <div class="col-md-12" style="text-align: left; padding: 0;">
                                                         <?php echo $_SESSION['client']['name'].' '.$_SESSION['client']['last_name']; ?>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-5" style="text-align: center;" >
                                                      <h3>Bancolombia</h3>
                                                      <img src="https://comerciovirtualseguro.com/system/parameters/qr_codes/b25/add/f1-/medium/WhatsApp_Image_2023-07-17_at_1.02.08_PM.jpeg">
                                                   </div>
                                                </div>
                                          </div>
                                          <div class="col-md-12 ">
                                                <div class="col-md-12 form-group">
                                                   <label for="address_client" class="form-label">Dirección</label>
                                                      <input type="text" id="address_client" name="address_client" class="form-control" value="<?php echo $data[0]['address_client']; ?>" readonly>
                                                      <input type="hidden" id="uuidClient" name="uuidClient" value="<?php echo $_SESSION['client']['id']; ?>">
                                                      <input type="hidden" id="codeClient" name="codeClient" value="<?php echo $_SESSION['client']['urban_code']; ?>">
                                                      <input type="hidden" id="delivery_mode" name="delivery_mode" value="<?php echo $data[0]['delivery_mode']; ?>">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                   <label for="date_service" class="form-label">Fecha</label>
                                                   <?php 
                                                      $minPicker =  date("Y-m-d",strtotime(date("Y-m-d")));
                                                      if(date('N') != '7'){
                                                         if(date('H:i') > '17:30'){
                                                            $minPicker =  date("Y-m-d",strtotime(date("Y-m-d")."+ 1 days"));
                                                         }
                                                      }else{
                                                         $minPicker =  date("Y-m-d",strtotime(date("Y-m-d")."+ 1 days"));
                                                      }
                                                      
                                                   ?>
                                                      <input type="date" id="date_service"  name="date_service"  class="form-control" min = "<?php echo $minPicker;?>" value="<?php echo $data[0]['date_service']; ?>" readonly>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                   <label for="address_client" class="form-label">Estado de la guía</label>
                                                      <input type="text" id="delivery_status" name="delivery_status" class="form-control" value="<?php echo $data[0]['name_status']; ?>" readonly>
                                                </div>
                                          </div>



                                       </div>
                                    </div>      
                                 </div>
                              




                              <div id="content2" class="col-md-12 col-lg-7" style="border: 1px solid;">
                                 
                                    <div class="col-lg-12 text-center"> <p>Destino</p></div>
                                    <div id="box2">
                                    <div class="row">
                        
                                       <div class="col-md-6">
                                          
                                             <div class="col-md-12 form-group">
                                                <label for="recipient_product_name" class="form-label">Producto</label>
                                                <input type="text" class="form-control" id="recipient_product_name" name="recipient_product_name" value="<?php echo $data[0]['recipient_product_name']; ?>" readonly>
                                                <div class="invalid-feedback">
                                                   Por favor, ingresa el nombre del producto.
                                                </div>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="recipient_name" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="recipient_name" name="recipient_name" value="<?php echo $data[0]['recipient_name']; ?>" readonly>
                                                <div class="invalid-feedback">
                                                   Por favor, ingresa el nombre.
                                                </div>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="recipient_address" class="form-label">Dirección</label>
                                                <input type="text" class="form-control" id="recipient_address" name="recipient_address" value="<?php echo $data[0]['recipient_address']; ?>" readonly>
                                                <div class="invalid-feedback">
                                                   Por favor, ingresa la dirección.
                                                </div>
                                             </div>


                                             </div>
                                             <div class="col-md-6">
                                             <div class="col-md-12 form-group">
                                                <label for="recipient_phone" class="form-label">Teléfono</label>
                                                <input type="text" class="form-control" id="recipient_phone" name="recipient_phone" value="<?php echo $data[0]['recipient_phone']; ?>" readonly>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="cantidad" class="form-label">Tipo Servicio</label>
                                                <input type="text" class="form-control" id="typeService" name="typeService" value="<?php echo $data[0]['name_type_service']; ?>" readonly>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="valorDes" class="form-label">Valor</label>
                                                <input type="number" class="form-control" id="recipient_price" name="recipient_price" value="<?php echo $data[0]['recipient_price']; ?>" readonly>
                                             </div>
                                          
                                             
                                       
                                          
                                       </div>
                                       <div class="col-md-12 form-group">
                                                <label for="recipient_observation" class="form-label">Obervación</label>
                                                <textarea class="form-control" id="recipient_observation" name="recipient_observation" rows="5" readonly><?php echo $data[0]['observation']; ?></textarea>
                                             </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           

                           <div class="row" style="margin-top: 20px;" >
                           <div class="col-md-12 col-lg-12">
                              <div class="row w-100 text-dark" >
                                 <div class="card shadow mb-4 w-100 ">
                                    <div class="card-body">
                                       <div class="text-center"><h2>Estados de la guía</h2></div>
                                       <div class="table-responsive">
                                          <table class="table table-bordered" id="dataTableStatusDelivery" width="100%" cellspacing="0">
                                                <thead>
                                                   <tr>
                                                      <th>Descripción</th>
                                                      <th style="width: 20%;">Fecha</th>
                                                   </tr>
                                                </thead>
                                                <tfoot>
                                                   <tr>
                                                      <th>Descripción</th>
                                                      <th style="width: 20%;">Fecha</th>
                                                   </tr>
                                                </tfoot>
                                                <tbody>

                                                <?php 
                                                    if(count($array)>0){
                                                      foreach ($array as $key => $value) {
                                                            echo '<tr class="odd gradeX">'; 
                                                            echo '<td class="text-left">'.$value['status_description'].'</td>';
                                                            echo '<td class="text-left">'.date("d/m/Y H:i", strtotime($value['date_status'])).'</td>';                                                      } 
                                                   }else{
                                                      echo '<tr class="odd"><td valign="top" colspan="2" class="dataTables_empty">No se encontraron registros</td></tr>';
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
                     </form>
                  </div>
         </div>
      </section>

      <script>        

        $(document).ready(function () {

            $('#goApp').on('click',function(){
               event.preventDefault();
               window.location.href = "<?php echo URL; ?>App/app/"+$('#uuidClient').val(); 
            });

            $('#dataTableStatusDelivery').DataTable({
            order: [[1, 'desc']]
         });
        });

      </script>




