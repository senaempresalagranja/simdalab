<?php
	

	Eliminarvereda($_GET['id_Vereda']);

	function Eliminarvereda($id_Vereda)
	{
		include '../../../../assets/conexion/conexion.php';

		$sentencia="DELETE FROM veredas WHERE id_Vereda='".$id_Vereda."' ";

		mysqli_query($conexion, $sentencia) or die (mysqli_error());
	}
?> 

<script type="text/javascript">

	
	alert("Vereda Eliminado exitosamente");
	window.location.href='Reg-Vereda.php';
	

	
</script>