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
			
			<div class="container">
				<h1><?php echo $page['header']; ?></h1>
				<?php echo $page['body_formatted']; ?>
				
			</div>
		</div>	<!--end of nav -->
		
		<?php include('template/footer.php'); ?>	
		<?php if ( $debug == 1) {include ('widgets/debug.php');} ; ?>
	</body>
</html>