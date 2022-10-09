<?php
session_start();
include '../../../config/conexion.php';
$conexion = mysqli_connect($bd_servidor, $bd_usuario, $bd_clave, $bd_base);
$response = '';
if ($_SESSION['rol'] == '1') {
    $sql = 'SELECT *
            FROM
                `tb_proyectos`
                INNER JOIN `seg_usuarios` 
                    ON (`tb_proyectos`.`id_estudiante` = `seg_usuarios`.`id_user`)';
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows > 0) {
        $response .=
            '<h5 class= "text-center">PROYECTOS</h5>' .
            '<table class="table table-striped">
            <tr class="table-primary" style="text-align: center;">
                <th>ID</th>
                <th>PROYECTO</th>
                <th>MODALIDAD</th>
                <th>ESTUDIANTE</th>
                <th>DOCENTES</th>
                <th>NOTA</th>
                <th>OPCIONES</th>
            </tr>';
        while ($fila = $resultado->fetch_assoc()) {
            $sql = "SELECT *
                    FROM
                        `tb_asigana_aj`
                        INNER JOIN `tb_rol_docente` 
                            ON (`tb_asigana_aj`.`rol_proyect` = `tb_rol_docente`.`id_rol`)
                        INNER JOIN `seg_usuarios` 
                            ON (`tb_asigana_aj`.`id_docente` = `seg_usuarios`.`id_user`)
                    WHERE `tb_asigana_aj`.`id_proyecto` = " . $fila['id_proyect'];
            $resultado = $conexion->query($sql);
            $docentes = '<ul class="mb-0">';
            while ($row = $resultado->fetch_assoc()) {
                $docentes .= '<li>' . $row['nombre1'] . ' ' . $row['nombre2'] . ' ' . $row['apellido1'] . ' ' . $row['apellido1'] . ' - ' . $row['descripcion'] . '</li>';
            }
            $docentes .= '</ul>';
            $botones = null;
            if ($fila['estado'] == '0') {
                $botones = '<a type="button" class="btn btn-sm btn-warning asignaAJ mb-0" value="' . $fila['id_proyect'] . '">Asiganr A/J</a>
                            <a type="button" class="btn btn-sm btn-danger cerrarP mb-0" value="' . $fila['id_proyect'] . '">Cerrar Proyecto</a>';
            }


            $response .=
                '<tr>
                    <td>' . $fila['id_proyect'] . '</td>
                    <td>' . $fila['nom_proyecto'] . '</td>
                    <td>' . $fila['modalidad'] . '</td>
                    <td>' .  $fila['nombre1'] . ' ' . $fila['nombre2'] . ' ' . $fila['apellido1'] . ' ' . $fila['apellido1'] . ' ' . '</td>
                    <td>' . $docentes . '</td>
                    <td>' .  $fila['nota'] . '</td>
                    <td class="text-center">' . $botones . '</td>
                </tr>';
        }
        $response .= '</table>';
    } else {
        $response .=
            '<table class="table table-sm">
            <tr class="table-primary" style="text-align: center;">
                <th>ID</th>
                <th>PROYECTO</th>
                <th>MODALIDAD</th>
                <th>ESTUDIANTE</th>
                <th>NOTA</th>
                <th>OPCIONES</th>
            </tr>
            <tr>
                <td colspan="7">No hay datos</td>
            </tr>';
        $response .= '</table>';
    }
} else {
    if ($_SESSION['rol'] == '1') {
        $botones = '<a type="button" class="btn btn-sm btn-warning asignaAJ mb-0" value="' . $fila['id_proyect'] . '">Asiganr A/J</a>
                    <a type="button" class="btn btn-sm btn-danger cerrarP mb-0" value="' . $fila['id_proyect'] . '">Cerrar Proyecto</a>';
    } 
}
if ($_SESSION['rol'] == '2') {
    $sql = 'SELECT *
            FROM
                `tb_proyectos`
                INNER JOIN `seg_usuarios` 
                    ON (`tb_proyectos`.`id_estudiante` = `seg_usuarios`.`id_user`)';
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows > 0) {
        $response .=
            '<h5 class= "text-center">PROYECTOS</h5>' .
            '<table class="table table-striped">
            <tr class="table-primary" style="text-align: center;">
                <th>ID</th>
                <th>PROYECTO</th>
                <th>MODALIDAD</th>
                <th>ESTUDIANTE</th>
                <th>DOCENTES</th>
                <th>NOTA</th>
                <th>OPCIONES</th>
            </tr>';
        while ($fila = $resultado->fetch_assoc()) {
            $sql = "SELECT *
                    FROM
                        `tb_asigana_aj`
                        INNER JOIN `tb_rol_docente` 
                            ON (`tb_asigana_aj`.`rol_proyect` = `tb_rol_docente`.`id_rol`)
                        INNER JOIN `seg_usuarios` 
                            ON (`tb_asigana_aj`.`id_docente` = `seg_usuarios`.`id_user`)
                    WHERE `tb_asigana_aj`.`id_proyecto` = " . $fila['id_proyect'];
            $resultado = $conexion->query($sql);
            $docentes = '<ul class="mb-0">';
            while ($row = $resultado->fetch_assoc()) {
                $docentes .= '<li>' . $row['nombre1'] . ' ' . $row['nombre2'] . ' ' . $row['apellido1'] . ' ' . $row['apellido1'] . ' - ' . $row['descripcion'] . '</li>';
            }
            $docentes .= '</ul>';
            $botones = null;
            if ($fila['estado'] == '0') {
                $botones = '<a type="button" class="btn btn-sm btn-warning asignaAJ mb-0" value="' . $fila['id_proyect'] . '">Asiganr A/J</a>
                            <a type="button" class="btn btn-sm btn-danger cerrarP mb-0" value="' . $fila['id_proyect'] . '">Cerrar Proyecto</a>';
            }


            $response .=
                '<tr>
                    <td>' . $fila['id_proyect'] . '</td>
                    <td>' . $fila['nom_proyecto'] . '</td>
                    <td>' . $fila['modalidad'] . '</td>
                    <td>' .  $fila['nombre1'] . ' ' . $fila['nombre2'] . ' ' . $fila['apellido1'] . ' ' . $fila['apellido1'] . ' ' . '</td>
                    <td>' . $docentes . '</td>
                    <td>' .  $fila['nota'] . '</td>
                    <td class="text-center">' . $botones . '</td>
                </tr>';
        }
        $response .= '</table>';
    } else {
        $response .=
            '<table class="table table-sm">
            <tr class="table-primary" style="text-align: center;">
                <th>ID</th>
                <th>PROYECTO</th>
                <th>MODALIDAD</th>
                <th>ESTUDIANTE</th>
                <th>NOTA</th>
                <th>OPCIONES</th>
            </tr>
            <tr>
                <td colspan="7">No hay datos</td>
            </tr>';
        $response .= '</table>';
    }
} else {
    if ($_SESSION['rol'] == '2') {
        $botones = '<a type="button" class="btn btn-sm btn-warning editarP mb-0" value="' . $fila['id_proyect'] . '">Actualizar</a>
                    <a type="button" class="btn btn-sm btn-danger descargar mb-0" value="' . $fila['id_proyect'] . '">Descargar</a>';
    } 
}
if ($_SESSION['rol'] == '3'){
    $response .= '<h1>hnuasnfjasnf</h1>';
}

echo $response;
?>
