<?php
	

	EliminarAnalisis($_GET['id_Analisis_Muestra']);

	function EliminarAnalisis($id_Analisis_Muestra)
	{
		include '../../../../assets/conexion/conexion.php';

		$sentencia="DELETE FROM analisis_muestra WHERE id_Analisis_Muestra='".$id_Analisis_Muestra."' ";

		mysqli_query($conexion, $sentencia) or die (mysqli_error());
	}
?> 

<script type="text/javascript">

	
	alert("El Analisis Fue Eliminado exitosamente");
	window.location.href='Reg-Analisis_Muestra.php';
	

	
</script>