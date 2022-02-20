<?php
session_start();
require_once 'config.php';
require_once 'models/database.php';
require_once 'models/usersModel.php';
require_once 'controllers/updateUsersCotroller.php';
require_once 'include/header.php'; ?>

<form class="bg-dark m-md-5 my-5 py-3" method="post" action="Modification_profil" enctype="multipart/form-data">
    <div class="container my-2">
        <div class="row">
            <h3 class="text-center text-white">Modification</h3>
        </div>
    </div>
    <div class="container text-white">
        <div class="row">
            <div class="container d-grid gap-4">
                
                <fieldset class="row">
                    <div class="col-md-9 col-11 border border-bottom border-light mx-auto form-floating">
                        <input class="form-control <?= isset($formErrors['myAccountUsernameInput']) ? 'is-invalid' : '' ?>" value="<?= $user->userName; ?>" type="text" name="myAccountUsernameInput" id="myAccountUsernameInput" autocomplete="off" placeholder="#">
                        <label class="ms-3" for="myAccountUsernameInput">Nouveau Pseudo</label>
                        <?php if (isset($formErrors['myAccountUsernameInput'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['myAccountUsernameInput'] ?> </p>
                    <?php } ?>
                    </div>
                </fieldset>
                <fieldset class="row">
                    <div class="col-md-9 col-11 border border-bottom border-light mx-auto form-floating">
                        <input class="form-control <?= isset($formErrors['myAccountEmailInput']) ? 'is-invalid' : '' ?>" value="<?= $user->email; ?>" type="email" name="myAccountEmailInput" id="myAccountEmailInput" autocomplete="off" placeholder="#">
                        <label class="ms-3" for="myAccountEmailInput">Adresse de messagerie</label>
                        <?php if (isset($formErrors['myAccountEmailInput'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['myAccountEmailInput'] ?> </p>
                    <?php } ?>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="row mx-lg-5 mx-2 justify-content-around mt-5">
        <a type="button" class="btn btn-outline-secondary col-lg-3 col-5" href="Profil">Annuler</a>
        <button type="submit" class="btn btn-outline-primary col-lg-3 col-5">Confirmer</button>
    </div>
</form>


<!-- ********************************************************************************************************************************************
     *************************************************************************************************************************************************
     ********************************************************************************************************************************************* -->
<?php require_once 'include/footer.php'; ?>