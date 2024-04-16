      <?php 
      //print_r($_SESSION['userAdmin'][0]['user_type_user']);
      //print_r($array);
      //print_r($_SESSION['client']);
      ?>
      
      <section class="banner_main" style="padding: 140px 0px 0px 0px;">
         <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container-fluid">
                     <div class="carousel-caption">

                     
                       
                           <div class="row text-left">
                              <!--<div class="col-md-5">
                                 <div class="choose_box" style="display: inline-grid;">
                                    <i><img src="https://comerciovirtualseguro.com/system/users/avatars/eba/96a/9d-/thumb/<?php echo $_SESSION['client']['avatar_file_name']; ?>" alt="#"/></i>
                                    <h3><?php //echo $_SESSION['client']['name'].' '.$_SESSION['client']['last_name']; ?></h3>
                                    <p>
                                       <b>Correo: </b><?php //echo //$_SESSION['client']['email']; ?></br>
                                       <b>Teléfono: </b><?php //echo //$_SESSION['client']['phone']; ?></br>
                                       <b>Cantidad guías generadas: </b><?php //echo count($array); ?></br>
                                       <b>Prefijo: </b><?php //echo //$_SESSION['client']['urban_code']; ?> 
                                    </p>
                                 </div>
                              </div>
                              <div class="col-md-5 offset-md-2" style="text-align: right; padding-right: 30px;">
                                 <div class="choose_box" style="display: inline-block;">
                                    <button class="get_now btn_primary mb-10" id="btnNewDelivery" style="max-width: 250px !important;margin-top: 10px;">Nueva Guía</button>
                                    <button class="get_now btn_primary" id="goApp" name="goApp" style="max-width: 250px !important;margin-top: 10px;">Estado de Cuenta</button>
                                 </div>
                              </div>-->
                           </div>
                        <div class="row">
            
                           <div class="col-md-12 col-lg-12">
                              <div class="row w-100 text-dark" >
                                 <div class="card shadow mb-4 w-100 ">
                                    <div class="card-body">
                                       <div><h2>Clientes</h2></div>
                                       <div class="table-responsive">
                                          <table class="table table-bordered" id="dataTableDelivery" width="100%" cellspacing="0">
                                                <thead>
                                                   <tr>
                                                      <th>Nombre</th>
                                                      <th>Identificación</th>
                                                      <th>Correo</th>
                                                      <th>Telefono</th>
                                                      <th style="width: 5%;">Ver</th>
                                                   </tr>
                                                </thead>
                                                <tfoot>
                                                   <tr>
                                                      <th>Nombre</th>
                                                      <th>Identificación</th>
                                                      <th>Correo</th>
                                                      <th>Telefono</th>
                                                      <th>Ver</th>
                                                   </tr>
                                                </tfoot>
                                                <tbody>

                                                <?php 
                                                    if(count($array)>0){
                                                      foreach ($array as $key => $value) {

                                                            echo '<tr class="odd gradeX">'; 
                                                            echo '<td class="text-left">'.$value['name'].' '.$value['last_name'].'</td>';
                                                            echo '<td class="text-left">'.$value['identification'].'</td>';
                                                            echo '<td class="text-left">'.$value['email'].'</td>';
                                                            echo '<td class="text-left">'.$value['phone'].'</td>';
                                                            echo '<td class="text-center"><a href="'.URL.'Client/view/'.$key.'" style="cursor:pointer;"  class="btnView"><img class="iconsList" src="'.URL.VIEWS.DTF.'images/view.png"></a></td>';                                                            echo '</tr>';
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
       
    $(document).ready( function () {
       /* $('#dataTableDelivery').DataTable(function(){
         order: [[3, 'desc']]
        });*/
        $('#dataTableDelivery').DataTable({
            order: [[3, 'desc']]
         });
         $('#dataTableDelivery_length').css({'text-align':'left'});
         $('#dataTableDelivery_info').css({'text-align':'left'});

      $('#btnNewDelivery').on('click', function(){
         window.location.href = "<?php echo URL; ?>Delivery/create"; 
      });

     /* $('.btnView').on('click', function(event){
         event.preventDefault();
         window.location.href = "<?php echo URL; ?>Client/view/"+$(this).attr("data-id"); 
      });*/

      $('.btnPDF').on('click', function(event){
         event.preventDefault();
         window.location.href = "<?php echo URL; ?>Delivery/pdf/"+$(this).attr("data-id"); 
      });
      
      

} );

      </script>




