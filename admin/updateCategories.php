<?php
session_start();
if(!$_SESSION && $_SESSION['user']->id_roles != 1){
    header('Location: Accueil');
exit;
}
$pagesTitle = 'Modification de catégorie';

require_once '../models/database.php';
require_once '../models/categoryModel.php';
require_once '../models/categorybrandslinkModel.php';
require_once 'controllers/updateCategoriesController.php';
require_once '../include/header.php'; 

?>


<div class="container my-5 py-3 shadow-lg bg-dark">
    <div class="row mb-3">
        <h2 class="text-center pagesTitles text-white ">Modification&nbsp;de&nbsp;catégorie</h2>
    </div>
    <div class="row">
        <?php require_once '../include/adminSidebar.php'; ?>
    </div>
    <form class="row my-5 gap-5" method="POST" action="admin_modification_categorie_<?= $categories->id; ?>" enctype="multipart/form-data">

        <div class="d-grid gap-3 align-items-center">

            <div class="col-md-8 form-floating mx-auto shadow-lg">
                <input class="form-control <?= isset($formErrors['categoryInput']) ? 'is-invalid' : '' ?>" value="<?= $category->name; ?>" type="text" name="categoryInput" id="categoryInput" placeholder=" ">
                <label class="ms-3 text-white" for="categoryInput">Catégories</label>
                <?php if (isset($formErrors['categoryInput'])) { ?>
                    <p class="invalid-feedback text-center"> <?= $formErrors['categoryInput'] ?> </p>
                <?php } ?>
            </div>
  
        </div>
        <div class="row mx-lg-5 mx-2 justify-content-around">
            <a type="button" class="btn btn-outline-secondary col-lg-3 col-5" href="admin_liste_categorie">Annuler</a>
            <button type="submit" class="btn btn-outline-primary col-lg-3 col-5">Confirmer</button>
        </div>
    </form>

</div>
<?php require_once '../include/footer.php'; ?>