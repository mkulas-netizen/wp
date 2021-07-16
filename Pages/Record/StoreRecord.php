<?php

use App\wpConnect\wpConnect;

/**
 * Create record
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$getRecords = new wpConnect(
    'POST',
    '/v1/user/' . $_SESSION['user'] . '/zone/' . $_SESSION['domain'] . '/record',
    $_SESSION['apiKey'],
    $_SESSION['secret'],$_POST);

$getRecords->connect(true);

print_r($getRecords);


//header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo '<h2 class="text-center text-danger">Request POST !!! </h2>';
}