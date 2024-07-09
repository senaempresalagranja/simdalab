<?php
session_start();
if (isset($_SESSION['registrar']))
{ 
  include '../../../../../assets/conexion/conexion.php';
  $usuario=($_SESSION['registrar']);
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
    <title>Datos Completos Toma Muestra</title>

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
            <div class="pull-left image"><img class="img-circle" src="../../../../../assets/imagenes/registro.png" alt="User Image"></div>
            <div class="pull-left info">
              <?php 
              echo "$usu";
              ?>
            </div>
          </div>
          <!-- opciones del menu de navegacion-->
          <ul class="sidebar-menu">
            <li class="active"><a href="../index.php"><i class="fa fa-home"></i><span>Inicio</span></a></li>
            
                <li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>Ingresar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                 <li><a href="../../Reg-Toma_Muestra/Reg-Toma_Muestra.php"><i class="fa fa-circle-o"></i>Toma De Muestra</a></li>
                  <li><a href="../../Reg-Recepcion_Muestra/Reg-Recepcion_Muestra.php"><i class="fa fa-circle-o"></i>Recepcion De Muestra</a></li>
              </ul>
            </li>    
             

           
          </ul>
        </section>
      </aside>

      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-map"></i> Datos Completos Toma Muestra</h1>
            <p>Sistema De Informacion Para El Manejo De Los Datos De Analisis De Muestras Del Laboratorio de suelos</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <section class="invoice">
                <?php 

                  $id=$_REQUEST['id'];

          $conexion->set_charset('utf8');
          $busqueda="SELECT `id_Toma_Muestra`, `fecha_Toma`, `Hora`, programas.nombre_Programa
,tipo_programa.Tipo, fichas.numero_Ficha , `Proyecto`, instructores.nombre_Instructor, `identificacion_Muestra`, departamentos.nombre_Departamento,municipios.nombre_Municipio,veredas.nombre_Vereda,fincas.nombre_Finca ,lotes.nombre_Lote, `tipo_Topografia`, `profundidad_Muestra`, `Humedad`, `fuerza_penetracion`, `profundidad_Campo`, `Norte`, `Occidente`, `Altura`, `responsable_Toma`, `Empresa`, toma_muestra.correo_Electronico, `Telefono`, `responsable_Recibido`, `Observaciones` FROM `toma_muestra`

INNER JOIN fichas on toma_muestra.id_Ficha=fichas.id_Ficha

INNER JOIN programas on fichas.id_Programa=programas.id_Programa

INNER JOIN tipo_programa on programas.id_Tipo_Programa=tipo_programa.id_Tipo_Programa

INNER JOIN instructores ON toma_muestra.id_Instructor=instructores.id_Instructor

INNER JOIN lotes on toma_muestra.id_Lote=lotes.id_Lote

INNER join fincas on lotes.id_Finca=fincas.id_Finca

INNER join veredas on fincas.id_Vereda=veredas.id_Vereda

INNER join municipios on veredas.id_Municipio=municipios.id_Municipio

INNER join departamentos on municipios.id_Departamento=departamentos.id_Departamento

WHERE id_Toma_Muestra=$id

ORDER BY `toma_muestra`.`id_Toma_Muestra` DESC";
     
          $query=mysqli_query($conexion,$busqueda);
          while ($fila=mysqli_fetch_row($query)){
             ?>


                <div class="row">
                  <div class="col-xs-12">
                    <h3 class="page-header"><i class="fa fa-globe"></i> Identificacion Muestra: <?php echo $fila[8] ?>
                      <small class="pull-right">
                        <strong>Fecha:</strong> <?php echo $fila[1] ?>
                        <strong>Hora:</strong> <?php echo $fila[2] ?>
                      </small>
                    </h3>
                  </div>
                </div>
                <div class="row invoice-info">
                  <div class="col-md-4">
                    <h4>Identificacion</h4> 
                    <b>Programa De Formacion:</b> <?php echo $fila[3] ?> - <?php echo $fila[4] ?>
                    <br>
                    <b>Ficha:</b> <?php echo $fila[5] ?>
                    <br>
                    <b>Proyecto:</b> <?php echo $fila[6] ?>
                    <br>
                    <b>Instructor:</b> <?php echo $fila[7] ?>
                  </div>
                  <div class="col-md-4">
                    <h4>Datos Basicos</h4> 
                    <b>Departamento:</b> <?php echo $fila[9] ?>
                    <br>
                    <b>Municipio:</b> <?php echo $fila[10] ?>
                    <br>
                    <b>Vereda:</b> <?php echo $fila[11] ?>
                    <br>
                    <b>Finca:</b> <?php echo $fila[12] ?>
                    <br>
                    <b>Lote:</b> <?php echo $fila[13] ?>
                    <br>
                    <b>Topografia:</b> <?php echo $fila[14] ?>
                    <br>
                    <b>Profundidad:</b> <?php echo $fila[15] ?>
                  </div>
                  <div class="col-md-4">
                    <h4> Datos Campo</h4>
                    <b>Humedad:</b> <?php echo $fila[16] ?>
                    <br>
                    <b>Fuerza Penetracion:</b> <?php echo $fila[17] ?>
                    <br>
                    <b>Profundidad Campo:</b> <?php echo $fila[18] ?>
                    <br>
                    <b>Norte:</b> <?php echo $fila[19] ?>
                    <br>
                    <b>Occidente:</b> <?php echo $fila[20] ?>
                    <br>
                    <b>Altura:</b> <?php echo $fila[21] ?>
                    
                  </div>
                </div>


                <div class="row invoice-info">
                  <div class="col-md-4">
                    <h4> Responsable Toma</h4> 
                    <b>Nombre Responsable:</b> <?php echo $fila[22] ?>
                    <br>
                    <b>Empresa:</b> <?php echo $fila[23] ?>
                    <br>
                    <b>Correo:</b> <?php echo $fila[24] ?>
                    <br>
                    <b>Telelfono:</b> <?php echo $fila[25] ?>
                    

                  </div>
                  <div class="col-md-7">
                    <h4>Responsable Recibir Toma</h4> 
                    <b>Nombre Responsable:</b> <?php echo $fila[26] ?>
                    <br>
                    <b>Observaciones:</b> <?php echo $fila[23] ?>
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
