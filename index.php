<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Sistema de informacion">
  <meta name="keywords" content="HTML,CSS,JavaScript">
  <meta name="author" content="Juan Jose Baez">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIMDALAB</title>
  <link rel="shortcut icon" href="assets/imagenes/Sindalab.png">
  <link rel="stylesheet" href="assets/css/components.css">
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">

</head>
  
   <body class="body_margin" id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="margin-top: 0;/*padding-top: -20px*/;">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="height: 50px;">
      <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a> -->
            </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
            <li class="hidden">
              <a class="page-scroll" href="#page-top"></a>
            </li>

            <li>
                <a class="page-scroll click-pointer"  onclick="Instructores_Asesores()" style="margin-top: -15px ;">¿SIMDALAB? <i class="fa fa-eye fa-lg"></i></a>
            </li>

            <li>
                <a class="page-scroll click-pointer"  onclick="Aprendices_Desarrolladores()" style="margin-top: -15px;">Desarrollador <i class="fa fa-code fa-lg"></i></a>
            </li>

             <li>
                <a class="page-scroll click-pointer" onclick="Iniciar_sesion()" style="margin-top: -15px;margin-left: 600px;"> Iniciar Sesión <i class="fa fa-sign-in fa-lg"></i></a>
            </li>

            <li>
                <a class="page-scroll click-pointer" onclick="instructor()" style="margin-top: -50px;margin-left: 300px;"> Insutructor Asesor <i class="fa fa-flask"></i></a>
            </li>

          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
</nav>
    <div class="modal fade" id="Iniciar_sesion" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="caja-inicio-sesion">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <!-- <img class="logo-inicio-sesion" src="assets/imagenes/user.png" > -->
            <h3 class="caja-inicio-sesion-titulo">Iniciar Sesión</h3>
          </div>


          <div class="modal-body">
            <form role="form" action="assets/conexion/sesion.php" method="post" id="formulario_login" autocomplete="off">
              <div class="form-group ">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                  <label class="form-control-label" for="usuario"><i class="fa fa-user"></i> Usuario</label>
                  <input class="form-control" type="text" name="usuario" id="usuario">
                </div>
              </div>

              <div class="form-group ">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                  <label class="form-control-label  " for="contrasena"> <i class="fa fa-key"></i> Contraseña</label>
                  <input class="form-control" type="password" name="contrasena" id="contrasena">
                </div>
              </div>

              <div class="modal-footer">
                <div class="col-xs-12" id="contenedor_login" style="text-align: center;"></div>
                <div class="box col-xs-12 ">

                  

                   <div class="modal-footer">
                    <br>   <button class="btn btn-primary icon-btn" type="button" onclick="acceder()"><i class="icon fa fa-sign-in"></i>Ingresar</button>
                    </div>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="Instructores_Asesores" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h1 class="modal-title icon  icon-pen"> ¿QUE ES?</h1>

      </div>
      <div class="modal-body">
        <div class="row">

<div class="col-md-12">
<div style=" overflow-y: auto; ">
  

<!-- <h3 style="text-align: center;">Ingenieros De Sistemas</h3> -->
<table class="table table-bordered">
    <thead>
        <!-- <tr>
            <th></th>
            <th>Titulo</th>
            <th>Universidad</th>
            <th>Especialización/Maestría</th>
            <th>Universidad</th>
        </tr> -->
    </thead>
    <tbody>
        <tr>
            <td>
              <p style="font-size: 16px;">
              <h4> Sistema de Informacion para el Manejo de los Datos de Analisis de Muestras del Laboratorio de Suelos "SIMDALAB" </h4>
              El Servicio Nacional de Aprendizaje SENA en uno de sus objetivos de formación, plantea la necesidad de hacerlo con calidad e integralidad. Para el cumplimento de este objetivo planteado ha tenido que incluir un componente importante en sus programas de formación el cual es la investigación. La investigación no solo aporta al cumplimiento de los criterios de calidad necesarios para los registros calificados sino que aporta al desarrollo tecnológico de los centros de formación, de la región y del país. Para poder realizar investigación y más específicamente investigación aplicada se debe contar con la ayuda de análisis de laboratorios y con datos de calidad de los mismos. En la actualidad es más valioso contar con pocos datos y confiables que contar con muchos pero sin la confianza suficiente. Es así como nace la idea se suplir la necesidad de contar con resultados precisos y confiables en el laboratorios de suelos. Para ello no solo se necesita de personal calificado, equipos adecuados, plan de mantenimiento y demás recursos necesarios, sino que también se requiere tener un control de los datos desde la toma de muestra hasta la generación del informe. Controlar todos estos pasos aportará lo suficiente para cumplir el objetivo planteado de brindar información de calidad y precisión en el laboratorio de suelos. Para ello y con el uso de la tecnología actual se desarrollará un Software denominado  SIMDALAB el cual permitirá manejar toda la información de toma de muestras, recepción de muestras, análisis de muestras, informes de resultados, responsables de cada una de las etapas lo que ayudará a la creación de una memoria de análisis, el acceso fácil y seguro a la información y a conservar la trazabilidad de los análisis para las personas interesadas. Contar con un software será punto de referencia desde el Centro Agropecuario La Granja para los demás laboratorios de análisis del país. </p></td>
            <!-- <td>Ingeniero De Sistemas</td>
            <td>Antonio Nariño</td>
            <td>Auditoria De Sistemas</td>
            <td>Antonio Nariño</td> -->

        </tr>
       


    </tbody>
