<?php
$formErrors = [];
$pops = new pops();
$brands = new brands();

$brandsList = $brands->getBrandsList();
$brand = $brands->getBrandIdByName();
if (count($_POST) > 0) {

    if (!empty($_POST['popName'])) {
        $pops->name = strip_tags($_POST['popName']);
    } else {
        $formErrors['popName'] = 'Veuillez saisir un nom de Pop.';
    }
    if (!empty($_POST['tags'])) {
        if (preg_match($regex['tags'], $_POST['tags'])) {
            $pops->tags = strip_tags($_POST['tags']);            
        } else {
            $formErrors['tags'] = 'Veuillez saisir un tags de 3 ou 4 chiffres.';
        }
    } else {
        $formErrors['tags'] = 'Veuillez saisir un tags.';
    }
    if (!empty($_POST['brandInput'])) {
        $brands->name=$_POST['brandInput'];
        if ($brands->brandsExist() == 1) {  
            $brand = $brands->getBrandIdByName();
            $pops->id_brands=$brand->id;
        }else{
            $formErrors['brandInput'] = 'Veuillez saisir une franchise existante.';
        }
    } else {
        $formErrors['brandInput'] = 'Veuillez saisir une franchise.';
    }
    if (!empty($_POST['reference'])) {
        if (preg_match($regex['reference'], $_POST['reference'])) {
            $pops->reference = strip_tags($_POST['reference']);            
        } else {
            $formErrors['reference'] = 'Veuillez saisir la référence Funko de 5 chiffres.';
        }
    } else {
        $formErrors['reference'] = 'Veuillez saisir une référence.';
    }
    if ($_FILES['imagePopBox']['error'] == 0) {
        $fileinfos = pathinfo($_FILES['imagePopBox']['name']);
        $photoExtension = strtolower($fileinfos['extension']);
        $authorizedMimeTypes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
        ];
        if (array_key_exists($photoExtension, $authorizedMimeTypes) && mime_content_type($_FILES['imagePopBox']['tmp_name']) == $authorizedMimeTypes[$photoExtension]) {
            if (move_uploaded_file($_FILES['imagePopBox']['tmp_name'], '../uploads/' . $_FILES['imagePopBox']['name'])) {
                chmod('../uploads/' . $_FILES['imagePopBox']['name'], 0644);
                $pops->officialPopImageInTheBox =  $_FILES['imagePopBox']['name'];
            } else {
                $formErrors['imagePopBox'] = 'Veuillez reessayer plus tard.';
            }
        } else {
            $formErrors['imagePopBox'] = 'Veuillez selectionner une image.';
        }
    } else {
        $formErrors['imagePopBox'] = 'Veuillez insérer une image.';
    }

    if ($_FILES['imagePop']['error'] == 0) {
        $fileinfos = pathinfo($_FILES['imagePop']['name']);
        $photoExtension = strtolower($fileinfos['extension']);
        $authorizedMimeTypes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
        ];
        if (array_key_exists($photoExtension, $authorizedMimeTypes) && mime_content_type($_FILES['imagePop']['tmp_name']) == $authorizedMimeTypes[$photoExtension]) {
            if (move_uploaded_file($_FILES['imagePop']['tmp_name'], '../uploads/' . $_FILES['imagePop']['name'])) {
                chmod('../uploads/' . $_FILES['imagePop']['name'], 0644);
                $pops->officialPopImageOutBox = $_FILES['imagePop']['name'];
            } else {
                $formErrors['imagePop'] = 'Veuillez reessayer plus tard.';
            }
        } else {
            $formErrors['imagePop'] = 'Veuillez selectionner une image.';
        }
    } else {
        $formErrors['imagePop'] = 'Veuillez insérer une image.';
    }


    if (count($formErrors) == 0) {
        $pops->addPop();
        header('Location: admin_ajout_pops');
         exit;
    }
}
