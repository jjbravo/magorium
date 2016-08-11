<!-- View Editar -->
		<?php if($_SESSION['session']){ 

			$formatos=$productos->listFormatos();

			?>		
	

<h1>Editar </h1>


 <div class="panel panel-success">
 	<div class="panel-heading">
 		<h3 class="panel-title">Editar <?= $datos['nombre'] ?> </h3>
 	</div>
 	<div class="panel-body">
 		<div class="col-md-3">
 			<img class="avatar-editar" src="<?php echo MEDIA; ?>/images/productos/<?= $datos['imagen']?>" alt="<?= $datos['nombre']?>" title="<?= $datos['nombre']?>"> 
 		</div>
 		<div class="col-md-9">
 			
		 	  <form role="form" action="" method="POST" enctype="multipart/form-data" >
		 			<div class="form-group">
				 				
				 		<label for="referencia">Referencia</label>
		 	  	<input type="text" class="form-control" id="referencia" required name="referencia" value="<?=$datos['referencia'] ?>">
		
		 	  	<label for="nombre">Nombre</label>
		 	  	<input type="text" class="form-control" id="nombre" required name="nombre" value="<?=$datos['nombre'] ?>">

		 	  	<label for="descripcion">Descripción</label>
		 	  	<input type="text" class="form-control" id="descripcion" required name="descripcion" value="<?=$datos['descripcion'] ?>">

				<label for="cantidad">Cantidad</label>
		 	  	<input type="number" class="form-control" id="cantidad" required name="cantidad" value="<?=$datos['cantidad'] ?>">
		 	  	<label for="valor">Valor</label>
		 	  	<input type="text" class="form-control" id="valor" required name="valor" value="<?=$datos['valor'] ?>">
				
				<label for="tipo">Tipo</label>
		 	  	<select class="form-control"  name="tipo" id="tipo" >
							<option value="<?= $datos['tipo'] ?>"><?php if($datos['tipo']=='v'){echo "Videojuego";}else {echo "Pelicula";
								
							} ?></option>
							<option value="P">Pelicula</option>
							<option value="V">Videojuego</option>
				</select>
				<label for="formato">Formato</label>
				<select class="form-control"  name="formato_id" id="formato" >
							<option value="<?=$datos['formato_id'] ?>"><?= $datos['formato']?></option>
							<?php 
							while ($row=$formatos->fetch(\PDO::FETCH_ASSOC)) { 
								echo "<option value=".$row['id'].">".$row['formato']."</option>";
								 } 

							?>
								
						</select>
				
				 	  	<label for="imagen">imagen</label>
				 	  	<input type="hidden" class="form-control" id="idimagen" required name="imagenhiden" value="<?= $datos['imagen'] ?>">

				 	  	 <input class="btn btn-default" type="file" id="imagen" name="imagen" value="<?= ['imagen'] ?>"> 
				 	  	<br>
				 	  	<input class="btn btn-primary" type="submit" value="Guardar">
		 				 <a class="btn btn-primary" href="<?php echo URL; ?>#">Cancelar</a>
		 			</div>
		 	  </form>
 		</div>
 	</div>
 </div>
<?php }else{ ?>
<h2>No tienes permisos para ver este contenido</h2>
<?php } ?>
  