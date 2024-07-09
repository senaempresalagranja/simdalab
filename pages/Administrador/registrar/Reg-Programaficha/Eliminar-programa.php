<?php
	

	EliminarPrograma($_GET['id_Programa']);

	function EliminarPrograma($id_Programa)
	{
		include '../../../../assets/conexion/conexion.php';

		$sentencia="DELETE FROM programas WHERE id_Programa='".$id_Programa."' ";

		mysqli_query($conexion, $sentencia) or die (mysqli_error());
	}
?> 

<script type="text/javascript">

	
	alert("Programa Eliminado exitosamente");
	window.location.href='Reg-Programa_Ficha.php';
	

	
</script>