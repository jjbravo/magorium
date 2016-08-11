
		<!-- View Ver -->
<?php if($_SESSION['session']){ ?>	
<h1>Clientes</h1>


 <div class="panel panel-success">
 	<div class="panel-heading">
 		<h3 class="panel-title">Ver <?= $datos['nombre'] ?> </h3>
 	</div>
 	<div class="panel-body">
 		<div class="col-md-3">
 			<img class="avatar-editar" src="<?php echo MEDIA; ?>/images/avatar/<?= $datos['imagen']?>" alt="<?= $datos['nombre']?>" title="<?= $datos['nombre']?>"> 
 		</div>
 		<div class="col-md-9">
 			
		 	  <table class="table table-striped table-hover">
		 	   
		 	   	<tbody>
		 	   		
		 	   		<tr><th>Documento</th><td><?= $datos['documento']?></td></tr>
		 	   		<tr><th>Nombres</th><td><?= $datos['nombre']?></td> </tr>
		 	   		<tr><th>Celular</th><td><?= $datos['celular']?></td></tr>
		 	   		<tr><th>Dirección</th><td><?= $datos['direccion']?></td></tr>
		 	   		<tr><th>Correo</th><td><?= $datos['email']?></td></tr>
		 	   		<tr><th>Ciudad</th><td><?= $datos['ciudad']?></td></tr>
		 	   		<tr><th>Tipo de Documento</th><td><?= $datos['tipo_documento']?></td></tr>
		 	   			
		 	   			
		 	   		
		 	   			
		 	   		
		 	   	
		 	   	</tbody>
		 	   </table>
		 	<a class="btn btn-primary" href="<?php echo URL; ?>clientes/editar/<?= $datos['id']?>">Editar</a>
			<a class="btn btn-primary" href="<?php echo URL; ?>clientes/">Cancelar</a>

 		</div>
 	</div>
 </div>

<?php }else{ ?>
<h2>No tienes permisos para ver este contenido</h2>
<?php } ?>
  		