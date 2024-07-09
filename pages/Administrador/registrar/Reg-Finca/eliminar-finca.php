<?php
	

	Eliminarfinca($_GET['id_Finca']);

	function Eliminarfinca($id_Finca)
	{
		include '../../../../assets/conexion/conexion.php';

		$sentencia="DELETE FROM fincas WHERE id_Finca='".$id_Finca."' ";

		mysqli_query($conexion, $sentencia) or die (mysqli_error());
	}
?> 

<script type="text/javascript">

	
	alert("finca Eliminada exitosamente");
	window.location.href='Reg-Finca.php';
	

	
</script>