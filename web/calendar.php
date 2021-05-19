<?php
function firstdaymonth($year,$month){
$no_bisiesto = array(31,28,31,30,31,30,31,31,30,31,30,31); /* los dias de cada mes por año no bisiesto */
$bisiesto = array(31,29,31,30,31,30,31,31,30,31,30,31);	/* los dias de cada mes por año  bisiesto */
$fecha_inicio = 2018;
	$count = 0; 
	for ($i=$fecha_inicio; $i < $year; $i++) { 
		if (($i % 400 === 0) || (($i % 4 === 0) && !($i % 100 === 0))) {	/* comprueba si el año es bisiesto */
			$count = $count + 2;							/* si lo es  que sume 2 dias */
		}else{
			$count = $count + 1;					/* si no lo es que sume 1 dia  */
		}
	}


	if (($year % 400  === 0) || (($year % 4  === 0) && !($year % 100  === 0))) { /* comprueba si el año es bisiesto  */
		for ($i=0; $i < $month ; $i++) {
			$count = $count + $bisiesto[$i]; /* si es bisiesto cogemos los dias del mes del array bisiesto */
		}
		$bisiesto = true;
	}else{
		for ($i=0; $i < $month ; $i++) { 	/* si no es bisiesto cogemos los dias del mes del array no_bisiesto */
			$count =$count + $no_bisiesto[$i];
		}
		$bisiesto = false;
	}

	$count = $count % 7; /* para saber el dia de la semana */

	return array($count,$bisiesto);
}
?>