		<!-- View Index -->
		<?php if($_SESSION['session']){ ?>

<h1><?php echo ucfirst($controlador); ?></h1>


	
 	   <a class="btn btn-primary" href="<?php echo URL; ?>productos">Nuevo venta </a>
 	   <br><br>
 <div class="panel panel-success">
 	<div class="panel-heading">
 		<h3 class="panel-title">Lista</h3>
 	</div>
 	<div class="panel-body">
 	   <table class="table table-striped table-hover">
 	   	<thead>
 	   		<tr>
 	   			<th>No</th>
 	   			<th>Ver detalle</th>
 	   			<th>Fecha</th>
 	   			<th>Total</th>
 	   			<th>Cliente</th>
 	   			
 	   			
 	   		</tr>
 	   	</thead>
 	   	<tbody>
 	   		<?php while ($row=$datos->fetch(\PDO::FETCH_ASSOC)) {

 	   		 ?>
 	   		<tr>
 	   		
 	   			<td><a href="<?php echo URL; ?>/compras/ver/<?= $row['id'] ?>">00<?= $row['id']?></a></td>
 	   			<td><a class="btn btn-xs btn-success" href="<?php echo URL; ?>/compras/vercompra/<?= $row['id'] ?>">Ver detalle</a></td>
 	   			<td><?= $row['fecha']?></td>
 	   			<td><?= $row['total']?></td>
 	   			<td><?= $row['nombre_cliente']?></td>
 	   			<!--
 	   			<td><a class="btn btn-primary " href="<?php echo URL; ?>compras/editar/<?= $row['id']?>">Editar</a></td>
 	   			<td><a class="btn btn-danger " href="<?php echo URL; ?>compras/eliminar/<?= $row['id']?>">Eliminar</a></td>
 	   			-->
 	   		</tr>
 	   			
 	   		<?php } ?>
 	   	
 	   	</tbody>
 	   </table>

 	</div>
 </div>

<?php }else{ ?>
<h2>No tienes permisos para ver este contenido</h2>
<?php } ?>
  