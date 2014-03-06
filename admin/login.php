<?php 
	#Start session:
	session_start();
	
	//Conexion base de datos
	include('../config/connection.php');
	if ($_POST){
		$q = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = SHA1('$_POST[password]')";
		$r = mysqli_query($dbc, $q);
		
		
		if(mysqli_num_rows($r) == 1){
			$_SESSION['username'] = $_POST['email'];
			header('Location: index.php');
		}
	}
?>
		
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php include('config/css.php'); ?>
		<?php include('config/js.php'); ?>
		
	</head>

	<body>
		
		<div id="wrap">
			<div class="container">
			
			<div class="row">
				
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-info">
						
						<div class="panel-heading">
							<h3><strong>Login</strong></h3>	
						</div>
						
						<div class="panel-body">
							<!--<?php
								if($_POST){
									echo $_POST['email'];
									echo '<br>';
									echo $_POST['password'];
								}
							?>
							-->
							<form action="login.php" method="post" role="form">
								
					 		 <div class="form-group">
							    <label for="email">Email address</label>
							    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
							 </div>
						
							<div class="form-group">
					 		   <label for="password">Password</label>
							    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
					 	   </div>  
					  
					 	 <button type="submit" class="btn btn-default">Submit</button>
					</form>
					</div> <!--end panel body-->
						
					</div><!--end panel-->
				</div><!--End column-->				
				
			</div><!--end row-->
			
			</div><!-- end container-->
		</div>	<!--end of nav -->
		 <!--
					  <div class="checkbox">
					    <label>
					      <input type="checkbox"> Check me out
					    </label>
					  </div>
					  -->
		
		<?php //include('template/footer.php'); ?>	
		<?php //if ( $debug == 1) {include ('widgets/debug.php');} ; ?>
	
	</body>
</html>