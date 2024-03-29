<?php
	#Start the session;
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location: login.php');
	}
?>



<?php 
	include('config/setup.php'); 
?>
		
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $page['title']; ?> | <?php echo $site_title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php include('config/css.php'); ?>
		<?php include('config/js.php'); ?>
		
	</head>

	<body>
		<div id="wrap">
			<?php include('template/navigation.php'); ?>
			
			<h1>Admin Dashboard</h1>
			<div class="row">
				<div class="col-md-3">
					<div class="list-group">
					<?php

						if (isset($_POST['submitted']) == 1){
							$title = mysqli_real_escape_string($dbc,$_POST['title']);							
							$label = mysqli_real_escape_string($dbc,$_POST['label']);
							$body = mysqli_real_escape_string($dbc,$_POST['body']);	
							$header = mysqli_real_escape_string($dbc,$_POST['header']);
						
							$q = "INSERT INTO pages (user, slug, title, label, header, body) VALUES ($_POST[user], '$_POST[slug]','$title', '$label','$header','$body')";
							$r = mysqli_query($dbc, $q);
							
							if($r){
								$message = '<p>Page was added </p>';
								
							} else {
								$message = '<p>Page could not be added because: '.mysqli_error($dbc);
								$message .= '<p>'.$q.'</p>';
							}
						}
					
										
					?>
					
					

					<?php
						$q = "SELECT * FROM pages ORDER BY title ASC";
						$r = mysqli_query($dbc, $q);
						
						while($page_list = mysqli_fetch_assoc($r)){
							$blurb=substr(strip_tags($page_list['body']), 0, 160);
							
							?>
							<a class="list-group-item" href="index.php?id=<?php echo $page_list['id']; ?>">
								<h4 class="list-group-item-heading"><?php echo $page_list['title']; ?></h4>
								<p class="list-gorup-item-text"><?php echo $blurb; ?></p>
							</a>									
						<?php }?>
					</div>
				</div>
				
				<div class="col-md-9">
					<?php
						if (isset($message)){
							echo $message;
						}
					
					?>
					<?php if (isset($_GET['id'])){
						$q = "SELECT * FROM pages WHERE id = $_GET[id]";
						$r = mysqli_query($dbc, $q);
						$opened = mysqli_fetch_assoc($r);
					}
					?>
									
					<form action="index.php" method="post" role="form">
						<div class="form-group">
							<label for="title">Title:</label>
							<input class="form-control" type="text" name="title" id="title" value="<?php echo $opened['title']; ?>" placeholder="Page Title" />
						</div>
						
						<div class="form-group">
							<label for="title">User:</label>
							<select class="form-control" name="user" id="user">
								<option value="0">No user</option>
								<?php
									$q = "SELECT id FROM users ORDER BY first ASC";
									$r = mysqli_query($dbc, $q);
									
									while($user_list = mysqli_fetch_assoc($r)){
										$user_data = data_user($dbc, $user_list['id']);
									?>
									<option value="<?php echo $user_data['id']; ?>"><?php echo $user_data['fullname']; ?></option>
										
									<?php } ?>
								
								
							</select>
							
							
						</div>
						<div class="form-group">
							<label for="slug">Slug:</label>
							<input class="form-control" type="text" name="label" id="slug" value="<?php echo $opened['slug']; ?>" placeholder="Page Slug" />
						</div>
						<div class="form-group">
							<label for="label">Label:</label>
							<input class="form-control" type="text" name="label" id="label" value="<?php echo $opened['label']; ?>" placeholder="Page Label" />
						</div>
						<div class="form-group">
							<label for="title">Header:</label>
							<input class="form-control" type="text" name="header" id="header" value="<?php echo $opened['header']; ?>" placeholder="Page Header" />
						</div>
						<div class="form-group">
							<label for="title">Body:</label>
							<textarea class="form-control" type="text" name="body" id="body" rows="6" placeholder="Page Body" /><?php echo $opened['body']; ?></textarea>
						</div>
						<button type="submit" class="btn-default">Save</button>
						<input type="hidden" name="submitted" value="1">
					</form>
				</div>
			
			</div>
			
		</div>	<!--end of nav -->
		
		<?php include('template/footer.php'); ?>	
		<?php if ( $debug == 1) {include ('widgets/debug.php');} ; ?>
	</body>
</html>