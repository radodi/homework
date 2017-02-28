<?php
function hello_msg($first, $last, $err=false){
	if ($err) {
		echo '			<div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
				<span class="sr-only">Warning:</span>
				<strong>Warning!</strong> All input fields are required!
			</div>' . "\n";
	} else {
	echo '			<div class="alert alert-info" role="alert">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				<span class="sr-only">User:</span>
				<strong>' . $first . ' ' . $last . '</strong>, are you having fun with Bootstrap!
			</div>' . "\n";
			}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap Task 2</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<h1 class="text-center"> Bootstrap Homework Task 2</h1>
		<div class="col-md-4">
			<form action="task2.php" method="post">
				<div class="form-group">
					<label for="fname" class="text-primary">First Name:</label>
					<input type="text" class="form-control" name="first_name" id="fname" placeholder="Name">
				</div>
				<div class="form-group">
					<label for="lname" class="text-primary">Last Name:</label>
					<input type="text" class="form-control" name="last_name" id="lname" placeholder="Name">
				</div>
				<input type="submit" class="btn btn-primary" name="submit" value="Send">
			</form>
		</div>
		<div class="col-md-8">
<?php
if ($_POST) {
	if ($_POST['first_name'] && $_POST['last_name']) {
		hello_msg($_POST['first_name'], $_POST['last_name']);
	} else {
		hello_msg($_POST['first_name'], $_POST['last_name'], true);
	}
}
?>
		</div>
	</div>
</body>
</html>