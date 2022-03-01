<?php
$offer = new offers();
// Récupérer le nombre d'enregistrements
$count = $offer->countOffersPages();

// Pagination
$page = (!empty($_GET['page']) ? $_GET['page'] : 1);

$offer->limit = 15;

$pageNumber = ceil($count / $offer->limit);
$offer->offset = ($page - 1) * $offer->limit;

if( $_GET['page']>$pageNumber){
    header('Location: page404.php');
    exit;
}

$offerList = $offer->getOfferList();
