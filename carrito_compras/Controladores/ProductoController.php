<?php 

if(isset($_POST['opcion'])){
	require_once '../Modelos/Conexion.php';
	require_once '../Modelos/Producto.php';

	$opcion = $_POST['opcion'];
	if($opcion == 'create'){
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$valor = $_POST['valor'];
        $adjunto_producto= $_FILES['adjunto_producto'];
		store($nombre, $descripcion, $valor, $adjunto_producto);
	}elseif ($opcion == 'edit') {
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$valor = $_POST['valor'];
		$id = $_POST['id'];
        $adjunto_producto= $_FILES['adjunto_producto'];
		update($nombre, $descripcion, $valor, $id, $adjunto_producto);
	}
}

function index(){
	$productos = new Producto();
	$listadoProductos = $productos->index();

	foreach($listadoProductos as $producto){
		echo "<tr>";
		echo "<td>".$producto['id']."</td>";
		echo "<td>".$producto['nombre']."</td>";
		echo "<td>".$producto['descripcion']."</td>";
		echo "<td>".$producto['valor']."</td>";
        echo "<td>".$producto['adjunto_producto']."</td>";
		echo "<td>
				<a class='btn btn-primary' href='show.php?id=".$producto['id']."'><i class='fa fa-search'></i> Ver</a>
				<a class='btn btn-warning' href='edit.php?id=".$producto['id']."'><i class='fa fa-edit'></i> Editar</a>
				<a class='btn btn-danger' onClick=\"return confirm('Eliminar este Registro')\" href='delete.php?id=".$producto['id']."'><i class='fa fa-trash'></i> Eliminar</a>
			</td>";
		echo "</tr>";
	}
}

function search(){
	$buscar = $_GET['buscar'];
	$productos = new Producto();
	$listadoProductos = $productos->search($buscar);

	foreach($listadoProductos as $producto){
		echo "<tr>";
		echo "<td>".$producto['id']."</td>";
		echo "<td>".$producto['nombre']."</td>";
		echo "<td>".$producto['descripcion']."</td>";
		echo "<td>".$producto['valor']."</td>";
        echo "<td>".$producto['adjunto_producto']."</td>";
		echo "<td>
				<a class='btn btn-primary' href='show.php?id=".$producto['id']."'><i class='fa fa-search'></i> Ver</a>
				<a class='btn btn-warning' href='edit.php?id=".$producto['id']."'><i class='fa fa-edit'></i> Editar</a>
				<a class='btn btn-danger' onClick=\"return confirm('Eliminar este Registro')\" href='delete.php?id=".$producto['id']."'><i class='fa fa-trash'></i> Eliminar</a>
			</td>";
		echo "</tr>";
	}
}

function show(){
	$id = $_GET['id'];
	$productos = new Producto();
	$ObtenerProducto = $productos->show($id);
	foreach($ObtenerProducto as $producto){
		echo "<div class='group'>";
			echo "<label>Nombre</label>";
			echo "<input type='text' class='form-control' readonly value='".$producto['nombre']."'>";
		echo "</div>";
		echo "<div class='group'>";
			echo "<label>Descripción</label>";
			echo "<input type='text' class='form-control' readonly value='".$producto['descripcion']."'>";
		echo "</div>";
		echo "<div class='group'>";
			echo "<label>Valor</label>";
			echo "<input type='text' class='form-control' readonly value='".$producto['valor']."'>";
		echo "</div>";
        echo "<div class='group'>";
			echo "<label>Adjunto Producto</label>";
			echo "<input type='file' class='form-control' readonly value='".$producto['adjunto_producto']."'>";
		echo "</div>";
	}
}

function edit(){
	$id = $_GET['id'];
	$productos = new Producto();
	$ObtenerProducto = $productos->edit($id);
	foreach($ObtenerProducto as $producto){
		echo "<input type='hidden' name='id' value='".$producto['id']."'>";
		echo "<div class='group'>";
			echo "<label>Nombre</label>";
			echo "<input type='text' name='nombre' class='form-control' value='".$producto['nombre']."'>";
		echo "</div>";
		echo "<div class='group'>";
			echo "<label>Descripción</label>";
			echo "<input type='text' name='descripcion' class='form-control' value='".$producto['descripcion']."'>";
		echo "</div>";
		echo "<div class='group'>";
			echo "<label>Valor</label>";
			echo "<input type='text' name='valor' class='form-control' value='".$producto['valor']."'>";
		echo "</div>";
        echo "<div class='group'>";
			echo "<label>Adjunto Producto</label>";
			echo "<input type='file' name='adjunto_producto' class='form-control' value='".$producto['adjunto_producto']."'>";
		echo "</div>";
	}
}

function store($nombre, $descripcion, $valor,$adjunto_producto){
	$productos = new Producto();
	$resultado = $productos->store($nombre, $descripcion, $valor, $adjunto_producto);
	echo "<div class='alert alert-success'><p>".$resultado."</p>
	<p><a href='../Vistas/Productos/create.php'>Crear nuevo Producto</a> <a href='../Vistas/Productos/index.php'>Listar Productos</a></p>
	</div>";
}

function update($nombre, $descripcion, $valor, $id, $adjunto_producto){
	$productos = new Producto();
	$resultado = $productos->update($nombre, $descripcion, $valor, $id, $adjunto_producto);
	echo "<div class='alert alert-success'><p>".$resultado."</p>
	<p><a href='../Vistas/Productos/index.php'>Listar Productos</a></p>
	</div>";
}

function delete(){
	$id = $_GET['id'];
	$productos = new Producto();
	$resultado = $productos->delete($id);
	echo "<div class='alert alert-danger'><p>".$resultado."</p></div><br>";
}
