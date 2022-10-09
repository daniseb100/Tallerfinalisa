<!DOCTYPE html>
<html lang="es">
<?php
include 'config/conexion.php';
include 'config/header.php';
?>

<body class="">
	<main class="main-content  mt-0">
		<section>
			<div class="page-header min-vh-100">
				<div class="container">
					<div class="row">
						<div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
							<div class="card card-plain">
								<div class="card-header pb-0 text-start">
									<h4 class="font-weight-bolder">Iniciar Sesión</h4>
									<p class="mb-0">Ingresar Usuario y contraseña para acceder al sistema</p>
								</div>
								<div class="card-body">
									<form id="formLogin">
										<div class="mb-3">
											<input type="text" id="usuario" name="usuario" class="form-control form-control-lg" placeholder="Usuario" aria-label="Usuario">
										</div>
										<div class="mb-3">
											<input type="password" id="clave" name="clave" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Contraseña">
										</div>
										<div class="text-center">
											<button type="button" id="btnEntrarLogin" class="btn btn-lg btn-success btn-lg w-100 mt-4 mb-0">Entrar</button>
										</div>
									</form>
								</div>
								<a href="#" class="text-primary" id="btnRegAuto">
									<div class="card-footer text-center pt-0 px-lg-2 px-1">
										<p class="mb-4 text-sm mx-auto">
											Registrarse
										</p>
									</div>
								</a>
							</div>
						</div>
						<div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
							<div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-color: red; background-size: cover;">
								<img src="images/udenar.jpg" class="card-img">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<?php
	include 'config/alerts.php';
	include 'config/scripts.php';
	?>
	<script src="<?php echo $_SESSION['urlin'] ?>/inicio/js/funcion_inicio.js?v=<?php echo date('YmdHis') ?>"></script>
</body>

</html>