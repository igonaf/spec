<?php

function addItemToCatalog($title, $author, $pubyear, $price) {
	global $connect;
	$sql = "INSERT INTO catalog (title, author, pubyear, price) VALUES ($title, $author, $pubyear, $price)";

	if(!$stmt = mysqli_prepare($connect, $sql)) {
		return false;
	}

	mysqli_stmt_execute ($stmt);
	mysqli_stmt_close($stmt);
	return true;
}


function clearStr($data){
	global $connect;
    return mysqli_real_escape_string($connect, trim(strip_tags($data)));
}