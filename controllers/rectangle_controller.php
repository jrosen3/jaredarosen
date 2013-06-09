<?php
	//$data = array(0,0, 200,0, 200,(-200), 0,(-200), 0,0);

	$data = $_POST["data"];

	// parse points into an array of arrays
	$points = array();
	$size = sizeof($data);
	for($i = 0; $i < $size; $i +=2)
	{
		$points[] = array("x" => $data[$i], "y" => $data[($i + 1)]);
	}

	// initialize the max/min valuse of the corners of the page
	$_MAX = 10000;
	$tl = array("x" => 0, "y" => 0);
	$tr = array("x" => $_MAX, "y" => 0);
	$br = array("x" => $_MAX, "y" => -$_MAX);
	$bl = array("x" => 0, "y" => -$_MAX);
	
	// will hold the points that are he orners of the rectangle
	$closest = array(
		"tl" => array("d" => 1000000, "x" => null, "y" => null), 
		"tr" => array("d" => 1000000, "x" => null, "y" => null), 
		"br" => array("d" => 1000000, "x" => null, "y" => null), 
		"bl" => array("d" => 1000000, "x" => null, "y" => null));
	//print_r($closest);
	// find the conrners of the rectange
	foreach($points as $point)
	{
		$ctl = dist($point["x"], $point["y"], $tl["x"], $tl["y"]);
		if(($ctl < $closest["tl"]["d"]))
		{
			$closest["tl"]["d"] = $ctl;
			$closest["tl"]["x"] = $point["x"];
			$closest["tl"]["y"] = $point["y"];
		}

		$ctr = dist($point["x"], $point["y"], $tr["x"], $tr["y"]);
		if(($ctr < $closest["tr"]["d"]))
		{
			$closest["tr"]["d"] = $ctr;
			$closest["tr"]["x"] = $point["x"];
			$closest["tr"]["y"] = $point["y"];
		}

		$cbr = dist($point["x"], $point["y"], $br["x"], $br["y"]);
		if(($cbr < $closest["br"]["d"]))
		{
			$closest["br"]["d"] = $cbr;
			$closest["br"]["x"] = $point["x"];
			$closest["br"]["y"] = $point["y"];
		}

		$cbl = dist($point["x"], $point["y"], $bl["x"], $bl["y"]);
		if(($cbl < $closest["bl"]["d"]))
		{
			$closest["bl"]["d"] = $cbl;
			$closest["bl"]["x"] = $point["x"];
			$closest["bl"]["y"] = $point["y"];
		}

		//print($point["x"] . "," . $point["y"] . ": " . $ctl . "-" . $ctr . "-" . $cbr . "-" . $cbl . "\n");
	}

	$num = sizeof($points);
	$cx = 0;
	$cy = 0;
	$w = floor(dist($closest["tl"]["x"], $closest["tl"]["y"], $closest["tr"]["x"], $closest["tr"]["y"]));
	$h = floor(dist($closest["tl"]["x"], $closest["tl"]["y"], $closest["bl"]["x"], $closest["bl"]["y"]));
	foreach($points as $point)
	{
		if((($t = dist($point["x"], $point["y"], $point["x"], $closest["tl"]["y"])) / $h) < 0.05)
		{
			$cy++;
			//echo "1\n";
		}
		elseif((($t = dist($point["x"], $point["y"], $point["x"], $closest["bl"]["y"])) / $h) < 0.05)
		{
			$cy++;
			//echo "2\n";
		}
		elseif((($t = dist($point["x"], $point["y"], $closest["tl"]["x"], $point["y"])) / $w) < 0.05)
		{
			$cx++;
		}
		elseif((($t = dist($point["x"], $point["y"], $closest["tr"]["x"], $point["y"])) / $w) < 0.05)
		{
			$cx++;
		}
	}

	if((($cx / $num) > 0.30) || (($cy / $num) > 0.30))
	{
		#continue
	}
	else
	{
		echo "$num and $cx and $cy \n";
		return;
	}

	// make sure the first point and last point drawn are near eachother
	$end = end($points);
	if(((dist($points[0][x], $points[0][y], $end[x], $end[y])) / $h) > 0.3)
	{
		echo "that is not a closed rectangle\n";
		return;
	}
	
	// check to see if all 4 corners are about 90 degrees
	if(IsRectangle(
		$closest["tl"]["x"], $closest["tl"]["y"], 
		$closest["tr"]["x"], $closest["tr"]["y"], 
		$closest["bl"]["x"], $closest["bl"]["y"], 
		$closest["br"]["x"], $closest["br"]["y"]) == true)
	{
		$responce = array(
			"tlx" => $closest["tl"]["x"], 
			"tly" => -$closest["tl"]["y"], 
			"w" => $w,
			"h" => $h);
		
		$responce = json_encode($responce);
		echo "$responce";
		return;
	}
	else{
		echo "that is not a rectangle!\n";
		return;
	}








	function dist($x1, $y1, $x2, $y2)
	{
		//print("dist: (" . $x1 .", " $y1 .") (" . $y2 . ", " . $x2 . ")");
		return sqrt((pow(($x2 - $x1), 2) + pow(($y2 - $y1), 2)));
	}

	// finds the degreee measure of the angle between ab and ac
	function IsOrthogonal($ax, $ay, $bx, $by, $cx, $cy)
	{
		return rad2deg(acos(((($ax * $bx) + ($ay * $by)) / ((dist($ax, $ay, $bx, $by)) * (dist($ax, $ay, $cx, $cy))))));
	}

	// returns true if the corners form a rectangle
	function IsRectangle($ax, $ay, $bx, $by, $cx, $cy, $dx, $dy)
	{
		//echo"$ax $ay \n$bx $by \n$cx $cy \n$dx $dy \n";
		$a = IsOrthogonal($ax, $ay, $bx, $by, $dx, $dy);
		$b = IsOrthogonal($bx, $by, $cx, $cy, $ax, $ay);
		$c = IsOrthogonal($cx, $cy, $dx, $dy, $bx, $by);
		$d = IsOrthogonal($dx, $dy, $ax, $ay, $cx, $cy);
		$a = floor($a);
		$b = floor($b);
		$c = floor($c);
		$d = floor($d);
		
		//echo "$a - $b - $c - $d\n";
		$count = 0;
		$min = 50; $max = 130;
		if(($a > $min) && ($a < $max))
		{
			$count++;
		}
		if(($b > $min) && ($b < $max))
		{
			$count++;
		}
		if(($c > $min) && ($c < $max))
		{
			$count++;
		}
		if(($d > $min) && ($d < $max))
		{
			$count++;
		}

		
		//if(($a > $min) && ($a < $max) && ($b > $min) && ($b < $max) && ($c > $min) && ($c < $max) && ($d > $min) && ($d < $max))
		if($count >= 3)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
?>