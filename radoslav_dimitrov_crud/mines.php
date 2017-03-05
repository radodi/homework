<?php
include ('includes/db_connect.php');
//Delete mine
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
	$mine_id = $_GET['id'];
	$date = date('Y-m-d');
	$q = "UPDATE `mines` SET `date_deleted`= '$date'  WHERE `mine_id`= $mine_id";
	$result = mysqli_query($conn, $q);
	if (mysqli_query($conn, $q)) {
		unset($_GET);
		return header('Location: mines.php');
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
			<li role="presentation"><a href="resource_types.php">Resource Types</a></li>
			<li role="presentation" class="active"><a href="mines.php">Mines</a></li>
		</ul>
	<div class="col-md-4">
		<form method="post" action="mines.php">
			<h3>Add Mine</h3>
			<input type="hidden" name="action" value="add">
			<label class="text-primary"> Mine Name:
				<input class="form-control" type="text" name="mine_name">
			</label>
			<label class="text-primary"> Mine Depletion:
				<input class="form-control" type="text" name="mine_depletion">
			</label>
			<label class="text-primary">Select Country:
			<select name="country_id" class="form-control">
			<option value=""> - Select - </option>
			<?php
			//Read Countrues
		$read_query = "SELECT * FROM `countries` WHERE `date_deleted` IS NULL";
		$result = mysqli_query($conn, $read_query);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<option value='" . $row['country_id'] . "'>" . $row['country_name'] . "</option>";
			}
		}
			?>
			</select>
			</label>
			<label class="text-primary">Select Terrain:
			<select name="terrain_id" class="form-control">
			<option value=""> - Select - </option>
			<?php
			//Read terrains
		$read_query = "SELECT * FROM `terrains` WHERE `date_deleted` IS NULL";
		$result = mysqli_query($conn, $read_query);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<option value='" . $row['terrain_id'] . "'>" . $row['terrain_name'] . "</option>";
			}
		}
			?>
			</select>
			</label>
			<label class="text-primary">Select Resource Type:
			<select name="type_id" class="form-control">
			<option value=""> - Select - </option>
			<?php
			//Read Resource types
		$read_query = "SELECT * FROM `resource_types` WHERE `date_deleted` IS NULL";
		$result = mysqli_query($conn, $read_query);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<option value='" . $row['type_id'] . "'>" . $row['type_name'] . "</option>";
			}
		}
			?>
			</select>
			</label>
			<input class="btn btn-primary" type="submit" name="submit" value="Add">
		</form>
		<?php
//add mine
		if (isset($_POST['mine_name']) && !empty($_POST['mine_depletion']) && !empty($_POST['country_id']) && !empty($_POST['terrain_id']) && !empty($_POST['type_id']) && $_POST['action'] == 'add') {
			$mine_name = $_POST['mine_name'];
			$mine_depletion = $_POST['mine_depletion'];
			$country_id = $_POST['country_id'];
			$terrain_id = $_POST['terrain_id'];
			$type_id = $_POST['type_id'];
			$insert_query = "INSERT INTO `mines`(`mine_name`, `mine_depletion`, `type_id`, `country_id`, `terrain_id`) VALUES ('$mine_name', '$mine_depletion', '$type_id', '$country_id', '$terrain_id')";
			if (mysqli_query($conn, $insert_query)) {
			echo '<div class="alert alert-info" role="alert">' . "\n";
			echo '			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' . "\n";
			echo '			<span class="sr-only">OK:</span>' . "\n";
			echo '			<strong>' . $mine_name . '</strong> added successfully!' . "\n";
			echo '		</div>' . "\n";
			} else {
				echo "Error: " . $insert_query . " - " . mysqli_error($conn);
			}
		}
//Update mine
		if (isset($_POST['mine_name']) && $_POST['action'] == 'update') {
			$mine_id = $_POST['mine_id'];
			$mine_name = $_POST['mine_name'];
			$mine_depletion = $_POST['mine_depletion'];
			$country_id = $_POST['country_id'];
			$terrain_id = $_POST['terrain_id'];
			$type_id = $_POST['type_id'];
			$insert_query = "UPDATE `mines` SET `mine_name`= '$mine_name', `mine_depletion`= '$mine_depletion', `country_id`= '$country_id', `terrain_id`= '$terrain_id', `type_id`= '$type_id' WHERE `mine_id`= $mine_id";
			if (mysqli_query($conn, $insert_query)) {
			echo '<div class="alert alert-info" role="alert">' . "\n";
			echo '			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' . "\n";
			echo '			<span class="sr-only">OK:</span>' . "\n";
			echo '			<strong>' . $mine_name . '</strong> updated successfully!' . "\n";
			echo '		</div>' . "\n";
			} else {
				echo "Error: " . $insert_query . " - " . mysqli_error($conn);
			}
			if(isset($_GET)) {unset($_GET);}
		}
