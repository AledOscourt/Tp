<?php
session_start();
require_once 'config.php';
require_once 'models/database.php';
require_once 'models/offersModel.php';
require_once 'models/imagesModel.php';
require_once 'models/opinionsModel.php';
require_once 'models/envyListModel.php';
require_once 'controllers/articleController.php';
$pagesTitle = $offers->name . ' - ' . $offers->tags;
require_once 'include/header.php';
?>

<div class="container-fluid my-3">
    <div class="row my-4">
        <div class="col d-flex justify-content-center align-items-center">
            <?php if ($_SESSION) { ?>
                <form action="Article-<?= $_GET['id']; ?>" method="post">
                    <button class="btn btn-outline-secondary" name="toEnvylist">
                        <?php if ($envylists->envyExist() == 0) { ?>
                            <i class="fas fa-heart"></i>
                        <?php } else { ?>
                            <i class="fas fa-heart-broken"></i>
                        <?php } ?></button>
                </form>
            <?php } ?>
            <h2 class="col-lg-4 col-7 text-white text-center pagesTitles">
                <?= $offers->name ?>
            </h2>
            <h3 class="col-lg-auto text-white text-center m-0">
                <?= $offers->tags ?>
            </h3>
        </div>
    </div>

    <div class="row mx-md-1 g-2">
        <div class="col-lg-2 d-lg-grid d-none bg-dark px-5 py-3 articleImageSelector me-2">
            <div class="container-fluid p-0">
                <div class="row">
                    <a data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" aria-label="Slide 1"><img src="uploads/<?= $offers->officialPopImageInTheBox ?>" class="w-100 rounded" alt="GokuOfficialImage"></a>
                </div>
                <div class="row">
                    <a data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"><img src="uploads/<?= $offers->officialPopImageOutBox ?>" class="w-100 rounded" alt="GokuOfficialImage"></a>
                </div>
                <?php $i = 2;
                foreach ($imagesList as $img) { ?>
                    <div class="row">
                        <a data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i; ?>" aria-label="Slide <?= $i + 1 ?>"><img src="<?= $img->image ?>" class="w-100 rounded" alt="GokuOfficialImage"></a>
                    </div>
                <?php $i += 1;
                } ?>
            </div>
        </div>
        <div class="col d-lg-flex d-grid my-2">
            <div id="carouselExampleIndicators" class="carousel slide col my-2" data-bs-touch="true">
                <div class="carousel-inner carouselArticle">
                    <div class="carousel-item active h-100">
                        <img src="uploads/<?= $offers->officialPopImageInTheBox ?>" class="img-fluid h-100" alt="">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="uploads/<?= $offers->officialPopImageOutBox ?>" class="h-100" alt="">
                    </div>
                    <?php foreach ($imagesList as $img) { ?>
                        <div class="carousel-item h-100">
                            <img src="<?= $img->image ?>" class="img-fluid h-100" alt="">
                        </div>
                    <?php } ?>
                    <div class="carousel-indicators opacity-50">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <?php $i = 2;
                        foreach ($imagesList as $img) { ?>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i; ?>" aria-label="Slide <?= $i + 1 ?>"></button>
                        <?php $i += 1;
                        } ?>
                    </div>
                </div>

            </div>
            <div class="col d-lg-grid align-items-center ms-5 ps-4 d-none">
                <div class="d-flex fs-4 text-white">
                    <p class="col-auto text-info">Franchise :</p>
                    <p class="col-sm ms-2"><?= $offers->bName ?></p>
                </div>
                <div class="d-flex fs-4 text-white">
                    <p class="col-auto text-info">Catégorie :</p>
                    <p class="col-sm ms-2"><?= $offers->cName ?></p>
                </div>
                <div class="d-flex fs-4 text-white">
                    <p class="col-auto text-info">Exclusivité :</p>
                    <p class="col ms-2 text-white"><?= $offers->excluName ?></p>
                </div>
                <div class="d-flex fs-4 text-white">
                    <p class="col-auto text-info">Référence :</p>
                    <p class="col-sm ms-2 "><?= $offers->reference ?></p>
                </div>
                <div class="d-flex fs-4 text-white mx-auto priceOfferContainer p-2">
                    <p class="col-auto my-0 priceOfferLabel">Prix :</p>
                    <p class="col-sm ms-2 my-0 priceOffer"><?= $offers->price ?>&nbsp;€</p>
                </div>
            </div>
        </div>
        <div class="d-lg-none d-grid my-3">
            <button class="btn btn-outline-primary col-10 mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#moreInfoArticle" aria-controls="moreInfoArticle">Afficher plus d'infos</button>
            <div class="collapse align-items-center" id="moreInfoArticle">
                <div class="col d-grid mt-3">
                    <div class="d-flex fs-4 text-white">
                        <p class="col-auto text-info">Franchise :</p>
                        <p class="col-sm ms-2"><?= $offers->bName ?></p>
                    </div>
                    <div class="d-flex fs-4 text-white">
                        <p class="col-auto text-info">Catégorie :</p>
                        <p class="col-sm ms-2"><?= $offers->cName ?></p>
                    </div>
                    <div class="d-flex fs-4 text-white">
                        <p class="col-auto text-info">Exclusivité :</p>
                        <p class="col ms-2 text-white"><?= $offers->excluName ?></p>
                    </div>
                    <div class="d-flex fs-4 text-white">
                        <p class="col-auto text-info">Référence :</p>
                        <p class="col-sm ms-2 "><?= $offers->reference ?></p>
                    </div>
                    <div class="d-flex fs-4 text-white mx-auto priceOfferContainer p-2">
                        <p class="col-auto m-0 priceOfferLabel">Prix :</p>
                        <p class="col-sm m-0 ms-2 priceOffer"><?= $offers->price ?>&nbsp;€</p>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-pills gap-1">
            <li class="nav-item">
                <a class="nav-link text-white articleBtn" aria-current="page" id="descriptionBtn">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white articleBtn" id="opinionBtn">Avis</a>
            </li>
        </ul>
        <div class="fs-4 text-white px-md-5 d-none" id="description">
            <p class="col text-info text-center"><?= $offers->statName ?></p>
            <p class="col-md-9 mx-md-auto fs-5 text-center"><?= $offers->description ?></p>
        </div>
        <div class="fs-4 text-white p-md-4 shadow-lg d-none" id="opinion">
            <?php if ($_SESSION) { ?>
                <button class="btn btn-primary col-md-4 col-8 mt-3 mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Ajouter un commentaire
                </button>
                <div class="collapse" id="collapseExample">
                    <h2 class="text-center my-4"> Laisser votre commentaire</h2>
                    <form action="Article-<?= $_GET['id'] ?>" method="post" class="container-fluid d-grid gap-3">
                        <fieldset class="row d-flex gap-lg-0 gap-3">
                            <div class="col-md-11 border mx-auto form-floating">
                                <textarea class="form-control <?= isset($formErrors['content']) ? 'is-invalid' : '' ?>" name="content" id="content" maxlength="370" placeholder=" "></textarea>
                                <label class="ms-3 text-white floatingTextarea fs-6" for="content">Commentaire</label>
                                <?php if (isset($formErrors['content'])) { ?>
                                    <p class="invalid-feedback text-center"> <?= $formErrors['content'] ?> </p>
                                <?php } ?>
                            </div>
                        </fieldset>
                        <fieldset class="row d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-secondary col-md-4" name="opinionAddBtn">Envoyer</button>
                        </fieldset>
                    </form>
                </div>
            <?php } ?>
            <div class="col d-grid mt-4 gap-4">
                <?php foreach ($opinions as $op) { ?>
                    <div class="col-md-8 rounded mx-md-auto border border-1 d-grid p-3">
                        <div class="col d-flex align-items-center">
                            <div class="col d-flex">
                                <h4 class="col text-info text-md-start text-center ms-md-5 align-bottom commentTitle">
                                    <?= $op->userName ?>
                                </h4>
                                <small class="col text-end ms-md-5 text-muted ">
                                    <?= $op->reviewDate ?>
                                </small>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center text-center text-white">
                            <p class="col text-break m-0">
                                <?= $op->content ?>
                            </p>
                        </div>
                        <?php if ($_SESSION && $op->id_users == $_SESSION['user']->id) { ?>
                            <div class="col text-end">
                                <button type="button" class="btn btn-outline-danger col-auto" name="opinionDeleteBtn" data-bs-whatever="<?= $op->id ?>" data-bs-toggle="modal" data-bs-target="#deleteOpinions">Supprimer</button>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<form method="post" action="Article-<?= $_GET['id'] ?>">
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