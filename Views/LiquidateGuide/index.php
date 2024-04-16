
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
                                       <div><h2>Liquidar Guías</h2></div>
                                       <div class="table-responsive">
                                          <table class="table table-bordered" id="dataTableDomiciliary" width="100%" cellspacing="0" style="border:revert-layer !important">
                                                <thead>
                                                   <tr>
                                                      <th>Guia</th>
                                                      <th>Cliente</th>
                                                      <th>Domiciliario</th>
                                                      <th>Liquidado</th>
                                                      <th>Fecha de Pago</th> 
                                                      <th>Estado</th> 
                                                      <th>Valor Domicilio</th>
                                                      <th>Descargar</th>                                                         
                                                      <th style="width: 5%;">Ver</th>
                                                   </tr>
                                                </thead>
                                                <tfoot>
                                                   <tr>
                                                      <th>Guia</th>
                                                      <th>Cliente</th>
                                                      <th>Domiciliario</th>
                                                      <th>Liquidado</th>
                                                      <th>Fecha de Pago</th> 
                                                      <th>Estado</th>
                                                      <th>Valor Domicilio</th>
                                                      <th style="width: 5%;">Descargar</th>                                                       
                                                      <th style="width: 5%;">Ver</th>
                                                   </tr>
                                                </tfoot>
                                                <tbody>

                                                <?php 
                                                    if(count($array[0])>0){
                                                     //print_r($array[0]);
                                                      foreach ($array[0] as $key => $value) {
                                                         $ban = 0;

                                                         $paidDomiciliary ='';
                                                         
                                                            if($value['paid_domiciliary'] == 0){
                                                               $paidDomiciliary ='<td class="text-left"><select class="form-control id_domiciliario" data-id="'.$value['idd'].'" required>';
                                                               $paidDomiciliary .='<option value='.$value['paid_domiciliary'] .' selected>No</option>';
                                                               $paidDomiciliary .='<option value='.$value['paid_domiciliary'] .'>Si</option>';
                                                               $paidDomiciliary .='</select></td>';
                                                            }else{
                                                               $ban = 1;
                                                               $paidDomiciliary ='<td class="text-left">Liquidado</td>';
                                                            }

                                                            
                                                            

                                                            if($value['id_domiciliary'] != ''){
                                                               if($ban == 1){
                                                                  echo '<tr class="odd gradeX" style="background-color:#0f98f85e">'; 
                                                               }else{
                                                                  echo '<tr class="odd gradeX">'; 
                                                               }
                                                               $date_paid = '';
                                                               if($value['date_paid_domiciliary'] != ''){
                                                                  $date_paid = explode(".", $value['date_paid_domiciliary'])[0];
                                                               }
                                                               
                                                               echo '<td class="text-left">'.$value['code'].str_pad($value['consecutive'], 4, '0', STR_PAD_LEFT).'</td>';
                                                               echo '<td class="text-left">'.$value['name_client'].'</td>';
                                                               echo '<td class="text-left">'.$value['name_domiciliary'].'</td>';
                                                               echo $paidDomiciliary;
                                                               echo '<td class="text-left">'.$date_paid.'</td>';
                                                               echo '<td class="text-left">'.$value['name_status'].'</td>';
                                                               echo '<td class="text-left">$ ' . number_format($value['price_delivery'], 0, ',', '.').'</td>';
                                                               echo '<td class="text-center"><a style="cursor:pointer;"  class="btnPDF" data-id="'.$value['idd'].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'images/downloadPdf.png" style="max-width: 30%;"></a></td>';
                                                               echo '<td class="text-center"><a style="cursor:pointer;"  class="btnEdit" data-id="'.$value['idd'].'" data-client="'.$value['uuid_client'].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'images/view.png"></a></td>';                                                            echo '</tr>';
                                                         
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
            url: "<?php echo URL; ?>LiquidateGuide/liquidate",
            data: {  id_delivery:$(this).attr("data-id"),
                     id_domiciliary:$(this).val()
                  },
            success: function(response){
               if(response != 0){
                     jQuery("#modalMessage").text('Guía liquidada correctamente!');
                     jQuery("#modalMessage").css({ 'color': 'green'});
                     jQuery("#showGeneralModal")[0].click();
                     jQuery('#btnAceptarModal').bind( "click", function() {
                        location.reload(); 
                     });
                  }else{
                     jQuery("#modalMessage").text('No se pudo liquidar, valida por favor!');
                     jQuery("#modalMessage").css({ 'color': 'red'});
                     jQuery("#showGeneralModal")[0].click();
                  }
            }
         });
      });
     

} );

      </script>




