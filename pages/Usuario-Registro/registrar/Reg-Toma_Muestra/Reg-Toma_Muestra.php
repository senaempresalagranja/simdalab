<?php
session_start();
if (isset($_SESSION['registrar']))
{ 
  include '../../../../assets/conexion/conexion.php';
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
    <link rel="stylesheet" type="text/css" href="../../../../assets/css/main.css">
    <link rel="shortcut icon" href="../../../../assets/imagenes/Sindalab.png">
    <title>Toma De Muestra</title>

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
            <div class="pull-left image"><img class="img-circle" src="../../../../assets/imagenes/registro.png" alt="User Image"></div>
            <div class="pull-left info">
              <?php 
              echo "$usu";
              ?>
            </div>
          </div>
          <!-- opciones del menu de navegacion-->
         <ul class="sidebar-menu">
            <li class="active"><a href="../../index.php"><i class="fa fa-home"></i><span>Inicio</span></a></li>
            
                <li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>Ingresar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                 <li><a href="../Reg-Toma_Muestra/Reg-Toma_Muestra.php"><i class="fa fa-circle-o"></i>Toma Muestra</a></li>
                  <li><a href="../Reg-Recepcion_Muestra/Reg-Recepcion_Muestra.php"><i class="fa fa-circle-o"></i>Recepcion Muestra</a></li>
              </ul>
            </li>    
             
          </ul>
        </section>
      </aside>

      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-map"></i> Ingresar Toma De Muestra</h1>
            <p>Sistema de Informacion para el Manejo de los Datos de Analisis de Muestras del Laboratorio de Suelos</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="bs-component">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#Datos_Basicos" data-toggle="tab">Datos Basicos</a></li>
                  <li><a href="#Identificacion" data-toggle="tab">Identificacion</a></li>
                  <li><a href="#datoscampo" data-toggle="tab">Datos Campo</a></li>
                  <li><a href="#responsablestomamuestra" data-toggle="tab">Responsable Toma</a></li>
                  <li><a href="#responsablesrecibirtoma" data-toggle="tab">Responsable a Recibir</a></li>
                </ul>
                <div class="tab-content" id="myTabContent">


                  <div class="tab-pane fade active in" id="Datos_Basicos">
                    <div class="row">

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="fecha_Toma">Fecha Toma</label>
                          <input class="form-control" type="date" id="fecha_Toma" placeholder="aaaa/mm/dd"> 
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="Hora" class="control-label">Hora Toma (hh:mm)</label>
                          <input type="time" class="form-control" id="Hora">
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="id_Programa">Programa Formacion</label> 
                            <select class="form-control" id="id_Programa" onclick="mostrar_fichas()">
                            <option value="Selecciona">Selecciona Programa Formacion</option>
                            <?php  
                      
                      $query="SELECT `id_Programa`, tipo_programa.Tipo, `nombre_Programa` FROM `programas`

INNER JOIN tipo_programa ON programas.id_Tipo_Programa=tipo_programa.id_Tipo_Programa";
                      $resource=mysqli_query($conexion,$query);
                      while ($fila=mysqli_fetch_row($resource)) {
                      echo " <option value='$fila[0]'> $fila[2]- $fila[1] </option> ";
                      }
                      ?>
                          </select>
                                                              

                        </div>
                      </div>

                    </div>

                    <div class="row"> 
                      <div class="col-md-4"> 
                        <div class="form-group" id="contenedor_fichas">
                          <label class="control-label" for="id_Ficha">Ficha</label>
                            <select class="form-control" id="id_Ficha">
                              <option value="Selecciona">Selecciona Ficha</option>
                            </select>                                                              
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="Proyecto">Proyecto</label>
                          <input type="text" name="" id="Proyecto" class="form-control">                          
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="id_Instructor">Instructor</label>                              
                          <select class="form-control" id="id_Instructor">
                            <option value="Selecciona">Selecciona Instructor</option>
                            <?php  
                      
                      $query="SELECT * FROM instructores";
                      $resource=mysqli_query($conexion,$query);
                      while ($fila=mysqli_fetch_row($resource)) {
                      echo " <option value='$fila[0]'> $fila[2] </option> ";
                      }
                      ?>
                          </select>
                        </div>
                      </div>

                    </div>
                  </div>


                  <div class="tab-pane fade" id="Identificacion">
                    <div class="row">
                      <div class="col-md-4"> 
                         <div class="form-group">
                          <label class="control-label" for="identificacion_Muestra">Codigo Muestra</label>
                          <input class="form-control" type="text" id="identificacion_Muestra" placeholder="aammdd"> 
                        </div>
                      </div>

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
                          <select class="form-control" id="id_Municipio">
                            <option value="Selecciona">Selecciona Municipio</option>
                          </select>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-4"> 
                        <div class="form-group" id="contenedor_vereda">
                          <label class="control-label" for="id_Vereda">Vereda</label>
                          <select class="form-control" id="id_Vereda">
                            <option value="Selecciona">Selecciona Vereda</option>
                        
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group" id="contenedor_finca">
                          <label class="control-label" for="id_Finca">Finca</label>
                          <select class="form-control" id="id_Finca">
                            <option value="Selecciona">Selecciona Finca</option>
                        
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group" id="contenedor_lote">
                          <label class="control-label" for="id_Lote">Lote</label>
                          <select class="form-control" id="id_Lote" >
                            <option value="Selecciona">Selecciona Lote</option>
                        
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="tipo_Topografia">Topografia</label>
                          <select class="form-control" id="tipo_Topografia">
                            <option value="Selecciona">Selecciona Municipio</option>
                            <option value="Plana">Plana</option>
                            <option value="Ondulada">Ondulada</option>
                            <option value="Pendiente">Pendiente</option>      
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="profundidad_Muestra">Profundidad (Cm)</label>
                          <input class="form-control" type="text" id="profundidad_Muestra"> 
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="tab-pane fade" id="datoscampo">
                    <div class="row">
                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="Humedad">Humedad %</label>
                          <input class="form-control" type="number" id="Humedad"> 
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="fuerza_penetracion">Fuerza Penetracion (N)</label>
                          <input class="form-control" type="number" id="fuerza_penetracion"> 
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="profundidad_Campo">Profundidad (Cm)</label>
                          <input class="form-control" type="number" id="profundidad_Campo"> 
                        </div>
                      </div>  
                    </div>
                           <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="Norte" class="control-label">Norte (N)</label>
                            <input type="text" class="form-control" id="Norte">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="Occidente" class="control-label">Occidente (W)</label>
                            <input type="text" class="form-control" id="Occidente">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="Altura" class="control-label">Altura (msnm)</label>
                            <input type="number" class="form-control" id="Altura">
                          </div>
                        </div>
                      </div>
                  </div>

                  <div class="tab-pane fade" id="responsablestomamuestra">
                    <div class="row">
                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="responsable_Toma">Nombre Responsable</label>
                          <input class="form-control" type="text" id="responsable_Toma"> 
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="Empresa">Empresa</label>
                          <input class="form-control" type="text" id="Empresa"> 
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="correo_Electronico">Correo</label>
                          <input class="form-control" type="text" id="correo_Electronico"> 
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="Telefono">Telefono</label>
                          <input class="form-control" type="numbrer" id="Telefono"> 
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="tab-pane fade" id="responsablesrecibirtoma">
                    <div class="row">
                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="responsable_Recibido">Nombre Responsable</label>
                          <input class="form-control" type="text" id="responsable_Recibido"> 
                        </div>
                      </div>

                      <div class="col-md-7"> 
                        <div class="form-group">
                          <label class="control-label" for="Observaciones">Observaciones</label>
                          <textarea class="form-control"  id="Observaciones" cols="100" rows="">
                                  
                          </textarea>
                        </div>
                      </div>
                    </div>
                  

                  <div class="card-footer">
                <div class="row">
                  <div class="col-md-8 col-md-offset-5">
                    <button class="btn btn-primary icon-btn" type="button" onclick="Registrar()"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Guardar</button>
                  </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <br>
            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body" id="Contenedor_Recargar">
                      <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                          <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Codigo Muestra</th>
                            <th>Programa De Formacion</th>
                            <th>Ficha</th>
                            <th>Proyecto</th>
                            <th>Instructor</th>


                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php 
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

ORDER BY `toma_muestra`.`id_Toma_Muestra` DESC";
     
          $query=mysqli_query($conexion,$busqueda);
          while ($fila=mysqli_fetch_row($query)){
             ?>

            <tr> 

<td ><?php echo $fila[1] ?></td>
<td ><?php echo $fila[2] ?></td>
<td ><?php echo $fila[8] ?></td>
<td ><?php echo $fila[3] ?> - <?php echo $fila[4] ?></td>
<td ><?php echo $fila[5] ?></td>
<td ><?php echo $fila[6] ?></td>
<td ><?php echo $fila[7] ?></td>

                          


                          <td class='col-xs-2'>
                           <form style='float:left' action='mostrar/Mostrar-Toma_Muestra.php' method='post'>  
                              <input type='hidden' name='id' value=' <?php echo $fila[0] ?>'>
                              <button class="btn btn-primary icon-btn" type='submit' value='ver mas'><i class='fa fa-eye'></i>Ver Mas</button>
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
      function mostrar_fichas() {
var id_Programa=document.getElementById('id_Programa').value;

$("#contenedor_fichas").load("../mostrar/Most_Fichas.php",{id_Programa:id_Programa})

}
    </script>




    <script>
      function Registrar() {
    

      if (
          // 

          validar_fecha_Toma() == true &&
          validar_Hora() == true &&
          validar_id_Ficha() == true &&
          //validar_Proyecto() == true &&
          validar_id_Instructor() == true &&
          validar_identificacion_Muestra() == true &&
          validar_id_Lote() == true &&

          
          validar_tipo_Topografia() == true &&
          //validar_profundidad_Muestra() == true &&
          //validar_Humedad() == true &&
          //validar_fuerza_penetracion() == true &&
          //validar_profundidad_Campo() == true &&
          //validar_Norte() == true &&
          //validar_Occidente() == true &&
          //validar_Altura() == true &&
          validar_responsable_Toma() == true &&

          //
          
          // validar_Empresa() == true &&
          // validar_correo_Electronico() == true &&
          // validar_Telefono() == true &&
          
          // validar_Observaciones() == true &&

          validar_responsable_Recibido() == true 
        ) {
        

        var fecha_Toma = document.getElementById("fecha_Toma").value;
        var Hora = document.getElementById("Hora").value;
        var id_Ficha = document.getElementById("id_Ficha").value;
        //var Proyecto = document.getElementById("Proyecto").value;
        var id_Instructor = document.getElementById("id_Instructor").value;
        var identificacion_Muestra = document.getElementById("identificacion_Muestra").value;
        var id_Lote = document.getElementById("id_Lote").value;
        var tipo_Topografia = document.getElementById("tipo_Topografia").value;
        //var profundidad_Muestra = document.getElementById("profundidad_Muestra").value;
        //var Humedad = document.getElementById("Humedad").value;
        //var fuerza_penetracion = document.getElementById("fuerza_penetracion").value;
        //var profundidad_Campo = document.getElementById("profundidad_Campo").value;
        //var Norte = document.getElementById("Norte").value;
        //var Occidente = document.getElementById("Occidente").value;
        //var Altura = document.getElementById("Altura").value;
        var responsable_Toma = document.getElementById("responsable_Toma").value;
        //var Empresa = document.getElementById("Empresa").value;
        var correo_Electronico = document.getElementById("correo_Electronico").value;
        var Telefono = document.getElementById("Telefono").value;
        var responsable_Recibido = document.getElementById("responsable_Recibido").value;
        //var Observaciones = document.getElementById("Observaciones").value;

            fecha_Toma = fecha_Toma.toUpperCase();
            Hora = Hora.toUpperCase();
            id_Ficha = id_Ficha.toUpperCase();
            //Proyecto = Proyecto.toUpperCase();
            id_Instructor = id_Instructor.toUpperCase();
            identificacion_Muestra = identificacion_Muestra.toUpperCase();
            id_Lote = id_Lote.toUpperCase();
            tipo_Topografia = tipo_Topografia.toUpperCase();
            //profundidad_Muestra = profundidad_Muestra.toUpperCase();
            //Humedad = Humedad.toUpperCase();
            //fuerza_penetracion = fuerza_penetracion.toUpperCase();
            //profundidad_Campo = profundidad_Campo.toUpperCase();
            //Norte = Norte.toUpperCase();
            //Occidente = Occidente.toUpperCase();
            //Altura = Altura.toUpperCase();
            responsable_Toma = responsable_Toma.toUpperCase();
            //Empresa = Empresa.toUpperCase();
            correo_Electronico = correo_Electronico.toUpperCase();
            Telefono = Telefono.toUpperCase();
            responsable_Recibido = responsable_Recibido.toUpperCase();
            //Observaciones = Observaciones.toUpperCase();

        $("#resultado").load("conexion/Conex-Toma_Muestra.php", {
            

            fecha_Toma : fecha_Toma,
            Hora : Hora,
            id_Ficha : id_Ficha,
            //Proyecto : Proyecto,
            id_Instructor : id_Instructor,
            identificacion_Muestra : identificacion_Muestra,
            id_Lote : id_Lote,
            tipo_Topografia : tipo_Topografia,
            //profundidad_Muestra : profundidad_Muestra,
           // //Humedad : Humedad,
            //fuerza_penetracion : fuerza_penetracion,
            //profundidad_Campo : profundidad_Campo,
           // ////Norte : Norte,
            //Occidente : Occidente,
            //Altura : Altura,
            responsable_Toma : responsable_Toma,
            //Empresa : Empresa,
            correo_Electronico : correo_Electronico,
            Telefono : Telefono,
            responsable_Recibido : responsable_Recibido,
            //Observaciones : Observaciones,
            

            
        });
    } else {
        swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
      
        })
    }
}

