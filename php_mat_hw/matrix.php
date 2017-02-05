<?php
//matrix 5.9
echo "matrix 5.9<br>";

$row = 4;
$col = 5;
$arr = [];
$num = 3;
for ($i=0; $i < $row; $i++) { 
	for ($j=0; $j < $col; $j++) { 
		$arr[$i][$j] = $num;
		$num+=2;
	}
	$num = $num*2-2;
}
// echo "<pre>";
// print_r($arr);
// echo "</pre>";

echo "<table border=1>";
for ($k=0; $k < $row; $k++) { 
	echo "<tr>";
	for ($l=0; $l < $col; $l++) { 
		echo "<td>" . $arr[$k][$l] . "</td>";
		}
	echo "</tr>";
}
echo "</table><br>";

//matrix 6.5
echo "matrix 6.5<br>";
$arr = [];
$row = 4;
$col = 4;
$num = 1;
for ($i=0; $i < $row; $i+=2) { 
	for ($j=0; $j < $col; $j++) { 
		$arr[$i][$j] = $num;
		$num++;
		$cnt=$col-1;
	}
	for ($j=0; $j < $col; $j++) { 
		$arr[$i+1][$j] = ($num+$cnt);
		$num++;
		$cnt-=2;
	}
}
// echo "<pre>";
// print_r($arr);
// echo "</pre>";

echo "<table border=1>";
for ($k=0; $k < $row; $k++) { 
	echo "<tr>";
	for ($l=0; $l < $col; $l++) { 
		echo "<td>" . $arr[$k][$l] . "</td>";
		}
	echo "</tr>";
}
echo "</table>";
