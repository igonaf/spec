<?php
/* Основные настройки */
define(DB_HOST, 'localhost');
define(DB_LOGIN, 'root');
define(DB_PASSWORD, 'nikita');
define(DB_NAME, 'gbook');

$connect = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
/* Основные настройки */

/* Сохранение записи в БД */
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$name = trim(strip_tags($_POST['name']));
	$email = trim(strip_tags($_POST['email']));
	$msg = trim(strip_tags($_POST['msg']));

	$res_ins = mysqli_query($connect, "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')");
}
/* Сохранение записи в БД */

/* Удаление записи из БД */

/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>
<?php
/* Вывод записей из БД */
$get_sql = "SELECT id, name, email, msg, UNIX_TIMESTAMP(datetime) as dt FROM msgs ORDER BY id DESC";
$get_res = mysqli_query($connect, $get_sql);

$res_row = mysqli_fetch_all($get_res, MYSQLI_NUM);
	var_dump($res_row);	
/*while ($res_row = mysqli_fetch_assoc($get_res)) {
	var_dump($res_row);	
}*/


/* Вывод записей из БД */
?>