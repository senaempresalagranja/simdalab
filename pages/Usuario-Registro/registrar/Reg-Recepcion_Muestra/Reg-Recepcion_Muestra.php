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
    <title>Recepcion De Muestra</title>

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
            <h1><i class="fa fa-map"></i> Ingresar Recepcion De Muestra</h1>
            <p>Sistema de Informacion para el Manejo de los Datos de Analisis de Muestras del Laboratorio de Suelos</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="bs-component">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#Datos_Basicos" data-toggle="tab">Datos Basicos</a></li>
                  <li><a href="#Analisis_a_Realizar" data-toggle="tab">Analisis A Realizar</a></li>
                  <li class=""><a href="#datoscampo" data-toggle="tab" aria-expanded="false">Responsables </a></li>
                </ul>
                <div class="tab-content" id="myTabContent">


                  <div class="tab-pane fade active in" id="Datos_Basicos">
                    <div class="row">

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="Fecha">Fecha Recepcion</label>
                          <input class="form-control" type="date" id="Fecha" placeholder="aaaa/mm/dd"> 
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="Hora" class="control-label">Hora Recepcion (hh:mm)</label>
                          <input type="time" class="form-control" id="Hora">
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="id_Toma_Muestra">Codigo Muestra</label> 
                            <select class="form-control" id="id_Toma_Muestra" >
                            <option value="Selecciona">Selecciona Codigo Muestra</option>
                            <?php  
                      
                      $query="SELECT * FROM `toma_muestra`";
                      $resource=mysqli_query($conexion,$query);
                      while ($fila=mysqli_fetch_row($resource)) {
                      echo " <option value='$fila[0]'> $fila[6] </option> ";
                      }
                      ?>
                          </select>
                                                              

                        </div>
                      </div>

                    </div>

                    
                  </div>
