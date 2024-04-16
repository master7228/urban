
<section class="banner_main" style="padding:180px 0px 0px 80px;">
      <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal" style="display:none"></a>
         <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">
         <?php 
         $data = $array[0];
         $dom = $array[1];
         ?>
                  <div class="container-fluid">
                     <form id="frmAssignmentDomiciliary" class="needs-validation">

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

                                                      <input type="hidden" id="id_delivery" name="id_delivery" value="<?php echo $data[0]['id']; ?>">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                   <label for="address_client" class="form-label">Teléfono</label>
                                                      <input type="text" id="phone_client" name="phone_client" class="form-control" value="<?php  echo $data[0]['phone_client']; ?>" readonly>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                   <label for="date_service" class="form-label">Fecha</label>
                                 
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
                                                <label for="recipient_name" class="form-label">Departamento</label>
                                                   <select name="id_departamento" id="id_departamento" class="form-control" required readonly disabled>
                                                      <option value="">Seleccione</option>
                                                      <?php 
                                                         foreach ($array[2] as $key => $value) {
                                                            if($data[0]['id_departamento'] == $value['id']){
                                                               echo '<option value="'.$value['id'].'" selected>'.$value['nombre'].'</option>';
                                                            }else{
                                                               echo '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
                                                            }
                                                            
                                                         }
                                                      ?>
                                                      
                                                   </select>
                                                <div class="invalid-feedback">
                                                   Por favor, selecciona el departamento.
                                                </div>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="recipient_address" class="form-label">Dirección</label>
                                                <input type="text" class="form-control" id="recipient_address" name="recipient_address" value="<?php echo $data[0]['recipient_address']; ?>" readonly >
                                                <div class="invalid-feedback">
                                                   Por favor, ingresa la dirección.
                                                </div>
                                             </div>

                                             <div class="col-md-12 form-group">
                                                <label for="valorDes" class="form-label">Valor del Domi</label>
                                                <input type="number" class="form-control" id="price_delivery" name="price_delivery" required value="<?php echo number_format($data[0]['price_delivery'], 0, ',', '.'); ?>" readonly>
                                                <div class="invalid-feedback">
                                                   Por favor, ingresa el valor.
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
                                                <label for="recipient_name" class="form-label">Ciudad</label>
                                                <select name="id_ciudad" id="id_ciudad" class="form-control" required readonly disabled></select>
                                                <div class="invalid-feedback">
                                                   Por favor, selecciona la ciudad.
                                                </div>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="valorDes" class="form-label">Valor del producto</label>
                                                <input type="number" class="form-control" id="recipient_price" name="recipient_price" value="<?php echo number_format($data[0]['recipient_price'], 0, ',', '.'); ?>" readonly>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="valorDes" class="form-label">Valor Total</label>
                                                <input type="number" class="form-control" id="total_price" name="total_price"  value="<?php echo number_format($data[0]['price_total'], 0, ',', '.'); ?>" readonly>
                                             </div>
                                          
                                             
                                       
                                          
                                       </div>
                                       <div class="col-md-12 form-group">
                                                <label for="recipient_observation" class="form-label">Obervación</label>
                                                <textarea class="form-control" id="recipient_observation" name="recipient_observation" rows="5" readonly><?php echo $data[0]['observation']; ?></textarea>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="recipient_observation" class="form-label">Domiciliario</label>
                                                <select class="form-control" id="id_domiciliary" name="id_domiciliary" required>
                                                   <option value="">Seleccione un domiciliario</option>
                                                   <?php 
                                                      foreach ($dom as $value) {
                                                         if($data[0]['id_domiciliary'] == $value['id']){
                                                            echo '<option value='.$value['id'].' selected>'.$value['name'].'</option>';
                                                         }else{
                                                            echo '<option value='.$value['id'].'>'.$value['name'].'</option>';
                                                         }
                                                      }
                                                   ?>
                                                </select>
                                             </div>
                                             
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row" style="max-width: 100%; text-align: center;margin-top: 20px;">
                              <div class="col-md-12">
                                 <button type="submit" class="get_now btn_primary" id="sendLogin">Asignar</button>
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
            var forms = $("#frmAssignmentDomiciliary");
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    var id_delivery = $.trim($("#id_delivery").val());
                    var id_domiciliary = $.trim($("#id_domiciliary").val());
                    

                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>AssignmentDomiciliary/assignment",
                        data: {  id_delivery:id_delivery,
                                 id_domiciliary:id_domiciliary
                              },
                        success: function(response){
                           if(response != 0){
                                jQuery("#modalMessage").text('Guía asignada correctamente!');
                                jQuery("#modalMessage").css({ 'color': 'green'});
                                jQuery("#showGeneralModal")[0].click();
                                jQuery('#btnAceptarModal').bind( "click", function() {
                                 window.location.href = "<?php echo URL; ?>AssignmentDomiciliary/index/"; 
                                });
                            }else{
                                jQuery("#modalMessage").text('No se pudo asignar, valida por favor!');
                                jQuery("#modalMessage").css({ 'color': 'red'});
                                jQuery("#showGeneralModal")[0].click();
                            }
                        }
                    });

                });
            });
        });
      
      
        $(document).ready(function () {
         $('#id_departamento').on('change',function () {
               $('#id_ciudad option').remove();
               $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>Delivery/getCiudades",
                        data: {  id_departamento:$('#id_departamento').val() },
                        success: function(response){
                           if(response != 0){
                              ciu =JSON.parse(response);
                              ciu.forEach(element => {
                                 $("#id_ciudad").append(new Option(element.nombre, element.id));
                              });
                            }else{
                                console.log('error');
                            }
                        }
                    });
            });

            $('#goApp').on('click',function(){
               event.preventDefault();
               window.location.href = "<?php echo URL; ?>AssignmentDomiciliary/index/"; 
            });
            $('#id_departamento').change();
        });

      </script>




