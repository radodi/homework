<?php
// Task 1
//Don't forget to change $db_name value
$server = 'localhost';
$username = 'root';
$password = '';
$db_name = 'foods';
$conn = mysqli_connect($server, $username, $password, $db_name);

function print_table($q, $arr, $conn){
	echo '<table class="table table-bordered table-striped table-hover table-condensed">' . "\n";
	echo '					<thead>' . "\n";
	echo '						<tr>' . "\n";
	foreach ($arr as $key => $value) {
			echo "							<th>" . $value . "</th>" . "\n";
	}
	echo '						</tr>' . "\n";
	echo '					</thead>' . "\n";
	echo '					<tbody>' . "\n";
	$result = mysqli_query($conn, $q);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo "						<tr>\n";
			foreach ($row as $value) {
					echo "							<td>$value</td>\n";
			}
			echo "						</tr>\n";
		}
	}
	echo '					</tbody>' . "\n";
	echo '				</table>' . "\n";
}

function update_and_print($q, $arr, $conn){
	echo '<table class="table table-bordered table-striped table-hover table-condensed">' . "\n";
	echo '					<thead>' . "\n";
	echo '						<tr>' . "\n";
	foreach ($arr as $key => $value) {
			echo "							<th>" . $value . "</th>" . "\n";
	}
	echo '						</tr>' . "\n";
	echo '					</thead>' . "\n";
	echo '					<tbody>' . "\n";
	//double calories and update entries
	$result = mysqli_query($conn, $q);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {	
			foreach ($row as $key => $value) {
				if ($key == 'id') {
					$my_arr_id[] = $value; //Put IDs of products in array
				} elseif ($key == 'calories') {
					$my_arr_cal[] = $value*2; //Put calories of product * 2 in array
				}
			}
		}
		//update calories in DB
			$cnt = count($my_arr_id);
			for ($i=0; $i < $cnt; $i++) { 
				$q = "UPDATE `products` SET `calories`= $my_arr_cal[$i] WHERE `id`= $my_arr_id[$i]";
				mysqli_query($conn, $q);
			}
	}
	//Generate new query
	$q = "SELECT `product`, `calories`, `gi` FROM `products` WHERE ";
	$cnt = count($my_arr_id);
	for ($i=0; $i < $cnt; $i++) { 
		$q .= "`id`=$my_arr_id[$i]";
		if ($i != $cnt-1) {
			$q .= " OR ";
		}
	}
	//result of new query
	$result = mysqli_query($conn, $q);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo "						<tr>\n";
			foreach ($row as $value) {
					echo "							<td>$value</td>\n";
			}
			echo "						</tr>\n";
		}
	}
	echo '					</tbody>' . "\n";
	echo '				</table>' . "\n";
}

function my_delete($q, $conn){
	date_default_timezone_set('Europe/Sofia');
	$today = date('Y-m-d');
	$result = mysqli_query($conn, $q);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			foreach ($row as $value) {
				$q = "UPDATE `products` SET `date_deleted`= '$today' WHERE `id`= $value";
				mysqli_query($conn, $q);
			}
		}
	}
	echo '<div class="alert alert-danger" role="alert">' . "\n";
	echo '					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>' . "\n";
	echo '					<span class="sr-only">Deleted:</span>' . "\n";
	echo '					<strong>' . mysqli_num_rows($result) . '</strong> записа са изтрити!' . "\n";
	echo '				</div>' . "\n				";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homework DB Intro</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- jQuery  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<h2 class="text-center">Домашна работа "Въведение в БД" <small> - Радослав Димитров</small></h2>
		<h4>Задача 1</h4>
		<p class="text-info">
			Свържете php файла си с БД – foods
		</p>
		<?php
		if (!$conn) {
			die ("Connection failed: " . mysqli_connect_error());
		} else {
			echo '<div class="alert alert-info" role="alert">' . "\n";
			echo '			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' . "\n";
			echo '			<span class="sr-only">OK:</span>' . "\n";
			echo '			Успешна връзка с <strong>БД</strong> !' . "\n";
			echo '		</div>' . "\n";
		}
		?>
		<h4>Задача 2</h4>
		<div class="row">
			<div class="col-md-6">
				<p class="text-info">
					Отпечатайте в браузъра първите 10 записа от таблица products в
					таблица с информация за име на продукт, калории.
				</p>
			</div>
			<div class="col-md-6">
				<?php
				$q = 'SELECT `product`, `calories` FROM `products` WHERE 1 LIMIT 10';
				$arr = ['име на продукт', 'калории'];
				print_table($q, $arr, $conn);
				?>
			</div>
		</div>
		<h4>Задача 3</h4>
		<div class="row">
			<div class="col-md-6">
				<p class="text-info">
					Отпечатайте в браузъра всички записи в таблица products, които
					отговарят на условието gi>10 и date_deleted IS null в таблица с
					информация за име на продукт и гликемичен идекс /gi/;
				</p>
			</div>
			<div class="col-md-6">
				<?php
				$q = 'SELECT `product`, `gi` FROM `products` WHERE `gi` > 10 AND `date_deleted` IS NULL';
				$arr = ['име на продукт', 'гликемичен идекс'];
				print_table($q, $arr, $conn);
				?>
			</div>
		</div>
		<h4>Задача 4</h4>
		<div class="row">
			<div class="col-md-12">
				<p class="text-info">
					Променете всички записи в таблица products, които отговарят на
					условието gi = 0 или калориите &lt;100, като удвоите калориите им.
					Отпечатайте записите в браузъра в таблица с информация за име на
					продукт, калории и гликемичен индекс – преди и след направената
					промяна.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h5>Преди промяна</h5>
				<?php
				$q = 'SELECT `product`, `calories`, `gi` FROM `products` WHERE `gi`= 0 OR `calories` < 100';
				$arr = ['име на продукт', 'калории', 'гликемичен индекс'];
				print_table ($q, $arr, $conn);
				?>
			</div>
			<div class="col-md-6">
				<h5>След промяна</h5>
				<?php
				$q = 'SELECT `id`, `product`, `calories`, `gi` FROM `products` WHERE `gi`= 0 OR `calories` < 100';
				update_and_print($q, $arr, $conn);
				?>
			</div>
		</div>
		<h4>Задача 5</h4>
		<div class="row">
			<div class="col-md-6">
				<p class="text-info">
					Изтрийте всички записи в таблица products, които са някакъв сок.
					Отпечатайте в браузъра като таблица само тези записи в таблицата
					products, които не са изтрити, с информация за име на продукт,
					калории и гликемичен индекс.
				</p>
			</div>
			<div class="col-md-6">
				<?php
				$q = "SELECT `id` FROM `products` WHERE `product` LIKE '%сок%' AND `date_deleted` IS NULL";
				my_delete($q, $conn);
				$q = 'SELECT `product`, `calories`, `gi` FROM `products` WHERE `date_deleted` IS NULL';
				$arr = ['име на продукт', 'калории', 'гликемичен индекс'];
				print_table ($q, $arr, $conn);
				?>
			</div>
		</div>
	</div>
</body>
</html>