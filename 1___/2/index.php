<?php
include ('conf.php');

include ('header.php'); 
?>

<div class="wrap">
<?php 
include ('nav.php');

	if (isset($_GET['id'])){
	$id = trim(strip_tags( $_GET['id']) );
		if ($id) {
			switch ($id) {
				case 'table':
					include 'table.php';
					break;
				
				case 'calc':
					include 'calc.php';
					break;

				case 'about':
					include 'about.php';
					break;
			}
		}
	}
?>
</div>

<?php 
include ('footer.php');
?>