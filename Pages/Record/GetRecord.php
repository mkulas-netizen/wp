<?php

use App\wpConnect\wpConnect;

/**
 * Get record ID
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $getRecords = new wpConnect(
        'GET',
        '/v1/user/' . $_SESSION['user'] . '/zone/' . $_GET['domain'] . '/record/' . $_GET['recordId'],
        $_SESSION['apiKey'],
        $_SESSION['secret']);

    $recordsData = $getRecords->connect();
} else {
    echo '<h2 class="text-center text-danger">Request GET !!! </h2>';
}

?>

<h3 class="text-center mt-5">Get all records</h3>
<form method="POST" action="recordsDelete">
    <table class="table table-sm table-dark">
        <thead>
        <tr>
            <th></th>
            <th>Id</th>
            <th>Name</th>
            <th>Type</th>
            <th>Content</th>
            <th>TTL</th>
            <th>note</th>
            <th>Zone name</th>
            <th>Zone service id</th>
            <th>Update time</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input class="form-check-input mt-0" type="checkbox" value="<?= $recordsData->id; ?>" name="recordId"
                       aria-label="Checkbox for following text input"></td>
            <td><?= $recordsData->id; ?></td>
            <td><?= $recordsData->name; ?></td>
            <td><?= $recordsData->type; ?></td>
            <td><?= $recordsData->content; ?></td>
            <td><?= $recordsData->ttl; ?></td>
            <td><?= $recordsData->note; ?></td>
            <?php foreach( $recordsData->zone as $zones ): ?>
               <td><?= $zones;?></td>
            <?php endforeach; ?>
        </tr>
        </tbody>
    </table>
    <input name="_method" type="hidden" value="delete" />
    <input type="hidden" name="user" value="<?= $_SESSION['user']; ?>">
    <input type="submit" class="btn btn-danger" value="Delete zone !!">
</form>

<h3 class="text-center mt-5">Update record </h3>
<form method="POST" action="recordUpdate" class="mb-5">

    <?php
    /**
     * Template form for Store and Destroy data .
     */
    include 'Templates/FormRecord.php';
    ?>
    <input type="hidden" name="recordId" value="<?= $recordsData->id; ?>">
    <input type="submit" class="btn btn-success" value="Update">
</form>




