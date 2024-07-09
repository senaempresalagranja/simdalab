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
    <title>Usuarios</title>

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
                <li><a href="../Registrar/Reg-Analisis_Muestra/Reg-Analisis_Muestra.php"><i class="fa fa-circle-o"></i>Analisis Muestra</a></li>
              </ul>
            </li>
            
            <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Consultar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="../Consultar/Cons-Toma_Muestra/Cons-Toma_Muestra.php"><i class="fa fa-circle-o"></i>Toma De Muestra</a></li>
                <li><a href="../Consultar/Cons-Recepcion_Muestra/Cons-Recepcion_Muestra.php"><i class="fa fa-circle-o"></i>Recepcion De Muestra</a></li>
                <li><a href="../Consultar/Cons-Analisis_Muestra/Cons-Analisis_Muestra.php"><i class="fa fa-circle-o"></i>Analisis De Muestra</a></li>
              
              </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-gears"></i><span>Configuracion</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="../Reg-Usuarios/Reg-usuarios.php"><i class="fa fa-circle-o"></i>Usuarios</a></li>
                <li><a href="../Copia_Seguridad/Copia_Seguridad.php"><i class="fa fa-circle-o"></i>Copias de seguridad</a></li>
              </ul>
            </li>
            <li class=""><a href="../../manual_usuario/manual_de_usuario_simdalab.pdf"><i class="fa fa-book"></i><span>Manual De Usuario</span></a></li>
          </ul>
        </section>
      </aside>

      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-th"></i> Usuarios</h1>
            <p>Sistema de Informacion para el Manejo de los Datos de Analisis de Muestras del Laboratorio de Suelos</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">

              <!-- Button trigger modal -->
              <div class="row">
                <div class="col-md-4">
                  <button class="btn btn-primary icon-btn" type="button" data-toggle="modal" data-target="#abrir_formulario"><i class="fa fa-fw fa-lg fa-plus"></i>Registrar Usuario</button>
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
                      <h4 class="modal-title" >Registrar Usuario</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">

                        <div class="col-md-4"> 
                          <div class="form-group" >
                            <label class="form-control-label" for="Nombre_Empresa">Usuario</label>
                            <input type="text" name="" id="usuario"  class="form-control">
                          </div>
                        </div>

                        <div class="col-md-4"> 
                          <div class="form-group" >
                            <label class="form-control-label" for="nombre_usuario">Nombre Del Usuario</label>
                            <input type="text" name="" id="nombre_usuario"  class="form-control">
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="form-control-label" for="rol">Rol</label>
                            <select name="rol" class="form-control" id="rol" onclick="validar_rol()">
                              <option value="Selecciona">Selecciona</option>
                              <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                              <option value="Consulta">Consulta</option>
                              <option value="Analista">Analista</option>
                              <option value="Registro">Registro</option>
                            </select>
                          </div>
                        </div>

                      </div>

                      <div class="row">

                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="form-control-label" for="id_Municipio">Contraseña</label>
                            <input type="password" class="form-control" name="" id="contraseña">
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="form-control-label" for="id_Municipio">Repita Contraseña</label>
                            <input type="password" class="form-control" name="" id="contraseña_repita"> 
                          </div>
                        </div>
                      </div>
                      <div id="contenedor"></div>



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
                            <th>Nombre del Usuario</th>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Actualizar</th>


                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $conexion->set_charset('utf8');
          $busqueda="SELECT  `nombre_Usuario`,`rol`, `usuario`, `id_Usuario` FROM `usuarios`";
     
          $query=mysqli_query($conexion,$busqueda);
          while ($fila=mysqli_fetch_row($query)){
           ?> 
<tr >
    <td class=""> <?php echo "$fila[0]"; ?></td>
    <td class=""> <?php echo "$fila[2]"; ?></td>
    <td class=""> <?php echo "$fila[1]"; ?></td>
    <td class="">
    
    <form action="Actu-usuario.php" method="post">
        <input type="hidden" name="id_usuario" value="<?php echo "$fila[3]"; ?>">
<button class="btn btn-primary icon-btn" type='submit' value='ver mas'><i class='fa fa-refresh'></i>Actualizar</button>

    </form>    

    </td>



</tr>
<?php 
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
        $(document).ready(inicio);

  function inicio() {

$("#usuario").keyup(validar_usuario);
$("#contraseña").keyup(validar_contraseña);
$("#contraseña_repita").keyup(validar_contraseña_repita);
$("#nombre_usuario").keyup(validar_nombre_usuario);
  }

function validar_contraseña() {
   var contraseña=document.getElementById('contraseña').value;
      if(contraseña==null  || contraseña.length==0){
  var contraseña=document.getElementById('contraseña').style.border="2px solid red"
        return false;

      }else if (contraseña.length>50) {
var contraseña=document.getElementById('contraseña').style.border="2px solid red"
        return false;

      } else{
var contraseña=document.getElementById('contraseña').style.border="2px solid green"

      return true;
      } 

}

function validar_contraseña_repita() {
   var contraseña_repita=document.getElementById('contraseña_repita').value;
      if(contraseña_repita==null  || contraseña_repita.length==0){
  var contraseña_repita=document.getElementById('contraseña_repita').style.border="2px solid red"
        return false;

      }else if (contraseña_repita.length>50) {
var contraseña_repita=document.getElementById('contraseña_repita').style.border="2px solid red"
        return false;

      } else{
var contraseña_repita=document.getElementById('contraseña_repita').style.border="2px solid green"

      return true;
      } 

}

  function Registrar() {
    if (validar_usuario()==true && validar_nombre_usuario()==true && validar_rol()==true && validar_contraseña()==true && validar_contraseña_repita()==true) {

var nombre_usuario=document.getElementById("nombre_usuario").value;
   var contraseña_repita=document.getElementById('contraseña_repita').value;
      var contraseña=document.getElementById('contraseña').value;


      if (contraseña==contraseña_repita) {
 var usuario=document.getElementById('usuario').value;
var rol=document.getElementById("rol").value;


$("#contenedor").load("conexion/Conex-usuarios.php",{usuario:usuario,rol:rol,contraseña:contraseña,nombre_usuario:nombre_usuario});

}else{
swal("Advertencia","Contraseñas Diferentes","error")
   var contraseña_repita=document.getElementById('contraseña_repita').value="";
      var contraseña=document.getElementById('contraseña').value="";

      var contraseña_repita=document.getElementById('contraseña_repita').style.border="2px solid red";
      var contraseña=document.getElementById('contraseña').style.border="2px solid red";
}

    }
  }


  function validar_usuario() {
   
         var usuario=document.getElementById('usuario').value;
      if(usuario==null  || usuario.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(usuario)){
  var usuario=document.getElementById('usuario').style.border="2px solid red"
        return false;

      }else if (usuario.length>50) {
var usuario=document.getElementById('usuario').style.border="2px solid red"
        return false;

      } else{
var usuario=document.getElementById('usuario').style.border="2px solid green"

      return true;
      } 

  }

    function validar_nombre_usuario() {
   
         var nombre_usuario=document.getElementById('nombre_usuario').value;
      if(nombre_usuario==null  || nombre_usuario.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(nombre_usuario)){
  var nombre_usuario=document.getElementById('nombre_usuario').style.border="2px solid red"
        return false;

      }else if (nombre_usuario.length>50) {
var nombre_usuario=document.getElementById('nombre_usuario').style.border="2px solid red"
        return false;

      } else{
var nombre_usuario=document.getElementById('nombre_usuario').style.border="2px solid green"

      return true;
      } 

  }


  function validar_rol() {
      var rol=document.getElementById("rol").value;
  if (rol=="Selecciona") {

var rol=document.getElementById('rol').style.border="2px solid red";
return false

  }else{
var rol=document.getElementById('rol').style.border="2px solid green";
return true
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