<?php
$output = '';
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	//TODO: ВСЕ ли поля пришли
	$n1 = abs( (int)$_POST['num1'] );
	$n2 = abs( (int)$_POST['num2'] );
	$op = cleanStr($_POST['operator']);
	$output = "$n1 $op $n2 = ";
	switch ($op) {
		case '+':	$output .= $n1 + $n2; break;
		
		case '-':	$output .= $n1 - $n2; break;

		case '*':	$output .= $n1 * $n2;
			break;

		case '/':
			if ($n2 === 0)
				$output = "forbidden $n2";
			else $output .= $n1 / $n2;
			break;

		default:
			$output = "unknown operator '$op'";
			break;
	}
}

if ($output) {
	echo "<h3>Results: $output</h3>";
}
?>
<div style="display: inline-block">
 <form action='' method='post'>
 	<label>Number 1</label><br />
 		<input type="text" name="num1" value="<?=$n1?>"><br />
 	<label>Operator</label><br />
 		<input type="text" name="operator" value="<?=$op?>"><br />
 	<label>Number 2</label><br />
 		<input type="text" name="num2" value="<?=$n2?>"><br />
 	<input type="submit" value="go">
 </form>
</div>