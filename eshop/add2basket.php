<?php
require "inc/lib.inc.php";
require "inc/config.inc.php";

if ($_SERVER['REQUEST_METHOD']=='GET') {
    $id = clearStr($_GET['id']);
    $count = 1;
    add2Basket($id);
    header("Location: catalog.php");
}
