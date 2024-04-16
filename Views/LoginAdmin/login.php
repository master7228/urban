      <section class="banner_main">
      <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal" style="display:none"></a>
         <div id="banner1" class="carousel slide banner_slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container-fluid">
                     <div class="carousel-caption">
                        <div class="row">
                           <div class="col-md-7 col-lg-5">
                           <div class="text-bg">
                                 <h1>CVS Logística</h1>
                                 <span class="text-justify">
                                    <p>CVS-Logística  incursiona en el mundo de los envíos, porque venimos  a cambiarlo todo: </p>
                                    </span >
                                             <ol style="color: #222222;">
                                                <li>1. Darte mayor rentabilidad en tus ventas  online.</li>

                                                <li>2. Incrementar tus ventas por medio de la red comercial CVS.</li>

                                                <li>3. El dinero de tus ventas 100% respaldo por nuestros equipo.</li>
                                             </ol>
                                             
                                 <!--<a class="read_more" href="#">Contact Us</a>-->
                              </div>
                           </div>
                           <div class="col-md-12 col-lg-7">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="ban_track">
                                       <figure><img src="<?php echo URL.VIEWS.DTF; ?>images/motosencilla.png" alt="#"/></figure>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <form class="transfot needs-validation" id="frmlogin">
                                       <div class="col-md-12">
                                          <span>Logín Administrativo</span>
                                          <h3 style="color: #222222;">Ingresa Usuario y Contraseña</h3>
                                       </div>
                                       <div class="col-md-12">
                                          <input class="transfot_form" placeholder="Usuario" type="text" name="user" id="user" required>
                                       </div>
                                       <div class="col-md-12">
                                          <input class="transfot_form" placeholder="Contraseña" type="password" name="password" id="password" required>
                                       </div>
                                       <div class="col-md-12">
                                          <button type="submit" class="get_now" id="sendLogin">Ingresar</button>
                                       </div>
                                    </form>
                                    
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
            var forms = $("#frmlogin");
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    var user = $.trim($("#user").val());
                    var password = $.trim($("#password").val());

                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>LoginAdmin/login",
                        data: {user:user, password:password},
                        success: function(response){
                            if(response != 0){

                              window.location.href = response;
                            }else{
                                jQuery("#modalMessage").text('Usuario o contraseña incorrectos, valida por favor!');
                                jQuery("#modalMessage").css({ 'color': 'red'});
                                jQuery("#showGeneralModal")[0].click();
                            }
                        }
                    });

                });
            });
        });

      </script>




