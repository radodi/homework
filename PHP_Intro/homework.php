<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Homework - PHP Intro</title>
	<link rel="stylesheet" type="text/css" href="css/desktop.css">
</head>
<body>
<?php
//Task 1
/* . Опишете с PHP програма за изчисляване на периметъра и лицето
на различни геометрични форми.
- При изчисляването на лицето на кръга използвайте pi() или
M_PI. Закръглете резултата от изчислението до втория знак
след десетичната запетая.
- Отпечатайте резултатите от изчисленията в таблица като по-
долу показаната. */
echo "\t<h1>Task 1</h1>\n";
echo "\t<table>
		<tr>
			<th>Input</th>
			<th>Output</th>
		</tr>";
//Rectangle
$a = 10;
$b = 20;
echo "\n\t\t<tr>
			<td>Rectangle, a=10, b = 20</td>
			<td>S = " . $a*$b . "</td>
		</tr>";
//Square
$a = 15;
echo "\n\t\t<tr>
			<td>Square, a = 15</td>
			<td>S = " . $a*$a . "</td>
		</tr>";
//Triangle
$a = 10;
$ha = 15;
echo "\n\t\t<tr>
			<td>Triangle, a = 10, ha = 15</td>
			<td>S = " . ($a*$ha)/2 . "</td>
		</tr>";
//Circle
$r = 15;
echo "\n\t\t<tr>
			<td>Circle, r = 15</td>
			<td>S = " . number_format(M_PI*$r*$r, 2, '.', '') . "</td>
		</tr>\n\t</table>\n";

//Task 2
// Отпечатайте датата и текущия час в нашия часови пояс. Отпечатайте текущата дата и час в Сидни, Австралия.
echo "\t<h1>Task 2</h1>\n";
date_default_timezone_set('Europe/Sofia');
echo "\t<p>В момента в София е ". date('d.m.Y') . "г. Часът е " . date('H:i') . ".</p>\n";
date_default_timezone_set('Australia/Sydney');
echo "\t<p>В момента в Сидни е ". date('d.m.Y') . "г. Часът е " . date('H:i') . ".</p>\n";

//Task 3
//Отпечатайте съботите и неделите през месец януари 2017.
echo "\t<h1>Task 3</h1>\n";
function my_date($custom_day){
$i=0;
echo "\t<p>$custom_day: ";
while ( $i <= 31) {
	$i++;
	$cur_date = date("l", mktime(0, 0, 0, 1, $i, 2017));
	if ($cur_date == $custom_day) {
		echo date('d.m.Y', mktime(0, 0, 0, 1, $i, 2017)) . " ";
	}
}
echo "</p>\n";
}
my_date('Saturday');
my_date('Sunday');

//Task 4
/*Напишете програма, която изчислява и отпечатва по координатите на
три точки в равнината, площта на триъгълник. Изпробвайте програмата с
три стойности на променливите. Задайте стойностите като десетични
дроби и закръглете резултата до цяло число.*/
echo "\t<h1>Task 4</h1>\n";
echo "\t<table>
		<tr>
			<th>Input</th>
			<th>Output</th>
		</tr>";
function calc_area($ax, $bx, $cx, $ay, $by, $cy){
$area = ($ax*($by-$cy)+$bx*($cy-$ay)+$cx*($ay-$by))/2;
if ($area < 0) {
	$area = $area-$area-$area;
}
return number_format($area, 0, '.', '');
}
$ax = 15.15;
$bx = 26.15;
$cx = 30.50;
$ay = 48.15;
$by = 51.30;
$cy = 64.30;
echo "\n\t\t<tr>
			<td>Ax= $ax, Ay= $ay <br> Bx= $bx, By= $by <br> Cx= $cx, Cy= $cy</td>\n";
$area = calc_area($ax, $bx, $cx, $ay, $by, $cy);
echo "\t\t\t<td>Area = $area</td>\n\t\t</tr>";
$ax = 5.15;
$bx = 16.22;
$cx = 32.11;
$ay = 1.15;
$by = 3.30;
$cy = 19.30;
echo "\n\t\t<tr>
			<td>Ax= $ax, Ay= $ay <br> Bx= $bx, By= $by <br> Cx= $cx, Cy= $cy</td>\n";
$area = calc_area($ax, $bx, $cx, $ay, $by, $cy);
echo "\t\t\t<td>Area = $area</td>\n\t\t</tr>";
$ax = 15.50;
$bx = 15.50;
$cx = 50.50;
$ay = 15.50;
$by = 30.50;
$cy = 30.50;
echo "\n\t\t<tr>
			<td>Ax= $ax, Ay= $ay <br> Bx= $bx, By= $by <br> Cx= $cx, Cy= $cy</td>\n";
$area = calc_area($ax, $bx, $cx, $ay, $by, $cy);
echo "\t\t\t<td>Area = $area</td>\n\t\t</tr>\n\t</table>\n";
?>
</body>
</html>