<?php
session_start();
require_once 'include/header.php';
 ?>

<div class="container-fluid my-3">
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <button class="btn btn-outline-secondary"><i class="fas fa-heart"></i></button>

            <h2 class="col-lg-4 col-9 text-white text-center pagesTitles">
                Goku Ultra Instinct
            </h2>
            <h3 class="col-lg-auto text-white text-center m-0">
                386
            </h3>
        </div>
    </div>

    <div class="row mx-md-1">
        <div class="col-lg-2 d-lg-grid d-none bg-dark px-5 py-3 articleImageSelector">
            <a data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" aria-label="Slide 1"><img src="assets/img/gokuUltraInstint-removebg-preview.png" class="w-100 rounded" alt="GokuOfficialImage"></a>
            <a data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"><img src="assets/img/simpsonItchy.png" class="w-100 rounded" alt="GokuOfficialImage"></a>
            <a data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"><img src="assets/img/disneyRapunzel-removebg-preview.png" class="w-100 rounded" alt="GokuOfficialImage"></a>
            <a data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"><img src="assets/img/gokuUltraInstint-removebg-preview.png" class="w-100 rounded" alt="GokuOfficialImage"></a>
            <a data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"><img src="assets/img/gokuUltraInstint-removebg-preview.png" class="w-100 rounded" alt="GokuOfficialImage"></a>
        </div>
        <div class="col d-grid my-2">
            <div class="d-lg-flex">
                <div class="col my-2">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-touch="true">
                        <div class="carousel-indicators opacity-50">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        </div>
                        <div class="carousel-inner carouselArticle">
                            <div class="carousel-item active">
                                <img src="assets/img/gokuUltraInstint-removebg-preview.png" class="img-fluid " alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/simpsonItchy.png" class="img-fluid" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/disneyRapunzel-removebg-preview.png" class="img-fluid" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/gokuUltraInstint-removebg-preview.png" class="img-fluid" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/gokuUltraInstint-removebg-preview.png" class="img-fluid" alt="">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col d-lg-grid align-items-center ms-lg-5 d-none">
                    <div class="d-flex fs-4 text-white">
                        <p class="col-auto text-info">Franchise :</p>
                        <p class="col-sm ms-2">Dragon Ball</p>
                    </div>
                    <div class="d-flex fs-4 text-white">
                        <p class="col-auto text-info">Catégorie :</p>
                        <p class="col-sm ms-2">Anime</p>
                    </div>
                    <div class="d-flex fs-4 text-white">
                        <p class="col-auto text-info">Pseudo&nbsp;du&nbsp;vendeur :</p>
                        <p class="col-sm ms-2 ">Afsagqs</p>
                    </div>
                    <div class="d-flex fs-4 text-white">
                        <p class="col-auto text-info">Référence :</p>
                        <p class="col-sm ms-2 ">32855</p>
                    </div>
                    <div class="d-flex fs-4 text-white">
                        <p class="col-auto text-info">Prix :</p>
                        <p class="col-sm ms-2">20$</p>
                    </div>
                </div>
            </div>
            <div class="d-lg-flex fs-4 text-white px-md-5 d-none">
                <p class="col-lg-auto text-info">Description :</p>
                <p class="col-lg ms-lg-2 fs-5">Neque porro quisquam est qui dolorem
                    ipsum quia dolor sit amet, consectetur,
                    adipisci velit… There is no one who loves
                    pain itself, who seeks after it and wants
                    to have it.</p>
            </div>
            <div class="d-lg-none d-grid mt-3">
                <button class="btn btn-outline-primary col-10 mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#moreInfoArticle" aria-controls="moreInfoArticle">Afficher plus d'infos</button>
                <div class="collapse align-items-center" id="moreInfoArticle">
                    <div class="col d-grid mt-3">
                        <div class="d-flex fs-4 text-white">
                            <p class="col-auto text-info">Franchise :</p>
                            <p class="col-sm ms-2">Dragon Ball</p>
                        </div>
                        <div class="d-flex fs-4 text-white">
                            <p class="col-auto text-info">Catégorie :</p>
                            <p class="col-sm ms-2">Anime</p>
                        </div>
                        <div class="d-flex fs-4 text-white">
                            <p class="col-auto text-info">Pseudo&nbsp;du&nbsp;vendeur :</p>
                            <p class="col-sm ms-2 ">Afsagqs</p>
                        </div>
                        <div class="d-flex fs-4 text-white">
                            <p class="col-auto text-info">Référence :</p>
                            <p class="col-sm ms-2 ">32855</p>
                        </div>
                        <div class="d-flex fs-4 text-white">
                            <p class="col-auto text-info">Prix :</p>
                            <p class="col-sm ms-2">20$</p>
                        </div>
                    </div>
                    <div class="d-grid fs-4 text-white">
                        <p class="col-auto text-info">Description :</p>
                        <p class="col fs-5">Neque porro quisquam est qui dolorem
                            ipsum quia dolor sit amet, consectetur,
                            adipisci velit… There is no one who loves
                            pain itself, who seeks after it and wants
                            to have it.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'include/footer.php'; ?>