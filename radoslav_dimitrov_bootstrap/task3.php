<?php
function print_table(){
	$ah='ABCDEFGH';
	// Prints A,B,C,D.. row
	echo '<div class="row">' . "\n";
	for ($i=0; $i < 10; $i++) {
		if ($i==0 || $i==9) {
			echo '<div class="col-xs-1 text-center">&nbsp;</div>' . "\n";
		} else {
			echo '<div class="col-xs-1 text-center v_center">' . $ah[$i-1] . '</div>' . "\n";
		}
	}
	echo '</div>' . "\n";

	//Prints Tabele
	$num=0;
	for ($j=1; $j <= 8; $j++) { 
		echo '<div class="row">' . "\n";
		for ($k=0; $k <= 9; $k++) { 
			//Prints number at the 'begining block' or 'end block' if '$k==0' or '$k==8', and prints chess blocks
			if ($k==0) {
				echo '<div class="col-xs-1 text-center v_center">' . (9-$j) . '</div>' . "\n";
			} elseif ($k==9) {
				echo '<div class="col-xs-1 text-center v_center">' . (9-$j) . '</div>' . "\n";
			} else {
				//Check if $num is not an even number to print colored chess box
				if ($num%2 != 0) {
					echo '<div class="col-xs-1 text-center bg-primary bordered">&nbsp;</div>' . "\n";
					$num++;
				} else {
					echo '<div class="col-xs-1 text-center bordered">&nbsp;</div>' . "\n";
					$num++;
				}
			}
		}
		echo '</div>' . "\n";
		$num++;
	}
	
	// Prints A,B,C,D.. row
	echo '<div class="row">' . "\n";
	for ($i=0; $i < 10; $i++) {
		if ($i==0 || $i==9) {
			echo '<div class="col-xs-1 text-center">&nbsp;</div>' . "\n";
		} else {
			echo '<div class="col-xs-1 text-center v_center">' . $ah[$i-1] . '</div>' . "\n";
		}
	}
	echo '</div>' . "\n";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap Homework Task 3</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<style type="text/css">
		.v_center{
			padding: 3.5vh 0;
		}
		.row{
			height: 10vh;
			max-height: 80px;
		}
		.bordered {
			box-sizing: border-box;
			border: 1px solid #337ab7;
		}
		.col-xs-1 {
			height: 100%;
		}
		.container {
			max-width: 960px;
		}
	</style>
</head>
<body>
<div class="container">
<?php
print_table();
?>	
</div>
</body>
</html>