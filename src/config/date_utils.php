<?php

function getDateAsDateTime($date) {
    return is_string($date) ? new Datetime($date) : $date;
}

function isWeekend($date) {
    $inputDate = getDateAsDateTime($date);
    return $inputDate->format('N') >= 6; // 6 , 7 is weekend.
}

function isBefore($date1, $date2) {
    $inputDate1 = getDateAsDateTime($date1);
    $inputDate2 = getDateAsDateTime($date2);
    return $inputDate1 <= $inputDate2;
    
}

function getNextDay($date) {
    $inputDate = getDateAsDateTime($date);
    return $inputDate->modify('+1 day');
}