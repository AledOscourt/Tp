<?php
session_start();
require_once '../models/database.php';
require_once 'models/brandsModel.php';
require_once 'models/categoryModel.php';
require_once 'models/categorybrandslinkModel.php';
require_once 'controllers/categoryListController.php';
require_once '../include/header.php'; ?>


<div class="container-fluid my-5 py-3 shadow-lg">
    <div class="row mb-3">
        <h2 class="text-center pagesTitles text-white ">Liste&nbsp;de&nbsp;catégorie</h2>
    </div>
    <div class="row">
        <?php require_once '../include/adminSidebar.php'; ?>
        <a href="admin_ajout_categorie" class="col-auto me-md-3 me-1 btn btn-outline-primary"><i class="fas fa-plus"></i></a>
    </div>
    <div class="row d-md-flex gap-md-3 mx-md-2 my-3">
        <div class="col-lg border border-2 border-dark pt-2">
            <div class="table-responsive tableSeeAll">
                <table class="table table-sm table-hover table-striped tableAdmin ">
                    <thead class="tableHeader">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom&nbsp;de&nbsp;la&nbsp;catégorie</th>
                            <th scope="col">Nombre&nbsp;de&nbsp;franchise&nbsp;associé</th>
                            <th scope="col">Modif</th>
                            <th scope="col">Suppr</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($categoryList as $c) { ?>
                            <tr>
                                <th scope="row"><?= $c->cID; ?></th>
                                <td><?= $c->cName; ?></td>
                                <td><?= $c->bName; ?></td>
                                <td><a href="admin_modification_categorie_<?= $c->cID; ?>"><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></a></td>
                                <td><button type="button" class="btn" data-bs-whatever="<?= $c->cID; ?>" data-bs-toggle="modal" data-bs-target="#deleteCategories"><i class="fas fa-trash text-danger fs-4"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<form method="post" action="admin_liste_categorie">
    <div class="modal fade" id="deleteCategories" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myAccountContactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <div class="container">
                    <div class="row">
                        <h3 class="mt-2 text-center" id="staticBackdropLabel">Suppression</h3>
                    </div>
                </div>
                <div class="modal-body container">
                    <div class="row">
                        <p class="text-center text-white">Voulez-vous supprimer cette utilisateur ?</p>
                        <input type="hidden" value="" name="deleteCategory" id="deleteCategory">
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-outline-secondary ms-md-5 ms-2 me-auto" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-outline-primary me-md-5 me-2">Confirmer</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require_once '../include/footer.php'; ?>