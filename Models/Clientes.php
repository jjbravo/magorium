<?php namespace Models;
	class Clientes{
		private $id;
		private $documento;
		private $nombre;
		private $telefono_fijo;
		private $celular;
		private $direccion;
		private $email;
		private $ciudades_id;
		private $tipo_documento_id;
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
			$sql="SELECT clientes.* , tipo_documento.tipo_documento AS tipo_documento, tipo_documento.id AS id_tipo_documento , ciudades.ciudad AS ciudad, ciudades.id AS id_ciudad, 
departamentos.departamento AS departamento, departamentos.id AS id_departamento, paises.pais AS pais, paises.id AS id_pais
FROM tipo_documento JOIN clientes JOIN ciudades JOIN departamentos JOIN paises 
WHERE tipo_documento.id=clientes.tipo_documento_id AND clientes.ciudades_id=ciudades.id AND ciudades.departamentos_id=departamentos.id AND departamentos.paises_id=paises.id";
			$datos=$this->con->queryObjects($sql);
			return $datos;
		}

		public function add(){
			$sql="INSERT INTO clientes VALUES 
					(null,
				'{$this->documento}',
				'{$this->nombre}',
				'{$this->telefono_fijo}',
				'{$this->celular}',
				'{$this->direccion}',
				'{$this->email}',
				'{$this->ciudades_id}',
				'{$this->tipo_documento_id}'
				)";

	
			$this->con->querySet($sql);
				
		}

		public function delete(){
			$sql="DELETE FROM clientes WHERE id='{$this->id}'";
			$this->con->querySet($sql);

		}
		public function edit(){
			$sql="UPDATE clientes SET 
			documento='{$this->documento}', 
			nombre='{$this->nombre}', 
			telefono_fijo='{$this->telefono_fijo}', 
			celular='{$this->celular}',
			direccion='{$this->direccion}',
			email='{$this->email}', 
			ciudades_id='{$this->ciudades_id}', 
			tipo_documento_id='{$this->tipo_documento_id}'
			 WHERE id='{$this->id}'";
			 //print $sql;
			$this->con->querySet($sql);
		}
		public function view(){
			$sql="SELECT clientes.* , tipo_documento.tipo_documento AS tipo_documento, tipo_documento.id AS id_tipo_documento , ciudades.ciudad AS ciudad, ciudades.id AS id_ciudad, 
departamentos.departamento AS departamento, departamentos.id AS id_departamento, paises.pais AS pais, paises.id AS id_pais
FROM tipo_documento JOIN clientes JOIN ciudades JOIN departamentos JOIN paises 
WHERE tipo_documento.id=clientes.tipo_documento_id AND clientes.ciudades_id=ciudades.id AND ciudades.departamentos_id=departamentos.id AND departamentos.paises_id=paises.id AND clientes.id='{$this->id}'";
			$datos=$this->con->queryObjects($sql);

			$row=$datos->fetch(\PDO::FETCH_ASSOC);
			return $row;
		}

		public function buscar(){
			$sql="SELECT clientes.* , tipo_documento.tipo_documento AS tipo_documento, tipo_documento.id AS id_tipo_documento , ciudades.ciudad AS ciudad, ciudades.id AS id_ciudad, 
departamentos.departamento AS departamento, departamentos.id AS id_departamento, paises.pais AS pais, paises.id AS id_pais
FROM tipo_documento JOIN clientes JOIN ciudades JOIN departamentos JOIN paises 
WHERE tipo_documento.id=clientes.tipo_documento_id AND clientes.ciudades_id=ciudades.id AND ciudades.departamentos_id=departamentos.id AND departamentos.paises_id=paises.id AND (clientes.nombre LIKE '%{$this->buscar}%' OR clientes.documento LIKE '%{$this->buscar}%' OR clientes.celular LIKE '%{$this->buscar}%')";
			$datos=$this->con->queryObjects($sql); 
			return $datos;
		}
	}

 ?>
  