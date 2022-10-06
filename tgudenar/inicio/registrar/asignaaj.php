<?php
include '../../config/conexion.php';
$conexion = mysqli_connect($bd_servidor, $bd_usuario, $bd_clave, $bd_base);
$sql = "INSERT INTO `tb_asigana_aj`( `id_docente`, `id_proyecto`, `rol_proyect`) VALUES ('" . $_POST['slcDocente'] . "', '" . $_POST['id'] . "', '" . $_POST['slcRol'] . "')";
if (mysqli_query($conexion, $sql) == 1) {
        echo "1";
} else {
        echo mysqli_error($conexion);
}
mysqli_close($conexion);
