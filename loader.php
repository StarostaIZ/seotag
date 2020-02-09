<?php

//require_once 'Model/PromoTopBar.php';
//require_once 'Model/SeoTag.php';
//require_once 'DatabaseConnSingleton.php';
//require_once 'PromoNotExistException.php';
//require_once 'PromoTopBarSingleton.php';
//require_once 'SeoTagNotExistException.php';
//require_once 'env.php';
session_start();
function loadModel($class) {
	$path = __DIR__.'/Model/';
	$file = $path.$class.'.php';
	if(file_exists($file)) {
		require_once $file;
	}

}
function loadException($class) {
	$path = __DIR__.'/Exception/';
	$file = $path.$class.'.php';
	if(file_exists($file)) {
		require_once $file;
	}
}
function loadSingleton($class) {
	$path = __DIR__.'/Singleton/';
	$file = $path.$class.'.php';
	if(file_exists($file)) {
		require_once $file;
	}
}
spl_autoload_register('loadModel');
spl_autoload_register('loadException');
spl_autoload_register('loadSingleton');
require_once 'env.php';

