<?php

function get_booked($row2) {
    if ($row2['lata_id'] == 0) {
        $days = 1;
    } else {
        $days = 13;
    }
    $before = DateTime::createFromFormat('Ymd', $row2['dia']);
    $after = DateTime::createFromFormat('Ymd', $row2['dia']);
    $interval = new DateInterval("P$days" . 'D');
    $before->sub($interval);
    $after->add($interval);
    return ['from' => $before->format('Y-m-d'),
        'after' => $after->format('Y-m-d')];
}
