<!-- View Agregar -->
<?php if($_SESSION['session']){ ?>	
<?php $clientes=$compras->verClientes(); ?>		
<h1>Agregar</h1>


 <div class="panel panel-success">
 	<div class="panel-heading">
 		<h3 class="panel-title">Agregar</h3>
 	</div>
 	<div class="panel-body">
 	 <table class="table table-striped table-hover">
 	   	<thead>
 	   		<tr>
 	   			<th>Producto</th>
 	   			<th>Cantidad</th>
 	   			<th>Valor</th>
 	   			<th>Sutotal</th>
 	   			
 	   			
 	   		</tr>
 	   	</thead>
 	   	<tbody>
 			<?php 
				
					foreach ($_SESSION['carrito'] as $key => $value) { ?>
					 	
					 <tr><td><?=$value['producto'] ?></td><td><?=$value['cantidad'] ?></td><td><?=$value['valor'] ?></td><td><?php echo ( $value['valor']*$value['cantidad']) ?></td></tr>
 		
				<?php	 } 
	 
 			
 			 ?>
<tr><td></td><td></td><th>TOTAL </th><th><h3> <?= $_SESSION['total']?></h3></th></tr>
 	   	</tbody>
 	 </table>

 		
 	  <form role="form" action="" method="POST" enctype="multipart/form-data" >
 			<div class="form-group">
 			
		 	  	<label for="cliente_id">Cliente</label>
		 				<select class="form-control"  name="cliente_id" id="cliente_id" >
							<option value="0">----</option>
							<?php 
							while ($row=$clientes->fetch(\PDO::FETCH_ASSOC)) { 
								echo "<option value=".$row['id'].">".$row['nombre']."</option>";
								 } 

							?>
								
						</select>

		 	  

		 	  
		 	  	<br>
		 	  	<input class="btn btn-success" type="submit" value="Guardar">
		 	  	 <a class="btn btn-primary" href="<?php echo URL; ?>productos">Segur comprando</a>
 			</div>
 	  </form>
 	</div>
 </div>
<?php }else{ ?>
<h2>No tienes permisos para ver este contenido</h2>
<?php } ?>