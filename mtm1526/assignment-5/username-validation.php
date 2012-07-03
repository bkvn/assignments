<?php

require_once 'includes/db.php';

$errors = array();
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(empty($username))
		$errors['username'] = true;
	
	if(empty($errors))
	{
		$sql = $db->prepare('SELECT username FROM forms WHERE username = :username LIMIT 1'); 
		$sql->bindValue(':username', $username, PDO::PARAM_STR);
		$sql->execute();
		$result = $sql->fetch();
		
		if(isset($result['username']))
			echo 'username:unavailable';
		else
			echo 'username:available';
	}
}