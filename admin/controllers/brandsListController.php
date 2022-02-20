<?php
$brands = new brands();
$categoriesBrandsLink = new categoriesBrandsLink();
$pops = new pops();

if (!empty($_POST['deleteBrand'])) {
    $categoriesBrandsLink->id_brands = $_POST['deleteBrand'];
    $categoriesBrandsLink->deleteBrandLink();
    $brands->id = $_POST['deleteBrand'];
    $brandList=$brands->getPopListbyBrand();
    foreach ($brandList as $b) {
        $pops->id_brands = $b->id_brands;
        $pops->deletePopsById_brands();
    }
    $brands->deleteBrand();
}
$brandsList = $brands->getBrands();


