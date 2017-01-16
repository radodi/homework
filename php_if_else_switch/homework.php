<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Homework - PHP If Else Switch</title>
	<link rel="stylesheet" type="text/css" href="css/desktop.css">
</head>
<body>
	<div class="box">
		<h3>Задача 1</h3>
		<p>Напишете програма, която проверява дали със зададените три дължини на страни може да се построи триъгълник.</p>
<?php
	function is_triangle($a, $b, $c){
		if ($a + $b > $c && $a + $c > $b && $b + $c > $a) {
			echo "Yes";
		} else {
			echo "No";
		}
	}
?>
		<table>
			<tr>
				<th>Input</th>
				<th>Output</th>
			</tr>
			<tr>
				<td>25 20 40</td>
				<td><?php is_triangle(25, 20, 40); ?></td>
			</tr>
			<tr>
				<td>58 10 36</td>
				<td><?php is_triangle(58, 10, 36); ?></td>
			</tr>
			<tr>
				<td>10 55 40</td>
				<td><?php is_triangle(10, 55, 40); ?></td>
			</tr>
			<tr>
				<td>36 40 52</td>
				<td><?php is_triangle(36, 40, 52); ?></td>
			</tr>
		</table>
	</div>
	<div class="box task2">
		<h3>Задача 2</h3>
		<p>Напишете програма, която по зададени единици използвана електроенергия и тяхната цена изчислява сметката за ток, при следните условия</p>
		<ol>
			<li>За първите 50 единици - 0,10 лв/единица</li>
			<li>За следващите 100 - 0,15 лв./единица</li>
			<li>За следващите 100 - 0,25 лв./единица</li>
			<li>За следващите - 0,35 лв/единица.</li>
			<li>Към общата сметка се добавят 20% ДДС.</li>
		</ol>
		<p>Вашата програма трябва да работи и в случаите, когато цените се увеличат – напр. за всяка точка цената се променя с някакъв процент, без да се променя диапазона на киловатите.</p>
<?php
	function bill($consumption){
		//price range variables
		$price_range = array('50' => 0.1, '150' => 0.15, '250' =>  0.25, '251' =>  0.35);
		switch ($consumption) {
			case $consumption <= 50 && $consumption > 0:
				$bill = ($consumption * $price_range[50])*1.2;
				echo $bill . " лева";
				break;
			case $consumption > 50 && $consumption < 151:
				$bill[1] = 50 * $price_range[50];
				$consumption = $consumption - 50;
				$bill[2] = $consumption * $price_range[150];
				$bill = ($bill[1] + $bill[2]) * 1.2;
				echo $bill . " лева";
				break;
			case $consumption > 150 && $consumption < 251:
				$bill[1] = 50 * $price_range[50];
				$bill[2] = 100 * $price_range[150];
				$consumption = $consumption - 150;
				$bill[3] = $consumption * $price_range[250];
				$bill = ($bill[1] + $bill[2] + $bill[3]) * 1.2;
				echo $bill . " лева";
				break;
			case $consumption > 251:
				$bill[1] = 50 * $price_range[50];
				$bill[2] = 100 * $price_range[150];
				$bill[3] = 100 * $price_range[250];
				$consumption = $consumption - 250;
				$bill[4] = $consumption * $price_range[251];
				$bill = ($bill[1] + $bill[2] + $bill[3] + $bill[4]) * 1.2;
				echo $bill . " лева";
				break;
			default:
				echo "Невалидна стойност!";
				break;
		}
	}
?>
		<table>
			<tr>
				<th>Input</th>
				<th>Output</th>
			</tr>
			<tr>
				<td>150</td>
				<td><?php bill(150);?></td>
			</tr>
			<tr>
				<td>155</td>
				<td><?php bill(155);?></td>
			</tr>
			<tr>
				<td>201</td>
				<td><?php bill(201);?></td>
			</tr>
			<tr>
				<td>302</td>
				<td><?php bill(302);?></td>
			</tr>
		</table>
	</div>
	<div class="box">
<?php
 function calc_egn($egn){
 	$number_weight = array(2, 4, 8, 5, 10, 9, 7, 3, 6);
 	//Всяка цифра се умножава със съответното ѝ тегло 
 	for ($i=0; ; ) { 
 		if ($i>8) {
 			break;
 		}else{
 			$egn[$i] = $egn[$i] * $number_weight[$i];
 			$i++;
 		}
 	}
 	//Получените произведения се сумират
 	$egn_sum = 0;
 	for ($i=0; ; ) { 
 		if ($i>8) {
 			break;
 		}else{
 			$egn_sum = $egn_sum + $egn[$i];
 			$i++;
 		}
 	}
 	//Сумата се дели на 11
 	$last_number = $egn_sum % 11;
 	//Ако остатъкът от делението е по-малък от 10, тогава той се взема като контролна цифра, иначе – 0
 	if ($last_number < 10 && $last_number > 0) {
 		echo $last_number;
 	} else {
 		echo "0";
 	}

 }
?>
		<h3>Задача 3</h3>
		<p>Напишете програма, която по зададени 9 цифри изчислява 10тата цифра на ЕГН.</p>
		<h4>Решение:</h4>
		<p>Приемаме, че първите 9 цифри от ЕГН са: <span>860705214</span>. Последната цифра от ЕГН е: <span><?php calc_egn(array(8, 6, 0, 7, 0, 5, 2, 1, 4)); ?></span></p>
	</div>
	<div class="box">
		<h3>Задача 4</h3>
		<p>Напишете програма, която в зависимост от въведеното число от 1-12 връща името на съответния месец</p>
<?php
	function show_month($month){
		$month = date("F", mktime(0, 0, 0, $month, 1, 2017));
		echo "$month";
	}
?>
		<table>
			<tr>
				<th>Input</th>
				<th>Output</th>
			</tr>
			<tr>
				<td>1</td>
				<td><?php show_month(1) ?></td>
			</tr>
			<tr>
				<td>2</td>
				<td><?php show_month(2) ?></td>
			</tr>
			<tr>
				<td>10</td>
				<td><?php show_month(10) ?></td>
			</tr>
			<tr>
				<td>12</td>
				<td><?php show_month(12) ?></td>
			</tr>
		</table>
	</div>
</body>
</html>