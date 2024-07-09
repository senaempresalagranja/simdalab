<?php
	

	EliminarTomaMuestra($_GET['id_Toma_Muestra']);

	function EliminarTomaMuestra($id_Toma_Muestra)
	{
		include '../../../../assets/conexion/conexion.php';

		$sentencia="DELETE FROM toma_muestra WHERE id_Toma_Muestra='".$id_Toma_Muestra."' ";

		mysqli_query($conexion, $sentencia) or die (mysqli_error());
	}
?> 

<script type="text/javascript">

	
	alert(" La Toma Muestra Fue Eliminada exitosamente");
	window.location.href='Reg-Toma_Muestra.php';
	

	
</script>