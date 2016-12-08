<?php

function addItemToCatalog($title, $author, $pubyear, $price) {
	global $connect;
	$sql = "INSERT INTO catalog (title, author, pubyear, price) VALUES (?, ?, ?, ?)";
        
	if(!$stmt = mysqli_prepare($connect, $sql)) {
		return false;
	}
        mysqli_stmt_bind_param($stmt, "ssii", $title, $author, $pubyear, $price);
	mysqli_stmt_execute ($stmt);
	mysqli_stmt_close($stmt);
	return true;
}


function clearStr($data){
	global $connect;
    return mysqli_real_escape_string($connect, trim(strip_tags($data)));
}

function selectAllItems(){
    global $connect;
    
    $sql = "SELECT id, title, author, pubyear, price FROM catalog";
    if(!$result = mysqli_query($connect, $sql)){
        return false;
    }
    
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $items;
}

function saveBasket(){
    global $basket;
    $basket = base64_encode(serialize($basket));
    setcookie('basket', $basket, 0x7FFFFFFF);
}

function basketInit() {
    global $basket, $count;
    if(!isset($_COOKIE['basket'])) {
        $basket = array('orderid' => uniqid());
        saveBasket();
    } else {
        $basket = unserialize(base64_decode($_COOKIE['basket']));
        $count = count ($basket) - 1;
    }
}

function add2Basket($id){
    global $basket;
    $basket[$id] = 1;
    saveBasket();
}

/*function myBasket() {
    global $connect, $basket;
    $goods = array_keys($basket);
    array_shift($goods);
    $ids = implode(',' , $goods);
    $sql = "SELECT id, author, titole, pubyear, price FROM catalog WHERE id IN ($ids)";
    if (!$result = mysqli_query($connect, $sql)){
        return FALSE;
    }
}

function result2Array($data){
    global $basket;
    $arr = array();
    while ($row = mysqli_fetch_assoc($data)){
        $row['quantity'] = $basket[];
    }
}*/