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
    <title>Analisis De Muestra</title>

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
                <li><a href="../Reg-Instructor/Reg-Instructor.php"><i class="fa fa-circle-o"></i>Instructores</a></li>
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
            <h1><i class="fa fa-map"></i> Ingresar Analisis De Muestra</h1>
            <p>Sistema de Informacion para el Manejo de los Datos de Analisis de Muestras del Laboratorio de Suelos</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="bs-component">
         <!--      <ul class="nav nav-tabs">
                  <li class="active"><a href="#Datos_Basicos" data-toggle="tab">Datos Basicos</a></li>
                  <li><a href="#Analisis_a_Realizar" data-toggle="tab">Fisicos</a></li>
                  <li class=""><a href="#datoscampo" data-toggle="tab" aria-expanded="false">Quimicos</a></li>
                  <li class=""><a href="#organico" data-toggle="tab" aria-expanded="false">Organicos</a></li>
                </ul>

 -->
            <ul class="nav nav-tabs">
  <li class="active"><a href="#Datos_Basicos" data-toggle="tab">Datos Basicos</a></li>
  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Fisicos
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li id="densidadR"><a href="#densidadr" data-toggle="tab">Densidad Real</a></li>
      <li id="densidadA" ><a href="#densidadApa" data-toggle="tab" aria-expanded="false">Densidad Aparente</a></li>
      <li id="porosi" ><a href="#porosidad" data-toggle="tab" aria-expanded="false">Porosidad</a></li>
      <li id="textu" ><a href="#datoscampo" data-toggle="tab" aria-expanded="false">Textura</a></li> 
    </ul>
  </li>
  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Quimicos
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li id="Corganico"><a href="#organico" data-toggle="tab" aria-expanded="false">Carbono Organico</a></li>
      <li id="Morganica"><a href="#organica" data-toggle="tab" aria-expanded="false">Materia Organica</a></li>
      <li id="pH"><a href="#ph" data-toggle="tab" aria-expanded="false">PH</a></li>
     
    </ul>
  </li>

  <li ><a href="#quieres_guardar" data-toggle="tab">¿Quieres guardar?</a></li>
  
