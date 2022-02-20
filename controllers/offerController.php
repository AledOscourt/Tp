<?php
$formErrors = [];
$offer = new offers();
$pops = new pops();
$images = new images();
/**
 * la fonction count sert à compter le nombre d'élément dans un tableaux
 * ici elle à savoir si le formulaire à été envoyer
 */

if (count($_POST) > 0) {

    if (!empty($_POST['popName'])) {
        if (preg_match($regex['popName'], $_POST['popName'])) {
            $popName = strip_tags($_POST['popName']);
        } else {
            $formErrors['popName'] = 'Veuillez vérifier le nom de la figurine pop. Votre nom de la figurine pop ne doit pas contenir de caractères spéciaux sauf accents.';
        }
    } else {
        $formErrors['popName'] = 'Veuillez saisir le nom de la figurine pop.';
    }

    if (!empty($_POST['tags'])) {
        if (preg_match($regex['number'], $_POST['tags'])) {
            $tags = strip_tags($_POST['tags']);
        } else {
            $formErrors['tags'] = 'Veuillez vérifier le nombre en haut à droite de la figurine pop.';
        }
    } else {
        $formErrors['tags'] = 'Veuillez saisir le nombre en haut à droite de la figurine pop.';
    }

    if (!empty($_POST['price'])) {
        if (preg_match($regex['number'], $_POST['price'])) {
            $offer->price = strip_tags($_POST['price']);
        } else {
            $formErrors['price'] = 'Veuillez vérifier le nombre en haut à droite de la figurine pop.';
        }
    } else {
        $formErrors['price'] = 'Veuillez saisir le nombre en haut à droite de la figurine pop.';
    }
    if (!empty($_POST['statusDescription'])) {
        if (preg_match($regex['content'], $_POST['statusDescription'])) {
            $price = strip_tags($_POST['statusDescription']);
        } else {
            $formErrors['statusDescription'] = 'Veuillez vérifier le nombre en haut à droite de la figurine pop.';
        }
    } else {
        $formErrors['statusDescription'] = 'Veuillez saisir le nombre en haut à droite de la figurine pop.';
    }



    if (!empty($_POST['statusTitle'])) {
        if (preg_match($regex['contentTitle'], $_POST['statusTitle'])) {
            $price = strip_tags($_POST['statusTitle']);
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
                $images->image = 'uploads/' . $_FILES['imagePopInHerBox']['name'];
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
                $images->image = 'uploads/' . $_FILES['imagePop']['name'];
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
                $images->image = 'uploads/' . $_FILES['imageBox']['name'];
            } else {
                $formErrors['imageBox'] = 'Veuillez reessayer plus tard.';
            }
        } else {
            $formErrors['imageBox'] = 'Veuillez selectionner une image.';
        }
    }
    $offer->id_exclusivities = $_POST['exclusivities'];
    
    if (count($formErrors) == 0) {
        try {
            $transaction->beginTransaction();
            $transaction->lastInsertId();
            $transaction->commit();
            header('Location: admin_liste_franchise');
            exit;
        } catch (Exception $e) {
            $transaction->rollBack();
        }
    }
}
