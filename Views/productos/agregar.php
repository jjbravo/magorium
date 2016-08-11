<!-- View Agregar -->
<?php if($_SESSION['session']){ ?>	
<?php $formato=$productos->listFormatos(); ?>		
<h1>Agregar</h1>


 <div class="panel panel-success">
 	<div class="panel-heading">
 		<h3 class="panel-title">Agregar</h3>
 	</div>
 	<div class="panel-body">
 		
 	  <form role="form" action="" method="POST" enctype="multipart/form-data" >
 			<div class="form-group">
		 		<label for="referencia">Referencia</label>
		 	  	<input type="text" class="form-control" id="referencia" required name="referencia">
		
		 	  	<label for="nombre">Nombre</label>
		 	  	<input type="text" class="form-control" id="nombre" required name="nombre">

		 	  	<label for="descripcion">Descripción</label>
		 	  	<input type="text" class="form-control" id="descripcion" required name="descripcion">

				<label for="cantidad">Cantidad</label>
		 	  	<input type="number" class="form-control" id="cantidad" required name="cantidad">
		 	  	<label for="valor">Valor</label>
		 	  	<input type="text" class="form-control" id="valor" required name="valor">
				
				<label for="tipo">Tipo</label>
		 	  	<select class="form-control"  name="tipo" id="tipo" >
							<option value="0">----</option>
							<option value="P">Pelicula</option>
							<option value="V">Videojuego</option>
				</select>
				<label for="formato">Formato</label>
				<select class="form-control"  name="formato_id" id="formato" >
							<option value="0">----</option>
							<?php 
							while ($row=$datos->fetch(\PDO::FETCH_ASSOC)) { 
								echo "<option value=".$row['id'].">".$row['formato']."</option>";
								 } 

							?>
								
						</select>
				
				 	  	<label for="imagen">imagen</label>
				 	  	 <input class="btn btn-default" type="file" id="imagen" name="imagen" value="<?= ['imagen'] ?>"> 
				 	  	
		 	  		<br>
		 	  	<input class="btn btn-primary" type="submit" value="Guardar">
		 	  	 <a class="btn btn-primary" href="<?php echo URL; ?>productos">Cancelar</a>
 			</div>
 	  </form>
 	</div>
 </div>
<?php }else{ ?>
<h2>No tienes permisos para ver este contenido</h2>
<?php } ?>