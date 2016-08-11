<?php  namespace Controllers;
 use Models\Clientes as Clientes;
 use Models\TipoDocumento as TipoDocumento;
 use Models\Ciudades as Ciudades;
	class clientesController{
		private $cliente;
		private $tipoDocumento;
		private $ciudad;
		public function __construct(){
			$this->cliente= new Clientes();
			$this->tipoDocumento= new TipoDocumento();
			$this->ciudad=new Ciudades();
		}
		public function index(){
			if($_POST){

				$this->cliente->set("buscar",$_POST['buscar']);
				$datos=$this->cliente->buscar();
				//var_dump($datos->fetch(\PDO::FETCH_ASSOC));
				return $datos;
				
			}
			
			$datos=$this->cliente->listar();
			return $datos;
		}
		public function agregar(){	
			if(!$_POST){
				$datos=$this->tipoDocumento->listar();
				return $datos;
			}else{
				
					$this->cliente->set("documento",$_POST['documento']);
					$this->cliente->set("nombre",$_POST['nombre']);
					$this->cliente->set("telefono_fijo",$_POST['telefono_fijo']);
					$this->cliente->set("celular",$_POST['celular']);
					$this->cliente->set("direccion",$_POST['direccion']);
					$this->cliente->set("email",$_POST['email']);
					$this->cliente->set("ciudades_id",$_POST['ciudades_id']);
					$this->cliente->set("tipo_documento_id",$_POST['tipo_documento_id']);
					$this->cliente->add();
					header("Location: ".URL."clientes");
				
			}
		}
		public function editar($id){
			if(!$_POST){
			$this->cliente->set("id",$id);
			$datos=$this->cliente->view();
			return $datos;
			}else{

				
					$this->cliente->set("id",$id);
					$this->cliente->set("documento",$_POST['documento']);
					$this->cliente->set("nombre",$_POST['nombre']);
					$this->cliente->set("telefono_fijo",$_POST['telefono_fijo']);
					$this->cliente->set("celular",$_POST['celular']);
					$this->cliente->set("direccion",$_POST['direccion']);
					$this->cliente->set("email",$_POST['email']);
					$this->cliente->set("ciudades_id",$_POST['ciudades_id']);
					$this->cliente->set("tipo_documento_id",$_POST['tipo_documento_id']);
					$this->cliente->edit();
					header("Location: ".URL."clientes");
				 
			}
		}
		public function listTipoDocumentos(){
			$datos=$this->tipoDocumento->listar();
			return $datos;
		}
		public function listCiudades(){
			$datos=$this->ciudad->listar();
			return $datos;
		}
		public function eliminar($id){
			if(!$_POST){
				$this->cliente->set("id",$id);
				$datos=$this->cliente->view();
				return $datos;
			}else{
				$this->cliente->set("id",$id);
				$this->cliente->delete();

				header("Location: ".URL."clientes");
			}
		}
		public function ver($id){
			$this->cliente->set("id",$id);
			$datos = $this->cliente->view();
			return $datos;
		}

		
	}

	$clientes=new clientesController();
 ?>


  