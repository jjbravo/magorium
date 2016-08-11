<?php namespace Models;
	class Ciudades{
		private $id;
		private $ciudad;
		private $departamento_id;
		
		private $con;

		public function __construct(){
			$this->con=new Conexion();
		}
		public function set($atributo,$contenido){
			$this->$atributo=$contenido;
		}
		public function get($atributo){
			return $this->$atributo;
		}
		public function listar(){
			$sql="SELECT t1.*, t2.id AS id_departamento, t2.departamento AS departamento FROM ciudades t1 JOIN departamentos t2 WHERE t1.departamentos_id=t2.id";
			$datos=$this->con->queryObjects($sql);
			return $datos;
		}

		public function add(){
			$this->con->querySet($sql);
				
		}

		public function delete(){
			$sql="DELETE FROM ciudades WHERE id='{$this->id}'";
			$this->con->querySet($sql);

		}
		public function edit(){
			$this->con->querySet($sql);
		}
		public function view(){
			$sql="SELECT * FROM ciudades JOIN departamentos WHERE ciudades.departamentos_id=departamentos.id AND ciudades.id={$this->id}";

			$datos=$this->con->queryObjects($sql);
			$row=$datos->fetch(\PDO::FETCH_ASSOC);
			return $row;
		}
	}

 ?>
  