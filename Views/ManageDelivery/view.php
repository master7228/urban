
<section class="banner_main" style="padding:180px 0px 0px 80px;">
      <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal" style="display:none"></a>
         <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">
         <?php 
         $data = $array[0];
         $statuses = $array[1];
         ?>
                  <div class="container-fluid">
                     <form id="frmManageDelivery" class="needs-validation">

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
                                                      <div class="col-md-12" style="text-align: left; padding: 0;">
                                                      <h3>Cliente</h3><br>
                                                         <b><?php echo $data[0]['name_client']; ?></b>
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
                                                      <input type="hidden" id="uuidClient" name="uuidClient" value="<?php echo $data[0]['uuid_client']; ?>">
                                                      <input type="hidden" id="id_delivery" name="id_delivery" value="<?php echo $data[0]['id']; ?>">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                   <label for="date_service" class="form-label">Fecha</label>
                                 
                                                      <input type="date" id="date_service"  name="date_service"  class="form-control" min = "<?php echo $minPicker;?>" value="<?php echo $data[0]['date_service']; ?>" readonly>
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


                           <div class="row" style="max-width: 100%; text-align: center;margin-top: 20px;">
                                 <div class="col-md-12 form-group">
                                    <label for="recipient_observation" class="form-label">Estado de la guía</label>
                                    <select class="form-control" id="id_delivery_status" name="id_delivery_status" required>
                                       <option value="">Seleccione un estado</option>
                                       <?php 
                                          foreach ($statuses as $value) {
                                          if($data[0]['id_status'] == $value['id'] ){
                                             echo '<option value='.$value['id'].' selected>'.$value['name'].'</option>';
                                          }else{
                                             echo '<option value='.$value['id'].'>'.$value['name'].'</option>';
                                          }
                                                
                                          }
                                       ?>
                                    </select>
                                 </div>
                                 <div class="col-md-12 form-group">
                                                <label for="recipient_observation" class="form-label">Obervación del estado</label>
                                                <textarea class="form-control" id="description_delivery_status" name="description_delivery_status" rows="9"><?php echo $data[0]['status_description']; ?></textarea>
                                             </div>
                              <div class="col-md-12">
                                 <button type="submit" class="get_now btn_primary" id="sendLogin">Guardar</button>
                                 <button class="get_now btn_primary" id="goApp" name="goApp">Volver</button>
                              </div>
                           </div>
                     </form>
                  </div>
         </div>
      </section>

      <script> 
      $(function () {
            "use strict";
            var forms = $("#frmManageDelivery");
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    var id_delivery = $.trim($("#id_delivery").val());
                    var id_delivery_status = $.trim($("#id_delivery_status").val());
                    var description_delivery_status = $.trim($("#description_delivery_status").val());
                    var uuidClient = $.trim($("#uuidClient").val());

                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>ManageDelivery/statusDelivery",
                        data: {  id_delivery:id_delivery,
                                 id_delivery_status:id_delivery_status,
                                 description_delivery_status:description_delivery_status,
                                 uuidClient:uuidClient
                              },
                        success: function(response){
                           console.log(response);
                          if(response != 0){
                                jQuery("#modalMessage").text('Guía gestionada correctamente!');
                                jQuery("#modalMessage").css({ 'color': 'green'});
                                jQuery("#showGeneralModal")[0].click();
                                jQuery('#btnAceptarModal').bind( "click", function() {
                                 window.location.href = "<?php echo URL; ?>ManageDelivery/index/"; 
                                });
                            }else{
                                jQuery("#modalMessage").text('No se pudo gestionar la guía, valida por favor!');
                                jQuery("#modalMessage").css({ 'color': 'red'});
                                jQuery("#showGeneralModal")[0].click();
                            }
                        }
                    });

                });
            });
        });
      
      
        $(document).ready(function () {

            $('#goApp').on('click',function(){
               event.preventDefault();
               window.location.href = "<?php echo URL; ?>ManageDelivery/index/"; 
            });
        });

      </script>




