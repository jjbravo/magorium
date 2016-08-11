

	
 <div class="row">
 	<div class="col-md-4"></div>
		<div class="col-md-4">
	 		<div class="panel panel-success">
			 	<div class="panel-heading">
			 		<h3 class="panel-title">login</h3>
			 	</div>
			 	<div class="panel-body">
			 		<?php if($datos){  ?>
					 				<div class="alert alert-danger">
					 					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					 					<strong>Error</strong> Nombre de usuario o contraseña incorrectos 
					 				</div>
					<?php } ?> 	
		
							<form role="form" action="" method="POST" enctype="multipart/form-data" >
							 			<div class="form-group">
									 				
									 	  	<label for="username">Username</label>
									 	  	<input type="text" class="form-control" id="username" required name="username">

									 	  	<label for="password">Password</label>
									 	  	<input type="password" class="form-control" id="password" required name="password">
								<br>
								<input class="btn btn-primary" type="submit" value="Login">
									 	  
							</div>
							</form>
						
						<div class="alert alert-info">
					 					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					 					<h3>Demo</h3>
					 					<strong>Username</strong> admin <br>
					 					<strong>Password</strong> admin
					 	</div>
			 	</div>
	 		</div>
 	</div>
 	<div class="col-md-4"></div>
 </div>
