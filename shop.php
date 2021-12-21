
<?php include('assets/template/header.php');?>
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
        <div class="row">
            <!------------------------------------------------------- formulaire des choix ---------------------------------------------------------------------->
            <form class="col-md-3 ms-md-5 bg-dark my-md-0 mb-4">
                <!------------------------------------------------------- type d'annonce ---------------------------------------------------------------------->
                <fieldset class=" d-grid mt-4 mx-3">
                    <legend class="text-center">
                        <button class="btn btn-outline-light text-center" id="TypeOfShopButton" type="button" data-bs-toggle="collapse" href="#collapseTypeOf" role="button" aria-expanded="false" aria-controls="collapseTypeOf">
                            Type d'annonce
                        </button>
                    </legend>
                    <select class=" btn btn-primary form-select mt-3 mx-auto collapse show animate__animated animate__fadeIn animate__slower w-50" id="collapseTypeOf">
                        <option selected> Vente Direct </option>
                        <option> Enchère </option>
                    </select>
                </fieldset>
                <!------------------------------------------------------- category ---------------------------------------------------------------------->
                <fieldset class="d-grid mt-4 mx-3">
                    <legend class="text-center">
                        <button class="btn btn-outline-light text-center" id="categoryShopButton" type="button" data-bs-toggle="collapse" href="#collapseCategory" role="button" aria-expanded="false" aria-controls="collapseCategory">
                        Category
                      </button>
                    </legend>
                    <ul class="form-check mx-3 collapse show animate__animated animate__fadeIn animate__slower" id="collapseCategory">
                    </ul>
                </fieldset>
                <!------------------------------------------------------- franchise ---------------------------------------------------------------------->
                <fieldset class="d-grid my-4 mx-3">
                    <legend class="text-center">
                        <button class="btn btn-outline-light text-center" id="brandShopButton" type="button" data-bs-toggle="collapse" href="#collapseBrand" role="button" aria-expanded="false" aria-controls="collapseBrand">
                        Franchise
                      </button>
                    </legend>
                    <ul class="form-check mx-3 collapse show animate__animated animate__fadeIn animate__slower" id="collapseBrand">
                    </ul>
                </fieldset>
                <!------------------------------------------------------- Exclusivité ---------------------------------------------------------------------->
                <fieldset class="d-grid my-4 mx-3">
                    <legend class="text-center">
                        <button class="btn btn-outline-light text-center" id="exclusivityShopButton" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExclusivity" role="button" aria-expanded="false" aria-controls="collapseExclusivity">
                        Exclusivité
                      </button>
                    </legend>
                    <ul class="form-check mx-3 collapse show animate__animated animate__fadeIn animate__slower" id="collapseExclusivity">
                    </ul>
                </fieldset>
                <!------------------------------------------------------- Prix ---------------------------------------------------------------------->
                <fieldset class="d-grid my-4 mx-3">
                    <legend class="text-center">
                        <button class="btn btn-outline-light text-center" id="priceShopButton" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrice" role="button" aria-expanded="false" aria-controls="collapsePrice">
                        Prix
                      </button>
                    </legend>
                    <ul class="mx-3 collapse show animate__animated animate__fadeIn animate__slower" id="collapsePrice">
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
            </form>
            <div class="d-grid col">
                <!------------------------------------------------------- pagination top ---------------------------------------------------------------------->
                <div class="row me-md-2 mt-2">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                                <button class="page-link btn btn-light" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </button>
                            </li>
                            <li class="page-item active"><button class="page-link btn btn-light" href="#">1</button></li>
                            <li class="page-item"><button class="page-link btn btn-light" href="#">2</button></li>
                            <li class="page-item"><button class="page-link btn btn-light" href="#">3</button></li>
                            <li class="page-item">
                                <button class="page-link btn btn-light" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </button>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!------------------------------------------------------- articles ---------------------------------------------------------------------->
                <div class="col-md animate__animated animate__fadeIn animate__slower container-fluid product d-grid gap-3 position-relative">
                    <!------------------------------------------------------- premiere Ligne ---------------------------------------------------------------------->
                    <div class="row justify-content-lg-between justify-content-center px-lg-4 ">
                        <!------------------------------------------------------- premiere article ---------------------------------------------------------------------->
                        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-2 text-decoration-none mb-sm-0 mb-3" href="" data-aos="zoom-out-up">
                            <img src="assets/img/simpsonItchy.png" class="w-100 h-75 inner-Border-Article my-2" alt="Itchy" />
                            <div class="d-flex justify-content-between text-center">
                                <div class="inner-Border-Name col-7 col-sm-8 col-md-7 align-items-center justify-content-center p-xl-2 p-md-1">
                                    <p>Itchy</p>
                                </div>
                                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                                    <p>14.99€</p>
                                </div>
                            </div>
                        </a>
                        <!------------------------------------------------------- deuxieme article ---------------------------------------------------------------------->
                        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-2 ms-sm-3 ms-lg-0  text-decoration-none" href="" data-aos="zoom-out-up">
                            <img src="assets/img/gokuUltraInstint-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Goku ultra instinct" />
                            <div class="d-flex justify-content-between text-center align-items-center">
                                <div class="inner-Border-Name col-9 align-items-center justify-content-center p-xl-2 p-1">
                                    <p>Goku Ultra Instinct</p>
                                </div>
                                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-1">
                                    <p>14.99€</p>
                                </div>
                            </div>
                        </a>
                        <!------------------------------------------------------- troisième article ---------------------------------------------------------------------->
                        <a class="outer-Border-Article col-lg-3 d-lg-inline d-none pb-2 text-decoration-none" href="" data-aos="zoom-out-up">
                            <img src="assets/img/disneyRapunzel.png" class="w-100 h-75 inner-Border-Article my-2" alt="Rapunzel" />
                            <div class="d-flex justify-content-between text-center">
                                <div class="inner-Border-Name col-7  align-items-center justify-content-center p-xl-2 p-1">
                                    <p>Rapunzel</p>
                                </div>
                                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                                    <p>14.99€</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!------------------------------------------------------- deuxieme Ligne ---------------------------------------------------------------------->
                    <div class="row justify-content-lg-between justify-content-center px-lg-4">
                        <!------------------------------------------------------- premiere article ---------------------------------------------------------------------->
                        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-2  text-decoration-none mb-sm-0 mb-3" href="" data-aos="zoom-out-up">
                            <img src="assets/img/simpsonItchy.png" class="w-100 h-75 inner-Border-Article my-2" alt="Itchy" />
                            <div class="d-flex justify-content-between text-center">
                                <div class="inner-Border-Name col-7 col-sm-8 col-md-7 align-items-center justify-content-center p-xl-2 p-md-1">
                                    <p>Itchy</p>
                                </div>
                                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                                    <p>14.99€</p>
                                </div>
                            </div>
                        </a>
                        <!------------------------------------------------------- deuxieme article ---------------------------------------------------------------------->
                        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-2 ms-sm-3 ms-lg-0  text-decoration-none" href="" data-aos="zoom-out-up">
                            <img src="assets/img/gokuUltraInstint-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Goku ultra instinct" />
                            <div class="d-flex justify-content-between text-center align-items-center">
                                <div class="inner-Border-Name col-9  align-items-center justify-content-center p-xl-2 p-1">
                                    <p>Goku Ultra Instinct</p>
                                </div>
                                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-1">
                                    <p>14.99€</p>
                                </div>
                            </div>
                        </a>
                        <!------------------------------------------------------- troisième article ---------------------------------------------------------------------->
                        <a class="outer-Border-Article col-lg-3 d-lg-inline d-none pb-2 text-decoration-none" href="" data-aos="zoom-out-up">
                            <img src="assets/img/disneyRapunzel.png" class="w-100 h-75 inner-Border-Article my-2" alt="Rapunzel" />
                            <div class="d-flex justify-content-between text-center">
                                <div class="inner-Border-Name col-7  align-items-center justify-content-center p-xl-2 p-1">
                                    <p>Rapunzel</p>
                                </div>
                                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                                    <p>14.99€</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!------------------------------------------------------- troisième Ligne ---------------------------------------------------------------------->
                    <div class="row justify-content-lg-between justify-content-center px-lg-4">
                        <!------------------------------------------------------- première article ---------------------------------------------------------------------->
                        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-2  text-decoration-none mb-sm-0 mb-3" href="" data-aos="zoom-out-up">
                            <img src="assets/img/simpsonItchy.png" class="w-100 h-75 inner-Border-Article my-2" alt="Itchy" />
                            <div class="d-flex justify-content-between text-center">
                                <div class="inner-Border-Name col-7 col-sm-8 col-md-7 align-items-center justify-content-center p-xl-2 p-md-1">
                                    <p>Itchy</p>
                                </div>
                                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                                    <p>14.99€</p>
                                </div>
                            </div>
                        </a>
                        <!------------------------------------------------------- deuxieme article ---------------------------------------------------------------------->
                        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-2 ms-sm-3 ms-lg-0  text-decoration-none" href="" data-aos="zoom-out-up">
                            <img src="assets/img/gokuUltraInstint-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Goku ultra instinct" />
                            <div class="d-flex justify-content-between text-center align-items-center">
                                <div class="inner-Border-Name col-9  align-items-center justify-content-center p-xl-2 p-1">
                                    <p>Goku Ultra Instinct</p>
                                </div>
                                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-1">
                                    <p>14.99€</p>
                                </div>
                            </div>
                        </a>
                        <!------------------------------------------------------- troisième article ---------------------------------------------------------------------->
                        <a class="outer-Border-Article col-lg-3 d-lg-inline d-none pb-2 text-decoration-none" href="" data-aos="zoom-out-up">
                            <img src="assets/img/disneyRapunzel.png" class="w-100 h-75 inner-Border-Article my-2" alt="Rapunzel" />
                            <div class="d-flex justify-content-between text-center">
                                <div class="inner-Border-Name col-7  align-items-center justify-content-center p-xl-2 p-1">
                                    <p>Rapunzel</p>
                                </div>
                                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                                    <p>14.99€</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!------------------------------------------------------- quatrieme Ligne ---------------------------------------------------------------------->
                    <div class="row justify-content-lg-between justify-content-center px-lg-4">
                        <!------------------------------------------------------- premiere article ---------------------------------------------------------------------->
                        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-2 text-decoration-none mb-sm-0 mb-3" href="" data-aos="zoom-out-up">
                            <img src="assets/img/simpsonItchy.png" class="w-100 h-75 inner-Border-Article my-2" alt="Itchy" />
                            <div class="d-flex justify-content-between text-center">
                                <div class="inner-Border-Name col-7 col-sm-8 col-md-7 align-items-center justify-content-center p-xl-2 p-md-1">
                                    <p>Itchy</p>
                                </div>
                                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                                    <p>14.99€</p>
                                </div>
                            </div>
                        </a>
                        <!------------------------------------------------------- deuxieme article ---------------------------------------------------------------------->
                        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-2 ms-sm-3 ms-lg-0  text-decoration-none" href="" data-aos="zoom-out-up">
                            <img src="assets/img/gokuUltraInstint-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Goku ultra instinct" />
                            <div class="d-flex justify-content-between text-center align-items-center">
                                <div class="inner-Border-Name col-9 align-items-center justify-content-center p-xl-2 p-1">
                                    <p>Goku Ultra Instinct</p>
                                </div>
                                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-1">
                                    <p>14.99€</p>
                                </div>
                            </div>
                        </a>
                        <!------------------------------------------------------- troisième article ---------------------------------------------------------------------->
                        <a class="outer-Border-Article col-lg-3 d-lg-inline d-none pb-2 text-decoration-none" href="" data-aos="zoom-out-up">
                            <img src="assets/img/disneyRapunzel.png" class="w-100 h-75 inner-Border-Article my-2" alt="Rapunzel" />
                            <div class="d-flex justify-content-between text-center">
                                <div class="inner-Border-Name col-7  align-items-center justify-content-center p-xl-2 p-1">
                                    <p>Rapunzel</p>
                                </div>
                                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                                    <p>14.99€</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!------------------------------------------------------- cinquieme Ligne ---------------------------------------------------------------------->
                    <div class="row justify-content-lg-between justify-content-center px-lg-4">
                        <!------------------------------------------------------- premiere article ---------------------------------------------------------------------->
                        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-2 text-decoration-none mb-sm-0 mb-3" href="" data-aos="zoom-out-up">
                            <img src="assets/img/simpsonItchy.png" class="w-100 h-75 inner-Border-Article my-2" alt="Itchy" />
                            <div class="d-flex justify-content-between text-center">
                                <div class="inner-Border-Name col-7 col-sm-8 col-md-7 align-items-center justify-content-center p-xl-2 p-md-1">
                                    <p>Itchy</p>
                                </div>
                                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                                    <p>14.99€</p>
                                </div>
                            </div>
                        </a>
                        <!------------------------------------------------------- deuxieme article ---------------------------------------------------------------------->
                        <a class="outer-Border-Article col-9 col-sm-5 col-lg-3 pb-2 ms-sm-3 ms-lg-0  text-decoration-none" href="" data-aos="zoom-out-up">
                            <img src="assets/img/gokuUltraInstint-removebg-preview.png" class="w-100 h-75 inner-Border-Article my-2" alt="Goku ultra instinct" />
                            <div class="d-flex justify-content-between text-center align-items-center">
                                <div class="inner-Border-Name col-9 align-items-center justify-content-center p-xl-2 p-1">
                                    <p>Goku Ultra Instinct</p>
                                </div>
                                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-1">
                                    <p>14.99€</p>
                                </div>
                            </div>
                        </a>
                        <!------------------------------------------------------- troisième article ---------------------------------------------------------------------->
                        <a class="outer-Border-Article col-lg-3 d-lg-inline d-none pb-2 text-decoration-none" href="" data-aos="zoom-out-up">
                            <img src="assets/img/disneyRapunzel.png" class="w-100 h-75 inner-Border-Article my-2" alt="Rapunzel" />
                            <div class="d-flex justify-content-between text-center">
                                <div class="inner-Border-Name col-7  align-items-center justify-content-center p-xl-2 p-1">
                                    <p>Rapunzel</p>
                                </div>
                                <div class="inner-Border-Price  col-auto align-items-center justify-content-center p-xl-2 p-1">
                                    <p>14.99€</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!------------------------------------------------------- pagination bottom ---------------------------------------------------------------------->
                <div class="row me-md-2 mt-3">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                                <button class="page-link btn btn-light" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </button>
                            </li>
                            <li class="page-item active"><button class="page-link btn btn-light" href="#">1</button></li>
                            <li class="page-item"><button class="page-link btn btn-light" href="#">2</button></li>
                            <li class="page-item"><button class="page-link btn btn-light" href="#">3</button></li>
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
    </div>

    
<?php include('assets/template/footer.php');?>