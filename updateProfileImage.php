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
    <div class="container text-white p-3">
        <div class="row">
            <div class="container d-grid gap-4 p-md-2">
                <fieldset class="row">
                    <div class="col-md-9 col-11 border  mx-auto form-floating">
                        <input class="form-control <?= isset($formErrors['myAccountProfilImage']) ? 'is-invalid' : '' ?>" type="file" name="myAccountProfilImage" id="myAccountProfilImage" accept="image/*" />
                        <label for="myAccountProfilImage" class="form-label ms-1 text-white pt-1 mt-1">Image de profil</label>
                        <?php if (isset($formErrors['myAccountProfilImage'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['myAccountProfilImage'] ?> </p>
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