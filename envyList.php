<?php
session_start();
$pagesTitle = 'Liste d\'envie';
require_once 'models/database.php';
require_once 'models/envyListModel.php';
require_once 'controllers/envyListController.php';
require_once 'include/header.php';
?>
<div class="container">
    <div class="row my-3 align-items-center">
        <div class="col my-3 me-auto">
            <h2 class="text-center text-white pagesTitles">Liste d'envie</h2>
        </div>
        <div class="col-md-1 col-2 d-flex my-3 justify-content-start ">
            <a class="btn btn-outline-primary">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>
    <!--**************************************************** Liste de Produit  ******************************************************************-->
    <div class="row my-3 g-3">
        <ul class="container col-10 mx-auto ">
            <!--***********************------------------------------- Produit --------------------------------------*******************************-->
            <li class="row">
                <div class="container my-2">
                    <div class="row gap-3">
                        <?php foreach ($envylist as $e) { ?>
                                <div class="container border border-1 border-secondary rounded productEnvyList py-3">
                                    <div class="row">
                                        <div class="col text-end me-md-4 me-2">
                                            <form action="Liste-d-envie" method="post">
                                                <input type="hidden" name="deleteFromEnvylist" value="<?= $e->id ?>" />
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row p-md-3">
                                        <div class="col-md-6 my-2">
                                            <img src="uploads/<?= $e->officialPopImageInTheBox ?>" alt="<?= $e->name ?>" class="img-fluid w-100">
                                        </div>
                                        <div class="col-md-5 d-grid gap-1">
                                            <h4 class="text-white text-center">
                                                <?= $e->name ?>
                                            </h4>
                                            <div class="ms-2 d-grid gap-2">
                                                <div class="ms-2 d-grid gap-2">
                                                    <div class="d-flex fs-5">
                                                        <p class="col-auto text-white">Numéro :</p>
                                                        <p class="col-sm ms-md-2 text-secondary"><?= $e->tags ?></p>
                                                    </div>
                                                    <div class="d-flex fs-5">
                                                        <p class="col-auto text-white">Franchise :</p>
                                                        <p class="col-sm ms-md-2 text-secondary"><?= $e->bName ?></p>
                                                    </div>
                                                    <div class="d-flex fs-5">
                                                        <p class="col-auto text-white">Catégorie :</p>
                                                        <p class="col-sm ms-md-2 text-secondary"><?= $e->cName ?></p>
                                                    </div>
                                                    <div class="d-flex fs-5">
                                                        <p class="col-auto text-white">Pseudo&nbsp;du&nbsp;vendeur :</p>
                                                        <p class="col-sm ms-md-2 text-secondary"><?= $e->userName ?></p>
                                                    </div>
                                                    <div class="d-flex fs-5">
                                                        <p class="col-auto text-white">Référence :</p>
                                                        <p class="col-sm ms-md-2 text-secondary"><?= $e->reference ?></p>
                                                    </div>
                                                    <div class="d-flex fs-4 text-white align-items-center mx-auto priceOfferContainer p-2">
                                                        <p class="col-auto m-0 priceOfferLabel">Prix :</p>
                                                        <p class="col-sm m-0 ms-2 priceOffer"><?= $e->price ?>&nbsp;€</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <button class="col-md-4 col-sm-6 col-8 mx-auto btn btn-outline-primary"> Contacter le vendeur </button>
                                        </div>
                                    </div>
                                </div>
                        <?php } ?>
                    </div>
                </div>
            </li>
            <!--***********************------------------------------- Fin Produit --------------------------------------*******************************-->
        </ul>
        <!--**************************************************** Fin Liste de Produit  ******************************************************************-->
    </div>
</div>

<?php require_once 'include/footer.php'; ?>