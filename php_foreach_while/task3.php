<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Task 3</title>
</head>
<body>
	<form action="task3.php" method="post">
		<label for="n">Въведете число</label>
		<input type="text" name="n" id="n">
		<input type="submit" name="submit" value="Изчисли !n”">
	</form>
<?php
if (!empty($_POST)) {
	$i = 1;
	$result = 1;
	while ($i <= $_POST['n']) {
		$result = $result * $i;
		$i++;
	}
	echo "!n = " . $result;
}
?>
</body>
</html>