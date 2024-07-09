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



$identificacion_Muestra=$_POST["identificacion_Muestra"];

$query="SELECT `id_Toma_Muestra`, 
`fecha_Toma`, 
`Hora`, 
programas.nombre_Programa,
tipo_programa.Tipo, 
fichas.numero_Ficha , 
`Proyecto`, 
instructores.nombre_Instructor,
`identificacion_Muestra`, 
departamentos.nombre_Departamento,
municipios.nombre_Municipio,
veredas.nombre_Vereda,
fincas.nombre_Finca ,
lotes.nombre_Lote, 
`tipo_Topografia`, 
`profundidad_Muestra`, 
`Humedad`, 
`fuerza_penetracion`, 
`profundidad_Campo`, 
`Norte`, 
`Occidente`,
 `Altura`, 
 `responsable_Toma`, 
 `Empresa`, 
 toma_muestra.correo_Electronico, 
 `Telefono`, 
 `responsable_Recibido`, 
 `Observaciones` FROM `toma_muestra`

INNER JOIN fichas on toma_muestra.id_Ficha=fichas.id_Ficha

INNER JOIN programas on fichas.id_Programa=programas.id_Programa

INNER JOIN tipo_programa on programas.id_Tipo_Programa=tipo_programa.id_Tipo_Programa

INNER JOIN instructores ON toma_muestra.id_Instructor=instructores.id_Instructor

INNER JOIN lotes on toma_muestra.id_Lote=lotes.id_Lote

INNER join fincas on lotes.id_Finca=fincas.id_Finca

INNER join veredas on fincas.id_Vereda=veredas.id_Vereda

INNER join municipios on veredas.id_Municipio=municipios.id_Municipio

INNER join departamentos on municipios.id_Departamento=departamentos.id_Departamento

WHERE identificacion_Muestra LIKE '%$identificacion_Muestra%'
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
<br>
	<br>
<br>
<br>

<strong>Codigo de muestra</strong> - ' . $fila[8] . '
<br>
<br>
<strong>Fecha y hora </strong> ' . $fila[1] . '  (' . $fila[2] . ')
<br>
	<br>


<h2>Datos Basicos</h2>
	<table>
	<thead>

	<tr>
	<th>Programa De Formacion </th>
	<th>Ficha</th>
	<th>Proyecto</th>
	<th>Instructor</th>
	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $fila[3] . ' -' . $fila[4] . '</td>
	<td>' . $fila[5] .  '</td>
	<td>' . $fila[6] .  '</td>
	<td>' . $fila[7] . '</td>


	</tr>
	</thead>
	</table>
	
<h2>Identificacion</h2>
	<table>
	<thead>

	<tr>
	<th>Departamento</th>
	<th>Municipio</th>
	<th>Vereda</th>
	<th>Finca</th>
	<th>Lote</th>
	<th>Topografia</th>
	<th>Profundidad</th>

	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $fila[9] . '</td>
	<td>' . $fila[10] . '</td>
	<td>' . $fila[11] . '</td>
	<td>' . $fila[12] . '</td>
	<td>' . $fila[13] . '</td>
	<td>' . $fila[14] . '</td>
	<td>' . $fila[15] . '</td>

	</tr>
	</thead>
	</table>

<h2>Datos De Campo</h2>
	<table>
	<thead>

	<tr>
	<th>Humedad</th>
	<th>Fuerza Penetracion</th>
	<th>Profundidad Campo</th>
	<th>Norte</th>
	<th>Occidente</th>
	<th>Altura</th>


	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $fila[16] . '</td>
	<td>' . $fila[17] . '</td>
	<td>' . $fila[18] . '</td>
	<td>' . $fila[19] . '</td>
	<td>' . $fila[20] . '</td>
	<td>' . $fila[21] . '</td>


	</tr>
	</thead>
	</table>



<h2>Responsable De La Toma</h2>

	<table>
	<thead>

	<tr>
	<th>Nombre Responsable</th>
	<th>Empresa</th>
	<th>Correo</th>
	<th>Telelfono</th>



	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $fila[22] . '</td>
	<td>' . $fila[23] . '</td>
	<td>' . $fila[24] . '</td>
	<td>' . $fila[25] . '</td>



	</tr>
	</thead>
	</table>



<h2>Responsable De Recibir La Toma</h2>
	<table>
	<thead>

	<tr>
	<th>Nombre Responsable</th>
	<th>Observaciones</th>




	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $fila[26] . '</td>
	<td>' . $fila[27] . '</td>




	</tr>
	</thead>
	</table>
	<b></b>
	<br pagebreak="true" />

	

	';

}

$pdf->SetFont('Helvetica', '', 10);

$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();

$pdf->output('recepcion_muestra (SIE).pdf', 'D');
