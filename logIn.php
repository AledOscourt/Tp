<?php
session_start();
require_once 'config.php';
require_once 'models/database.php';
require_once 'models/usersModel.php';
require_once 'controllers/logInController.php';
require_once 'include/header.php'; ?>

<form action="Connexion" method="POST" class="container my-5 d-grid gap-2 logIn">

    <div class="row">
        <h3 class="text-center fs-1 text-white">Connexion</h3>
    </div>
    <div class="row">
        <small class="text-center my-2 "><a class="text-white" href="Inscription"> Vous ne possédez pas de compte ?</a></small>
    </div>
    <div class="row">
        <div class="container d-grid gap-3">
            <fieldset class="row">
                <div class="col-md-5 col-10 border border-bottom border-light mx-auto form-floating">
                    <input class="form-control <?= isset($formErrors['email']) ? 'is-invalid' : '' ?>" value="<?= !isset($formErrors['email']) && !empty($_POST['email']) ? $_POST['email'] : '' ?>" type="email" name="email" id="email" autocomplete="on" placeholder="AledOscourt">
                    <label class="ms-3 text-white" for="email"><i class="far fa-envelope"></i><span class="ms-1">Adresse Email</span></label>
                    <?php if (isset($formErrors['email'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['email'] ?> </p>
                    <?php } ?>
                </div>
            </fieldset>
            <fieldset class="row">
                <div class="col-md-5 col-10 mx-auto form-floating">
                    <input class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : '' ?>" type="password" name="password" id="password" autocomplete="on" placeholder="AledOscourt">
                    <label class="ms-3 text-white" for="password"><i class="fas fa-lock"></i><span class="ms-1">Mot de passe</span></label>
                    <?php if (isset($formErrors['password'])) { ?>
                        <p class="invalid-feedback text-center"> <?= $formErrors['password'] ?> </p>
                    <?php } ?>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <small class="text-center my-2"><a class="text-white" href="#"> Mot de passe oublié ?</a></small>
    </div>
    <div class="row mx-lg-5 mx-2 justify-content-around ">
        <a type="button" class="btn btn-outline-secondary col-lg-3 col-5" href="index.php">Annuler</a>
        <button type="submit" class="btn btn-outline-primary col-lg-3 col-5">Connexion</button>
    </div>

</form>

<?php require_once('include/footer.php'); ?>