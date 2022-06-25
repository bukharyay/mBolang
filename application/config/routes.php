<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login-page'] = 'auth';
$route['logout-page'] = 'auth/logout';
$route['Selamat-Datang'] = 'home';
$route['Daerah'] = 'home/daerah';
$route['Daerah/(:num)'] = 'home/detail_daerah/$1';
$route['Wisata'] = 'home/wisata';
$route['Wisata/(:num)'] = 'home/detail_wisata/$1';
$route['Kuliner'] = 'home/kuliner';
$route['Kuliner/(:num)'] = 'home/detail_kuliner/$1';
$route['Budaya'] = 'home/budaya';
$route['Budaya/(:num)'] = 'home/detail_budaya/$1';
$route['Kerajinan'] = 'home/kerajinan';
$route['Kerajinan/(:num)'] = 'home/detail_kerajinan/$1';
