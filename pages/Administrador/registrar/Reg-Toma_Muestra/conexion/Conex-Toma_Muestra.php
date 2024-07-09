

<?php

include '../../../../../assets/conexion/conexion.php';


$fecha_Toma=$_POST["fecha_Toma"];
$Hora=$_POST["Hora"];
$id_Ficha=$_POST["id_Ficha"];
$Proyecto=$_POST["Proyecto"];
$id_Instructor=$_POST["id_Instructor"];
$identificacion_Muestra=$_POST["identificacion_Muestra"];
$id_Lote=$_POST["id_Lote"];
$tipo_Topografia=$_POST["tipo_Topografia"];
$profundidad_Muestra=$_POST["profundidad_Muestra"];
$Humedad=$_POST["Humedad"];
$fuerza_penetracion=$_POST["fuerza_penetracion"];
$profundidad_Campo=$_POST["profundidad_Campo"];
$Norte=$_POST["Norte"];
$Occidente=$_POST["Occidente"];
$Altura=$_POST["Altura"];
$responsable_Toma=$_POST["responsable_Toma"];
$Empresa=$_POST["Empresa"];
$correo_Electronico=$_POST["correo_Electronico"];
$Telefono=$_POST["Telefono"];
$responsable_Recibido=$_POST["responsable_Recibido"];
$Observaciones=$_POST["Observaciones"];





// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
$query="SELECT * FROM `toma_muestra` WHERE identificacion_Muestra='$identificacion_Muestra'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {



				// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
			$query="INSERT INTO `toma_muestra`(`fecha_Toma`, `Hora`, `id_Ficha`, `Proyecto`, `id_Instructor`, `identificacion_Muestra`, `id_Lote`, `tipo_Topografia`, `profundidad_Muestra`, `Humedad`, `fuerza_penetracion`, `profundidad_Campo`, `Norte`, `Occidente`, `Altura`, `responsable_Toma`, `Empresa`, `correo_Electronico`, `Telefono`, `responsable_Recibido`, `Observaciones`) 

			VALUES ('$fecha_Toma','$Hora','$id_Ficha','$Proyecto','$id_Instructor','$identificacion_Muestra','$id_Lote','$tipo_Topografia','$profundidad_Muestra','$Humedad','$fuerza_penetracion','$profundidad_Campo','$Norte','$Occidente','$Altura','$responsable_Toma','$Empresa','$correo_Electronico','$Telefono','$responsable_Recibido','$Observaciones')"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>


		
		swal({
        title: 'Registro Exitoso!',
        text: 'Se ha Registrado Una Toma De Muestra ',
        type: 'success',
        confirmButtonColor: '#238276'
      })

$('#Contenedor_Recargar').load('Cargar/Cargar-Toma_Muestra.php');

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
  			text: 'La Toma De Muestra $fecha_Toma Ya Existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}




 ?>