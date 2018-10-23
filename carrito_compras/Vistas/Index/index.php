<?php
  require_once '../../Modelos/Session.php';
  require_once '../../Controladores/SessionController.php';

  validar_session();

  if(isset($_GET['salir'])){
    $salir = $_GET['salir'];
    if($salir){
      salir();
    }
  }

 ?>

 <!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="../../assets/icons/book.ico" />
     <script type="text/javascript"  href="./js/scripts.js"></script>
    <script src="../../public/js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="../../public/css/sweet-alert.css">
    <link rel="stylesheet" href="../../public/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../../public/css/normalize.css">
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/compras.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="../../public/js/modernizr.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
    <script src="../../public/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../../public/js/main.js"></script>
</head>
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                COTECNOVA
            </div>
            <div class="full-reset" style="background-color:#2B3D51; padding: 10px 0; color:#fff;">
                <figure>
                    <img src="../../public/assets/img/logo.png" alt="Biblioteca" class="img-responsive center-box" style="width:55%;">
                </figure>
                
            </div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="index.php"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-case-check"></i>&nbsp;&nbsp; Productos <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="../Productos/index.php"><i class="zmdi zmdi-bookmark"></i>&nbsp;&nbsp; Listado productos</a></li>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-account-add"></i>&nbsp;&nbsp; Usuarios <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="../Usuarios/index.php"><i class="zmdi zmdi-face zmdi-hc-fw"></i>&nbsp;&nbsp; Listado usuarios </a></li>
                           
                        </ul>
                    </li>
                    <li><a href="#"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes y estadísticas</a></li>
                    <li><a href="#"><i class="zmdi zmdi-wrench zmdi-hc-fw"></i>&nbsp;&nbsp; Configuraciones avanzadas</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
                <figure>
                   <img src="../../public/assets/img/user03.png" alt="user-picture" class="img-responsive img-circle center-box">
                </figure>
                <li style="color:#fff; cursor:default;">
                    <span class="all-tittles">Usuario</span>
                </li>
                <li  class="tooltips-general exit-system-button" data-href="login.php" data-placement="bottom" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
                <li  class="tooltips-general search-book-button" data-href="#" data-placement="bottom" title="Buscar producto">
                    <i class="zmdi zmdi-search"></i>
                </li>
                <li  class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
                    <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                </li>
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
            </ul>
        </nav>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema de Compra<small>Inicio</small></h1>
            </div>
        </div>
        <section class="full-reset text-center" style="padding: 40px 0;">
            
        <h1>Carrito De Compras</h1>
        <a href="./carrito_compra.php" title="ver carrito de compras">
            <img src="../../public/assets/img/c.jpg" class="img-responsive center-box" >
        </a>
    </header>
    <section>
        
    <?php
     require_once ('../../Modelos/conexion_compra.php');
     $consulta="select * from productos";
     $query=mysqli_query($conexion, $consulta); 
     while ($f=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
  ?>

   <div class="producto">
   <center>
    <img src="./productos/<?php echo $f['imagen'];?>"><br>
    <span><?php echo $f['nombre'];?></span><br>
    <a href="./detalles.php?id=<?php  echo $f['id'];?>">ver</a>
    </center>
  </div>
 <?php
  }
 ?>
        </section>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    Te atendemos con gusto. equipo de software COTECNOVA
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                </div>
            </div>
          </div>
        </div>
        <footer class="footer full-reset">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <h4 class="all-tittles">Acerca de</h4>
                        <p>
                             equipo de software COTECNOVA
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <h4 class="all-tittles">Desarrolladores</h4>
                        <ul class="list-unstyled">
                            <li><i class="zmdi zmdi-check zmdi-hc-fw"></i>&nbsp; CARLOS ARROYAVE - MAURICIO MONTOYA <i class="zmdi zmdi-facebook zmdi-hc-fw footer-social"></i><i class="zmdi zmdi-twitter zmdi-hc-fw footer-social"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright full-reset all-tittles">© 2018 CARLOS ARROYAVE - MAURICIO MONTOYA</div>
        </footer>
    </div>
</body>
</html>