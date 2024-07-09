<?php 

$id_Vereda=$_POST["id_Vereda"];


 ?>
<label class="form-control-label" for="id_Finca">Finca</label>
<select class="form-control" id="id_Finca" onclick="mostrar_lote()">
	
<option value="Selecciona">Selecciona Finca</option>


<?php 


include '../../../../assets/conexion/conexion.php';


$conexion->set_charset('utf8');
$query="SELECT * FROM `fincas` WHERE `id_Vereda`=$id_Vereda";
$resource=mysqli_query($conexion,$query);
while ($fila=mysqli_fetch_row($resource)) {
echo"<option value= '$fila[0]' >$fila[2]</option>";
 }



 ?>
</select>

<script>


function mostrar_lote() {
var id_Finca=document.getElementById('id_Finca').value;

$("#contenedor_lote").load("../mostrar/Most_lote.php",{id_Finca:id_Finca})

}

</script>