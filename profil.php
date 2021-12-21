
<?php include('assets/template/headerLogIn.php');?>
      <!-- ********************************************************************************************************************************************* 
     ********************************************************************** Profil *********************************************************************** 
     ********************************************************************************************************************************************* -->
     <div class="container mb-5">
         <div class="row d-md-none d-flex justify-content-end">
         <div class="col-2 justify-content-end me-2">
            <button class="btn btn-outline-primary position-absolute mt-4 me-4" data-bs-toggle="modal" data-bs-target="#myAccountPseudoAndImageModal">
                <i class="far fa-edit"></i>
            </button>
         </div>
         </div>
          <!-------------------------------------------------------------------- My Account Profil -------------------------------------------->
        <div class="row">
            <div class="col-md-4 col justify-content-center text-center">
                <img src="assets/img/drapeauFrance.jpeg" class="rounded-circle mt-4 my-md-4 myAccountProfilPhoto" id="myAccountImageProfil" alt="profilPhoto">
            </div>
            <div class="col-md-6 col-12 d-grid my-auto">
                <h3 class="text-center mt-5 text-white" id="myAccountPseudo"> Pseudo </h3>
            </div>
            <div class="col-md-2 d-md-flex d-none justify-content-end">
            <button class="btn btn-outline-primary position-absolute mt-3" data-bs-toggle="modal" data-bs-target="#myAccountPseudoAndImageModal">
                <i class="far fa-edit"></i>
            </button>
            </div>
        </div>
        <!-------------------------------------------------------------------- My Account Nav -------------------------------------------->
        <div class="row">
            <div class="container-fluid p-3 border border-1 border-primary">
                <div class="row py-3 mx-md-5 justify-content-between border-bottom border-1 border-light gap-3">
                    <button class="btn btn-outline-secondary col-md-3 active" id="myAccountCoordinateBtn"> Coordonnée </button>
                    <button class="btn btn-outline-secondary col-md-3" id="myAccountSellOrdersBtn"> Ordres de vente </button>
                    <a class="btn btn-outline-secondary col-md-3" href="envyList.php"> Liste d'envie </a>
                </div>
                <!-------------------------------------------------------------------- My Account Contact  -------------------------------------------->
                <div class="row my-5 justify-content-between" id="myAccountConctact">
                    <div class="container d-grid gap-4">
                        <div class="row">
                            <h3 class="col-md-11 col-10 text-center text-white">Contact</h3>
                            <div class="col-1 d-inline justify-content-center">
                                <button class="btn btn-outline-primary position-absolute" data-bs-toggle="modal" data-bs-target="#myAccountContactModal">
                                    <i class="far fa-edit"></i>
                                </button>
                            </div>
                            <div class="container mx-md-5 gap-3">
                                <div class="row mt-2 mx-md-5">
                                    <div class="col-md-3">
                                        <h4 class="text-primary">Adresse de messagerie : </h4>
                                    </div> 
                                    <div class="col-md-4 ">
                                        <p class="fs-5" id="myAccountEmail">jcfxjcfjcf.qsvsqfqsv@gmail.com</p>
                                    </div> 
                                </div> 
                                <div class="row mx-md-5">
                                    <div class="col-md-3">
                                        <h4 class="text-primary">Numéro de téléphone : </h4>
                                    </div> 
                                    <div class="col-md-4 ">
                                        <p class="fs-5" id="myAccountPhone">0602021022</p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-------------------------------------------------------------------- My Account Orders  -------------------------------------------->
                <div class="row mt-5 justify-content-between d-none" id="myAccountOrders">
                    <div class="container-fluid d-grid gap-4">
                        <div class="row">
                            <h3 class="col-md-11 col-10 text-center text-white">Ordres de vente</h3>
                            <div class="col-1 d-inline justify-content-center">
                                <button class="btn btn-outline-primary position-absolute" id="ordersBtn">
                                <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container-fluid">
                                <ul class="me-4" id="ordersList">
                                    <li class="row mx-md-5 border border-1 border-secondary rounded py-3 myAccountOffers">
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
                                        <div class="col-12 text-end">
                                            <a class="text-danger"><small>supprimer</small></a>
                                        </div>  
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ********************************************************************************************************************************************
     *************************************************************************************************************************************************
     ********************************************************************************************************************************************* -->

 <!-- ********************************************************************************************************************************************* 
     ********************************************************************** Modal *********************************************************************** 
     ********************************************************************************************************************************************* -->
     <!-------------------------------------------------------------------- Modal pseudo + photo -------------------------------------------->

    <div class="modal fade" id="myAccountPseudoAndImageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myAccountContactModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark">
                    <div class="container">
                        <div class="row">
                            <h3 class="mt-2 text-center" id="staticBackdropLabel">Modification</h3>
                        </div>
                    </div>
                    <div class="modal-body container">
                        <div class="row">
                            <form class="container d-grid gap-4" method="post" action="#">
                                <fieldset class="row">
                                    <div class="col-md-9 col-11 border border-bottom border-light mx-auto">
                                    <label for="myAccountProfilImage" class="form-label">Image de profil</label>
                                        <input class="form-control" type="file" name="myAccountProfilImage" id="myAccountProfilImage" accept=".png, .jpg, .jpeg" />
                                    </div>
                                </fieldset>
                                <fieldset class="row">
                                <div class="col-md-9 col-11 border border-bottom border-light mx-auto form-floating">
                                        <input class="form-control" type="text" name="myAccountProfilPseudo" id="myAccountProfilPseudo" placeholder="#" />
                                        <label class="ms-3" for="myAccountProfilPseudo">Pseudo</label>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-outline-secondary ms-md-5 ms-2 me-auto" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-outline-primary me-md-5 me-2" id="myAccountModalProfil" >Confirmer</button>
                    </div>
                </div>
            </div>
        </div>

    <!-------------------------------------------------------------------- Modal Contact -------------------------------------------->

    <div class="modal fade" id="myAccountContactModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myAccountContactModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark">
                    <div class="container">
                        <div class="row">
                            <h3 class="mt-2 text-center" id="staticBackdropLabel">Modification</h3>
                        </div>
                    </div>
                    <div class="modal-body container">
                        <div class="row">
                            <form class="container d-grid gap-4" method="post" action="#">
                                <fieldset class="row">
                                    <div class="col-md-9 col-11 border border-bottom border-light mx-auto form-floating">
                                        <input class="form-control" type="email" name="myAccountEmailInput" id="myAccountEmailInput" autocomplete="off" placeholder="#">
                                        <label class="ms-3" for="myAccountEmailInput">Adresse de messagerie</label>
                                    </div>
                                </fieldset>
                                <fieldset class="row">
                                <div class="col-md-9 col-11 border border-bottom border-light mx-auto form-floating">
                                        <input class="form-control" type="text" name="myAccountPhoneInput" id="myAccountPhoneInput" autocomplete="off" placeholder="#">
                                        <label class="ms-3" for="myAccountPhoneInput">Numéro de téléphone</label>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-outline-secondary ms-md-5 ms-2 me-auto" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-outline-primary me-md-5 me-2" >Confirmer</button>
                    </div>
                </div>
            </div>
        </div>
        
     <!-- ********************************************************************************************************************************************
     *************************************************************************************************************************************************
     ********************************************************************************************************************************************* -->
<?php include('assets/template/footerLogIn.php');?>