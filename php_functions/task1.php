<?php 
$m= 2;
$n = 3;
$a = [];
for ($i=0; $i < $m; $i++) { 
	for ($j=0; $j < $n; $j++) { 
		$a[$i][$j] = rand(5,15);
	}
}

function print_a($a){
	for ($i=0; $i < count($a); $i++) { 
		for ($j=0; $j < count($a[$i]); $j++) { 
			echo 'a[' . $i . '][' . $j . '] = ' . $a[$i][$j] . ' ';
		}
		echo "<br>";
	}
}
print_a($a);