<?php

require_once 'loader.php';
$db = DatabaseConnSingleton::getInstance();
$seoTag = new SeoTag();
foreach ($_POST as $key => $value){
	$value = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$seoTag->{$key} = $value;
}

$_SESSION['post'] = $db->addSeoTag($seoTag);
header('Location: ' . $_SERVER['HTTP_REFERER']);