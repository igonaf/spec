<form method="post" action="">
	<input type="text" name="name">
	<input type="number" name="age">
	<input type="submit">
</form>

<?php
if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	$name = trim(strip_tags($_POST['name']));
	$age = abs((int)$_POST['age']);

	echo 'Your name is: ' . $name . '<br />';
	echo 'Your age is: ' . $age;
}
?>