<?php
	

	EliminarRecepcion($_GET['id_Recepcion_Muestra']);

	function EliminarRecepcion($id_Recepcion_Muestra)
	{
		include '../../../../assets/conexion/conexion.php';

		$sentencia="DELETE FROM recepcion_muestra WHERE id_Recepcion_Muestra='".$id_Recepcion_Muestra."' ";

		mysqli_query($conexion, $sentencia) or die (mysqli_error());
	}
?> 

<script type="text/javascript">

	
	alert(" La Recepcion Muestra Fue Eliminada exitosamente");
	window.location.href='Reg-Recepcion_Muestra.php';
	

	
</script>