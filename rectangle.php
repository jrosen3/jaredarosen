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
			position: fixed;
			z-index: 0;
			background-color: gray;
		}
		#callback{
			/*width: 100px;
			height: 100px;*/
			position: fixed;
			/*top: 0px;
			left: 0px;*/
			z-index: 1;
			background-color: black;
		}
	</style>

	<body>
		<canvas id="myC">
			Your browser does not support the HTML5 canvas tag.
		</canvas>
		
		<!--<div id="xycoordinates"></div>-->
		
		<div id="callback">
			<!-- stuff -->
		</div>

		<script>
			// returns width of browser viewport
			var width = $(window).width();
			var height = $(window).height();

			
			//var cb = document.getElementById("callback");
			/*cb.style.width = '200px';
			cb.style.height = '200px';*/
			//$("#callback").hide();


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
						//$("#callback").show();
						var cb = document.getElementById("callback");
						var jdata = JSON.parse(data);
						cb.style.width = jdata.w + 'px';
						cb.style.height = jdata.h + 'px';
						cb.style.left = jdata.tlx + 'px';
						cb.style.top = jdata.tly + 'px';
						//alert(jdata.tly);
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
					//document.getElementById("xycoordinates").innerHTML = "Coordinates: (" + x + "," + y + ")";
					
					//ctx.fillStyle="#FF0000";
					ctx.fillRect(x, y, 3, 3); 
					/*alert(x);
					alert(y);*/

					array[counter] = x;
					counter++;
					array[counter] = (-y);
					counter++
					set = true;
				}
			};
		</script>		
	</body>
</html>