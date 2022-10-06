<?php
include '../../config/conexion.php';
$conexion = mysqli_connect($bd_servidor, $bd_usuario, $bd_clave, $bd_base);
$apellido1 = $_POST['txtApe1user'];
$apellido2 = $_POST['txtApe2user'];
$nombre1 = $_POST['txtNomb1user'];
$nombre2 = $_POST['txtNomb2user'];
$correo = $_POST['mailuser'];
$login = $_POST['txtlogin'];
$rol = $_POST['slcRolUser'];
$sql = "UPDATE `seg_usuarios` SET `apellido1` = '$apellido1', `apellido2` = '$apellido2', `nombre1` = '$nombre1', `nombre2` = '$nombre2', `correo` = '$correo', `login` = '$login', `rol`='$rol' WHERE `id_user` = " . $_POST['id'];
echo mysqli_query($conexion, $sql);
mysqli_close($conexion);
