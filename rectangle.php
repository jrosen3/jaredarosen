<!DOCTYPE html>

<html>
	<head>
		<title>Rectangle</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	</head>

	<style>
		*{margin: 0; padding: 0;}

		body{
			width: 100%;
			height: 100%;
			background-color: orange;
		}

		#myC{
			width: 500px;
			height: 500px;
			position: fixed;
			z-index: 0;
			background-color: gray;
		}
		#callback{
			width: 100px;
			height: 100px;
			position: fixed;
			top: 0px;
			left: 0px;
			z-index: 1;
			background-color: black;
		}
	</style>

	<body>
		<canvas id="myC">
			Your browser does not support the HTML5 canvas tag.
		</canvas>
		<div id="xycoordinates"></div>
		<div id="callback"></div>

		<script>
			// returns width of browser viewport
			var width = $(window).width();
			$("#callback").hide();

			//
			var c = document.getElementById("myC");
			var ctx = c.getContext("2d");


			// keeps track of if the mouse is up or down
			var mouseDown = null;
			c.onmousedown = function(){mouseDown = true;};
			c.onmouseup = function(){mouseDown = false;};

			//
			var array = new Array();
			var set = false
			$("#myC").mouseup(MouseUp)

			function MouseUp(e){
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
						var data = json.parse(data);
						var div = document.getElementById("callback");
						div.style.width = data.width + "px";
						div.style.height = data.height + "px";
						div.style.left = data.tlx + "px";
						div.style.top = data.tly + "px";
						$("#callback").show();
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
				if(mouseDown){
					var offset = $('#myC').offset();
					var x1 = Math.floor((e.pageX - offset.left));
					var y1 = Math.floor((e.pageY - offset.top));
					var t = e.pageX;
					//alert(t);
					
					x = e.clientX;
					y = e.clientY;
					document.getElementById("xycoordinates").innerHTML = "Coordinates: (" + x + "," + y + ")";
					ctx.fillStyle="#FF0000";
					ctx.fillRect(x1, y1, 4, 2); 
					array[counter] = x;
					counter++;
					array[counter] = y;
					counter++
					set = true;
				}
			};
		</script>		
	</body>
</html>