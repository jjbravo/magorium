
  
		<!-- View Eliminar -->
		<?php if($_SESSION['session']){ ?>
<h1>Eliminar </h1>


 <div class="panel panel-success">
 	<div class="panel-heading">
 		<h3 class="panel-title">Eliminar <?= $datos['nombre'] ?> </h3>
 	</div>
 	<div class="panel-body">
 		<div class="alert alert-danger">
 			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 			<strong>Cuidado!!</strong> Se eliminara permanentemente el registro
 		</div>
 		<div class="col-md-3">
 			<img class="avatar-editar" src="<?php echo MEDIA; ?>/images/avatar/<?= $datos['imagen']?>" alt="<?= $datos['nombre']?>" title="<?= $datos['nombre']?>"> 
 		</div>
 		<div class="col-md-9">
 			<table class="table table-striped table-hover">
		 	   
		 	   	<tbody>
		 	   		
		 	   		<tr>
		 	   			
		 	   		<tr><th>Documento</th><td><?= $datos['documento']?></td></tr>
		 	   		<tr><th>Nombres</th><td><?= $datos['nombre']?></td> </tr>
		 	   		<tr><th>Celular</th><td><?= $datos['celular']?></td></tr>
		 	   		<tr><th>Dirección</th><td><?= $datos['direccion']?></td></tr>
		 	   		<tr><th>Correo</th><td><?= $datos['email']?></td></tr>
		 	   		<tr><th>Ciudad</th><td><?= $datos['ciudad']?></td></tr>
		 	   		<tr><th>Tipo de Documento</th><td><?= $datos['tipo_documento']?></td></tr>
		 	   			
		 	   			
		 	   		</tr>
		 	   			
		 	   		
		 	   	
		 	   	</tbody>
		 	   </table>
		 	  <form role="form" action="" method="POST" enctype="multipart/form-data" >
		 			<input type="hidden" name="id" value="<?= $datos['id']?>">
				 	  	<input class="btn btn-danger" type="submit" value="Eliminar">
		 	   	   <a class="btn btn-primary" href="<?php echo URL; ?>#">Cancelar</a>
		 			
		 	  </form>

 		</div>
 	</div>
 </div>
<?php }else{ ?>
<h2>No tienes permisos para ver este contenido</h2>
<?php } ?>
  
		