<?php  namespace Controllers;
 use Models\Compras as Compras;
 use Models\Productos as Productos;
 use Models\DetalleCompra as DetalleCompra;
 use Models\Clientes as Clientes;
	class comprasController{
		private $compras;
		private $productos;
		private $clientes;

		private $carrito=array();
		private $total=0;
		private $contador=0;


		public function __construct(){
			$this->compras= new Compras();
			$this->productos= new Productos();
			$this->clientes= new Clientes();
			$this->detalleCompra= new DetalleCompra();
		}
		public function index(){

			$datos=$this->compras->listar();
			return $datos;
		}
		public function agregar(){	
			if($_POST){
				
				
				$this->compras->set('total',$_SESSION['total']);
				$this->compras->set('cliente_id',$_POST['cliente_id']);
				$idcompra=$this->compras->add();

				foreach ($_SESSION['carrito'] as $key => $value) {
					 	# code...
					 
					$this->detalleCompra->set('cantidad',$value['cantidad']);
					$this->detalleCompra->set('subtotal',$value['valor']*$value['cantidad']);
					$this->detalleCompra->set('compras_id',$idcompra);
					$this->detalleCompra->set('productos_id',$value['id']);
					$this->detalleCompra->add();
 					
					 } 
			
					$_SESSION['carrito']=array();
					$this->carrito=array();
					$_SESSION['total']=0;
				header("Location: ".URL."compras");
				
				//return $datos;
			}
		}
		public function editar($id){
			
		}
		public function vercompra($id){
			$this->compras->set('id',$id);
			$datos=$this->compras->view();
			return $datos;
		}

		public function verDetalle($id){
			$this->detalleCompra->set('compras_id',$id);
			$datos=$this->detalleCompra->getDetalle();
			
			return $datos;

		}
		public function verClientes(){
			$datos=$this->clientes->listar();
			return $datos;
		}
		
		public function eliminar($id){
			
			if(!$_POST){
				$this->estudiante->set("id",$id);
				$datos=$this->estudiante->view();
				return $datos;
			}else{
				$this->estudiante->set("id",$id);
				$this->estudiante->delete();

				header("Location: ".URL."compras");
			}
		}
		public function ver($id){
			$this->compras->set("id",$id);
			$datos = $this->compras->view();
			return $datos;
		}

		public function ajax($dato){

			switch ($dato) {
				case 'comprar':
				
					
				
					$this->carrito[$_POST['producto']]=array('id'=>$_POST['id'],'producto'=>$_POST['producto'],'valor'=>$_POST['valor'],'cantidad'=>$_POST['cantidad']);

					$_SESSION['carrito']+=$this->carrito;
					//$_SESSION['carrito']=$this->carrito;
					
					$total=0;
					$totalcantidad=0;
					foreach ($_SESSION['carrito'] as $value) {
						# code...
						//print $value['cantidad']."<br>";
						$total=$total+$value['valor']*$value['cantidad'];
						$totalcantidad=$totalcantidad+$value['cantidad'];
					}
					$_SESSION['total']=$total;
					$_SESSION['cantidad']=$totalcantidad;
					//echo "Productos ".$_SESSION['total']."<br>";
					//echo "Total ".$_SESSION['cantidad']."<br>";
					/*
					$this->carrito[$_POST['producto']]=array('id'=>$_POST['id'],'valor'=>$_POST['valor'],'cantidad'=>$_POST['cantidad']);
					
					foreach ($this->carrito as $key => $value) {

						$this->total+=$value['valor']*$value['cantidad'];
						$_SESSION['total']+=$this->total;
					}
					
					print_r(array_keys($_SESSION['carrito']));
					*/
					break;
				case 'vaciar':
					$_SESSION['carrito']=array();
					$this->carrito=array();
					$_SESSION['total']=0;
					break;
				default:
					# code...
					print "No hay Datos";
					break;
			}
			//print $_SESSION['total'] ;

			//print "<br>"; 
			//var_dump($_SESSION['carrito']);
			//print_r($_SESSION['carrito']);
		}
	}

	$compras=new comprasController();
 ?>


  