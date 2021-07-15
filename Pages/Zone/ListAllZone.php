<?php

use App\wpConnect\wpConnect;
use App\Sessions\Sessions;

$session = new Sessions();
$session->createSession('user',$_GET['user']);

$listZones = new wpConnect(
        'GET',
        '/v1/user/'.$_SESSION['user'].'/zone',
        $_SESSION['apiKey'],
        $_SESSION['secret']);

$zonesData = $listZones->connect();
?>
<h4 class="text-center mt-5">Select  domain</h4>
<form method="get" action="getZone"  class="text-right ">
    <table class="table table-sm table-dark table-hover">
        <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($zonesData->items as $zone) : ?>
            <tr>
                <td><input class="form-check-input mt-0" type="checkbox" value="<?= $zone->name  ?>" name="domain"
                           aria-label="Checkbox for following text input"></td>
                <td><?= $zone->id; ?></td>
                <td><?= $zone->name; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <table class="table table-sm">
        <thead>
        <tr>
            <th>Page</th>
            <th>Pagesize</th>
            <th>Items</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?= $zonesData->pager->page; ?></td>
            <td><?= $zonesData->pager->pagesize; ?></td>
            <td><?= $zonesData->pager->items; ?></td>
        </tr>
        </tbody>
    </table>
    <input type="submit" class="btn btn-success" value="Get zone">
</form>























