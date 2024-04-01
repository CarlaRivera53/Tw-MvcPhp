<?php
//aplicacion default settings 
//error reporting 
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

//timezone 
date_default_timezone_set('America/Mexico_city');

$settings = [];

//database settings
$settings =(require __DIR__.'/env.php')($settings);

return $settings;