//Update mine Form
if (isset($_GET['action']) && $_GET['action'] == 'update_form') {
	$mine_id = $_GET['id'];
	$q = "SELECT * FROM `mines` WHERE mine_id = $mine_id";
	$result = mysqli_query($conn, $q);

	if (mysqli_num_rows($result) !==0) {
		$row_edit = mysqli_fetch_assoc($result);
	}
?>
<form method="post" action="mines.php">
			<h3>Edit Mine</h3>
			<input type="hidden" name="action" value="update">
			<input type="hidden" name="mine_id" value="<?= $mine_id ?>">
			<label class="text-primary"> Mine Name:
				<input class="form-control" type="text" name="mine_name" value="<?= $row_edit['mine_name'] ?>">
			</label>
			<label class="text-primary"> Mine Depletion:
				<input class="form-control" type="text" name="mine_depletion" value="<?= $row_edit['mine_depletion'] ?>">
			</label>
			<label class="text-primary">Select Country:
			<select name="country_id" class="form-control">
			<?php
			//Read Countrues
		$read_query = "SELECT * FROM `countries` WHERE `date_deleted` IS NULL";
		$result = mysqli_query($conn, $read_query);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				if ($row['country_id'] == $row_edit['country_id']) {
				echo "<option selected value='" . $row['country_id'] . "'>" . $row['country_name'] . "</option>";
				}else {
				echo "<option value='" . $row['country_id'] . "'>" . $row['country_name'] . "</option>";
				}
			}
		}
			?>
			</select>
			</label>
			<label class="text-primary">Select Terrain:
			<select name="terrain_id" class="form-control">
			<?php
			//Read terrains
		$read_query = "SELECT * FROM `terrains` WHERE `date_deleted` IS NULL";
		$result = mysqli_query($conn, $read_query);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				if ($row['terrain_id'] == $row_edit['terrain_id']) {
					echo "<option selected value='" . $row['terrain_id'] . "'>" . $row['terrain_name'] . "</option>";
				} else {
					echo "<option value='" . $row['terrain_id'] . "'>" . $row['terrain_name'] . "</option>";
				}
			}
		}
			?>
			</select>
			</label>
			<label class="text-primary">Select Resource Type:
			<select name="type_id" class="form-control">
			<?php
			//Read Resource types
		$read_query = "SELECT * FROM `resource_types` WHERE `date_deleted` IS NULL";
		$result = mysqli_query($conn, $read_query);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				if ($row['type_id'] == $row_edit['type_id']) {
				echo "<option selected value='" . $row['type_id'] . "'>" . $row['type_name'] . "</option>";
				} else {
				echo "<option value='" . $row['type_id'] . "'>" . $row['type_name'] . "</option>";
				}
			}
		}
			?>
			</select>
			</label>
			<input class="btn btn-primary" type="submit" name="submit" value="Update">
		</form>
		<?php

}
//read mines
		$read_query = "SELECT mines.mine_id, mines.mine_name, mines.mine_depletion, mines.type_id, mines.country_id, mines.terrain_id, mines.date_deleted, resource_types.type_name, countries.country_name, terrains.terrain_name FROM mines JOIN resource_types ON mines.type_id = resource_types.type_id JOIN countries ON mines.country_id = countries.country_id JOIN terrains ON mines.terrain_id = terrains.terrain_id WHERE mines.date_deleted IS NULL";
		$result = mysqli_query($conn, $read_query);
		if (mysqli_num_rows($result) > 0) {
			echo "</div>
			<div class=\"col-md-8\">
			<h3>Mines List</h3>
			<table class='table table-bordered table-striped'>
				<thead>
				<tr>
				<th>Name</th>
				<th>Depletion</th>
				<th>Type</th>
				<th>Country</th>
				<th>Terrain</th>
				<th>Update</th>
				<th>Delete</th>
				</tr>
				</thead>
				<tbody>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['mine_name'] . "</td>";
				echo "<td>" . $row['mine_depletion'] . "</td>";
				echo "<td>" . $row['type_name'] . "</td>";
				echo "<td>" . $row['country_name'] . "</td>";
				echo "<td>" . $row['terrain_name'] . "</td>";
				echo "<td><a href='mines.php?action=update_form&id=" . $row['mine_id'] . "'>update</a></td>";
				echo "<td><a href='mines.php?action=delete&id=" . $row['mine_id'] . "'>delete</a></td>";
				echo "</tr>";
			}
			echo "</tbody>
			</table>";
		}
		?>
	</div>
	</div>
</body>
</html>