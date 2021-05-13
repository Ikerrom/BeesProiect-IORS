<?php 
include("test.php");
$no_bisiesto = array(31,28,31,30,31,30,31,31,30,31,30,31);
$bisiesto = array(31,29,31,30,31,30,31,31,30,31,30,31);
$fecha_inicio = 2018;
header('Content-Type: application/json');
$arr = json_decode($_GET['x']);
$dia1 = firstdaymonth($arr -> year, $arr -> month);
$newclass = new stdClass();
$newclass -> diainicio = $dia1[0];

if ($dia1[1]) {
	$newclass -> dias = $bisiesto[$arr -> month];
}else{
	$newclass -> dias = $no_bisiesto[$arr -> month];
}

echo json_encode($newclass);
?>