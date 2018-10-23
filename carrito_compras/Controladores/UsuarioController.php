<?php 

if(isset($_POST['opcion'])){
	require_once '../Modelos/Conexion.php';
	require_once '../Modelos/Usuario.php';

	$opcion = $_POST['opcion'];
	if($opcion == 'create'){
		$nombre = $_POST['nombre'];
		$email = $_POST['email'];
		$password= $_POST['password'];
		store($nombre, $email, $password);
	}elseif ($opcion == 'edit') {
		$nombre = $_POST['nombre'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$id = $_POST['id'];
		update($nombre, $email, $password, $id);
	}
}

function index(){
	$usuarios = new Usuario();
	$listadoUsuario = $usuarios->index();
	foreach($listadoUsuario as $usuario){
		echo "<tr>";
		echo "<td>".$usuario['id']."</td>";
		echo "<td>".$usuario['nombre']."</td>";
		echo "<td>".$usuario['email']."</td>";
		echo "<td>".$usuario['password']."</td>";
		echo "<td>
				<a class='btn btn-primary' href='show.php?id=".$usuario['id']."'><i class='fa fa-search'></i> Ver</a>
				<a class='btn btn-warning' href='edit.php?id=".$usuario['id']."'><i class='fa fa-edit'></i> Editar</a>
				<a class='btn btn-danger' onClick=\"return confirm('Eliminar este Registro')\" href='delete.php?id=".$usuario['id']."'><i class='fa fa-trash'></i> Eliminar</a>
			</td>";
		echo "</tr>";
	}
}

function search(){
	$buscar = $_GET['buscar'];
	$usuarios = new Usuario();
	$listadoUsuarios = $usuarios->search($buscar);

	foreach($listadoUsuarios as $usuario){
		echo "<tr>";
		echo "<td>".$usuario['id']."</td>";
		echo "<td>".$usuario['nombre']."</td>";
		echo "<td>".$usuario['email']."</td>";
		echo "<td>".$usuario['password']."</td>";
		echo "<td>
				<a class='btn btn-primary' href='show.php?id=".$usuario['id']."'><i class='fa fa-search'></i> Ver</a>
				<a class='btn btn-warning' href='edit.php?id=".$usuario['id']."'><i class='fa fa-edit'></i> Editar</a>
				<a class='btn btn-danger' onClick=\"return confirm('Eliminar este Registro')\" href='delete.php?id=".$usuario['id']."'><i class='fa fa-trash'></i> Eliminar</a>
			</td>";
		echo "</tr>";
	}
}

function show(){
	$id = $_GET['id'];
	$usuarios = new Usuario();
	$ObtenerUsuario = $usuarios->show($id);
	foreach($ObtenerUsuario as $usuario){
		echo "<div class='group'>";
			echo "<label>Nombre</label>";
			echo "<input type='text' class='form-control' readonly value='".$usuario['nombre']."'>";
		echo "</div>";
		echo "<div class='group'>";
			echo "<label>Email</label>";
			echo "<input type='text' class='form-control' readonly value='".$usuario['email']."'>";
		echo "</div>";
		echo "<div class='group'>";
			echo "<label>Password</label>";
			echo "<input type='text' class='form-control' readonly value='".$usuario['password']."'>";
		echo "</div>";
	}
}

function edit(){
	$id = $_GET['id'];
	$usuarios = new Usuario();
	$ObtenerUsuario = $usuarios->edit($id);
	foreach($ObtenerUsuario as $usuario){
		echo "<input type='hidden' name='id' value='".$usuario['id']."'>";
		echo "<div class='group'>";
			echo "<label>Nombre</label>";
			echo "<input type='text' name='nombre' class='form-control' value='".$usuario['nombre']."'>";
		echo "</div>";
		echo "<div class='group'>";
			echo "<label>Email</label>";
			echo "<input type='text' name='email' class='form-control' value='".$usuario['email']."'>";
		echo "</div>";
		echo "<div class='group'>";
			echo "<label>Password</label>";
			echo "<input type='text' name='password' class='form-control' value='".$usuario['password']."'>";
		echo "</div>";
	}
}

function store($nombre, $email, $password){
	$usuarios = new Usuario();
	$resultado = $usuarios->store($nombre, $email, $password);
	echo "<div class='alert alert-success'><p>".$resultado."</p>
	<p><a href='../Vistas/Usuarios/create.php'>Crear nuevo Usuario</a> <a href='../Vistas/Usuarios/index.php'>Listar Usuario</a></p>
	</div>";
}

function update($nombre, $email, $password, $id){
	$usuarios = new Usuario();
	$resultado = $usuarios->update($nombre, $email, $password, $id);
	echo "<div class='alert alert-success'><p>".$resultado."</p>
	<p><a href='../Vistas/Usuarios/index.php'>Listar Usuarios</a></p>
	</div>";
}

function delete(){
	$id = $_GET['id'];
	$usuarios = new Usuario();
	$resultado = $usuarios->delete($id);
	echo "<div class='alert alert-danger'><p>".$resultado."</p></div><br>";
}
