<?php
session_start();
requirevalidSession();

$date = (new Datetime())->getTimestamp();
$today = strftime('%d de %B de %Y', $date);

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-1'));

loadTemplateView('day_records', ['today' => $today , 'records' => $records]);