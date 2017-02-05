<?php
$arr = [0, 1, 5] ;

if (empty($arr)) {
	echo "Not a valid input";
} else {
	$temp = $arr[0];
	for ($i=0; $i < count($arr); $i++) { 
		if ($temp > $arr[$i]) {
			$temp = $arr[$i];
		}
	}
	if (!is_numeric($temp)) {
		echo "Not a valid input";
	} else {
		echo "Най-малкото число от масива е: " . $temp;
	}
}