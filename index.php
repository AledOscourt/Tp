<?php 
session_start();
$pagesTitle = 'Accueil';
require_once 'include/header.php';
require_once 'models/database.php';
require_once 'models/usersModel.php'; 
?>



<!--**********************************************************************Carousel*********************************************************************** -->
<div id="carouselControls" class="carousel slide carousel-fade mb-3 " data-bs-touch="true" data-bs-ride="carousel">
    <div class="carousel-inner h-100">
        <!------------------------------------------------------- Premiere slide du carousel ---------------------------------------------------------------------->
        <div class="carousel-item active text-center firstComingSoon h-100" data-bs-interval="3500">
            <div class="row align-items-center animate__animated animate__fadeIn animate__slower h-100">
                <img src="assets/img/gokuUltraInstint-removebg-preview.png" class="col-6 ms-lg-5 ps-5 py-3 py-lg-2 w-50 img-fluid h-100" alt="gokuUltraInstint">
                <div class="col-3 ms-lg-5 ms-3 text-white animate__animated animate__zoomIn animate__slower text-center">
                    <h2> Coming</h2>
                    <h2>Soon</h2>
                    <h3 class="mt-2">Dragon Ball</h3>
                </div>
            </div>
        </div>
        <!------------------------------------------------------- deuxieme slide du carousel ---------------------------------------------------------------------->
        <div class="carousel-item text-center secondComingSoon h-100" data-bs-interval="3500">
            <div class="row align-items-center animate__animated animate__fadeIn animate__slower h-100">
                <img src="assets/img/disneyRapunzel-removebg-preview.png" class="col-6 ms-lg-5 ps-5 py-3 py-lg-3 w-50 img-fluid h-100" alt="Disney Rapunzel">
                <div class="col-3 ms-lg-5 ms-3 text-white animate__animated animate__zoomIn animate__slower text-center">
                    <h2> Coming</h2>
                    <h2>Soon</h2>
                    <h3 class="mt-2">Disney</h3>
                </div>
            </div>
        </div>
        <!------------------------------------------------------- troisième slide du carousel ---------------------------------------------------------------------->
        <div class="carousel-item  thirdComingSoon h-100" data-bs-interval="3500">
            <div class="row align-items-center animate__animated animate__fadeIn animate__slower h-100">
                <img src="assets/img/simpsonItchy.png" class="col-6 ms-lg-5 ps-5 pt-3 pt-lg-5 py-4 py-lg-4 w-50 img-fluid h-100" alt="Simpson Itchy">
                <div class="col-4 ms-lg-5 ps-5 ms-md-3 text-white animate__animated animate__zoomIn animate__slower text-center">
                    <h2> Coming</h2>
                    <h2>Soon</h2>
                    <h3 class="mt-2">Simpson</h3>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------------- controle slide du carousel ---------------------------------------------------------------------->
    <button class="carousel-control-prev pe-auto d-md-block d-none" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
        <i class="fas fa-angle-double-left carouselArrow me-5"></i>
    </button>
    <button class="carousel-control-next pe-auto d-md-block d-none" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
        <i class="fas fa-angle-double-right carouselArrow ms-5"></i>
    </button>
</div>

<!--**********************************************************************New*********************************************************************** -->
<!------------------------------------------------------------------ titre ------------------------------------------------------------------------------------>
<div class="container-fluid product ">
    <div class="row mb-2 mx-3 text-white align-items-center">
        <h3 class="col homeProductTitle">New</h3>
        <div class="col text-end"> <a class="text-white seeAllLink" href="Boutique">Voir Tout</a></div>
    </div>
    <!------------------------------------------------------------------ Produit ------------------------------------------------------------------------------------>
    <div class="row justify-content-lg-between justify-content-center px-lg-4 mx-lg-5 mx-0 mb-5 gap-3">
        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-1  text-decoration-none " href="" data-aos="zoom-out-up" data-aos-duration="850">
            <img src="assets/img/simpsonItchy.png" class="w-100 h-75 inner-Border-Article my-2" alt="Itchy" />
            <div class="d-flex justify-content-between text-center ">
                <div class="inner-Border-Name col-7 col-sm-8 col-md-7 align-items-center justify-content-center p-xl-2 p-md-1">
                    <p>Itchy</p>
                </div>
                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                    <p>14.99€</p>
                </div>
            </div>
        </a>
        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-1 ms-sm-3 ms-lg-0  text-decoration-none" href="" data-aos="zoom-out-up" data-aos-duration="850">
            <img src="assets/img/gokuUltraInstint-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Goku ultra instinct" />
            <div class="d-flex justify-content-between text-center text-white">
                <div class="inner-Border-Name col-7 col-sm-8 col-md-7  align-items-center justify-content-center p-xl-2 p-1">
                    <p>Goku Ultra Instinct</p>
                </div>
                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                    <p>14.99€</p>
                </div>
            </div>
        </a>
        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-1 ms-sm-3 ms-lg-0  text-decoration-none" href="" data-aos="zoom-out-up" data-aos-duration="850">
            <img src="assets/img/disneyRapunzel-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Rapunzel" />
            <div class="d-flex justify-content-between text-center">
                <div class="inner-Border-Name col-7 col-sm-8 col-md-7  align-items-center justify-content-center p-xl-2 p-1">
                    <p>Rapunzel</p>
                </div>
                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                    <p>14.99€</p>
                </div>
            </div>
        </a>
    </div>
