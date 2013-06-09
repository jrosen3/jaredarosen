<!DOCTYPE html>

<html>
	<head>
		<title>Rectangle</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	</head>

	<style>
		*{
			margin: 0;
			padding: 0;
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			font-size: 15px;
		}

		body{
			width: 100%;
			height: 100%;
			background-color: orange;
		}

		#myC{
			position: fixed;
			z-index: 0;
			background-color: gray;
		}
		#callback{
			position: fixed;
			z-index: 1;
			background-color: black;
		}

		#callback #close{
			margin: -10px;
			width: 20px;
			height: 20px;
			background: black;
			color: red;
			text-align: center;
			border: 1px solid red;
			-moz-border-radius: 10px;
			-webkit-border-radius: 10px;
			border-radius: 10px;
		}

		#callback #close:hover{
			background: red;
			color: black;
			border: 1px solid black;
		}

	</style>

	<body>
		<canvas id="myC">
			Your browser does not support the HTML5 canvas tag.
		</canvas>
		
		<!--<div id="xycoordinates"></div>-->
		
		<div id="callback">
			<div id="close" onClick="hide()">X</div>
			<!-- stuff -->
		</div>

		<script>
			// returns width of browser viewport
			var width = $(window).width();
			var height = $(window).height();

			$("#callback").hide();

			$(function() {
				$("#callback").resizable();
				$("#callback").draggable();
			});


			var c = document.getElementById("myC");
			var ctx = c.getContext("2d");
			c.width = width;
			c.height = height;


			// keeps track of if the mouse is up or down
			var mouseDown = null;
			c.onmousedown = function(){mouseDown = true;};
			c.onmouseup = function(){mouseDown = false;};

			//
			var array = new Array();
			var set = false
			$("#myC").mouseup(MouseUp)

			function MouseUp(e){
				ctx.clearRect(0, 0, width, height);
				if(set == false){
					return;
				}
				e.preventDefault();
				set = false;
				counter = 0;
				$.ajax({
					type: 'POST',
					url: 'controllers/rectangle_controller.php',
					data: { 
						'data': array,
					},
					success: function(data) {
						//alert(data);
						$("#callback").show();
						var cb = document.getElementById("callback");
						var jdata = JSON.parse(data);
						cb.style.width = jdata.w + 'px';
						cb.style.height = jdata.h + 'px';
						cb.style.left = jdata.tlx + 'px';
						cb.style.top = jdata.tly + 'px';
					}
				});
			}



			// calls function when the mouse is "active"
			$("#myC").mousedown(MouseMove);
			$("#myC").mousemove(MouseMove);

			//
			var counter = 0; 
			function MouseMove(e){
				e.preventDefault();
				if(mouseDown == true){
					var x = e.pageX;
					var y = e.pageY;
					ctx.fillRect(x, y, 3, 3); 
					array[counter] = x;
					counter++;
					array[counter] = (-y);
					counter++
					set = true;
				}
			};

			function hide(){
				$("#callback").hide();
			}
		</script>		
	</body>
</html>