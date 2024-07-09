<?php
session_start();
if (isset($_SESSION['consultar']))
{ 
  include '../../assets/conexion/conexion.php';
  $usuario=($_SESSION['consultar']);
  $res=mysqli_query($conexion,"SELECT * FROM usuarios WHERE id_Usuario=$usuario");
        while ($reg=mysqli_fetch_array($res)) 
        {
          $nomusua_usua=utf8_decode($reg[2]);
          $rolusua=utf8_decode($reg[1]);
         }
         $saludo="Bienvenido $nomusua_usua, a el Rol del $rolusua";
         $usu="<p>$nomusua_usua</p> <p class='designation'>$rolusua</p>"; 
         
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""/>
    <meta name="keywords" content="HTML,CSS,JavaScript"/>
    <meta name="author" content="instructor"/>
    <link rel="shortcut icon" href="../../assets/imagenes/Sindalab.png">
    <link rel="stylesheet" type="text/css" href="../../assets/css/main.css">
    <title>Inicio</title>

  </head>
  <body class="sidebar-mini fixed sidebar-collapse">
    <div class="wrapper">
      <header class="main-header hidden-print"><a class="logo" href="index.php">SIMDALAB</a>
        <nav class="navbar navbar-static-top">
          <a class="sidebar-toggle " href="#" data-toggle="offcanvas"></a>
          
          <div class="navbar-custom-menu">
            <ul class="top-nav">   
              <li><a href="../../assets/conexion/cerrar.php"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Menu de navegacion  -->
      <aside class="main-sidebar hidden-print" style="background-color: #000;">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="../../assets/imagenes/user.png" alt="User Image"></div>
            <div class="pull-left info">
              <?php 
              echo "$usu";
              ?>
            </div>
          </div>
          <!-- opciones del menu de navegacion-->
          <ul class="sidebar-menu">
            <li class="active"><a href="index.php"><i class="fa fa-home"></i><span>Inicio</span></a></li>
            
            
            <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Consultar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <!-- <li><a href="Consultar/Cons-Toma_Muestra/Cons-Toma_Muestra.php"><i class="fa fa-circle-o"></i>Toma De Muestra</a></li>
                <li><a href="Consultar/Cons-Recepcion_Muestra/Cons-Recepcion_Muestra.php"><i class="fa fa-circle-o"></i>Recepcion De Muestra</a></li> -->
                <li><a href="Consultar/Cons-Analisis_Muestra/Cons-Analisis_Muestra.php"><i class="fa fa-circle-o"></i>Analisis De Muestra</a></li>
              
              </ul>
            </li>

           
          </ul>
        </section>
      </aside>

      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-home"></i> Inicio</h1>
            <p> </p>
          </div>
        </div>
            <div class="card">
              <h3 class="card-title"> <center><strong>Bienvenido Usuario Consulta</strong></center>  </h3>
              <center><H4 > Este es el usuario que le permitira consultar la informacion de una muestra de suelos</H4>
              <h4 >Sistema de Información para el manejo de los datos de análisis de muestras del laboratorio de suelos Centro Agropecuario La Granja Sena Regional –Tolima. (SIMDALAB) </h4></center>
           
              




              
            </div>
          </div>
        </div>
          </div>
        </div>
       
      </div>
    </div>
    <!-- Javascripts-->
    <script src="../../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../../assets/js/essential-plugins.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/pace.min.js"></script>
    <script src="../../assets/js/main.js"></script>

    

  </body>
</html>
<?php

}
else
{
  echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../index.php?Acceso Denegado'</script>";
}  
?>