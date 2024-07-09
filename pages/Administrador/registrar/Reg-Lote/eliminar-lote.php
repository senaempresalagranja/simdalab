<?php
	

	Eliminarlote($_GET['id_Lote']);

	function Eliminarlote($id_Lote)
	{
		include '../../../../assets/conexion/conexion.php';

		$sentencia="DELETE FROM lotes WHERE id_Lote='".$id_Lote."' ";

		mysqli_query($conexion, $sentencia) or die (mysqli_error());
	}
?> 

<script type="text/javascript">

	
	alert("Lote Eliminado exitosamente");
	window.location.href='Reg-lote.php';
	

	
</script>