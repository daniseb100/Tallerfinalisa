<?php
include '../../config/conexion.php';
$conexion = mysqli_connect($bd_servidor, $bd_usuario, $bd_clave, $bd_base);
$sql = "DELETE FROM `seg_usuarios`  WHERE `id_user` = " . $_POST['id'];
echo mysqli_query($conexion, $sql);
mysqli_close($conexion);
