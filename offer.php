<?php
session_start();
require_once 'controllers/offerController.php';
require_once 'include/header.php'; ?>

<form action="Ajout_d-offre" method="POST" class="container my-5 d-grid gap-2 logIn" enctype="multipart/form-data">
    <div class="row">
        <h3 class="text-center fs-1 text-white mb-3">Ordre de vente</h3>
    </div>
    <div class="row d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-outline-secondary col-auto" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Il faut saisir au moins le nom <br /> de la pop ou son numéro">
            <i class="fas fa-info-circle"></i>
        </button>
        
    </div>
    <div class="row">
        <div class="container d-grid gap-4">
            
            <fieldset class="row d-flex gap-lg-0 gap-3">
            <div class="col-md-5 border  mx-auto form-floating">
                    <input class="form-control <?= isset($formErrors['popName']) ? 'is-invalid' : '' ?>" value="<?= !isset($formErrors['popName']) && !empty($_POST['popName']) ? $tags : '' ?>" type="text" name="popName" id="popName" placeholder=" ">
                    <label class="ms-3 text-white" for="popName">Nom de la Pop</label>
                    <?php if (isset($formErrors['popName'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['popName'] ?> </p>
                    <?php } ?>
                </div>
                <div class="col-md-5 border  mx-auto form-floating">
                    <input class="form-control <?= isset($formErrors['tags']) ? 'is-invalid' : '' ?>" value="<?= !isset($formErrors['tags']) && !empty($_POST['tags']) ? $tags : '' ?>" type="text" name="tags" maxlength="4" id="tags" placeholder=" ">
                    <label class="ms-3 text-white" for="tags">Numéro de la Pop</label>
                    <?php if (isset($formErrors['tags'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['tags'] ?> </p>
                    <?php } ?>
                </div>
                
            </fieldset>

            <fieldset class="row d-flex gap-lg-0 gap-3">

                <div class="col-md-5 border  mx-auto form-floating">
                    <input class="form-control <?= isset($formErrors['price']) ? 'is-invalid' : '' ?>" type="text" name="price" id="price" placeholder=" ">
                    <label class="ms-3 text-white" for="price">Prix</label>
                    <?php if (isset($formErrors['price'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['price'] ?> </p>
                    <?php } ?>
                </div>
                <div class="col-md-5 border  mx-auto form-floating">
                    <input class="form-control <?= isset($formErrors['statusTitle']) ? 'is-invalid' : '' ?>" type="text" name="statusTitle" id="statusTitle" placeholder=" ">
                    <label class="ms-3 text-white" for="statusTitle">Titre&nbsp;de&nbsp;la&nbsp;description</label>
                    <?php if (isset($formErrors['statusTitle'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['statusTitle'] ?> </p>
                    <?php } ?>

                </div>
            </fieldset>
            <fieldset class="row d-flex gap-lg-0 gap-3">
                <div class="col-md-11 border  mx-auto form-floating">
                    <textarea class="form-control <?= isset($formErrors['statusDescription']) ? 'is-invalid' : '' ?>" name="statusDescription" id="statusDescription" maxlength="370" placeholder=" "></textarea>
                    <label class="ms-3 text-white floatingTextarea" for="statusDescription">Description d'état</label>
                    <?php if (isset($formErrors['statusDescription'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['statusDescription'] ?> </p>
                    <?php } ?>
                </div>
            </fieldset>
            <fieldset class="row d-flex gap-lg-0 gap-3">
                <div class="col-md mx-auto form-floating">
                    <input class="form-control <?= isset($formErrors['imagePopInHerBox']) ? 'is-invalid' : '' ?>" type="file" name="imagePopInHerBox" id="imagePopInHerBox" accept="image/*">
                    <label class="ms-1 text-white pt-1 mt-1" for="imagePopInHerBox">Image de la pop dans la boîte</label>
                    <?php if (isset($formErrors['imagePopInHerBox'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['imagePopInHerBox'] ?> </p>
                    <?php } ?>
                </div>
                <div class="col-md mx-auto form-floating">
                    <input class="form-control <?= isset($formErrors['imagePop']) ? 'is-invalid' : '' ?>" type="file" name="imagePop" id="imagePop" accept="image/*">
                    <label class="ms-1 text-white pt-1 mt-1" for="imagePop">Image des défaults de la figurine Pop (optionel)</label>
                    <?php if (isset($formErrors['imagePop'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['imagePop'] ?> </p>
                    <?php } ?>

                </div>
                <div class="col-md mx-auto form-floating ">
                    <input class="form-control <?= isset($formErrors['imageBox']) ? 'is-invalid' : '' ?>" type="file" name="imageBox" id="imageBox" accept="image/*">
                    <label class="ms-1 text-white pt-1 mt-1" for="imageBox">Image des défaults de la boîte (optionel)</label>
                    <?php if (isset($formErrors['imageBox'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['imageBox'] ?> </p>
                    <?php } ?>
                </div>
            </fieldset>
            <fieldset class="row d-flex gap-lg-0 gap-3 justify-content-evenly mx-md-auto">
                <div class="col">
                    <input type="radio" class="btn-check" value="1" name="exclusivities" id="offerExclusivityNone" autocomplete="off" checked>
                    <label class="btn btn-outline-info" for="offerExclusivityNone">None</label>
                </div>
                <div class="col">
                    <input type="radio" class="btn-check" value="2" name="exclusivities" id="offerExclusivityRare" autocomplete="off">
                    <label class="btn btn-outline-info" for="offerExclusivityRare">Rare</label>
                </div>
                <div class="col">
                    <input type="radio" class="btn-check" value="3" name="exclusivities" id="offerExclusivityMini" autocomplete="off">
                    <label class="btn btn-outline-info" for="offerExclusivityMini">Mini</label>
                </div>
                <div class="col-md d-flex gap-3 text-center">
                    <div class="col">
                        <input type="radio" class="btn-check" value="4" name="exclusivities" id="offerExclusivityGeant" autocomplete="off">
                        <label class="btn btn-outline-info" for="offerExclusivityGeant">Géant</label>
                    </div>
                    <div class="col">
                        <input type="radio" class="btn-check" value="5" name="exclusivities" id="offerExclusivityPerfect" autocomplete="off">
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