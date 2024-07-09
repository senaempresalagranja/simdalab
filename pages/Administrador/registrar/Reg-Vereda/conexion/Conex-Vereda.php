

<?php

include '../../../../../assets/conexion/conexion.php';

$id_Municipio=$_POST["id_Municipio"];
$nombre_Vereda=$_POST["nombre_Vereda"];




// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
$query="SELECT * FROM `veredas` WHERE nombre_Vereda='$nombre_Vereda'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {



				// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
			$query="INSERT INTO `veredas`(`id_Municipio`, `nombre_Vereda`) 
			VALUES ('$id_Municipio','$nombre_Vereda')"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>

var cerrar_Modal=document.getElementById('cerrar_Modal').click();
		
		swal({
        title: 'Registro Exitoso!',
        text: 'Se ha Registrado Una Vereda ',
        type: 'success',
        confirmButtonColor: '#238276'
      })

$('#Contenedor_Recargar').load('Cargar/Cargar-Veredas.php');

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
  			text: 'La Vereda $nombre_Vereda Ya Existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}




 ?>