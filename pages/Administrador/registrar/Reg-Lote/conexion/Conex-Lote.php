

<?php

include '../../../../../assets/conexion/conexion.php';

$id_Finca=$_POST["id_Finca"];
$nombre_Lote=$_POST["nombre_Lote"];
$Tamano=$_POST["Tamano"];


// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
$query="SELECT * FROM `lotes` WHERE nombre_Lote='$nombre_Lote'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {



				// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
			$query="INSERT INTO `lotes`(`id_Finca`, `nombre_Lote`, `Tamano`) 
			VALUES ('$id_Finca','$nombre_Lote','$Tamano')"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>

var cerrar_Modal=document.getElementById('cerrar_Modal').click();
		
		swal({
        title: 'Registro Exitoso!',
        text: 'Se ha Registrado Un Lote ',
        type: 'success',
        confirmButtonColor: '#238276'
      })

$('#Contenedor_Recargar').load('Cargar/Cargar-Lotes.php');

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
  			text: 'El Lote $nombre_Lote Ya Existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}




 ?>