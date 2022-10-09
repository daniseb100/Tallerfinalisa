<?php
include '../../../config/conexion.php';
$conexion = mysqli_connect($bd_servidor, $bd_usuario, $bd_clave, $bd_base);
$sql = "SELECT * FROM `seg_usuarios` WHERE `rol` = 2";
$resultado = $conexion->query($sql);

?>
<div class="px-0">
    <div class="shadow">
        <div class="card-header mb-3" style="background-color: #16a085 !important;">
            <h5 style="color: white;">ASIGNAR JURADO O ASESOR</h5>
        </div>
        <div class="px-4">
            <form id="formAddAsJu">
                <input type="number" name="id" value="<?php echo $_POST['id'] ?>" hidden="true">
                <div class="row">
                    <div class="form-group col-md-8">
                        <label class="small" for="slcDocente">Docente</label>
                        <select class="form-control form-control-sm" name="slcDocente" id="slcDocente">
                            <option value="0">--Seleccione--</option>
                            <?php
                            while ($fila = $resultado->fetch_assoc()) {
                                echo "<option value='" . $fila['id_user'] . "'>" . $fila['nombre1'] . " " . $fila['apellido1'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="small" for="slcRol">Rol</label>
                        <select class="form-control form-control-sm" name="slcRol" id="slcRol">
                            <option value="0">--Selecione--</option>
                            <option value="2">Jurado</option>
                            <option value="1">Asesor</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center pt-3">
        <button id="btnAddAsJu" type="button" class="btn btn-primary btn-sm">Asignar</button>
        <a type="button" class="btn btn-secondary  btn-sm" data-bs-dismiss="modal">Cancelar</a>
    </div>