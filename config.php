<?php

define('PROTOCOL', (!empty($_SERVER['HTTPS']) && $_SERVER['https'] = 'ON') ? 'https://' : 'http://');

define('DOMAIN', $_SERVER['HTTP_HOST']);

define('HOME_URL', PROTOCOL . DOMAIN . '/mvc');

//Database config
define( 'DB_DRIVER', 'mysql' );
define( 'DB_HOST', 'localhost' );
define( 'DB_USER', 'predavac' );
define( 'DB_PASS', '1234' );
define( 'DB_NAME', 'videoteka' );
define( 'DB_CHARSET', 'utf8' );
