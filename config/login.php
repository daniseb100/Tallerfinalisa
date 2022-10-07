<?php
session_start();
if (!isset($_POST['usuario']) || !isset($_POST['password'])) {
    exit('Acceso Denegado');
}
include '../config/conexion.php';
$usuario = mb_strtolower($_POST['usuario']);
$password = $_POST['password'];
$res['status'] = 0;
try {
    $cmd = new PDO("$bd_driver:host=$bd_servidor;dbname=$bd_base;$charset", $bd_usuario, $bd_clave);
    $cmd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $sql = "SELECT
                `id_user`, `apellido1`, `nombre1`, `login`, `password`, `rol`
            FROM
                `seg_usuarios`
            WHERE `login` = ?";
    $sql = $cmd->prepare($sql);
    $sql->bindParam(1, $usuario);
    $sql->execute();
    $resultado = $sql->fetch();
    if (!empty($resultado)) {
        $pass = $resultado['password'];
        if (($password === $pass)) {
            $_SESSION['id_user'] = $resultado['id_user'];
            $_SESSION['nombre'] = $resultado['nombre1'] . ' ' . $resultado['apellido1'];
            $_SESSION['user'] = $resultado['login'];
            $_SESSION['rol'] = $resultado['rol'];
            $res['status'] = 1;
        } else {
            $res['msg'] = 'Contraseña incorrecta';
        }
    } else {
        $res['msg'] = 'Usuario no registrado en el sistema';
    }
} catch (PDOException $e) {
    $res['msg'] = $e->getCode() == 2002 ? 'Sin Conexión a Mysql (Error: 2002)' : 'Error: ' . $e->getMessage();
}
echo json_encode($res);
