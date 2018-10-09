<?php 

class Usuario{
	public function index_u(){
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

	public function store($nombre_u,$contrase_u){
        $modelo = new Conexion();
        $conexion = $modelo->getConexion();
        $sql="insert into usuarios(nombre_u,contrase_u)values(:nombre_u,:contrase_u)";
        $statement =$conexion->prepare($sql);
        $statement->bindParam(':nombre_u',$nombre_u);
        $statement->bindParam(':contrase_u',$contrase_u);
        
        
        
        if(!$statement){
            return "Error al crear el usuario.";
        }else{
            $statement->execute();
            return "Usuario creado correctamente.";
        }
    }

	public function update(){

	}

	public function delete(){

	}
}