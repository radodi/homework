<?php
function encode_text($txt){
	$first = ceil(strlen($txt)/2); // ceil() Round number UP if it is decimal.
	$all = strlen($txt);  // strlen count string length 
	$arr = str_split($txt); // convert string to arrray
	$res = NULL;
	//change signs (array values) in first half of text
	for ($i=0; $i < $first; $i++) { 
		if ($arr[$i] == 'a') {
			$arr[$i] = 'u';
		} elseif ($arr[$i] == 't') {
			$arr[$i] = 'v';
		}
		if ($arr[$i] == 'A') {
			$arr[$i] = 'U';
		} elseif ($arr[$i] == 'T') {
			$arr[$i] = 'V';
		}
		//concatenates the symbols from the array in a string variable
		$res = $res . $arr[$i];
	}
	//change signs in second half of text
	for ($i=$first; $i < $all; $i++) { 
		if ($arr[$i] == 'e') {
			$arr[$i] = 'o';
		} elseif ($arr[$i] == 's') {
			$arr[$i] = 'p';
		}
		if ($arr[$i] == 'E') {
			$arr[$i] = 'O';
		} elseif ($arr[$i] == 'S') {
			$arr[$i] = 'P';
		}
		$res = $res . $arr[$i];
	}
	echo $res . "<br>";
}
encode_text('Take a shot.');
encode_text('Placeholders');