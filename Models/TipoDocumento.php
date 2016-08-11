<?php namespace Models;

	class TipoDocumento{
		private $id;
		private $tipoDocumento;
		private $con;
		public function __construct(){
			$this->con=new Conexion();
		}
		public function set($atributo,$contenido){
			$this->$atributo=$contenido;
			// print $this->username;
		}
		public function get($atributo){
			return $this->$atributo;
		}

		public function listar(){
			$sql="SELECT * from tipo_documento";
			$datos=$this->con->queryObjects($sql);
			return $datos;
		}

		
		public function edit(){
			$sql="UPDATE estudiantes SET nombre='{$this->nombre}', edad='{$this->edad}', promedio='{$this->promedio}', imagen='{$this->imagen}', fk_curso='{$this->fk_curso}' WHERE id='{$this->id}'";
			$this->con->querySet($sql);
		}
		public function view(){
			$sql="SELECT * FROM tipo_documento WHERE id='{$this->id}'";
			$datos=$this->con->queryObjects($sql);
			$row=$datos->fetch(\PDO::FETCH_ASSOC);
			return $row;
		}

	}




 ?>
  