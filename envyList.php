
<?php include('assets/template/headerLogIn.php');?>
     <div class="container">
        <div class="row my-3">
            <div class="col my-2">
                <h2 class="text-center text-white pagesTitles">Liste d'envie</h2>
            </div>
        </div>
         <!--**************************************************** Liste de Produit  ******************************************************************-->
        <div class="row my-3 g-3">
            <ul class="container col-10 mx-auto ">
                <!--***********************------------------------------- Produit --------------------------------------*******************************-->
                <li class="row border border-1 border-secondary rounded productEnvyList">
                  <div class="container my-2 p-2">
                        <div class="row ">
                            <div class="col text-end me-md-4 me-2">
                                <button type="button" class="btn btn-outline-primary ">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            </div>
                        <div class="row p-md-3">
                            <div class="col-md-6">
                                <img src="assets/img/gokuUltraInstint-removebg-preview.png" alt="Goku Ultrra instinct" class="img-fluid w-100">
                            </div>
                            <div class="col-md-5 d-grid gap-1">
                                <h4 class="text-white text-center">
                                    Goku Ultra Instinct
                                </h4>
                                <div class="ms-2 d-grid gap-2">
                                <div class="d-flex fs-5">
                                        <p class="col-auto">Numéro :</p>
                                        <p class="col ms-2">386</p>
                                    </div>
                                    <div class="d-flex fs-5">
                                        <p class="col-auto">Franchise :</p>
                                        <p class="col ms-2">Dragon Ball</p>
                                    </div>
                                    <div class="d-flex fs-5">
                                        <p class="col-auto">Catégorie :</p>
                                        <p class="col ms-2">Anime</p>
                                    </div>
                                    <div class="d-flex fs-5">
                                        <p class="col-auto">Pseudo du vendeur :</p>
                                        <p class="col ms-2">Afsagqs</p>
                                    </div>
                                    <div class="d-flex fs-5">
                                        <p class="col-auto">Référence :</p>
                                        <p class="col ms-2">32855151521</p>
                                    </div>
                                    <div class="d-flex fs-4 mx-auto text-white">
                                        <p class="col-auto">Prix :</p>
                                        <p class="col ms-2">20$</p>
                                    </div>
                                </div>
                                
                            </div>   
                        </div>
                        <div class="row my-3">
                            <button class="col-md-4 col-sm-6 col-8 mx-auto btn btn-outline-primary"> Contacter le vendeur </button>
                        </div>
                    </div>  
                </li>
<!--***********************------------------------------- Fin Produit --------------------------------------*******************************-->
            </ul>
<!--**************************************************** Fin Liste de Produit  ******************************************************************-->
        </div>
     </div>
     <?php include('assets/template/footerLogIn.php');?>