<?php include('assets/template/header.php'); ?>
<form action="#" method="POST" class="container my-5 d-grid gap-2 logIn">

    <div class="row">
        <h3 class="text-center fs-1 text-white">Connexion</h3>
    </div>
    <div class="row">
        <small class="text-center my-2 "><a class="text-decoration-none text-white" href="signUp.php" > Vous ne possédez pas de compte </a></small>
    </div>
    <div class="row">
        <div class="container d-grid gap-4">
            <fieldset class="row">
                <div class="col-md-5 col-11 border border-bottom border-light mx-auto form-floating">
                    <input class="form-control" type="email" name="email" id="email" autocomplete="off" placeholder="AledOscourt">
                    <label class="ms-3" for="email">Adresse Email</label>
                </div>
            </fieldset>
            <fieldset class="row">
                <div class="col-md-5 col-10 mx-auto form-floating">
                    <input class="form-control" type="password" name="password" id="password" autocomplete="on" placeholder="AledOscourt">
                    <label class="ms-3" for="password">Mot de passe</label>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <small class="text-center my-2"><a class="text-decoration-none text-white" href="#"> Mot de passe oublié </a></small>
    </div>
    <div class="row mx-5 justify-content-around ">
        <a type="button" class="btn btn-outline-secondary col-3" href="index.php">Annuler</a>
        <a type="button" href="logInHome.php" class="btn btn-outline-primary col-3">Connexion</a>
    </div>

</form>
<?php include('assets/template/footer.php'); ?>