<?php
session_start();
if (!empty($_POST['name'])) {
$_SESSION['name'] = $_POST['name'];
} else {
	if (!empty($_SESSION['name'])) {
		
	}else {
		$_SESSION['message'] = "Не сте въвели вашето име:";
		header('Location: index.php');
	}
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
	<div class="wrapper">
		<h1>Домашно PHP формуляри</h1>
		<div class="hello_message">Здравей <?= $_SESSION['name'] ?>
		</div>
		<div class="exit">
			<a href="logout.php">Изход</a>
		</div>
		<div class="box task">
			<h3>Задача 10</h3>
			<p>*Напишете програма, която определя в зависимост от зададените страни, дали триъгълника е равностранен, равнобедрен или разностранен.</p>
<?php
if (empty($_POST['a']) || empty($_POST['b']) || empty($_POST['c'])) {
	echo '			<p class="status">Въведете число различно от 0. Ако числото е отрицателно ще бъде преобразувано към положително.</p>'. "\n";
} else {
	if (!is_numeric($_POST['a']) || !is_numeric($_POST['b']) || !is_numeric($_POST['c'])) {
	echo '			<p class="status">В някое от полетата сте въвели низ. Моля използвайте "точка" за десетична запетая.</p>'. "\n";
	} else {
	$_POST['a'] = abs($_POST['a']);
	$_POST['b'] = abs($_POST['b']);
	$_POST['c'] = abs($_POST['c']);
	if ($_POST['a'] == $_POST['b'] && $_POST['b'] == $_POST['c'] && $_POST['c'] == $_POST['a']) {
		echo '			<p class="status">Триъгълник със страни A= ' . $_POST['a'] . ', B= ' . $_POST['b'] . ', C= ' . $_POST['c'] . ' е равностранен.</p>'. "\n";
	} elseif ($_POST['a'] == $_POST['b'] || $_POST['b'] == $_POST['c'] || $_POST['c'] == $_POST['a']) {
		echo '			<p class="status">Триъгълник със страни A= ' . $_POST['a'] . ', B= ' . $_POST['b'] . ', C= ' . $_POST['c'] . ' е равнобедрен.</p>'. "\n";
	} else {
		echo '			<p class="status">Триъгълник със страни A= ' . $_POST['a'] . ', B= ' . $_POST['b'] . ', C= ' . $_POST['c'] . ' е разностранен.</p>'. "\n";
	}
}
}
?>
			<form action="page1.php" method="post">
				<div>
				<label for="a">Дължина на страна A:</label>
					<input type="text" name="a" id="a">
				</div>
				<div>
				<label for="b">Дължина на страна B:</label>
					<input type="text" name="b" id="b">
				</div>
				<div>
				<label for="c">Дължина на страна C:</label>
					<input type="text" name="c" id="c">
				</div>
				<input type="submit" name="task10" value="Изпрати" class="send">
			</form>
		</div>
		<div class="box task">
			<h3>Задача 23</h3>
			<p>Напишете програма, която в зависимост от кода за език (напр. "es", "de", "en") отпечатва съобщението “Hello, World!” на съответния език. </p>
<?php
if (!empty($_POST['lang'])) {
	switch ($_POST['lang']) {
		case 'es':
			echo "			<p class=\"status\">Hola, mundo!</p>";
			break;
		case 'de':
			echo "			<p class=\"status\">Hallo Welt!</p>";
			break;
		case 'en':
			echo "			<p class=\"status\">Hello, world!</p>";
			break;
		case 'fr':
			echo "			<p class=\"status\">Bonjour tout le monde!</p>";
			break;
		default:
			echo "Грешка!";
			break;
	}
}
?>
			<form action="page1.php" method="post">
				<div>
					<label for="lang">Изберете език:</label>
				</div>
				<div>
					<select name="lang">
						<option value="es">Испански</option>
						<option value="de">Немски</option>
						<option value="en">Английски</option>
						<option value="fr">Френски</option>
					</select>
				</div>
				<div>
					<input type="submit" name="task23" value="Изпрати" class="send">
				</div>
			</form>
		</div>
	</div>
</body>
</html>