</ul>



                <div class="tab-content" id="myTabContent">



              

                  <div class="tab-pane fade active in" id="Datos_Basicos">
                    <div class="row">

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="Fecha">Fecha Del Analisis</label>
                          <input class="form-control" type="date" id="Fecha" placeholder="aaaa/mm/dd"> 
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label class="control-label" for="id_Recepcion_Muestra">Codigo Muestra</label> 
                            <select class="form-control" id="id_Recepcion_Muestra" onchange="checked()">
                            <option value="Selecciona">Selecciona Codigo Muestra</option>


                            <?php  
                      
                      $query="SELECT `id_Recepcion_Muestra`, `Fecha`, recepcion_muestra.Hora, toma_muestra.identificacion_Muestra, recepcion_muestra.Humedad, `Textura`, `ph_Muestra`, `densidad_Aderente`, `densidad_Real`, `porosidad`, `retencion_Humedad`, `distrubucion_tamanos`, `cationes_Intercambiables`, `elementos_Menores`, `materia_Organica`, `carbono_organico`, `CIC`, `Otros`, `muestra_Entregada_Por`, `muestra_Recibida_Por`, recepcion_muestra.Observaciones FROM `recepcion_muestra` INNER join toma_muestra on recepcion_muestra.id_Toma_Muestra=toma_muestra.id_Toma_Muestra ORDER BY `recepcion_muestra`.`id_Recepcion_Muestra` DESC";
                      $resource=mysqli_query($conexion,$query);
                      while ($fila=mysqli_fetch_row($resource)) {
                      echo " <option value='$fila[0]'> $fila[3] </option> ";
                      }
                      ?>
                          </select>
                                                              

                        </div>
                      </div>

                    </div>

                    
                  </div>    

              
                    <div class="tab-pane fade " id="porosidad">
                    
                    <div class="col-md-12 text-center">
                      <h3 class="help-block">Porosidad</h3>
                    </div>

                     <div class="row"> 

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="densi_real">Densidad Real (g/ml)</label>
                          <input type="text" name="" id="densi_real" class="form-control" onkeyup="calcu_porosidad()">                                                             
                        </div>
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="densi_apa">Densidad Apa (g/ml)</label>
                          <input type="text" name="" id="densi_apa" class="form-control" onkeyup="calcu_porosidad()">                          
                        </div>
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="resul_porosidad">Porosidad %</label>
                          <input type="button" name="" id="resul_porosidad" class="form-control">                          
                        </div>
                      </div>
                      
                <div class="col-md-8">
                  <!-- <button class="btn btn-primary icon-btn" type="button" onclick="calcu_porosidad()" style="margin-top: -90px;margin-left: 600px; "> </i>Calcular</button> -->
                </div>  
              


                    </div>



                  </div>



                  <div class="tab-pane fade " id="densidadr">
                    
                    <div class="col-md-12 text-center">
                      <h3 class="help-block">Densidad Real</h3>
                    </div>

                    <div class="row"> 

                     

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="wa" title="Masa Picnómetro Vacío">MPV (g) </label>
                          <input type="text" name="" id="wa" class="form-control" onkeyup="Calcular()">                           
                        </div>
                      </div>

                       <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="ws" title="Masa Picnómetro Más Suelo">MPS (g)</label>
                          <input type="text" name="" id="ws" class="form-control" onkeyup="Calcular()">                                                              
                        </div>
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="wsw" title="Masa Picnómetro Más Suelo y Agua">MPSA (g)</label>
                          <input type="text" name="" id="wsw" class="form-control" onkeyup="Calcular()">                           
                        </div>
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="ww" title="Masa Picnómetro Mas Agua">MPA (g)</label>
                          <input type="text" name="" id="ww" class="form-control" onkeyup="Calcular()">                           
                        </div>
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label " for="t_Grados" >Temperatura (ºC)</label>
                          <input type="text" name="" id="t_Grados" class="form-control">                          
                        </div>
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="densidad_agua" title="
10 → 0,99970,
12 → 0,99950,
14 → 0,99924,
16 → 0,99894,
18 → 0,99860,
20 → 0,99820,
22 → 0,99770,
24 → 0,99730,
26 → 0,99678,
28 → 0,99623,
30 → 0,99565,
32 → 0,99503,
34 → 0,99437,
36 → 0,99369">ρ H2O (g/ml)</label>
                          <select class="form-control" id="densidad_agua" onclick="Calcular()"> 
                            <option value="Selecciona">Selecciona ρ H2O</option>
                            <option value="0.99970">0,99970</option>
                            <option value="0.99950">0,99950 </option>
                            <option value="0.99924">0,99924 </option>
                            <option value="0.99894">0,99894 </option>
                            <option value="0.99860">0,99860 </option>
                            <option value="0.99820">0,99820 </option>
                            <option value="0.99770">0,99770 </option>
                            <option value="0.99730">0,99730 </option>
                            <option value="0.99678">0,99678 </option>
                            <option value="0.99623">0,99623 </option>
                            <option value="0.99565">0,99565 </option>
                            <option value="0.99503">0,99503 </option>
                            <option value="0.99437">0,99437 </option>
                            <option value="0.99369">0,99369 </option>

                       </select>  

                     
                                                      
                        </div>
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="Resul_mg_l">Densidad Real (g/ml)</label>
                          <input type="button" name="" id="Resul_mg_l" class="form-control ">                          
                        </div>
                      </div>
               <div class="row">
                <div class="col-md-8">
                  <!-- <button class="btn btn-primary icon-btn" type="button" onclick="Calcular()" style="margin-top: 30px;"> </i>Calcular</button> -->

                </div>
                
              </div>
              </div>
            </div>
        
                    
                 <div class="tab-pane fade" id="densidadApa">
                      <div class="row">
                      
                      <div class="col-md-12 text-center">
                        <h3 class="help-block">Densidad Aparente</h3>
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="Pss" title="Masa Terrón Suelo Sin Parafina">MTSP (g)</label>
                          <input type="text" name="" id="Pss" class="form-control" onkeyup="Aparente()">                          
                        </div>
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="Pssp "title="Masa Terrón Suelo Parafinado">MTP (g)</label>
                          <input type="text" name="" id="Pssp" class="form-control" onkeyup="Aparente()">                          
                        </div>
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="Vd" title="Volumen Agua Desplazado">Vd (ml)</label> 
                          <input type="text" name="" id="Vd" class="form-control" onkeyup="Aparente()">                          
                        </div>
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="Resul_a">Total (g/ml)</label>
                          <input type="button" name="" id="Resul_a" class="form-control" >                          
                        </div>
                      </div>
                      
                      <div class="col-md-2">
                       <!-- <button class="btn btn-primary icon-btn" type="button" onclick="Aparente()" style="margin-top: 30px;"> </i>Calcular</button> -->
                    </div>
                   </div> 
                   </div> 

            
                   <div class="tab-pane fade" id="organico">
                     <div class="col-md-12 text-center">
                      <h3 class="help-block">Carbono Organico %</h3>
                    </div>


                    <div class="row">
                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="VolumenB" title="Volumen Titulante Blanco">VTB (ml) </label>
                          <input type="text" name="" id="VolumenB" class="form-control" onkeyup="OrganicoC()">                          
                        </div>
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="VolumenM" title="Volumen Titulante Muestra">VTM (ml) </label>
                          <input type="text" name="" id="VolumenM" class="form-control" onkeyup="OrganicoC()">                                                 
                        </div>
                      </div>

                        <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="PesoM">Peso Muestra (g)</label>
                          <input type="text" name="" id="PesoM" class="form-control" onkeyup="OrganicoC()">                                                 
                        </div>
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="NormalidadT" title="Sulfato Ferroso">Normalidad Titulante (N)</label>
                          <input type="text" name="" id="NormalidadT" class="form-control" onkeyup="OrganicoC()">
                        </div>
                      </div>

                       <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="Resul_6">Carbono Orgànico (%) </label>
                          <input type="button" name="" id="Resul_6" class="form-control" >
                        </div>
                      </div>

                      <div class="col-md-2">
                       <!-- <button class="btn btn-primary icon-btn" type="button" onclick="OrganicoC()" style="margin-top: 30px;"> </i>Calcular</button> -->
                    </div>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="organica">
                        <div class="col-md-12 text-center">
                         <h3 class="help-block">Materia Organica %</h3>
                         </div> 
                         
                          <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="CarbonO">Carbono Organico (%)</label>
                          <input type="text" name="" id="CarbonO" class="form-control" onkeyup="MateriaO()">                          
                        </div>
                      </div>

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="Resul_c">Materia Organica (%) </label>
                          <input type="button" name="" id="Resul_c" class="form-control">                          
                        </div>
                      </div>
                      <div class="col-md-2">
                       <!-- <button class="btn btn-primary icon-btn" type="button" onclick="MateriaO()" style="margin-top: 30px;"> </i>Calcular</button> -->
                    </div>
                    </div>
                    <div class="tab-pane fade" id="ph">
                    <div class="col-md-1"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="pH_Calcular">PH</label>
                          <input type="text" name="" id="pH_Calcular" class="form-control">                                                 
                        </div>
                      </div> 

                      <div class="col-md-2"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="temperaturaPh">Temperatura (ºC) </label>
                          <input type="text" name="" id="temperaturaPh" class="form-control">                                                 
                        </div>
                      </div> 
                  

                     <div class="col-md-8 col-md-offset-5">
                    
                  </div>
                  </div>

                  <div class="tab-pane fade " id="quieres_guardar">
                    <div class="row">

                      <div class="col-md-12"> 
                        <button class="btn btn-primary icon-btn boton-g" style="margin-top: 5em;
    text-align: center;
    display:block;
    margin-left: auto;
    margin-right: auto;" type="button" onclick="Registrar ()"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Guardar</button>
                      </div>
                    
                      <div id="resultado"></div>

                    </div>

                    
                  </div> 

                  


                  <div class="tab-pane fade" id="datoscampo">

                    <div class="col-md-12 text-center">
                      <h3 class="help-block">Arena</h3>
                    </div>

                    <div class="row">

                       <div class="col-md-3"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="densidad_1">Densidad 1 (g/l)</label>
                          <input type="text" name="" id="densidad_1" class="form-control "  onkeyup="Arena()">                          
                        </div>
                      </div>

                      <div class="col-md-3"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="temperatura_1"title="