<!-- ****************     SECTION OF CHECKBOX  ******************* -->
<!-- ********************************************************************* -->
                  <div class="tab-pane fade" id="Analisis_a_Realizar">
                    <div class="row">
                      <div class="col-md-4"> 
                        <div class="form-group">
                          <input type="checkbox" id="Humedad" value="No" onclick="validateHumedad()">
                          <label class="control-label" for="Humedad">Humedad %</label>
                          <!-- <input type="text" name="" id="Humedad" class="form-control"> -->                                                             
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <input type="checkbox" id="Textura" value="No" onclick="validateTextura()">
                          <label class="control-label" for="Textura">Textura</label>
                         <!--  <input type="text" name="" id="TexturaValor" class="form-control">  -->                         
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <input type="checkbox" id="ph_Muestra" value="No" onclick="validatePh()">
                          <label class="control-label" for="ph_Muestra">ph</label>
                         <!--  <input type="text" name="" id="ph_Muestra" class="form-control">  -->                         
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-4"> 
                        <div class="form-group">
                          <input type="checkbox" id="densidad_Aderente" value="No" onclick="validateAparente()">
                          <label class="control-label" for="densidad_Aderente">Densidad Aparente (g/ml)</label>
                          <!-- <input type="text" name="" id="densidad_Aderente" class="form-control">     -->                      
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <input type="checkbox" id="densidad_Real" value="No" onclick="validateDensidadreal()">
                          <label class="control-label" for="densidad_Real">Densidad Real (g/ml)</label>
                          <!-- <input type="text" name="" id="densidad_Real" class="form-control"> -->                          
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <input type="checkbox" id="porosidad" value="No" onclick="validatePorosidad()">
                          <label class="control-label" for="porosidad">Porosidad %</label>
                          <!-- <input type="text" name="" id="porosidad" class="form-control">   -->                        
                        </div>
                      </div>
                    </div>

                    <div class="row">  
                      <div class="col-md-4"> 
                        <div class="form-group">
                          <input type="checkbox" id="retencion_Humedad" value="No" onclick="validateRetencion()">
                          <label class="control-label" for="retencion_Humedad">Retención Humedad</label>
                         <!--  <input type="text" name="" id="retencion_Humedad" class="form-control">         -->                  
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <input type="checkbox" id="distrubucion_tamanos" value="No" onclick="validateDistribucionT()">
                          <label class="control-label" for="distrubucion_tamanos">distrubucion Tamaños</label>
                          <!-- <input type="text" name="" id="distrubucion_tamanos" class="form-control"> -->                          
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <input type="checkbox" id="carbono_organico" value="No" onclick="validateCarbonoO()">
                          <label class="control-label" for="carbono_organico">Carbono Organico %</label>
                          <!-- <input type="text" name="" id="carbono_organico" class="form-control"> -->                          
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      

              

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <input type="checkbox" id="materia_Organica" value="No" onclick="validateMateriaO()">
                          <label class="control-label" for="materia_Organica">Materia Organica %</label>
                          <!-- <input type="text" name="" id="materia_Organica" class="form-control"> -->                          
                        </div>
                      </div>

                      <div class="col-md-5"> 
                        <div class="form-group">
                          <input type="checkbox" id="CIC" value="No" onclick="validateCic()">
                          <label class="control-label" for="CIC" >CIC</label>
                          <!-- <input type="text" name="" id="CIC" class="form-control"> -->                          
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="elementos_Menores" value="Ninguno">Elementos Menores</label> 
                          <select id="elementos_Menores" class="form-control">
                            <option value="Selecciona">Selecciona Elementos Menores</option>
                            <option value="Cu">Cu</option>
                            <option value="Zn">Zn</option>
                            <option value="Fe">Fe</option>
                            <option value="Mn">Mn</option>
                          </select>                          
                        </div>
                      </div>
                      

                      
                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="cationes_Intercambiables" value="Ninguno">Cationes Intercambiables</label> 
                          <select id="cationes_Intercambiables" class="form-control">
                            <option value="Selecciona">Selecciona Cationes Intercambiables</option>
                            <option value="Na">Na</option>
                            <option value="Mg">Mg</option>
                            <option value="K">K</option>
                          </select>                          
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="Otros">Otros</label>
                          <input type="text" name="" id="Otros" class="form-control">                          
                        </div>
                      </div>
                  
                    

                    

                  </div>

                  <div class="tab-pane fade" id="datoscampo">
                    <div class="row">
                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="muestra_Entregada_Por">Muestra Entregada Por</label>
                          <input type="text" name="" id="muestra_Entregada_Por" class="form-control">                          
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="muestra_Recibida_Por">Muestra Recibida Por</label>
                          <input type="text" name="" id="muestra_Recibida_Por" class="form-control">                          
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="Observaciones">Observaciones</label>
                          <textarea class="form-control" id="Observaciones">                                  
                          </textarea>                        
                        </div>
                      </div>
                    </div>
                           
                  

                  

                  

                  <div class="card-footer">
                <div class="row">
                  <div class="col-md-8 col-md-offset-5">
                    <button class="btn btn-primary icon-btn sendDataChecked" type="button" onclick="Registrar()"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Guardar</button>
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

                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php 
                          $conexion->set_charset('utf8');
          $busqueda="SELECT `id_Recepcion_Muestra`, `Fecha`, recepcion_muestra.Hora, toma_muestra.identificacion_Muestra, recepcion_muestra.Humedad, `Textura`, `ph_Muestra`, `densidad_Aderente`, `densidad_Real`, `porosidad`, `retencion_Humedad`, `distrubucion_tamanos`, `cationes_Intercambiables`, `elementos_Menores`, `materia_Organica`, `CIC`, `Otros`, `muestra_Entregada_Por`, `muestra_Recibida_Por`, recepcion_muestra.Observaciones FROM `recepcion_muestra` 
          INNER JOIN toma_muestra on recepcion_muestra.id_Toma_Muestra=toma_muestra.id_Toma_Muestra

