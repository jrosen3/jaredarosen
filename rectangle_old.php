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
			width: 100%;
			color: white;
			text-align: center;
			background-color: black;
			border-bottom: 1px solid gray;
		}

		#callback #close p{
			margin: 5px;
		}

		#callback #close:hover{
			color: red;
		}

		#web{
			width: 100%;
			height: 100%;
			border: 0px;
		}

	</style>

	<body>
		<canvas id="myC">
			<p>Your browser does not support the HTML5 canvas tag.</p>
		</canvas>
		
		<!--<div id="xycoordinates"></div> ondblclick="close();" -->
		
		<div id="callback">
			<div id="close"><p>Double Tap to Close, Tap and Drag to Reposition</p></div>
			<iframe id="web" src ="http://m.bing.com">
				<p>Your browser does not support iframes.</p>
			</iframe>
		</div>

		
		
		<script>
			// returns width of browser viewport
			var width = $(window).width();
			var height = $(window).height();

			var close = document.getElementById("close");
			close.ondblclick = function(){
				$("#callback").hide();
			};

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
			$("#myC").mouseup(MouseUp)

			function MouseUp(e){
				ctx.clearRect(0, 0, width, height);
				e.preventDefault();
				counter = 0;
				$.ajax({
					type: 'POST',
					url: 'controllers/rectangle_controller.php',
					data: { 
						'data': array,
					},
					success: function(data) {
						//alert(data);
						if(data == "false"){
							return;
						}
						else{
							//alert(data);
							$("#callback").show();
							var cb = document.getElementById("callback");
							var jdata = JSON.parse(data);
							cb.style.width = jdata.w + 'px';
							cb.style.height = jdata.h + 'px';
							cb.style.left = jdata.tlx + 'px';
							cb.style.top = jdata.tly + 'px';
							return;
						}
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
				}
			};
		
		</script>		
	</body>
</html>