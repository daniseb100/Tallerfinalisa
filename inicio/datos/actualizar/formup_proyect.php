<?php
include '../../../config/conexion.php';
$conexion = mysqli_connect($bd_servidor, $bd_usuario, $bd_clave, $bd_base);
$sql = "SELECT * FROM `tb_proyectos` WHERE `id_proyect` = " . $_POST['id'];
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc()

?>
<div class="px-0">
    <div class="shadow">
        <div class="card-header mb-3" style="background-color: #16a085 !important;">
            <h5 style="color: white;">ACTUALIZAR PROYECTO</h5>
        </div>
        <div class="px-4">
            <form id="formUpProyectn">
                <input type="number" name="id" value="<?php echo $_POST['id'] ?>" hidden="true">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="small" for="numNota">Nota</label>
                        <input type="number" class="form-control form-control-sm" id="numNota" name="numNota" placeholder="Nota" value="<?php echo $row['nota']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="small" for="observaciones">Observaciones</label>
                        <textarea class="form-control form-control-sm" id="observaciones" name="observaciones" rows="3"><?php echo $row['observaciones']?></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center pt-3">
        <button id="btnUpProj" type="button" class="btn btn-primary btn-sm">Actualizar</button>
        <a type="button" class="btn btn-secondary  btn-sm" data-bs-dismiss="modal">Cancelar</a>
    </div>