<?php
session_start();
$pagesTitle = 'Page d\'erreur';
require_once 'config.php';
require_once 'include/header.php'; ?>

<div class="conatiner-fluid my-5">
    <div class="row d-flex justify-content-around align-items-center w-100 gap-2">
        <img src="assets/img/Error404Gif.gif" class="img-fluid col-md-3 d-md-flex d-none" alt="anime paper gif">
        <img src="assets/img/anime-paper.gif" class="img-fluid p-0 ms-4 d-md-none" alt="anime paper gif">
        <div class="col-auto d-grid h-100">
            <h2 class=" text-white col pagesTitles text-center">Erreur 404</h2>
            <a class="btn btn-outline-secondary mt-5" href="Accueil">Retour à l'accueil</a>
        </div>
        <img src="assets/img/Error404Gif.gif" class="img-fluid col col-md-3 d-md-flex d-none" alt="anime paper gif">
    </div>
</div>

<?php require_once('include/footer.php'); ?>