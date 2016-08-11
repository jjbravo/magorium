<?php  namespace Config;
	
	class Request{
		private $controlador;
		private $metodo;
		private $argumento;

		public function __construct(){
			if(isset($_GET['url'])){
				$ruta=filter_input(INPUT_GET,'url', FILTER_SANITIZE_URL);

				$ruta=explode("/", $ruta); //explode convierte un string en varios string dode el string este dividido por el primer parametro '/'. recorre el string y donde encuetra / divide en otro string, generando un array de strings
				$ruta=array_filter($ruta); //array_filter — Filtra elementos de un array usando una función de devolución de llamada
				if($ruta[0]=='index.php'){
					$this->controlador="inicio";
				}else{
				$this->controlador=strtolower(array_shift($ruta)); //array_shift — Quita un elemento del principio del array y lo almacena en $this->controlador
				}		
				$this->metodo=strtolower(array_shift($ruta)); //array_shift — Quita un elemento del principio del array y lo almacena en $this->metodo
				if(!$this->metodo){
					$this->metodo = "index";
				}
				$this->argumento=$ruta; //para a $this->argumento el ultimo elemento que queda del array
			}else{
				$this->controlador="inicio";
				$this->metodo="index";
				}
			}
		public function getControlador(){
			return $this->controlador;
		}
		public function getMetodo(){
			return $this->metodo;
		}
		public function getArgumento(){
			return $this->argumento;
		}
	}

 ?>

 