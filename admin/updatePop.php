<?php
session_start();
require_once '../config.php';
require_once '../models/database.php';
require_once 'models/popsModel.php';
require_once 'models/brandsModel.php';
require_once 'controllers/updatePopController.php';
require_once '../include/header.php';
?>


<div class="container my-5 py-3 shadow-lg bg-dark">
    <div class="row mb-3">
        <h2 class="text-center pagesTitles text-white ">Modifier&nbsp;une&nbsp;pop</h2>
    </div>
    <div class="row">
        <?php require_once '../include/adminSidebar.php'; ?>
    </div>
    <form class="row my-3 gap-3" method="POST" action="admin_modification_pops_<?= $_GET['id']; ?>" enctype="multipart/form-data">
        <div class="d-md-flex gap-3 justify-content-around">
            <div class="col-md-5 form-floating">
                <input class="form-control <?= isset($formErrors['popName']) ? 'is-invalid' : '' ?>" value="<?= $pop->name ?>" type="text" name="popName" id="popName" placeholder=" ">
                <label class="ms-3 text-white" for="popName">Nom de la Pop</label>
                <?php if (isset($formErrors['popName'])) { ?>
                    <p class="invalid-feedback text-center"> <?= $formErrors['popName'] ?> </p>
                <?php } ?>
            </div>
            <div class="col-md-5 mt-md-0 mt-3 form-floating">
                <input class="form-control <?= isset($formErrors['tags']) ? 'is-invalid' : '' ?>" value="<?= $pop->tags ?>" type="text" name="tags" id="tags" placeholder=" ">
                <label class="ms-3 text-white" for="tags">Numéro de la pop</label>
                <?php if (isset($formErrors['tags'])) { ?>
                    <p class="invalid-feedback text-center"> <?= $formErrors['tags'] ?> </p>
                <?php } ?>
            </div>
        </div>
        <div class="d-md-flex gap-3 justify-content-around">

            <div class="col-md-11 form-floating">
                <input class="form-control <?= isset($formErrors['brandInput']) ? 'is-invalid' : '' ?>" value="<?= $pop->bName ?>" type="text" list="brandsList" name="brandInput" id="brandInput" placeholder=" ">
                <datalist id="brandsList">
                <?php foreach ($brandsList as $b) { ?>
                        <option value="<?= $b->bName; ?>">
                    <?php } ?>
                </datalist>
                <label class="ms-3 text-white" for="brandInput">Franchise</label>
                <?php if (isset($formErrors['brandInput'])) { ?>
                    <p class="invalid-feedback text-center"> <?= $formErrors['brandInput'] ?> </p>
                <?php } ?>
            </div>
        </div>
        <div class="d-md-flex">
            <div class="col-md-11  mx-auto form-floating">
                <input class="form-control <?= isset($formErrors['reference']) ? 'is-invalid' : '' ?>"value="<?= $pop->reference ?>" type="text" name="reference" id="reference" placeholder=" ">
                <label class="ms-3 text-white" for="reference">Référence</label>
                <?php if (isset($formErrors['reference'])) { ?>
                    <p class="invalid-feedback text-center"> <?= $formErrors['reference'] ?> </p>
                <?php } ?>
            </div>
        </div>
        <div class="d-md-flex gap-3 justify-content-around">
            <div class="col-md-5 form-floating">
                <input class="form-control <?= isset($formErrors['imagePopBox']) ? 'is-invalid' : '' ?>" type="file" name="imagePopBox" id="imagePopBox" accept="image/*">
                <label class="ms-1 text-white pt-1 mt-1" for="imagePopBox">Image de défaults de la figurine Pop + boîte</label>
                <?php if (isset($formErrors['imagePopBox'])) { ?>
                    <p class="invalid-feedback text-center"> <?= $formErrors['imagePopBox'] ?> </p>
                <?php } ?>
            </div>
            <div class="col-md-5 mt-md-0 mt-3 form-floating">
                <input class="form-control <?= isset($formErrors['imagePop']) ? 'is-invalid' : '' ?>" type="file" name="imagePop" id="imagePop" accept="image/*">
                <label class="ms-1 text-white pt-1 mt-1" for="imagePop">Image de défaults de la figurine Pop</label>
                <?php if (isset($formErrors['imagePop'])) { ?>
                    <p class="invalid-feedback text-center"> <?= $formErrors['imagePop'] ?> </p>
                <?php } ?>
            </div>
        </div>

        <div class="row mx-lg-5 mx-2 justify-content-around mt-5">
            <a type="button" class="btn btn-outline-secondary col-lg-3 col-5" href="admin_liste_pops">Annuler</a>
            <button type="submit" class="btn btn-outline-primary col-lg-3 col-5">Confirmer</button>
        </div>
    </form>

</div>
<?php require_once '../include/footer.php'; ?>