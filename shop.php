<?php
session_start();
$pagesTitle = 'Boutique';
require_once 'models/database.php';
require_once 'models/offersModel.php';
require_once 'controllers/shopController.php';
require_once 'include/header.php';
?>
<!--**********************************************************************Shop*********************************************************************** -->
<!------------------------------------------------------- title ---------------------------------------------------------------------->
<div class="container-fluid my-md-5 my-3">
    <div class="row text-center mb-md-4 mb-2">
        <h2 class="fs-1 text-white pagesTitles">Shop</h2>
    </div>
    <div class="row ms-md-5">
        <!------------------------------------------------------- trier par ---------------------------------------------------------------------->
        <div class="col-auto d-grid my-4 mx-3">
            <legend class="text-center">
                <button class="btn btn-outline-light text-center" id="SortByShopButton" type="button" data-bs-toggle="collapse" href="#collapseSortBy" role="button" aria-expanded="false" aria-controls="collapseSortBy">
                    Trier par
                </button>
            </legend>
            <select class=" btn btn-primary form-select collapse animate__animated animate__fadeIn animate__slower" id="collapseSortBy">
                <option selected>Pertinence</option>
                <option>Ordre croissant</option>
                <option>Ordre décroissant</option>
                <option>Le plus récent</option>
            </select>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-3 ms-md-5 bg-dark my-md-0 mb-4">
            <div class="col-12 d-md-none d-flex align-items-center bg-dark py-2">
                <button class="navbar-toggler btn" type="button" id="sortSelectorCollapse">
                    <span class="align-self-center text-white"><i class="fas fa-bars"></i></span>
                </button>
                <h3 class="col text-center text-white">Selecteur de trie</h3>
            </div>
            <!------------------------------------------------------- formulaire des choix ---------------------------------------------------------------------->
            <div class=" d-md-grid d-none" id="sortSelector">
                <!------------------------------------------------------- category ---------------------------------------------------------------------->
                <fieldset class="d-grid mt-4 mx-3">
                    <legend class="text-center">
                        <button class="btn btn-outline-light text-center" id="categoryShopButton" type="button" data-bs-toggle="collapse" href="#collapseCategory" role="button" aria-expanded="false" aria-controls="collapseCategory">
                            Category
                        </button>
                    </legend>
                    <ul class="form-check mx-3 collapse show animate__animated animate__fadeIn animate__slower text-white" id="collapseCategory">
                    </ul>
                </fieldset>
                <!------------------------------------------------------- franchise ---------------------------------------------------------------------->
                <fieldset class="d-grid my-4 mx-3">
                    <legend class="text-center">
                        <button class="btn btn-outline-light text-center" id="brandShopButton" type="button" data-bs-toggle="collapse" href="#collapseBrand" role="button" aria-expanded="false" aria-controls="collapseBrand">
                            Franchise
                        </button>
                    </legend>
                    <ul class="form-check mx-3 collapse show animate__animated animate__fadeIn animate__slower text-white" id="collapseBrand">
                    </ul>
                </fieldset>
                <!------------------------------------------------------- Exclusivité ---------------------------------------------------------------------->
                <fieldset class="d-grid my-4 mx-3">
                    <legend class="text-center">
                        <button class="btn btn-outline-light text-center" id="exclusivityShopButton" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExclusivity" role="button" aria-expanded="false" aria-controls="collapseExclusivity">
                            Exclusivité
                        </button>
                    </legend>
                    <ul class="form-check mx-3 collapse show animate__animated animate__fadeIn animate__slower text-white" id="collapseExclusivity">
                    </ul>
                </fieldset>
                <!------------------------------------------------------- Prix ---------------------------------------------------------------------->
                <fieldset class="d-grid my-4 mx-3">
                    <legend class="text-center">
                        <button class="btn btn-outline-light text-center" id="priceShopButton" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrice" role="button" aria-expanded="false" aria-controls="collapsePrice">
                            Prix
                        </button>
                    </legend>
                    <ul class="mx-3 collapse show animate__animated animate__fadeIn animate__slower text-white" id="collapsePrice">
                        <li class="d-flex align-items-center">
                            <input type="range" class="col-9 form-range-input" name="inputRangePrice" min="0" max="2500" value="2500" id="inputRangePrice" /><label for="inputRangePrice" id="priceRangePrice" class="col text-center form-range-label"></label>
                        </li>
                        <li class="d-flex align-items-center ms-5">
                            <input type="radio" class="form-check-input" name="priceSelector" id="priceSelector20" /><label for="priceSelector20" class="form-check-label ms-3 fs-5">0 à 20€</label>
                        </li>
                        <li class="d-flex align-items-center ms-5">
                            <input type="radio" class="form-check-input" name="priceSelector" id="priceSelector50" /><label for="priceSelector50" class="form-check-label ms-3 fs-5">20 à 50€</label>
                        </li>
                        <li class="d-flex align-items-center ms-5">
                            <input type="radio" class="form-check-input" name="priceSelector" id="priceSelector100" /><label for="priceSelector100" class="form-check-label ms-3 fs-5">50 à 100€</label>
                        </li>
                        <li class="d-flex align-items-center ms-5">
                            <input type="radio" class="form-check-input" name="priceSelector" id="priceSelector500" /><label for="priceSelector500" class="form-check-label ms-3 fs-5">100 à 500€</label>
                        </li>
                        <li class="d-flex align-items-center ms-5">
                            <input type="radio" class="form-check-input" name="priceSelector" id="priceSelector1000" /><label for="priceSelector1000" class="form-check-label ms-3 fs-5">500 à 1000€</label>
                        </li>
                        <li class="d-flex align-items-center ms-5">
                            <input type="radio" class="form-check-input" name="priceSelector" id="priceSelector2500" /><label for="priceSelector2500" class="form-check-label ms-3 fs-5">1000 à 2500€</label>
                        </li>
                    </ul>
                </fieldset>
                <input type="submit" value="Rechercher" class="col-md-6 mx-auto btn btn-outline-primary my-4">
            </div>
        </div>
        <div class="col container-fluid">
            <!------------------------------------------------------- pagination top ---------------------------------------------------------------------->
            <div class="row mt-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item  <?php if ($_GET['page'] == 1) {echo 'd-none';} ?>"><a class="page-link text-white" href="Boutique-1"><span aria-hidden="true">&laquo;</span></a></li>
                        <li class="page-item  <?php if ($_GET['page'] == 1) {echo 'd-none';} ?>"><a class="page-link text-white" href="<?= 'Boutique-' . ($_GET['page'] - 1); ?>">Previous</a></li>
                        <li class="page-item <?php if ($_GET['page'] - 1 == 0) {echo 'd-none';} ?>"><a class="page-link text-white" href="<?= 'Boutique-' . ($_GET['page'] - 1); ?>"><?= $_GET['page'] - 1 ?></a></li>
                        <li class="page-item active"><a class="page-link text-white" href="#"><?= $_GET['page'] ?></a></li>
                        <li class="page-item <?php if ($_GET['page'] + 1 == $pageNumber + 1) {echo 'd-none';} ?>"><a class="page-link text-white" href="<?= 'Boutique-' . ($_GET['page'] + 1); ?>"><?= $_GET['page'] + 1 ?></a></li>
                        <li class="page-item <?php if ($_GET['page'] == $pageNumber) { echo 'd-none';} ?>"><a class="page-link text-white" href="<?= 'Boutique-' . ($_GET['page'] + 1); ?>">Next</a></li>
                        <li class="page-item <?php if ($_GET['page'] == $pageNumber) { echo 'd-none';} ?>"><a class="page-link text-white" href="<?= 'Boutique-' . $pageNumber; ?>"><span aria-hidden="true">&raquo;</span></a></li>
                    </ul>
                </nav>
            </div>
            <!------------------------------------------------------- articles ---------------------------------------------------------------------->
            <div class="col animate__animated animate__fadeIn animate__slower container-fluid product position-relative">
                <!------------------------------------------------------- premiere Ligne ---------------------------------------------------------------------->
                <div class="row mt-3">
                    <div class="container-fluid shopRow">
                        <div class="row justify-content-lg-evenly justify-content-center row-cols-md-3 row-cols-1 gap-3 ">
                            <?php foreach ($offerList as $o) { ?>
                                <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-2 text-decoration-none" href="Article-<?= $o->id; ?>" data-aos="zoom-out-up">
                                    <img src="uploads/<?= $o->officialPopImageInTheBox; ?>" class="img-fluid inner-Border-Article my-2" alt="Itchy" />
                                    <div class="d-flex justify-content-between text-center">
                                        <div class="inner-Border-Name col-7 col-sm-8 col-md-7 align-items-center justify-content-center p-xl-2 p-md-1">
                                            <p><?= $o->name; ?></p>
                                        </div>
                                        <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                                            <p><?= $o->price; ?>&nbsp;€</p>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item  <?php if ($_GET['page'] == 1) {echo 'd-none';} ?>"><a class="page-link text-white" href="Boutique-1"><span aria-hidden="true">&laquo;</span></a></li>
                        <li class="page-item  <?php if ($_GET['page'] == 1) {echo 'd-none';} ?>"><a class="page-link text-white" href="<?= 'Boutique-' . ($_GET['page'] - 1); ?>">Previous</a></li>
                        <li class="page-item <?php if ($_GET['page'] - 1 == 0) {echo 'd-none';} ?>"><a class="page-link text-white" href="<?= 'Boutique-' . ($_GET['page'] - 1); ?>"><?= $_GET['page'] - 1 ?></a></li>
                        <li class="page-item active"><a class="page-link text-white" href="#"><?= $_GET['page'] ?></a></li>
                        <li class="page-item <?php if ($_GET['page'] + 1 == $pageNumber + 1) {echo 'd-none';} ?>"><a class="page-link text-white" href="<?= 'Boutique-' . ($_GET['page'] + 1); ?>"><?= $_GET['page'] + 1 ?></a></li>
                        <li class="page-item <?php if ($_GET['page'] == $pageNumber) { echo 'd-none';} ?>"><a class="page-link text-white" href="<?= 'Boutique-' . ($_GET['page'] + 1); ?>">Next</a></li>
                        <li class="page-item <?php if ($_GET['page'] == $pageNumber) { echo 'd-none';} ?>"><a class="page-link text-white" href="<?= 'Boutique-' . $pageNumber; ?>"><span aria-hidden="true">&raquo;</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
    <?php require_once('include/footer.php'); ?>