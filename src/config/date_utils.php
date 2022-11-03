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

function sumIntervals($interval1, $interval2) { 
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->add($interval2);
    return (new DateTime('00:00:00'))->diff($date);
}

function subtractIntervals($interval1, $interval2) {
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->sub($interval2);
    return (new DateTime('00:00:00'))->diff($date);
}

function getDateFromInterval($interval) {
    return new DateTimeImmutable($interval->format('%H:%i:%s'));
}

function getDateFromString($str) {
    return DateTimeImmutable::createFromFormat('H:i:s', $str);
}