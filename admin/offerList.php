<?php
session_start();
if(!$_SESSION && $_SESSION['user']->id_roles != 1){
    header('Location: Accueil');
exit;
}
$pagesTitle = 'Liste des offres';
require_once '../models/database.php';
require_once '../models/offersModel.php';
require_once 'controllers/offerListController.php';
require_once '../include/header.php';

?>


<div class="container-fluid my-5">
    <div class="row mb-3">
        <h2 class="text-center pagesTitles text-white ">Liste&nbsp;d'offre</h2>
    </div>
    <div class="row">
        <?php require_once '../include/adminSidebar.php'; ?>
    </div>
    <div class="row d-md-flex gap-md-3 mx-md-2 my-3">
        <div class="col-lg border border-2 border-dark pt-2">
            <div class="table-responsive tableSeeAll">
                <table class="table table-sm table-hover table-striped tableAdmin ">
                    <thead class="tableHeader">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pseudo&nbsp;du&nbsp;vendeur</th>
                            <th scope="col">Nom&nbsp;de&nbsp;la&nbsp;pop</th>
                            <th scope="col" class="text-center">Tags</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">Franchise</th>
                            <th scope="col">Exclusivité</th>
                            <th scope="col" class="text-center">Référence</th>
                            <th scope="col" class="text-center">Prix</th>
                            <th scope="col" class="text-center">Nombreux&nbsp;de&nbsp;clic</th>
                            <th scope="col">Voir</th>
                            <th scope="col">Suppr</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($offersList as $o) { ?>
                            <tr>
                                <th scope="row" class="align-middle"><?= $o->id; ?></th>
                                <td class="align-middle"><?= $o->userName; ?></td>
                                <td class="align-middle"><a class="text-white text-decoration-none" href="Article-<?= $o->id; ?>"><?= $o->name; ?></a></td>
                                <td class="text-center align-middle"><a class="text-white text-decoration-none" href="Article-<?= $o->id; ?>"><?= $o->tags; ?></a></td>
                                <td class="align-middle"><?= $o->bName; ?></td>
                                <td class="align-middle"><?= $o->cName; ?></td>
                                <td class="align-middle"><?= $o->excluName; ?></td>
                                <td class="text-center align-middle"><a class="text-white text-decoration-none" href="Article-<?= $o->id; ?>"><?= $o->reference; ?></a></td>
                                <td class="text-center align-middle"><?= $o->price; ?>&nbsp;€</td>
                                <td class="text-center align-middle"><?= $o->nbrClick; ?></td>
                                <td class="align-middle"><a href="Article-<?= $o->id; ?>"><i class="far fa-eye text-info fs-4"></i></a></td>
                                <td class="align-middle"><button type="button" class="btn" data-bs-whatever="<?= $o->id; ?>" data-bs-toggle="modal" data-bs-target="#deleteOffers"><i class="fas fa-trash text-danger fs-4"></i></button>
                                </td>
                            </tr>
                        <?php } ?>                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<form method="post" action="admin_liste_offres">
    <div class="modal fade" id="deleteOffers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myAccountContactModalLabel" aria-hidden="true">
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
                        <input type="hidden" value="" name="deleteOffer" id="deleteOffer">
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