<?php
use App\wpConnect\wpConnect;

$getRecords = new wpConnect(
    'DELETE',
    '/v1/user/' . $_SESSION['user'] . '/zone/' . $_SESSION['domain'] . '/record/'.$_POST['recordId'],
    $_SESSION['apiKey'],
    $_SESSION['secret']);

if ($getRecords->connect()){
    echo '<h2 class="text-conter">Record remove</h2>';
    echo '<a href="records">List all records</a>';
}

