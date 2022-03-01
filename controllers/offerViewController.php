<?php
$offer = new offers();
$images = new images();
$offer->id = $_GET['id'];
$offers = $offer->getOfferById();
$images->id_offers=$_GET['id'];
$imagesList=$images->getImagesByOffer();