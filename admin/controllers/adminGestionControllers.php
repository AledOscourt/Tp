<?php
$user = new users;
if (count($_POST) > 0) {

    if (!empty($_POST['deleteUser'])) {
        $user->id = $_POST['deleteUser'];
        $user->deleteUser();
    }
}

$usersList = $user->getUsersList();

