<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Task 2</title>
</head>
<body>
<?php
$arr = [
	'Bulgaria' => 'Sofia',
	'Romania' => 'Bucharest',
	'France' => 'Paris',
	'England' => 'London'
];

?>
	<form action="task2.php" method="post">
		<label for="town">Изберете град</label>
		<select name="town" id="town">
<?php
foreach ($arr as $country => $capital) {
	echo '<option value="'. $capital .'">' . $capital . '</option>';
}
?>
		</select>
		<input type="submit" name="submit" value="Избери">
	</form>
<?php
if (!empty($_POST)) {
	foreach ($arr as $country => $capital) {
		if ($capital == $_POST['town']) {
			echo $capital . " се намира в " . $country;
		}
	}
}
?>
</body>
</html>