</div>

<!--**********************************************************************Popular*********************************************************************** -->
<!------------------------------------------------------------------ titre ------------------------------------------------------------------------------------>

<div class="container-fluid product">
    <div class="row mb-2 mx-3 text-white align-items-center">
        <h3 class="col homeProductTitle">Populaire</h3>
        <div class="col text-end"> <a class="text-white seeAllLink" href="Boutique">Voir Tout</a></div>
    </div>
    <!------------------------------------------------------------------ Produit ------------------------------------------------------------------------------------>

    <div class="row justify-content-lg-between justify-content-center px-lg-4 mx-lg-5 mx-0 mb-5 gap-3">
        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-1  text-decoration-none " href="" data-aos="zoom-out-up" data-aos-duration="850">
            <img src="assets/img/simpsonItchy.png" class="w-100 h-75 inner-Border-Article my-2" alt="Itchy" />
            <div class="d-flex justify-content-between text-center ">
                <div class="inner-Border-Name col-7 col-sm-8 col-md-7 align-items-center justify-content-center p-xl-2 p-md-1">
                    <p>Itchy</p>
                </div>
                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                    <p>14.99€</p>
                </div>
            </div>
        </a>
        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-1 ms-sm-3 ms-lg-0  text-decoration-none" href="" data-aos="zoom-out-up" data-aos-duration="850">
            <img src="assets/img/gokuUltraInstint-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Goku ultra instinct" />
            <div class="d-flex justify-content-between text-center text-white">
                <div class="inner-Border-Name col-7 col-sm-8 col-md-7  align-items-center justify-content-center p-xl-2 p-1">
                    <p>Goku Ultra Instinct</p>
                </div>
                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                    <p>14.99€</p>
                </div>
            </div>
        </a>
        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-1 ms-sm-3 ms-lg-0  text-decoration-none" href="" data-aos="zoom-out-up" data-aos-duration="850">
            <img src="assets/img/disneyRapunzel-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Rapunzel" />
            <div class="d-flex justify-content-between text-center">
                <div class="inner-Border-Name col-7 col-sm-8 col-md-7  align-items-center justify-content-center p-xl-2 p-1">
                    <p>Rapunzel</p>
                </div>
                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                    <p>14.99€</p>
                </div>
            </div>
        </a>
    </div>
</div>

<!--**********************************************************************Selector*********************************************************************** -->

<div class="container selector my-3" data-aos="fade-up" data-aos-duration="1000">

    <!------------------------------------------------------------------ titre ------------------------------------------------------------------------------------>

    <div class="row" data-aos="fade-up" data-aos-duration="500">
        <a class="d-flex col-md align-items-center text-center selector-left-banner text-decoration-none" href="Nouveauté">
            <img src="assets/img/disneyRapunzel-removebg-preview.png " class="col-7 ms-lg-5 py-2 w-50 img-fluid" alt="Disney Rapunzel ">
            <div class="col-4 ms-lg-5 ms-3" data-aos="zoom-in" data-aos-duration="2500">
                <h2> Coming</h2>
                <h2>Soon</h2>
            </div>
        </a>
        <a class="d-flex col-md align-items-center text-center selector-right-banner text-decoration-none" href="Boutique">
            <img src="assets/img/disneyRapunzel-removebg-preview.png " class="col-7 ms-lg-5 py-2 w-50 img-fluid" alt="Disney Rapunzel ">
            <div class="col-4 ms-lg-5 ms-3" data-aos="zoom-in" data-aos-duration="2500">
                <h2>Boutique</h2>
            </div>
        </a>
    </div>
</div>


<?php require_once('include/footer.php'); ?>