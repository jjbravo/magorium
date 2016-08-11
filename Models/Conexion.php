<?php  namespace Models;

	class Conexion{
		
		private	$conex="mysql:host=localhost;dbname=magorium_db;charset=utf8";
		private	$user="root";
		private	$pass="1234";
		
		private $con;
		public function __construct(){
			$this->con = new \PDO($this->conex,$this->user,$this->pass);
			$this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			$this->con->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
			
		}

		public function querySet($sql){
			$this->con->exec($sql);
			return $this->con->lastInsertId();
		}
		public function queryObjects($sql){
			try {
				   $datos=$this->con->query($sql); 
				  
				} catch(PDOException $ex) {
				    echo "Error en la consulta"; 
				    some_logging_function($ex->getMessage());
				}
			return $datos;
		}
	}

 ?>

  