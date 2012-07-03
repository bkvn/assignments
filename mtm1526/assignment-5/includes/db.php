<?php

$dsn = getenv('DB_DSN');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

$db = new PDO($dsn, $user, $pass);
$db->exec('SET NAMES utf-8');