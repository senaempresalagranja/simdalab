<?php 

$id_Programa=$_POST["id_Programa"];


 ?>
<label class="form-control-label" for="id_Ficha">Ficha</label>
<select class="form-control" id="id_Ficha"  >
	
<option value="Selecciona">Selecciona Ficha</option>


<?php 


include '../../../../assets/conexion/conexion.php';


$conexion->set_charset('utf8');
$query="SELECT * FROM `fichas` WHERE `id_Programa`=$id_Programa";
$resource=mysqli_query($conexion,$query);
while ($fila=mysqli_fetch_row($resource)) {
echo"<option value= '$fila[0]' onclick='mostrar_vereda()'>$fila[2]</option>";
 }

 ?>
</select>

