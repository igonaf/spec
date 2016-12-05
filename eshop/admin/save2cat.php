<?php
	// подключение библиотек
	require "secure/session.inc.php";
	require "../inc/config.inc.php";
	require "../inc/lib.inc.php";
	

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$title = clearStr($_POST['title']);
	$author = clearStr($_POST['author']);
	$pubyear = clearStr($_POST['pubyear']);
	$price = clearStr($_POST['price']);

	if(!addItemToCatalog($title, $author, $pubyear, $price)) {
		echo 'Error adding item';
	} else {
		header("Location: add2cat.php");
		exit;
	}
}
?>
111111111