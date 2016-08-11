
		<!-- View Editar -->
<?php 
if($_SESSION['session']){ 

$tipo_documentos= $clientes->listTipoDocumentos(); 
$ciudades= $clientes->listCiudades(); 

 ?>

<h1>Editar</h1>


 <div class="panel panel-success">
 	<div class="panel-heading">
 		<h3 class="panel-title">Editar <?= $datos['nombre'] ?> </h3>
 	</div>
 	<div class="panel-body">
 		<div class="col-md-3">
 			<img class="avatar-editar" src="<?php echo MEDIA; ?>/images/avatar/<?= $datos['imagen']?>" alt="<?= $datos['nombre']?>" title="<?= $datos['nombre']?>"> 
 		</div>
 		<div class="col-md-9">
		 	  <form role="form" action="" method="POST" enctype="multipart/form-data" >
		 			<div class="form-group">
				 				
						<label for="tipo_documento">Tipo de Documento</label>
						
						<select class="form-control"  name="tipo_documento_id" id="tipo_documento_id" >
							<option value="<?= $datos['id_tipo_documento'] ?>"><?= $datos['tipo_documento'] ?></option>
 			

				<?php 
 			 while ($row=$tipo_documentos->fetch(\PDO::FETCH_ASSOC)) { ?>
 			 	<option value="<?=$row['id']?>"><?=$row['tipo_documento']?></option>
 	   		
 	   		<?php 
 	   			}
 			 ?>



 			 
								
						</select>
 			



				 	  	<label for="documento">Documento</label>
				 	  	<input type="text"  class="form-control" id="documento" required name="documento" value="<?= $datos['documento'] ?>">
				 	  	<label for="nombre">Nombres</label>
				 	  	<input type="text" class="form-control" id="nombre" required name="nombre" value="<?= $datos['nombre'] ?>">
						
						<label for="celular">Celular</label>
				 	  	<input type="text" class="form-control" id="celular" required name="celular" value="<?= $datos['celular'] ?>">
				 	   <label for="fijo">Telefono</label>
				 	  	<input type="text" class="form-control" id="fijo" required name="telefono_fijo" value="<?= $datos['telefono_fijo'] ?>">
				 	  

						<label for="direccion">Direccion</label>
				 	  	<input type="text" class="form-control" id="direccion" required name="direccion" value="<?= $datos['direccion'] ?>">
				 	  	
				 	  	<label for="email">Correo</label>
				 	  	<input type="text" class="form-control" id="email" required name="email" value="<?= $datos['email'] ?>">
				 	  	
						<label for="ciudades">Ciudad</label>
						<select class="form-control"  name="ciudades_id" id="ciudades" >
							<option value="<?= $datos['ciudades_id'] ?>"><?= $datos['ciudad'] ?></option>
							<?php 
							while ($row=$ciudades->fetch(\PDO::FETCH_ASSOC)) { 
								echo "<option value=".$row['id'].">".$row['ciudad']."</option>";
								 } 

							?>
								
						</select>

				 	  	<label for="departamento">Departamento</label>
				 	  	<input type="text" class="form-control" id="departamento" required name="departamento" value="<?= $datos['departamento'] ?>">
				 	  <input type="hidden" class="form-control" id="id" required name="id" value="<?= ['id'] ?>">
				 	  <input type="hidden" class="form-control" id="id" required name="avatar" value="<?= ['imagen'] ?>">

				 	  	
						<br>
				 	  	<input class="btn btn-primary" type="submit" value="Guardar">
		 				 <a class="btn btn-primary" href="<?php echo URL; ?>clientes">Cancelar</a>
		 			</div>
		 	  </form>
 		</div>
 	</div>
 </div>
<?php }else{ ?>
<h2>No tienes permisos para ver este contenido</h2>
<?php } ?>
  
		