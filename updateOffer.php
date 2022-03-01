<?php
session_start();
$pagesTitle = 'Création d\'offres';
require_once 'config.php';
require_once 'models/database.php';
require_once 'models/offersModel.php';
require_once 'models/statusModel.php';
require_once 'controllers/updateOfferController.php';
require_once 'include/header.php'; ?>

<form action="Modification-offres_<?= $_GET['id'];?>" method="POST" class="container my-5 d-grid gap-2 logIn" enctype="multipart/form-data">
    <div class="row">
        <h3 class="text-center fs-1 text-white mb-3 pagesTitles">Ordre de vente</h3>
    </div>
    <div class="row d-flex justify-content-end mb-4">
        <button type="button" class="btn btn-outline-secondary col-auto" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Il faut saisir au moins le nom <br /> de la pop ou son numéro">
            <i class="fas fa-info-circle"></i>
        </button>

    </div>
    <div class="row">
        <div class="container d-grid gap-4">

            <fieldset class="row d-flex gap-lg-0 gap-3">

                <div class="col-md-5 border  mx-auto form-floating">
                    <input class="form-control <?= isset($formErrors['price']) ? 'is-invalid' : '' ?>" value="<?= $offers->price ?>" type="text" name="price" id="price" placeholder=" ">
                    <label class="ms-3 text-white" for="price">Prix</label>
                    <?php if (isset($formErrors['price'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['price'] ?> </p>
                    <?php } ?>
                </div>
                <div class="col-md-5 border  mx-auto form-floating">
                    <input class="form-control <?= isset($formErrors['statusTitle']) ? 'is-invalid' : '' ?>" value="<?= $statusGet->name; ?>" type="text" name="statusTitle" id="statusTitle" placeholder=" ">
                    <label class="ms-3 text-white" for="statusTitle">Titre&nbsp;de&nbsp;la&nbsp;description</label>
                    <?php if (isset($formErrors['statusTitle'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['statusTitle'] ?> </p>
                    <?php } ?>

                </div>
            </fieldset>
            <fieldset class="row d-flex gap-lg-0 gap-3">
                <div class="col-md-11 border  mx-auto form-floating">
                    <textarea class="form-control <?= isset($formErrors['statusDescription']) ? 'is-invalid' : '' ?>" name="statusDescription" id="statusDescription" maxlength="370" placeholder=" "><?= $statusGet->description; ?></textarea>
                    <label class="ms-3 text-white floatingTextarea" for="statusDescription">Description d'état</label>
                    <?php if (isset($formErrors['statusDescription'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['statusDescription'] ?> </p>
                    <?php } ?>
                </div>
            </fieldset>
            <fieldset class="row d-flex gap-lg-0 gap-3 justify-content-evenly mx-md-auto">
                <div class="col">
                    <input type="radio" class="btn-check" value="1" name="exclusivities" id="offerExclusivityNone" autocomplete="off" <?=  $offers->id_exclusivities ==1 ? 'checked' : '' ?>>
                    <label class="btn btn-outline-info" for="offerExclusivityNone">None</label>
                </div>
                <div class="col">
                    <input type="radio" class="btn-check" value="2" name="exclusivities" id="offerExclusivityRare" autocomplete="off" <?=  $offers->id_exclusivities ==2 ? 'checked' : '' ?>>
                    <label class="btn btn-outline-info" for="offerExclusivityRare">Rare</label>
                </div>
                <div class="col">
                    <input type="radio" class="btn-check" value="3" name="exclusivities" id="offerExclusivityMini" autocomplete="off" <?=  $offers->id_exclusivities ==3 ? 'checked' : '' ?>>
                    <label class="btn btn-outline-info" for="offerExclusivityMini">Mini</label>
                </div>
                <div class="col-md d-flex gap-3 text-center">
                    <div class="col">
                        <input type="radio" class="btn-check" value="4" name="exclusivities" id="offerExclusivityGeant" autocomplete="off" <?=  $offers->id_exclusivities ==4 ? 'checked' : '' ?>>
                        <label class="btn btn-outline-info" for="offerExclusivityGeant">Géant</label>
                    </div>
                    <div class="col">
                        <input type="radio" class="btn-check" value="5" name="exclusivities" id="offerExclusivityPerfect" autocomplete="off" <?=  $offers->id_exclusivities ==5 ? 'checked' : '' ?>>
                        <label class="btn btn-outline-info" for="offerExclusivityPerfect">Parfait</label>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row mx-lg-5 mx-2 justify-content-around mt-5">
        <a type="button" class="btn btn-outline-secondary col-lg-3 col-5" href="Profil">Annuler</a>
        <button type="submit" class="btn btn-outline-primary col-lg-3 col-5">Confirmer</button>
    </div>

</form>

<?php require_once 'include/footer.php'; ?>