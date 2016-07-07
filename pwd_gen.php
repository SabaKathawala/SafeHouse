<?php
// Generates a strong password of N length containing at least one lower case letter,
// one uppercase letter, one digit, and one special character. The remaining characters
// in the password are chosen at random from those four sets.
//
// The available characters in each set are user friendly - there are no ambiguous
// characters such as i, l, 1, o, 0, etc. This, coupled with the $add_dashes option,
// makes it much easier for users to manually type or speak their passwords.
//
// Note: the $add_dashes option will increase the length of the password by
// floor(sqrt(N)) characters.

if(isset($_GET['length']))
{
	$length = $_GET['length'];
	

	$sets = array();

		$sets[] = 'abcdefghjkmnpqrstuvwxyz';
		$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
		$sets[] = '23456789';
		$sets[] = '+?!@$%&*#=()[{}]';

	$all = '';
	$password = '';
	foreach($sets as $set)
	{
		$password .= $set[array_rand(str_split($set))];	//converts the string into array and randomly selects a character
		$all .= $set;
	}

	$all = str_split($all);
	for($i = 0; $i < $length - 4; $i++)
		$password .= $all[array_rand($all)];

	$password = str_shuffle($password);

	$response = array("msg"=>$password);	
	echo json_encode($response);

	
}

?>
