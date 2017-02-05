<?php
$arr = [2, 11, 2, 3, 0, 2];
$arr1 = [0, 4, 7, 0, 0, 0];
$arr2 = [4, 15, 27, 33, 1];
$check_num = 2;
$check_num1 = 0;
$check_num2 = 8;
function count_num($arr, $check){
	$res = 0;
	for ($i=0; $i < count($arr); $i++) { 
		if ($arr[$i] == $check) {
			$res++;
		}
	}
	if ($res != 0) {
		echo "$res <br>";
	} else {
		echo "not in array<br>";
	}
}
count_num($arr, $check_num);
count_num($arr1, $check_num1);
count_num($arr2, $check_num2);
