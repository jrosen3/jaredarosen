<?php
	$array;
	for($i=1; $i<=(15*15); $i++)
	{
		$c = rand(1, 5);
		$array .= '<div onClick="num(' . $i . ')" class="circle' . $c . '"></div>';
	}
	echo "$array";
?>