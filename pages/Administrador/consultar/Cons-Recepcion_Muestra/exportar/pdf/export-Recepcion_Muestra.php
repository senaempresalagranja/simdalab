<?php

require_once '../../../../../../assets/lib/tcpdf/config/lang/spa.php';
require_once '../../../../../../assets/lib/tcpdf/tcpdf.php';
require_once '../../../../../../assets/conexion/conexion.php';


$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Recepcion De Muestra'); //Titlo del pdf
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
$Hora=$_POST["Hora"];

$query="SELECT `id_Recepcion_Muestra`, `Fecha`, recepcion_muestra.Hora, toma_muestra.identificacion_Muestra, recepcion_muestra.Humedad, `Textura`, `ph_Muestra`, `densidad_Aderente`, `densidad_Real`, `porosidad`, `retencion_Humedad`, `distrubucion_tamanos`, `cationes_Intercambiables`, `elementos_Menores`, `materia_Organica`, `carbono_organico`, `CIC`, `Otros`, `muestra_Entregada_Por`, `muestra_Recibida_Por`, recepcion_muestra.Observaciones FROM `recepcion_muestra` 
          INNER JOIN toma_muestra on recepcion_muestra.id_Toma_Muestra=toma_muestra.id_Toma_Muestra

WHERE Fecha LIKE '%$Fecha%'
AND toma_muestra.identificacion_Muestra LIKE '%$id_Toma_Muestra%' 
-- AND municipios.nombre_Municipio LIKE '%$municipio%'
-- AND departamentos.nombre_Departamento LIKE '%$nombre_Departamento%'
";
$resource = mysqli_query($conexion, $query);
while ($fila = mysqli_fetch_row($resource)) {

//     $html .= '
// 			<style>
// 				table,td{

// 				border:1px solid black;
// 				border-collapse:collapse;
// 				font-size:38px;
// 			}



// 			</style>

// 			<table>
// 				<thead>

// 				<tr>
// <td>' . $fila[1] . '</td>
// <td>' . $fila[2] . '</td>
// <td>' . $fila[3] . '</td>
// <td>' . $fila[3] . '</td>
// </tr>
// 				</thead>
// 			</table>

// 	';

		$html .= '
	<style>
	table,td{

		border:1px solid black;
		border-collapse:collapse;
		font-size:38px;
	}

	th{
		font-weight: bold;
background-color: #28b31d;
	}




	</style>
<br>
<br>


<strong>Codigo de muestra</strong> - ' . $fila[3] . '
<br>
<br>
<strong>Fecha y hora </strong> ' . $fila[1] . '  (' . $fila[2] . ')
<br>
<br>
<h1>Analisis a realizar</h1>
	<table>
	<thead>

	<tr>
	<th>Humemdad </th>
	<th>Textura</th>
	<th>pH</th>
	<th>Densidad Aparente</th>
	<th>Densidad Real</th>
	<th>Porosidad</th>
	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $fila[4] . '</td>
	<td>' . $fila[5] .  '</td>
	<td>' . $fila[6] .  '</td>
	<td>' . $fila[7] . '</td>
	<td>' . $fila[8] . '</td>
	<td>' . $fila[9] . '</td>

	</tr>
	</thead>
	</table>
	

	<table>
	<thead>

	<tr>
	<th>Retención Humedad</th>
	<th>distrubucion Tamaños</th>
	<th>Cationes Intercambiables</th>
	<th>Elementos Menores</th>
	<th>Materia Organica</th>
	<th>Carbono Organico</th>
	<th>CIC</th>
	<th>Otros</th>
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
	<td>' . $fila[14] . '</td>
	<td>' . $fila[15] . '</td>
	<td>' . $fila[16] . '</td>
	<td>' . $fila[17] . '</td>

	</tr>
	</thead>
	</table>
	<b></b>
	<br>




	<br>
<br>
<br>
<br>
	<strong>Observaciones</strong>: ' . $fila[20] . '
	<br>
	<br>
	<strong>muestra Recibida Por</strong>: ' . $fila[19] . '
	<br>
	<br>

	<strong>Muestra Entregada Por</strong>: ' . $fila[18] . '
<br>




	<br>
<br>
<br>
<br>
	<br>
<br>
<br>
<br>
	<br>
<br>
<br>
	<br>
<br>
<br>
	

	';

}

$pdf->SetFont('Helvetica', '', 10);

$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();

$pdf->output('Recepcion_Muestra (simdalab).pdf', 'D');
