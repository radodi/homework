<?php
include ('includes/db_connect.php');
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
	$type_id = $_GET['id'];
	$date = date('Y-m-d');
	$q = "UPDATE `resource_types` SET `date_deleted`= '$date'  WHERE `type_id`= $type_id";
	$result = mysqli_query($conn, $q);
	if (mysqli_query($conn, $q)) {
		unset($_GET);
		return header('Location: resource_types.php');
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
			<li role="presentation"><a href="terrains.php">Terrains</a></li>
			<li role="presentation" class="active"><a href="resource_types.php">Resource Types</a></li>
			<li role="presentation"><a href="mines.php">Mines</a></li>
	</ul>
	<div class="col-md-4">
		<form method="post" action="resource_types.php">
			<h3>Add Resource Type</h3>
			<input type="hidden" name="action" value="add">
			<label class="text-primary"> Resource Type Name:
				<input class="form-control" type="text" name="type_name">
			</label>
			<input class="btn btn-primary" type="submit" name="submit" value="Add">
		</form>
		<?php
//add type
		if (isset($_POST['type_name']) && $_POST['action'] == 'add') {
			$type_name = $_POST['type_name'];
			$insert_query = "INSERT INTO `resource_types`(`type_name`) VALUES ('$type_name')";
			if (mysqli_query($conn, $insert_query)) {
			echo '<div class="alert alert-info" role="alert">' . "\n";
			echo '			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' . "\n";
			echo '			<span class="sr-only">OK:</span>' . "\n";
			echo '			<strong>' . $type_name . '</strong> added successfully!' . "\n";
			echo '		</div>' . "\n";
			} else {
				echo "Error: " . $insert_query . " - " . mysqli_error($conn);
			}
		}
//Update type
		if (isset($_POST['type_name']) && $_POST['action'] == 'update') {
			$type_id = $_POST['type_id'];
			$type_name = $_POST['type_name'];
			$insert_query = "UPDATE `resource_types` SET `type_name`= '$type_name'  WHERE `type_id`= $type_id";
			if (mysqli_query($conn, $insert_query)) {
			echo '<div class="alert alert-info" role="alert">' . "\n";
			echo '			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' . "\n";
			echo '			<span class="sr-only">OK:</span>' . "\n";
			echo '			<strong>' . $type_name . '</strong> updated successfully!' . "\n";
			echo '		</div>' . "\n";
			} else {
				echo "Error: " . $insert_query . " - " . mysqli_error($conn);
			}
			if(isset($_GET)) {unset($_GET);}
		}
//Update type Form
if (isset($_GET['action']) && $_GET['action'] == 'update_form') {
	$type_id = $_GET['id'];
	$q = "SELECT * FROM `resource_types` WHERE type_id = $type_id";
	$result = mysqli_query($conn, $q);

	if (mysqli_num_rows($result) !==0) {
		$row = mysqli_fetch_assoc($result);
	}
	echo '
		<form method="post" action="resource_types.php">
			<h3>Edit Resource Type</h3>
			<input type="hidden" name="action" value="update">
			<input type="hidden" name="type_id" value="' . $row['type_id'] . '">
			<label class="text-primary"> Resource Type Name:
				<input class="form-control" type="text" name="type_name" value="' . $row['type_name'] . '">
			</label>
			<input class="btn btn-primary" type="submit" name="submit" value="Update">
		</form>';

}
//read types
		$read_query = "SELECT * FROM `resource_types` WHERE `date_deleted` IS NULL";
		$result = mysqli_query($conn, $read_query);
		if (mysqli_num_rows($result) > 0) {
			echo "</div>
			<div class=\"col-md-8\">
			<h3>Resource Types List</h3>
			<table class='table table-bordered table-striped'>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['type_name'] . "</td>";
				echo "<td><a href='resource_types.php?action=update_form&id=" . $row['type_id'] . "'>update</a></td>";
				echo "<td><a href='resource_types.php?action=delete&id=" . $row['type_id'] . "'>delete</a></td>";

				echo "</tr>";

			}
			echo "</table>";
		}
		?>
	</div>
	</div>
</body>
</html>