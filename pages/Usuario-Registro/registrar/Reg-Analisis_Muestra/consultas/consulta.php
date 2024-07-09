
<?php 

	$obj=new crud();
	echo json_encode($obj->obtener($_POST['selecion']));
	
	class crud
	{
		
		public function obtener($idToma){
		include '../../../../../assets/conexion/conexion.php';
		$sql = "SELECT densidad_Real, densidad_Aderente, porosidad, Textura, carbono_organico, materia_Organica, ph_Muestra   from recepcion_muestra WHERE recepcion_muestra.id_Recepcion_Muestra = '$idToma' order by densidad_Real, densidad_Aderente, porosidad, Textura, carbono_organico, materia_Organica, ph_Muestra DESC limit 1";
		$result = mysqli_query($conexion, $sql);
		$ver = mysqli_fetch_row($result);
		$datos= array(
			'densidadR'=>$ver[0], 
			'densidadA'=>$ver[1],
			'porosi'=>$ver[2],
			'textu'=>$ver[3],
			'Corganico'=>$ver[4],
			'Morganica'=>$ver[5],
			'pH'=>$ver[6]);
		return $datos;
		}
	
	}
	
 ?>