</table>






</div>
</div>
</div>  

  
      </div>
         
   </div>
</div>

</div>




<div class="modal fade" id="Aprendices_Desarrolladores" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h1 class="modal-title icon  icon-pen">  Aprendiz Desarrollador </h1>

      </div>
      <div class="modal-body">
        <div class="row">

<div class="col-md-12">
<div style=" overflow-y: auto; ">
  

<!-- <h3 style="text-align: center;">Ingenieros De Sistemas</h3> -->



<!-- <h3 style="text-align: center;">Aprendizes Desarrolladores</h3>
<h4 style="text-align: center;">SIE</h4> -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Tecnologo</th>
            <th>Ficha</th>
            <th>Año</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            
            <td>Juan Jose Baez Galvez</td>
            <td>Tecnologo En Análisis y Desarrollo De Sistemas De Información</td>
            <td>1443229</td>
            <td>2018</td>

       <!--  </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr> -->
       


    </tbody>
</table>





</div>
</div>
</div>  

  
      </div>
         
   </div>
</div>

</div>

<div class="modal fade" id="instructor" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h1 class="modal-title icon  icon-pen">  Instructor Asesor </h1>

      </div>
      <div class="modal-body">
        <div class="row">

<div class="col-md-12">
<div style=" overflow-y: auto; ">
  

<!-- <h3 style="text-align: center;">Ingenieros De Sistemas</h3> -->



<!-- <h3 style="text-align: center;">Aprendizes Desarrolladores</h3>
<h4 style="text-align: center;">SIE</h4> -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Titulo</th>
            <th>Universidad</th>
            <th>Especialización</th>
            <th>Maestría</th>
            

        </tr>
    </thead>
    <tbody>
        <tr>
            
            <td>Javier Andres Quintero Jaramillo</td>
            <td>Ingeniero Quimico</td>
            <td>Nacional Sede Manizales</td>
            <td>Ingenieria Ambiental</td>
            <td>Medio Ambiente y Desarrollo Sostenible</td>

       <!--  </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr> -->
       


    </tbody>
</table>





</div>
</div>
</div>  

  
      </div>
         
   </div>
</div>

</div>



<!--     <div class="center-div">


    <div class="texto_banner">
      <div class="logo">
        <img src="assets/imagenes/Sindalab.png" style="width: 20%; margin-bottom: 20px; margin-top: 120px; ">
      </div>

      <h1></1>
    </div>


    </div> -->


    <div class="title">
<!--     <h3>PLASM.it - 2017</h3>
    <h1>PLANKTON</h1>
    <h3>Particles life</h3> -->
    <img src="assets/imagenes/Sindalab.png" style="width: 20%; margin-bottom: 20px; margin-top: 120px; ">
  </div>



  <script src="assets/js/jquery-2.1.4.min.js"></script>
  <script src="assets/js/essential-plugins.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/plugins/pace.min.js"></script>
  <script src="assets/js/main.js"></script>
  <div id="particles-js"></div>
  <script src="assets/js/particles.js"></script>
  <script src="assets/js/app.js"></script>
 
  
  

  <script>
    function instructor() {
    $("#instructor").modal("show");
}


 function Iniciar_sesion() {
    $("#Iniciar_sesion").modal("show");
}


function Instructores_Asesores() {
    $("#Instructores_Asesores").modal("show");
}

function Aprendices_Desarrolladores() {
    $("#Aprendices_Desarrolladores").modal("show");
}
//

