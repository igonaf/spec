<?php
function getCurrentTimeOfDay() {
	$today = getdate();
	if ($today) {
		if ($today['hours']>=0 and $today['hours']<6) {
			return ' night';
		}
		elseif ($today['hours']>=6 and $today['hours']<17) {
				return ' day';
		}
		else return ' evening';
		}
}

function cleanStr($data){
	return trim(strip_tags($data));
}

?>