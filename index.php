<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);



//constantes
//define('DS', DIRECTORY_SEPARATOR); 
//define('ROOT', realpath(dirname(__FILE__)) . DS);

//require_once "Config/Autoload.php";
//Config\Autoload::run();
//new Models\Estudiante();
//new Config\Request();


	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
	define('URL', "http://localhost/proyecto/");

	require_once "Config/Autoload.php";
	Config\Autoload::run();
	new Config\Request();
	require_once "Views/template.php";
	Config\Enrutador::run(new Config\Request());

//echo 'todo en orden';



?>
