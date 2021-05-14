<?php
function firstdaymonth($year,$month){
$no_bisiesto = array(31,28,31,30,31,30,31,31,30,31,30,31);
$bisiesto = array(31,29,31,30,31,30,31,31,30,31,30,31);
$fecha_inicio = 2018;
	$count = 0;
	for ($i=$fecha_inicio; $i < $year; $i++) { 
		if (($i % 400 === 0) || (($i % 4 === 0) && !($i % 100 === 0))) {
			$count = $count + 2;
		}else{
			$count = $count + 1;
		}
	}


	if (($year % 400) || (($year % 4) && !($year % 100))) {
		for ($i=0; $i < $month ; $i++) {
			$count = $count + $bisiesto[$i];
		}
		$bisiesto = true;
	}else{
		for ($i=0; $i < $month ; $i++) {
			$count =$count + $no_bisiesto[$i];
		}
		$bisiesto = false;
	}

	$count = $count % 7;

	return array($count,$bisiesto);
}
?>