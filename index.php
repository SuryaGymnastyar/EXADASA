<?php 
if(empty(session_id())) session_start();
require_once './app/init.php';


if (file_exists('./app/core/App.php')) {
 	new App();
}