14 → -1,96,
16 → -0,28,
18 → -0,44,
19,4 → 0,
20 → 0,18,
22 → 0,89,
24 → 1,61,
26 → 2,41,
28 → 4,2,
29 → 4,2,
30 → 4,2,
31 → 4,2,
32 → 4,2,
33 → 4,2,
34 → 4,2 ">Temperatura 1 (ºC)</label>
                          <input type="text" name="" id="temperatura_1" class="form-control" onkeyup="Arena()">                          
                        </div>
                      </div>

                      <div class="col-md-4"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="factor_Correcion_T1">Factor Correcion </label>
                          <select class="form-control" id="factor_Correcion_T1" onclick="Arena()">
                            <option value="Selecciona">Selecciona Factor de Correccion</option>
                            <option value="-1.96">-1,96</option>
                            <option value="-0.28">-0,28 </option>
                            <option value="-0.44">-0,44 </option>
                            <option value="0">0 </option>
                            <option value="0.18">0,18 </option>
                            <option value="0.89">0,89 </option>
                            <option value="1.61">1,61 </option>
                            <option value="2.41">2,41 </option>
                            <option value="4.2">4,2 </option>
                            <option value="4.2">4,2 </option>
                            <option value="4.2">4,2 </option>
                            <option value="4.2">4,2 </option>

                       </select>                          
                        </div>
                      </div>
                      



                      
                      

                      <div class="col-md-3"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="peso_Muestra_1">Peso Muestra (g)</label>
                          <input type="text" name="" id="peso_Muestra_1" class="form-control" onkeyup="Arena()">                          
                        </div>
                      </div>

                      <div class="col-md-3"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="Resul_3">Arena (%)</label>
                          <input type="button" name="" id="Resul_3" class="form-control">                          
                        </div>
                      </div>

                       <div class="col-md-3">
                       <!-- <button class="btn btn-primary icon-btn" type="button" onclick="Arena()" style="margin-top: 30px;"> </i>Calcular</button> -->
        
                    </div>
                    </div>

                    <div class="col-md-12 text-center">
                      <h3 class="help-block">Arcilla</h3>
                    </div>


                 <div class="row">
                      <div class="col-md-3"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="densidad_2">Densidad 2 (g/l)</label>
                          <input type="text" name="" id="densidad_2" class="form-control" onkeyup="Arcilla()">                          
                        </div>
                      </div>

                      <div class="col-md-3"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="temperatura_2" title="
