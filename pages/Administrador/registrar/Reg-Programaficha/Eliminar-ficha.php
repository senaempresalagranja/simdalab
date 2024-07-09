<?php
	

	EliminarFicha($_GET['id_Ficha']);

	function EliminarFicha($id_Ficha)
	{
		include '../../../../assets/conexion/conexion.php';

		$sentencia="DELETE FROM fichas WHERE id_Ficha='".$id_Ficha."' ";

		mysqli_query($conexion, $sentencia) or die (mysqli_error());
	}
?> 

<script type="text/javascript">

	
	alert("Ficha Eliminada");
	window.location.href='Reg-Programa_Ficha.php';
	

	
</script>