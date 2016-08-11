<?php namespace Models;
	class Productos{
		/* ATRIBUTOS DE LA TABLA */
		private $id;
		private $referencia;
		private $nombre;
		private $descripcion;
		private $tipo;
		private $cantidad;
		private $valor;
		private $imagen;
		private $formato_id;
		private $buscar;
		

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
		public function listar(){
			$sql="SELECT t1.*, t2.id as idformato,t2.formato as formato FROM productos t1 JOIN formato t2 WHERE t1.formato_id=t2.id";
			//$sql="SELECT t1.*, t2.idarea AS idarea, t2.area AS area FROM docentes t1 JOIN areas t2 WHERE t1.idarea=t2.idarea";

			$datos=$this->con->queryObjects($sql);
			return $datos;
		}

		public function add(){
			$sql="INSERT INTO productos VALUES(null,'{$this->referencia}','{$this->nombre}','{$this->descripcion}','{$this->tipo}',{$this->cantidad},{$this->valor},'{$this->imagen}',{$this->formato_id})";
			//$sql="INSERT INTO docentes VALUES(null,{$this->codigo},'{$this->nombre}','{$this->telefono}','{$this->direccion}',{$this->idarea} )";
			//print $sql;
			$this->con->querySet($sql);
				
		}

		public function delete(){
			$sql="DELETE FROM productos WHERE id={$this->id}";
			//$sql="DELETE FROM docentes WHERE iddocentes='{$this->iddocentes}'";

			$this->con->querySet($sql);

		}
		public function edit(){
			$sql="UPDATE productos SET referencia='{$this->referencia}',nombre='{$this->nombre}',descripcion='{$this->descripcion}' ,tipo='{$this->tipo}',cantidad={$this->cantidad},valor={$this->valor},imagen='{$this->imagen}',formato_id={$this->formato_id} WHERE id={$this->id} ";
			//$sql="UPDATE docentes SET codigo='{$this->codigo}', nombre='{$this->nombre}', telefono='{$this->telefono}', direccion='{$this->direccion}', idarea={$this->idarea} WHERE iddocentes={$this->iddocentes} ";
			//print $sql;
			$this->con->querySet($sql);
		}
		public function view(){
			$sql="SELECT t1.*, t2.id as idformato,t2.formato as formato FROM productos t1 JOIN formato t2 WHERE t1.formato_id=t2.id AND t1.id={$this->id}";
			//$sql="SELECT t1.*, t2.idarea AS idarea, t2.area AS area FROM docentes t1 JOIN areas t2 WHERE t1.idarea=t2.idarea AND t1.iddocentes='{$this->iddocentes}'";

			$datos=$this->con->queryObjects($sql);
			$row=$datos->fetch(\PDO::FETCH_ASSOC);
			return $row;
		}

		public function buscar(){
			
			$sql="SELECT t1.*, t2.id as idformato,t2.formato as formato FROM productos t1 JOIN formato t2 WHERE t1.formato_id=t2.id AND (t1.referencia LIKE '%{$this->buscar}%' OR t1.nombre LIKE '%{$this->buscar}%' OR t1.descripcion LIKE '%{$this->buscar}%')";
			//$sql="SELECT t1.*, t2.idarea AS idarea, t2.area AS area FROM docentes t1 JOIN areas t2 WHERE t1.idarea=t2.idarea AND (t1.codigo LIKE '%{$this->buscar}%' OR t1.nombre LIKE '%{$this->buscar}%' )";
			$datos=$this->con->queryObjects($sql);
			return $datos;
		}

		public function verificaNoVendido(){
			$sql="SELECT cantidad FROM detalle_compra WHERE productos_id={$this->id} ";
			$datos=$this->con->queryObjects($sql);
			$row=$datos->fetch(\PDO::FETCH_ASSOC);
			return $row;	
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
  