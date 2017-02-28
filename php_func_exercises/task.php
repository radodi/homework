<?php
$arr = [1, true, 1, true, true, true, 1, 1];
function count_el($arr){
	$res = $arr[0];
	$num = '';
	$temp_arr = [];
	$a=0; 
	for ($i=0; $i < count($arr); $i++) {
		if ($arr[$i] === $res) {
			$res = $arr[$i];
			$num++;
			$temp_arr[$a]['res'] = $res;
			$temp_arr[$a]['num'] = $num;
		} else {
			$a++;
			$num = '';
			$res = $arr[$i];
			$num++;
			$temp_arr[$a]['res'] = $res;
			$temp_arr[$a]['num'] = $num;
		}
	}
	$num = $temp_arr[0]['num'];
	$val = $temp_arr[0]['res'];
	for ($i=0; $i < count($temp_arr) ; $i++) { 
		if ($temp_arr[$a]['num'] > $num) {
			$num = $temp_arr[$i]['num'];
			$val = $temp_arr[$i]['res'];
		}
	}
	if (is_bool($val)) {
		echo $val ? 'true' : 'false';
		echo " " . $num;
	} else {
		echo "$val $num";
	}
}
count_el($arr);