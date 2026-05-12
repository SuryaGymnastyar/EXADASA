<?php 
if(empty(session_id())) session_start();
require_once './app/init.php';

<<<<<<< HEAD

=======
>>>>>>> 7d32ded09ceece1b517447c049e81177eb7d210d

if (file_exists('./app/core/App.php')) {
 	new App();
}