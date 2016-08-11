<?php namespace Models;
	class Formato{
		private $id;
		private $formato;
		private $tipo;
		
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
			$sql="SELECT * FROM formato";
			$datos=$this->con->queryObjects($sql);
			return $datos;
		}

		public function add(){
			$sql="SQL";
			$this->con->querySet($sql);
				
		}

		public function delete(){
			$sql="SQL";
			$this->con->querySet($sql);

		}
		public function edit(){
			$sql="SQL";
			$this->con->querySet($sql);
		}
		public function view(){
			$sql="SQL";

			$datos=$this->con->queryObjects($sql);
			$row=$datos->fetch(\PDO::FETCH_ASSOC);
			return $row;
		}
		public function getFormatosAjax(){
			$sql="SELECT * FROM formato WHERE tipo='{$this->tipo}'";
			$datos=$this->con->queryObjects($sql);
			
			return $datos;
		}
	}

 ?>
  
  