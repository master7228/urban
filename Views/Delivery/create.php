<script>

function changeDepto () {
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
            }

function changeRecipientPrice () {
               if($('#price_delivery').val() != ''){
                  $('#total_price').val(parseInt($('#recipient_price').val())+parseInt($('#price_delivery').val()));
               }else{
                  $('#total_price').val(parseInt($('#recipient_price').val()));
               }
               
            }

function changePriceDelivery () {
               if($('#recipient_price').val() != ''){
                  $('#total_price').val(parseInt($('#recipient_price').val())+parseInt($('#price_delivery').val()));
               }else{
                  $('#total_price').val(parseInt($('#price_delivery').val()));
               }
            }
</script>
      <section class="banner_main" style="padding:180px 0px 0px 80px;">
      <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal" style="display:none"></a>
         <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">
         <?php 
         
         //print_r($_SESSION['client']); 
         
            
            $type_services = $array[0];
         ?>
                  <div class="container-fluid">
                     <form id="frmDelivery" class="needs-validation">


                        <div class="row" style="max-width: 1100px;text-align: center; margin-bottom: 20px; background-color: #e1e0e066; margin-top: 10px; display:none">
                           <div class="col-md-12">
                              <span style="color: red; font-size: 20px; font-weight: bolder;">N° Guía</span>
                                 <h3><?php echo $_SESSION['client']['urban_code']; ?></h3>
                           </div>
                        </div>


                           <div class="row" style="max-width: 1100px;text-align: center; margin-bottom: 20px;">
                              <div class="col-md-12">
                                 <i class="fa fa-exchange urban-change" aria-hidden="true" id="changeMode"></i>
                              </div>
                           </div>
                           <div id="container" class="row" style="max-width: 1100px;">
                           
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
                                                      <input type="text" id="address_client" name="address_client" class="form-control" required>
                                                      <input type="hidden" id="uuidClient" name="uuidClient" value="<?php echo $_SESSION['client']['id']; ?>">
                                                      <input type="hidden" id="codeClient" name="codeClient" value="<?php echo $_SESSION['client']['urban_code']; ?>">
                                                      <input type="hidden" id="nameClient" name="nameClient" value="<?php echo $_SESSION['client']['name'].' '.$_SESSION['client']['last_name']; ?>">
                                                      <input type="hidden" id="phoneClient" name="phoneClient" value="<?php echo $_SESSION['client']['phone']; ?>">
                                                      <input type="hidden" id="delivery_mode" name="delivery_mode" value="1">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                   <label for="date_service" class="form-label">Fecha</label>
                                                   <?php 
                                                      $minPicker =  date("Y-m-d",strtotime(date("Y-m-d")));
                                                      if(date('N') != '7'){
                                                         if(date('H:i') > '14:00'){
                                                            $minPicker =  date("Y-m-d",strtotime(date("Y-m-d")."+ 1 days"));
                                                         }
                                                      }else{
                                                         $minPicker =  date("Y-m-d",strtotime(date("Y-m-d")."+ 1 days"));
                                                      }
                                                      
                                                   ?>
                                                      <input type="date" id="date_service"  name="date_service"  class="form-control" min = "<?php echo $minPicker;?>" required>
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
                                                <input type="text" class="form-control" id="recipient_product_name" name="recipient_product_name" required tabindex="1">
                                                <div class="invalid-feedback">
                                                   Por favor, ingresa el nombre del producto.
                                                </div>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="recipient_name" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="recipient_name" name="recipient_name" required tabindex="3">
                                                <div class="invalid-feedback">
                                                   Por favor, ingresa el nombre.
                                                </div>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="recipient_name" class="form-label">Departamento</label>
                                                   <select name="id_departamento" id="id_departamento" onclick="changeDepto()" class="form-control" required tabindex="5">
                                                      <option value="">Seleccione</option>
                                                      <?php 
                                                         foreach ($array[1] as $key => $value) {
                                                            echo '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
                                                         }
                                                      ?>
                                                      
                                                   </select>
                                                <div class="invalid-feedback">
                                                   Por favor, selecciona el departamento.
                                                </div>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="recipient_address" class="form-label">Dirección</label>
                                                <input type="text" class="form-control" id="recipient_address" name="recipient_address" required tabindex="7">
                                                <div class="invalid-feedback">
                                                   Por favor, ingresa la dirección.
                                                </div>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="valorDes" class="form-label">Valor del Domi</label>
                                                <input type="number" class="form-control" id="price_delivery" onchange="changePriceDelivery()" name="price_delivery" required tabindex="9">
                                                <div class="invalid-feedback">
                                                   Por favor, ingresa el valor.
                                                </div>
                                             </div>


                                             </div>
                                             <div class="col-md-6">
                                             <div class="col-md-12 form-group">
                                                <label for="recipient_phone" class="form-label">Teléfono</label>
                                                <input type="text" class="form-control" id="recipient_phone" name="recipient_phone" required tabindex="2">
                                                <div class="invalid-feedback">
                                                   Por favor, ingresa el teléfono.
                                                </div>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="cantidad" class="form-label">Tipo Servicio</label>
                                                <select name="typeService" id="typeService" class="form-control" required tabindex="4">
                                                   <option value="">Seleccione</option>
                                                <?php 
                                                   foreach ($array[0] as $key => $value) {
                                                      echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                                   }
                                                ?>
                                                   
                                                </select>
                                                <div class="invalid-feedback">
                                                   Por favor, seleccione el tipo de servicio.
                                                </div>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="recipient_name" class="form-label">Ciudad</label>
                                                <select name="id_ciudad" id="id_ciudad" class="form-control" required tabindex="6"></select>
                                                <div class="invalid-feedback">
                                                   Por favor, selecciona la ciudad.
                                                </div>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="valorDes" class="form-label">Valor del producto</label>
                                                <input type="number" class="form-control" id="recipient_price" name="recipient_price" onchange="changeRecipientPrice()" required tabindex="8">
                                                <div class="invalid-feedback">
                                                   Por favor, ingresa el valor.
                                                </div>
                                             </div>

                                             <div class="col-md-12 form-group">
                                                <label for="valorDes" class="form-label">Valor Total</label>
                                                <input type="number" class="form-control" id="total_price" name="total_price" readonly tabindex="10">
                                             </div>
                                          
                                             
                                       
                                          
                                       </div>
                                       <div class="col-md-12 form-group">
                                                <label for="recipient_observation" class="form-label">Obervación</label>
                                                <textarea class="form-control" id="recipient_observation" name="recipient_observation" rows="3" tabindex="11"></textarea>
                                             </div>
                                    </div>
                                 </div>
                              </div>





                           </div>
                           <div class="row" style="max-width: 1000px; text-align: center;margin-top: 20px;">
                              <div class="col-md-12">
                                 <button type="submit" class="get_now btn_primary" id="sendLogin">Generar Guía</button>
                                 <button class="get_now btn_primary" id="goApp" name="goApp">Mis Guías</button>
                              </div>
                           </div>
                     </form>
                  </div>
             
         </div>
      </section>

      <script>
        $(function () {
            "use strict";
            var forms = $("#frmDelivery");
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    var uuidCliente = $.trim($("#uuidClient").val());
                    var nameClient = $.trim($("#nameClient").val());
                    var phoneClient = $.trim($("#phoneClient").val());
                    var typeService = $.trim($("#typeService").val());
                    var id_status = 1;
                    var code = $.trim($("#codeClient").val());
                    var date_service = $.trim($("#date_service").val());
                    var address_client = $.trim($("#address_client").val());
                    var recipient_name = $.trim($("#recipient_name").val());
                    var recipient_product_name = $.trim($("#recipient_product_name").val());
                    var recipient_address = $.trim($("#recipient_address").val());
                    var recipient_phone = $.trim($("#recipient_phone").val());
                    var recipient_observation = $.trim($("#recipient_observation").val());
                    var price_delivery = parseInt($.trim($("#price_delivery").val()));
                    var recipient_price = parseInt($.trim($("#recipient_price").val()));
                    var price_total = parseInt($.trim($("#price_total").val()));
                    var delivery_mode = $.trim($("#delivery_mode").val());
                    var id_departamento = $.trim($("#id_departamento").val());
                    var id_ciudad = $.trim($("#id_ciudad").val());

                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>Delivery/create",
                        data: {  uuidCliente:uuidCliente,
                                 nameClient:nameClient,
                                 phoneClient:phoneClient,
                                 typeService:typeService,
                                 id_status:id_status,
                                 code:code,
                                 date_service:date_service,
                                 address_client:address_client,
                                 recipient_name:recipient_name,
                                 recipient_product_name:recipient_product_name,
                                 recipient_address:recipient_address,
                                 recipient_phone:recipient_phone,
                                 recipient_observation:recipient_observation,
                                 price_delivery:price_delivery,
                                 recipient_price:recipient_price,
                                 price_total:price_total,
                                 delivery_mode:delivery_mode,
                                 id_departamento:id_departamento,
                                 id_ciudad:id_ciudad
                              },
                        success: function(response){
                           if(response != 0){
                                jQuery("#modalMessage").text('Guía generada correctamente!');
                                jQuery("#modalMessage").css({ 'color': 'green'});
                                jQuery("#showGeneralModal")[0].click();
                                jQuery('#btnAceptarModal').bind( "click", function() {
                                 window.location.href = "<?php echo URL; ?>App/app/"+uuidCliente; 
                                });
                            }else{
                                jQuery("#modalMessage").text('Esta Empresa ya existe con este nit, valida por favor!');
                                jQuery("#modalMessage").css({ 'color': 'red'});
                                jQuery("#showGeneralModal")[0].click();
                            }
                        }
                    });

                });
            });
        });

        

        $(document).ready(function () {

         
            $('#recipient_price').on('change',function () {
               if($('#price_delivery').val() != ''){
                  $('#total_price').val(parseInt($('#recipient_price').val())+parseInt($('#price_delivery').val()));
               }else{
                  $('#total_price').val(parseInt($('#recipient_price').val()));
               }
               
            });

            $('#price_delivery').on('change',function () {
               if($('#recipient_price').val() != ''){
                  $('#total_price').val(parseInt($('#recipient_price').val())+parseInt($('#price_delivery').val()));
               }else{
                  $('#total_price').val(parseInt($('#price_delivery').val()));
               }
            });

            
            $('#id_departamento').bind('change',function () {
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
               window.location.href = "<?php echo URL; ?>App/app/"+$('#uuidClient').val(); 
            });
            $('#changeMode').on('click',function () {
               
                  if($("#delivery_mode").val() == 1){
                     $("#delivery_mode").val(2);
                     $("#delivery_mode").change();
                     var contenidoDiv1 = $('#box1').html();
                     var contenidoDiv2 = $('#box2').html();
                     $('#box1').html(contenidoDiv2);
                     $('#box2').html(contenidoDiv1);
                  }else{                     
                     var contenidoDiv1 = $('#box1').html();
                     var contenidoDiv2 = $('#box2').html();
                     $('#box1').html(contenidoDiv2);
                     $('#box2').html(contenidoDiv1);
                     $("#delivery_mode").val(1);
                     $("#delivery_mode").change();
                  }
                  
            });
        });

      </script>




