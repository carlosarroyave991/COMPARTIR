<?php 

if(isset($_POST['opcion'])){
	require_once '../Modelos/Conexion.php';
	require_once '../Modelos/Producto.php';
    require_once '../Modelos/Usuario.php';
    $opcion = $_POST['opcion'];
	if($opcion == 'create'){
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$valor = $_POST['valor'];
		store($nombre, $descripcion, $valor);
	}
    if($opcion == 'create_u'){
            $nombre_u = $_POST['nombre_u'];
            $contrase_u = $_POST['contrase_u'];
            store($nombre_u, $contrase_u);
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
		echo "<td>
				<a class='btn btn-primary' href='show.php'><i class='fa fa-search'></i> Ver</a>
				<a class='btn btn-warning' href='edit.php'><i class='fa fa-edit'></i> Editar</a>
				<a class='btn btn-danger' href='delete.php'><i class='fa fa-trash'></i> Eliminar</a>
			</td>";
		echo "</tr>";
	}
}

function index_u(){
    $usuarios = new usuario();
    $listadoUsuarios = $usuarios->index_u();
    	foreach($listadoUsuarios as $usuario){
		echo "<tr>";
		echo "<td>".$usuario['id_usuario']."</td>";
		echo "<td>".$usuario['nombre_u']."</td>";
		echo "<td>".$usuario['contrase_u']."</td>";
		echo "<td>
				<a class='btn btn-primary' href='show.php'><i class='fa fa-search'></i> Ver</a>
				<a class='btn btn-warning' href='edit.php'><i class='fa fa-edit'></i> Editar</a>
				<a class='btn btn-danger' href='delete.php'><i class='fa fa-trash'></i> Eliminar</a>
			</td>";
		echo "</tr>";
	}
}

function store_u($nombre_u,$contrase_u){
    $usuarios = new Usuario();
    $resultado = $usuarios->store_u($nombre_u, $contrase_u);
    echo"<div class='alert alert-success'><p>".$resultado."</p><p><a href='../Vistas/Productos/create_u.php'>Crear nuevo Usuario</a><a href='../Vistas/Productos/index.php'>Listar Usuarios</a></p>";
}

function show(){

}

function edit(){

}

function store($nombre, $descripcion, $valor){
	$productos = new Producto();
	$resultado = $productos->store($nombre, $descripcion, $valor);
	echo"<div class='alert alert-success'><p>".$resultado."</p><p><a href='../Vistas/Productos/create.php'>Crear nuevo Producto</a><a href='../Vistas/Productos/index.php'>Listar Productos</a></p>";
}

function delete(){

}
