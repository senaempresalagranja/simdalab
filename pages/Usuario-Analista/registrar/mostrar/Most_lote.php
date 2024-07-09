<?php 

$id_Finca=$_POST["id_Finca"];


 ?>
<label class="form-control-label" for="id_Lote">Lote</label>
<select class="form-control" id="id_Lote">
	
<option value="Selecciona">Selecciona Lote</option>


<?php 


include '../../../../assets/conexion/conexion.php';


$conexion->set_charset('utf8');
$query="SELECT * FROM `lotes` WHERE `id_Finca`=$id_Finca";
$resource=mysqli_query($conexion,$query);
while ($fila=mysqli_fetch_row($resource)) {
echo"<option value= '$fila[0]' >$fila[2]</option>";
 }




 ?>
</select>
