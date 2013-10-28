<!DOCTYPE html>

<html>
	<head>
		<title>Jared Rosen</title>
	</head>

	<body>
		<?php include"config.php"; ?>
		<?php include"header.php"; ?>
		<script>
			$(document).ready(function() {
				pattern();
				pAnnimate();
			});

			$(window).resize(function() {
				pattern()
			});
		</script>
		<div id="bodyFrame">
			<div id="bodyContent">
				<div id="bodyNav">
					<nav id="nav">
						<a id="first">
							<span class="pattern" id="pFirst"></span>
							<span class="navTab">experience</span>
						</a>
						<a id="middle">
							<span class="pattern" id="pMiddle"></span>
							<span class="navTab">photography</span>
						</a>
						<a id="last">
							<span class="pattern" id="pLast"></span>
							<span class="navTab">connect</span>
						</a>
					</nav>
				</div>
			</div>
		</div>
		<?php include "footer.php"; ?>		
	</body>
</html>




