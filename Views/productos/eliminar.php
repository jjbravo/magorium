<!-- View Eliminar -->
		<?php if($_SESSION['session']){ ?>
<h1>Eliminar </h1>


 <div class="panel panel-success">
 	<div class="panel-heading">
 		<h3 class="panel-title">Eliminar <?= $datos['nombre'] ?> </h3>
 	</div>
 	<div class="panel-body">

 		<?php 
 			if($datos['valida']){ ?>
					<div class="alert alert-info">
 			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 			<strong>Informaciòn </strong> No se puede eliminar el registro, este se encuentra en la lista de ventas
 		</div>
 		<?php	}else{
 			?>
 		<div class="alert alert-danger">
 			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 			<strong>Cuidado!!</strong> Se eliminara permanentemente el registro
 		</div>

 	<?php	}

 		 ?>
 		<div class="col-md-3">
 			<img class="avatar-editar" src="<?php echo MEDIA; ?>/images/productos/<?= $datos['imagen']?>" alt="<?= $datos['nombre']?>" title="<?= $datos['nombre']?>"> 
 		</div>
 		<div class="col-md-9">
 			<table class="table table-striped table-hover">
		 	   	<thead>
		 	   		<tr>
		 	   			
		 	   			<th>Referencia</th>
		 	   			<th>Nombres</th>
		 	   			<th>Descripcion</th>
		 	   			<th>Tipo</th>
		 	   			<th>Cantidad</th>
		 	   			<th>Valor</th>
		 	   			<th>Formato</th>
		 	   		</tr>
		 	   	</thead>
		 	   	<tbody>
		 	   		
		 	   			
		 	   			
		 	   		<tr>
		 	   		<td><?= $datos['referencia']?></td> 
		 	   		<td><?= $datos['nombre']?></td> 
		 	   		<td><?= $datos['descripcion']?></td>
		 	   		<td><?php if($datos['tipo']=='v'){echo "Videojuego";}else {echo "Pelicula";} ?></td>
		 	   		<td><?= $datos['cantidad']?></td>
		 	   		<td><?= $datos['valor']?></td>
		 	   		<td><?= $datos['formato']?></td>
		 	   	
		 	   		</tr>	
		 	   			
		 	   			
		 	   		
		 	   	
		 	   	</tbody>
		 	   </table>
		 	  <form role="form" action="" method="POST" enctype="multipart/form-data" >
		 			<input type="hidden" name="id" value="<?= $datos['id']?>">
		 			<?php 
 			if($datos['valida']){ ?>
					
				 	  	<input class="btn btn-danger" disabled="" type="submit" value="Eliminar">
 		<?php	}else{
 			?>
 		
 			
				 	  	<input class="btn btn-danger" type="submit" value="Eliminar">
 	<?php	}

 		 ?>
		 	   	   <a class="btn btn-primary" href="<?php echo URL; ?>productos">Cancelar</a>
		 			
		 	  </form>

 		</div>
 	</div>
 </div>
<?php }else{ ?>
<h2>No tienes permisos para ver este contenido</h2>
<?php } ?>
  
  