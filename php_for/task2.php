<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Task 2</title>
</head>
<body>
<?php
if ($_POST) {
	$res = str_ireplace('a', '@', $_POST['my_str']);
	$res = str_ireplace('e', '3', $res);
	echo $_POST['my_str'] . "<br>";
	echo "$res";
} else {
	echo '
	<form action="task2.php" method="post">
		<input type="text" name="my_str" placeholder= "Enter some text here...">
		<input type="submit" name="submit" value="Send Text">
	</form>
	';
}
?>
</body>
</html>
