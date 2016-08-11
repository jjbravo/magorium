<?php 

	define('DS',DIRECTORY_SEPARATOR);
	define('ROOT',realpath(dirname(__FILE__)) . DS);
	
	define('URL','http://localhost/magorium/');
	define('MEDIA','http://localhost/magorium/media');
	
	session_start();

	require_once "Config/Autoload.php";
	Config\Autoload::run();
	require_once "Views/Template.php";
	Config\Enrutador::run(new Config\Request());

	/*******************************/
	// phpinfo();				       //	
	/*******************************/

 ?>


