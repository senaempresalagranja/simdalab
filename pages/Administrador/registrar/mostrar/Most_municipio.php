<?php 

$id_Departamento=$_POST["id_Departamento"];


 ?>
<label class="form-control-label" for="id_Municipio">Municipio</label>
<select id="id_Municipio" class="form-control"   onchange="mostrar_vereda()">
	
<option value="Selecciona" selected="selected">Selecciona Municipio</option>


<?php 


include '../../../../assets/conexion/conexion.php';
 

$conexion->set_charset('utf8');
$query="SELECT * FROM `municipios` WHERE `id_Departamento`=$id_Departamento";
$resource=mysqli_query($conexion,$query);
while ($fila=mysqli_fetch_row($resource)) {
echo"<option value= '$fila[0]' onclick='mostrar_vereda()'>$fila[2]</option>";
 }

echo "</select>";
 ?>


<script>


function mostrar_vereda() {
var id_Municipio=document.getElementById('id_Municipio').value;

$("#contenedor_vereda").load("../mostrar/Most_vereda.php",{id_Municipio:id_Municipio})

}

</script>