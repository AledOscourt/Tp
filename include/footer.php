<footer class="container-fluid bg-dark pt-4">
    <div class="row justify-content-end  mx-md-5 mb-2">
        <?php if (!$_SESSION) { ?>
            <div class="d-md-flex d-none col-7">
                <a class="btn my-auto py-2 col-5 btn-outline-primary me-3" href="Connexion">Connexion</a>
                <a class="btn my-auto py-2 col-5 btn-outline-primary" href="Inscription">Inscription</a>
            </div>
        <?php } ?>



        <div class="col-md-3 me-md-5 col-12 d-flex justify-content-md-end text-decoration-none">
            <a class="réseauxSociaux col-4 text-center" href=""><img class="img-fluid" src="assets/img/Facebook-min.png" title="Facebook" class="" /></a>
            <a class="réseauxSociaux col-4 text-center" href=""><img class="img-fluid" src="assets/img/4102579_applications_instagram_media_social_icon-min.png" title="Instagram" class="" /></a>
            <a class="réseauxSociaux col-4 text-center" href=""><img class="img-fluid" src="assets/img/5296516_tweet_twitter_twitter logo_icon-min.png" title="Twitter" class="" /></a>
        </div>
        <div class="d-flex me-md-4 justify-content-end">
            <hr class="col-lg-3 col-md-4 col socialDivider" />
        </div>
    </div>
    <div class="row ">
        <div class="d-grid col-md mb-md mb-2 gap-1 text-center ">
            <h4 class="fs-5 text-white footerTitle">Aide et Information :</h4>
            <button type="button" class="btn btn-outline-primary">Aide et conseil</button>
            <button type="button" class="btn btn-outline-primary">Nous contacter</button>
        </div>
        <div class="d-grid col-md text-center mb-md mb-2">
            <h4 class="fs-5 text-white footerTitle">Exclusivité</h4>
            <div class="footerLinks d-grid text-white">
                <a class="text-decoration-none text-white" href="#">Géant</a>
                <a class="text-decoration-none text-white" href="#">Mini</a>
                <a class="text-decoration-none text-white" href="#">Rare</a>
                <a class="text-decoration-none text-white" href="#">Perfect</a>
            </div>
        </div>
        <div class="d-grid col-md text-center mb-md mb-2">
            <h4 class="fs-5 text-white footerTitle">Catégorie</h4>
            <div class="footerLinks d-grid">
                <a class="text-decoration-none text-white" href="#">Anime</a>
                <a class="text-decoration-none text-white" href="#">Gaming</a>
                <a class="text-decoration-none text-white" href="#">Dessin anime</a>
                <a class="text-decoration-none text-white" href="Boutique">See All</a>
            </div>
        </div>
        <div class="d-grid col-md text-center mb-md mb-2">
            <h4 class="fs-5 text-white footerTitle">Franchise</h4>
            <div class="footerLinks d-grid">
                <a class="text-decoration-none text-white" href="#">One Piece</a>
                <a class="text-decoration-none text-white" href="#">SNK</a>
                <a class="text-decoration-none text-white" href="#">Simpsons</a>
                <a class="text-decoration-none text-white" href="Boutique">See All</a>
            </div>
        </div>
        <?php if ($_SESSION) { ?>
            <div class="d-grid col-md text-center mb-md mb-2">
                <h4 class="fs-5 text-white footerTitle">Mon compte</h4>
                <div class="footerLinks d-grid">
                    <a class="text-decoration-none text-white" href="Profil">Profil</a>
                    <a class="text-decoration-none text-white" href="Liste_d-envie">Liste d'envie</a>
                    <?php if ($_SESSION['user']->id_roles == 1) { ?>
                        <a class="text-decoration-none text-secondary" href="Dashboard">Dashboard</a>
                    <?php } ?>
                    <a class="text-decoration-none text-danger" href="signOut.php">Deconnexion</a>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="row ">
        <hr class="w-75 socialDivider mx-auto mt-2" />
    </div>
    <div class="row text-center align-items-center d-flex footerLinks">
        <p class="fs-6 col mx-auto"><a class="text-white text-decoration-none" href="#">Mention&nbsp;légale</a></p>
        <p class="fs-4 col-md-6 col-sm-5 mx-auto text-white">© COPYRIGHT PAR JF</p>
        <p class="fs-6 col mx-auto"><a class="text-white text-decoration-none" href="#">Politique&nbsp;de&nbsp;confidentialité</a></p>
    </div>
</footer>
<!--**********************************************************************Script*********************************************************************** -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/17e4bc2abc.js" crossorigin="anonymous"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php if ($_SERVER['PHP_SELF'] == '/TP/shop.php') { ?>
    <script src="assets/js/shop.js"></script>
<?php } else if ($_SERVER['PHP_SELF'] == '/TP/profile.php') { ?>
    <script src="assets/js/account.js"></script>
<?php } else if ($_SERVER['PHP_SELF'] == '/TP/admin/admin.php') { ?>
    <script src="assets/js/admin.js"></script>
<?php } else if ($_SERVER['PHP_SELF'] == '/TP/admin/userGestion.php') { ?>
    <script src="assets/js/userGestion.js"></script>
<?php } else if ($_SERVER['PHP_SELF'] == '/TP/admin/brandsList.php') { ?>
    <script src="assets/js/brandsGestion.js"></script>
<?php } else if ($_SERVER['PHP_SELF'] == '/TP/admin/categoryList.php') { ?>
    <script src="assets/js/categoryGestion.js"></script>
    <?php } else if ($_SERVER['PHP_SELF'] == '/TP/admin/popList.php') { ?>
    <script src="assets/js/popsGestion.js"></script>
<?php } else { ?>
    <script src="assets/js/script.js"></script>
<?php } ?>

</body>

</html>