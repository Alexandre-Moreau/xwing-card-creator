<!DOCTYPE html>
<html>
	<head>
		<?php
			include_once './header.php';
			create_header('Card creator');
		?>
	</head>
	<body>
		<?php
			include_once './nav.php';
		?>

		<div class="row">
			<div class="col s12 m6 center">
				<h2>pilot cards</h2>
					<a href="./pilots">
						<img src="./img/card-example-pilot-0.png" id="pilotImage">
					</a>
			</div>

			<div class="col s12 m6 center">
				<div>
					<h2>upgrade cards</h2>
					<a href="./upgrades">
						<img src="./img/card-example-upgrade-0.png" id="upgradeImage">
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12 center">
				<h2>gallery</h2>
				<a href="./gallery">
					<img src="./img/card-example-upgrade-1.png">
				</a>
				<a href="./gallery">
					<img src="./img/card-example-upgrade-2.png">
				</a>
			</div>
		</div>

		<?php
			include_once './footer.php';
		?>
	</body>
	<script>
		$(document).ready(function(){
			var imageNumber = Math.floor(Math.random()*(6-1+1)+1);
			$('img#upgradeImage').attr('src','./img/card-example-upgrade-' + imageNumber + '.png');
		});
	</script>
</html>