$(document).ready(inicio);

function inicio() {
    

    $("#fecha_Toma").keyup(validar_fecha_Toma);
    $("#Hora").keyup(validar_Hora);
    $("#id_Ficha").keyup(validar_id_Ficha);
    //$("#Proyecto").keyup(validar_Proyecto);
    $("#id_Instructor").keyup(validar_id_Instructor);
    $("#identificacion_Muestra").keyup(validar_identificacion_Muestra);
    $("#id_Lote").keyup(validar_id_Lote);
    $("#tipo_Topografia").keyup(validar_tipo_Topografia);
    //$("#profundidad_Muestra").keyup(validar_profundidad_Muestra);
    //$("#Humedad").keyup(validar_Humedad);
    //$("#fuerza_penetracion").keyup(validar_fuerza_penetracion);
    //$("#profundidad_Campo").keyup(validar_profundidad_Campo);
    //$("#Norte").keyup(validar_Norte);
    //$("#Occidente").keyup(validar_Occidente);
    //$("#Altura").keyup(validar_Altura);
    $("#responsable_Toma").keyup(validar_responsable_Toma);
    //$("#Empresa").keyup(validar_Empresa);
    $("#correo_Electronico").keyup(validar_correo_Electronico);
    $("#Telefono").keyup(validar_Telefono);
    $("#responsable_Recibido").keyup(validar_responsable_Recibido);
    //$("#Observaciones").keyup(validar_Observaciones);

}




