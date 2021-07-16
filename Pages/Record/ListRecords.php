<?php

use App\wpConnect\wpConnect;

/**
 * All records
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $getRecords = new wpConnect(
        'GET',
        '/v1/user/' . $_SESSION['user'] . '/zone/' . $_SESSION['domain'] . '/record',
        $_SESSION['apiKey'],
        $_SESSION['secret']);

    $recordsData = $getRecords->connect();
} else {
    echo '<h2 class="text-center text-danger">Request GET !!! </h2>';
}
?>
<h3 class="text-center mt-5">Select or create records for <?= $_SESSION['domain']; ?></h3>
<form method="get" action="record">
    <table class="table table-sm table-dark">
        <thead>
        <tr>
            <th></th>
            <th>Id</th>
            <th>Type</th>
            <th>Name</th>
            <th>Content</th>
            <th>TTL</th>
            <th>Prio</th>
            <th>Weight</th>
            <th>Port</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($recordsData->items as $record): ?>
            <tr>
                <th><input class="form-check-input mt-0" type="checkbox" value="<?= $record->id; ?>" name="recordId"
                           aria-label="Checkbox for following text input"></th>
                <td><?= $record->id; ?></td>
                <td><?= $record->type; ?></td>
                <td><?= $record->name; ?></td>
                <td><span title="<?= $record->content; ?>"> <?= substr($record->content, 0, 50) . '...'; ?></span></td>
                <td><?= $record->ttl; ?></td>
                <td><?= $record->prio; ?></td>
                <td><?= $record->weight; ?></td>
                <td><?= $record->port; ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <input type="hidden" name="user" value="<?= $_SESSION['user']; ?>">
    <input type="hidden" name="domain" value="<?= $_SESSION['domain']; ?>">
    <input type="submit" class="btn btn-success" value="Get zone">
</form>

<h3 class="text-center mt-5">Create record </h3>
<form method="POST" action="record" class="mb-5">
    <?php include 'Templates/FormRecord.php'; ?>
    <input type="submit" class="btn btn-success" value="Create">

</form>
