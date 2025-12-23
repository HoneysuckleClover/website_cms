<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// =====================
// DEFAULT CONTROLLER
// =====================
$route['default_controller'] = 'welcome';
$route['404_override'] = 'welcome/notfound';
$route['translate_uri_dashes'] = FALSE;

// =====================
// LOGIN, REGISTER, DAN DASHBOARD
// =====================
$route['login'] = 'login';
$route['dashboard'] = 'dashboard';

$route['register'] = 'register';
$route['register/simpan'] = 'register/simpan';

// DASHBOARD PORTFOLIO
$route['dashboard/portfolio'] = 'dashboard/portfolio';
$route['dashboard/portfolio/tambah'] = 'dashboard/portfolio_tambah';
$route['dashboard/portfolio/tambah_aksi'] = 'dashboard/portfolio_tambah_aksi';
$route['dashboard/portfolio/edit/(:num)'] = 'dashboard/portfolio_edit/$1';
$route['dashboard/portfolio/update'] = 'dashboard/portfolio_update';
$route['dashboard/portfolio/hapus/(:num)'] = 'dashboard/portfolio_hapus/$1';

// DASHBOARD KATEGORI
$route['dashboard/kategori'] = 'dashboard/kategori';
$route['dashboard/kategori/tambah'] = 'dashboard/kategori_tambah';
$route['dashboard/kategori/tambah_aksi'] = 'dashboard/kategori_tambah_aksi';
$route['dashboard/kategori/edit/(:num)'] = 'dashboard/kategori_edit/$1';
$route['dashboard/kategori/update'] = 'dashboard/kategori_update';
$route['dashboard/kategori/hapus/(:num)'] = 'dashboard/kategori_hapus/$1';

// DASHBOARD ARTIKEL
$route['dashboard/artikel'] = 'dashboard/artikel';
$route['dashboard/artikel/tambah'] = 'dashboard/artikel_tambah';
$route['dashboard/artikel/tambah_aksi'] = 'dashboard/artikel_aksi';
$route['dashboard/artikel/edit/(:num)'] = 'dashboard/artikel_edit/$1';
$route['dashboard/artikel/update'] = 'dashboard/artikel_update';
$route['dashboard/artikel/hapus/(:num)'] = 'dashboard/artikel_hapus/$1';

// DASHBOARD HALAMAN / PAGES
$route['dashboard/pages'] = 'dashboard/pages';
$route['dashboard/pages/tambah'] = 'dashboard/pages_tambah';
$route['dashboard/pages/tambah_aksi'] = 'dashboard/pages_aksi';
$route['dashboard/pages/edit/(:num)'] = 'dashboard/pages_edit/$1';
$route['dashboard/pages/update'] = 'dashboard/pages_update';
$route['dashboard/pages/hapus/(:num)'] = 'dashboard/pages_hapus/$1';

// DASHBOARD PENGGUNA
$route['dashboard/pengguna'] = 'dashboard/pengguna';
$route['dashboard/pengguna/tambah'] = 'dashboard/pengguna_tambah';
$route['dashboard/pengguna/tambah_aksi'] = 'dashboard/pengguna_tambah_aksi';
$route['dashboard/pengguna/edit/(:num)'] = 'dashboard/pengguna_edit/$1';
$route['dashboard/pengguna/update'] = 'dashboard/pengguna_update';
$route['dashboard/pengguna/hapus/(:num)'] = 'dashboard/pengguna_hapus/$1';
$route['dashboard/pengguna/hapus_aksi'] = 'dashboard/pengguna_hapus_aksi';

// =====================
// FRONTEND ROUTES
// =====================

// Homepage
$route['welcome'] = 'welcome/index'; // homepage khusus
$route[''] = 'welcome/index';       // akses root tetap ke homepage

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

// Artikel prefix
$route['artikel/(:any)'] = 'welcome/single/$1';

// Portfolio Detail
$route['portfolio/(:any)'] = 'welcome/portfolio/$1';

// =====================
// TESTIMONIAL (FRONTEND)
// =====================
$route['testimonial'] = 'testimonial/index';
$route['testimonial/kirim'] = 'testimonial/kirim';
$route['testimonial/sukses'] = 'testimonial/sukses';
$route['testimonial/list'] = 'testimonial/list';


// =====================
// TESTIMONIAL ADMIN
// =====================
$route['dashboard/testimonial'] = 'dashboard/testimonial';
$route['dashboard/testimonial/approve/(:num)'] = 'dashboard/testimonial_approve/$1';
$route['dashboard/testimonial/hapus/(:num)'] = 'dashboard/testimonial_hapus/$1';


// =====================
// FALLBACK SLUG (frontend)
// Semua URL yang belum terdaftar dianggap slug artikel/page
// Letakkan di paling bawah agar tidak override route lain
$route['(:any)'] = 'welcome/single/$1';
