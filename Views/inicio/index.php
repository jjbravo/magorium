
<h1>Bienvenidos a nuestra plataforma de administración</h1>

<div class="row">
	<?php while ($row = $datos->fetch(\PDO::FETCH_ASSOC)) { 
		if($row['estado']){


		?>
		
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<a href="productos/ver/<?=$row['id'] ?>" class="thumbnail">
			<img src="<?php echo MEDIA ?>/images/productos/<?= $row['imagen']?>" alt="<?= $row['nombre']?>">
		</a>
	</div>
	<?php } } ?>
</div>