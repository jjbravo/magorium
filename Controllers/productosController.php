<?php  namespace Controllers;
use Models\Productos as Productos;
use Models\Formato AS Formato;
class productosController{
		private $productos;
		private $formato;
		public function __construct(){
			$this->productos= new Productos();
			$this->formato= new Formato();
		}
		public function index(){
			if($_POST){

				$this->productos->set("buscar",$_POST['buscar']);
				$datos=$this->productos->buscar();
				//var_dump($datos->fetch(\PDO::FETCH_ASSOC));
				return $datos;
				
			}
			$datos=$this->productos->listar();
			return $datos;
		}
		public function agregar(){	
			if(!$_POST){
				$datos=$this->formato->listar();
				return $datos;
			}else{
				$permitidos=array("image/jpeg","image/png","image/gif","image/jpg");
				$limite=700;
				if(in_array($_FILES['imagen']['type'],$permitidos) && $_FILES['imagen']['size']<=$limite*1024){
					$imagen=date('is').$_FILES['imagen']['name'];
					$ruta= ROOT . "media" .DS. "images" .DS. "productos" .DS. $imagen;
					//print $ruta;
					move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
					$this->productos->set("referencia",$_POST['referencia']);
					$this->productos->set("nombre",$_POST['nombre']);
					$this->productos->set("descripcion",$_POST['descripcion']);
					$this->productos->set("tipo",$_POST['tipo']);
					$this->productos->set("cantidad",$_POST['cantidad']);
					$this->productos->set("valor",$_POST['valor']);
					$this->productos->set("imagen",$imagen);
					$this->productos->set("formato_id",$_POST['formato_id']);
					$this->productos->add();
					header("Location: ".URL."productos");
				}
			}
		}
		public function editar($id){
			if(!$_POST){
			$this->productos->set("id",$id);
			$datos=$this->productos->view();
			return $datos;
			}else{

				$permitidos=array("image/jpeg","image/png","image/gif","image/jpg");
				$limite=700;
				$imagen=$_POST['imagenhiden'];
				if($_FILES){
					
					if(in_array($_FILES['imagen']['type'],$permitidos) && $_FILES['imagen']['size']<=$limite*1024){
						//$ruta= ROOT . "media" .DS. "images" .DS. "productos" .DS. $imagen;
						//unlink($ruta); //elimina el archivo viejo
						$imagen=date('is').$_FILES['imagen']['name'];
						$ruta= ROOT . "media" .DS. "images" .DS. "productos" .DS. $imagen;
						//print $ruta;
						move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
					}
				}
					$this->productos->set("id",$id);
					$this->productos->set("referencia",$_POST['referencia']);
					$this->productos->set("nombre",$_POST['nombre']);
					$this->productos->set("descripcion",$_POST['descripcion']);
					$this->productos->set("tipo",$_POST['tipo']);
					$this->productos->set("cantidad",$_POST['cantidad']);
					$this->productos->set("valor",$_POST['valor']);
					$this->productos->set("imagen",$imagen);
					$this->productos->set("formato_id",$_POST['formato_id']);
					$this->productos->edit();
					header("Location: ".URL."productos");
				 
			}
		}
		public function listFormatos(){
			$datos=$this->formato->listar();
			return $datos;
		}
		public function eliminar($id){
			
			if(!$_POST){
				$this->productos->set('id',$id);
				$data=$this->productos->verificaNoVendido();
				//var_dump($data);
				$datos=$this->productos->view();
				if($data){
					$datos['valida']=true;
					
				}else{
					$datos['valida']=false;
					
				}
				//$this->productos->set("id",$id);
				return $datos;
			}else{
				$this->productos->set("id",$_POST['id']);
				$this->productos->delete();

				header("Location: ".URL."estudiantes");
			}
		}
		public function ver($id){
			$this->productos->set("id",$id);
			$datos = $this->productos->view();
			return $datos;
		}


		public function ajax($parametro){
			switch ($parametro) {
				case 'formatos':
					$this->formato->set('tipo',$_POST['tipo']);
					$datos=$this->formato->getFormatosAjax();
					var_dump($datos);
					break;
				
				default:
					# code...
					print "Ho hay datos";
					break;
			}

			return $datos;
		}
	}

	$productos=new productosController();
 ?>


  