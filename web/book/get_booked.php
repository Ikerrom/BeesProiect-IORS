<?php
        /*  devuelve un intervalo de tiempo en el cual comprueba si la lata esta reservada*/
function get_booked($arr) {
    if ($arr->lataid === null) {
        $days = 0;
    } else {
        $days = 13;
    }
    $before = DateTime::createFromFormat('Y-m-d', $arr->date);
    $after = DateTime::createFromFormat('Y-m-d', $arr->date);
    $interval = new DateInterval("P$days" . 'D');
    $before->sub($interval);
    $after->add($interval);
    return ['from' => $before->format('Y-m-d'),
        'until' => $after->format('Y-m-d')];
}
