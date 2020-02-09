<?php

require_once 'loader.php';
$db = DatabaseConnSingleton::getInstance();
$promo = new PromoTopBar();
foreach ($_POST as $key => $value){
	$value = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$promo->{$key} = $value;
}
$_SESSION['post'] = $db->addPromo($promo);
header('Location: ' . $_SERVER['HTTP_REFERER']);