<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Task 1</title>
</head>
<body>
<?php
$arr = [
	'Bulgaria' => 'Sofia',
	'Romania' => 'Bucharest',
	'France' => 'Paris',
	'England' => 'London'
];
//Sort array by Key Ascending
ksort($arr);
//print table
echo "<table border='1'>";
foreach ($arr as $country => $capital) {
	echo "<tr><td> " . $country . "</td><td>" . $capital . ".</td></tr>";
}
echo "</table>";

//Sort array by Value Ascending
asort($arr);
//print table
echo "<table border='1'>";
foreach ($arr as $country => $capital) {
	echo "<tr><td> " . $country . "</td><td>" . $capital . ".</td></tr>";
}
echo "</table>";
?>
</body>
</html>
