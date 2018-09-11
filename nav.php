<nav>
	<div id="breadcrumb">
		<a href="/">home</a>
		<?php
			$page = explode('/',$_SERVER['REQUEST_URI'])[1];
			//<i class="material-icons">chevron_right</i>
			switch($page){
				case '':
					break;
				default:
					echo' &gt; <a href=".">'.$page.'</a>';
			}
		?>
	</div>
</nav>