<?php 

include '../../../../../assets/conexion/conexion.php';
$usuario=$_POST["usuario"];
$rol=$_POST["rol"];
$id_usuario=$_POST["id_usuario"];
$actualizar_contraseña=$_POST["actualizar_contraseña"];
$nombre_usuario=$_POST["nombre_usuario"];
$contraseña=$_POST["contraseña"];
$contraseña=(sha1(sha1($_POST['contraseña'])));

$query="SELECT * FROM `usuarios` WHERE usuarios.Usuario='$usuario' AND usuarios.Id_usuario!=$id_usuario";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
	 echo "<script>
	 		swal({
            title: 'Error!',
            text: 'El Usuario Ya Existe',
            type: 'error',
            confirmButtonColor: '#238276'
        });
        </script>";
}else{


if ($actualizar_contraseña=='true') {


$query="UPDATE `usuarios` SET `rol`='$rol',`nombre_Usuario`='$nombre_usuario',`usuario`='$usuario',`contrasena`='$contraseña' WHERE `id_Usuario`=$id_usuario";
$resource=mysqli_query($conexion,$query);
if ($resource==true) {

echo "<script>

		swal({
  			title: 'Actualización Exitosa',
  			text: 'Acaba De Actualizar Un Usuario',
  			type: 'success',
  			confirmButtonColor: '#238276'
			}).then(function() {
    			 window.location = '../../Reg-usuarios.php';
			 });

	  </script>";
};
}else{

	$query="UPDATE `usuarios` SET `rol`='$rol',`nombre_Usuario`='$nombre_usuario',`usuario`='$usuario' WHERE `id_Usuario`=$id_usuario";
$resource=mysqli_query($conexion,$query);
if ($resource==true) {

echo "<script>

		swal({
  			title: 'Actualización Exitosa',
  			text: 'Acaba De Actualizar Un Usuario',
  			type: 'success',
  			confirmButtonColor: '#238276'
			}).then(function() {
    			 window.location = 'usuarios.php';
			 });

	  </script>";
}
}

}

 ?>