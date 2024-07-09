<?php 


include '../../../../../assets/conexion/conexion.php';
 
$Fecha=$_POST["Fecha"];
$id_Toma_Muestra=$_POST["id_Toma_Muestra"];
$id_Finca=$_POST["id_Finca"];




$query="SELECT 
          `id_Analisis_Muestra`,
 analisis_muestra.Fecha, 
    toma_muestra.identificacion_Muestra, 
 `ws`,
 `wa`,
 `wsw`,
 `ww`,
 `dw`,
 `t_Grados`,
 `Resul_mg_l`,
 `Pss`,
 `Pssp`,
 `Vd`,
 `Resul_a`,
 `factor_Correcion_T1`,
 `temperatura_1`,
 `densidad_1`,
 `peso_Muestra_1`,
 `Resul_3`,
 `factor_Correcion_T2`,
 `temperatura_2`,
 `densidad_2`,
 `peso_Muestra_2`,
 `Resul_4`,
 `arena`,
 `arcilla`,
 `Resul_5`,
 analisis_muestra.Textura, 
 `CarbonO`,
 `Resul_c`,
 `pH_Calcular`,
 `temperaturaPh`,
 `VolumenM`,
 `VolumenB`,
 `PesoM`,
 `NormalidadT`,
 `Resul_6`,
 `densi_real`,
 `densi_apa`,
 `resul_porosidad`, 
 fincas.codigoFinca FROM `analisis_muestra`
           INNER JOIN recepcion_muestra on analisis_muestra.id_Recepcion_Muestra=recepcion_muestra.id_Recepcion_Muestra 
           INNER join toma_muestra on recepcion_muestra.id_Toma_Muestra=toma_muestra.id_Toma_Muestra
           INNER JOIN lotes on toma_muestra.id_Lote=lotes.id_Lote
  
           INNER JOIN fincas on lotes.id_Finca=fincas.id_Finca

WHERE  analisis_muestra.Fecha LIKE '%$Fecha%'
AND toma_muestra.identificacion_Muestra LIKE '%$id_Toma_Muestra%' 
AND fincas.codigoFinca LIKE '%$id_Finca%'
-- AND departamentos.nombre_Departamento LIKE '%$nombre_Departamento%'
 ORDER BY `analisis_muestra`.`id_Analisis_Muestra` DESC ";
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
	
	<tr> 

<td class='col-xs-3'><?php echo $fila[40] ?></td>
<td class='col-xs-3'><?php echo $fila[2] ?></td>
<td class='col-xs-3'><?php echo $fila[1] ?></td>

<td class='col-xs-3'>
  <form action="mostrar/most-analisis.php">
    <button class='btn btn-primary icon-btn' type='submit' name="id" value="<?php echo $fila[0] ?>"><i class='fa fa-eye'></i>Ver más</button>	
    <input type='hidden' name='id' value=' <?php echo $fila[0] ?>'>	
  </form></td>

          </tr>




	<?php 
}
	 ?>