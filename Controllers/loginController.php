<?php  namespace Controllers;
// session_start();

use Models\Login as Login;

	class loginController{
		private $login;
		
		public function __construct(){
			$this->login=new Login();
		} 
		public function index(){
			$_SESSION['session']=false;
			if($_POST){
				$this->login->set('username',$_POST['username']);
				$this->login->set('password',$_POST['password']);
				$datos=$this->login->login();
				if($datos){
					$_SESSION['usuario'] = $datos['username'];
					$_SESSION['session'] =true;
					$_SESSION['rol']=$datos['rol'];
					//print $datos['rol'];
					header("Location: ".URL."inicio");
				}else{
					$datos= true;
					return $datos;
				}

			}
					//print $_SESSION['usuario'];
			
		}
		public function salir(){
			session_destroy();
			header("Location: ".URL."login");
		}

	}


 ?>

  