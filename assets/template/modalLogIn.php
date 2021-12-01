<div class="modal fade" id="connexionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="connexionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark">
                    <div class="container">
                        <div class="row">
                            <h3 class="mt-2 text-center" id="staticBackdropLabel">Connexion</h3>
                        </div>
                        <div class="row">
                            <small class="text-center mt-2"><a class="text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#inscriptionModal" data-bs-dismiss="modal"> Vous ne possédez pas de compte </a></small>
                        </div>
                    </div>
                    <div class="modal-body container">
                        <div class="row">
                            <form class="container d-grid gap-4" method="post" action="#">
                                <fieldset class="row">
                                    <div class="col-md-9 col-11 border border-bottom border-light mx-auto form-floating">
                                        <input class="form-control" type="email" name="email" id="email" autocomplete="off" placeholder="AledOscourt">
                                        <label class="ms-3" for="email">Adresse Email</label>
                                    </div>
                                </fieldset>
                                <fieldset class="row">
                                    <div class="col-md-7 col-10 mx-auto form-floating">
                                        <input class="form-control" type="password" name="password" id="password" autocomplete="off" placeholder="AledOscourt">
                                        <label class="ms-3" for="password">Mot de passe</label>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="row">
                            <small class="text-center mt-2"><a class="text-decoration-none" href="#"> Mot de passe oublié </a></small>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-outline-secondary ms-md-5 ms-2 me-auto" data-bs-dismiss="modal">Annuler</button>
                        <a href="logInHome.php" class="btn btn-outline-primary me-md-5 me-2">Connexion</a>
                    </div>
                </div>
            </div>
        </div>