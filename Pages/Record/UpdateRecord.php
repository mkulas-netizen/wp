<?php
use App\wpConnect\wpConnect;

$data = json_encode($_POST);
$getRecords = new wpConnect(
    'PUT',
    '/v1/user/' . $_SESSION['user'] . '/zone/' . $_SESSION['domain'] . '/record/' . $_POST['recordId'],
    $_SESSION['apiKey'],
    $_SESSION['secret'],$data);

$getRecords->connect();

header('Location: ' . $_SERVER['HTTP_REFERER']);