ORDER BY `recepcion_muestra`.`id_Recepcion_Muestra` DESC";
     
          $query=mysqli_query($conexion,$busqueda);
          while ($fila=mysqli_fetch_row($query)){
             ?>

            <tr> 

<td ><?php echo $fila[1] ?></td>
<td ><?php echo $fila[2] ?></td>
<td ><?php echo $fila[3] ?></td>

                          


                          <td class='col-xs-2'>
                           <form style='float:left' action='mostrar/Mostrar-Recepcion_Muestra.php' method='post'>  
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

    


    <script language="javascript">
      function Registrar() {
    

      if (validar_Fecha() == true && 
          validar_Hora() == true && 
          validar_id_Toma_Muestra() == true && 

        

          // validar_Humedad() == true && 
          // validar_Textura() == true && 
          // validar_ph_Muestra() == true && 
          // validar_densidad_Aderente() == true && 
          validar_densidad_Real() == true && 
          // validar_porosidad() == true && 
          // validar_retencion_Humedad() == true && 
          // validar_distrubucion_tamanos() == true && 
          // validar_cationes_Intercambiables() == true && 
          // validar_elementos_Menores() == true && 
          // validar_materia_Organica() == true && 
          // validar_CIC() == true && 
          // validar_Otros() == true && 
          validar_muestra_Entregada_Por() == true && 
          validar_muestra_Recibida_Por() == true && 
          validar_Observaciones() == true) {
        
        var Fecha = document.getElementById("Fecha").value;
        var Hora = document.getElementById("Hora").value;
        var id_Toma_Muestra = document.getElementById("id_Toma_Muestra").value;
        var Humedad = document.getElementById("Humedad").value;
        var Textura = document.getElementById("Textura").value;
        var ph_Muestra = document.getElementById("ph_Muestra").value;
        var densidad_Aderente = document.getElementById("densidad_Aderente").value;
        var densidad_Real = document.getElementById("densidad_Real").value;
        var porosidad = document.getElementById("porosidad").value;
        var retencion_Humedad = document.getElementById("retencion_Humedad").value;
        var distrubucion_tamanos = document.getElementById("distrubucion_tamanos").value;
        var cationes_Intercambiables = document.getElementById("cationes_Intercambiables").value;
        var elementos_Menores = document.getElementById("elementos_Menores").value;
        var materia_Organica = document.getElementById("materia_Organica").value;
        var carbono_organico = document.getElementById("carbono_organico").value;
        var CIC = document.getElementById("CIC").value;
        var Otros = document.getElementById("Otros").value;
        var muestra_Entregada_Por = document.getElementById("muestra_Entregada_Por").value; 
        var muestra_Recibida_Por = document.getElementById("muestra_Recibida_Por").value;
        var Observaciones = document.getElementById("Observaciones").value;


        Fecha = Fecha.toUpperCase();
        Hora = Hora.toUpperCase();
        $("#resultado").load("conexion/Conex-Recepcion_Muestra.php", {
            Fecha : Fecha,
            Hora : Hora,
            id_Toma_Muestra : id_Toma_Muestra,
            Humedad : Humedad,
            Textura : Textura,
            ph_Muestra : ph_Muestra,
            densidad_Aderente : densidad_Aderente,
            densidad_Real : densidad_Real,
            porosidad : porosidad,
            retencion_Humedad : retencion_Humedad,
            distrubucion_tamanos : distrubucion_tamanos,
            cationes_Intercambiables : cationes_Intercambiables,
            elementos_Menores : elementos_Menores,
            materia_Organica : materia_Organica,
            carbono_organico : carbono_organico,
            CIC : CIC,
            Otros : Otros,
            muestra_Entregada_Por : muestra_Entregada_Por,
            muestra_Recibida_Por : muestra_Recibida_Por,
            Observaciones : Observaciones,
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
    
    $("#Fecha").keyup(validar_Fecha);
    $("#Hora").keyup(validar_Hora);
    $("#id_Toma_Muestra").keyup(validar_id_Toma_Muestra);



          $("#Humedad") .keyup(validar_Humedad); 
          $("#Textura") .keyup(validar_Textura); 
          $("#ph_Muestra") .keyup(validar_ph_Muestra); 
          $("#densidad_Aderente") .keyup(validar_densidad_Aderente); 
          $("#densidad_Real") .keyup(validar_densidad_Real); 
          $("#porosidad") .keyup(validar_porosidad); 
          $("#retencion_Humedad") .keyup(validar_retencion_Humedad); 
          $("#distrubucion_tamanos") .keyup(validar_distrubucion_tamanos); 
          $("#cationes_Intercambiables") .keyup(validar_cationes_Intercambiables); 
          $("#elementos_Menores") .keyup(validar_elementos_Menores); 
          $("#materia_Organica") .keyup(validar_materia_Organica); 
          $("#carbono_organico") .keyup(validar_carbono_organico);
          $("#CIC") .keyup(validar_CIC); 
          $("#Otros") .keyup(validar_Otros); 
          $("#muestra_Entregada_Por") .keyup(validar_muestra_Entregada_Por); 
          $("#muestra_Recibida_Por") .keyup(validar_muestra_Recibida_Por); 
          $("#Observaciones") .keyup(validar_Observaciones);


}

function validar_Fecha() {
    var Fecha = document.getElementById("Fecha").value;
    var Fecha = new Date(Fecha);
    // alert(Fecha)
    if (Fecha.length == 0) {
        var Fecha = document.getElementById("Fecha").style.border = "2px solid red";
        return false;
    } else if (Fecha == "Invalid Date") {
        var Fecha = document.getElementById("Fecha").style.border = "2px solid red";
    } else {
        var Fecha = document.getElementById("Fecha").style.border = "2px solid #4caf50";
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




function validar_id_Toma_Muestra() {
    var id_Toma_Muestra = document.getElementById("id_Toma_Muestra").value;
    if (id_Toma_Muestra == "Selecciona") {
        var id_Toma_Muestra = document.getElementById("id_Toma_Muestra").style.border = "2px solid red";
        return false;
    } else {
        var id_Toma_Muestra = document.getElementById("id_Toma_Muestra").style.border = "2px solid #4caf50";
        return true;
    }
} 


function validar_Humedad() {
    var Humedad = document.getElementById("Humedad").value;
    if (Humedad.length == 0) {
        var Humedad = document.getElementById("Humedad").style.border = "2px solid red";
        return false;
    } else {
        var Humedad = document.getElementById("Humedad").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Textura() {
    var Textura = document.getElementById("Textura").value;
    if (Textura.length == 0) {
        var Textura = document.getElementById("Textura").style.border = "2px solid red";
        return false;
    } else {
        var Textura = document.getElementById("Textura").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_ph_Muestra() {
    var ph_Muestra = document.getElementById("ph_Muestra").value;
    if (ph_Muestra.length == 0) {
        var ph_Muestra = document.getElementById("ph_Muestra").style.border = "2px solid red";
        return false;
    } else {
        var ph_Muestra = document.getElementById("ph_Muestra").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_densidad_Aderente() {
    var densidad_Aderente = document.getElementById("densidad_Aderente").value;
    if (densidad_Aderente.length == 0) {
        var densidad_Aderente = document.getElementById("densidad_Aderente").style.border = "2px solid red";
        return false;
    } else {
        var densidad_Aderente = document.getElementById("densidad_Aderente").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_densidad_Real() {
    var densidad_Real = document.getElementById("densidad_Real").value;
    if (densidad_Real.length == 0) {
        var densidad_Real = document.getElementById("densidad_Real").style.border = "2px solid red";
        return false;
    } else {
        var densidad_Real = document.getElementById("densidad_Real").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_porosidad() {
    var porosidad = document.getElementById("porosidad").value;
    if (porosidad.length == 0) {
        var porosidad = document.getElementById("porosidad").style.border = "2px solid red";
        return false;
    } else {
        var porosidad = document.getElementById("porosidad").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_retencion_Humedad() {
    var retencion_Humedad = document.getElementById("retencion_Humedad").value;
    if (retencion_Humedad.length == 0) {
        var retencion_Humedad = document.getElementById("retencion_Humedad").style.border = "2px solid red";
        return false;
    } else {
        var retencion_Humedad = document.getElementById("retencion_Humedad").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_distrubucion_tamanos() {
    var distrubucion_tamanos = document.getElementById("distrubucion_tamanos").value;
    if (distrubucion_tamanos.length == 0) {
        var distrubucion_tamanos = document.getElementById("distrubucion_tamanos").style.border = "2px solid red";
        return false;
    } else {
        var distrubucion_tamanos = document.getElementById("distrubucion_tamanos").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_cationes_Intercambiables() {
    var cationes_Intercambiables = document.getElementById("cationes_Intercambiables").value;
    if (cationes_Intercambiables == "Selecciona") {
        var cationes_Intercambiables = document.getElementById("cationes_Intercambiables").style.border = "2px solid red";
        return false;
    } else {
        var cationes_Intercambiables = document.getElementById("cationes_Intercambiables").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_elementos_Menores() {
    var elementos_Menores = document.getElementById("elementos_Menores").value;
    if (elementos_Menores == "Selecciona") {
        var elementos_Menores = document.getElementById("elementos_Menores").style.border = "2px solid red";
        return false;
    } else {
        var elementos_Menores = document.getElementById("elementos_Menores").style.border = "2px solid #4caf50";
        return true;
    }
}


function validar_materia_Organica() {
    var materia_Organica = document.getElementById("materia_Organica").value;
    if (materia_Organica.length == 0) {
        var materia_Organica = document.getElementById("materia_Organica").style.border = "2px solid red";
        return false;
    } else {
        var materia_Organica = document.getElementById("materia_Organica").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_carbono_organico() {
    var carbono_organico = document.getElementById("carbono_organico").value;
    if (carbono_organico.length == 0) {
        var carbono_organico = document.getElementById("carbono_organico").style.border = "2px solid red";
        return false;
    } else {
        var carbono_organico = document.getElementById("carbono_organico").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_CIC() {
    var CIC = document.getElementById("CIC").value;
    if (CIC.length == 0) {
        var CIC = document.getElementById("CIC").style.border = "2px solid red";
        return false;
    } else {
        var CIC = document.getElementById("CIC").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Otros() {
    var Otros = document.getElementById("Otros").value;
    if (Otros.length == 0) {
        var Otros = document.getElementById("Otros").style.border = "2px solid red";
        return false;
    } else {
        var Otros = document.getElementById("Otros").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_muestra_Entregada_Por() {
    var muestra_Entregada_Por = document.getElementById("muestra_Entregada_Por").value;
    if (muestra_Entregada_Por.length == 0) {
        var muestra_Entregada_Por = document.getElementById("muestra_Entregada_Por").style.border = "2px solid red";
        return false;
    } else {
        var muestra_Entregada_Por = document.getElementById("muestra_Entregada_Por").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_muestra_Recibida_Por() {
    var muestra_Recibida_Por = document.getElementById("muestra_Recibida_Por").value;
    if (muestra_Recibida_Por.length == 0) {
        var muestra_Recibida_Por = document.getElementById("muestra_Recibida_Por").style.border = "2px solid red";
        return false;
    } else {
        var muestra_Recibida_Por = document.getElementById("muestra_Recibida_Por").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Observaciones() {
    var Observaciones = document.getElementById("Observaciones").value;
    if (Observaciones.length == 0) {
        var Observaciones = document.getElementById("Observaciones").style.border = "2px solid red";
        return false;
    } else {
        var Observaciones = document.getElementById("Observaciones").style.border = "2px solid #4caf50";
        return true;
    }
}


     

function validateDensidadreal(){
  var densidad_Real = document.getElementById("densidad_Real");

  if (densidad_Real.checked == true) {
        var densidad_Real = document.getElementById("densidad_Real").style.border = "2px solid red";
        
        
        return document.getElementById("densidad_Real").value = "Si";
    }else {
        var densidad_Real = document.getElementById("densidad_Real").style.border = "2px solid #4caf50";
       return document.getElementById("densidad_Real").value = "No";
    }
}

function validateHumedad(){
  var Humedad = document.getElementById("Humedad");

  if (Humedad.checked == true) {
        var Humedad = document.getElementById("Humedad").style.border = "2px solid red";
        
        
        return document.getElementById("Humedad").value = "Si";
    }else {
        var Humedad = document.getElementById("Humedad").style.border = "2px solid #4caf50";
       return document.getElementById("Humedad").value = "No";
    }
}

function validateTextura(){
  var Textura = document.getElementById("Textura");

  if (Textura.checked == true) {
        var Textura = document.getElementById("Textura").style.border = "2px solid red";
        
        
        return document.getElementById("Textura").value = "Si";
    }else {
        var Textura = document.getElementById("Textura").style.border = "2px solid #4caf50";
       return document.getElementById("Textura").value = "No";
       return document.getElementById("TexturaValor").value;

    }
}

function validatePh(){
  var ph_Muestra = document.getElementById("ph_Muestra");

  if (ph_Muestra.checked == true) {
        var ph_Muestra = document.getElementById("ph_Muestra").style.border = "2px solid red";
        
        
        return document.getElementById("ph_Muestra").value = "Si";
    }else {
        var ph_Muestra = document.getElementById("ph_Muestra").style.border = "2px solid #4caf50";
       return document.getElementById("ph_Muestra").value = "No";
    }
}

function validateAparente(){
  var densidad_Aderente = document.getElementById("densidad_Aderente");

  if (densidad_Aderente.checked == true) {
        var densidad_Aderente = document.getElementById("densidad_Aderente").style.border = "2px solid red";
        
        
        return document.getElementById("densidad_Aderente").value = "Si";
    }else {
        var densidad_Aderente = document.getElementById("densidad_Aderente").style.border = "2px solid #4caf50";
       return document.getElementById("densidad_Aderente").value = "No";
    }
}

function validatePorosidad(){
  var porosidad = document.getElementById("porosidad");

  if (porosidad.checked == true) {
        var porosidad = document.getElementById("porosidad").style.border = "2px solid red";
        
        
        return document.getElementById("porosidad").value = "Si";
    }else {
        var porosidad = document.getElementById("porosidad").style.border = "2px solid #4caf50";
       return document.getElementById("porosidad").value = "No";
    }
}

function validateRetencion(){
  var retencion_Humedad = document.getElementById("retencion_Humedad");

  if (retencion_Humedad.checked == true) {
        var retencion_Humedad = document.getElementById("retencion_Humedad").style.border = "2px solid red";
        
        
        return document.getElementById("retencion_Humedad").value = "Si";
    }else {
        var retencion_Humedad = document.getElementById("retencion_Humedad").style.border = "2px solid #4caf50";
       return document.getElementById("retencion_Humedad").value = "No";
    }
}

function validateDistribucionT(){
  var distrubucion_tamanos = document.getElementById("distrubucion_tamanos");

  if (distrubucion_tamanos.checked == true) {
        var distrubucion_tamanos = document.getElementById("distrubucion_tamanos").style.border = "2px solid red";
        
        
        return document.getElementById("distrubucion_tamanos").value = "Si";
    }else {
        var distrubucion_tamanos = document.getElementById("distrubucion_tamanos").style.border = "2px solid #4caf50";
       return document.getElementById("distrubucion_tamanos").value = "No";
    }
}

function validateMateriaO(){
  var materia_Organica = document.getElementById("materia_Organica");

  if (materia_Organica.checked == true) {
        var materia_Organica = document.getElementById("materia_Organica").style.border = "2px solid red";
        
        
        return document.getElementById("materia_Organica").value = "Si";
    }else {
        var materia_Organica = document.getElementById("materia_Organica").style.border = "2px solid #4caf50";
       return document.getElementById("materia_Organica").value = "No";
    }
}

function validateCarbonoO(){
  var carbono_organico = document.getElementById("carbono_organico");

  if (carbono_organico.checked == true) {
        var carbono_organico = document.getElementById("carbono_organico").style.border = "2px solid red";
        
        
        return document.getElementById("carbono_organico").value = "Si";
    }else {
        var carbono_organico = document.getElementById("carbono_organico").style.border = "2px solid #4caf50";
       return document.getElementById("carbono_organico").value = "No";
    }
}

function validateCic(){
  var CIC = document.getElementById("CIC");

  if (CIC.checked == true) {
        var CIC = document.getElementById("CIC").style.border = "2px solid red";
        
        
        return document.getElementById("CIC").value = "Si";
    }else {
        var CIC = document.getElementById("CIC").style.border = "2px solid #4caf50";
       return document.getElementById("CIC").value = "No";
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
