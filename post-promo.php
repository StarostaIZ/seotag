<?php

require_once 'loader.php';
$db = DatabaseConnSingleton::getInstance();
$db->setAllDefaultFalse();
foreach ($_POST as $key => $value){
	$id = substr($key, -1);
	$columnName = substr($key, 0, strlen($key)-2);
	$value = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$db->updatePromo($id, $columnName, $value);
}
$_SESSION['post'] = true;
header('Location: ' . $_SERVER['HTTP_REFERER']);