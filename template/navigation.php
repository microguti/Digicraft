			<nav class="navbar navbar-default" role="navigation">
				<?php if($debug == 1){ ?>
					<button id="btn-debug" class="btn btn-default"><i class="fa fa-bug"></i></button>
				<?php } ?>
					
				<div class="container">
				<ul class="nav navbar-nav">
					
					<?php nav_main($dbc, $pageid); ?>
					
					<li><a href="#">Faq</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				</div>
			</nav>
			