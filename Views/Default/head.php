<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>CVS Logístico</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="<?php echo URL.VIEWS.DTF; ?>css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="<?php echo URL.VIEWS.DTF; ?>css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="<?php echo URL.VIEWS.DTF; ?>css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="<?php echo URL.VIEWS.DTF; ?>images/favicon.ico" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="<?php echo URL.VIEWS.DTF; ?>css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <script src="<?php echo URL.VIEWS.DTF; ?>js/jquery.min.js"></script>
      <script src="<?php echo URL.VIEWS.DTF; ?>js/popper.min.js"></script>
      <script src="<?php echo URL.VIEWS.DTF; ?>js/bootstrap.bundle.min.js"></script>
      <script src="<?php echo URL.VIEWS.DTF; ?>js/jquery-3.0.0.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
      <!-- sidebar -->
      <script src="<?php echo URL.VIEWS.DTF; ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="<?php echo URL.VIEWS.DTF; ?>js/custom.js"></script>
      <link href="<?php echo URL.VIEWS.DTF; ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="<?php echo URL.VIEWS.DTF; ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL.VIEWS.DTF; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="<?php echo URL.VIEWS.DTF; ?>images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <div id="mySidepanel" class="sidepanel">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
         <?php 
            if(isset($_SESSION["cliente"])){
                  echo '<a href="'.URL.'App/app/'.$_SESSION["cliente"]['id'].'">Mis Guías</a>';
                  echo '<a href="'.URL.'Delivery/create">Generar Guía</a>';
                  echo '<a href="">Estado de cuenta </a>';
            }
         ?>
         
         
         
         <?php 
            if(isset($_SESSION['userAdmin'])){
               if($_SESSION['userAdmin'][0]['user_type_user'] == 1){
                  echo '<a href="'.URL.'AppAdmin/app">Clientes</a>';
                  echo '<a href="'.URL.'Domiciliary/index">Domiciliarios</a>';
                  echo '<a href="'.URL.'AssignmentDomiciliary/index">Asignar Domiciliario</a>';
                  echo '<a href="'.URL.'LiquidateGuide/index">Liquidar Guías</a>';
               }

               if($_SESSION['userAdmin'][0]['user_type_user'] == 2){
                  echo '<a href="'.URL.'Domiciliary/index">Domiciliarios</a>';
                  echo '<a href="'.URL.'AssignmentDomiciliary/index">Asignar Domiciliario</a>';
               }

               if($_SESSION['userAdmin'][0]['user_type_user'] == 3){
                  echo '<a href="'.URL.'ManageDelivery/exitosos">Domis Exitosos</a>';
                  echo '<a href="'.URL.'ManageDelivery/novedad">Domis con Novedad</a>';
                  echo '<a href="'.URL.'ManageDelivery/cancelados">Domis Cancelados</a>';
                  echo '<a href="'.URL.'ManageDelivery/historico">Histórico</a>';
                  echo '<a href="'.URL.'ManageDelivery/index">Mis Asignaciones</a>';
               }

            }
         ?>
         <a href="<?php echo URL ?>Login/logout">Salir</a>
      </div>
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
            
               <div class="row">
                  <div class="col-md-4 col-sm-4">
                     <div class="logo">
                        <?php if(isset($_SESSION['client']['id'])){ $url = URL.'App/app/'.$_SESSION['client']['id'];}else{ $url = URL.'Login/login'; } ?>
                        <a href="<?php echo $url; ?>"><img src="<?php echo URL.VIEWS.DTF; ?>images/LogoCVSLogistica.png" alt="#" style="width:130px;" /></a>
                     </div>
                  </div>
                  <div class="col-md-8 col-sm-8">
                     
                     <div class="right_bottun">
                        <p style="padding-top:15px;"><?php if(isset($_SESSION['userFullName'])){ echo $_SESSION['userFullName']; } ?></p>
                        <ul class="conat_info">
                        <?php 
                         $url= $_SERVER["REQUEST_URI"];
                         if($url != '/urban/' && $url != '/urban/Login/login' && $url != '/urban/Login/logout' ){
                           if(isset($_SESSION['outh'])){
                              echo '<li><a href="'.URL.'Login/logout"><i title="Salir" class="fa fa-sign-out" aria-hidden="true"></i></a></li>';
                           }else{
                              echo '<li><a href="'.URL.'Login/login"><i title="Ingresar" class="fa fa-user" aria-hidden="true"></i></a></li>';
                              echo '<li><a href="'.URL.'LoginAdmin/login"><i title="Ingresar Intranet" class="fa fa-laptop" aria-hidden="true"></i></a></li>';
                           }
                         }else{
                           if(!isset($_SESSION['outh'])){
                              echo '<li><a href="'.URL.'Login/login"><i title="Ingresar" class="fa fa-user" aria-hidden="true"></i></a></li>';
                              echo '<li><a href="'.URL.'LoginAdmin/login"><i title="Ingresar Intranet" class="fa fa-laptop" aria-hidden="true"></i></a></li>';
                           }else{
                              echo '<li><a href="'.URL.'Login/logout"><i title="Salir" class="fa fa-sign-out" aria-hidden="true"></i></a></li>';
                           }
                         }
                        
                         ?>
                           
                           <!--<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>-->
                        </ul>
                        <?php 
                         $url= $_SERVER["REQUEST_URI"];
                         if($url != '/urban/' && $url != '/urban/Login/login' && $url != '/urban/Login/logout' && isset($_SESSION['outh'])){
                           echo '<button class="openbtn" onclick="openNav()"><img id="btnMenu" src="'.URL.VIEWS.DTF.'images/menu_icon.png" alt="#"/> </button>';

                         }
                        
                         ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>