<?php
$offers = new offers();

if (!empty($_POST['deleteOffer'])) {
    $offers->id = $_POST['deleteOffer'];
    $offers->deleteOfferById();
}
$offersList = $offers->getOfferListAdmin();
