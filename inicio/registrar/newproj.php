<?php
include '../../config/conexion.php';
$conexion = mysqli_connect($bd_servidor, $bd_usuario, $bd_clave, $bd_base);
$date
$sql = "INSERT INTO `tb_proyectos` ( `id_estudiante`,  `ruta`,  `nombre_file`,  `nom_proyecto`,  `modalidad`,  `fecha`,  `nota`, `observaciones`,`estado`)
        VALUES ('" . $_POST['txtApe1user'] . "', '" . $_POST['txtApe2user'] . "', '" . $_POST['txtNomb1user'] . "', '" . $_POST['txtNomb2user'] . "', '" . $_POST['mailuser'] . "', '" . $_POST['txtlogin'] . "', '" . $_POST['passu'] . "', '" . $_POST['slcRolUser'] . "')";
echo mysqli_query($conexion, $sql);
mysqli_close($conexion);