<?php
echo "<table border=1>\n";
$a = 9;
for ($i=1; $i <= 10; $i++) { 
	echo "<tr>\n";
	for ($j=1; $j < $i+1; $j++) { 
		echo "	<td>" . $i . "*" . $j . " = " . $i*$j . "</td>\n" ;
	}
	if ($a != 0) {
		echo '	<td colspan="'. $a .'"></td>' . "\n";
	}
	$a--;
	echo "</tr>\n";
}
echo "</table>";