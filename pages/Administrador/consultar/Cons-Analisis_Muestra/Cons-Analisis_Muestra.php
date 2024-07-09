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
    <title>Consultar Analisis De Muestra</title>

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
            <h1><i class="fa fa-map"></i> Consultar analisis de muestra</h1>
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
          <div class="col-md-12 col-xs-5 col-md-offset-1">
          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label" for="">Codigo finca</label>
              <input type="text" class="form-control" name="id_Finca" id="id_Finca">
            </div>  
           
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label" for="">Codigo muestra</label>
              <input type="text" class="form-control" name="id_Toma_Muestra" id="id_Toma_Muestra">
            </div>  
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label" for="">Fecha de analisis</label>
              <input type="text" class="form-control" name="Fecha" id="Fecha">
            </div>
          </div>
          </div>
        </div>
  
        <div class="row">

          
          <div class="col-xs-12 box">
            <button class="btn btn-primary icon-btn" type="button" value="Exportar pdf" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="icon fa fa-file-pdf-o"></i><span>PDF</span></button>

            <button class="btn btn-primary icon-btn" type="button" value="Exportar excel" onclick="exportar_excel()"><i class="icon fa fa-file-excel-o"></i><span>Excel</span></button>

          </div>
        </div>  


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Exportar analisis</h4>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-xs-12 box">
            <button class="btn btn-primary icon-btn" type="button" value="Exportar pdf" onclick="exportar_pdf()"><i class="icon fa fa-file-pdf-o"></i><span>Exportar consultas</span></button>

            <button class="btn btn-primary icon-btn" type="button" value="Exportar excel" onclick="exportar_pdf_info()"><i class="icon fa fa-file-pdf-o"></i><span>Exportar Informes</span></button>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
        <div class="row">
          <div class="col-xs-12  ">
            <div class="panel panel-default">
              <table class="table table-fixed">
                <thead>
                  <tr>
                    <th class="col-xs-3">
                    Fecha de analisis
                    </th>
                    <th class="col-xs-3">
                    Codigo muestra
                    </th>
                    <th class="col-xs-3">
                    Codigo Finca
                    </th>

                    <th class="col-xs-3">
                    Ver mas 
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
        var formulario = document.getElementById('formulario').action = 'exportar/pdf/expor-analisis.php';
        var formulario = document.getElementById('formulario').submit();
    } else {
        swal({
            title: 'Error!',
            text: "Ingrese Un Criterio De Busqueda",
            type: 'error',
            // background: '#fff url(../../../assets/img/Huevo3.png)',
            confirmButtonColor: '#238276'
        })
    }
}


function exportar_pdf_info() {
    if (enviar() == true) {
        var formulario = document.getElementById('formulario').action = 'exportar/pdf/expor-info_analisis.php';
        var formulario = document.getElementById('formulario').submit();
    } else {
        swal({
            title: 'Error!',
            text: "Ingrese Un Criterio De Busqueda",
            type: 'error',
            // background: '#fff url(../../../assets/img/Huevo3.png)',
            confirmButtonColor: '#238276'
        })
    }
}

function exportar_excel() {
    if (enviar() == true) {
        var formulario = document.getElementById('formulario').action = 'exportar/excel/expor-analisis.php';
        var formulario = document.getElementById('formulario').submit();
    } else {
        swal({
            title: 'Error!',
            text: "Ingrese Un Criterio De Busqueda",
            type: 'error',
            // background: '#fff url(../../../assets/img/Huevo3.png)',
            confirmButtonColor: '#238276'
        })
    }
}
$(document).ready(inicio);

function inicio() {
    $("#Fecha").keyup(enviar);
    $("#id_Toma_Muestra").keyup(enviar);
    $("#id_Finca").keyup(enviar);
}

function validar_Fecha() {
    var Fecha = document.getElementById('Fecha').value;
    Fecha = Fecha.toUpperCase();
    if (Fecha == null || Fecha.length == 0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(Fecha)) {
        var Fecha = document.getElementById('Fecha').style.border = "2px solid red"
        return false;
    } else if (Fecha.length > 50) {
        var Fecha = document.getElementById('Fecha').style.border = "2px solid red";
        return false;
    } else {
        var Fecha = document.getElementById('Fecha').style.border = "2px solid #4caf50";
        var Fecha = document.getElementById('Fecha').value;
        return true;
    }
}


function validar_id_Toma_Muestra() {
    var id_Toma_Muestra = document.getElementById('id_Toma_Muestra').value;
    id_Toma_Muestra = id_Toma_Muestra.toUpperCase();
    if (id_Toma_Muestra == null || id_Toma_Muestra.length == 0 || /[]/.test(id_Toma_Muestra)) {
        var id_Toma_Muestra = document.getElementById('id_Toma_Muestra').style.border = "2px solid red"
        return false;
    } else if (id_Toma_Muestra.length > 50) {
        var id_Toma_Muestra = document.getElementById('id_Toma_Muestra').style.border = "2px solid red";
        return false;
    } else {
        var id_Toma_Muestra = document.getElementById('id_Toma_Muestra').style.border = "2px solid #4caf50";
        var id_Toma_Muestra = document.getElementById('id_Toma_Muestra').value;
        return true;
    }
}

function validar_id_Finca() {
    var id_Finca = document.getElementById('id_Finca').value;
    id_Finca = id_Finca.toUpperCase();
    if (id_Finca == null || id_Finca.length == 0 || /[]/.test(id_Finca)) {
        var id_Finca = document.getElementById('id_Finca').style.border = "2px solid red"
        return false;
    } else if (id_Finca.length > 50) {
        var id_Finca = document.getElementById('id_Finca').style.border = "2px solid red";
        return false;
    } else {
        var id_Finca = document.getElementById('id_Finca').style.border = "2px solid #4caf50";
        var id_Finca = document.getElementById('id_Finca').value;
        return true;
    }
}





function enviar() {
    if (validar_Fecha() == true || validar_id_Toma_Muestra() == true  ||  validar_id_Finca() == true) {
        var Fecha = document.getElementById('Fecha').value;
        var id_Toma_Muestra = document.getElementById('id_Toma_Muestra').value;
        var id_Finca = document.getElementById('id_Finca').value;
        $("#contenedor_filtar").load("filtrar/filtrar-Analisis.php", {
            Fecha: Fecha,
            id_Toma_Muestra: id_Toma_Muestra,
            id_Finca: id_Finca,
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
