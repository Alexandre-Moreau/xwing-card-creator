<!DOCTYPE html>
<html>
	<head>
		<?php
			include_once '../header.php';
			create_header('Card creator');
		?>
	</head>
	<body>
		<?php
			include_once '../nav.php';			
		?>
		<h2>Card gallery</h2>
		<div class="row gallery">			
				<?php
					include_once '../cardgen_functions.php';
					$cards = getPublishedCardsPath();

					foreach ($cards as $card) {
						echo '<div class="col l4 m6 ms12 center">';
						echo '<img class="materialboxed" src="../img/published/'.$card.'">';
						echo '</div>';
					}
				?>
		</div>
	</body>
	<script type="text/javascript">
		$(document).ready(function(){
			//$('.materialboxed').materialbox();
		});
	</script>			
</html>