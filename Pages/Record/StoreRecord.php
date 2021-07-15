<?php

use App\wpConnect\wpConnect;

$data = json_encode($_POST);
$getRecords = new wpConnect(
    'POST',
    '/v1/user/' . $_SESSION['user'] . '/zone/' . $_SESSION['domain'] . '/record',
    $_SESSION['apiKey'],
    $_SESSION['secret'],$data);

$getRecords->connect();
header('Location: ' . $_SERVER['HTTP_REFERER']);