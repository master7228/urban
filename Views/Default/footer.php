<footer>
         <div class="footer bottom_cross1">
            <div class="container">
               <div class="row">
                  <div class="col-md-4">
                     <ul class="location_icon">
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> Dirección : Calle 27A. #50A-22 bello Cabañas 
                        </li>
                        <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>Teléfono : +57 3160603000</li>
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>Correo : cvs.logistica@comerciovirtualseguro.com</li>
                     </ul>
                  </div>
                  <div class="col-md-8">
                     <div class="map">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.85013976334437!2d-75.55743404585432!3d6.315866400668601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e442f114f647ff9%3A0xb64b502acf8748bd!2sCl%2027A%20%2350a-22%2C%20Vegas%20De%20La%20Cabana%2C%20Bello%2C%20Antioquia!5e0!3m2!1ses!2sco!4v1696029138660!5m2!1ses!2sco" width="500" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>Copyright © Comercio Virtual Seguro 2023</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->


       <!-- General Modal-->
    <div class="modal fade" id="generalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Notificación</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div id="modalMessage" class="modal-body"></div>
                    <div id="modal-footer" class="modal-footer">
                        <button id="btnAceptarModal" class="btn btn-primary" type="button" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
        </div>
    </div>
    
      <script src="<?php echo URL.VIEWS.DTF; ?>vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo URL.VIEWS.DTF; ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
    

    
    <script src="<?php echo URL.VIEWS.DTF; ?>js/demo/datatables-demo.js"></script>
      
      <script>
         function openNav() {
           document.getElementById("mySidepanel").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidepanel").style.width = "0";
         }
      </script>
   </body>
</html>