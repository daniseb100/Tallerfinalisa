<?php
include '../../../config/conexion.php';
$conexion = mysqli_connect($bd_servidor, $bd_usuario, $bd_clave, $bd_base);
$sql = "SELECT  * FROM `tipo_user`";
$resultado = $conexion->query($sql);
$auto = isset($_POST['tipo']) ? 0 : 1;
?>
<div class="px-0">
    <div class="shadow">
        <div class="card-header mb-3" style="background-color: #16a085 !important;">
            <h5 style="color: white;">REGISTRAR USUARIO</h5>
        </div>
        <div class="px-4">
            <form id="formAddUser">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="small" for="txtNomb1user">Primer nombre</label>
                        <input type="text" class="form-control form-control-sm" id="txtNomb1user" name="txtNomb1user" placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="small" for="txtNomb2user">Segundo nombre</label>
                        <input type="text" class="form-control form-control-sm" id="txtNomb2user" name="txtNomb2user" placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="small" for="txtApe1user">Primer apellido</label>
                        <input type="text" class="form-control form-control-sm" id="txtApe1user" name="txtApe1user" placeholder="Apellido">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="small" for="txtApe2user">Segundo apellido</label>
                        <input type="text" class="form-control form-control-sm" id="txtApe2user" name="txtApe2user" placeholder="Apellido">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="small" for="txtlogin">Login</label>
                        <input type="text" class="form-control form-control-sm" id="txtlogin" name="txtlogin" placeholder="Usuario">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="small" for="mailuser">Correo eléctronico</label>
                        <input type="email" class="form-control form-control-sm" id="mailuser" name="mailuser" placeholder="usuario@correo.com">
                    </div>
                    <div class="form-group col-md-6 campo">
                        <label class="small" for="passuser">Contraseña</label>
                        <input type="password" class="form-control form-control-sm" id="passuser" name="passuser" placeholder="Contraseña">
                    </div>
                </div>
                <?php
                if ($auto == 1) { ?>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="small" for="slcRolUser">Rol</label>
                            <select class="form-control form-control-sm" id="slcRolUser" name="slcRolUser">
                                <option value="0" selected>--Seleccionar--</option>
                                <?php
                                while ($row = $resultado->fetch_assoc()) {
                                    echo "<option value='" . $row['id_tipo'] . "'>" . $row['descripcion'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                <?php
                } else {
                    echo "<input type='hidden' name='slcRolUser' value='3'><input type='hidden' id='band' value='1'>";
                }
                ?>
            </form>
        </div>
    </div>
</div>
<div class="text-center pt-3">
    <button id="btnAddUser" type="button" class="btn btn-primary btn-sm">Registrar</button>
    <a type="button" class="btn btn-secondary  btn-sm" data-bs-dismiss="modal">Cancelar</a>
</div>