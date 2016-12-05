<?php
header("Content-type: text/html;charset=utf-8");

define(DB_HOST, 'localhost');
define(DB_LOGIN, 'root');
define(DB_PASSWORD, '1q4w7e');
define(DB_NAME, 'eshop');
define(ORDERS_LOG, 'orders.log');
/*корзина покупателя*/
$basket = array();
/*кол-во товаров в корзине*/
$count = 0;

$connect = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());

basketInit();
