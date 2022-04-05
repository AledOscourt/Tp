<?php
session_start();
$pagesTitle = 'Nouveauté';
require_once 'models/database.php';
require_once 'models/offersModel.php';
require_once 'controllers/newController.php';
require_once 'include/header.php';

?>
<!--**********************************************************************Shop*********************************************************************** -->

<!------------------------------------------------------- Titre ---------------------------------------------------------------------->
<div class="container-fluid my-md-4 my-3">
    <div class="row text-center mb-md-4 mb-2">
        <h2 class="fs-1 text-white pagesTitles">Nouveauté</h2>
    </div>
    <div class="row">
        <div class="col container-fluid">
            <!------------------------------------------------------- articles ---------------------------------------------------------------------->
            <div class="col animate__animated animate__fadeIn animate__slower container-fluid product position-relative">
                <!------------------------------------------------------- premiere Ligne ---------------------------------------------------------------------->
                <div class="row mt-3">
                    <div class="container-fluid shopRow">
                        <div class="row justify-content-center gap-5 ">
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
                                    <span class="position-absolute top-0 start-0 fs-6 translate-middle badge rounded-pill bg-primary">
                                        Nouveau
                                    </span>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'include/footer.php'; ?>