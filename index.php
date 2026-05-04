<?php 
if(empty(session_id())) session_start();
require_once './app/init.php';

$_SESSION['user'] = [
	'id' => 1,
	'username' => 'M. Surya Gymnastyar',
	'role' => 'admin'
];


if (file_exists('./app/core/App.php')) {
 	new App();
} 
