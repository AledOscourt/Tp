<?php
session_start();
$pagesTitle = 'Inscription';
require_once 'config.php';
require_once 'models/database.php';
require_once 'models/usersModel.php';
require_once 'controllers/registerController.php';
require_once 'include/header.php'; ?>



    <form action="Inscription" method="POST" class="container my-5 d-grid gap-2 logIn">

        <div class="row">
            <h3 class="text-center fs-1 text-white pagesTitles">Inscription</h3>
        </div>
        <div class="row">
            <small class="text-center my-2 "><a class=" text-white" href="Connexion"> Vous possédez déjà un compte ?</a></small>
        </div>
        <div class="row">
            <div class="container d-grid gap-4">
                <fieldset class="row d-flex gap-lg-0 gap-3">
                    <div class="col-md-5 col-10 border border-bottom border-light mx-auto form-floating">
                        <input class="form-control <?= isset($formErrors['userName']) ? 'is-invalid' : '' ?>" value="<?= !isset($formErrors['userName']) && !empty($_POST['userName']) ? $_POST['userName'] : '' ?>" type="text" name="userName" id="userName" autocomplete="off" placeholder="AledOscourt">
                        <label class="ms-3 text-white" for="userName"><i class="fas fa-user-tag"></i> <span class="ms-1">Pseudo</span></label>
                        <?php if (isset($formErrors['userName'])) { ?>
                            <p class="invalid-feedback text-center"> <?= $formErrors['userName'] ?> </p>
                        <?php } ?>
                    </div>
                    <div class="col-md-5 col-10 border border-bottom border-light mx-auto form-floating">
                        <input class="form-control <?= isset($formErrors['email']) ? 'is-invalid' : '' ?>" value="<?= !isset($formErrors['email']) && !empty($_POST['email']) ? $_POST['email'] : '' ?>" type="email" name="email" id="email" autocomplete="on" placeholder="AledOscourt">
                        <label class="ms-3 text-white" for="email"><i class="far fa-envelope"></i><span class="ms-1">Adresse Email</span></label>
                        <?php if (isset($formErrors['email'])) { ?>
                            <p class="invalid-feedback text-center"> <?= $formErrors['email'] ?> </p>
                        <?php } ?>
                    </div>
                </fieldset>

                <fieldset class="row gap-lg-0 gap-3">
                    <div class="col-md-5 col-10 mx-auto form-floating">
                        <input class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : '' ?>" type="password" name="password" id="password" autocomplete="on" placeholder="AledOscourt">
                        <label class="ms-3 text-white" for="password"><i class="fas fa-lock"></i><span class="ms-1">Mot de passe</span></label>
                        <?php if (isset($formErrors['password'])) { ?>
                            <p class="invalid-feedback text-center"> <?= $formErrors['password'] ?> </p>
                        <?php } ?>
                    </div>

                    <div class="col-md-5 col-10 mx-auto form-floating">
                        <input class="form-control <?= isset($formErrors['confirmPassword']) ? 'is-invalid' : '' ?>" type="password" name="confirmPassword" id="confirmPassword" autocomplete="off" placeholder="AledOscourt">
                        <label class="ms-3 text-white" for="confirmPassword"><i class="fas fa-lock"></i><span class="ms-1">Confirmer le mot de passe</span></label>
                        <?php if (isset($formErrors['confirmPassword'])) { ?>
                            <p class="invalid-feedback text-center"> <?= $formErrors['confirmPassword'] ?> </p>
                        <?php } ?>
                    </div>
                </fieldset>
            </div>
        </div>

        <div class="row mx-lg-5 mx-2 justify-content-center mt-5">
            <button type="submit" class="btn btn-outline-secondary col-lg-3 col-5" name="addUsers">Inscription</button>
        </div>

    </form>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php require_once('include/footer.php'); ?>