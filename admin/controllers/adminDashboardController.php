<?php
$user = new users;
$offers = new offers();

$offersList = $offers->getNewOfferListAdmin();
$newUsersList = $user->getNewUsersList();
