<?php

return function (array $settings): array {
//credenciales de la base de datos 
$settings['db']['host']='localhost';
$settings['db']['database']='biblioteca';
$settings['db']['username']='biblio_user';
$settings['db']['password']='b1bli@';

//env sttings
$settings['env'] = 'dev'; //dev | prod
 return $settings;
};