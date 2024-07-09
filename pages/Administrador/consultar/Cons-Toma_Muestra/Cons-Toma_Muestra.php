<?php
session_start();
if (isset($_SESSION['ADMINISTRADOR']))
{ 
  include '../../../../assets/conexion/conexion.php';
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
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/main.css">
    <link rel="shortcut icon" href="../../../../assets/imagenes/Sindalab.png">
    <title>Consultar Recepcion De Muestra</title>

  </head>
  <body class="sidebar-mini fixed sidebar-collapse">
    <div class="wrapper">
      <header class="main-header hidden-print"><a class="logo" href="../../index.php">SIMDALAB</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">   
              <li><a href="../../../../assets/conexion/cerrar.php"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Menu de navegacion  -->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="../../../../assets/imagenes/administrador.png" alt="User Image"></div>
            <div class="pull-left info">
              <?php 
              echo "$usu";
              ?>
            </div>
          </div>
          <!-- opciones del menu de navegacion-->
          <ul class="sidebar-menu">
            <li class="active"><a href="../../index.php"><i class="fa fa-home"></i><span>Inicio</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-folder"></i><span>Registrar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="../../Registrar/Reg-Vereda/Reg-Vereda.php"><i class="fa fa-circle-o"></i>Vereda</a></li>
                <li><a href="../../Registrar/Reg-Finca/Reg-finca.php"><i class="fa fa-circle-o"></i>Finca</a></li>
                <li><a href="../../Registrar/Reg-Lote/Reg-Lote.php"><i class="fa fa-circle-o"></i>Lote</a></li>
                <li><a href="../../Registrar/Reg-Instructor/Reg-Instructor.php"><i class="fa fa-circle-o"></i>Instructores</a></li>
                <li><a href="../../Registrar/Reg-Programaficha/Reg-Programa_Ficha.php"><i class="fa fa-circle-o"></i>ProgramaFicha</a></li>
              </ul>
                <li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>Ingresar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                 <li><a href="../../Registrar/Reg-Toma_Muestra/Reg-Toma_Muestra.php"><i class="fa fa-circle-o"></i>Toma Muestra</a></li>
                  <li><a href="../../Registrar/Reg-Recepcion_Muestra/Reg-Recepcion_Muestra.php"><i class="fa fa-circle-o"></i>Recepcion Muestra</a></li>
              </ul>
            </li>    
            <li class="treeview"><a href="#"><i class="fa fa-flask"></i><span>Analizar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="../../Registrar/Reg-Analisis_Muestra/Reg-Analisis_Muestra.php"><i class="fa fa-circle-o"></i>Analisis Muestra</a></li>
              </ul>
            </li>
            
            <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Consultar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="../Cons-Toma_Muestra/Cons-Toma_Muestra.php"><i class="fa fa-circle-o"></i>Toma De Muestra</a></li>
                <li><a href="../Cons-Recepcion_Muestra/Cons-Recepcion_Muestra.php"><i class="fa fa-circle-o"></i>Recepcion De Muestra</a></li>
                <li><a href="../Cons-Analisis_Muestra/Cons-Analisis_Muestra.php"><i class="fa fa-circle-o"></i>Analisis De Muestra</a></li>
              
              </ul>
            </li>


            <li class="treeview"><a href="#"><i class="fa fa-gears"></i><span>Configuracion</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="../Reg-Usuarios/Reg-usuarios.php"><i class="fa fa-circle-o"></i>Usuarios</a></li>
                <li><a href="../../Copia_Seguridad/Copia_Seguridad.php"><i class="fa fa-circle-o"></i>Copias de seguridad</a></li>
              </ul>
            </li>
          </ul>
        </section>
      </aside>

      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-map"></i> Consultar Toma De Muestras</h1>
            <p>Sistema de Informacion para el Manejo de los Datos de Analisis de Muestras del Laboratorio de Suelos</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="bs-component">
          
            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body" id="Contenedor_Recargar">
                     <form action="" id="formulario" method="POST" autocomplete="off">
  
        <div class="row">
          <div class="col-md-12 col-xs-8 col-md-offset-4">
            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="">Codigo muestra</label>
                <input type="text" class="form-control" name="identificacion_Muestra" id="identificacion_Muestra">
             </div>  
           </div>
          </div>



      

        </div>
  
        <div class="row">

          
          <div class="col-xs-12 box">
            <button class="btn btn-primary icon-btn" type="button" value="Exportar pdf" onclick="exportar_pdf()"><i class="icon fa fa-file-pdf-o"></i><span>PDF</span></button>

            <button class="btn btn-primary icon-btn" type="button" value="Exportar excel" onclick="exportar_excel()"><i class="icon fa fa-file-excel-o"></i><span>Excel</span></button>

          </div>
        </div>  

        <div class="row">
          <div class="col-xs-12  ">
            <div class="panel panel-default">
              <table class="table table-fixed">
                <thead>
                  <tr>
                    <th class="col-xs-1">
                    Fecha  
                    </th>
                    <th class="col-xs-1">
                    Hora 
                    </th>

                    <th class="col-xs-2">
                    Codigo Muestra
                    </th>

                    <th class="col-xs-3">
                    Programa de formacion 
                    </th>

                    <th class="col-xs-1">
                    Ficha 
                    </th>

                    <th class="col-xs-2">
                    Instructor  
                    </th>

                    <th class="col-xs-2">
                      
                    </th>


                  </tr>
                </thead>
                <tbody id="contenedor_filtar">
                </tbody>
              </table>
            </div>  
          </div>
        </div>
      </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>

        </div>      
      </div>

        
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
      
      </div>
    <!-- Javascripts-->
    <div id="resultado"></div>
    <script src="../../../../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../../../../assets/js/essential-plugins.js"></script>
    <script src="../../../../assets/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/plugins/pace.min.js"></script>
    <script src="../../../../assets/js/main.js"></script>
    <script type="text/javascript" src="../../../../assets/js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/plugins/dataTables.bootstrap.min.js"></script>


<script>
function exportar_pdf() {
    if (enviar() == true) {
        var formulario = document.getElementById('formulario').action = 'exportar/pdf/export-Toma.php';
        var formulario = document.getElementById('formulario').submit();
    } else {
        swal({
            title: 'Error!',
            text: "Ingrese Un Criterio De Busqueda",
            type: 'error',
            confirmButtonColor: '#238276'
        })
    }
}

function exportar_excel() {
    if (enviar() == true) {
        var formulario = document.getElementById('formulario').action = 'exportar/excel/export-Toma.php';
        var formulario = document.getElementById('formulario').submit();
    } else {
        swal({
            title: 'Error!',
            text: "Ingrese Un Criterio De Busqueda",
            type: 'error',
            confirmButtonColor: '#238276'
        })
    }
}
$(document).ready(inicio);

function inicio() {
    $("#fecha_Toma").keyup(enviar);
    $("#identificacion_Muestra").keyup(enviar);
    $("#nombre_Programa").keyup(enviar);
    $("#fichas").keyup(enviar);
}

function validar_fecha_Toma() {
    var fecha_Toma = document.getElementById('fecha_Toma').value;
    fecha_Toma = fecha_Toma.toUpperCase();
    if (fecha_Toma == null || fecha_Toma.length == 0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(fecha_Toma)) {
        var fecha_Toma = document.getElementById('fecha_Toma').style.border = "2px solid red"
        return false;
    } else if (fecha_Toma.length > 50) {
        var fecha_Toma = document.getElementById('fecha_Toma').style.border = "2px solid red";
        return false;
    } else {
        var fecha_Toma = document.getElementById('fecha_Toma').style.border = "2px solid #4caf50";
        var fecha_Toma = document.getElementById('fecha_Toma').value;
        return true;
    }
}


function validar_identificacion_Muestra() {
    var identificacion_Muestra = document.getElementById('identificacion_Muestra').value;
    identificacion_Muestra = identificacion_Muestra.toUpperCase();
    if (identificacion_Muestra == null || identificacion_Muestra.length == 0 || /[]/.test(identificacion_Muestra)) {
        var identificacion_Muestra = document.getElementById('identificacion_Muestra').style.border = "2px solid red"
        return false;
    } else if (identificacion_Muestra.length > 50) {
        var identificacion_Muestra = document.getElementById('identificacion_Muestra').style.border = "2px solid red";
        return false;
    } else {
        var identificacion_Muestra = document.getElementById('identificacion_Muestra').style.border = "2px solid #4caf50";
        var identificacion_Muestra = document.getElementById('identificacion_Muestra').value;
        return true;
    }
}


function validar_nombre_Programa() {
    var nombre_Programa = document.getElementById('nombre_Programa').value;
    nombre_Programa = nombre_Programa.toUpperCase();
    if (nombre_Programa == null || nombre_Programa.length == 0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(nombre_Programa)) {
        var nombre_Programa = document.getElementById('nombre_Programa').style.border = "2px solid red"
        return false;
    } else if (nombre_Programa.length > 50) {
        var nombre_Programa = document.getElementById('nombre_Programa').style.border = "2px solid red";
        return false;
    } else {
        var nombre_Programa = document.getElementById('nombre_Programa').style.border = "2px solid #4caf50";
        var nombre_Programa = document.getElementById('nombre_Programa').value;
        return true;
    }
}


function validar_fichas() {
    var fichas = document.getElementById('fichas').value;
    fichas = fichas.toUpperCase();
    if (fichas == null || fichas.length == 0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(fichas)) {
        var fichas = document.getElementById('fichas').style.border = "2px solid red"
        return false;
    } else if (fichas.length > 50) {
        var fichas = document.getElementById('fichas').style.border = "2px solid red";
        return false;
    } else {
        var fichas = document.getElementById('fichas').style.border = "2px solid #4caf50";
        var fichas = document.getElementById('fichas').value;
        return true;
    }
}


function enviar() {
    if (validar_identificacion_Muestra() == true) {
        // var fecha_Toma = document.getElementById('fecha_Toma').value;
        var identificacion_Muestra = document.getElementById('identificacion_Muestra').value;
        // var nombre_Programa = document.getElementById('nombre_Programa').value;
        // var fichas = document.getElementById('fichas').value;

        $("#contenedor_filtar").load("filtrar/filtrar-toma.php", {
            // fecha_Toma: fecha_Toma,
            identificacion_Muestra: identificacion_Muestra,
            // nombre_Programa: nombre_Programa,
            // fichas: fichas
        });
        return true;
    } else {
        return false;
    }
}
</script>


  </body>
</html>
<?php

}
else
{
  echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../../../index.php?Acceso Denegado'</script>";
}  
?>
