<?php
$formErrors = [];
$offer = new offers();
$images = new images();
$envylists = new envylists();
$opinion = new opinions();
$offer->id = $_GET['id'];
$offers = $offer->getOfferById();
$images->id_offers = $_GET['id'];
$imagesList = $images->getImagesByOffer();
$offer->nbrClick = ($offers->nbrClick + 1);
$offer->updateOfferNbrclick();
$envylists->id_offers = $_GET['id'];
$opinion->id_offers = $offer->id;
$opinions = $opinion->getOpinionByOffer();

if (isset($_POST['deleteOpinion'])) {
    if (!empty($_POST['deleteOpinion'])) {
        $opinion->id = $_POST['deleteOpinion'];
        $opinion->deleteOpinionById();
        $opinions = $opinion->getOpinionByOffer();
    }
}


if ($_SESSION) {
    $envylists->id_users = $_SESSION['user']->id;
    if (isset($_POST['toEnvylist'])) {
        if ($envylists->envyExist() == 0) {
            $envylists->addInEnvylist();
        } else {
            $envylists->deleteEnvy();
        }
    }
}

if (isset($_POST['opinionAddBtn'])) {
    if (!empty($_POST['content'])) {
        if (preg_match($regex['content'], $_POST['content'])) {
            $opinion->content = strip_tags($_POST['content']);
        } else {
            $formErrors['content'] = 'Veuillez vérifier le nombre en haut à droite de la figurine pop.';
        }
    } else {
        $formErrors['content'] = 'Veuillez saisir le nombre en haut à droite de la figurine pop.';
    }
    $opinion->id_users = $_SESSION['user']->id;
    $opinion->id_offers = $_GET['id'];
    if (count($formErrors) == 0) {
        if ($opinion->addOpinion()) {
            $opinions = $opinion->getOpinionByOffer();
        }
    }
}
