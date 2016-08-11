<!-- View Ver -->
		<?php if($_SESSION['session']){ ?>
<h1>Ver </h1>
<div class="carrito">
	 <a id="vaciar" class="btn btn-success btn-sm" href="#">Vaciar el carrito</a>
	
	 <p>Total <span id="total" ><?= $_SESSION['total'] ?></span></p><br>
	 <a id="comprar" class="btn btn-success btn-sm" href="<?php echo URL ?>compras/agregar">Confirmar</a>
	
</div>

 <div class="panel panel-success">
 	<div class="panel-heading">
 		<h3 class="panel-title">Ver <?= $datos['nombre'] ?> </h3>
 	</div>
 	<div class="panel-body">
 		<div class="col-md-3">
 			<img class="avatar-editar" src="<?php echo MEDIA; ?>/images/productos/<?= $datos['imagen']?>" alt="<?= $datos['nombre']?>" title="<?= $datos['nombre']?>"> 
 		</div>
 		<div class="col-md-9">
 			
		 	  <table class="table table-striped table-hover">
		 	   
		 	   	<tbody>
		 	   		
		 	   			
		 	   		<tr><th>Referencia</th><td><?= $datos['referencia']?></td> </tr>
		 	   		<tr><th>Nombres</th><td><?= $datos['nombre']?></td> </tr>
		 	   		<tr><th>Descripcion</th><td><?= $datos['descripcion']?></td></tr>
		 	   		<tr><th>Tipo</th><td><?= $datos['tipo']?></td></tr>
		 	   		<tr><th>Cantidad</th><td><?= $datos['cantidad']?></td></tr>
		 	   		<tr><th>Valor</th><td><?= $datos['valor']?></td></tr>
		 	   		<tr><th>Formato</th><td><?= $datos['formato']?></td></tr>
		 	   			
		 	   		
		 	   		<tr>
		 	   			
		 	   	<td><select name="cantidad" id="cantidad">
 	   				<option value="1">1</option>
 	   				<option value="2">2</option>
 	   				<option value="3">3</option>
 	   				<option value="4">4</option>
 	   			</select>
 	   			</td>
 	   			<td><button onclick="comprar(<?= $datos['id'] ?>,'<?= $datos['nombre'] ?>',<?= $datos['valor'] ?>);" class="btn  btn-success" >Comprar</button></td>
		 	   		</tr>	
 	   			
		 	   		
		 	   	
		 	   	</tbody>
		 	   </table>
		 	<a class="btn btn-primary" href="<?php echo URL; ?>productos/editar/<?= $datos['id']?>">Editar</a>
			<a class="btn btn-primary" href="<?php echo URL; ?>productos/">Seguir comprando</a>

 		</div>
 	</div>
 </div>
<?php }else{ ?>
<h2>No tienes permisos para ver este contenido</h2>
<?php } ?>