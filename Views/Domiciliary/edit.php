<?php $data = $array[0]; ?>
<section class="banner_main" style="padding:180px 0px 0px 80px;">
      <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal" style="display:none"></a>
         <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">

                  <div class="container-fluid">
                     <form id="frmDomiciliary" class="needs-validation">
                           <div id="container" class="row" style="max-width: 100%;">
           
                              <div id="content2" class="col-md-12 " style="border: 1px solid;">
                                 
                                    <div class="col-lg-12 text-center"> <p>Domiciliario</p></div>
                                    <div id="box2">
                                    <div class="row">
                        
                                       <div class="col-md-6">
                                          
                                             <div class="col-md-12 form-group">
                                                <label for="domiciliary_document_type" class="form-label">Tipo de documento</label>
                                          
                                                <input type="text" class="form-control" id="domiciliary_document" name="domiciliary_document" readonly value="<?php echo $data['document_type']; ?>" readonly required>
                                             </div>      
                                             <div class="col-md-12 form-group">
                                                <label for="domiciliary_document" class="form-label">Documento</label>
                                                <input type="text" class="form-control" id="domiciliary_document" name="domiciliary_document" readonly value="<?php echo $data['document']; ?>" required>
                                                <input type="hidden" class="form-control" id="domiciliary_id" name="domiciliary_id" value="<?php echo $data['id']; ?>">
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="domiciliary_name" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="domiciliary_name" name="domiciliary_name" value="<?php echo $data['name']; ?>"  required>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="domiciliary_phone" class="form-label">Teléfono / Celular</label>
                                                <input type="text" class="form-control" id="domiciliary_phone" name="domiciliary_phone" value="<?php echo $data['phone']; ?>"  required>
                                             </div>


                                             </div>
                                             <div class="col-md-6">
                                             <div class="col-md-12 form-group">
                                                <label for="domiciliary_vehicle" class="form-label">Vehículo</label>
                                                <input type="text" class="form-control" style = "text-transform: uppercase;" id="domiciliary_vehicle" name="domiciliary_vehicle" value="<?php echo $data['vehicle']; ?>"  required>
                                             </div>
          
                                             <div class="col-md-12 form-group">
                                                <label for="domiciliary_plate_vehicle" class="form-label">Placa del vehículo</label>
                                                <input type="text" class="form-control" id="domiciliary_plate_vehicle" name="domiciliary_plate_vehicle" style = "text-transform: uppercase;" value="<?php echo $data['plate_vehicle']; ?>"  required>
                                             </div>
                                             <div class="col-md-12 form-group">
                                                <label for="domiciliary_status" class="form-label">Estado</label>
                                                <select class="form-control" id="domiciliary_status" name="domiciliary_status"  required>
                                                   <option value="">Selecciona un opción</option>
                                                   <option value="1" <?php if($data['status'] == 1){echo 'selected'; } ?>>Activo</option>
                                                   <option value="0" <?php if($data['status'] == 0){echo 'selected'; } ?>>Inactivo</option>
                                                </select>
                                             </div>  

                                       </div>
                                    </div>
                                 </div>
                              </div>





                           </div>
                           <div class="row" style="max-width: 100%; text-align: center;margin-top: 20px;">
                              <div class="col-md-12">
                                 <button type="submit" class="get_now btn_primary" id="sendLogin">Guardar</button>
                                 <button class="get_now btn_primary" id="goApp" name="goApp">Domiciliarios</button>
                              </div>
                           </div>
                     </form>
                  </div>
             
         </div>
      </section>

      <script>
        $(function () {
            "use strict";
            var forms = $("#frmDomiciliary");
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    var domiciliary_id= $.trim($("#domiciliary_id").val());
                    var domiciliary_name = $.trim($("#domiciliary_name").val());
                    var domiciliary_phone = $.trim($("#domiciliary_phone").val());
                    var domiciliary_vehicle = $.trim($("#domiciliary_vehicle").val());
                    var domiciliary_plate_vehicle = $.trim($("#domiciliary_plate_vehicle").val());
                    var domiciliary_status = $.trim($("#domiciliary_status").val());

                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>Domiciliary/edit",
                        data: {  
                                domiciliary_id:domiciliary_id,
                                domiciliary_name:domiciliary_name,
                                domiciliary_phone:domiciliary_phone,
                                domiciliary_vehicle:domiciliary_vehicle,
                                domiciliary_plate_vehicle:domiciliary_plate_vehicle,
                                domiciliary_status:domiciliary_status
                              },
                        success: function(response){
                            console.log(response);
                            if(response != 0){
                                jQuery("#modalMessage").text('Domiciliario editado correctamente!');
                                jQuery("#modalMessage").css({ 'color': 'green'});
                                jQuery("#showGeneralModal")[0].click();
                                jQuery('#btnAceptarModal').bind( "click", function() {
                                 window.location.href = "<?php echo URL; ?>Domiciliary/index/"; 
                                });
                            }else{
                                jQuery("#modalMessage").text('Este Domiciliario ya existe con este documento, valida por favor!');
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
               window.location.href = "<?php echo URL; ?>Domiciliary/index/" 
            });
        });

      </script>




