<?php
session_start();
require_once '../models/database.php';
require_once 'models/categoryModel.php';
require_once 'controllers/addcategoryController.php';
require_once '../include/header.php'; 
?>


<div class="container my-5 py-3 shadow-lg bg-dark">
    <div class="row mb-3">
        <h2 class="text-center pagesTitles text-white ">Ajouter&nbsp;une&nbsp;categorie</h2>
    </div>
    <div class="row">
        <?php require_once '../include/adminSidebar.php'; ?>
    </div>
    <form class="row my-3 gap-3" method="POST" action="admin_ajout_categorie" enctype="multipart/form-data">

        <div class="d-md-flex justify-content-center">
            <div class="col-md-8 my-md-5 my-3  form-floating">
                <input class="form-control <?= isset($formErrors['categoryInput']) ? 'is-invalid' : '' ?>" type="text" name="categoryInput" id="categoryInput" placeholder=" ">
                <label class="ms-3 text-white" for="categoryInput">Catégorie</label>
                <?php if (isset($formErrors['categoryInput'])) { ?>
                    <p class="invalid-feedback text-center"> <?= $formErrors['categoryInput'] ?> </p>
                <?php } ?>
            </div>
        </div>
        <div class="row mx-lg-5 mx-2 justify-content-around">
            <a type="button" class="btn btn-outline-secondary col-lg-3 col-5" href="/TP/admin_liste_categorie">Annuler</a>
            <button type="submit" class="btn btn-outline-primary col-lg-3 col-5">Confirmer</button>
        </div>
    </form>

</div>
<?php require_once '../include/footer.php'; ?>