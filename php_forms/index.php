<?php
session_start();
if (empty($_SESSION['message'])){
	$_SESSION['message'] = "Въведете вашето име:";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Homework - PHP Forms</title>
	<link rel="stylesheet" type="text/css" href="css/desktop.css">
</head>
<body>
	<h1>Домашно PHP формуляри</h1>
	<div class="index_form box">
<?php
 if (!empty($_SESSION['name'])) {
 	echo "		<h3>Здравей " . $_SESSION['name'] .",</h3>";
 	echo '		<p>Вече сте въвели своето име.<p>';
 	echo '		<div><a href="page1.php">Към задачите &rarr;</a></div>';
 	echo '		<div><a href="logout.php">Изход &rarr;</a></div>';
 } else {
?>
	<p class="status"><?=$_SESSION['message']?></p>
		<form action="page1.php" method="post">
			<div>
				<label for="name">Име</label>
				<input type="text" name="name" id="name">
			</div>
			<div>
				<input type="submit" name="submit" value="Send" class="send">
			</div>
		</form>
<?php
 }
?>
	</div>
</body>
</html>