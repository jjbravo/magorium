<?php namespace Models;
	class DetalleCompra{
		/* ATRIBUTOS DE LA TABLA */
		private $id;
		private $cantidad;
		private $subtotal;
		private $compras_id;
		private $productos_id;
		

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

		public function getDetalle(){
			$sql="SELECT t1.*,t2.nombre as nombre_producto,t2.valor as valor FROM detalle_compra t1 JOIN productos t2  WHERE t1.productos_id=t2.id AND compras_id={$this->compras_id}";
			$datos=$this->con->queryObjects($sql);
			return $datos;
		}
		public function listar(){
			$sql="SQL";
			//$sql="SELECT t1.*, t2.idarea AS idarea, t2.area AS area FROM docentes t1 JOIN areas t2 WHERE t1.idarea=t2.idarea";

			$datos=$this->con->queryObjects($sql);
			return $datos;
		}

		public function add(){
			$sql="INSERT INTO detalle_compra VALUES(null,{$this->cantidad},{$this->subtotal},{$this->compras_id},{$this->productos_id})";
			//$sql="INSERT INTO docentes VALUES(null,{$this->codigo},'{$this->nombre}','{$this->telefono}','{$this->direccion}',{$this->idarea} )";

			$this->con->querySet($sql);
							
		}

		public function delete(){
			$sql="SQL";
			//$sql="DELETE FROM docentes WHERE iddocentes='{$this->iddocentes}'";

			$this->con->querySet($sql);

		}
		public function edit(){
			$sql="SQL";
			//$sql="UPDATE docentes SET codigo='{$this->codigo}', nombre='{$this->nombre}', telefono='{$this->telefono}', direccion='{$this->direccion}', idarea={$this->idarea} WHERE iddocentes={$this->iddocentes} ";

			$this->con->querySet($sql);
		}
		public function view(){
			$sql="SQL";
			//$sql="SELECT t1.*, t2.idarea AS idarea, t2.area AS area FROM docentes t1 JOIN areas t2 WHERE t1.idarea=t2.idarea AND t1.iddocentes='{$this->iddocentes}'";

			$datos=$this->con->queryObjects($sql);
			$row=$datos->fetch(\PDO::FETCH_ASSOC);
			return $row;
		}

		public function buscar(){
			$sql="SQL";
			//$sql="SELECT t1.*, t2.idarea AS idarea, t2.area AS area FROM docentes t1 JOIN areas t2 WHERE t1.idarea=t2.idarea AND (t1.codigo LIKE '%{$this->buscar}%' OR t1.nombre LIKE '%{$this->buscar}%' )";
			$datos=$this->con->queryObjects($sql);
			return $datos;
		}

		/*
		TIGGERS

		DELIMITER //
		CREATE TRIGGER docentes_AU_Trigger
		AFTER UPDATE ON docentes FOR EACH ROW
		begin
		INSERT INTO log_updates_docentes(descripcion)
		values(CONCAT('Update ','(',
		OLD.codigo,' , ',OLD.nombre,' ) por ',
		'(',NEW.codigo,' , ',NEW.nombre,' )'
		));
		END//
		DELIMITER ;

		*/
	}

 ?>
  