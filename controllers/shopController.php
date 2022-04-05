<?php

if (!empty($_GET['page'])) {
    require_once '../models/database.php';
    require_once '../models/offersModel.php';
    $offer = new offers();
    
    
    $offer->limit = 12;


    $offer->offset =  ($_GET['page'] - 1) * $offer->limit;
    echo json_encode($offer->getOfferList());
    
}else{
    $offer = new offers();
// Récupérer le nombre d'enregistrements
$count = $offer->countOffersPages();

// Pagination
// récupére le nombre d'élément 

$page = 1;

$offer->limit = 12;

$pageNumber = ceil($count / $offer->limit);


$offer->offset = 0;
$offerList = $offer->getOfferList();

}



