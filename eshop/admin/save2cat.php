<?php
	// подключение библиотек
if (file_exists('secure/session.inc.php')){
    require 'secure/session.inc.php';
} else { echo 'eror '.'session.inc.php'; }

if (file_exists('../inc/config.inc.php')){
    require '../inc/config.inc.php';
} else { echo 'error'.'config.inc.php'; }

if (file_exists('../inc/lib.inc.php')){
    require '../inc/lib.inc.php';
} else { echo 'error'.'lib.inc.php'; }
	

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