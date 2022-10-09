<?php
include '../../../config/conexion.php';
$conexion = mysqli_connect($bd_servidor, $bd_usuario, $bd_clave, $bd_base);
$sql = "SELECT 
            *
        FROM
            `seg_usuarios`
            INNER JOIN `tipo_user` 
               ON (`seg_usuarios`.`rol` = `tipo_user`.`id_tipo`)
               WHERE `rol`= 3";
       
$resultado = $conexion->query($sql);
$response = '';
if ($resultado->num_rows > 0) {
    $response .=
        '<div class="text-right"><a type="button" id="btnRegUser" class="btn btn-sm btn-success">Registrar</a></div>' .
        '<h5 class= "text-center">USUARIOS</h5>' .
        '<table class="table table-striped">
        <tr class="table-warning" style="text-align: center;">
            <th>ID</th>
            <th>NOMBRE</th>
            <th>USUARIO</th>
            <th>ROL</th>
            <th>OPCIONES</th>
        </tr>';
    while ($fila = $resultado->fetch_assoc()) {
        $response .=
            '<tr style="text-align: center;">
                <td>' . $fila['id_user'] . '</td>
                <td>' . $fila['nombre1'] . ' ' . $fila['nombre2'] . ' ' . $fila['apellido1'] . ' ' . $fila['apellido1'] . ' ' . '</td>
                <td>' . $fila['login'] . '</td>
                <td>' . $fila['descripcion'] . '</td>
                <td>
                    <a type="button" class="btn btn-sm btn-warning editar mb-0" value="' . $fila['id_user'] . '">Editar</a>
                    <a type="button" class="btn btn-sm btn-danger eliminar mb-0" value="' . $fila['id_user'] . '">Eliminar</a>
                </td>
            </tr>';
    }
    $response .= '</table>';
} else {
    $response .=
        '<table class="table table-sm">
        <tr class="table-warning" style="text-align: center;">
            <th>ID</th>
            <th>NOMBRE</th>
            <th>USUARIO</th>
            <th>ROL</th>
            <th>OPCIONES</th>
        </tr>
        <tr>
            <td colspan="5">No hay datos</td>
        </tr>';
    $response .= '</table>';
}

echo $response;
