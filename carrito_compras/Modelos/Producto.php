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

	public function store($nombre,$descripcion,$valor){
        $modelo = new Conexion();
        $conexion = $modelo->getConexion();
        $sql="insert into productos(nombre,descripcion,valor)values(:nombre,:descripcion,:valor)";
        $statement =$conexion->prepare($sql);
        $statement->bindParam(':nombre',$nombre);
        $statement->bindParam(':descripcion',$descripcion);
        $statement->bindParam(':valor',$valor);
        
        
        if(!$statement){
            return "Error al crear el producto.";
        }else{
            $statement->execute();
            return "Producto creado correctamente.";
        }
    }

	public function update(){

	}

	public function delete(){

	}
}