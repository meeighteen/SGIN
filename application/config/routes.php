<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['incidents'] = 'incidents/index';	
$route['report_incident']='report_incident/index';
//$route['incidents/(:any)'] = 'incidents/index/$1';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
