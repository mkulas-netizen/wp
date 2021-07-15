<?php

use App\Sessions\Sessions;
use App\wpConnect\wpConnect;

$session = new Sessions();
$session->createSession('apiKey',$_POST['apiKey']);
$session->createSession('secret',$_POST['secret']);


$getUser = new wpConnect(
        'GET',
        '/v1/user',
        $_SESSION['apiKey'],
        $_SESSION['secret']
);

?>
    <h4 class="text-center mt-5">SELECT YOUR USER LOGIN</h4>
    <form method="GET" action="allZone">
        <table class="table table-small table-responsive table-dark">
            <thead>
                <tr>
                    <th colspan="7" class="text-center">Auth user data</th>
                </tr>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Login</th>
                    <th>ParentId</th>
                    <th>Active</th>
                    <th>Create Time</th>
                    <th>Group</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($getUser->connect()->items as $user) : ?>
                <tr>
                    <th><input class="form-check-input mt-0" type="checkbox" value="<?= $user->id; ?>" name="user"
                               aria-label="Checkbox for following text input"></th>
                    <td><?= $user->id; ?></td>
                    <td><?= $user->login; ?></td>
                    <td><?= $user->parentId; ?></td>
                    <td><?= $user->active; ?></td>
                    <td><?= $user->createTime; ?></td>
                    <td><?= $user->group; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
