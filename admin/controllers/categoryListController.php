<?php
$category = new category();
$categoriesBrandsLink = new categoriesBrandsLink();
$brands = new brands();
if (!empty($_POST['deleteCategory'])) {
    /**
     * $_POST['deleteCategory'] permet de récupérer l'id de la catégorie que l'on supprime
     * $categoriesBrandsLink->getIDBrand() est le modèle pour récupérer l'id de franchise à partir de l'id de catégorie
     * foreach($categoriesLinkList as $categoriesLinkBrand){
     * $brands->id = $categoriesLinkBrand->bID; permet à la methode $brands->deleteBrand() de récupérer son id pour supprimer la franchise
     * $categoriesBrandsLink->deleteCategoryLink(); méthode permettant de supprimer le lien entre catégorie et franchise dans la table complexe
     * $brands->deleteBrand(); méthode permettant de supprimer les franchises associé à la catégorie
     * } 
     *$category->id = $_POST['deleteCategory']; récupére l'id de catégorie pour le supprimer
     *$category->deleteCategory(); supprime la catégorie en fonction de l'id au dessus
     */
    $categoriesBrandsLink->id_categories = $_POST['deleteCategory'];
    $categoriesLinkList=$categoriesBrandsLink->getIDBrand();
    foreach($categoriesLinkList as $categoriesLinkBrand){
        $brands->id = $categoriesLinkBrand->bID;
        $categoriesBrandsLink->deleteCategoryLink();
        $brands->deleteBrand();
    }
    $category->id = $_POST['deleteCategory'];
    $category->deleteCategory();
}
$categoryList = $category->getCategory();
