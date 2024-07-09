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
    <title>Actualizar Usuario</title>

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
            <h1><i class="fa fa-th"></i> Actualizar Usuario</h1>
            <p>Sistema de Informacion para el Manejo de los Datos de Analisis de Muestras del Laboraorio de Suelos</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">


	 <form action="actualizar_usuario.php" id="formulario">
	   <div class="row">
<div class="col-xs-12 col-lg-7 col-lg-offset-4" data-form-type="formoid">
  		<div class="col-xs-12 col-md-7">
		  <div class="form-group">
  		    <label for="">Usuario </label>
  		    <input type="text" name="" id="usuario" class="form-control">
		  </div>
  		</div>


    	<div class="col-xs-12 col-md-7">
    	  <div class="form-group">

   			<label for="">Nombre Usuario </label>
  			<input type="text" name="" id="nombre_usuario" class="form-control">
		  </div>
  		</div>

		<div class="col-xs-12 col-md-7">
		  <div class="form-group">
  			<label for="">Contraseña  </label><b class="help-block">Si no escribe nada la contraseña no se actualizará</b>
  			<input type="text" name="" id="contraseña" class="form-control">
		  </div>
  		</div>

  		<div class="col-xs-12 col-md-7">
		  <div class="form-group">
      		<label for="">Rol </label>
    
                         
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
	</div>
	 </form>
<!-- <div class="row">
  <br>
  <div class="col-md-12">
    <input type="button" value="Actualizar Usuario" onclick="actualizar_usuario()" class="btn ">
  </div>
</div> -->

<div class="row">
                <div class="col-xs-12 box">
                  <button class="btn btn-primary icon-btn" type="button" value="Actualizar Usuario" onclick="actualizar_usuario()">
                    <i class=" fa fa-refresh">
                    </i>
                    <span>
                      Actualizar
                    </span>
                  </button>
                </div>
              </div>


<div id="contenedor"></div>


  <?php 

$id_usuario=$_REQUEST["id_usuario"];


$query="SELECT `id_Usuario`, `rol`, `nombre_Usuario`, `usuario` FROM usuarios  WHERE id_Usuario='$id_usuario' ";

$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

echo "<script>
var id_usuario='$id_usuario';
var usuario=document.getElementById('usuario').value='$fila[3]';
var rol=document.getElementById('rol').value='$fila[1]';
var nombre_usuario=document.getElementById('nombre_usuario').value='$fila[2]';
</script>";

  ?>
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
 
            <script>
  
  $(document).ready(inicio);

  function inicio() {
$("#contraseña").keyup(validar_contraseña);
$("#usuario").keyup(validar_usuario);
$("#nombre_usuario").keyup(validar_nombre_usuario);
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
var nombre_usuario=document.getElementById('nombre_usuario').style.border="2px solid #4caf50"

      return true;
      } 

  }
  function actualizar_usuario() {

    if (validar_usuario()==true && validar_nombre_usuario()==true && validar_contraseña()==true && validar_rol()==true) {

 var usuario=document.getElementById('usuario').value;
var rol=document.getElementById("rol").value;
var nombre_usuario=document.getElementById('nombre_usuario').value;
var contraseña=document.getElementById('contraseña').value;
$("#contenedor").load("actualizar/actualizar_usuario.php",{usuario:usuario,rol:rol,id_usuario:id_usuario,actualizar_contraseña:actualizar_contraseña,nombre_usuario:nombre_usuario,contraseña:contraseña});

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
var usuario=document.getElementById('usuario').style.border="2px solid #4caf50"

      return true;
      } 

  }


  function validar_rol() {
      var rol=document.getElementById("rol").value;
  if (rol=="Selecciona") {

var rol=document.getElementById('rol').style.border="2px solid red";
return false

  }else{
var rol=document.getElementById('rol').style.border="2px solid #4caf50";
return true
  }
  }


function validar_contraseña() {
   var contraseña=document.getElementById('contraseña').value;
      if(contraseña==null  || contraseña.length==0){
var contraseña=document.getElementById('contraseña').style.border="2px solid #4caf50";
actualizar_contraseña=false;

        return true;

      }else if (contraseña.length>50) {
var contraseña=document.getElementById('contraseña').style.border="2px solid red";
        return false;

      } else{
var contraseña=document.getElementById('contraseña').style.border="2px solid #4caf50";
actualizar_contraseña=true;

      return true;
      } 

}
</script>
  </body>

<?php

}
else
{
  echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../../../index.php?Acceso Denegado'</script>";
}  
?>
</html>


