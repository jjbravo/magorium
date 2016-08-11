<?php namespace Config;
use Views\Template as Template;
	class Enrutador{
		public static function run(Request $request){
			$controlador=$request->getControlador()."Controller";
			$ruta= ROOT . "Controllers". DS . $controlador.".php";
			$metodo=$request->getMetodo();
			$argumento=$request->getArgumento();
			if($metodo=="index.php"){
					$metodo = "index";
				}
			if(is_readable($ruta)){ //si el archivo de la ruta se puede leer
				require_once $ruta;
				$contr = "Controllers\\".$controlador; //se crea una clase $contr de tipo Conntrollers\Controlador
				$controlador= new $contr; //crea un objeto $controller de tipo $contr
				if(!isset($argumento)){
					$datos=call_user_func(array($controlador,$metodo));
				}else{
					$datos=call_user_func_array(array($controlador,$metodo), $argumento);
				}
			}else{
				print "No existe el controlador ".$controlador;
			}
			//cargar vistas
			if($metodo!="ajax"){
				//print "Ajax method";
				$template = new Template();
				$ruta = ROOT."Views".DS.$request->getControlador().DS.$request->getMetodo().".php";
				$controlador=$request->getControlador();
			}else{
				$ruta = ROOT."Views".DS.$request->getControlador().DS.$request->getMetodo().DS.strtolower(array_shift($request->getArgumento())).".php";

			}	
			if(is_readable($ruta)){
				require_once $ruta;
			}else{
				print "No se encontro la vista ".$ruta;
			}
		}
	}

 
 ?>

  