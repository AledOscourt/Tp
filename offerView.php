<?php
session_start();
$pagesTitle = 'Voir l\'offre';
require_once 'models/database.php';
require_once 'models/offersModel.php';
require_once 'models/imagesModel.php';
require_once 'controllers/offerViewController.php';
require_once 'include/header.php';
?>

<div class="container-fluid my-3">
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <a class="col-auto text-white text-center text-decoration-none h4 btn btn-outline-secondary" href="Profil-1">
                <i class="fas fa-reply"></i>&nbsp;Retour
            </a>
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
            <a data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" aria-label="Slide 1"><img src="uploads/<?= $offers->officialPopImageInTheBox ?>" class="w-100 rounded" alt="GokuOfficialImage"></a>
            <a data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"><img src="uploads/<?= $offers->officialPopImageOutBox ?>" class="w-100 rounded" alt="GokuOfficialImage"></a>
            <?php $i = 2;
            foreach ($imagesList as $img) { ?>
                <a data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i; ?>" aria-label="Slide <?= $i + 1 ?>"><img src="<?= $img->image ?>" class="w-100 rounded" alt="GokuOfficialImage"></a>
            <?php $i += 1;
            } ?>
        </div>
        <div class="col d-lg-flex d-grid my-2">
            <div id="carouselExampleIndicators" class="carousel slide col my-2" data-bs-touch="true">
                <div class="carousel-inner carouselArticle">
                    <div class="carousel-item active">
                        <img src="uploads/<?= $offers->officialPopImageInTheBox ?>" class="img-fluid" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="uploads/<?= $offers->officialPopImageOutBox ?>" class="img-fluid" alt="">
                    </div>
                    <?php foreach ($imagesList as $img) { ?>
                        <div class="carousel-item">
                            <img src="<?= $img->image ?>" class="img-fluid" alt="">
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
                    <p class="col-sm ms-2 my-0 priceOffer"><?= $offers->price ?>&nbsp;$</p>
                </div>
            </div>
        </div>
        <div class="d-lg-none d-grid mt-3">
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
                        <p class="col-sm m-0 ms-2 priceOffer"><?= $offers->price ?>&nbsp;$</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-lg-grid fs-4 text-white px-md-5 d-none">
            <p class="col text-info text-center"><?= $offers->statName ?></p>
            <p class="col-8 mx-auto fs-5 text-center"><?= $offers->description ?></p>
        </div>
    </div>
</div>

<?php require_once 'include/footer.php'; ?>