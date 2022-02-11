<?php
$brands = new brands();
$categories = new category();
$categoriesBrandsLink = new categoriesBrandsLink();

$categoryList = $categories->getCategory();
$brand = $brands->getLastBrand();
$categoriesBrandsLink->id_brands = ($brand->bLastID) + 1;
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
        $brands->addBrands();
        
        $categoriesBrandsLink->addBrandsLink();
        header('Location: admin_ajout_franchise');
        exit;
    }
}
