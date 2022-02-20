<?php
session_start();
if($_SESSION['user']->id_roles != 1 & !$_SESSION){
    header('Location: Accueil');
exit;
}
$pagesTitle = 'Ajout de franchise';
require_once '../config.php';
require_once '../models/database.php';
require_once '../models/brandsModel.php';
require_once '../models/categoryModel.php';
require_once '../models/categorybrandslinkModel.php';
require_once '../models/transaction.php';
require_once 'controllers/addBrandsController.php';
require_once '../include/header.php';
?>

<div class="container my-5 py-3 shadow-lg bg-dark">
    <div class="row mb-3">
        <h2 class="text-center pagesTitles text-white ">Ajouter&nbsp;une&nbsp;franchise</h2>
    </div>
    <div class="row">
        <?php require_once '../include/adminSidebar.php'; ?>
    </div>
    <form class="row my-3 gap-3" method="POST" action="admin_ajout_franchise" enctype="multipart/form-data">

        <fieldset class="d-grid gap-3">

            <div class="col-md-7 form-floating mx-auto">
                <input class="form-control <?= isset($formErrors['brandInput']) ? 'is-invalid' : '' ?>" type="text" name="brandInput" id="brandInput" placeholder=" ">
                <label class="ms-3 text-white" for="brandInput">Franchise</label>
                <?php if (isset($formErrors['brandInput'])) { ?>
                    <p class="invalid-feedback text-center"> <?= $formErrors['brandInput'] ?> </p>
                <?php } ?>
            </div>
            <div class="col-md-7 form-floating mx-auto">
                <select class="form-select" name="categoriesSelect" id="categoriesSelect">
                    <?php foreach ($categoryList as $c) { ?>
                        <option value="<?= $c->cID; ?>"><?= $c->cName; ?></option>
                    <?php } ?>
                </select>
                <label class="ms-3 text-white" for="categoriesSelect">Categorie</label>
            </div>
           
        </fieldset>

        <div class="row mx-lg-5 mx-2 justify-content-around">
            <a type="button" class="btn btn-outline-secondary col-lg-3 col-5" href="admin_liste_franchise">Annuler</a>
            <button type="submit" class="btn btn-outline-primary col-lg-3 col-5">Confirmer</button>
        </div>
    </form>

</div>
<?php require_once '../include/footer.php'; ?>