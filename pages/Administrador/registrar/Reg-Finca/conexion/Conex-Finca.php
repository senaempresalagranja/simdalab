

<?php

include '../../../../../assets/conexion/conexion.php';

$id_Vereda=$_POST["id_Vereda"];
$nombre_Finca=$_POST["nombre_Finca"];
$Tamano=$_POST["Tamano"];
$numero_Telefono=$_POST["numero_Telefono"];
$correo_Electronico=$_POST["correo_Electronico"];
$codigoFinca=$_POST["codigoFinca"];


// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
$query="SELECT * FROM `fincas` WHERE nombre_Finca='$nombre_Finca' AND id_Vereda='$id_Vereda'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {



				// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
	$query="INSERT INTO `fincas`(`id_Vereda`, `nombre_Finca`, `Tamano`, `numero_Telefono`, `correo_Electronico`, `codigoFinca`) 
						 VALUES ('$id_Vereda','$nombre_Finca','$Tamano','$numero_Telefono','$correo_Electronico','$codigoFinca')"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>

var cerrar_Modal=document.getElementById('cerrar_Modal').click();
		
		swal({
        title: 'Registro Exitoso!',
        text: 'Se ha Registrado Una Finca ',
        type: 'success',
        confirmButtonColor: '#238276'
      })

$('#Contenedor_Recargar').load('Cargar/Cargar-Fincas.php');

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
  			text: 'El Lote $nombre_Finca Ya Existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}




 ?>