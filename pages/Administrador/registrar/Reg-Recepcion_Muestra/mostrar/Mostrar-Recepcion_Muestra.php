<?php
session_start();
if (isset($_SESSION['ADMINISTRADOR']))
{ 
  include '../../../../../assets/conexion/conexion.php';
  $usuario=($_SESSION['ADMINISTRADOR']);
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
    <link rel="stylesheet" type="text/css" href="../../../../../assets/css/main.css">
    <link rel="shortcut icon" href="../../../../../assets/imagenes/Sindalab.png">
    <title>Datos Completos Recepcion Muestra</title>

  </head>
  <body class="sidebar-mini fixed sidebar-collapse">
    <div class="wrapper">
      <header class="main-header hidden-print"><a class="logo" href="../../../index.php">SIMDALAB</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">   
              <li><a href="../../../../../assets/conexion/cerrar.php"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Menu de navegacion  -->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="../../../../../assets/imagenes/administrador.png" alt="User Image"></div>
            <div class="pull-left info">
              <?php 
              echo "$usu";
              ?>
            </div>
          </div>
          <!-- opciones del menu de navegacion-->
          <ul class="sidebar-menu">
            <li class="active"><a href="../index.php"><i class="fa fa-home"></i><span>Inicio</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-folder"></i><span>Registrar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="../../Reg-Vereda/Reg-Vereda.php"><i class="fa fa-circle-o"></i>Vereda</a></li>
                <li><a href="../../Reg-Finca/Reg-finca.php"><i class="fa fa-circle-o"></i>Finca</a></li>
                <li><a href="../../Reg-Lote/Reg-Lote.php"><i class="fa fa-circle-o"></i>Lote</a></li>
                <li><a href="../../Reg-Instructor/Reg-Instructor.php"><i class="fa fa-circle-o"></i>Instructores</a></li>
                <li><a href="../../Reg-Programaficha/Reg-Programa_Ficha.php"><i class="fa fa-circle-o"></i>ProgramaFicha</a></li>
              </ul>
                <li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>Ingresar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                 <li><a href="../../Reg-Toma_Muestra/Reg-Toma_Muestra.php"><i class="fa fa-circle-o"></i>Toma De Muestra</a></li>
                  <li><a href="../../Reg-Recepcion_Muestra/Reg-Recepcion_Muestra.php"><i class="fa fa-circle-o"></i>Recepcion De Muestra</a></li>
              </ul>
            </li>    
               <li class="treeview"><a href="#"><i class="fa fa-flask"></i><span>Analizar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="../../Reg-Analisis_Muestra/Reg-Analisis_Muestra.php"><i class="fa fa-circle-o"></i>Analisis de muestra</a></li>
              </ul>
            </li>
            
            <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Consultar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="../../../Consultar/Cons-Toma_Muestra/Cons-Toma_Muestra.php"><i class="fa fa-circle-o"></i>Toma De Muestra</a></li>
                <li><a href="../../../Consultar/Cons-Recepcion_Muestra/Cons-Recepcion_Muestra.php"><i class="fa fa-circle-o"></i>Recepcion De Muestra</a></li>
                <li><a href="../../../Consultar/Cons-Analisis_Muestra/Cons-Analisis_Muestra.php"><i class="fa fa-circle-o"></i>Analisis De Muestra</a></li>
              
              </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-gears"></i><span>Configuracion</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="Usuarios/Config-usuario.php"><i class="fa fa-circle-o"></i>Usuarios</a></li>
              </ul>
            </li>
            <li class=""><a href="../../manual_usuario/manual_de_usuario_simdalab.pdf"><i class="fa fa-book"></i><span>Manual De Usuario</span></a></li>
          </ul>
        </section>
      </aside>

      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-map"></i> Datos Completos Recepcion Muestra</h1>
            <p>Sistema De Informacion Para El Manejo De Los Datos De Analisis De Muestras Del Laboraoria de suelos</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <section class="invoice">
                <?php 

                  $id=$_REQUEST['id'];

          $conexion->set_charset('utf8');
          $busqueda="SELECT `id_Recepcion_Muestra`, `Fecha`, recepcion_muestra.Hora, toma_muestra.identificacion_Muestra, recepcion_muestra.Humedad, `Textura`, `ph_Muestra`, `densidad_Aderente`, `densidad_Real`, `porosidad`, `retencion_Humedad`, `distrubucion_tamanos`, `cationes_Intercambiables`, `elementos_Menores`, `materia_Organica`, `carbono_organico`, `CIC`, `Otros`, `muestra_Entregada_Por`, `muestra_Recibida_Por`, recepcion_muestra.Observaciones FROM `recepcion_muestra` 
          INNER JOIN toma_muestra on recepcion_muestra.id_Toma_Muestra=toma_muestra.id_Toma_Muestra

           WHERE id_Recepcion_Muestra=$id

ORDER BY `recepcion_muestra`.`id_Recepcion_Muestra` DESC";
     
          $query=mysqli_query($conexion,$busqueda);
          while ($fila=mysqli_fetch_row($query)){
             ?>


                <div class="row">
                  <div class="col-xs-12">
                    <h3 class="page-header"><i class="fa fa-globe"></i> Identificacion De La Muestra: <?php echo $fila[3] ?>
                      <small class="pull-right">
                        <strong>Fecha:</strong> <?php echo $fila[1] ?>
                        <br>
                        <strong>Hora:</strong> <?php echo $fila[2] ?>
                      </small>
                    </h3>
                  </div>
                </div>
                <div class="row invoice-info">
                  <div class="col-md-6">
                    <h4> Analisis a realizar</h4> 
                    <br>  
                    <b>Humemdad</b> <?php echo $fila[4] ?>
                    <br>
                    <b>Textura:</b> <?php echo $fila[5] ?>
                    <br>
                    <b>pH:</b> <?php echo $fila[6] ?>
                    <br>
                    <b>Densidad Aderente:</b> <?php echo $fila[7] ?>
                    <br>
                    <b>Densidad Real:</b> <?php echo $fila[8] ?>
                    <br>
                    <b>Porosidad:</b> <?php echo $fila[9] ?>
                    <br>
                    <b>Retención Humedad:</b> <?php echo $fila[10] ?>
                    <br>
                    <b>distrubucion Tamaños:</b> <?php echo $fila[11] ?>
                    <br>
                    <b>Cationes Intercambiables:</b> <?php echo $fila[12] ?>
                    <br>
                    <b>Elementos Menores:</b> <?php echo $fila[13] ?>
                    <br>
                    <b>Materia Organica:</b> <?php echo $fila[14] ?>
                    <br>
                    <b>Materia Organica:</b> <?php echo $fila[15] ?>
                    <br>
                    <b>CIC:</b> <?php echo $fila[16] ?>
                    <br>
                    <b>Otros:</b> <?php echo $fila[17] ?>
                  </div>
                  <div class="col-md-6">
                    <h4> Recepcion Muestras</h4> 
                    <br>  
                    <b>Muestra Entregada Por:</b> <?php echo $fila[18] ?>
                    <br>
                    <b>Muestra Recibida Por:</b> <?php echo $fila[19] ?>
                    <br>
                    <b>Observaciones:</b> <?php echo $fila[20] ?>
                    
                  </div>
                  
                </div>
          
              </section>

                <?php 
}
   ?>
            </div>

          </div>

        </div>      
      </div>

        
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
      
      </div>
    <!-- Javascripts-->
    <div id="resultado"></div>
    <script src="../../../../../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../../../../../assets/js/essential-plugins.js"></script>
    <script src="../../../../../assets/js/bootstrap.min.js"></script>
    <script src="../../../../../assets/js/plugins/pace.min.js"></script>
    <script src="../../../../../assets/js/main.js"></script>
    <script type="text/javascript" src="../../../../../assets/js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../../../../assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../../../../assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

    



  </body>
</html>
<?php

}
else
{
  echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../../../../index.php?Acceso Denegado'</script>";
}  
?>
