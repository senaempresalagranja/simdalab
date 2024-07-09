<?php 

$id_Municipio=$_POST["id_Municipio"];


 ?>
<label class="form-control-label" for="id_Vereda">Vereda</label>
<select class="form-control" id="id_Vereda" onclick="mostrar_finca()">
	
<option value="Selecciona">Selecciona Vereda</option>


<?php 


include '../../../../assets/conexion/conexion.php';


$conexion->set_charset('utf8');
$query="SELECT * FROM `veredas` WHERE `id_Municipio`=$id_Municipio";
$resource=mysqli_query($conexion,$query);
while ($fila=mysqli_fetch_row($resource)) {
echo"<option value= '$fila[0]' >$fila[2]</option>";
 }




 ?>
</select>

<script>


function mostrar_finca() {
var id_Vereda=document.getElementById('id_Vereda').value;

$("#contenedor_finca").load("../mostrar/Most_finca.php",{id_Vereda:id_Vereda})

}

</script>