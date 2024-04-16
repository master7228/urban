
      <section class="banner_main" style="padding: 140px 0px 0px 0px;">
      <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal" style="display:none"></a>
         <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container-fluid">
                     <div class="carousel-caption">

                        <div class="row">
            
                           <div class="col-md-12 col-lg-12">
                              <div class="row w-100 text-dark"  >
                                 <div class="card shadow mb-4 w-100 "> 
                                    <div class="card-body">
                                       <div><h2>Asignar Domiciliario</h2></div>
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
                                                      <th>Fecha</th>
                                                      <th>Descargar</th>                                                         
                                                      <th style="width: 5%;">Ver</th>
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
                                                      <th>Fecha</th>
                                                      <th style="width: 5%;">Descargar</th>                                                       
                                                      <th style="width: 5%;">Ver</th>
                                                   </tr>
                                                </tfoot>
                                                <tbody>

                                                <?php 
                                                    if(count($array[0])>0){
                                                      foreach ($array[0] as $key => $value) {
                                                        $ban = 0;

                                                         $domiciliary ='<td class="text-left"><select class="form-control id_domiciliario" data-id="'.$value['idd'].'" required>
                                                         <option value="">Seleccione un domiciliario</option>';
                                                         
                                                            foreach ($array[1] as $value2) {
                                                               if($value['id_domiciliary'] == $value2['id']){
                                                                  $domiciliary .='<option value='.$value2['id'].' selected>'.$value2['name'].'</option>';
                                                                     $ban = 1;
                                                               }else{
                                                                  $domiciliary .='<option value='.$value2['id'].'>'.$value2['name'].'</option>';
                                                               }
                                                            }
                                                  
                                                            $domiciliary .='</select></td>';
                                                            if($ban == 0){
                                                               echo '<tr class="odd gradeX" style="background-color:#0f98f85e">'; 
                                                            }else{
                                                               echo '<tr class="odd gradeX">'; 
                                                            }
                                                            
                                                            echo '<td class="text-left">'.$value['code'].str_pad($value['consecutive'], 4, '0', STR_PAD_LEFT).'</td>';
                                                            echo '<td class="text-left">'.$value['name_client'].'</td>';
                                                            echo $domiciliary;
                                                            echo '<td class="text-left">'.$value['address_client'].'</td>';
                                                            echo '<td class="text-left">'.$value['recipient_address'].'</td>';
                                                            echo '<td class="text-left">'.$value['name_status'].'</td>';
                                                            echo '<td class="text-left">'.$value['date_service'].'</td>';
                                                            echo '<td class="text-center"><a style="cursor:pointer;"  class="btnPDF" data-id="'.$value['idd'].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'images/downloadPdf.png" style="max-width: 30%;"></a></td>';
                                                            echo '<td class="text-center"><a style="cursor:pointer;"  class="btnEdit" data-id="'.$value['idd'].'" data-client="'.$value['uuid_client'].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'images/view.png"></a></td>';                                                            echo '</tr>';
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

       $('#dataTableDomiciliary').DataTable({
            order: [[6, 'desc']]
         });
         $('#dataTableDomiciliary_length').css({'text-align':'left'});
         $('#dataTableDomiciliary_info').css({'text-align':'left'});

      $('#btnNewDomiciliary').on('click', function(){
         window.location.href = "<?php echo URL; ?>Domiciliary/create"; 
      }); 
      
      $('.btnEdit').on('click', function(){
         window.location.href = "<?php echo URL; ?>Delivery/viewadmin/"+$(this).attr("data-id")+"/"+$(this).attr("data-client"); 
      }); 
      $('.btnPDF').on('click', function(event){
         event.preventDefault();
         window.location.href = "<?php echo URL; ?>Delivery/pdf/"+$(this).attr("data-id"); 
      });

      $('.id_domiciliario').on('change', function(){
         $.ajax({
            type:"POST",
            url: "<?php echo URL; ?>AssignmentDomiciliary/assignment",
            data: {  id_delivery:$(this).attr("data-id"),
                     id_domiciliary:$(this).val()
                  },
            success: function(response){
               if(response != 0){
                     jQuery("#modalMessage").text('Guía asignada correctamente!');
                     jQuery("#modalMessage").css({ 'color': 'green'});
                     jQuery("#showGeneralModal")[0].click();
                     jQuery('#btnAceptarModal').bind( "click", function() {
                        location.reload(); 
                     });
                  }else{
                     jQuery("#modalMessage").text('No se pudo asignar, valida por favor!');
                     jQuery("#modalMessage").css({ 'color': 'red'});
                     jQuery("#showGeneralModal")[0].click();
                  }
            }
         });
      });
     

} );

      </script>




