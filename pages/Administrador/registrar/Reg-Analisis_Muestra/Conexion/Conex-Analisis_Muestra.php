

<?php

include '../../../../../assets/conexion/conexion.php';

$Fecha=$_POST["Fecha"];
$id_Recepcion_Muestra=$_POST["id_Recepcion_Muestra"];
$id_Toma_recepcion=$_POST["id_Toma_recepcion"];
$ws=$_POST["ws"];
$wa=$_POST["wa"];
$wsw=$_POST["wsw"];
$ww=$_POST["ww"];
$dw=$_POST["dw"];
$t_Grados=$_POST["t_Grados"];
$Resul_mg_l=$_POST["Resul_mg_l"];


$Pss=$_POST["Pss"];
$Pssp=$_POST["Pssp"];
$Vd=$_POST["Vd"];
$Resul_a=$_POST["Resul_a"];


$factor_Correcion_T1=$_POST["factor_Correcion_T1"];
$peso_Muestra_1=$_POST["peso_Muestra_1"];
$temperatura_1=$_POST["temperatura_1"];
$densidad_1=$_POST["densidad_1"];
$Resul_3=$_POST["Resul_3"];


$factor_Correcion_T2=$_POST["factor_Correcion_T2"];
$temperatura_2=$_POST["temperatura_2"];
$densidad_2=$_POST["densidad_2"];
$peso_Muestra_2=$_POST["peso_Muestra_2"];
$Resul_4=$_POST["Resul_4"];

$arena=$_POST["arena"];
$arcilla=$_POST["arcilla"];
$Resul_5=$_POST["Resul_5"];
$Textura=$_POST["Textura"];

$CarbonO=$_POST["CarbonO"];
$Resul_c=$_POST["Resul_c"];
$pH_Calcular=$_POST["pH_Calcular"];
$temperaturaPh=$_POST["temperaturaPh"];

$VolumenM=$_POST["VolumenM"];
$VolumenB=$_POST["VolumenB"];
$PesoM=$_POST["PesoM"];
$NormalidadT=$_POST["NormalidadT"];
$Resul_6=$_POST["Resul_6"];

$densi_real=$_POST["densi_real"];
$densi_apa=$_POST["densi_apa"];
$resul_porosidad=$_POST["resul_porosidad"];







  if ($_POST['Fecha']== ""): $Fecha="No Se Analizo"; endif;
  if ($_POST['id_Recepcion_Muestra']== ""): $id_Recepcion_Muestra="No Se Analizo"; endif;
  if ($_POST['id_Toma_recepcion']== ""): $id_Toma_recepcion="No Se Analizo"; endif;
  if ($_POST['ws']== ""): $ws="No Se Analizo"; endif;
  if ($_POST['wa']== ""): $wa="No Se Analizo"; endif;
  if ($_POST['wsw']== ""): $wsw="No Se Analizo"; endif;
  if ($_POST['ww']== ""): $ww="No Se Analizo"; endif;
  if ($_POST['dw']== ""): $dw="No Se Analizo"; endif;
  if ($_POST['t_Grados']== ""): $t_Grados="No Se Analizo"; endif;
  if ($_POST['Resul_mg_l']== ""): $Resul_mg_l="No Se Analizo"; endif;
  if ($_POST['Pss']== ""): $Pss="No Se Analizo"; endif;
  if ($_POST['Pssp']== ""): $Pssp="No Se Analizo"; endif;
  if ($_POST['Vd']== ""): $Vd="No Se Analizo"; endif;
  if ($_POST['Resul_a']== ""): $Resul_a="No Se Analizo"; endif;
  if ($_POST['factor_Correcion_T1']== ""): $factor_Correcion_T1="No Se Analizo"; endif;
  if ($_POST['peso_Muestra_1']== ""): $peso_Muestra_1="No Se Analizo"; endif;
  if ($_POST['temperatura_1']== ""): $temperatura_1="No Se Analizo"; endif;
  if ($_POST['densidad_1']== ""): $densidad_1="No Se Analizo"; endif;
  if ($_POST['Resul_3']== ""): $Resul_3="No Se Analizo"; endif;
  if ($_POST['factor_Correcion_T2']== ""): $factor_Correcion_T2="No Se Analizo"; endif;
  if ($_POST['temperatura_2']== ""): $temperatura_2="No Se Analizo"; endif;
  if ($_POST['densidad_2']== ""): $densidad_2="No Se Analizo"; endif;
  if ($_POST['peso_Muestra_2']== ""): $peso_Muestra_2="No Se Analizo"; endif;
  if ($_POST['Resul_4']== ""): $Resul_4="No Se Analizo"; endif;
  if ($_POST['arena']== ""): $arena="No Se Analizo"; endif;
  if ($_POST['arcilla']== ""): $arcilla="No Se Analizo"; endif;
  if ($_POST['Resul_5']== ""): $Resul_5="No Se Analizo"; endif;
  if ($_POST['Textura']== ""): $Textura="No Se Analizo"; endif;
  if ($_POST['CarbonO']== ""): $CarbonO="No Se Analizo"; endif;
  if ($_POST['Resul_c']== ""): $Resul_c="No Se Analizo"; endif;
  if ($_POST['pH_Calcular']== ""): $pH_Calcular="No Se Analizo"; endif;
  if ($_POST['temperaturaPh']== ""): $temperaturaPh="No Se Analizo"; endif;
  if ($_POST['VolumenM']== ""): $VolumenM="No Se Analizo"; endif;
  if ($_POST['VolumenB']== ""): $VolumenB="No Se Analizo"; endif;
  if ($_POST['PesoM']== ""): $PesoM="No Se Analizo"; endif;
  if ($_POST['NormalidadT']== ""): $NormalidadT="No Se Analizo"; endif;
  if ($_POST['Resul_6']== ""): $Resul_6="No Se Analizo"; endif;
  if ($_POST['densi_real']== ""): $densi_real="No Se Analizo"; endif;
  if ($_POST['densi_apa']== ""): $densi_apa="No Se Analizo"; endif;
  if ($_POST['resul_porosidad']== ""): $resul_porosidad="No Se Analizo"; endif;





// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
$query="SELECT * FROM `analisis_muestra` WHERE Fecha='$Fecha'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {
// ('$Fecha','$id_Recepcion_Muestra','$ws','$wa','$wsw','$ww','$dw','$t_Grados','$Resul_mg_l','$Pss','$Pssp','$Vd','$Resul_a','$factor_Correcion_T1', '$temperatura_1', '$densidad_1','$peso_Muestra_1','$Resul_3','$factor_Correcion_T2', '$temperatura_2', '$densidad_2', '$peso_Muestra_2','$Resul_4', '$arena', '$arcilla','$Resul_5','$Textura','$CarbonO','$Resul_c','$pH_Calcular','$temperaturaPh','$VolumenM', '$VolumenB', '$PesoM', '$NormalidadT', '$Resul_6', '$densi_real', '$densi_apa', '$resul_porosidad')

                    // $conexion=mysqli_connect($local,$usuario,$contra,$bd  VALUES ('$$id_Finca','$$nombre_Lote','$Tamano')"; );

               $query="INSERT INTO `analisis_muestra`(`Fecha`, `id_Recepcion_Muestra`, `ws`, `wa`, `wsw`, `ww`,`dw`, `t_Grados`, `Resul_mg_l`, `Pss`, `Pssp`, `Vd`, `Resul_a`, `factor_Correcion_T1`, `peso_Muestra_1`, `temperatura_1`, `densidad_1`, `Resul_3`, `factor_Correcion_T2`, `peso_Muestra_2`, `temperatura_2`, `densidad_2`, `Resul_4`, `arena`, `arcilla`, `Resul_5`, `Textura`, `CarbonO`, `Resul_c`, `pH_Calcular`, `temperaturaPh`, `VolumenM`, `VolumenB`, `PesoM`, `NormalidadT`, `Resul_6`, `densi_real`, `densi_apa`, `resul_porosidad`)

                VALUES ('$Fecha','$id_Recepcion_Muestra','$ws','$wa','$wsw','$ww','$dw','$t_Grados','$Resul_mg_l','$Pss','$Pssp','$Vd','$Resul_a','$factor_Correcion_T1','$temperatura_1','$densidad_1','$peso_Muestra_1','$Resul_3','$factor_Correcion_T2','$temperatura_2','$densidad_2','$peso_Muestra_2','$Resul_4', '$arena', '$arcilla','$Resul_5','$Textura','$CarbonO','$Resul_c','$pH_Calcular' ,'$temperaturaPh','$VolumenM', '$VolumenB', '$PesoM', '$NormalidadT', '$Resul_6','$densi_real','$densi_apa','$resul_porosidad')";      

               $resource=mysqli_query($conexion,$query);   


if ($resource==true) {
echo "<script>


          
          swal({
        title: 'Registro Exitoso!',
        text: 'Se ha Registrado Un Analisis ',
        type: 'success',
        confirmButtonColor: '#238276'
      })
      
$('#Contenedor_Recargar').load('Cargar/Cargar-Analisis_Muestra.php');


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
               text: 'Este analisis con la Fecha $Fecha Ya Existe',
               type: 'error',
               confirmButtonColor: '#238276'
               })

       </script>";
}




 ?>