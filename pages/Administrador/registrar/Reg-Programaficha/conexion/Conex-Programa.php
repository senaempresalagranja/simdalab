
<?php

include '../../../../../assets/conexion/conexion.php';

$id_Tipo_Programa=$_POST["id_Tipo_Programa"];
$nombre_Programa=$_POST["nombre_Programa"];




// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
$query="SELECT * FROM `programas` WHERE nombre_Programa='$nombre_Programa' AND id_Tipo_Programa='$id_Tipo_Programa'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {



				// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
			$query="INSERT INTO `programas`(`id_Tipo_Programa`, `nombre_Programa`) 
			VALUES ('$id_Tipo_Programa','$nombre_Programa')"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>

var cerrar_Modal1=document.getElementById('cerrar_Modal1').click();
		
		swal({
        title: 'Registro Exitoso!',
        text: 'Se ha Registrado Un Programa ',
        type: 'success',
        confirmButtonColor: '#238276'
      })

$('#Contenedor_Recargar1').load('Cargar/Cargar-Listado_Programas.php');

$('#Contenedor_Recargar2').load('Cargar/Cargar-Programas.php');

		</script>
";
	
}else{
	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'Registro No Exitoso',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}


}else {
	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'El Programa $nombre_Programa Ya Existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}




 ?>