<?php include('assets/template/headerLogIn.php');?>
     <!--**********************************************************************Profil*********************************************************************** -->
     <div class="container">
          <!-------------------------------------------------------------------- My Account Profil -------------------------------------------->
        <div class="row">
            <div class="col-md-4 col-10">
                <img src="assets/img/Facebook.png" class="rounded-circle h-75 mt-4 my-md-4" alt="profilPhoto">
            </div>
            <div class="col-md-0 col-2 d-md-none d-flex justify-content-end">
            <button class="btn btn-outline-primary position-absolute mt-4 me-2">
                <i class="far fa-edit"></i>
            </button>
            </div>
            <div class="col-md-6 col-12 d-grid my-auto">
                <h3 class="text-center mt-md-5 text-white"> Pseudo </h3>
                <hr class="border border-1 border-light mb-5" />
            </div>
            <div class="col-md-2 d-md-flex d-none justify-content-end">
            <button class="btn btn-outline-primary position-absolute mt-3">
                <i class="far fa-edit"></i>
            </button>
            </div>
        </div>
        <!-------------------------------------------------------------------- My Account Nav -------------------------------------------->
        <div class="row">
            <div class="container-fluid p-3 border border-1 border-light">
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
                                <button class="btn btn-outline-primary position-absolute">
                                    <i class="far fa-edit"></i>
                                </button>
                            </div>
                            <div class="container mx-md-5 gap-3">
                                <div class="row mt-2 mx-md-5">
                                    <div class="col-md-3">
                                        <h4 class="text-primary">Adresse de messagerie : </h4>
                                    </div> 
                                    <div class="col-md-4">
                                        <p class="fs-5">jcfxjcfjcf.qsvsqfqsv@gmail.com</p>
                                    </div> 
                                </div> 
                                <div class="row mx-md-5">
                                    <div class="col-md-3">
                                        <h4 class="text-primary">Numéro de téléphone : </h4>
                                    </div> 
                                    <div class="col-md-4">
                                        <p class="fs-5">0602021022</p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h3 class="col-md-11 col-10 text-center text-white">Adresse</h3>
                            <div class="col-1 d-inline justify-content-center">
                                <button class="btn btn-outline-primary position-absolute">
                                    <i class="far fa-edit"></i>
                                </button>
                            </div>
                            <div class="container mx-md-5 gap-3">
                                <div class="row mt-2 mx-md-5">
                                    <div class="col-md-2">
                                        <h4 class="text-primary">Adresse :</h4>
                                    </div> 
                                    <div class="col-md-3">
                                        <p class="fs-5">XX rue XXXXXXXXXXXX</p>
                                    </div> 
                                    <div class="col-md-2">
                                        <h4 class="text-primary">Adresse 2 :</h4>
                                    </div> 
                                    <div class="col-md-3">
                                        <p class="fs-5">Appartement</p>
                                    </div> 
                                </div>
                                <div class="row mt-2 mx-md-5">
                                    <div class="col-md-2">
                                        <h4 class="text-primary">Ville :</h4>
                                    </div> 
                                    <div class="col-md-3">
                                        <p class="fs-5">XXXXXXXXX</p>
                                    </div> 
                                    <div class="col-md-2">
                                        <h4 class="text-primary">Code postale :</h4>
                                    </div> 
                                    <div class="col-md-3">
                                        <p class="fs-5">XXXXX</p>
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
                            <h3 class="col-md-11 col-10 text-center text-primary">Ordres de vente</h3>
                            <div class="col-1 d-inline justify-content-center">
                                <button class="btn btn-outline-primary position-absolute" id="ordersBtn">
                                <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="container-fluid">
                                <ul id="ordersList">
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('assets/template/footerLogIn.php');?>