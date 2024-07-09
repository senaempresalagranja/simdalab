<?php 


include '../../../../../assets/conexion/conexion.php';
 
$Fecha=$_POST["Fecha"];
$id_Toma_Muestra=$_POST["id_Toma_Muestra"];
$Hora=$_POST["Hora"];



$query="SELECT `id_Recepcion_Muestra`, `Fecha`, recepcion_muestra.Hora, toma_muestra.identificacion_Muestra, recepcion_muestra.Humedad, `Textura`, `ph_Muestra`, `densidad_Aderente`, `densidad_Real`, `porosidad`, `retencion_Humedad`, `distrubucion_tamanos`, `cationes_Intercambiables`, `elementos_Menores`, `materia_Organica`, `CIC`, `Otros`, `muestra_Entregada_Por`, `muestra_Recibida_Por`, recepcion_muestra.Observaciones FROM `recepcion_muestra` 
          INNER JOIN toma_muestra on recepcion_muestra.id_Toma_Muestra=toma_muestra.id_Toma_Muestra 

WHERE Fecha LIKE '%$Fecha%'
AND toma_muestra.identificacion_Muestra LIKE '%$id_Toma_Muestra%' 
-- AND municipios.nombre_Municipio LIKE '%$municipio%'
-- AND departamentos.nombre_Departamento LIKE '%$nombre_Departamento%'
";
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
	
	<tr> 

<td class='col-xs-3'><?php echo $fila[1] ?></td>
<td class='col-xs-3'><?php echo $fila[2] ?></td>
<td class='col-xs-3'><?php echo $fila[3] ?></td>

<td class='col-xs-3'>
  <form action="mostrar/most-recepcion.php">
    <button class='btn btn-primary icon-btn' type='submit' name="id" value="<?php echo $fila[0] ?>"><i class='fa fa-eye'></i>Ver más</button>	
    <input type='hidden' name='id' value=' <?php echo $fila[0] ?>'>	
  </form></td>

          </tr>




	<?php 
}
	 ?>