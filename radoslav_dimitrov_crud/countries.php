<?php
include ('includes/db_connect.php');
//Delete Country
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
	$country_id = $_GET['id'];
	$date = date('Y-m-d');
	$q = "UPDATE `countries` SET `date_deleted`= '$date'  WHERE `country_id`= $country_id";
	$result = mysqli_query($conn, $q);
	if (mysqli_query($conn, $q)) {
		unset($_GET);
		return header('Location: countries.php');
	} else {
		echo "Error: " . $q . " - " . mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homework CRUD - Radoslav</title>
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
	<h2 class="text-center">Natural Resources Database</h2>
	<ul class="nav nav-tabs">
			<li role="presentation"><a href="index.php">Home</a></li>
			<li role="presentation" class="active"><a href="countries.php">Countries</a></li>
			<li role="presentation"><a href="terrains.php">Terrains</a></li>
			<li role="presentation"><a href="resource_types.php">Resource Types</a></li>
			<li role="presentation"><a href="mines.php">Mines</a></li>
	</ul>
	<div class="col-md-4">
		<form method="post" action="countries.php">
			<h3>Add Country</h3>
			<input type="hidden" name="action" value="add">
			<label class="text-primary"> Country name:
				<input class="form-control" type="text" name="country_name">
			</label>
			<input class="btn btn-primary" type="submit" name="submit" value="Add">
		</form>
		<?php
//add country
		if (isset($_POST['country_name']) && $_POST['action'] == 'add') {
			$country_name = $_POST['country_name'];
			$insert_query = "INSERT INTO `countries`(`country_name`) VALUES ('$country_name')";
			if (mysqli_query($conn, $insert_query)) {
			echo '<div class="alert alert-info" role="alert">' . "\n";
			echo '			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' . "\n";
			echo '			<span class="sr-only">OK:</span>' . "\n";
			echo '			<strong>' . $country_name . '</strong> added successfully!' . "\n";
			echo '		</div>' . "\n";
			} else {
				echo "Error: " . $insert_query . " - " . mysqli_error($conn);
			}
		}
//Update Country
		if (isset($_POST['country_name']) && $_POST['action'] == 'update') {
			$country_id = $_POST['country_id'];
			$country_name = $_POST['country_name'];
			$insert_query = "UPDATE `countries` SET `country_name`= '$country_name'  WHERE `country_id`= $country_id";
			if (mysqli_query($conn, $insert_query)) {
			echo '<div class="alert alert-info" role="alert">' . "\n";
			echo '			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' . "\n";
			echo '			<span class="sr-only">OK:</span>' . "\n";
			echo '			<strong>' . $country_name . '</strong> updated successfully!' . "\n";
			echo '		</div>' . "\n";
			} else {
				echo "Error: " . $insert_query . " - " . mysqli_error($conn);
			}
			if(isset($_GET)) {unset($_GET);}
		}
//Update Country Form
if (isset($_GET['action']) && $_GET['action'] == 'update_form') {
	$country_id = $_GET['id'];
	$q = "SELECT * FROM `countries` WHERE country_id = $country_id";
	$result = mysqli_query($conn, $q);

	if (mysqli_num_rows($result) !==0) {
		$row = mysqli_fetch_assoc($result);
	}
	echo '
		<form method="post" action="countries.php">
			<h3>Edit Country</h3>
			<input type="hidden" name="action" value="update">
			<input type="hidden" name="country_id" value="' . $row['country_id'] . '">
			<label class="text-primary"> Country name:
				<input class="form-control" type="text" name="country_name" value="' . $row['country_name'] . '">
			</label>
			<input class="btn btn-primary" type="submit" name="submit" value="Update">
		</form>';

}
//Read Countrues
		$read_query = "SELECT * FROM `countries` WHERE `date_deleted` IS NULL";
		$result = mysqli_query($conn, $read_query);
		if (mysqli_num_rows($result) > 0) {
			echo "</div>
			<div class=\"col-md-8\">
			<h3>Countries List</h3>
			<table class='table table-bordered table-striped'>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['country_name'] . "</td>";
				echo "<td><a href='countries.php?action=update_form&id=" . $row['country_id'] . "'>update</a></td>";
				echo "<td><a href='countries.php?action=delete&id=" . $row['country_id'] . "'>delete</a></td>";

				echo "</tr>";

			}
			echo "</table>";
		}
		?>
	</div>
	</div>
</body>
</html>