<?php include('assets/template/header.php'); ?>
<form action="#" method="POST" class="container my-5 d-grid gap-2 logIn">

    <div class="row">
        <h3 class="text-center fs-1 text-white">Inscription</h3>
    </div>
    <div class="row">
        <small class="text-center my-2 "><a class="text-decoration-none text-white" href="logIn.php"> Vous possédez déjà un compte </a></small>
    </div>
    <div class="row">
        <div class="container d-grid gap-4">
            <fieldset class="row d-flex ">
                <div class="col-md-5 col-10 border border-bottom border-light mx-auto form-floating">
                    <input class="form-control" type="text" name="pseudo" id="pseudo" autocomplete="off" placeholder="AledOscourt">
                    <label class="ms-3" for="pseudo">Pseudo</label>
                </div>
            
                <div class="col-md-5 col-10 border border-bottom border-light mx-auto form-floating">
                    <input class="form-control" type="email" name="email" id="email" autocomplete="off" placeholder="AledOscourt">
                    <label class="ms-3" for="email">Adresse Email</label>
                </div>
            </fieldset>
            <fieldset class="row">
                <div class="col-md-5 col-9 mx-auto form-floating">
                    <input class="form-control" type="password" name="password" id="password" autocomplete="off" placeholder="AledOscourt">
                    <label class="ms-3" for="password">Nouveau mot de passe</label>
                </div>
            
                <div class="col-md-5 col-9 mx-auto form-floating">
                    <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" autocomplete="off" placeholder="AledOscourt">
                    <label class="ms-3" for="confirmPassword">Confirmer le mot de passe</label>
                </div>
            </fieldset>
        </div>
    </div>

    <div class="row mx-5 justify-content-around mt-5">
    <a type="button" class="btn btn-outline-secondary col-3" href="index.php">Annuler</a>
        <a type="button" href="logInHome.php" class="btn btn-outline-primary col-3">Confirmer</a>
    </div>

</form>
<?php include('assets/template/footer.php'); ?>