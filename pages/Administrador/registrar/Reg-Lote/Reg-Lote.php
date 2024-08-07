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
    <title>Lotes</title>

  </head>
  <body class="sidebar-mini fixed sidebar-collapse">
    <div class="wrapper">
      <header class="main-header hidden-print"><a class="logo" href="../../index.php">SIMDALAB</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle " href="#" data-toggle="offcanvas"></a>
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
                <li><a href="../Reg-Vereda/Reg-Vereda.php"><i class="fa fa-circle-o"></i>Vereda</a></li>
                <li><a href="../Reg-Finca/Reg-finca.php"><i class="fa fa-circle-o"></i>Finca</a></li>
                <li><a href="../Reg-Lote/Reg-Lote.php"><i class="fa fa-circle-o"></i>Lote</a></li>
                <li><a href="../Reg-Instructor/Reg-Instructor.php"><i class="fa fa-circle-o"></i>Instructor</a></li>
                <li><a href="../Reg-Programaficha/Reg-Programa_Ficha.php"><i class="fa fa-circle-o"></i>ProgramaFicha</a></li>
              </ul>
                <li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>Ingresar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                 <li><a href="../Reg-Toma_Muestra/Reg-Toma_Muestra.php"><i class="fa fa-circle-o"></i>Toma Muestra</a></li>
                  <li><a href="../Reg-Recepcion_Muestra/Reg-Recepcion_Muestra.php"><i class="fa fa-circle-o"></i>Recepcion Muestra</a></li>
              </ul>
            </li>    
               <li class="treeview"><a href="#"><i class="fa fa-flask"></i><span>Analizar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="../../Registrar/Reg-Analisis_Muestra/Reg-Analisis_Muestra.php"><i class="fa fa-circle-o"></i>Analisis Muestra</a></li>
              </ul>
            </li>
            
            <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Consultar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="../../Consultar/Cons-Toma_Muestra/Cons-Toma_Muestra.php"><i class="fa fa-circle-o"></i>Toma De Muestra</a></li>
                <li><a href="../../Consultar/Cons-Recepcion_Muestra/Cons-Recepcion_Muestra.php"><i class="fa fa-circle-o"></i>Recepcion De Muestra</a></li>
                <li><a href="../../Consultar/Cons-Analisis_Muestra/Cons-Analisis_Muestra.php"><i class="fa fa-circle-o"></i>Analisis De Muestra</a></li>
              
              </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-gears"></i><span>Configuracion</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="../Reg-Usuarios/Reg-usuarios.php"><i class="fa fa-circle-o"></i>Usuarios</a></li>
                <li><a href="../../Copia_Seguridad/Copia_Seguridad.php"><i class="fa fa-circle-o"></i>Copias de seguridad</a></li>
              </ul>
            </li>
            <li class=""><a href="../../manual_usuario/manual_de_usuario_simdalab.pdf"><i class="fa fa-book"></i><span>Manual De Usuario</span></a></li>
          </ul>
        </section>
      </aside>

      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-th"></i> Lotes</h1>
            <p>Sistema de Informacion para el Manejo de los Datos de Analisis de Muestras del Laboratorio de Suelos</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">

              <!-- Button trigger modal -->
              <div class="row">
                <div class="col-md-4">
                  <button class="btn btn-primary icon-btn" type="button" data-toggle="modal" data-target="#abrir_formulario"><i class="fa fa-fw fa-lg fa-plus"></i>Registrar Lote</button>
                    <div class="col-md-8"></div>
                </div>
              </div>
              <br>

              <!-- Modal -->
              <div class="modal fade bs-example-modal-lg" id="abrir_formulario" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" >Registrar Lote</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-4"> 
                          <div class="form-group">
                            <label class="control-label" for="id_Departamento">Departamento</label>
                            <select class="form-control" id="id_Departamento" onclick="mostrar_municipio()">
                              <option value="Selecciona">Selecciona Departamento</option>
                              <?php  
                      
                      $query="SELECT * FROM departamentos";
                      $resource=mysqli_query($conexion,$query);
                      while ($fila=mysqli_fetch_row($resource)) {
                      echo " <option value='$fila[0]' onclick='validar_Departamento()'> $fila[1] </option> ";
                      }
                      ?>
                        
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4"> 
                          <div class="form-group" id="contenedor_municipio">
                            <label class="control-label" for="id_Municipio">Municipio</label>
                            <select class="form-control" id="id_Municipio" onclick="">
                              <option value="Selecciona">Selecciona Municipio</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4"> 
                          <div class="form-group" id="contenedor_vereda">
                            <label class="control-label" for="id_Vereda">Vereda</label>
                            <select class="form-control" id="id_Vereda" onclick="">
                              <option value="Selecciona">Selecciona Vereda</option>
                        
                            </select>
                          </div>
                        </div>

                      </div>

                      <div class="row">
                        <div class="col-md-4"> 
                          <div class="form-group" id="contenedor_finca">
                            <label class="control-label" for="id_Finca">Finca</label>
                            <select class="form-control" id="id_Finca" onclick="">
                              <option value="Selecciona">Selecciona Finca</option>
                        
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="nombre_Lote" class="control-label">Nombre Lote</label>
                            <input type="text" class="form-control" id="nombre_Lote">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="Tamano" class="control-label">Tamaño (Ha)</label>
                            <input type="number" class="form-control" id="Tamano">
                          </div>
                        </div>
                        
                      </div>

                      
                    </div>
   
                    <div class="modal-footer">
                      <button type="button" id="cerrar_Modal" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                       <button class="btn btn-primary icon-btn" type="button" onclick="Registrar()"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Guardar</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body" id="Contenedor_Recargar">
                      <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                          <tr>
                            <th>Departamento</th>
                            <th>Municipio</th>
                            <th>Vereda</th>
                            <th>Finca</th>
                            <th>Lote</th>
                            <th>Eliminar</th>
                            <!-- <th></th> -->
                          </tr>
                        </thead>
                        <tbody>
                         <?php 
                          $conexion->set_charset('utf8');
          $busqueda="SELECT `id_Lote`, fincas.nombre_Finca, veredas.nombre_Vereda, municipios.nombre_Municipio, departamentos.nombre_Departamento, `nombre_Lote`, lotes.Tamano FROM `lotes`

