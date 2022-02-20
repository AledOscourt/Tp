<?php
session_start();
$pagesTitle = 'Nouveauté';
require_once 'include/header.php';

?>
<!--**********************************************************************Shop*********************************************************************** -->

<!------------------------------------------------------- Titre ---------------------------------------------------------------------->
<div class="container-fluid my-md-4 my-3">
    <div class="row text-center mb-md-4 mb-2">
        <h2 class="fs-1 text-white pagesTitles">Coming Soon</h2>
    </div>
    <!------------------------------------------------------- Pagination haut ---------------------------------------------------------------------->
    <div class="row me-md-2">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end ">
                <li class="page-item">
                    <button class="page-link btn btn-light" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </button>
                </li>
                <li class="page-item"><button class="page-link btn btn-light" href="#">1</button></li>
                <li class="page-item"><button class="page-link btn btn-light" href="#">2</button></li>
                <li class="page-item">
                    <button class="page-link btn btn-light" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </button>
                </li>
            </ul>
        </nav>
    </div>
    <!------------------------------------------------------- Premiere Ligne ---------------------------------------------------------------------->
    <div class="col-md animate__animated animate__fadeIn animate__slower d-grid gap-4 container-fluid product">
        <div class="row justify-content-lg-between justify-content-center px-lg-4 mx-sm-5 mx-4">
            <a class="outer-Border-Article col-10 col-sm-5 col-lg-3 pb-2 text-decoration-none mb-sm-0 mb-3" href="" data-aos="zoom-out-up">
                <img src="assets/img/simpsonItchy.png" class="w-100 h-75 inner-Border-Article my-2" alt="Itchy" />
                <div class="d-flex justify-content-between text-center">
                    <div class="inner-Border-Name col-9 mt-sm mt-2 mx-auto align-items-center justify-content-center p-xl-2 p-md-1">
                        <p>Itchy</p>
                    </div>
                </div>
                <span class="position-absolute top-0 start-0 fs-6 translate-middle badge rounded-pill bg-primary">
                    Coming Soon
                </span>
            </a>
            <a class="outer-Border-Article col-10 col-sm-5 col-lg-3 pb-2 ms-sm-3 ms-lg-0  text-decoration-none" href="" data-aos="zoom-out-up">
                <img src="assets/img/gokuUltraInstint-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Goku ultra instinct" />
                <div class="d-flex justify-content-between text-center align-items-center">
                    <div class="inner-Border-Name col-9 mt-sm mt-2 mx-auto align-items-center justify-content-center p-xl-2 p-1">
                        <p>Goku Ultra Instinct</p>
                    </div>

                </div>
                <span class="position-absolute top-0 start-0 fs-6 translate-middle badge rounded-pill bg-primary">
                    Coming Soon
                </span>
            </a>
            <a class="outer-Border-Article col-lg-3 d-lg-inline d-none pb-2 text-decoration-none" href="" data-aos="zoom-out-up">
                <img src="assets/img/disneyRapunzel-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Rapunzel" />
                <div class="d-flex justify-content-between text-center">
                    <div class="inner-Border-Name col-9 mx-auto align-items-center justify-content-center p-xl-2 p-1">
                        <p>Rapunzel</p>
                    </div>

                </div>
                <span class="position-absolute top-0 start-0 fs-6 translate-middle badge rounded-pill bg-primary">
                    Coming Soon
                </span>
            </a>
        </div>
        <!------------------------------------------------------- deuxieme Ligne ---------------------------------------------------------------------->
        <div class="row justify-content-lg-between justify-content-center px-lg-4 mx-sm-5 mx-4">
            <a class="outer-Border-Article col-10 col-sm-5 col-lg-3 pb-2 text-decoration-none mb-sm-0 mb-3" href="" data-aos="zoom-out-up">
                <img src="assets/img/simpsonItchy.png" class="w-100 h-75 inner-Border-Article my-2" alt="Itchy" />
                <div class="d-flex justify-content-between text-center">
                    <div class="inner-Border-Name col-9 mt-sm mt-2 mx-auto align-items-center justify-content-center p-xl-2 p-md-1">
                        <p>Itchy</p>
                    </div>
                </div>
                <span class="position-absolute top-0 start-0 fs-6 translate-middle badge rounded-pill bg-primary">
                    Coming Soon
                </span>
            </a>
            <a class="outer-Border-Article col-10 col-sm-5 col-lg-3 pb-2 ms-sm-3 ms-lg-0  text-decoration-none" href="" data-aos="zoom-out-up">
                <img src="assets/img/gokuUltraInstint-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Goku ultra instinct" />
                <div class="d-flex justify-content-between text-center align-items-center">
                    <div class="inner-Border-Name col-9 mt-sm mt-2 mx-auto align-items-center justify-content-center p-xl-2 p-1">
                        <p>Goku Ultra Instinct</p>
                    </div>

                </div>
                <span class="position-absolute top-0 start-0 fs-6 translate-middle badge rounded-pill bg-primary">
                    Coming Soon
                </span>
            </a>
            <a class="outer-Border-Article col-lg-3 d-lg-inline d-none pb-2 text-decoration-none" href="" data-aos="zoom-out-up">
                <img src="assets/img/disneyRapunzel-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Rapunzel" />
                <div class="d-flex justify-content-between text-center">
                    <div class="inner-Border-Name col-9 mx-auto align-items-center justify-content-center p-xl-2 p-1">
                        <p>Rapunzel</p>
                    </div>

                </div>
                <span class="position-absolute top-0 start-0 fs-6 translate-middle badge rounded-pill bg-primary">
                    Coming Soon
                </span>
            </a>
        </div>
        <!------------------------------------------------------- troisieme Ligne ---------------------------------------------------------------------->
        <div class="row justify-content-lg-between justify-content-center px-lg-4 mx-sm-5 mx-4">
            <a class="outer-Border-Article col-10 col-sm-5 col-lg-3 pb-2 text-decoration-none mb-sm-0 mb-3" href="" data-aos="zoom-out-up">
                <img src="assets/img/simpsonItchy.png" class="w-100 h-75 inner-Border-Article my-2" alt="Itchy" />
                <div class="d-flex justify-content-between text-center">
                    <div class="inner-Border-Name col-9 mt-sm mt-2 mx-auto align-items-center justify-content-center p-xl-2 p-md-1">
                        <p>Itchy</p>
                    </div>
                </div>
                <span class="position-absolute top-0 start-0 fs-6 translate-middle badge rounded-pill bg-primary">
                    Coming Soon
                </span>
            </a>
            <a class="outer-Border-Article col-10 col-sm-5 col-lg-3 pb-2 ms-sm-3 ms-lg-0  text-decoration-none" href="" data-aos="zoom-out-up">
                <img src="assets/img/gokuUltraInstint-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Goku ultra instinct" />
                <div class="d-flex justify-content-between text-center align-items-center">
                    <div class="inner-Border-Name col-9 mt-sm mt-2 mx-auto align-items-center justify-content-center p-xl-2 p-1">
                        <p>Goku Ultra Instinct</p>
                    </div>

                </div>
                <span class="position-absolute top-0 start-0 fs-6 translate-middle badge rounded-pill bg-primary">
                    Coming Soon
                </span>
            </a>
            <a class="outer-Border-Article col-lg-3 d-lg-inline d-none pb-2 text-decoration-none" href="" data-aos="zoom-out-up">
                <img src="assets/img/disneyRapunzel-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Rapunzel" />
                <div class="d-flex justify-content-between text-center">
                    <div class="inner-Border-Name col-9 mx-auto align-items-center justify-content-center p-xl-2 p-1">
                        <p>Rapunzel</p>
                    </div>

                </div>
                <span class="position-absolute top-0 start-0 fs-6 translate-middle badge rounded-pill bg-primary">
                    Coming Soon
                </span>
            </a>
        </div>
        <!------------------------------------------------------- quatrieme Ligne ---------------------------------------------------------------------->
        <div class="row justify-content-lg-between justify-content-center px-lg-4 mx-sm-5 mx-4">
            <a class="outer-Border-Article col-10 col-sm-5 col-lg-3 pb-2 text-decoration-none mb-sm-0 mb-3" href="" data-aos="zoom-out-up">
                <img src="assets/img/simpsonItchy.png" class="w-100 h-75 inner-Border-Article my-2" alt="Itchy" />
                <div class="d-flex justify-content-between text-center">
                    <div class="inner-Border-Name col-9 mt-sm mt-2 mx-auto align-items-center justify-content-center p-xl-2 p-md-1">
                        <p>Itchy</p>
                    </div>
                </div>
                <span class="position-absolute top-0 start-0 fs-6 translate-middle badge rounded-pill bg-primary">
                    Coming Soon
                </span>
            </a>
            <a class="outer-Border-Article col-10 col-sm-5 col-lg-3 pb-2 ms-sm-3 ms-lg-0  text-decoration-none" href="" data-aos="zoom-out-up">
                <img src="assets/img/gokuUltraInstint-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Goku ultra instinct" />
                <div class="d-flex justify-content-between text-center align-items-center">
                    <div class="inner-Border-Name col-9 mt-sm mt-2 mx-auto align-items-center justify-content-center p-xl-2 p-1">
                        <p>Goku Ultra Instinct</p>
                    </div>

                </div>
                <span class="position-absolute top-0 start-0 fs-6 translate-middle badge rounded-pill bg-primary">
                    Coming Soon
                </span>
            </a>
            <a class="outer-Border-Article col-lg-3 d-lg-inline d-none pb-2 text-decoration-none" href="" data-aos="zoom-out-up">
                <img src="assets/img/disneyRapunzel-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Rapunzel" />
                <div class="d-flex justify-content-between text-center">
                    <div class="inner-Border-Name col-9 mx-auto align-items-center justify-content-center p-xl-2 p-1">
                        <p>Rapunzel</p>
                    </div>

                </div>
                <span class="position-absolute top-0 start-0 fs-6 translate-middle badge rounded-pill bg-primary">
                    Coming Soon
                </span>
            </a>
        </div>
        <!------------------------------------------------------- Pagination Bottom ---------------------------------------------------------------------->
        <div class="row me-md-2">
            <nav class="col" aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <button class="page-link btn btn-light" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </button>
                    </li>
                    <li class="page-item"><button class="page-link btn btn-light" href="#">1</button></li>
                    <li class="page-item"><button class="page-link btn btn-light" href="#">2</button></li>
                    <li class="page-item">
                        <button class="page-link btn btn-light" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php require_once 'include/footer.php'; ?>