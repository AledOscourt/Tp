<?php
$user = new users;


$newUsersList = $user->getNewUsersList();

if($_SESSION['user']->id_roles != 1){
    header('Location: Accueil');
exit;
}