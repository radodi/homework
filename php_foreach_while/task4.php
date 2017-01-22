<?php
$n= 30;
$i = 1;
$printed= 0;
while ( $i <= $n) {
	$cnt = 1;
	while ( $cnt <= $i ) {
		if ($printed == $n) {
			break;
		} else {
			$printed++;
		}
		echo "a ";
		$cnt++;
	}
	if ($printed == $n) {
		break;
	} else {
	echo "<br>";
	}
	$i++;
}