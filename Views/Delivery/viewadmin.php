
<section class="banner_main" style="padding:180px 0px 0px 80px;">
      <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal" style="display:none"></a>
         <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">
         <?php 
         $data = $array[0];
         $client = $array[1][0];
         ?>
                  <div class="container-fluid">
                     <form id="frmDelivery" class="needs-validation">
                     <input type="hidden" id="delivery_mode" name="delivery_mode" value="<?php echo $data[0]['delivery_mode']; ?>">
                     <div class="row" style="text-align: center;margin-top: 20px; width: 100%;">
                              <div class="col-md-12">
                                 <?php /*if(isset($_SESSION['client']['temp']) && ($_SESSION['client']['temp'] == 1)){
                                    echo '<button class="get_now btn_primary" id="goAppAdmin" name="goAppAdmin">Volver</button>';
                                 }else{
                                    echo '<button class="get_now btn_primary" id="goApp" name="goApp">Mis Guías</button>';
                                 } */?>
                                 
                                 <?php if(isset($_SESSION['client']['idDB'])){
                                    echo '<input type="hidden" id="client_idDB" name="client_idDB" value="'.$_SESSION['client']['idDB'].'">';
                                 }else{
                                    echo '<input type="hidden" id="client_idDB" name="client_idDB" value="0">';
                                 } ?>
               
                              </div>
                           </div>
                        <div class="row" style="text-align: center;  width: 100%; margin-bottom: 20px; background-color: #e1e0e066; margin-top: 10px;">
                           <div class="col-md-12">
                              <span style="color: red; font-size: 20px; font-weight: bolder;">N° Guía</span>
                                 <h3><?php echo $data[0]['code'].str_pad($data[0]['consecutive'], 3, '0', STR_PAD_LEFT); ?></h3>
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
                                                      <img src="https://comerciovirtualseguro.com/system/users/avatars/eba/96a/9d-/thumb/<?php echo $client['avatar_file_nameclient'] ?>">
                                                      <div class="col-md-12" style="text-align: left; padding: 0;">
                                                         <?php echo $client['nameclient'].' '.$client['last_nameclient']; ?>
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
                                                      <input type="text" id="address_client" name="address_client" class="form-control" value="<?php echo $data[0]['address_client']; ?>">
                                                      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data[0]['id']; ?>">
                                                      <input type="hidden" id="uuidClient" name="uuidClient" value="<?php echo $client['idclient']; ?>">
                                                      <input type="hidden" id="codeClient" name="codeClient" value="<?php echo $client['urban_codeclient']; ?>">
                                                      <input type="hidden" id="delivery_mode" name="delivery_mode" value="<?php echo $data[0]['delivery_mode']; ?>">
                                                      <input type="hidden" id="nameClient" name="nameClient" value="<?php echo $client['nameclient'].' '.$client['last_nameclient']; ?>">
                                                    
                                                      <input type="hidden" id="delivery_mode" name="delivery_mode" value="1">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                   <label for="address_client" class="form-label">Teléfono</label>
                                                      <input type="text" id="phoneClient" name="phoneClient" class="form-control" value="<?php echo $client['phoneclient']; ?>">
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
                                                      <input type="date" id="date_service"  name="date_service"  class="form-control" min = "<?php echo $minPicker;?>" value="<?php echo $data[0]['date_service']; ?>">
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
                                                <input type="text" class="form-control" id="recipient_product_name" name="recipient_product_name" value="<?php echo $data[0]['recipient_product_name']; ?>">
                                                <div class="invalid-feedback">
                                                   Por favor, ingresa el nombre del producto.
                                                </div>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                
                                                <label for="recipient_name" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="recipient_name" name="recipient_name" value="<?php echo $data[0]['recipient_name']; ?>">
                                                <div class="invalid-feedback">
                                                   Por favor, ingresa el nombre.
                                                </div>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="recipient_name" class="form-label">Departamento</label>
                                                   <select name="id_departamento" id="id_departamento" class="form-control" required>
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
                                                <input type="text" class="form-control" id="recipient_address" name="recipient_address" value="<?php echo $data[0]['recipient_address']; ?>">
                                                <div class="invalid-feedback">
                                                   Por favor, ingresa la dirección.
                                                </div>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="valorDes" class="form-label">Valor del Domi</label>
                                                <input type="number" class="form-control" id="price_delivery" name="price_delivery" required value="<?php echo $data[0]['price_delivery']; ?>">
                                                <div class="invalid-feedback">
                                                   Por favor, ingresa el valor.
                                                </div>
                                             </div>


                                             </div>
                                             <div class="col-md-6">
                                             <div class="col-md-12 form-group">
                                                <label for="recipient_phone" class="form-label">Teléfono</label>
                                                <input type="text" class="form-control" id="recipient_phone" name="recipient_phone" value="<?php echo $data[0]['recipient_phone']; ?>">
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="cantidad" class="form-label">Tipo Servicio</label>
                                                <select name="typeService" id="typeService" class="form-control" required tabindex="4">
                                                   <option value="">Seleccione</option>
                                                <?php 
                                                   foreach ($array[3] as $key => $value) {
                                                      if($data[0]['name_type_service']== $value['name']){
                                                         echo '<option value="'.$value['id'].'" selected>'.$value['name'].'</option>';
                                                      }else{
                                                         echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                                      }
                                                      
                                                   }
                                                ?>
                                                   
                                                </select>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="recipient_name" class="form-label">Ciudad</label>
                                                <input type="hidden" id="id_ciudad_interno" name="id_ciudad_interno" value="<?php echo $data[0]['id_ciudad']; ?>">
                                                <select name="id_ciudad" id="id_ciudad" class="form-control" required></select>
                                                <div class="invalid-feedback">
                                                   Por favor, selecciona la ciudad.
                                                </div>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="valorDes" class="form-label">Valor del producto</label>
                                                <input type="number" class="form-control" id="recipient_price" name="recipient_price" value="<?php echo $data[0]['recipient_price']; ?>">
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="valorDes" class="form-label">Valor Total</label>
                                                <input type="number" class="form-control" id="total_price" name="total_price"  value="<?php echo $data[0]['price_total']; ?>">
                                             </div>
                                          
                                             
                                       
                                          
                                       </div>
                                       <div class="col-md-12 form-group">
                                                <label for="recipient_observation" class="form-label">Obervación</label>
                                                <textarea class="form-control" id="recipient_observation" name="recipient_observation" rows="5"><?php echo $data[0]['observation']; ?></textarea>
                                             </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row" style="text-align: center;margin-top: 20px;">
                              <div class="col-md-12">
                              <button class="get_now btn_primary" id="goBack" name="goBack">Volver</button>
                                 <button type="submit" class="get_now btn_primary" id="sendLogin">Guardar</button>
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
                                                    if(count($array[0])>0){
                                                      foreach ($array[0] as $value) {
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
      $(function () {
            "use strict";
            var forms = $("#frmDelivery");
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    var id = $.trim($("#id").val());
                    var uuidCliente = $.trim($("#uuidClient").val());
                    var nameClient = $.trim($("#nameClient").val());
                    var phoneClient = $.trim($("#phoneClient").val());
                    var typeService = $.trim($("#typeService").val());
                    var date_service = $.trim($("#date_service").val());
                    var address_client = $.trim($("#address_client").val());
                    var recipient_product_name = $.trim($("#recipient_product_name").val());
                    var recipient_name = $.trim($("#recipient_name").val());
                    var recipient_address = $.trim($("#recipient_address").val());
                    var recipient_phone = $.trim($("#recipient_phone").val());
                    var recipient_observation = $.trim($("#recipient_observation").val());
                    var price_delivery = parseInt($.trim($("#price_delivery").val()));
                    var recipient_price = parseInt($.trim($("#recipient_price").val()));
                    var delivery_mode = $.trim($("#delivery_mode").val());
                    var id_departamento = $.trim($("#id_departamento").val());
                    var id_ciudad = $.trim($("#id_ciudad").val());

                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>Delivery/update",
                        data: {  id:id,
                                 uuidCliente:uuidCliente,
                                 nameClient:nameClient,
                                 phoneClient:phoneClient,
                                 typeService:typeService,
                                 date_service:date_service,
                                 address_client:address_client,
                                 recipient_product_name:recipient_product_name,
                                 recipient_name:recipient_name,
                                 recipient_address:recipient_address,
                                 recipient_phone:recipient_phone,
                                 recipient_observation:recipient_observation,
                                 price_delivery:price_delivery,
                                 recipient_price:recipient_price,
                                 delivery_mode:delivery_mode,
                                 id_departamento:id_departamento,
                                 id_ciudad:id_ciudad
                              },
                        success: function(response){
                           if(response != 0){
                                jQuery("#modalMessage").text('Guía actualizada correctamente!');
                                jQuery("#modalMessage").css({ 'color': 'green'});
                                jQuery("#showGeneralModal")[0].click();
                                jQuery('#btnAceptarModal').bind( "click", function() {
                                 window.history.back();
                                });
                            }else{
                                jQuery("#modalMessage").text('No se pudo actualizar la guí, valida por favor!');
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
                                 var option = new Option(element.nombre, element.id);
                                 if($("#id_ciudad_interno").val() == element.id ){
                                    $(option).prop('selected', true);
                                 }
                                 $("#id_ciudad").append(option);
                              });
                            }else{
                                console.log('error');
                            }
                        }
                    });
            });
            if($('#delivery_mode').val() == 2){
               var contenidoDiv1 = $('#box1').html();
               var contenidoDiv2 = $('#box2').html();
               $('#box1').html(contenidoDiv2);
               $('#box2').html(contenidoDiv1);
            }

            $('#goApp').on('click',function(){
               event.preventDefault();
               window.location.href = "<?php echo URL; ?>App/app/"+$('#uuidClient').val(); 
            });

            $('#goAppAdmin').on('click',function(){
               event.preventDefault();
               window.location.href = "<?php echo URL; ?>Client/view/"+$('#client_idDB').val(); 
            });

            $('#dataTableStatusDelivery').DataTable({
               order: [[1, 'desc']]
            });
            $('#id_departamento').change();

            
            $('#goBack').on('click',function(){
               event.preventDefault();
               window.history.back();
            });
        });

      </script>




