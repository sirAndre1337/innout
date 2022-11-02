<?php
session_start();
requirevalidSession();

$date = (new Datetime())->getTimestamp();
$today = strftime('%d de %B de %Y', $date);
loadTemplateView('day_records', ['today' => $today]);