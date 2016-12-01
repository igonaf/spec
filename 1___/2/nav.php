<?php
$leftMenu = array(
	array( 'link' => 'Главная', 'href' => 'index.php' ),
	array( 'link' => 'O нас', 'href' => 'index.php?id=about' ),
	array( 'link' => 'Таблица', 'href' => 'index.php?id=table' ),
	array( 'link' => 'Калькулятор', 'href' => 'index.php?id=calc' ),
	);
?>

<div style="display: inline-block" class="nav">
	<?php foreach ($leftMenu as $item): ?>
		<a href="<?=$item['href']?>"><?=$item['link']?></a><br>
	<?php endforeach; ?>
</div>