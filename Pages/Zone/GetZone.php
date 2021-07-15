<?php

use App\wpConnect\wpConnect;
use App\Sessions\Sessions;

$session = new Sessions();
$session->createSession('domain',$_GET['domain']);

$getZone = new wpConnect(
    'GET',
    '/v1/user/' . $_SESSION['user'] . '/zone/' . $_SESSION['domain'],
    $_SESSION['apiKey'],
    $_SESSION['secret']);

$zoneData = $getZone->connect();

?>
<h4 class="text-center mt-5">Select your Zone</h4>
<form method="get" action="records">
    <table class="table table-sm table-dark">
        <thead>
        <tr>
            <th></th>
            <th>id</th>
            <th>Name</th>
            <th>Update time</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input class="form-check-input mt-0" type="checkbox" value="<?= $zoneData->name ?>" name="domain"
                       aria-label="Checkbox for following text input"></td>
            <td><?= $zoneData->id; ?></td>
            <td><?= $zoneData->name; ?></td>
            <td><?= $zoneData->updateTime; ?></td>
        </tr>
        </tbody>
    </table>
    <input type="hidden" name="user" value="<?= $_GET['user']; ?>">
    <input type="submit" class="btn btn-success" value="Submit">
</form>