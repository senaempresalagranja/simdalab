<?php

include '../../../../../assets/conexion/conexion.php';

$id_Programa=$_POST["id_Programa"];
$numero_Ficha=$_POST["numero_Ficha"];




// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
$query="SELECT * FROM `fichas` WHERE numero_Ficha='$numero_Ficha'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {



				// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
			$query="INSERT INTO `fichas`(`id_Programa`, `numero_Ficha`) 
			VALUES ('$id_Programa','$numero_Ficha')"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>


var cerrar_Modal1=document.getElementById('cerrar_Modal2').click();		

		swal({
        title: 'Registro Exitoso!',
        text: 'Se ha Registrado Una Ficha ',
        type: 'success',
        confirmButtonColor: '#238276'
      })

$('#Contenedor_Recargar3').load('Cargar/Cargar-Fichas.php');

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
  			text: 'La Ficha $numero_Ficha Ya Existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}




 ?>