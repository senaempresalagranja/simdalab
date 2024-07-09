

<?php

include '../../../../../assets/conexion/conexion.php';

$Fecha=$_POST["Fecha"];
$Hora=$_POST["Hora"];
$id_Toma_Muestra=$_POST["id_Toma_Muestra"];
$Humedad=$_POST["Humedad"];
$Textura=$_POST["Textura"];
$ph_Muestra=$_POST["ph_Muestra"];

$densidad_Aderente=$_POST["densidad_Aderente"];
$densidad_Real=$_POST["densidad_Real"];

$porosidad=$_POST["porosidad"];

$retencion_Humedad=$_POST["retencion_Humedad"];

$distrubucion_tamanos=$_POST["distrubucion_tamanos"];
$cationes_Intercambiables=$_POST["cationes_Intercambiables"];
$elementos_Menores=$_POST["elementos_Menores"];

$materia_Organica=$_POST["materia_Organica"];
$carbono_organico=$_POST["carbono_organico"];
$CIC=$_POST["CIC"];
$Otros=$_POST["Otros"];

$muestra_Entregada_Por=$_POST["muestra_Entregada_Por"];
$muestra_Recibida_Por=$_POST["muestra_Recibida_Por"];
$Observaciones=$_POST["Observaciones"];


// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
$query="SELECT * FROM `recepcion_muestra` WHERE Fecha='$Fecha'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {


				// $conexion=mysqli_connect($local,$usuario,$contra,$bd  VALUES ('$id_Finca','$nombre_Lote','$Tamano')"; );
			$query="INSERT INTO `recepcion_muestra`(`Fecha`, `Hora`, `id_Toma_Muestra`, `Humedad`, `Textura`, `ph_Muestra`, `densidad_Aderente`, `densidad_Real`, `porosidad`, `retencion_Humedad`, `distrubucion_tamanos`, `cationes_Intercambiables`, `elementos_Menores`, `materia_Organica`, `carbono_organico`, `CIC`, `Otros`, `muestra_Entregada_Por`, `muestra_Recibida_Por`, `Observaciones`) 
			VALUES ('$Fecha','$Hora','$id_Toma_Muestra','$Humedad','$Textura','$ph_Muestra','$densidad_Aderente','$densidad_Real','$porosidad','$retencion_Humedad','$distrubucion_tamanos','$cationes_Intercambiables','$elementos_Menores','$materia_Organica','$carbono_organico','$CIC','$Otros','$muestra_Entregada_Por','$muestra_Recibida_Por','$Observaciones')"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>


		
		swal({
        title: 'Registro Exitoso!',
        text: 'Se ha Registrado Una Recepcion ',
        type: 'success',
        confirmButtonColor: '#238276'
      })


$('#Contenedor_Recargar').load('cargar/Cargar-Recepcion_Muestra.php');

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
  			text: 'Recepcion de la fecha $Fecha Ya Existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}




 ?>