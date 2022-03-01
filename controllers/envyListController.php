<?php
$envylists = new envylists();
$envylists->id_users = $_SESSION['user']->id;
$envylist=$envylists->getenvyListUser();
if (isset($_POST['deleteFromEnvylist'])) {
    $envylists->id_offers = $_POST['deleteFromEnvylist'];
    if($envylists->deleteEnvy()){
        header('Location: Liste-d-envie');
        exit;
    }  
}