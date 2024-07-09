<?php

require_once '../../../../../../assets/lib/tcpdf/config/lang/spa.php';
require_once '../../../../../../assets/lib/tcpdf/tcpdf.php';
require_once '../../../../../../assets/conexion/conexion.php';

$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
$pdf->SetTitle('Informe Analisis De Muestra'); //Titlo del pdf
$pdf->setPrintHeader(true); // (false) No se imprime cabecera       (true) inprime la cabesera
$pdf->setPrintFooter(true); // (false) No se imprime pie de pagina  (true) inprime la cabesera
$pdf->SetMargins(15, 15, 15, false); //Se define margenes izquierdo, alto, derecho
$pdf->SetAutoPageBreak(true, 20); //Se define un salto de pagina con un limite de pie de pagina

//el logo se cambia en la carpeta config en el archivo tcpdf_config.php en la linea 134 y el la linea 139 de cabia el tamaño
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'SIMDALAB', 'Sistema de Informacion para el Manejo de los Datos de Analisis de Muestras del Laboraorio de Suelos ');

$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->addPage();





$Fecha=$_POST["Fecha"];
$id_Toma_Muestra=$_POST["id_Toma_Muestra"];
$id_Finca=$_POST["id_Finca"];




$query="SELECT 
`id_Analisis_Muestra`,
 analisis_muestra.Fecha, 
 toma_muestra.identificacion_Muestra,
 toma_muestra.fecha_Toma,
 toma_muestra.Hora,
 recepcion_muestra.Fecha, 
 recepcion_muestra.Hora,
 instructores.nombre_Instructor, 
 instructores.numero_Documento,
toma_muestra.Proyecto,
 fichas.numero_Ficha,
 programas.nombre_Programa,
 tipo_programa.Tipo,
 instructores.Correo_Electronico,
 toma_muestra.Humedad,
 toma_muestra.fuerza_penetracion,
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
 `resul_porosidad`,
 fincas.codigoFinca,
 toma_muestra.responsable_Toma,
 toma_muestra.Observaciones FROM `analisis_muestra`
  INNER JOIN recepcion_muestra on analisis_muestra.id_Recepcion_Muestra=recepcion_muestra.id_Recepcion_Muestra
  
  
  
  
  
  INNER join toma_muestra on recepcion_muestra.id_Toma_Muestra=toma_muestra.id_Toma_Muestra
  INNER JOIN instructores ON toma_muestra.id_Instructor=instructores.id_Instructor
  
  INNER JOIN lotes on toma_muestra.id_Lote=lotes.id_Lote
  
  INNER JOIN fincas on lotes.id_Finca=fincas.id_Finca
  
  
    
  INNER JOIN fichas on toma_muestra.id_Ficha=fichas.id_Ficha

  INNER JOIN programas on fichas.id_Programa=programas.id_Programa

  INNER JOIN tipo_programa on programas.id_Tipo_Programa=tipo_programa.id_Tipo_Programa