function acceder() {
  var usuario=document.getElementById("usuario").value;
  var contrasena=document.getElementById("contrasena").value;

  $("#contenedor_login").load("assets/conexion/login.php", {usuario:usuario, contrasena:contrasena})
}







    </script>

<script>
  var count_particles, stats, update;
  stats = new Stats;
  stats.setMode(0);
  stats.domElement.style.position = 'absolute';
  stats.domElement.style.left = '0px';
  stats.domElement.style.top = '0px';
  document.body.appendChild(stats.domElement);
  count_particles = document.querySelector('.js-count-particles');
  update = function() {
    stats.begin();
    stats.end();
    if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) 
    requestAnimationFrame(update);
  };
  requestAnimationFrame(update);
</script>

    <style>
      body {
    width: 100%;
    height: 100%;
}

html {
    width: 100%;
    height: 100%;
}

@media(min-width:767px) {
    .navbar {
        padding: 20px 0;
        -webkit-transition: background .5s ease-in-out,padding .5s ease-in-out;
        -moz-transition: background .5s ease-in-out,padding .5s ease-in-out;
        transition: background .5s ease-in-out,padding .5s ease-in-out;
    }

    .top-nav-collapse {
        padding: 0;
    }
}




    </style>

    <style>
    .modal-footer{
      padding: 0;
      border-top: 0px solid transparent;
    }

      .intro-section {
    height: 100%;
    padding-top: 15em;
    padding-bottom:  18.4em;
    text-align: center;
    background: url(assets/img/wallhaven-355806.jpg);
    background-repeat: no-repeat;
    background-position: center;
}
.title{
  font-size: 10em;
  color: #fff;
  text-shadow: 0 7px 1px rgba(0, 0, 0, 0.35);
}
.sub_title{
  font-size: 2em;
  color: #fff;
}

.caja-inicio-sesion{
  margin: 1em 1em 0 1em ;
  text-align:center;
}
.logo-inicio-sesion{
  width: 10em;
}

.caja-inicio-sesion-titulo{
  margin: 0;
}


.navbar-default .navbar-nav>li>a {
    color: #fff;
    font-size: 16px;
}

.navbar-default {
    background-color: #28b31d;
    border-color: rgba(231, 231, 231, 0);
        position: fixed;
    width: 100%;
}

.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover{
    color: #fff;
    background-color: #fc7323;
}

.navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
    color: #fff;
    /*background-color: transparent;*/
}




.more-pens {
  position: fixed;
  left: 20px;
  bottom: 20px;
  z-index: 10;

  font-size: 12px;
}

a.white-mode, a.white-mode:link, a.white-mode:visited, a.white-mode:active {
  font-family: "Montserrat";
  font-size: 12px;
  text-decoration: none;
  background: #212121;
  padding: 4px 8px;
  color: #f7f7f7;
}
a.white-mode:hover, a.white-mode:link:hover, a.white-mode:visited:hover, a.white-mode:active:hover {
  background: #edf3f8;
  color: #212121;
}

body {
  margin: 0;
  padding: 0;
  overflow: hidden;
  width: 100%;
  height: 100%;
/*  background: #000000;*/
}

.title {
  z-index: 10;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-50%) translateY(-50%);
  font-family: "Montserrat";
  text-align: center;
  width: 100%;
}
.title h1 {
  position: relative;
  color: #EEEEEE;
  font-weight: 600;
  font-size: 60px;
  padding: 0;
  margin: 0;
  line-height: 1;
  text-shadow: 0 0 30px #000155;
}
.title h1 span {
  font-weight: 600;
  padding: 0;
  margin: 0;
  color: #BBB;
}
.title h3 {
  font-weight: 200;
  font-size: 20px;
  padding: 0;
  margin: 0;
  line-height: 1;
  color: #EEEEEE;
  letter-spacing: 2px;
  text-shadow: 0 0 30px #000155;
}

.codepen-promotion:active, .codepen-promotion:hover, .codepen-promotion:link, .codepen-promotion:visited {
  position: absolute;
  display: block;
  width: 200px;
  z-index: 111;
  right: 40px;
  bottom: 40px;
}

.codepen-promotion__image {
  width: 100%;
}

#particles-js{
  width: 100%;
  height: 100%;
  background-color: #fff;
  background-image: url('');
  background-size: cover;
  background-position: 50% 50%;
  background-repeat: no-repeat;
}





/*a {
  display: inline-block;
  margin: 0 5px;
  color: #fff;
}*/

    </style>
  </body>
</html>
