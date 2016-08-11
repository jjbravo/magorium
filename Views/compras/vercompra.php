<!-- View Ver -->
		<?php if($_SESSION['session']){ 

		$detalle=$compras->verDetalle($datos['id']);
			?>
<h1>Ver </h1>


 <div class="panel panel-success">
 	<div class="panel-heading">
 		<h3 class="panel-title">Cliente <b><?= $datos['nombre_cliente']?></b> No Factura <b style="color:red;">00<?= $datos['id']?> </b> </h3>
 	</div>
 	<div class="panel-body">
 		
 		<div class="col-md-12">

		 	  <table class="table table-striped table-hover">
		 	  	<thead>
 	   		<tr>
 	   			<th>Producto</th>
 	   			<th>Valor unitario</th>
 	   			<th>Cantidad</th>
 	   			<th>Subtotal</th>
 	   			
 	   			
 	   		</tr>
 	   	</thead>
 	   	<tbody>
 	   		<?php while ($row=$detalle->fetch(\PDO::FETCH_GROUP)) {
 	   			
 	   			
 	   		 ?>
 	   		<tr>
 	   		
 	   			
 	   			<td><?= $row['nombre_producto']?></td>
 	   			<td><?= $row['valor']?></td>
 	   			<td><?= $row['cantidad']?></td>
 	   			<td><?= $row['subtotal']?></td>
 	   			
 	   		</tr>
 	   			
 	   		<?php } ?>
 	   		<tr><td></td><td></td><th>TOTAL </th><th><?=$datos['total'] ?></th></tr>
 	   	</tbody>
 	   </table>
		 	
 		</div>
 	</div>
 </div>

 	  <a class="btn btn-primary" href="<?php echo URL; ?>compras">Volver </a>
<?php }else{ ?>
<h2>No tienes permisos para ver este contenido</h2>
<?php } ?>