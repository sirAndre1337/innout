<?php
session_start();
requireValidSession();

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

try {
    $currenTime = strftime('%H:%M:%S' , time());

    if($_POST['forcedTime']){
        $currenTime = $_POST['forcedTime'];
    }

    $records->innout($currenTime);
    addSuccessMsg('Ponto inserido com sucesso!');
} catch (AppException $e){
    addErrorMsg($e->getMessage());
}

header('Location: day_records.php');