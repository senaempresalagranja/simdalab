
<?php
include "conexion.php";
$contrasena=(sha1(sha1($_POST['contrasena'])));
$usuario=$_POST['usuario'];


$res=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='".$usuario."' AND contrasena='$contrasena'")	or die(mysqli_error());
$reg=mysqli_fetch_row($res);
if ($reg==true) {
	echo "<script>


var formulario_login=document.getElementById('formulario_login').submit();
	</script>";
}else{

	echo "<h5 style='transition: all 0.5s ease-in-out;'><i class='fa fa-times'></i> Usuario o Contraseña Invalido</h6>";
}
	
?>