WHERE  analisis_muestra.Fecha LIKE '%$Fecha%'
AND toma_muestra.identificacion_Muestra LIKE '%$id_Toma_Muestra%' 
AND fincas.codigoFinca LIKE '%$id_Finca%'
-- AND municipios.nombre_Municipio LIKE '%$municipio%'
-- AND departamentos.nombre_Departamento LIKE '%$nombre_Departamento%'
-- AND toma_muestra.identificacion_Muestra LIKE '%$id_Toma_Muestra%' 
";
$resource = mysqli_query($conexion, $query);
while ($fila = mysqli_fetch_row($resource)) {

 //    $html .= '
	// 		<style>
	// 			table,td{

	// 			border:1px solid black;
	// 			border-collapse:collapse;
	// 			font-size:38px;
	// 		}



	// 		</style>

	// 		<table>
	// 			<thead>

	// 			<tr>
	// 			  <td class="casillas">' . $fila[1] . '</td>
	// 			  <td class="casillas">' . $fila[2] . '</td>
	// 			  <td class="casillas">' . $fila[3] . '</td>
	// 			</tr>
	// 			</thead>
	// 		</table>

	// ';


	// 	$html .= '
	


	// ';

$html .= '
	<style>
	.tabla,.casillas{

		border:1px solid black;
		border-collapse:collapse;
		font-size:38px;
	}

	.border_fila{
		border-bottom:1px solid black;
	}

	.titulo_blanco{
		color: white;
	}

	.tabla_title{
		font-weight: bold;
background-color: #28b31d;
	}



	.instructor{
		    text-align: center;
		        margin-top: 20%;

	}




	</style>

<h3>Informacion General </h3>



<table class="" style="width:100%">
  <tr>
    <th width="215">Fecha toma de muestra (aa-mm-dd)</th>
    <th class="border_fila">' . $fila[3] . '</th>
    <th width="95" >Hora (hh:mm):</th> 
    <th class="border_fila">' . $fila[4] . '</th>
    <th width="75">Informe N°</th>
    <th width="75" class="border_fila">' . $fila[0] . '</th>
    
  </tr>

  <tr>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
  </tr>

  <tr>
    <td >Fecha de recepción (aa-mm-dd)</td>
    <td class="border_fila">' . $fila[5] . '</td>
    <td width="95" >Hora (hh:mm):</td>
    <td class="border_fila">' . $fila[6] . '</td>
  </tr>

   <tr >
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
  </tr>

  <tr>
    <td >Fecha de análisis (aa-mm-dd)</td>
    <td class="border_fila">' . $fila[1] . '</td>
  </tr>

   <tr >
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
  </tr>

  <tr>
    <td >Codigo de la muestra</td>
    <td class="border_fila">' . $fila[2] . '</td>
  </tr>

  <tr >
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
  </tr>

  <tr>
    <td >Codigo Finca</td>
    <td class="border_fila">' . $fila[53] . '</td>
  </tr>

   <tr >
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
  </tr>

</table>


<h3>Informacion del cliente coordinador instructor aprendiz  </h3>

<table class="" style="width:100%">
  <tr>
    <th width="115"></th>
    <th width="615"></th>
  </tr>
  <tr>
    <td >Nombre:</td>
    <td class="border_fila">' . $fila[7] . '</td>
    
  </tr>

  <tr>
    <td ></td>
    <td ></td>
  </tr>

  <tr>
    <td >Identificacion </td>
    <td class="border_fila">' . $fila[8] . '</td>

  </tr>

   <tr >
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
  </tr>

  <tr>
    <td >Numero ficha o proyecto</td>
    <td class="border_fila">' . $fila[9] . ' - ' . $fila[10] . ' - ' . $fila[11] . ' - ' . $fila[12] . '</td>
  </tr>

   <tr >
    <td ></td>
    <td ></td>

  </tr>

   <tr>
    <td >E-mail</td>
    <td class="border_fila">' . $fila[13] . '</td>
  </tr>


     <tr >
    <td ></td>
    <td ></td>

  </tr>






</table>




<h3>Resultados del Estado </h3>


<table class="tabla" style="width:100%">
  <tr>
    <th class="tabla_title">ANALISIS REALIZADOS</th>
    <th class="tabla_title">RESULTADOS</th> 
    <th class="tabla_title">UNIDADES</th>
    <th class="tabla_title">METODO</th>
  </tr>

';
if (count($fila[14]) >= 1 && $fila[14] >= 0.0001) {
 $html.= '<tr >
     <td class="casillas">Humedad </td>
     <td class="casillas">' . $fila[14] .  '</td>
     <td class="casillas">%</td> 
     <td class="casillas">SONDA</td>
   </tr> ';
}

if (count($fila[22]) >= 1 && $fila[22] >= 0.0001) {
$html.='
  <tr>
    <td class="casillas">Densidad Real </td>
    <td class="casillas">' . $fila[22] . '</td>
    <td class="casillas">g/ml</td> 
    <td class="casillas">PICNÓMETRO</td>
  </tr>
  ';
}
if (count($fila[26]) >= 1 && $fila[26] >= 0.0001) {
$html.='
  <tr>
    <td class="casillas">Densidad Aparente </td>
    <td class="casillas">' . $fila[26] . '</td>
    <td class="casillas">g/ml</td> 
    <td class="casillas">TERRÓN PARAFINADO</td>
  </tr> ';
}

if (count($fila[52]) >= 1 && $fila[52] >= 0.0001) {
$html.='
  <tr>
    <td class="casillas">Porosidad </td>
    <td class="casillas">' . $fila[52] . '</td>
    <td class="casillas">%</td> 
    <td class="casillas">CALCULO</td>
  </tr> ';
}
if (count($fila[31]) >= 1 && $fila[31] >= 0.0001) {
$html.='

  <tr>
    <td class="casillas">Arena </td>
    <td class="casillas">' . $fila[31] . '</td>
    <td class="casillas">%</td> 
    <td class="casillas">BOUYOUCOS</td>
  </tr> ';
}

if (count($fila[32]) >= 1 && $fila[32] >= 0.0001) {
$html.='

  <tr>
    <td class="casillas">Arcilla </td>
    <td class="casillas">' . $fila[36] . '</td>
    <td class="casillas">%</td> 
    <td class="casillas">BOUYOUCOS</td>
  </tr> ';
}

if (count($fila[39]) >= 1 && $fila[39] >= 0.0001) {
$html.='
  <tr>
    <td class="casillas">Limo </td>
    <td class="casillas">' . $fila[39] . '</td>
    <td class="casillas">%</td> 
    <td class="casillas">BOUYOUCOS</td>
  </tr> ';
}

if (count($fila[49]) >= 1 && $fila[49] >= 0.0001) {
$html.='

   <tr>
    <td class="casillas">Carbono Orgánico </td>
    <td class="casillas">' . $fila[49] . '</td>
    <td class="casillas">%</td> 
    <td class="casillas">WALKLEY-BLACK</td>
  </tr> ';
}

if (count($fila[42]) >= 1 && $fila[42] >= 0.0001) {
$html.='
   <tr>
    <td class="casillas">Materia Orgánica </td>
    <td class="casillas">' . $fila[42] . '</td>
    <td class="casillas">%</td> 
    <td class="casillas">WALKLEY-BLACK</td>
  </tr> ';
}
if (count($fila[43]) >= 1 && $fila[43] >= 0.0001) {
$html.='

   <tr>
    <td class="casillas">pH </td>
    <td class="casillas">' . $fila[43] . '</td>
    <td class="casillas">No Aplica</td> 
    <td class="casillas">POTENCIOMÉTRICO</td>
  </tr>  ';
}
$html.='



</table>

<b>NOTAS</b>


<ul>
<li>Los resultados son aplicablesa la muestra analizada</li>
<li>Este informe de ensayo no debe ser reproducido parcialmente parcialmente sin la autorizacion escrita del laboratorio</li>
<li>Pasados 10 dias hábiles despues de entregado el informe, éste se considera como aceptado</li>
</ul>



<b class="titulo_blanco">NOTAS</b>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<table  style="width:100%">
  <tr>
    <th width="265"></th>
    <th  width="415" class="border_fila"></th> 
    <th ></th>
  </tr>
</table>
<h3 class="instructor">	JAVIER ANDRÉS QUINTERO JARAMILLO</h3>
<h4 class="instructor">	Instructor Ambiental. Laboratorio de Suelos</h4>
<br>
<br>
<br>
<br>
<b class="titulo_blanco">NOTAS</b>
<br>

';

// output the HTML content

}

$pdf->SetFont('Helvetica', '', 10);

$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();
$pdf->output('Informe_Analisis_de_muestra (SIMDALAB).pdf', 'D');
