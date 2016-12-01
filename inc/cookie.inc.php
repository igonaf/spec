<?php
(int)$visitCounter = 0;

if(isset($_COOKIE['visitCounter'])) {
	$visitCounter = $_COOKIE['visitCounter'];
}
$visitCounter++;

$lastVisit = '';

if(isset($_COOKIE['lastVisit'])) {
	$lastVisit = $_COOKIE['lastVisit'];
	$lastVisit = date('Y-m-d', $lastVisit);
}

$currentDate = time();
if ( date( 'd-m-Y', $_COOKIE['lastVisit'] ) != date('d-m-Y') ) {
	setcookie('visitCounter', $visitCounter, time()+3600);
	setcookie('lastVisit', $currentDate, time()+3600);
}