<?php

require_once '../../../../../../assets/lib/tcpdf/config/lang/spa.php';
require_once '../../../../../../assets/lib/tcpdf/tcpdf.php';
require_once '../../../../../../assets/conexion/conexion.php';

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
$pdf->SetTitle('Analisis De Muestra'); //Titlo del pdf
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
 fincas.codigoFinca FROM `analisis_muestra`
           INNER JOIN recepcion_muestra on analisis_muestra.id_Recepcion_Muestra=recepcion_muestra.id_Recepcion_Muestra 
           INNER join toma_muestra on recepcion_muestra.id_Toma_Muestra=toma_muestra.id_Toma_Muestra
           INNER JOIN lotes on toma_muestra.id_Lote=lotes.id_Lote
  
           INNER JOIN fincas on lotes.id_Finca=fincas.id_Finca

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
	// 			  <td>' . $fila[1] . '</td>
	// 			  <td>' . $fila[2] . '</td>
	// 			  <td>' . $fila[3] . '</td>
	// 			</tr>
	// 			</thead>
	// 		</table>

	// ';


		$html .= '
	<style>

			.titulo_blanco{
		color: white;
	}


	table,td{

		border:1px solid black;
		border-collapse:collapse;
		font-size:38px;
	}

	th{
		font-weight: bold;
background-color: #28b31d;
	}



	h1{
		    text-align: center;
		        margin-top: 20%;
		        color{
		        	#28b31d
		        }
	}
	</style>
<b></b>
<b></b>
<b></b>
<b></b>
<b></b>
<b></b>
<b></b>

<br>
 <br><b>Codigo Muestra:</b>' . $fila[2] . '
 <br><b>Codigo Finca:</b>' . $fila[40] . ' <br><b>Fecha:</b>' . $fila[1] . '

<h1>Densidad Real</h1>
	<table>
	<thead>

	<tr>
	<th>ws</th>
	<th>wa</th>
	<th>wsw </th>
	<th>ww</th>
	<th>T</th>
	<th>dw</th>
	<th>Resul (mg/l)</th>
	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $fila[3] . ' </td>
	<td>' . $fila[4] .  ' </td>
	<td>' . $fila[5] .  '</td>
	<td>' . $fila[6] . '</td>
	<td>' . $fila[8] . '</td>
	<td>' . $fila[7] . '</td>
	<td>' . $fila[9] . '</td>

	</tr>
	</thead>
	</table>
	<br>


<h1>Densidad Aparente</h1>

	<table>
	<thead>

	<tr>
	<th>Pss</th>
	<th>Pssp</th>
	<th>Vd</th>
	<th>Resul_a</th>
	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $fila[10] . '</td>
	<td>' . $fila[11] . '</td>
	<td>' . $fila[12] . '</td>
	<td>' . $fila[13] . '</td>
	</tr>
	</thead>
	</table>
<br>



<h1>Porosidad</h1>

	<table>
	<thead>

	<tr>
	<th>Densidad Real</th>
	<th>Densidad Aparente</th>
	<th>Resultado</th>
	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $fila[37] . '</td>
	<td>' . $fila[38] . '</td>
	<td>' . $fila[39] . '</td>
	</tr>

	</thead>
	</table>


<h1>Textura</h1>
<h2>Arena</h2>

	<table>
	<thead>

	<tr>
	<th>densidad 1</th>
	<th>Factor Correcion</th>
	<th>Temperatura 1</th>
	<th>Peso Muestra</th>
	<th>Arena (%)</th>
	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $fila[16] . '</td>
	<td>' . $fila[14] . '</td>
	<td>' . $fila[15] . '</td>
	<td>' . $fila[17] . '</td>
	<td>' . $fila[18] . '</td>
	</tr>

	</thead>
	</table>


<h2>Arcilla</h2>
	<table>
	<thead>

	<tr>
	<th>densidad 2</th>
	<th>Factor Correcion 2</th>
	<th>Temperatura 2</th>
	<th>Peso Muestra</th>
	<th>Arcilla (%)</th>
	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $fila[21] . '</td>
	<td>' . $fila[19] . '</td>
	<td>' . $fila[20] . '</td>
	<td>' . $fila[22] . '</td>
	<td>' . $fila[23] . '</td>
	</tr>

	</thead>
	</table>

<h2>Limo</h2>
	<table>
	<thead>

	<tr>
	<th>Arena</th>
	<th>Arcilla</th>
	<th>Limo</th>
	<th>Textura</th>

	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $fila[24] . '</td>
	<td>' . $fila[25] . '</td>
	<td>' . $fila[26] . '</td>
	<td>' . $fila[27] . '</td>
	</tr>

	</thead>
	</table>


	<h1>Carbono Organico</h1>
	<table>
	<thead>

	<tr>
	<th>Volumen Muestra</th>
	<th>Volumen Blanco</th>
	<th>Peso Muestra</th>
	<th>Normalidad Titulante</th>
	<th>Resultado</th>

	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $fila[32] . '</td>
	<td>' . $fila[33] . '</td>
	<td>' . $fila[34] . '</td>
	<td>' . $fila[35] . '</td>
	<td>' . $fila[36] . '</td>
	</tr>

	</thead>
	</table>



	<h1>Materia Organica</h1>
	<table>
	<thead>

	<tr>
	<th>Carbono Organico</th>
	<th>Resultado</th>


	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $fila[28] . '</td>
	<td>' . $fila[29] . '</td>

	</tr>

	</thead>
	</table>



	<h1>pH</h1>
	<table>
	<thead>

	<tr>
	<th>PH</th>
	<th>Temperatura °C</th>


	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $fila[30] . '</td>
	<td>' . $fila[31] . '</td>

	</tr>

	</thead>
	</table>
	<br>




<b class="titulo_blanco">NOTAS</b>
<br>

<br>

<br>

<br>



	';

}

$pdf->SetFont('Helvetica', '', 10);

$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();
$pdf->output('Analisis_de_muestra (SIMDALAB).pdf', 'D');
