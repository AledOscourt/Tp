<?php
$formErrors = [];
$offer = new offers();
$pops = new pops();
$images = new images();
$status = new status();
$transaction = new transaction();
$imagesArray = [];
/**
 * la fonction count sert à compter le nombre d'élément dans un tableaux
 * ici elle à savoir si le formulaire à été envoyer
 */

if (count($_POST) > 0) {

    if (!empty($_POST['popName'])) {
        if (preg_match($regex['popName'], $_POST['popName'])) {
            $pops->name = strip_tags($_POST['popName']);
            $pop = $pops->getPopByNameORTags();
            $offer->id_pops = $pop->id;
        } else {
            $formErrors['popName'] = 'Veuillez vérifier le nom de la figurine pop. Votre nom de la figurine pop ne doit pas contenir de caractères spéciaux sauf accents.';
        }
    }

    if (!empty($_POST['tags'])) {
        if (preg_match($regex['tags'], $_POST['tags'])) {
            $pops->tags = strip_tags($_POST['tags']);
            $pop = $pops->getPopByNameORTags();
            $offer->id_pops = $pop->id;
        } else {
            $formErrors['tags'] = 'Veuillez vérifier le nombre en haut à droite de la figurine pop.';
        }
    } else {
        $formErrors['tags'] = 'Veuillez saisir le nombre en haut à droite de la figurine pop.';
    }

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
            $formErrors['statusDescription'] = 'Veuillez vérifier le nombre en haut à droite de la figurine pop.';
        }
    } else {
        $formErrors['statusDescription'] = 'Veuillez saisir le nombre en haut à droite de la figurine pop.';
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

    if ($_FILES['imagePopInHerBox']['error'] == 0) {
        $fileinfosimagePopInHerBox = pathinfo($_FILES['imagePopInHerBox']['name']);
        $photoExtensionimagePopInHerBox = strtolower($fileinfosimagePopInHerBox['extension']);
        $authorizedMimeTypes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
        ];
        if (array_key_exists($photoExtensionimagePopInHerBox, $authorizedMimeTypes) && mime_content_type($_FILES['imagePopInHerBox']['tmp_name']) == $authorizedMimeTypes[$photoExtensionimagePopInHerBox]) {
            if (move_uploaded_file($_FILES['imagePopInHerBox']['tmp_name'], 'uploads/' . $_FILES['imagePopInHerBox']['name'])) {
                chmod('uploads/' . $_FILES['imagePopInHerBox']['name'], 0644);
                $imagesArray[0] = 'uploads/' . $_FILES['imagePopInHerBox']['name'];
            } else {
                $formErrors['imagePopInHerBox'] = 'Veuillez reessayer plus tard.';
            }
        } else {
            $formErrors['imagePopInHerBox'] = 'Veuillez selectionner une image.';
        }
    } else {
        $formErrors['imagePopInHerBox'] = 'Veuillez selectionner un fichier.';
    }


    if ($_FILES['imagePop']['error'] === 0) {
        $fileinfosimagePop = pathinfo($_FILES['imagePop']['name']);
        $photoExtensionimagePop = strtolower($fileinfosimagePopInHerBox['extension']);
        $authorizedMimeTypes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
        ];
        if (array_key_exists($photoExtensionimagePop, $authorizedMimeTypes) && mime_content_type($_FILES['imagePop']['tmp_name']) == $authorizedMimeTypes[$photoExtensionimagePop]) {
            if (move_uploaded_file($_FILES['imagePop']['tmp_name'], 'uploads/' . $_FILES['imagePop']['name'])) {
                chmod('uploads/' . $_FILES['imagePop']['name'], 0644);
                $imagesArray[1] = 'uploads/' . $_FILES['imagePop']['name'];
            } else {
                $formErrors['imagePop'] = 'Veuillez reessayer plus tard.';
            }
        } else {
            $formErrors['imagePop'] = 'Veuillez selectionner une image.';
        }
    }

    if ($_FILES['imageBox']['error'] === 0) {
        $fileinfosimageBox = pathinfo($_FILES['imageBox']['name']);
        $photoExtensionimageBox = strtolower($fileinfosimagePopInHerBox['extension']);
        $authorizedMimeTypes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
        ];
        if (array_key_exists($photoExtensionimageBox, $authorizedMimeTypes) && mime_content_type($_FILES['imageBox']['tmp_name']) == $authorizedMimeTypes[$photoExtensionimageBox]) {
            if (move_uploaded_file($_FILES['imageBox']['tmp_name'], 'uploads/' . $_FILES['imageBox']['name'])) {
                chmod('uploads/' . $_FILES['imageBox']['name'], 0644);
                $imagesArray[2] = 'uploads/' . $_FILES['imageBox']['name'];
            } else {
                $formErrors['imageBox'] = 'Veuillez reessayer plus tard.';
            }
        } else {
            $formErrors['imageBox'] = 'Veuillez selectionner une image.';
        }
    }
    $offer->id_exclusivities = $_POST['exclusivities'];
    $offer->id_users = $_SESSION['user']->id;
    if (count($formErrors) == 0) {
        try {
            $transaction->beginTransaction();
            $status->addStatus();
            $offer->id_status = $transaction->lastInsertId();
            if ($offer->addOffer()) {
                $images->id_offers = $transaction->lastInsertId();
                foreach ($imagesArray as $i) {
                    $images->image = $i;
                    var_dump($images->addImage());
                }
            }
            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollBack();
        }
    }
}
var_dump($imagesArray);
