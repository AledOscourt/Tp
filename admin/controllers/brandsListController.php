<?php
$brands = new brands();
$categoriesBrandsLink = new categoriesBrandsLink();

if (!empty($_POST['deleteBrand'])) {
    $categoriesBrandsLink->id_brands = $_POST['deleteBrand'];
    $categoriesBrandsLink->deleteBrandLink();
    $brands->id = $_POST['deleteBrand'];
    $brands->deleteBrand();
}
$brandsList = $brands->getBrands();

