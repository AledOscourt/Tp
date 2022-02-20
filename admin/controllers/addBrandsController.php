<?php

$brands = new brands();
$categories = new category();
$categoriesBrandsLink = new categoriesBrandsLink();
$transaction = new transaction();
$categoryList = $categories->getCategory();
$formErrors = [];

/**
 * la fonction count sert à compter le nombre d'élément dans un tableaux
 * ici elle à savoir si le formulaire à été envoyer
 */
if (count($_POST) > 0) {
    if (!empty($_POST['brandInput'])) {
        $brands->name = strip_tags($_POST['brandInput']);
    } else {
        $formErrors['brandInput'] = Brand_ERROR_EMPTY;
    }
    if (!empty($_POST['categoriesSelect'])) {
        $categoriesBrandsLink->id_categories = $_POST['categoriesSelect'];
    }

    if (count($formErrors) == 0) {
        try {
            $transaction->beginTransaction();
            $brands->addBrands();
            $categoriesBrandsLink->id_brands = $transaction->lastInsertId();
            $categoriesBrandsLink->addBrandsLink();
            $transaction->commit();
            header('Location: admin_liste_franchise');
            exit;
        } catch (Exception $e) {
            $transaction->rollBack();
        }
    }
}

