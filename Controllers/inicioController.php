<?php  namespace Controllers;
use Models\Productos as Productos;
	class inicioController{
		private $productos;
		public function __construct(){
					$this->productos=new Productos();
		}
		public function index(){
		$datos=$this->productos->listar();
		return $datos;	
		}

	}
		
 ?>


  