function validar_fecha_Toma() {
    var fecha_Toma = document.getElementById("fecha_Toma").value;
    var fecha_Toma = new Date(fecha_Toma);
    // alert(fecha_Toma)
    if (fecha_Toma.length == 0) {
        var fecha_Toma = document.getElementById("fecha_Toma").style.border = "2px solid red";
        return false;
    } else if (fecha_Toma == "Invalid Date") {
        var fecha_Toma = document.getElementById("fecha_Toma").style.border = "2px solid red";
    } else {
        var fecha_Toma = document.getElementById("fecha_Toma").style.border = "2px solid #4caf50";
        return true;
    }
}


function validar_Hora() {
    var Hora = document.getElementById("Hora").value;
    if (Hora.length == 0) {
        var Hora = document.getElementById("Hora").style.border = "2px solid red";
        return false;
    } else {
        var Hora = document.getElementById("Hora").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_id_Ficha() {
    var id_Ficha = document.getElementById("id_Ficha").value;
    if (id_Ficha == "Selecciona") {
        var id_Ficha = document.getElementById("id_Ficha").style.border = "2px solid red";
        return false;
    } else {
        var id_Ficha = document.getElementById("id_Ficha").style.border = "2px solid #4caf50";
        return true;
    }
}




/////////////////////////////////////////////////////////////////////////////////////////////////


function validar_id_Instructor() {
    var id_Instructor = document.getElementById("id_Instructor").value;
    if (id_Instructor == "Selecciona") {
        var id_Instructor = document.getElementById("id_Instructor").style.border = "2px solid red";
        return false;
    } else {
        var id_Instructor = document.getElementById("id_Instructor").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_identificacion_Muestra() {
    var identificacion_Muestra = document.getElementById("identificacion_Muestra").value;
    if (identificacion_Muestra.length == 0) {
        var identificacion_Muestra = document.getElementById("identificacion_Muestra").style.border = "2px solid red";
        return false;
    } else {
        var identificacion_Muestra = document.getElementById("identificacion_Muestra").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_id_Lote() {
    var id_Lote = document.getElementById("id_Lote").value;
    if (id_Lote == "Selecciona") {
        var id_Lote = document.getElementById("id_Lote").style.border = "2px solid red";
        return false;
    } else {
        var id_Lote = document.getElementById("id_Lote").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_tipo_Topografia() {
    var tipo_Topografia = document.getElementById("tipo_Topografia").value;
    if (tipo_Topografia == "Selecciona") {
        var tipo_Topografia = document.getElementById("tipo_Topografia").style.border = "2px solid red";
        return false;
    } else {
        var tipo_Topografia = document.getElementById("tipo_Topografia").style.border = "2px solid #4caf50";
        return true;
    }
}



function validar_responsable_Toma() {
    var responsable_Toma = document.getElementById("responsable_Toma").value;
    if (responsable_Toma.length == 0) {
        var responsable_Toma = document.getElementById("responsable_Toma").style.border = "2px solid red";
        return false;
    } else {
        var responsable_Toma = document.getElementById("responsable_Toma").style.border = "2px solid #4caf50";
        return true;
    }
}



function validar_correo_Electronico() {
    var correo_Electronico = document.getElementById("correo_Electronico").value;
    if (correo_Electronico.length == 0) {
        var correo_Electronico = document.getElementById("correo_Electronico").style.border = "2px solid red";
        return false;
    } else {
        var correo_Electronico = document.getElementById("correo_Electronico").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Telefono() {
    var Telefono = document.getElementById("Telefono").value;
    if (Telefono.length == 0) {
        var Telefono = document.getElementById("Telefono").style.border = "2px solid red";
        return false;
    } else {
        var Telefono = document.getElementById("Telefono").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_responsable_Recibido() {
    var responsable_Recibido = document.getElementById("responsable_Recibido").value;
    if (responsable_Recibido.length == 0) {
        var responsable_Recibido = document.getElementById("responsable_Recibido").style.border = "2px solid red";
        return false;
    } else {
        var responsable_Recibido = document.getElementById("responsable_Recibido").style.border = "2px solid #4caf50";
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
