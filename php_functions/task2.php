<?php
echo "
<form action='task2.php' method='post'>
<label for='arr'>Enter comma separated values of array</label>
<input type='text' name='arr' id='arr' placeholder = '2,11,2,3,0,2'>
<input type='submit' name='submit'>
</form>";
function print_key($arr){
	$myarr = explode(',', $arr);
	for ($i=0; $i < count($myarr); $i++) { 
		if ($myarr[$i] > $myarr[count($myarr)-1] && $myarr[$i] > $myarr[$i+1]) {
			echo "$myarr[$i]";
			break;
		}
	}
}
print_key($_POST['arr']);