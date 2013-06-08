<?php include "header.php" ?>
	<!-- body opened in header.php -->
	<script>
		$(document).ready(function() {
			$.ajax({
				type: 'POST',
				url: 'controllers/index_controller.php',
				success: function(data) {
					document.getElementById('holder').innerHTML = data;
				}
			});
		})

		var array = new Array();
		var counter = 0;
		function num(val){
			array[counter] = val;
			//alert(array);
			counter++;
		}
	</script>
		<div id="container">
			<div id="holder">
				<div class="circle"></div>
			</div>
		</div>
	</body>
</html>