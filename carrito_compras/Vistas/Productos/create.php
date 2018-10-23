<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Index: Crear Productos</title>
	<!-- Incluir Bootstrap -->
	<link rel="stylesheet" href="../../public/css/bootstrap.min.css" />
	<!-- Incluir Fontawesome -->
	<link rel="stylesheet" href="../../public/css/fontawesome.min.css" />
</head>
<body>
	<div class="container">
	<h1>Crear Productos</h1>
		<form action="../../controladores/ProductoController.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="opcion" value="create">
			<div class="group">
				<label for="">Nombre</label>
				<input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre" required>
			</div>
			<div class="group">
				<label for="">Descripción</label>
				<input type="text" class="form-control" name="descripcion" placeholder="Ingrese Descripción" required>
			</div>
			<div class="group">
				<label for="">Valor</label>
				<input type="text" class="form-control" name="valor" placeholder="Ingrese Valor" required>
			</div>
            <div class="form-group">
		<label for="adjunto_producto"> <i class="fas fa-unlock-alt"></i> Adjunto Producto</label>
		<input type="file" name="adjunto_producto" class="form-control" required="">
	</div>
			<div>
				<input type="submit" class="btn btn-primary" value="Crear Producto">
			</div>			
		</form>
		<a href="index.php" class="btn btn-success">Ir Atrás</a>
	</div>

	<!-- Incluir Jquery -->
	<script src="../../public/js/jquery.min.js"></script>
	<!-- Incluir Bootstrap -->
	<script src="../../public/js/bootstrap.min.js"></script>
	<!-- Incluir Fontawesome -->
	<script src="../../public/js/fontawesome.min.js"></script>
</body>
</html>