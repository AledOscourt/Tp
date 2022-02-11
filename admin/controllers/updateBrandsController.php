<?php
$brands = new brands();
$category = new category();
$categoriesBrandsLink = new categoriesBrandsLink();
$categoryList = $category->getCategory();
$formErrors = [];
/**
 * la fonction count sert à compter le nombre d'élément dans un tableaux
 * ici elle à savoir si le formulaire à été envoyer
 */
$brands->id = $_GET['id'];
$categoriesBrandsLink->id_brands = $_GET['id'];
$brand = $brands->getBrand();
$categoriesId=$categoriesBrandsLink->getCategoriesIdByBrandsId();
if (count($_POST) > 0) {
    if (!empty($_POST['brandInput'])) {
        $brands->name = strip_tags($_POST['brandInput']);
    }else {
        $formErrors['brandInput'] = Brand_ERROR_EMPTY;
    }

    if (!empty($_POST['categoriesSelect'])) {
        $categoriesBrandsLink->id_categories = $_POST['categoriesSelect'];
    }

    if (count($formErrors) == 0) {
        $brands->updateBrand();
        $categoriesBrandsLink->updateBrandLink();
        header('Location: admin_liste_franchise');
        exit;
    }     
}
