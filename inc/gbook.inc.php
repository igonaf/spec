<?php
/* Основные настройки */
define(DB_HOST, 'localhost');
define(DB_LOGIN, 'root');
define(DB_PASSWORD, 'nikita');
define(DB_NAME, 'gbook');

$connect = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);

function clearStr($data){
    global $connect;
    return mysqli_real_escape_string($connect, trim(strip_tags($data)));
}

/* Основные настройки */

/* Сохранение записи в БД */
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$name = clearStr($_POST['name'], $connect);
	$email = clearStr($_POST['email']);
	$msg = clearStr($_POST['msg']);

	$res_ins = mysqli_query($connect, "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')") or mysqli_error($connect);
         
}
/* Сохранение записи в БД */

/* Удаление записи из БД */

if ($_SERVER['REQUEST_METHOD']=='GET'){
    $data_base = clearStr($_GET['id']);
    if ($data_base == DB_NAME) {
        $del = clearStr($_GET['del']);
        if ($del) {
            $del_query = mysqli_query($connect, "DELETE FROM msgs WHERE msgs.id=$del");
            if ($del_query) {
                echo "Запись №$del удалена";
            }
        }
    }
}

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
	//var_dump($res_row);	

        mysqli_close($connect);
        
/*while ($res_row = mysqli_fetch_assoc($get_res)) {
	var_dump($res_row);	
}*/


/* Вывод записей из БД */
?>

<p>всего записей в гостевой книге: <?php echo count($res_row); ?> </p>

<?php 
foreach ($res_row as $res) { ?>
    <p align="left"><a href="mailto:<?php echo $res[2];?>"><?php echo $res[1];?></a> в <?php echo date('Y-m-d h-m-s', $res[4]); ?> написал <?php echo $res[3]; ?></p><br>
    <p align="right">
        <a href="/index.php?id=<?php echo htmlspecialchars(strip_tags(DB_NAME));?>&del=<?php echo $res[0]; ?>">Delete</a>
    </p>
<?php }
?>

