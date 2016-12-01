<?php
$dt = date('Y-m-d', time());
$page = $_SERVER['REQUEST_URI'];
$ref = $_SERVER['HTTP_REFERER'];
$path = $dt . ' | ' . $page . ' | ' . $ref . "\n";

$log_path = 'log/' . PATH_LOG;

$log_file = fopen($log_path, 'a+');

if ( $log_file == false )
	die('Unable to create file');
$res = fputs($log_file, $path);