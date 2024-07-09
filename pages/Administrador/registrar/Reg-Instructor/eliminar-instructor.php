<?php
	

	Eliminarinstructor($_GET['id_Instructor']);

	function Eliminarinstructor($id_Instructor)
	{
		include '../../../../assets/conexion/conexion.php';

		$sentencia="DELETE FROM instructores WHERE id_Instructor='".$id_Instructor."' ";

		mysqli_query($conexion, $sentencia) or die (mysqli_error());
	}
?> 

<script type="text/javascript">

	
	alert("instructor Eliminado exitosamente");
	window.location.href='Reg-instructor.php';
	

	
</script>