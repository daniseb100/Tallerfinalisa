<?php
$conn=new PDO('mysql:host=localhost; dbname=demo', 'root') or die(mysql_error());
if(isset($_POST['submit'])!=""){
  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
  // $caption1=$_POST['caption'];
  // $link=$_POST['link'];
  $fname = date("YmdHis").'_'.$name;
  $chk = $conn->query("SELECT * FROM  upload where name = '$name' ")->rowCount();
  if($chk){
    $i = 1;
    $c = 0;
	while($c == 0){
    	$i++;
    	$reversedParts = explode('.', strrev($name), 2);
    	$tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
    // var_dump($tname);exit;
    	$chk2 = $conn->query("SELECT * FROM  upload where name = '$tname' ")->rowCount();
    	if($chk2 == 0){
    		$c = 1;
    		$name = $tname;
    	}
    }
}
 $move =  move_uploaded_file($temp,"uploads/".$fname);
 if($move){
 	$query=$conn->query("insert into upload(name,fname)values('$name','$fname')");
	if($query){
	header("location:index.php");
	}
	else{
	die(mysql_error());
	}
 }
}
?>
<div class="shadow">
    <div class="card-header mb-3" style="background-color: #16a085 !important;">
        <h5 style="color: white;">REGISTRAR PROYECTO</h5>
    </div>
    <div class="px-4">
        <form enctype="multipart/form-data" action="" name="form" method="post">
            <H4>Modalidad Interacción Social</H4>
            <p>1. El estudiante debe tener aprobado el 75% de la totalidad de los créditos de su plan
                    de estudios, incluidos los de formación humanística y competencias básicas.</p>
            <p>2. El estudiante debe estar legalmente matriculado en el periodo académico cuando
                    realiza la propuesta. </p>
            <p>3. El estudiante debe cancelar los derechos correspondientes a la inscripción del
                    Trabajo de Grado. </p>
            <p>4. El estudiante debe contar con el apoyo de un docente en el rol de asesor</p>

            <div class="row">
                    <div class="form-group col-md-3">
                        <label class="small" for="txtCdP">Codigo proyecto</label>
                        <input type="text" class="form-control form-control-sm" id="txtCdP" name="txtCdP" placeholder="Codigo">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="small" for="txtidEst">Id Estudiante</label>
                        <input type="text" class="form-control form-control-sm" id="txtidEst" name="txtidEst" placeholder="Id">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="small" for="txtNomb1user">Nombre Proyecto</label>
                        <input type="text" class="form-control form-control-sm" id="txtNomb1user" name="txtNomb1user" placeholder="Nombre">
                    </div>
                    
            </div>
            <div class="row"> 
                    <div class="form-group col-md-3">
                        <label class="small" for="txtNomb2user">Modalidad</label>
                        <select class="form-select" aria-label="Default select example">
                        <option selected>Modalidad</option>
                            <option value="Interacción Social">Interacción Social </option>
                        </select>
                    </div>        
                    <div class="form-group col-md-3">
                        Seleccione Archivo
			            <input type="file" name="file" id="file" /></td>
			            
                    </div>
                    
            </div>
            <input type="submit" name="submit" id="submit"class="btn btn-primary btn-sm" value="Subir" />
     
            <a type="button" class="btn btn-secondary  btn-sm" data-bs-dismiss="modal">Cancelar</a>        
        <from>
    </div>
</div>    