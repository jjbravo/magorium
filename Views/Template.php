<?php namespace Views;
if(!isset($_SESSION['session'])){
	$_SESSION['session']=false;
}
if (!isset($_SESSION['total'])) {
	$_SESSION['total']=0;
}
if (!isset($_SESSION['carrito'])) {
	$_SESSION['carrito']=array();
}
//$template = new Template();
	class Template{
	public function __construct(){
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administración</title>
	<link rel="stylesheet" href="<?php echo URL;  ?>Views/static/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo URL;  ?>Views/static/css/styles.css">
	<link rel="stylesheet" href="<?php echo URL;  ?>Views/static/css/jquery-ui.min.css">
	<link rel="stylesheet" href="<?php echo URL;  ?>Views/static/css/jquery-ui.theme.min.css">	

</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo URL;  ?>inicio">Plataforma</a>
		</div>
	
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<?php if($_SESSION['session']){ ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo URL; ?>clientes">Listar</a></li>
						<li><a href="<?php echo URL; ?>clientes/agregar">Agregar</a></li>
						
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo URL; ?>productos">Listar</a></li>
						<li><a href="<?php echo URL; ?>productos/agregar">Agregar</a></li>
						
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Compras <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo URL; ?>compras">Listar</a></li>
						<li><a href="<?php echo URL; ?>compras/agregar">Agregar</a></li>
						
					</ul>
				</li>
				<?php } ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
			<?php if($_SESSION['session']){ ?>

			<li><a href="">Hola <?php echo $_SESSION['usuario']; ?></a></li>
				<li><a href="<?php echo URL; ?>login/salir/">Salir</a></li>
			<?php }else{ ?>
				<li><a href="<?php echo URL; ?>login">Login</a></li>
				<?php } ?>
			</ul>
		</div><!-- /.navbar-collapse -->
	</nav>
<div class="container">

<?php
		}





		public function __destruct(){
?>
</div>
<footer>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque recusandae laboriosam delectus cum consectetur veritatis et nam, quisquam a suscipit ullam. Sed eveniet, accusamus deleniti dolores laborum, debitis cum fugit.</footer>
<script src="<?php echo URL;  ?>Views/static/js/jquery-1.11.3.min.js" ></script>
<script src="<?php echo URL;  ?>Views/static/js/bootstrap.min.js" ></script>
<script src="<?php echo URL;  ?>Views/static/js/jquery-ui.min.js" ></script>

<script>
	$(function(){

		$("#tipo").change(function(e){
			e.preventDefault();
			//alert($(this).val());
			$.ajax({
				url:"<?php echo URL ?>productos/ajax/formatos",
				method:"POST",
				data:{tipo:$(this).val()},
				success:function(data){
					//alert(data);
					$("#formato").html(data);
				},
			});
		});

		$("#vaciar").click(function(e){
			e.preventDefault();
			$.ajax({
				url:"<?php echo URL ?>compras/ajax/vaciar",
				//method:"POST",
				//data:{tipo:$(this).val()},
				success:function(data){
					//alert(data);
					$("#total").html(data);
				},
			});
		});
	
	});

function comprar(id,producto,valor){
	//alert(producto);
	//alert($("#cantidad").val());
	$.ajax({
				url:"<?php echo URL ?>compras/ajax/comprar",
				method:"POST",
				data:{
					id:id,
					producto:producto,
					valor:valor,
					cantidad:$("#cantidad").val()
					},
				success:function(data){
					//alert(data);
					$("#total").html(data);
				},
			});
}
</script>
	</body>
</html>
<?php 
		}
	}


 ?>
  