<?php
session_start();
require_once 'models/database.php';
require_once 'models/usersModel.php';
require_once 'controllers/profileController.php';
require_once 'include/header.php';
?>
<!-- ********************************************************************************************************************************************* 
     ********************************************************************** Profil *********************************************************************** 
     ********************************************************************************************************************************************* -->
<div class="container mb-5">
    <div class="row d-md-none">
        <div class="col d-flex justify-content-end">
            <a class="btn btn-outline-primary mt-4" href="Modification_profil">
                <!-- data-bs-toggle="modal" data-bs-target="#myAccountPseudoAndImageModal"-->
                <i class="far fa-edit"></i>
            </a>
        </div>
    </div>
    <!-------------------------------------------------------------------- My Account Profil -------------------------------------------->
    <div class="row">
        <div class="col-md-4 col justify-content-center align-items-center text-center mt-4 my-md-4">
            <?php if (!is_null($user->profilePicture)) { ?> <img src="<?= $user->profilePicture; ?>" class="rounded-circle myAccountProfilPhoto img-fluid" id="myAccountImageProfil" alt="profilPhoto">
            <?php } else { ?>
                <i class="fas fa-user text-white logoImageProfil"></i>
            <?php } ?>
        </div>
        <div class="col-md-6 col-12 d-grid my-auto">
            <h3 class="text-center mt-5 text-white" id="myAccountPseudo"><?= $user->userName; ?></h3>
        </div>
        <div class="col-md-2 d-md-flex d-none justify-content-end">
            <a class="btn btn-outline-primary position-absolute mt-3" href="Modification_profil">
                <!-- data-bs-toggle="modal" data-bs-target="#myAccountPseudoAndImageModal"-->
                <i class="far fa-edit ms-1"></i>
            </a>
        </div>
    </div>
    <!-------------------------------------------------------------------- My Account Nav -------------------------------------------->
    <div class="row">
        <div class="container-fluid p-3 border border-1 border-primary">
            <div class="row py-3 mx-md-5 justify-content-between border-bottom border-1 border-light gap-3">
                <button class="btn btn-outline-secondary col-md-3 active" id="myAccountCoordinateBtn"> Coordonnée </button>
                <button class="btn btn-outline-secondary col-md-3" id="myAccountSellOrdersBtn"> Ordres de vente </button>
                <button class="btn btn-outline-secondary col-md-3" id="myAccountOpinionsBtn"> Avis donner </button>
            </div>
            <!-------------------------------------------------------------------- My Account Contact  -------------------------------------------->
            <div class="row my-5 justify-content-between" id="myAccountConctact">
                <div class="container d-grid gap-4">
                    <div class="row">
                        <h3 class="col-md-11 col-10 text-center text-white pagesTitles">Contact</h3>

                        <div class="container mx-md-5 gap-3">
                            <div class="row mt-2 mx-md-5">
                                <div class="col-md-3">
                                    <h4 class="text-info">Adresse de messagerie : </h4>
                                </div>
                                <div class="col-md-4 ">
                                    <p class="fs-5 text-white" id="myAccountEmail"><?= $user->email; ?></p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-------------------------------------------------------------------- My Account Orders  -------------------------------------------->
            <div class="row mt-5 justify-content-between d-none" id="myAccountOrders">
                <div class="container-fluid d-grid gap-4">
                    <div class="row">
                        <h3 class="col-md-11 col-10 text-center text-white pagesTitles">Ordres de vente</h3>
                        <div class="col-1 d-inline justify-content-center">
                            <a class="btn btn-outline-primary position-absolute" href="Ajout_d-offre" id="ordersBtn">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container-fluid">
                            <ul class="me-4" id="ordersList">
                                <li class="row mx-md-5 border border-1 border-secondary rounded py-3 myAccountOffers">
                                    <div class="col-md-6">
                                        <img src="assets/img/gokuUltraInstint-removebg-preview.png" alt="Goku Ultrra instinct" class="img-fluid w-100">
                                    </div>
                                    <div class="col-md-5 d-grid gap-1 mt-md-0 mt-2">
                                        <h4 class="text-white text-center">
                                            Goku Ultra Instinct
                                        </h4>
                                        <div class="ms-2 d-grid gap-2">
                                            <div class="d-flex fs-5">
                                                <p class="col-auto text-info">Numéro :</p>
                                                <p class="col-sm ms-2 text-white">386</p>
                                            </div>
                                            <div class="d-md-flex fs-5">
                                                <p class="col-auto text-info">Franchise :</p>
                                                <p class="col-sm ms-2 text-white">Dragon Ball</p>
                                            </div>
                                            <div class="d-md-flex fs-5">
                                                <p class="col-auto text-info">Catégorie :</p>
                                                <p class="col-sm ms-2 text-white">Anime</p>
                                            </div>
                                            <div class="d-md-flex fs-5">
                                                <p class="col-auto text-info">Pseudo&nbsp;du&nbsp;vendeur :</p>
                                                <p class="col ms-2 text-white"><?= $user->userName; ?></p>
                                            </div>
                                            <div class="d-flex fs-5">
                                                <p class="col-auto text-info">Référence :</p>
                                                <p class="col-sm ms-2 text-white">58194</p>
                                            </div>
                                            <div class="d-flex fs-5 text-white">
                                                <p class="col-auto text-info">Prix :</p>
                                                <p class="col-sm ms-2">20$</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col text-end">
                                        <a class="text-warning fs-5 me-2"><small>Modifier</small></a>
                                        <a class="text-danger fs-5"><small>Supprimer</small></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------------- My Account Opinions  -------------------------------------------->
            <div class="row mt-5 justify-content-between d-none" id="myAccountOpinions">
                <div class="container-fluid d-grid gap-4">
                    <div class="row">
                        <h3 class="col text-center text-white pagesTitles">Gestion&nbsp;des&nbsp;avis</h3>
                    </div>
                    <div class="row">
                        <div class="container-fluid">
                            <ul class="me-4" id="ordersList">
                                <li class="row mx-md-5 gap-2 border border-1 border-secondary rounded py-3 myAccountOffers d-grid">
                                    <div class="col text-end d-md-none">
                                        <a class="btn btn-outline-primary " href="Ajout_d-offre" id="ordersBtn">
                                            <i class="far fa-edit ms-1"></i>
                                        </a>
                                    </div>

                                    <div class="col d-flex align-items-center">
                                        <div class="col d-grid">
                                            <h4 class="col text-info text-md-start text-center ms-md-5 align-bottom">
                                                Pseudo de celui qui l'écrit
                                            </h4>
                                            <small class="col text-info text-md-start text-center ms-md-5 muted">
                                                Goku Ultra Instinct - 58194
                                            </small>
                                        </div>

                                        <div class="col-md-auto d-md-flex d-none text-end me-md-2 fs-5">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="col-md-auto d-md-flex d-none text-end">
                                            <a class="btn btn-outline-primary" href="Ajout_d-offre" id="ordersBtn">
                                                <i class="far fa-edit ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col text-center d-md-none d-flex justify-content-center ">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="col d-flex justify-content-center text-center my-1 text-white">
                                        <div class="col-lg-9 col-md-8 col">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis est lacus. Donec laoreet dolor id condimentum commodo. Vestibulum nec nulla mauris. Donec lorem felis, viverra at ex efficitur, egestas pulvinar ante. Maecenas vehicula arcu quis purus sollicitudin, sit amet sollicitudin orci rutrum. Morbi tincidunt laoreet erat. Aenean bibendum justo lorem, sit amet cursus orci rhoncus in. Nulla et ultrices ipsum. Curabitur luctus luctus arcu. Morbi nunc metus, eleifend eget magna vitae, tristique imperdiet dui.
                                        </div>
                                    </div>
                                    <div class="col text-end">
                                        <a class="text-danger fs-5"><small>Supprimer</small></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ********************************************************************************************************************************************
     *************************************************************************************************************************************************
     ********************************************************************************************************************************************* -->