INNER JOIN fincas ON lotes.id_Finca=fincas.id_Finca
inner JOIN veredas ON fincas.id_Vereda=veredas.id_Vereda 
INNER JOIN municipios ON veredas.id_Municipio=municipios.id_Municipio 
INNER JOIN departamentos ON municipios.id_Departamento=departamentos.id_Departamento
ORDER BY `lotes`.`id_Lote` DESC";
     
          $query=mysqli_query($conexion,$busqueda);
          while ($fila=mysqli_fetch_row($query)){

            echo "<tr> ";

            echo "<td>$fila[4]  </td>";
            echo "<td>$fila[3]  </td>";
            echo "<td>$fila[2] </td>";
            echo "<td>$fila[1] </td>";          
            echo "<td>$fila[5] </td>";
            echo "<td>$fila[6] </td>";
             echo "<td><div><a class='btn btn-danger' href='eliminar-lote.php?id_Lote=".$fila['0']."'><i class='fa fa-lg fa-trash'></i></a></div></td>";
           

            echo "</tr>";

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
    <script type="text/javascript">$('#sampleTable').DataTable( {
    language: {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
    }
} );

    </script>
    <script>
      function mostrar_municipio() {
var id_Departamento=document.getElementById('id_Departamento').value;

$("#contenedor_municipio").load("../mostrar/Most_municipio.php",{id_Departamento:id_Departamento})

}
    </script>

    <script>
      function Registrar() {
    

      if (validar_Finca() == true && validar_Nombre_Lote() == true && validar_Tamano() == true ) {
        
        var id_Finca = document.getElementById("id_Finca").value;
        var nombre_Lote = document.getElementById("nombre_Lote").value;
        var Tamano = document.getElementById("Tamano").value;
        
        id_Finca = id_Finca.toUpperCase();
        nombre_Lote = nombre_Lote.toUpperCase();
        $("#resultado").load("conexion/Conex-Lote.php", {
            id_Finca: id_Finca,
            nombre_Lote: nombre_Lote,
            Tamano: Tamano,
            
        });
    } else {
        swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectosssss",
            type: 'error',
      
        })
    }
}

$(document).ready(inicio);

function inicio() {
    
    $("#id_Finca").keyup(validar_Finca);
    $("#nombre_Lote").keyup(validar_Nombre_Lote);
    $("#Tamano").keyup(validar_Tamano);
  
}

function validar_Finca() {
    var id_Finca = document.getElementById("id_Finca").value;
    if (id_Finca == "Selecciona") {
        var id_Finca = document.getElementById("id_Finca").style.border = "2px solid red";
        return false;
    } else {
        var id_Finca = document.getElementById("id_Finca").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Nombre_Lote() {
    var nombre_Lote = document.getElementById("nombre_Lote").value;
    if (nombre_Lote.length == 0) {
        var nombre_Lote = document.getElementById("nombre_Lote").style.border = "2px solid red";
        return false;
    } else {
        var nombre_Lote = document.getElementById("nombre_Lote").style.border = "2px solid #4caf50";
        return true;
    }
}




function validar_Tamano() {
    var Tamano = document.getElementById("Tamano").value;
    if (Tamano.length == 0) {
        var Tamano = document.getElementById("Tamano").style.border = "2px solid red";
        return false;
    } else {
        var Tamano = document.getElementById("Tamano").style.border = "2px solid #4caf50";
        return true;
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