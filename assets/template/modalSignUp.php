<div class="modal fade" id="inscriptionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="inscriptionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark">
                    <div class="container">
                        <div class="row">
                            <h3 class="mt-2 text-center" id="staticBackdropLabel">Inscription</h3>
                        </div>
                        <div class="row">
                            <small class="text-center mt-2"><a class="text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#connexionModal" data-bs-dismiss="modal"> Vous possédez déjà un compte </a></small>
                        </div>
                    </div>
                    <div class="modal-body container">
                        <div class="row">
                            <form class="container d-grid gap-4" method="post" action="#">
                                <fieldset class="row d-flex gap-4 mx-md-auto">
                                    <div class="col-10 col-md-5 border border-bottom border-light mx-auto mx-md-3 form-floating">
                                        <input class="form-control" type="text" name="pseudo" id="pseudo" autocomplete="off" placeholder="AledOscourt">
                                        <label class="ms-3" for="pseudo">Pseudo</label>
                                    </div>
                                    <div class="col-10 col-md-5 border border-bottom border-light mx-auto mx-md-1 form-floating">
                                        <input class="form-control" type="text" name="name" id="name" autocomplete="off" placeholder="AledOscourt">
                                        <label class="ms-3" for="name">Nom</label>
                                    </div>
                                </fieldset>
                                <fieldset class="row">
                                    <div class="col-10 border border-bottom border-light mx-auto form-floating">
                                        <input class="form-control" type="email" name="email" id="email" autocomplete="off" placeholder="AledOscourt">
                                        <label class="ms-3" for="email">Adresse Email</label>
                                    </div>
                                </fieldset>
                                <fieldset class="row">
                                    <div class="col-md-8 col-9 mx-auto form-floating">
                                        <input class="form-control" type="password" name="password" id="password" autocomplete="off" placeholder="AledOscourt">
                                        <label class="ms-3" for="password">Nouveau mot de passe</label>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button " class="btn btn-outline-secondary ms-5 me-auto " data-bs-dismiss="modal">Annuler</button>
                        <button type="button " class="btn btn-outline-primary me-5 ">Inscription</button>
                    </div>
                </div>
            </div>
        </div>
