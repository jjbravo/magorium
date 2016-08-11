<?php namespace Models;

	class Login{
		private $id;
		private $username;
		private $password;
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

		public function login(){
			$pass=md5($this->password);
			//print $pass;
			$sql="SELECT t1.*, t2.id as idrol,t2.rol as rol FROM usuarios t1 JOIN roles t2 WHERE t1.roles_id=t2.id AND username = '{$this->username}' AND password = '{$pass}'";
			$datos=$this->con->queryObjects($sql);
			$row=$datos->fetch(\PDO::FETCH_ASSOC);
			return $row;
		}	

	}




 ?>
  