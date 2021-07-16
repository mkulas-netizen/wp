<?php
use App\wpConnect\wpConnect;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $getRecords = new wpConnect(
        'DELETE',
        '/v1/user/' . $_SESSION['user'] . '/zone/' . $_SESSION['domain'] . '/record/' . $_POST['recordId'],
        $_SESSION['apiKey'],
        $_SESSION['secret']);

    if ($getRecords->connect()) {
        echo '<h2 class="text-conter">Record remove</h2>';
        echo '<a href="records">List all records</a>';
    }
} else {
    echo '<h2 class="text-center text-danger">Request POST !!! </h2>';
}
