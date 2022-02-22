<?php
session_start();
$pagesTitle = 'Profil';
require_once 'config.php';
require_once 'models/database.php';
require_once 'models/usersModel.php';
require_once 'controllers/profileController.php';
require_once 'include/header.php';
?>
<!-- ********************************************************************************************************************************************* 
     ********************************************************************** Profil *********************************************************************** 
     ********************************************************************************************************************************************* -->
<div class="container mb-5">
    <!-------------------------------------------------------------------- My Account Profil -------------------------------------------->
    <div class="row">
        <div class="col-md-4 col d-flex justify-content-center align-items-center text-center mt-4 my-md-4 profileImageContainer mx-md-auto">
            <?php if (!is_null($_SESSION['user']->profilePicture)) { ?>
                <img src="<?= $_SESSION['user']->profilePicture; ?>" class="rounded-circle myAccountProfilPhoto img-fluid shadow" id="myAccountImageProfil" alt="profilPhoto" />
                <form method="post" class="rounded d-flex updateProfileImgContainer align-items-center justify-content-center" enctype="multipart/form-data">
                    <input class="inputfile rounded-circle" type="file" name="myAccountProfilImage" id="myAccountProfilImage" onChange="this.form.submit();" />
                    <label for="myAccountProfilImage " class="rounded-circle d-flex updateProfileImg align-items-center justify-content-center ">
                        <i class="fas fa-folder-plus text-white"></i>
                    </label>
                </form>
            <?php } else { ?>
                <i class="fas fa-user text-white logoImageProfil shadow"></i>
                <form method="post" enctype="multipart/form-data" class="rounded d-flex updateProfileImgContainer align-items-center justify-content-center">
                    <input class="inputfile rounded-circle" type="file" name="myAccountProfilImage" id="myAccountProfilImage" onChange="this.form.submit();" />
                    <label for="myAccountProfilImage " class="rounded d-flex updateProfileImg align-items-center justify-content-center">
                        <i class="fas fa-folder-plus text-light"></i>
                    </label>
                </form>
            <?php } ?>
        </div>
        <div class="col-md-6 col-12  d-flex my-md-auto my-4 align-items-center">
            <h3 class="text-center col-10 text-white" id="myAccountPseudo"><?= $_SESSION['user']->userName; ?></h3>
            <button class="btn btn-outline-info col-auto" id="myAccountUserNameModif"><i class="far fa-edit"></i></button>
            <form method="post" class="d-none border border-bottom border-light form-floating text-center col" id="userNameForm">
                <input class="form-control text-center <?= isset($formErrors['Username']) ? 'is-invalid' : '' ?>" value="<?= $_SESSION['user']->userName ?>" type="text" name="Username" id="Username" autocomplete="off" placeholder="#">
                <label class="col-12 mx-md-5 mx-4" for="Username">Nouveau Pseudo</label>
                <?php if (isset($formErrors['Username'])) { ?>
                    <p class="invalid-feedback text-center"> <?= $formErrors['Username'] ?> </p>
                <?php } ?>

            </form>
        </div>
    </div>
    <!-------------------------------------------------------------------- My Account Nav -------------------------------------------->
    <div class="row">
        <div class="container-fluid border border-1 border-primary">
            <div class="row py-3 mx-md-5 justify-content-between border-bottom border-1 border-light gap-3">
                <button class="btn btn-outline-secondary col-md-3 active" id="myAccountCoordinateBtn"> Coordonnée </button>
                <button class="btn btn-outline-secondary col-md-3" id="myAccountSellOrdersBtn"> Ordres de vente </button>
                <button class="btn btn-outline-secondary col-md-3" id="myAccountOpinionsBtn"> Avis donner </button>
            </div>
            <!-------------------------------------------------------------------- My Account Contact  -------------------------------------------->
            <div class="row my-5 justify-content-between" id="myAccountConctact">
                <div class="container d-grid gap-3">
                    <div class="row d-grid gap-2">
                        <h3 class="col-md-11 col-10 text-center text-white pagesTitles">Contact</h3>
                        <div class="container mx-md-5 gap-3">
                            <div class="row mt-2 mx-md-5 d-flex">
                                <div class="col-md-auto" id="myAccountEmail">
                                    <h4 class="text-info">Adresse de messagerie : </h4>
                                </div>
                                <div class="col-md-4 d-sm-flex d-grid" id="myAccountEmailOutput">
                                    <p class="fs-5 text-white col-md-auto"><?= $_SESSION['user']->email; ?></p>
                                    <button class="btn btn-outline-info mb-2 ms-2 col" id="myAccountEmailModif"><i class="far fa-edit"></i></button>
                                </div>
                                <form method="post" class="col-md d-none border border-bottom border-light form-floating text-center" id="emailForm">
                                    <input class="form-control text-center <?= isset($formErrors['email']) ? 'is-invalid' : '' ?>" value="<?= $_SESSION['user']->email; ?>" type="email" name="email" id="email" autocomplete="on" placeholder=" " />
                                    <label class="text-white col-12 mx-md-5 mx-4" for="email"><i class="far fa-envelope"></i><span class="ms-1">Adresse Email</span></label>
                                    <?php if (isset($formErrors['email'])) { ?>
                                        <p class="invalid-feedback text-center"> <?= $formErrors['email'] ?> </p>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-md-5 mx-auto gap-2">
                        <a class="btn btn-outline-secondary ms-md-auto col-auto shadow" href="signOut.php">Déconnexion</a>
                        <button type="button" class="btn btn-outline-danger col-auto" name="deleteUserBtn" data-bs-whatever="<?= $_SESSION['user']->id; ?>" data-bs-toggle="modal" data-bs-target="#deleteAccount">Supprimer</button>
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
<form method="post" action="Profil">
    <div class="modal fade" id="deleteAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myAccountContactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <div class="container mt-3">
                <div class="row">
                        <i class="fas fa-exclamation-circle text-warning text-center warningDelete"></i>
                    </div>
                </div>
                <div class="modal-body container">
                <div class="row">
                        <h3 class="mt-2 text-center" id="staticBackdropLabel">Suppression</h3>
                    </div>
                    <div class="row">
                        <p class="text-center text-white">Voulez-vous supprimer votre compte ?</p>
                        <input type="hidden" value="" name="deleteUser" id="deleteUser">
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-outline-secondary ms-md-5 ms-2 me-auto" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-outline-primary me-md-5 me-2">Confirmer</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require_once 'include/footer.php'; ?>