<!-- ********************************************************************************************************************************************* 
     ********************************************************************** Modal *********************************************************************** 
     ********************************************************************************************************************************************* -->
<!-------------------------------------------------------------------- Modal email + photo -------------------------------------------->

<div class="modal fade" id="myAccountPseudoAndImageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myAccountContactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content bg-dark" method="post" action="Profil">
            <div class="container">
                <div class="row">
                    <h3 class="mt-2 text-center" id="staticBackdropLabel">Modification</h3>
                </div>
            </div>
            <div class="modal-body container">
                <div class="row">
                    <div class="container d-grid gap-4">
                        <fieldset class="row">
                            <div class=" border border-bottom border-light mx-auto">
                            </div>
                            <div class="col-md-9 col-11 border  mx-auto form-floating">
                                <input class="form-control" type="file" name="myAccountProfilImage" id="myAccountProfilImage" accept="image/*" />
                                <label for="myAccountProfilImage" class="form-label ms-1 text-white pt-1 mt-1">Image de profil</label>
                            </div>
                        </fieldset>
                        <fieldset class="row">
                            <div class="col-md-9 col-11 border border-bottom border-light mx-auto form-floating">
                                <input class="form-control" type="text" name="myAccountUsernameInput" id="myAccountUsernameInput" autocomplete="off" placeholder="#">
                                <label class="ms-3" for="myAccountUsernameInput">Nouveau Pseudo</label>
                            </div>
                        </fieldset>
                        <fieldset class="row">
                            <div class="col-md-9 col-11 border border-bottom border-light mx-auto form-floating">
                                <input class="form-control" type="email" name="myAccountEmailInput" id="myAccountEmailInput" autocomplete="off" placeholder="#">
                                <label class="ms-3" for="myAccountEmailInput">Adresse de messagerie</label>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-outline-secondary ms-md-5 ms-2 me-auto" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-outline-primary me-md-5 me-2" id="myAccountModalProfil">Confirmer</button>
            </div>
        </form>
    </div>
</div>

<!-- ********************************************************************************************************************************************
     *************************************************************************************************************************************************
     ********************************************************************************************************************************************* -->
<?php require_once 'include/footer.php'; ?>