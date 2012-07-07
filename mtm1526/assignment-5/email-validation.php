<?php

require_once 'includes/db.php';

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

	
$sql = $db->prepare('SELECT id FROM forms WHERE email = :email'); 
$sql->bindValue(':email', $email, PDO::PARAM_STR);
$sql->execute();
$result = $sql->fetch();

if (empty($result))
	echo 'available';
else
	echo 'unavailable';
