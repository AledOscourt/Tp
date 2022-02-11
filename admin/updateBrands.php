<?php
session_start();
require_once '../models/database.php';
require_once 'models/brandsModel.php';
require_once 'models/categoryModel.php';
require_once 'models/categorybrandslinkModel.php';
require_once 'controllers/updateBrandsController.php';
require_once '../include/header.php'; 
?>


<div class="container my-5 py-3 shadow-lg bg-dark">
    <div class="row mb-3">
        <h2 class="text-center pagesTitles text-white ">Modification&nbsp;d'une&nbsp;franchise</h2>
    </div>
    <div class="row">
        <?php require_once '../include/adminSidebar.php'; ?>
    </div>
    <form class="row my-3 gap-3" method="POST" action="admin_modification_franchise_<?= $brands->id; ?>" enctype="multipart/form-data">

        <div class="d-grid gap-3 align-items-center" id="brandsForm">

            <div class="col-md-8 form-floating mx-auto">
                <input class="form-control <?= isset($formErrors['brandInput']) ? 'is-invalid' : '' ?>" value="<?= $brand->name; ?>" type="text" name="brandInput" id="brandInput" placeholder=" ">
                <label class="ms-3 text-white" for="brandInput">Franchise</label>
                <?php if (isset($formErrors['brandInput'])) { ?>
                    <p class="invalid-feedback text-center"> <?= $formErrors['brandInput'] ?> </p>
                <?php } ?>
            </div>
            <div class="col-md-8 form-floating mx-auto">
                <select class="form-select" name="categoriesSelect"id="categoriesSelect">
                    <option selected disabled value="<?= $categoriesId->cID; ?>"><?= $categoriesId->cName; ?></option>
                    <?php foreach ($categoryList as $c) { ?>
                        <option value="<?= $c->cID; ?>"><?= $c->cName; ?></option>
                    <?php } ?>
                </select>
                <label class="ms-3 text-white" for="categoriesSelect">Catégorie</label>
            </div>
        </div>

        <div class="row mx-lg-5 mx-2 justify-content-around">
            <a type="button" class="btn btn-outline-secondary col-lg-3 col-5" href="admin_liste_franchise">Annuler</a>
            <button type="submit" class="btn btn-outline-primary col-lg-3 col-5">Confirmer</button>
        </div>
    </form>

</div>
<?php require_once '../include/footer.php'; ?>