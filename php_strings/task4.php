<?php
function generate_pass($lenght){
	$chars = 'abcdefghijklmnopqrstuvwxyz' . strtoupper('abcdefghijklmnopqrstuvwxyz') . "0123456789";
	$arr = str_split($chars);
	$pass = NULL;
	//Generate 1 [a-z] sign
	$rand = rand(0, 25);
	$pass = $pass . $arr[$rand];
	$lenght --;
	//Generate 1 [A-Z] sign
	$rand = rand(26, 51);
	$pass = $pass . $arr[$rand];
	$lenght --;
	//Generate 1 [0-9] sign
	$rand = rand(52, 61);
	$pass = $pass . $arr[$rand];
	$lenght --;
	//Generate random symbols
	for ($i=0; $i < $lenght; $i++) {
		$rand = rand(0, strlen($chars)-1);
		$pass = $pass . $arr[$rand];
	}
	//Shuffle password string
	$pass = str_shuffle($pass);
	echo "$pass";
}
generate_pass(7);