<!-- View Agregar -->
<?php if($_SESSION['session']){ 

$tipo_documentos= $clientes->listTipoDocumentos(); 
//var_dump($tipo_documentos->fetchAll(\PDO::FETCH_ASSOC));
$ciudades= $clientes->listCiudades(); 
	?>		
<h1>Agregar</h1>


 <div class="panel panel-success">
 	<div class="panel-heading">
 		<h3 class="panel-title">Agregar</h3>
 	</div>
 	<div class="panel-body">
		 		
 		
 	  <form role="form" action="" method="POST" enctype="multipart/form-data" >
 			<div class="form-group">
		 			<label for="tipo_documento">Tipo de Documento</label>
						<select class="form-control"  name="tipo_documento_id" id="tipo_documento" >
							<option value="0">----</option>
							<?php 
					 			 while ($row=$tipo_documentos->fetch(\PDO::FETCH_ASSOC)) {

					 			 	echo "<option value=".$row['id'].">".$row['tipo_documento']."</option>";
					 	   		}
					 		?>
							
								
						</select>
				 	  	
				 	  	<label for="documento">Documento</label>
				 	  	<input type="text" class="form-control" id="documento" required name="documento" >
				 	  	<label for="nombre">Nombres</label>
				 	  	<input type="text" class="form-control" id="nombre" required name="nombre" >
						
						<label for="celular">Celular</label>
				 	  	<input type="text" class="form-control" id="celular" required name="celular" >
				 	  <label for="fijo">Telefono</label>
				 	  	<input type="text" class="form-control" id="fijo" required name="telefono_fijo" >
				 	  


						<label for="direccion">Direccion</label>
				 	  	<input type="text" class="form-control" id="direccion" required name="direccion" >
				 	  	
				 	  	<label for="email">Correo</label>
				 	  	<input type="text" class="form-control" id="email" required name="email" >
				 	  	
						<label for="ciudades">Ciudad</label>
						<select class="form-control"  name="ciudades_id" id="ciudades" >
							<option value="0">----</option>
							<?php 
							while ($row=$ciudades->fetch(\PDO::FETCH_ASSOC)) { 
								echo "<option value=".$row['id'].">".$row['ciudad']."</option>";
								 } 

							?>
								
						</select>

		 	  	<br>
		 	  	<input class="btn btn-primary" type="submit" value="Guardar">
		 	  	 <a class="btn btn-primary" href="<?php echo URL; ?>clientes">Cancelar</a>
 			</div>
 	  </form>
 	</div>
 </div>
<?php }else{ ?>
<h2>No tienes permisos para ver este contenido</h2>
<?php } ?>
  
		