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
        <div class="col-auto d-grid my-2 mx-3">
            <legend class="text-center">
                <button class="btn btn-outline-light text-center col" id="SortByShopButton" type="button" data-bs-toggle="collapse" href="#collapseSortBy" role="button" aria-expanded="false" aria-controls="collapseSortBy">
                    Trier par
                </button>
            </legend>
            <div class="col">
                <select class=" btn btn-primary form-select collapse animate__animated animate__fadeIn animate__slower" id="collapseSortBy">
                    <option selected>Pertinence</option>
                    <option>Ordre croissant</option>
                    <option>Ordre décroissant</option>
                    <option>Le + récent</option>
                    <option>Le - récent</option>

                </select>
            </div>

        </div>
    </div>
    <div class="row my-2">
        <div class="col container-fluid">
            <!------------------------------------------------------- pagination top ---------------------------------------------------------------------->

            <div class="row my-2">
                <div class="col container-fluid">
                    <div class="row mt-2">
                        <nav aria-label="Page navigation example">
                            <input type="hidden" id="pageNumber" value="<?= $pageNumber; ?>" />
                            <ul class="pagination justify-content-end">
                                <li class="page-item "><button class="page-link d-none text-white" id="topPreviousBtn">Previous</button></li>
                                <li class="page-item"><button class="page-link d-none text-white" id="topPreviousPageBtn"></button></li>
                                <li class="page-item active"><button class="page-link text-white" disabled id="topPageBtn">1</button></li>
                                <?php if($pageNumber !=1){ ?>
                                <li class="page-item"><button class="page-link text-white" id="topNextPageBtn">2</button></li>
                                <li class="page-item"><button class="page-link text-white" id="topNextBtn">Next</button></li>
                                <?php }?>
                            </ul>
                        </nav>
                    </div>
                    <!------------------------------------------------------- articles ---------------------------------------------------------------------->
                    <div class="col animate__animated animate__fadeIn animate__slower container-fluid product position-relative">
                        <!------------------------------------------------------- premiere Ligne ---------------------------------------------------------------------->
                        <div class="row mt-3">
                            <div class="container-fluid shopRow">
                                <div class="row justify-content-center gap-5" id="offersList">
                                    <div class="container-fluid" id="offerListLoad">
                                        <div class="row justify-content-center gap-5">
                                            <?php foreach ($offerList as $o) { ?>
                                                <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-2 text-decoration-none" href="Article-<?= $o->id; ?>">
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
                        </div>
                    </div>
                    <div class="row mt-2">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item "><button class="page-link d-none text-white" id="bottomPreviousBtn">Previous</button></li>
                                <li class="page-item"><button class="page-link d-none text-white" id="bottomPreviousPageBtn"></button></li>
                                <li class="page-item active"><button class="page-link text-white" disabled id="bottomPageBtn">1</button></li>
                                <?php if($pageNumber !=1){ ?>
                                <li class="page-item"><button class="page-link text-white" id="topNextPageBtn">2</button></li>
                                <li class="page-item"><button class="page-link text-white" id="topNextBtn">Next</button></li>
                                <?php }?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('include/footer.php'); ?>