<?php

function get_booked($row2) {
    if ($row2->lataid == 0) {
        $days = 0;
    } else {
        $days = 13;
    }
    $before = DateTime::createFromFormat('Y-m-d', $row2->date);
    $after = DateTime::createFromFormat('Y-m-d', $row2->date);
    $interval = new DateInterval("P$days" . 'D');
    $before->sub($interval);
    $after->add($interval);
    return ['from' => $before->format('Y-m-d'),
        'until' => $after->format('Y-m-d')];
}
