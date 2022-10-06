<?php
include '../../../config/conexion.php';
$conexion = mysqli_connect($bd_servidor, $bd_usuario, $bd_clave, $bd_base);
$sql = "SELECT  * FROM `tipo_user`";
$resultado = $conexion->query($sql);
$query = "SELECT * FROM `seg_usuarios` WHERE `id_user` = " . $_POST['id'];
$usuario = $conexion->query($query);
$rowus = $usuario->fetch_assoc()

?>
<div class="px-0">
    <div class="shadow">
        <div class="card-header mb-3" style="background-color: #16a085 !important;">
            <h5 style="color: white;">AUCTUALIZAR USUARIO</h5>
        </div>
        <div class="px-4">
            <form id="formAddUser">
                <input type="number" name="id" value="<?php echo $_POST['id'] ?>" hidden="true">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="small" for="txtNomb1user">Primer nombre</label>
                        <input type="text" class="form-control form-control-sm" id="txtNomb1user" name="txtNomb1user" placeholder="Nombre" value="<?php echo $rowus['nombre1'] ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="small" for="txtNomb2user">Segundo nombre</label>
                        <input type="text" class="form-control form-control-sm" id="txtNomb2user" name="txtNomb2user" placeholder="Nombre" value="<?php echo $rowus['nombre2'] ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="small" for="txtApe1user">Primer apellido</label>
                        <input type="text" class="form-control form-control-sm" id="txtApe1user" name="txtApe1user" placeholder="Apellido" value="<?php echo $rowus['apellido1'] ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="small" for="txtApe2user">Segundo apellido</label>
                        <input type="text" class="form-control form-control-sm" id="txtApe2user" name="txtApe2user" placeholder="Apellido" value="<?php echo $rowus['apellido2'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="small" for="txtlogin">Login</label>
                        <input type="text" class="form-control form-control-sm" id="txtlogin" name="txtlogin" placeholder="Usuario" value="<?php echo $rowus['login'] ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="small" for="mailuser">Correo eléctronico</label>
                        <input type="email" class="form-control form-control-sm" id="mailuser" name="mailuser" placeholder="usuario@correo.com" value="<?php echo $rowus['correo'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="small" for="slcRolUser">Rol</label>
                        <select class="form-control form-control-sm" id="slcRolUser" name="slcRolUser">
                            <?php
                            while ($row = $resultado->fetch_assoc()) {
                                if ($row['id_tipo'] == $rowus['rol']) {
                                    echo "<option value='" . $row['id_tipo'] . "' selected>" . $row['descripcion'] . "</option>";
                                } else {
                                    echo "<option value='" . $row['id_tipo'] . "'>" . $row['descripcion'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="text-center pt-3">
    <button id="btnUpUser" type="button" class="btn btn-primary btn-sm">Actualizar</button>
    <a type="button" class="btn btn-secondary  btn-sm" data-bs-dismiss="modal">Cancelar</a>
</div>