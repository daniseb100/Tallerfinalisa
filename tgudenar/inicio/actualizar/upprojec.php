<?php
include '../../config/conexion.php';
$conexion = mysqli_connect($bd_servidor, $bd_usuario, $bd_clave, $bd_base);
$nota = $_POST['numNota'];
$observa = $_POST['observaciones'];
if ($nota > 0) {
    $sql = "UPDATE `tb_proyectos` SET `nota` = '$nota', `observaciones` = '$observa' WHERE `id_proyect` = " . $_POST['id'];
} else {
    $sql = "UPDATE `tb_proyectos` SET `observaciones` = '$observa' WHERE `id_proyect` = " . $_POST['id'];
}
if (mysqli_query($conexion, $sql) == 1) {
    echo "1";
} else {
    echo mysqli_error($conexion);
}
mysqli_close($conexion);
