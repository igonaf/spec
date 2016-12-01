<?php
$path_to_log ='log' . '/' . PATH_LOG; 

if (file_exists($path_to_log)) {
	$arr_content = file($path_to_log);

	foreach ($arr_content as $value) {
		list($dt, $page, $ref) = explode(' | ', $value);
		echo <<<LINE
		<li>
		$dt : $page --> $ref
		</li>
LINE;

		$i++;
	}
}