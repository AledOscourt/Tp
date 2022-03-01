<?php
session_start();
$pagesTitle = 'Profil';
require_once 'config.php';
require_once 'models/database.php';
require_once 'models/offersModel.php';
require_once 'models/usersModel.php';
require_once 'models/opinionsModel.php';
require_once 'models/statusModel.php';
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
                <i class="fas fa-user text-white logoImageProfil"></i>
                <form method="post" enctype="multipart/form-data" class="rounded d-flex updateProfileImgContainer align-items-center justify-content-center">
                    <input class="inputfile rounded-circle" type="file" name="myAccountProfilImage" id="myAccountProfilImage" onChange="this.form.submit();" />
                    <label for="myAccountProfilImage " class="rounded d-flex updateProfileImg align-items-center justify-content-center">
                        <i class="fas fa-folder-plus text-light"></i>
                    </label>
                </form>
            <?php } ?>
        </div>
        <div class="col-md col-12 d-flex my-md-auto my-4 align-items-center">
            <h3 class="text-center col-6 text-white" id="myAccountPseudo"><?= $_SESSION['user']->userName; ?></h3>
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
        <div class="container-fluid border border-1 border-primary pb-3">
            <div class="row py-3 mx-md-5 justify-content-between border-bottom border-1 border-light gap-3">
                <button class="btn btn-outline-secondary col-md-3 <?= $_GET['page'] == 1 ? 'active' : '' ?>" id="myAccountCoordinateBtn"> Coordonnée </button>
                <button class="btn btn-outline-secondary col-md-3 <?= $_GET['page'] != 1 ? 'active' : '' ?>" id="myAccountSellOrdersBtn"> Ordres de vente </button>
                <button class="btn btn-outline-secondary col-md-3" id="myAccountOpinionsBtn"> Avis donner </button>
            </div>
            <!-------------------------------------------------------------------- My Account Contact  -------------------------------------------->
            <div class="row my-3 justify-content-between <?= $_GET['page'] != 1 ? 'd-none' : '' ?>" id="myAccountConctact">
                <div class="container d-grid gap-3">
                    <div class="row d-grid gap-2">
                        <h3 class="col-md-11 col-10 text-center text-white pagesTitles">Contact</h3>
                        <div class="container mx-md-5 d-grid gap-3">
                            <div class="row mt-2 mx-md-5 d-flex">
                                <div class="col-md-auto" id="myAccountEmail">
                                    <h4 class="text-info">Adresse de messagerie : </h4>
                                </div>
                                <div class="col-md-4 d-md-flex" id="myAccountEmailOutput">
                                    <p class="fs-5 text-white col-md-auto"><?= $_SESSION['user']->email; ?></p>
                                    <button class="btn btn-outline-info mb-2 ms-auto ms-md-2 col-auto" id="myAccountEmailModif"><i class="far fa-edit"></i></button>
                                </div>
                                <form method="post" class="col-md d-none border border-bottom border-light form-floating text-center" id="emailForm">
                                    <input class="form-control text-center <?= isset($formErrors['email']) ? 'is-invalid' : '' ?>" value="<?= $_SESSION['user']->email; ?>" type="email" name="email" id="email" autocomplete="on" placeholder=" " />
                                    <label class="text-white col-12 mx-md-5 mx-4" for="email"><i class="far fa-envelope"></i><span class="ms-1">Adresse Email</span></label>
                                    <?php if (isset($formErrors['email'])) { ?>
                                        <p class="invalid-feedback text-center"> <?= $formErrors['email'] ?> </p>
                                    <?php } ?>
                                </form>
                            </div>
                            <button class="btn btn-primary col-md-4 mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#passwordCollapse" aria-expanded="false" aria-controls="collapseExample">
                                Modifier&nbsp;son&nbsp;mot&nbsp;de&nbsp;passe
                            </button>
                            <div class="collapse" id="passwordCollapse">
                                <form action="Profil-<?= $_GET['page'] ?>" method="post" class="row d-grid gap-2">
                                    <div class="col-md-8 mx-auto form-floating">
                                        <input class="form-control <?= isset($formErrors['oldPassword']) ? 'is-invalid' : '' ?>" type="password" name="oldPassword" id="oldPassword" autocomplete="on" placeholder="AledOscourt">
                                        <label class="ms-3 text-white" for="oldPassword"><i class="fas fa-lock"></i><span class="ms-2">Ancien mot de passe</span></label>
                                        <?php if (isset($formErrors['oldPassword'])) { ?>
                                            <p class="invalid-feedback text-center"> <?= $formErrors['oldPassword'] ?> </p>
                                        <?php } ?>
                                    </div>

                                    <div class="col-md-8 mx-auto form-floating">
                                        <input class="form-control <?= isset($formErrors['newPassword']) ? 'is-invalid' : '' ?>" type="password" name="newPassword" id="newPassword" autocomplete="on" placeholder="AledOscourt">
                                        <label class="ms-3 text-white" for="newPassword"><i class="fas fa-lock"></i><span class="ms-2">Nouveau mot de passe</span></label>
                                        <?php if (isset($formErrors['newPassword'])) { ?>
                                            <p class="invalid-feedback text-center"> <?= $formErrors['newPassword'] ?> </p>
                                        <?php } ?>
                                    </div>

                                    <div class="col-md-8 mx-auto form-floating">
                                        <input class="form-control <?= isset($formErrors['confirmPassword']) ? 'is-invalid' : '' ?>" type="password" name="confirmPassword" id="confirmPassword" autocomplete="off" placeholder="AledOscourt">
                                        <label class="ms-3 text-white" for="confirmPassword"><i class="fas fa-lock"></i><span class="ms-2">Confirmer le nouveau mot de passe</span></label>
                                        <?php if (isset($formErrors['confirmPassword'])) { ?>
                                            <p class="invalid-feedback text-center"> <?= $formErrors['confirmPassword'] ?> </p>
                                        <?php } ?>
                                    </div>
                                        <button class="btn btn-outline-light col-auto mx-auto" type="submit" name="passwordBtn">Confirmer</button>
                                </form>
                            </div>
                            <div class="row mx-md-5 mx-auto gap-2">
                                <a class="btn btn-outline-secondary ms-md-auto col-auto shadow" href="signOut.php">Déconnexion</a>
                                <button type="button" class="btn btn-outline-danger col-auto" name="deleteUserBtn" data-bs-whatever="<?= $_SESSION['user']->id; ?>" data-bs-toggle="modal" data-bs-target="#deleteAccount">Supprimer</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-------------------------------------------------------------------- My Account Orders  -------------------------------------------->
        <div class="row mt-5 justify-content-between <?= $_GET['page'] == 1 ? 'd-none' : '' ?> " id="myAccountOrders">
            <div class="container-fluid d-grid gap-4">
                <div class="row">
                    <h3 class="col-md-11 col-10 text-center text-white pagesTitles">Ordres de vente</h3>
                    <div class="col-1 d-inline justify-content-center">
                        <a class="btn btn-outline-primary position-absolute" href="Ajout-d-offre" id="ordersBtn">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
                <?php if ($pageNumber != 0) { ?>
                    <div class="row">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item  <?php if ($_GET['page'] == 1) {
                                                            echo 'd-none';
                                                        } ?>"><a class="page-link text-white" href="Profil-1"><span aria-hidden="true">&laquo;</span></a></li>
                                <li class="page-item  <?php if ($_GET['page'] == 1) {
                                                            echo 'd-none';
                                                        } ?>"><a class="page-link text-white" href="<?= 'Profil-' . ($_GET['page'] - 1); ?>">Previous</a></li>
                                <li class="page-item <?php if ($_GET['page'] - 1 == 0) {
                                                            echo 'd-none';
                                                        } ?>"><a class="page-link text-white" href="<?= 'Profil-' . ($_GET['page'] - 1); ?>"><?= $_GET['page'] - 1 ?></a></li>
                                <li class="page-item active"><a class="page-link text-white" href="#"><?= $_GET['page'] ?></a></li>
                                <li class="page-item <?php if ($_GET['page'] + 1 == $pageNumber + 1) {
                                                            echo 'd-none';
                                                        } ?>"><a class="page-link text-white" href="<?= 'Profil-' . ($_GET['page'] + 1); ?>"><?= $_GET['page'] + 1 ?></a></li>
                                <li class="page-item <?php if ($_GET['page'] == $pageNumber) {
                                                            echo 'd-none';
                                                        } ?>"><a class="page-link text-white" href="<?= 'Profil-' . ($_GET['page'] + 1); ?>">Next</a></li>
                                <li class="page-item <?php if ($_GET['page'] == $pageNumber) {
                                                            echo 'd-none';
                                                        } ?>"><a class="page-link text-white" href="<?= 'Profil-' . $pageNumber; ?>"><span aria-hidden="true">&raquo;</span></a></li>
                            </ul>
                        </nav>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="container-fluid p-0">
                        <ul class="mx-4 d-grid gap-4 px-3" id="ordersList">
                            <?php foreach ($offerList as $o) { ?>
                                <li class="row mx-md-5 border border-1 border-secondary rounded py-3 myAccountOffers">
                                    <div class="col-md-6 d-grid">
                                        <img src="uploads/<?= $o->officialPopImageInTheBox ?>" alt="Goku Ultrra instinct" class="img-fluid w-100">
                                        <div class="d-md-flex d-none fs-5 justify-content-center mt-3">
                                            <p class="col-auto text-info">Nombre&nbsp;de&nbsp;clic :</p>
                                            <p class="col-auto ms-2 text-white"><?= $o->nbrClick ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-5 d-grid gap-1 mt-md-0 mt-2">
                                        <h4 class="text-white text-center">
                                            <?= $o->name ?>
                                        </h4>
                                        <div class="ms-2 d-grid gap-2">
                                            <div class="d-flex fs-5">
                                                <p class="col-auto text-info">Numéro :</p>
                                                <p class="col-sm ms-2 text-white"><?= $o->tags ?></p>
                                            </div>
                                            <div class="d-flex fs-5">
                                                <p class="col-auto text-info">Franchise :</p>
                                                <p class="col-sm ms-2 text-white"><?= $o->bName ?></p>
                                            </div>
                                            <div class="d-flex fs-5">
                                                <p class="col-auto text-info">Catégorie :</p>
                                                <p class="col-sm ms-2 text-white"><?= $o->cName ?></p>
                                            </div>
                                            <div class="d-flex fs-5">
                                                <p class="col-auto text-info">Exclusivité :</p>
                                                <p class="col ms-2 text-white"><?= $o->excluName ?></p>
                                            </div>
                                            <div class="d-flex fs-5">
                                                <p class="col-auto text-info">Référence :</p>
                                                <p class="col-sm ms-2 text-white"><?= $o->reference ?></p>
                                            </div>
                                            <div class="d-flex fs-5 text-white mx-auto">
                                                <p class="col-auto text-info">Prix :</p>
                                                <p class="col-sm ms-2"><?= $o->price ?>&nbsp;€</p>
                                            </div>
                                            <div class="d-flex d-md-none fs-5 justify-content-center ">
                                                <p class="col-auto text-info ">Nombre&nbsp;de&nbsp;clic :</p>
                                                <p class="col-auto ms-2 text-white "><?= $o->nbrClick ?></p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col justify-content-end d-flex gap-2">
                                        <a class="btn btn-outline-info " href="Voir-l-offre_<?= $o->id; ?>">Voir</a>
                                        <a class="btn btn-outline-warning" href="Modification-offres_<?= $o->id; ?>">Modifier</a>
                                        <button type="button" class="btn btn-outline-danger col-auto" name="deleteOfferBtn" data-bs-whatever="<?= $o->id; ?>" data-bs-toggle="modal" data-bs-target="#deleteOffers">Supprimer</button>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php if ($pageNumber != 0) { ?>
                    <div class="row">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item  <?php if ($_GET['page'] == 1) {
                                                            echo 'd-none';
                                                        } ?>"><a class="page-link text-white" href="Profil-1"><span aria-hidden="true">&laquo;</span></a></li>
                                <li class="page-item  <?php if ($_GET['page'] == 1) {
                                                            echo 'd-none';
                                                        } ?>"><a class="page-link text-white" href="<?= 'Profil-' . ($_GET['page'] - 1); ?>">Previous</a></li>
                                <li class="page-item <?php if ($_GET['page'] - 1 == 0) {
                                                            echo 'd-none';
                                                        } ?>"><a class="page-link text-white" href="<?= 'Profil-' . ($_GET['page'] - 1); ?>"><?= $_GET['page'] - 1 ?></a></li>
                                <li class="page-item active"><a class="page-link text-white" href="#"><?= $_GET['page'] ?></a></li>
                                <li class="page-item <?php if ($_GET['page'] + 1 == $pageNumber + 1) {
                                                            echo 'd-none';
                                                        } ?>"><a class="page-link text-white" href="<?= 'Profil-' . ($_GET['page'] + 1); ?>"><?= $_GET['page'] + 1 ?></a></li>
                                <li class="page-item <?php if ($_GET['page'] == $pageNumber) {
                                                            echo 'd-none';
                                                        } ?>"><a class="page-link text-white" href="<?= 'Profil-' . ($_GET['page'] + 1); ?>">Next</a></li>
                                <li class="page-item <?php if ($_GET['page'] == $pageNumber) {
                                                            echo 'd-none';
                                                        } ?>"><a class="page-link text-white" href="<?= 'Profil-' . $pageNumber; ?>"><span aria-hidden="true">&raquo;</span></a></li>
                            </ul>
                        </nav>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-------------------------------------------------------------------- My Account Opinions  -------------------------------------------->
        <div class="row mt-5 justify-content-between d-none" id="myAccountOpinions">
            <div class="container-fluid d-grid gap-4">
                <div class="row">
                    <h3 class="col text-center text-white pagesTitles">Gestion&nbsp;des&nbsp;avis</h3>
                </div>
                <div class="row">
                    <div class="container-fluid p-0">
                        <ul class="me-md-4 d-grid gap-4 m-0 p-0" id="ordersList">
                            <?php foreach ($opinions as $op) { ?>
                                <li class="row mx-md-5 gap-1 rounded py-3 border border-1 d-grid m-0">
                                    <div class="col text-end d-md-none  p-0">
                                        <a class="btn btn-outline-primary me-3" href="Ajout_d-offre" id="ordersBtn">
                                            <i class="far fa-edit ms-1"></i>
                                        </a>
                                    </div>
                                    <div class="col d-flex align-items-center px-md-4 p-0">
                                        <div class="col d-grid">
                                            <h4 class="col text-info text-md-start text-center ms-md-5">
                                                <?= $op->userName ?> </h4>
                                            <small class="col text-md-start text-center ms-md-5 text-muted">
                                                <?= $op->reviewDate ?> - <a class="text-decoration-none" href="Article-<?= $op->id; ?>"><?= $op->name . ' - ' . $op->tags ?></a>
                                            </small>
                                        </div>

                                        <div class="col-md-auto text-warning d-md-flex d-none text-end gap-1 me-md-2 fs-5">
                                            <?php for ($i = 1; $i <= $op->reviewGrade; $i += 1) { ?>
                                                <i class="fas fa-star"></i>
                                            <?php } ?>
                                            <?php for ($i = 5; $i > $op->reviewGrade; $i -= 1) { ?>
                                                <i class="far fa-star"></i>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-auto d-md-flex d-none text-end">
                                            <a class="btn btn-outline-primary" href="Ajout_d-offre" id="ordersBtn">
                                                <i class="far fa-edit ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col text-warning text-center d-md-none d-flex justify-content-center p-0">
                                        <?php for ($i = 1; $i <= $op->reviewGrade; $i += 1) { ?>
                                            <i class="fas fa-star"></i>
                                        <?php } ?>
                                        <?php for ($i = 5; $i > $op->reviewGrade; $i -= 1) { ?>
                                            <i class="far fa-star"></i>
                                        <?php } ?>
                                    </div>
                                    <div class="col d-flex justify-content-center text-center my-1 text-white p-0">
                                        <div class="col-lg-9 col-md-8 col">
                                            <p class="col text-break">
                                                <?= $op->content ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col text-end px-md-4 p-0">
                                        <button type="button" class="btn btn-outline-danger col-auto me-md-0 me-3" name="opinionDeleteBtn" data-bs-whatever="<?= $op->id ?>" data-bs-toggle="modal" data-bs-target="#deleteOpinions">Supprimer</button>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<form method="post" action="Profil-<?= $_GET['page'] ?>">
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

<form method="post" action="Profil-<?= $_GET['page'] ?>">
    <div class="modal fade" id="deleteOffers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myAccountContactModalLabel" aria-hidden="true">
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
                        <input type="hidden" value="" name="deleteOffer" id="deleteOffer">
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
<form method="post" action="Profil-<?= $_GET['page'] ?>">
    <div class="modal fade" id="deleteOpinions" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myAccountContactModalLabel" aria-hidden="true">
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
                        <input type="hidden" value="" name="deleteOpinion" id="deleteOpinion">
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