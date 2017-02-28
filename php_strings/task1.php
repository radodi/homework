<?php
function print_text($str, $type){
	$res = NULL;
	switch ($type) {
		case '1':
			$reg = "/[A-Z]/"; //Rregular expression
			$arr = str_split($str, 1); //Convert string to array
			for ($i=0; $i < count($arr); $i++) {
				if (preg_match($reg, $arr[$i])) { //Check for regular expression match  
					$res = $res . $arr[$i];
				}
			}
			break;
		case '2':
			$reg = "/[a-z]/";
			$arr = str_split($str, 1);
			for ($i=0; $i < count($arr); $i++) {
				if (preg_match($reg, $arr[$i])) {
					$res = $res . $arr[$i];
				}
			}
			break;
		default:
			$reg = "/[0-9]/";
			$arr = str_split($str, 1);
			for ($i=0; $i < count($arr); $i++) {
				if (preg_match($reg, $arr[$i])) {
					$res = $res . $arr[$i];
				}
			}
			break;
	}
	//Check if the value of $res is not NULL print the result
	if ($res != NULL) {
				echo "Резултатът е: " . $res;
			} else {
				echo "Няма буква или цифра отговаряща на избраното условие!!";
			}
}
echo '
<form action="task1.php" method="post">
	<div>
		<label for="string">Въведете текст съдържаш главни, малки букви и цифри.</label>
	</div>
	<div>
		<input type="text" name="string" id="string">
	</div>
	<div>
		<input type="radio" name="type" id="AZ" value="1" checked>
		<label for="AZ">[A-Z]</label>
		<input type="radio" name="type" id="az1" value="2">
		<label for="az1">[a-z]</label>
		<input type="radio" name="type" id="19" value="3">
		<label for="19">[1-9]</label>
	</div>
	<div>
		<input type="submit" name="submit" value="Send">
	</div>
</form>';
if (!empty($_POST)) {
	print_text($_POST['string'], $_POST['type']);
};