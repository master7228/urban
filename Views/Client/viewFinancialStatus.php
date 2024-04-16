      <?php 
      //print_r($_SESSION['userAdmin'][0]['user_id']);
      //print_r($_SESSION['clients']);
   

    

     // print_r($array[0]);
      //print_r($_SESSION["cliente"]);
      ?>
      
      <section class="banner_main" style="padding: 140px 0px 0px 0px;">
      <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal" style="display:none"></a>
         <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container-fluid">
                     <div class="carousel-caption">

                     
                       
                              <div class="row text-left">
                                 <h3>Realizar Abono</h3>
                                 <div class="col-md-12">
                                
                                    
                                       <form id="frmDelivery" class="needs-validation" >
                                             <input type="hidden" id="idClient" name="idClient" value="<?php echo $_SESSION["cliente"]['idDB']; ?>">
                                             <input type="hidden" id="uuidClient" name="uuidClient" value="<?php echo $array[0]; ?>">
                                             <input type="hidden" id="userId" name="userId" value="<?php echo $_SESSION['userAdmin'][0]['user_id']; ?>">
                                             <div class="col-md-4 form-group">
                                                      <label for="recipient_product_name" class="form-label" style="color:black">Valor</label>
                                                      <input type="text" class="form-control" id="value_pay" name="value_pay" required>
                                                      <label for="description" class="form-label" style="color:black">Descripción</label>
                                                      <textarea id="description_pay" name="description_pay" class="form-control" required></textarea>  
                                             </div>
                                             <div class="col-md-4 form-group">
                                                     
                                                      <button type="submit" class="get_now btn_primary" id="guardar">Guardar</button>      
                                                      <button type="button" class="get_now btn_primary" id="volver">Volver</button>                                       
                                             </div>
                                       </form>
                               
                                 </div>
                              </div>

                        <div class="row" style="width: 100%;">
            
                           <div class="col-md-6 col-lg-6">
                              <div class="row w-100 text-dark" >
                                 <div class="card shadow mb-4 w-100 ">
                                 <input type="hidden" id="abonosCount" name="abonosCount" value="<?php echo count($array[3]);  ?>">
                                    <div class="card-body">
                                       <div><h2>Abonos</h2></div>
                                       <div class="table-responsive">
                                       <table class="table table-bordered" id="dataTableAbonos" width="100%" cellspacing="0">
                                                <thead>
                                                   <tr>
                                                      <th>Fecha</th>
                                                      <th>Valor</th>
                                                   </tr>
                                                </thead>
                                                <tfoot>
                                                   <tr>
                                                      <th>Fecha</th>
                                                      <th>Valor</th>
                                                   </tr>
                                                </tfoot>
                                                <tbody>

                                                <?php 
                                                    if(count($array[3])>0){
                                                      foreach ($array[3] as $key => $value) {
                                                            $date_pay = explode(".", $value['date_pay'])[0];
                                                            echo '<tr class="odd gradeX">'; 
                                                            echo '<td>'.$date_pay.'</td>';
                                                            echo '<td>$'.number_format($value['value_paid'], 0, ',', '.').'</td>';
                                                            echo '</tr>';
                                                      } 
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




                           <div class="col-md-6 col-lg-6">
                              <div class="row w-100 text-dark" >
                                 <div class="card shadow mb-4 w-100 ">
                                    <div class="card-body">
                                       <div><h2>Estado de Guias</h2></div>
                                       <div class="table-responsive">
                                          <input type="hidden" id="guidesStatus" name="guidesStatus" value="<?php echo count($array[1]);  ?>">
                                       <table class="table table-bordered" id="dataTableDelivery" width="100%" cellspacing="0">
                                                <thead>
                                                   <tr>
                                                      <th>Guia</th>
                                                      <th>Fecha</th>
                                                      <th>Valor</th>
                                                      <th>Estado Pago</th>
                                                   </tr>
                                                </thead>
                                                <tfoot>
                                                   <tr>
                                                      <th>Guia</th>
                                                      <th>Fecha</th>
                                                      <th>Valor</th>
                                                      <th>Estado Pago</th>
                                                   </tr>
                                                </tfoot>
                                                <tbody>

                                                <?php 
                                                    if(count($array[1])>0){
                                                      foreach ($array[1]as $key => $value) {
                                                            $date_paid = explode(".", $value['date_paid'])[0];
                                                            echo '<tr class="odd gradeX">'; 
                                                            echo '<td>'.$value['code'].str_pad($value['consecutive'], 4, '0', STR_PAD_LEFT).'</td>';
                                                            echo '<td>'.$date_paid.'</td>';
                                                            echo '<td>$'.number_format($value['value'], 0, ',', '.').'</td>';
                                                            if($value['paid'] == 1){
                                                               echo '<td style="color:green">PAGADO</td>';
                                                            }else{
                                                               echo '<td style="color:red">PENDIENTE</td>';
                                                            }
                                                            echo '</tr>';
                                                      } 
                                                   }else{
                                                      echo '<tr class="odd"><td valign="top" colspan="5" class="dataTables_empty">No se encontraron registros</td></tr>';
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

$(function () {
            "use strict";
            var forms = $("#frmDelivery");
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    var uuidClient = $.trim($("#uuidClient").val());
                    var userId = $.trim($("#userId").val());
                    var value_pay = $.trim($("#value_pay").val());
                    var description_pay = $.trim($("#description_pay").val());

                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>Client/makePayment",
                        data: {  uuidClient:uuidClient,
                                 userId:userId,
                                 value_pay:value_pay,
                                 description_pay:description_pay
                              },
                        success: function(response){
                           
                           if(response != 0){
                                jQuery("#modalMessage").text('Pago registrado correctamente!');
                                jQuery("#modalMessage").css({ 'color': 'green'});
                                jQuery("#showGeneralModal")[0].click();
                                jQuery('#btnAceptarModal').bind( "click", function() {
                                 location.reload(true);
                                });
                            }else{
                                jQuery("#modalMessage").text('No se pudo realizar el pago, valida por favor!');
                                jQuery("#modalMessage").css({ 'color': 'red'});
                                jQuery("#showGeneralModal")[0].click();
                            }
                        }
                    });

                });
            });
        });
       
    $(document).ready( function () {
       /* $('#dataTableDelivery').DataTable(function(){
         order: [[3, 'desc']]
        });*/
        if($('#guidesStatus').val() > 0){
            $('#dataTableDelivery').DataTable({
               order: [[3, 'desc']]
            });
            $('#dataTableDelivery_length').css({'text-align':'left'});
            $('#dataTableDelivery_info').css({'text-align':'left'});
         }
         if($('#abonosCount').val() > 0){
            $('#dataTableAbonos').DataTable({
               order: [[1, 'desc']]
            });
            $('#dataTableAbonos_length').css({'text-align':'left'});
            $('#dataTableAbonos_info').css({'text-align':'left'});
         }
         

      $('#volver').on('click', function(){
         event.preventDefault();
         window.location.href = "<?php echo URL; ?>Client/view/"+$("#idClient").val(); 
      });

      $('.btnView').on('click', function(event){
         event.preventDefault();
         window.location.href = "<?php echo URL; ?>Delivery/view/"+$(this).attr("data-id"); 
      });


    

} );

      </script>




