<?php 

class Usuario{
	public function index(){
		$rows = null;
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "select * from usuarios";
		$statement = $conexion->prepare($sql);
		$statement->execute();

		while($resultado = $statement->fetch()){
			$rows[] = $resultado;
		}

		return $rows;
	}
    
    public function search($buscar){
		$rows = null;
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$nombre = "%".$buscar."%";
		$sql = "select * from usuarios where nombre like :nombre";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':nombre', $nombre);
		$statement->execute();

		while($resultado = $statement->fetch()){
			$rows[] = $resultado;
		}

		return $rows;
	}

	public function store($nombre, $email, $password){
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "insert into usuarios(nombre, email, password) values(:nombre, :email, :password)";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':nombre', $nombre);
		$statement->bindParam(':email', $email);
		$statement->bindParam(':password', $password);

		if(!$statement){
			return "Error al crear el usuario";
		}else{
			$statement->execute();
			return "Usuario creado correctamente";
		}
	}

	public function show($id){
		$rows = null;
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "select * from usuarios where id=:id";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':id', $id);
		$statement->execute();
		while($resultado = $statement->fetch()){
			$rows[] = $resultado;
		}
		return $rows;
	}

	public function edit($id){
		$rows = null;
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "select * from usuarios where id=:id";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':id', $id);
		$statement->execute();
		while($resultado = $statement->fetch()){
			$rows[] = $resultado;
		}
		return $rows;
	}

	public function update($nombre, $email, $password, $id){
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "update productos set nombre = ':nombre', email = ':email', password = ':password' where id = ':id')";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':nombre', $nombre);
		$statement->bindParam(':email', $email);
		$statement->bindParam(':password', $password);
		$statement->bindParam(':id', $id);

		if(!$statement){
			return "Error al crear el usuario";
		}else{
			$statement->execute();
			return "Usuario editado correctamente";
		}
	}

	public function delete($id){
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "delete from usuarios where id=:id";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':id', $id);
		$statement->execute();
		if(!$statement){
			return "Error al eliminar el usuario";
		}else{
			$statement->execute();
			return "Usuario eliminado correctamente";
		}
	}
}