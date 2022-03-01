<?php
$formErrors = [];
$offer = new offers();
$status = new status();
$imagesArray = [];
/**
 * la fonction count sert à compter le nombre d'élément dans un tableaux
 * ici elle à savoir si le formulaire à été envoyer
 */
$offer->id = $_GET['id'];
$offers = $offer->getOfferByIdForUpdate();
$status->id = $offers->id_status;
$statusGet = $status->getStatusById();

if (count($_POST) > 0) {



    if (!empty($_POST['price'])) {
        if (preg_match($regex['price'], $_POST['price'])) {
            $offer->price = strip_tags($_POST['price']);
        } else {
            $formErrors['price'] = 'Veuillez vérifier le nombre en haut à droite de la figurine pop.';
        }
    } else {
        $formErrors['price'] = 'Veuillez saisir le nombre en haut à droite de la figurine pop.';
    }
    if (!empty($_POST['statusDescription'])) {
        if (preg_match($regex['content'], $_POST['statusDescription'])) {
            $status->description = strip_tags($_POST['statusDescription']);
        } else {
            $formErrors['statusDescription'] = 'Veuillez vérifier votre description.';
        }
    } else {
        $formErrors['statusDescription'] = 'Veuillez saisir une description.';
    }



    if (!empty($_POST['statusTitle'])) {
        if (preg_match($regex['contentTitle'], $_POST['statusTitle'])) {
            $status->name = strip_tags($_POST['statusTitle']);
        } else {
            $formErrors['statusTitle'] = 'Veuillez vérifier le nombre en haut à droite de la figurine pop.';
        }
    } else {
        $formErrors['statusTitle'] = 'Veuillez saisir le nombre en haut à droite de la figurine pop.';
    }

    $offer->id_exclusivities = $_POST['exclusivities'];

    if (count($formErrors) == 0) {
        $status->updateStatus();
        $offer->updateOffer();
        echo "<script type='text/javascript'>
        window.setTimeout(function() {
          Swal.fire({
            icon: 'success',
            title: 'Offre mis à jour avec succés',
            showConfirmButton: false,
            timer: 1800
          }) 
        }, 200);
        window.setTimeout(function() {
          window.location = 'Profil';
        }, 2200);
        </script>";
    }
}
