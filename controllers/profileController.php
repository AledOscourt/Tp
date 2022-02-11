<?php
$user = new users;
$user->id = $_SESSION['user']->id;
$user = $user->getUser();