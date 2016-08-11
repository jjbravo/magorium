
		<!-- View Index -->
<?php if($_SESSION['session']){ ?>

<h1>Lista Clientes</h1>


	<div class="panel panel-default">
		<div class="panel-body">
		  <form action="" method="POST">
			 	<div class="col-md-2">
					 <label for="buscar">Buscar</label>
			 	</div>
			 	<div class="col-md-5">
			 		
					 <input id="buscar" class="form-control" type="text" name="buscar">

			 	</div>
			 	<div class="col-md-2">
					 <input type="submit" class="btn btn-success" value="Buscar">
			 		
			 	</div>
 </form>
		</div>
	</div>
 <div class="panel panel-success">


 	<div class="panel-heading">
 		<h3 class="panel-title">Lista de clientes</h3>
 	</div>
 	<div class="panel-body">
 	   <table class="table table-striped table-hover">
 	   	<thead>
 	   		<tr>
 	   			<th>Tipo de Documento</th>
 	   			<th>Documento</th>
 	   			<th>Nombres</th>
 	   			<th>Celular</th>
 	   			<th>Dirección</th>
 	   			<th>Email</th>
 	   			<th>Ciudad</th>
 	   			<th>Departamento</th>
 	   			<th>Acción</th>
 	   		</tr>
 	   	</thead>
 	   	<tbody>
 	   		<?php while ($row=$datos->fetch(\PDO::FETCH_ASSOC)) {

 	   		 ?>
 	   		<tr>
 	   			<td><?= $row['tipo_documento']?></td>
 	   			<td><?= $row['documento']?></td>
 	   			<td><a href="<?php echo URL; ?>/clientes/ver/<?= $row['id'] ?>"><?= $row['nombre']?></a></td>
 	   			<td><?= $row['celular']?></td>
 	   			<td><?= $row['direccion']?></td>
 	   			<td><?= $row['email']?></td>
 	   			<td><?= $row['ciudad']?></td>
 	   			<td><?= $row['departamento']?></td>
 	   			<td><a class="btn btn-primary " href="<?php echo URL; ?>clientes/editar/<?= $row['id']?>">Editar</a></td>
 	   			<td><a class="btn btn-danger " href="<?php echo URL; ?>clientes/eliminar/<?= $row['id']?>">Eliminar</a></td>
 	   			
 	   		</tr>
 	   			
 	   		<?php } ?>
 	   	
 	   	</tbody>
 	   </table>
 	   <a class="btn btn-primary" href="<?php echo URL; ?>clientes/agregar">Nuevo</a>

 	</div>
 </div>

<?php }else{ ?>
<h2>No tienes permisos para ver este contenido</h2>
<?php } ?>
  