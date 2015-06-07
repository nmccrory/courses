<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['process'] = 'main/process';
$route['courses/destroy/(:any)'] = "main/remove/$1";
$route['courses/destroy/delete'] = 'main/deleteCourse';

?>