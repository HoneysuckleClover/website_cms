<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';

// Login & Dashboard
$route['login'] = 'login';
$route['dashboard'] = 'dashboard';

// Blog
$route['blog'] = 'welcome/blog';
$route['blog/(:num)'] = 'welcome/blog/$1';

// Kategori
$route['kategori/(:any)'] = 'welcome/kategori/$1';
$route['kategori/(:any)/(:num)'] = 'welcome/kategori/$1/$2';

// Search
$route['search'] = 'welcome/search';
$route['search/(:any)'] = 'welcome/search/$1';
$route['search/(:any)/(:num)'] = 'welcome/search/$1/$2';

// Page
$route['page/(:any)'] = 'welcome/page/$1';

// Artikel dengan prefix
$route['artikel/(:any)'] = 'welcome/single/$1';

// 🔥 Artikel TANPA prefix (slug langsung)
// HARUS DITARUH PALING BAWAH sebelum 404
$route['(:any)'] = 'welcome/single/$1';

// 404 override
$route['404_override'] = 'welcome/notfound';
$route['translate_uri_dashes'] = FALSE;
