<?php
session_start();
if($_SESSION['user']->id_roles != 1 & !$_SESSION){
    header('Location: Accueil');
exit;
}
$pagesTitle = 'Affichage de pop';
require_once '../models/database.php';
require_once '../models/popsModel.php';
require_once 'controllers/popProfileController.php';
require_once '../include/header.php';

?>


<div class="container my-5">
    <div class="row mb-3">
        <h2 class="text-center pagesTitles text-white">Liste&nbsp;de&nbsp;pop</h2>
    </div>
    <div class="row">
        <?php require_once '../include/adminSidebar.php'; ?>
    </div>
    <div class="row my-4">
        <div class="col-md-4 col-sm-6 d-grid gap-3">
            <div class="col">
                <img src="uploads/<?= $pops->officialPopImageInTheBox; ?>" class="w-75 d-md-flex d-none">
                <img src="uploads/<?= $pops->officialPopImageInTheBox; ?>" class="w-100 d-md-none">
            </div>
            <div class="col">
                <img src="uploads/<?= $pops->officialPopImageOutBox; ?>" class="w-75 d-md-flex d-none">
                <img src="uploads/<?= $pops->officialPopImageOutBox; ?>" class="w-100 d-md-none">
            </div>
        </div>
        <div class="col d-grid gap-2">
            <h2 class="text-center text-white fs-1"><?= $pops->name; ?></h2>
            <div class="d-grid mx-5 gap-5 text-white fs-4 ">
                <p>Tags : <?= $pops->tags; ?></p>
                <p>Reférence : <?= $pops->reference; ?></p>
                <p>Franchise : <?= $pops->bName; ?></p>
                <p>Catégorie : <?= $pops->cName; ?></p>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <a class="btn btn-outline-info mt-5 col-lg-4 col-md-6 col-sm-8 col-10" href="admin_liste_pops">Retour</a>
    </div>
</div>


<?php require_once '../include/footer.php'; ?>