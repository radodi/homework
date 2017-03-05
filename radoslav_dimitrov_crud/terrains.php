<?php
include ('includes/db_connect.php');
//Delete terrain
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
	$terrain_id = $_GET['id'];
	$date = date('Y-m-d');
	$q = "UPDATE `terrains` SET `date_deleted`= '$date'  WHERE `terrain_id`= $terrain_id";
	$result = mysqli_query($conn, $q);
	if (mysqli_query($conn, $q)) {
		unset($_GET);
		return header('Location: terrains.php');
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
			<li role="presentation"><a href="countries.php">Countries</a></li>
			<li role="presentation" class="active"><a href="terrains.php">Terrains</a></li>
			<li role="presentation"><a href="resource_types.php">Resource Types</a></li>
			<li role="presentation"><a href="mines.php">Mines</a></li>
	</ul>
	<div class="col-md-4">
		<form method="post" action="terrains.php">
			<h3>Add Terrain</h3>
			<input type="hidden" name="action" value="add">
			<label class="text-primary"> Terrain Name:
				<input class="form-control" type="text" name="terrain_name">
			</label>
			<input class="btn btn-primary" type="submit" name="submit" value="Add">
		</form>
		<?php
//add terrain
		if (isset($_POST['terrain_name']) && $_POST['action'] == 'add') {
			$terrain_name = $_POST['terrain_name'];
			$insert_query = "INSERT INTO `terrains`(`terrain_name`) VALUES ('$terrain_name')";
			if (mysqli_query($conn, $insert_query)) {
			echo '<div class="alert alert-info" role="alert">' . "\n";
			echo '			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' . "\n";
			echo '			<span class="sr-only">OK:</span>' . "\n";
			echo '			<strong>' . $terrain_name . '</strong> added successfully!' . "\n";
			echo '		</div>' . "\n";
			} else {
				echo "Error: " . $insert_query . " - " . mysqli_error($conn);
			}
		}
//Update terrain
		if (isset($_POST['terrain_name']) && $_POST['action'] == 'update') {
			$terrain_id = $_POST['terrain_id'];
			$terrain_name = $_POST['terrain_name'];
			$insert_query = "UPDATE `terrains` SET `terrain_name`= '$terrain_name'  WHERE `terrain_id`= $terrain_id";
			if (mysqli_query($conn, $insert_query)) {
			echo '<div class="alert alert-info" role="alert">' . "\n";
			echo '			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' . "\n";
			echo '			<span class="sr-only">OK:</span>' . "\n";
			echo '			<strong>' . $terrain_name . '</strong> updated successfully!' . "\n";
			echo '		</div>' . "\n";
			} else {
				echo "Error: " . $insert_query . " - " . mysqli_error($conn);
			}
			if(isset($_GET)) {unset($_GET);}
		}
//Update terrain Form
if (isset($_GET['action']) && $_GET['action'] == 'update_form') {
	$terrain_id = $_GET['id'];
	$q = "SELECT * FROM `terrains` WHERE terrain_id = $terrain_id";
	$result = mysqli_query($conn, $q);

	if (mysqli_num_rows($result) !==0) {
		$row = mysqli_fetch_assoc($result);
	}
	echo '
		<form method="post" action="terrains.php">
			<h3>Edit Terrain</h3>
			<input type="hidden" name="action" value="update">
			<input type="hidden" name="terrain_id" value="' . $row['terrain_id'] . '">
			<label class="text-primary"> Terrain Name:
				<input class="form-control" type="text" name="terrain_name" value="' . $row['terrain_name'] . '">
			</label>
			<input class="btn btn-primary" type="submit" name="submit" value="Update">
		</form>';

}
//read terrains
		$read_query = "SELECT * FROM `terrains` WHERE `date_deleted` IS NULL";
		$result = mysqli_query($conn, $read_query);
		if (mysqli_num_rows($result) > 0) {
			echo "</div>
			<div class=\"col-md-8\">
			<h3>Terrains List</h3>
			<table class='table table-bordered table-striped'>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['terrain_name'] . "</td>";
				echo "<td><a href='terrains.php?action=update_form&id=" . $row['terrain_id'] . "'>update</a></td>";
				echo "<td><a href='terrains.php?action=delete&id=" . $row['terrain_id'] . "'>delete</a></td>";

				echo "</tr>";

			}
			echo "</table>";
		}
		?>
	</div>
	</div>
</body>
</html>