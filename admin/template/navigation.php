			<nav class="navbar navbar-default" role="navigation">
				
					
				
				<ul class="nav navbar-nav">
					<?php //nav_main($dbc, $pageid); ?>
					
					<li><a href="#">Dashboard</a></li>
					<li><a href="#">Pages</a></li>
					<li><a href="#">Users</a></li>
					<li><a href="#">Settings</a></li>
					
				</ul>
			
				<div class="pull-right">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<?php if($debug == 1){ ?>
								<button type="button" btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-bug"></i></button>
							<?php } ?>					
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user['fullname']; ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="logout.php">Logout</a></li>
    						</ul>
						</li>
						<li><a href='logout.php'>Logout</a></li>
					</ul>
				</div>
			</nav>
			