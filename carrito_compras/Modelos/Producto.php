<?php 

class Producto{
	public function index(){
		$rows = null;
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "select * from productos";
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
		$sql = "select * from productos where nombre like :nombre";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':nombre', $nombre);
		$statement->execute();

		while($resultado = $statement->fetch()){
			$rows[] = $resultado;
		}

		return $rows;
	}

	public function store($nombre, $descripcion, $valor, $adjunto_producto){
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "insert into productos(nombre, descripcion, valor, adjunto_producto) values(:nombre, :descripcion, :valor, :adjunto_producto)";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':nombre', $nombre);
		$statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':adjunto_producto', $adjunto_producto);
		$statement->bindParam(':valor', $valor);

		if(!$statement){
			return "Error al crear el producto";
		}else{
			$statement->execute();
			return "Producto creado correctamente";
		}
	}

	public function show($id){
		$rows = null;
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "select * from productos where id=:id";
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
		$sql = "select * from productos where id=:id";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':id', $id);
		$statement->execute();
		while($resultado = $statement->fetch()){
			$rows[] = $resultado;
		}
		return $rows;
	}

	public function update($nombre, $descripcion, $valor, $id, $adjunto_producto){
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "update productos set nombre=:nombre, descripcion=:descripcion, valor=:valor, adjunto_producto=:adjunto_producto where id=:id)";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':nombre', $nombre);
		$statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':adjunto_producto', $adjunto_producto);
		$statement->bindParam(':valor', $valor);
		$statement->bindParam(':id', $id);

		if(!$statement){
			return "Error al crear el producto";
		}else{
			$statement->execute();
			return "Producto editado correctamente";
		}
	}

	public function delete($id){
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "delete from productos where id=:id";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':id', $id);
		$statement->execute();
		if(!$statement){
			return "Error al eliminar el producto";
		}else{
			$statement->execute();
			return "Producto eliminado correctamente";
		}
	}
}