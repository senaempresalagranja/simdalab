

<?php

include '../../../../../assets/conexion/conexion.php';

$numero_Documento=$_POST["numero_Documento"];
$nombre_Instructor=$_POST["nombre_Instructor"];
$Correo_Electronico=$_POST["Correo_Electronico"];



// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
$query="SELECT * FROM `instructores` WHERE numero_Documento='$numero_Documento'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {



		
			$query="INSERT INTO `instructores`(`numero_Documento`, `nombre_Instructor`, `Correo_Electronico`) 
			 
			VALUES ('$numero_Documento','$nombre_Instructor','$Correo_Electronico')"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>


var cerrar_Modal=document.getElementById('cerrar_Modal').click();	

		swal({
        title: 'Registro Exitoso!',
        text: 'Se ha Registrado Un Instructor ',
        type: 'success',
        confirmButtonColor: '#238276'
      })
      
$('#Contenedor_Recargar').load('Cargar/Cargar-Instructores.php');


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
  			text: 'El Lote $numero_Documento Ya Existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}




 ?>