14 → -1,96,
16 → -0,28,
18 → -0,44,
19,4 → 0,
20 → 0,18,
22 → 0,89,
24 → 1,61,
26 → 2,41,
28 → 4,2,
29 → 4,2,
30 → 4,2,
31 → 4,2,
32 → 4,2,
33 → 4,2,
34 → 4,2 ">Temperatura 2 (ºC)</label>
                          <input type="text" name="" id="temperatura_2" class="form-control" onkeyup="Arcilla()">                          
                        </div>
                      </div>

                       <div class="col-md-4"> 
                        <div class="form-group text-center">
                           <label class="control-label" for="factor_Correcion_T2">Factor de Correccion</label>
                            <select class="form-control" id="factor_Correcion_T2" onclick="Arcilla()">
                            <option value="Selecciona">Selecciona Factor de Correccion</option>
                            <option value="-1.96">-1,96</option>
                            <option value="-0.28">-0,28 </option>
                            <option value="-0.44">-0,44 </option>
                            <option value="0">0 </option>
                            <option value="0.18">0,18 </option>
                            <option value="0.89">0,89 </option>
                            <option value="1.61">1,61 </option>
                            <option value="2.41">2,41 </option>
                            <option value="4.2">4,2 </option>
                            <option value="4.2">4,2 </option>
                            <option value="4.2">4,2 </option>
                            <option value="4.2">4,2 </option>

                       </select>

                        </div>
                      </div>


                       

                      <div class="col-md-3"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="peso_Muestra_2">Peso Muestra (g)</label>
                          <input type="text" name="" id="peso_Muestra_2" class="form-control" onkeyup="Arcilla()">                          
                        </div>
                      </div>

                      <div class="col-md-3"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="Resul_4">Arcilla (%)</label>
                          <input type="button" name="" id="Resul_4" class="form-control">                                                 
                        </div>
                      </div>
                      <div class="col-md-3">
                       <!-- <button class="btn btn-primary icon-btn" type="button" onclick="Arcilla()" style="margin-top: 30px;"> </i>Calcular</button>
                        </div> -->
                      </div>
                    </div>
                  
                    <div class="col-md-12 text-center">
                      <h3 class="help-block">Limo</h3>
                    </div>

                      <div class="row">
                      

                      <div class="col-md-3"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="arena">Arena (%) </label>
                          <input type="text" name="" id="arena" class="form-control" onkeyup="Limo()">                          
                        </div>
                      </div>

                      <div class="col-md-3"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="arcilla">Arcilla (%) </label>
                          <input type="text" name="" id="arcilla" class="form-control" onkeyup="Limo()">                          
                        </div>
                      </div>

                      <div class="col-md-3"> 
                        <div class="form-group text-center">
                          <label class="control-label" for="Resul_5">Limo (%)</label>
                          <input type="button" name="" id="Resul_5" class="form-control">                          
                        </div>
                      </div>


                      <div class="col-md-12 text-center">
                      <h3 class="help-block">Textura</h3>
                    </div>


                     <img src="../../../../assets/imagenes/triangulo.PNG">

                        
                        <div class="col-md-3 text-center"> 
                        <div class="form-group">
                          <label class="control-label " for="Textura">Textura</label>
                          <input type="text" name="" id="Textura" class="form-control ">                          
                        </div>
                      </div>


                    



                </div>

            </div>
            
         
          </div>

        
          <br>
            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <!-- <div class="card-body" id=""> -->
                    <div class="card-body" id="Contenedor_Recargar">
                      <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                          <tr>
                            <th>Fecha</th>
                            <!-- <th>Hora</th> -->
                            <th>Codigo Muestra</th>

                            <th>Visualizar</th>
                            <th>Eliminar</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php 
                          $conexion->set_charset('utf8');
          $busqueda="SELECT 
          `id_Analisis_Muestra`,
 analisis_muestra.Fecha, 
    toma_muestra.identificacion_Muestra, 
 `ws`,
 `wa`,
 `wsw`,
 `ww`,
 `dw`,
 `t_Grados`,
 `Resul_mg_l`,
 `Pss`,
 `Pssp`,
 `Vd`,
 `Resul_a`,
 `factor_Correcion_T1`,
 `temperatura_1`,
 `densidad_1`,
 `peso_Muestra_1`,
 `Resul_3`,
 `factor_Correcion_T2`,
 `temperatura_2`,
 `densidad_2`,
 `peso_Muestra_2`,
 `Resul_4`,
 `arena`,
 `arcilla`,
 `Resul_5`,
 analisis_muestra.Textura, 
 `CarbonO`,
 `Resul_c`,
 `pH_Calcular`,
 `temperaturaPh`,
 `VolumenM`,
 `VolumenB`,
 `PesoM`,
 `NormalidadT`,
 `Resul_6`,
 `densi_real`,
 `densi_apa`,
 `resul_porosidad` FROM `analisis_muestra`
           INNER JOIN recepcion_muestra on analisis_muestra.id_Recepcion_Muestra=recepcion_muestra.id_Recepcion_Muestra 
           INNER join toma_muestra on recepcion_muestra.id_Toma_Muestra=toma_muestra.id_Toma_Muestra

 ORDER BY `id_Analisis_Muestra` DESC";
     
          $query=mysqli_query($conexion,$busqueda);
          while ($fila=mysqli_fetch_row($query)){
             ?>

            <tr> 

<td ><?php echo $fila[1] ?></td>
<!-- <td ><?php echo $fila[2] ?></td> -->
<td ><?php echo $fila[2] ?></td>

                          


                          <td class='col-xs-2'>
                           <form style='float:left' action='mostrar/Mostrar-Analisis_Muestra.php' method='post'>  
                              <input type='hidden' name='id' value=' <?php echo $fila[0] ?>'>
                              <button class="btn btn-primary icon-btn" type='submit' value='ver mas'><i class='fa fa-eye'></i>Ver Mas</button>
                           </form>
                           
                          </td>

                           <td ><?php echo "<div><a class='btn btn-danger' href='eliminar-analisis.php?id_Analisis_Muestra=".$fila['0']."'><i class='fa fa-lg fa-trash'></i></a></div>"?></td>
                          

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
       function calcu_porosidad() {
        var densi_real = document.getElementById("densi_real").value;
        var densi_apa = document.getElementById("densi_apa").value;
        var resul_porosidad = ((densi_real-densi_apa)/densi_real)*100;
        var resul_porosidad = resul_porosidad.toFixed(2);

        document.getElementById("resul_porosidad").value=resul_porosidad;
        
        

      }

       function Aparente() {
        var Pss = document.getElementById("Pss").value;
        var Pssp = document.getElementById("Pssp").value;
        var Vd = document.getElementById("Vd").value;
        var Resul_a = (Pss/(Vd-(Pssp-Pss)/0.9));
        var Resul_a = Resul_a.toFixed(2);

        document.getElementById("Resul_a").value=Resul_a;
        
        

      }

      function OrganicoC() {
        var VolumenM = document.getElementById("VolumenM").value;
        var VolumenB = document.getElementById("VolumenB").value;
        var PesoM = document.getElementById("PesoM").value;
        var NormalidadT = document.getElementById("NormalidadT").value;
        var Resul_6 = ((VolumenB-VolumenM)*(NormalidadT*0.003)*(1.3*100)/PesoM)
        var Resul_6 = Resul_6.toFixed(2);
         
        
        document.getElementById("Resul_6").value=Resul_6;
          

      }

      function MateriaO() {
        var CarbonO = document.getElementById("CarbonO").value;
        var pH_Calcular = document.getElementById("pH_Calcular").value;
        var Resul_c = (CarbonO*1.724)
        var Resul_c = Resul_c.toFixed(2);

        document.getElementById("Resul_c").value=Resul_c;
        


      }

      function Calcular() {
        var ws = document.getElementById("ws").value;
        var wa = document.getElementById("wa").value;
        var wsw = document.getElementById("wsw").value;
        var ww = document.getElementById("ww").value;
        var dw = document.getElementById("densidad_agua").value;
        var Resul_mg_l = (dw*(ws-wa))/((ws-wa)-(wsw-ww));
        var Resul_mg_l = Resul_mg_l.toFixed(2);
         
        
        document.getElementById("Resul_mg_l").value=Resul_mg_l;



      }


      function Arena() {
        var factor_Correcion_T1 = document.getElementById("factor_Correcion_T1").value;
        var peso_Muestra_1 = document.getElementById("peso_Muestra_1").value; 
        var densidad_1 = document.getElementById("densidad_1").value;
        var Resul_3 = 100-(densidad_1/peso_Muestra_1+factor_Correcion_T1/peso_Muestra_1)*100
        var Resul_3 = Resul_3.toFixed(2);
       
        
        document.getElementById("Resul_3").value=Resul_3;

         


      }

      function Arcilla() {
        var factor_Correcion_T2 = document.getElementById("factor_Correcion_T2").value;
        var peso_Muestra_2 = document.getElementById("peso_Muestra_2").value;
        var densidad_2 = document.getElementById("densidad_2").value;
        var Resul_4 = ((densidad_2/peso_Muestra_2+factor_Correcion_T2/peso_Muestra_2))*100
        var Resul_4 = Resul_4.toFixed(2);
        
        document.getElementById("Resul_4").value=Resul_4;

 


      }

      function Limo() {

        var arena = document.getElementById("arena").value;
        var arcilla = document.getElementById("arcilla").value;
        var Resul_5 = (100-arena-arcilla)
        var Resul_5 = Resul_5.toFixed(2);
       {document.getElementById("Resul_5").value=Resul_5;}


         

      }

      


      function Registrar() {
    

      if (validar_Fecha() == true && 
          validar_id_Recepcion_Muestra() == true
          // validar_ws() == true && 
          // validar_wa() == true && 
          // validar_wsw() == true && 
          // validar_ww() == true && 
          // validar_t_Grados() == true && 
          // validar_Resul_mg_l() == true && 
          // validar_Pss() == true && 
          // validar_Pssp() == true && 
          // validar_Vd() == true && 
         
          // validar_Resul_a() == true && 
          // validar_factor_Correcion_T1() == true && 
          // validar_peso_Muestra_1() == true && 
          // validar_Resul_3() == true && 
          // validar_factor_Correcion_T2() == true &&

          // validar_peso_Muestra_2() == true &&
          // validar_Resul_4() == true &&
          // validar_Resul_5() == true &&
          // validar_Textura() == true &&
          // validar_CarbonO() == true &&
          // validar_Constante() == true &&
          // validar_pH_Calcular() == true &&
          // validar_conductividad_uS_cm() == true


          // validar_pH_Calcular() == true 
          ) {
        var pH_Calcular = document.getElementById("pH_Calcular").value;
      if(
(parseInt(document.getElementById("pH_Calcular").value,10)>14))
 {
      swal({
            title: 'Error!',
            text: "El pH debe de ser menor de 14",
            type: 'error',
            
            confirmButtonColor: '#238276'
        })

      }else{
        var Fecha = document.getElementById("Fecha").value;
        var id_Recepcion_Muestra = document.getElementById("id_Recepcion_Muestra").value;

        var ws = document.getElementById("ws").value;
        var temperaturaPh = document.getElementById("temperaturaPh").value;
        
        var wa = document.getElementById("wa").value;
        var wsw = document.getElementById("wsw").value;
        var ww = document.getElementById("ww").value;
        var dw = document.getElementById("densidad_agua").value;
        var t_Grados = document.getElementById("t_Grados").value;
        var Resul_mg_l = document.getElementById("Resul_mg_l").value;

        var Pss = document.getElementById("Pss").value;
        var Pssp = document.getElementById("Pssp").value;
        var Vd = document.getElementById("Vd").value;
        var Resul_a = document.getElementById("Resul_a").value;

        var factor_Correcion_T1 = document.getElementById("factor_Correcion_T1").value;
        var peso_Muestra_1 = document.getElementById("peso_Muestra_1").value; 
        var temperatura_1 = document.getElementById("temperatura_1").value;
        var densidad_1 = document.getElementById("densidad_1").value;
        var Resul_3 = document.getElementById("Resul_3").value;

        var factor_Correcion_T2 = document.getElementById("factor_Correcion_T2").value;
        var temperatura_2 = document.getElementById("temperatura_2").value;
        var densidad_2 = document.getElementById("factor_Correcion_T2").value;
        var peso_Muestra_2 = document.getElementById("peso_Muestra_2").value;
        var Resul_4 = document.getElementById("Resul_4").value;

        var arena = document.getElementById("arena").value;
        var arcilla = document.getElementById("arcilla").value;
        var Resul_5 = document.getElementById("Resul_5").value;
        var Textura = document.getElementById("Textura").value;

        var CarbonO = document.getElementById("CarbonO").value;
        var Resul_c = document.getElementById("Resul_c").value;

        var VolumenM = document.getElementById("VolumenM").value;
        var VolumenB = document.getElementById("VolumenB").value;
        var PesoM = document.getElementById("PesoM").value;
        var NormalidadT = document.getElementById("NormalidadT").value;
        var Resul_6 = document.getElementById("Resul_6").value;

        var densi_real = document.getElementById("densi_real").value;
        var densi_apa = document.getElementById("densi_apa").value;
        var resul_porosidad = document.getElementById("resul_porosidad").value;
          



        $("#resultado").load("conexion/Conex-Analisis_Muestra.php", {
            Fecha : Fecha,
            id_Recepcion_Muestra : id_Recepcion_Muestra,
            ws : ws,
            
            wa : wa,
            wsw : wsw,  
            ww : ww,
            dw : dw,
            t_Grados : t_Grados,
            Resul_mg_l : Resul_mg_l,

            Pss : Pss,
            Pssp : Pssp,
            Vd : Vd,
            Resul_a : Resul_a,

            factor_Correcion_T1 : factor_Correcion_T1,
            peso_Muestra_1 : peso_Muestra_1,
            temperatura_1 : temperatura_1,
            densidad_1 : densidad_1,
            Resul_3 : Resul_3,

            factor_Correcion_T2 : factor_Correcion_T2,
            temperatura_2 : temperatura_2,
            densidad_2 : densidad_2,
            peso_Muestra_2 : peso_Muestra_2,
            Resul_4 : Resul_4,

            arena : arena,
            arcilla : arcilla,
            Resul_5 : Resul_5,
            Textura : Textura,
            

            CarbonO : CarbonO,
            Resul_c : Resul_c,
            pH_Calcular : pH_Calcular,
            temperaturaPh : temperaturaPh,
            VolumenM : VolumenM,
            VolumenB : VolumenB,
            PesoM : PesoM,
            NormalidadT : NormalidadT,
            Resul_6 : Resul_6,

            densi_real : densi_real,
            densi_apa : densi_apa,
            resul_porosidad : resul_porosidad,




        });

    }    
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
    $("#id_Recepcion_Muestra").keyup(validar_id_Recepcion_Muestra);
    // $("#ws") .keyup(validar_ws); 
    // $("#wa") .keyup(validar_wa); 
    // $("#wsw") .keyup(validar_wsw); 
    // $("#ww") .keyup(validar_ww); 
    // $("#t_Grados") .keyup(validar_t_Grados); 
    // $("#Resul_mg_l") .keyup(validar_Resul_mg_l);

    // $("#Pss") .keyup(validar_Pss); 
    // $("#Pssp") .keyup(validar_Pssp); 
    // $("#Vd") .keyup(validar_Vd);  
    // $("#Resul_a") .keyup(validar_Resul_a);

    // $("#factor_Correcion_T1") .keyup(validar_factor_Correcion_T1); 
    // $("#peso_Muestra_1") .keyup(validar_peso_Muestra_1);
    // $("#densidad_1") .keyup(validar_densidad_1); 
    // $("#temperatura_1") .keyup(validar_temperatura_1);
    // $("#Resul_3") .keyup(validar_Resul_3); 

    // $("#factor_Correcion_T2") .keyup(validar_factor_Correcion_T2);
    // $("#densidad_2") .keyup(validar_densidad_2);
    // $("#temperatura_2") .keyup(validar_temperatura_2);
    // $("#peso_Muestra_2") .keyup(validar_peso_Muestra_2);
    // $("#Resul_4") .keyup(validar_Resul_4);

    // $("#arena") .keyup(validar_arena);
    // $("#arcilla") .keyup(validar_arcilla);
    // $("#Resul_5") .keyup(validar_Resul_5);

    // $("#CarbonO") .keyup(validar_CarbonO);
    // $("#Resul_c") .keyup(validar_Resul_c);
    // $("#pH_Calcular") .keyup(validar_pH_Calcular);
    
    // $("#VolumenM").keyup(validar_VolumenM);
    // $("#VolumenB") .keyup(validar_VolumenB); 
    // $("#PesoM") .keyup(validar_PesoM); 
    // $("#NormalidadT") .keyup(validar_NormalidadT); 
    // $("#Resul_6") .keyup(validar_Resul_6); 

    // $("#densi_real") .keyup(validar_densi_real); 
    // $("#densi_apa") .keyup(validar_densi_apa); 
    // $("#resul_porosidad") .keyup(validar_resul_porosidad); 

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

function validar_id_Recepcion_Muestra() {
    var id_Recepcion_Muestra = document.getElementById("id_Recepcion_Muestra").value;
    if (id_Recepcion_Muestra == "Selecciona") {
        var id_Recepcion_Muestra = document.getElementById("id_Recepcion_Muestra").style.border = "2px solid red";
        return false;
    } else {
        var id_Recepcion_Muestra = document.getElementById("id_Recepcion_Muestra").style.border = "2px solid #4caf50";
        return true;
    }
} 

function validar_ws() {
    var ws = document.getElementById("ws").value;
    if (ws.length == 0) {
        var ws = document.getElementById("ws").style.border = "2px solid red";
        return false;
    } else {
        var ws = document.getElementById("ws").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_wa() {
    var wa = document.getElementById("wa").value;
    if (wa.length == 0) {
        var wa = document.getElementById("wa").style.border = "2px solid red";
        return false;
    } else {
        var wa = document.getElementById("wa").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_wsw() {
    var wsw = document.getElementById("wsw").value;
    if (wsw.length == 0) {
        var wsw = document.getElementById("wsw").style.border = "2px solid red";
        return false;
    } else {
        var wsw = document.getElementById("wsw").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_ww() {
    var ww = document.getElementById("ww").value;
    if (ww.length == 0) {
        var ww = document.getElementById("ww").style.border = "2px solid red";
        return false;
    } else {
        var ww = document.getElementById("ww").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_t_Grados() {
    var t_Grados = document.getElementById("t_Grados").value;
    if (t_Grados.length == 0) {
        var t_Grados = document.getElementById("t_Grados").style.border = "2px solid red";
        return false;
    } else {
        var t_Grados = document.getElementById("t_Grados").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Resul_mg_l() {
    var Resul_mg_l = document.getElementById("Resul_mg_l").value;
    if (Resul_mg_l.length == 0) {
        var Resul_mg_l = document.getElementById("Resul_mg_l").style.border = "2px solid red";
        return false;
    } else {
        var Resul_mg_l = document.getElementById("Resul_mg_l").style.border = "2px solid #4caf50";
        return true;
    }
}





function validar_Pss() {
    var Pss = document.getElementById("Pss").value;
    if (Pss.length == 0) {
        var Pss = document.getElementById("Pss").style.border = "2px solid red";
        return false;
    } else {
        var Pss = document.getElementById("Pss").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Pssp() {
    var Pssp = document.getElementById("Pssp").value;
    if (Pssp == "Selecciona") {
        var Pssp = document.getElementById("Pssp").style.border = "2px solid red";
        return false;
    } else {
        var Pssp = document.getElementById("Pssp").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Vd() {
    var Vd = document.getElementById("Vd").value;
    if (Vd == "Selecciona") {
        var Vd = document.getElementById("Vd").style.border = "2px solid red";
        return false;
    } else {
        var Vd = document.getElementById("Vd").style.border = "2px solid #4caf50";
        return true;
    }
}


function validar_Resul_a() {
    var Resul_a = document.getElementById("Resul_a").value;
    if (Resul_a.length == 0) {
        var Resul_a = document.getElementById("Resul_a").style.border = "2px solid red";
        return false;
    } else {
        var Resul_a = document.getElementById("Resul_a").style.border = "2px solid #4caf50";
        return true;
    }
}





function validar_factor_Correcion_T1() {
    var factor_Correcion_T1 = document.getElementById("factor_Correcion_T1").value;
    if (factor_Correcion_T1.length == 0) {
        var factor_Correcion_T1 = document.getElementById("factor_Correcion_T1").style.border = "2px solid red";
        return false;
    } else {
        var factor_Correcion_T1 = document.getElementById("factor_Correcion_T1").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_peso_Muestra_1() {
    var peso_Muestra_1 = document.getElementById("peso_Muestra_1").value;
    if (peso_Muestra_1.length == 0) {
        var peso_Muestra_1 = document.getElementById("peso_Muestra_1").style.border = "2px solid red";
        return false;
    } else {
        var peso_Muestra_1 = document.getElementById("peso_Muestra_1").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_densidad_1() {
    var densidad_1 = document.getElementById("densidad_1").value;
    if (densidad_1.length == 0) {
        var densidad_1 = document.getElementById("densidad_1").style.border = "2px solid red";
        return false;
    } else {
        var densidad_1 = document.getElementById("densidad_1").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_temperatura_1() {
    var temperatura_1 = document.getElementById("temperatura_1").value;
    if (temperatura_1.length == 0) {
        var temperatura_1 = document.getElementById("temperatura_1").style.border = "2px solid red";
        return false;
    } else {
        var temperatura_1 = document.getElementById("temperatura_1").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Resul_3() {
    var Resul_3 = document.getElementById("Resul_3").value;
    if (Resul_3.length == 0) {
        var Resul_3 = document.getElementById("Resul_3").style.border = "2px solid red";
        return false;
    } else {
        var Resul_3 = document.getElementById("Resul_3").style.border = "2px solid #4caf50";
        return true;
    }
}




function validar_factor_Correcion_T2() {
    var factor_Correcion_T2 = document.getElementById("factor_Correcion_T2").value;
    if (factor_Correcion_T2.length == 0) {
        var factor_Correcion_T2 = document.getElementById("factor_Correcion_T2").style.border = "2px solid red";
        return false;
    } else {
        var factor_Correcion_T2 = document.getElementById("factor_Correcion_T2").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_peso_Muestra_2() {
    var peso_Muestra_2 = document.getElementById("peso_Muestra_2").value;
    if (peso_Muestra_2.length == 0) {
        var peso_Muestra_2 = document.getElementById("peso_Muestra_2").style.border = "2px solid red";
        return false;
    } else {
        var peso_Muestra_2 = document.getElementById("peso_Muestra_2").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_densidad_2() {
    var densidad_2 = document.getElementById("densidad_2").value;
    if (densidad_2.length == 0) {
        var densidad_2 = document.getElementById("densidad_2").style.border = "2px solid red";
        return false;
    } else {
        var densidad_2 = document.getElementById("densidad_2").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_temperatura_2() {
    var temperatura_2 = document.getElementById("temperatura_2").value;
    if (temperatura_2.length == 0) {
        var temperatura_2 = document.getElementById("temperatura_2").style.border = "2px solid red";
        return false;
    } else {
        var temperatura_2 = document.getElementById("temperatura_2").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Resul_4() {
    var Resul_4 = document.getElementById("Resul_4").value;
    if (Resul_4.length == 0) {
        var Resul_4 = document.getElementById("Resul_4").style.border = "2px solid red";
        return false;
    } else {
        var Resul_4 = document.getElementById("Resul_4").style.border = "2px solid #4caf50";
        return true;
    }
}




function validar_Resul_5() {
    var Resul_5 = document.getElementById("Resul_5").value;
    if (Resul_5.length == 0) {
        var Resul_5 = document.getElementById("Resul_5").style.border = "2px solid red";
        return false;
    } else {
        var Resul_5 = document.getElementById("Resul_5").style.border = "2px solid #4caf50";
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

function validar_arena() {
    var arena = document.getElementById("arena").value;
    if (arena.length == 0) {
        var arena = document.getElementById("arena").style.border = "2px solid red";
        return false;
    } else {
        var arena = document.getElementById("arena").style.border = "2px solid #4caf50";
        return true;
    }
}


function validar_arcilla() {
    var arcilla = document.getElementById("arcilla").value;
    if (arcilla.length == 0) {
        var arcilla = document.getElementById("arcilla").style.border = "2px solid red";
        return false;
    } else {
        var arcilla = document.getElementById("arcilla").style.border = "2px solid #4caf50";
        return true;
    }
}



function validar_CarbonO() {
    var CarbonO = document.getElementById("CarbonO").value;
    if (CarbonO.length == 0) {
        var CarbonO = document.getElementById("CarbonO").style.border = "2px solid red";
        return false;
    } else {
        var CarbonO = document.getElementById("CarbonO").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Resul_c() {
    var Resul_c = document.getElementById("Resul_c").value;
    if (Resul_c.length == 0) {
        var Resul_c = document.getElementById("Resul_c").style.border = "2px solid red";
        return false;
    } else {
        var Resul_c = document.getElementById("Resul_c").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_pH_Calcular() {
    var pH_Calcular = document.getElementById("pH_Calcular").value;
    if (pH_Calcular.length == 0) {  
        var pH_Calcular = document.getElementById("pH_Calcular").style.border = "2px solid red";
        return false;
    } else {
        var pH_Calcular = document.getElementById("pH_Calcular").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_VolumenM() {
    var VolumenM = document.getElementById("VolumenM").value;
    if (VolumenM.length == 0) {
        var VolumenM = document.getElementById("VolumenM").style.border = "2px solid red";
        return false;
    } else {
        var VolumenM = document.getElementById("VolumenM").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_VolumenB() {
    var VolumenB = document.getElementById("VolumenB").value;
    if (VolumenB.length == 0) {
        var VolumenB = document.getElementById("VolumenB").style.border = "2px solid red";
        return false;
    } else {
        var VolumenB = document.getElementById("VolumenB").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_PesoM() {
    var PesoM = document.getElementById("PesoM").value;
    if (PesoM.length == 0) {
        var PesoM = document.getElementById("PesoM").style.border = "2px solid red";
        return false;
    } else {
        var PesoM = document.getElementById("PesoM").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_NormalidadT() {
    var NormalidadT = document.getElementById("NormalidadT").value;
    if (NormalidadT.length == 0) {
        var NormalidadT = document.getElementById("NormalidadT").style.border = "2px solid red";
        return false;
    } else {
        var NormalidadT = document.getElementById("NormalidadT").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Resul_6() {
    var Resul_6 = document.getElementById("Resul_6").value;
    if (Resul_6.length == 0) {
        var Resul_6 = document.getElementById("Resul_6").style.border = "2px solid red";
        return false;
    } else {
        var Resul_6 = document.getElementById("Resul_6").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_densi_real() {
    var densi_real = document.getElementById("densi_real").value;
    if (densi_real.length == 0) {
        var densi_real = document.getElementById("densi_real").style.border = "2px solid red";
        return false;
    } else {
        var densi_real = document.getElementById("densi_real").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_densi_apa() {
    var densi_apa = document.getElementById("densi_apa").value;
    if (densi_apa.length == 0) {
        var densi_apa = document.getElementById("densi_apa").style.border = "2px solid red";
        return false;
    } else {
        var densi_apa = document.getElementById("densi_apa").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_resul_porosidad() {
    var resul_porosidad = document.getElementById("resul_porosidad").value;
    if (resul_porosidad.length == 0) {
        var resul_porosidad = document.getElementById("resul_porosidad").style.border = "2px solid red";
        return false;
    } else {
        var resul_porosidad = document.getElementById("resul_porosidad").style.border = "2px solid #4caf50";
        return true;
    }
}

 function checked() {
  
  var selecion = document.getElementById("id_Recepcion_Muestra").value;
  $.ajax({
      type:"POST",
      data: "selecion="+ selecion,
      url:"consultas/consulta.php",
      success:function(r){
        datos= jQuery.parseJSON(r);

         if (datos['densidadR'] == "No") {
                  document.getElementById("densidadR").style.display="none";
         }else{

               document.getElementById("densidadR").style.display="block";      
             } 

          if (datos['densidadA'] == "No") {
                  document.getElementById("densidadA").style.display="none";
         }else{

               document.getElementById("densidadA").style.display="block";      
             } 

          if (datos['porosi'] == "No") {
                  document.getElementById("porosi").style.display="none";
         }else{

               document.getElementById("porosi").style.display="block";      
             } 


          if (datos['textu'] == "No") {
                  document.getElementById("textu").style.display="none";
         }else{

               document.getElementById("textu").style.display="block";      
             } 

          if (datos['Corganico'] == "No") {
                  document.getElementById("Corganico").style.display="none";
         }else{

               document.getElementById("Corganico").style.display="block";      
             } 

             if (datos['Morganica'] == "No") {
                  document.getElementById("Morganica").style.display="none";
         }else{

               document.getElementById("Morganica").style.display="block";      
             } 

              if (datos['pH'] == "No") {
                  document.getElementById("pH").style.display="none";
         }else{

               document.getElementById("pH").style.display="block";      
             } 

      
      
 
}

 });

                 
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
