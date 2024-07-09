<?php 


include '../../../../../assets/conexion/conexion.php';
 

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

-- AND fecha_Toma LIKE '%identificacion_Muestra%' 
-- AND fichas.numero_Ficha LIKE '%fichas%' 
-- AND programas.nombre_Programa LIKE '%$nombre_Programa%'
-- AND fichas.numero_Ficha LIKE '%$fichas%'
";
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
	
	<tr> 

<td class='col-xs-1'><?php echo $fila[1] ?></td>
<td class='col-xs-1'><?php echo $fila[2] ?></td>
<td class='col-xs-2'><?php echo $fila[8] ?></td>
<td class='col-xs-3'><?php echo $fila[3] ?> - <?php echo $fila[4] ?></td>
<td class='col-xs-1'><?php echo $fila[5] ?></td>
<td class='col-xs-2'><?php echo $fila[7] ?></td>

<td class='col-xs-2'>
  <form action="mostrar/mostrar-toma.php">
    <button class='btn btn-primary icon-btn' type='submit' name="id" value="<?php echo $fila[0] ?>"><i class='fa fa-eye'></i>Ver más</button>	
    <input type='hidden' name='id' value=' <?php echo $fila[0] ?>'>	
  </form></td>

          </tr>




	<?php 
}
	 ?>