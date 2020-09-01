<?php
//define('DB_PATH', $_SERVER['DOCUMENT_ROOT'].'/data/scores.sqlite');

define('DB_HOST', 'localhost');
define('DB_NAME', 'score');
define('DB_USER', 'root');
define('DB_PASS', 'root');

define('TODAY',
    \Carbon\Carbon::now('Europe/Brussels')
        ->locale('fr_BE')
        ->isoFormat('dddd DD MMMM YYYY'));
define('THUMBS', './assets/images/thumbs/');
define('LOGO', './assets/images/full/');
//? 

$data = [];
//! 
$view = 'vue.php';
//! 
