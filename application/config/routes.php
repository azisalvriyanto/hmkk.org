<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
git add .
git commit -m ''
git push -u al-vri master
azisalvriyanto
*/

$route["default_controller"]	= "Umum";
$route["404_override"]			= "Galat/_404";
$route["translate_uri_dashes"]	= FALSE;

//umum
$route["beranda"]               = "Umum/index";
$route["kontak"]                = "Umum/kontak";
$route["artikel"]               = "Umum/artikel";
$route["berita"]                = "Umum/berita";
$route["kegiatan"]              = "Umum/kegiatan";
$route["galeri"]                = "Umum/galeri";

//administrator
$route["administrator"]  = "administrator/C_AMasuk/index";
$route["administrator/beranda"]  = "administrator/C_ABeranda/index";
$route["administrator/pengguna"]          = "administrator/C_APengguna/index";
$route["administrator/pengguna/tambah"]   = "administrator/C_APengguna/tambah";
$route["administrator/pengguna/(:any)"]   = "administrator/C_APengguna/lihat/$1";
$route["administrator/profil"]       = "administrator/C_AProfil/index";
$route["administrator/artikel"]          = "administrator/C_AArtikel/index";
$route["administrator/artikel/tambah"]   = "administrator/C_AArtikel/tambah";
$route["administrator/artikel/(:num)"]   = "administrator/C_AArtikel/perbarui/$1";
$route["administrator/galeri"]       = "administrator/C_AGaleri/index";
$route["administrator/pengaturan"]   = "administrator/C_APengaturan/index";