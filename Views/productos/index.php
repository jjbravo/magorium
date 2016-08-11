		<!-- View Index -->
		<?php if($_SESSION['session']){ 
			//print $_SESSION['rol'];
			?>
<div class="carrito">
	 <a id="vaciar" class="btn btn-success btn-sm" href="#">Vaciar el carrito</a>
	
	 <p>Total <span id="total" ><?= $_SESSION['total'] ?></span></p><br>
	 <a id="comprar" class="btn btn-success btn-sm" href="<?php echo URL ?>compras/agregar">Confirmar</a>
	
</div>
<h1><?php echo ucfirst($controlador); ?></h1>

	<div class="panel panel-default">
		<div class="panel-body">
 <div class="row">
	<div class="col-md-8">
		
		  <form action="" method="POST">
			 	<div class="col-md-2">
					 <label for="buscar">Buscar</label>
			 	</div>
			 	<div class="col-md-6">
			 		
					 <input id="buscar" class="form-control" type="text" name="buscar">

			 	</div>
			 	<div class="col-md-2">
					 <input type="submit" class="btn btn-success" value="Buscar">
			 		
			 	</div>
 </form>
	</div>
	 	
	<div class="col-md-4">
		
	</div>
 </div>
		</div>
	</div>
	
 <div class="panel panel-success">
 	<div class="panel-heading">
 		<h3 class="panel-title">Lista</h3>
 	</div>
 	<div class="panel-body">
 	   <table class="table table-striped table-hover">
 	   	<thead>
 	   		<tr>
 	   			<th>Imágen</th>
 	   			<th>Referencia</th>
 	   			<th>Nombre</th>
 	   			<th>Comprar</th>
 	   			<th>Descripción</th>
 	   			<th>Tipo</th>
 	   			<th>Cantidad</th>
 	   			<th>Valor</th>
 	   			<th>Formato</th>
 	   			<th>Acción</th>
 	   		</tr>
 	   	</thead>
 	   	<tbody>
 	   		<?php while ($row=$datos->fetch(\PDO::FETCH_ASSOC)) {

 	   		 ?>
 	   		<tr>
 	   			<td><a href="<?php echo URL; ?>/productos/ver/<?= $row['id'] ?>"><img class="avatar" src="<?php echo MEDIA ?>/images/productos/<?= $row['imagen']?>" alt=""></a> </td>
 	   			<td><?= $row['referencia']?></td>
 	   			<td><a href="<?php echo URL; ?>/productos/ver/<?= $row['id'] ?>"><?= $row['nombre']?></a></td>
 	   			<td><?= $row['descripcion']?></td>
 	   			<td><?php if($row['tipo']=='V'){echo "Videojuego";}else {echo "Pelicula";} ?></td>
 	   			<td><?= $row['cantidad']?></td>
 	   			<td><?= $row['valor']?></td>
 	   			<td><?= $row['formato']?></td>
 	   			<td><a class="btn btn-primary " href="<?php echo URL; ?>productos/editar/<?= $row['id']?>">Editar</a></td>
 	   			<?php if($_SESSION['rol']=='admin'){ ?>

 	   			<td><a class="btn btn-danger " href="<?php echo URL; ?>productos/eliminar/<?= $row['id']?>">Eliminar</a></td>
 	   				
 	   			<?php }?>
 	   			
 	   		</tr>
 	   			
 	   		<?php } ?>
 	   	
 	   	</tbody>
 	   </table>
 	   <a class="btn btn-primary" href="<?php echo URL; ?>productos/agregar">Nuevo </a>

 	</div>
 </div>

<?php }else{ ?>
<h2>No tienes permisos para ver este contenido</h2>
<?php } ?>
  