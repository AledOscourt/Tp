<?php
session_start();
require_once '../models/database.php';
require_once 'models/usersModel.php';
require_once 'controllers/adminGestionControllers.php';
require_once '../include/header.php';
?>


<div class="container-fluid my-5 py-3 shadow-lg">
    <div class="row mb-3">
        <h2 class="text-center pagesTitles text-white ">Liste&nbsp;d'utilisateurs</h2>
    </div>
    <div class="row">
        <?php require_once '../include/adminSidebar.php'; ?>
    </div>
    <div class="row d-md-flex gap-md-3 mx-md-2 my-3">
        <div class="col-lg border border-2 border-dark pt-2" action="usersGestion.php" method="POST">
            <div class="table-responsive tableSeeAll">
                <table class="table table-md table-hover table-striped tableAdmin">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pseudo</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="text-center">role</th>
                            <th scope="col" class="text-center">Nombre&nbsp;de&nbsp;signalement&nbsp;reçue</th>
                            <th scope="col" class="text-center">Nombre&nbsp;de&nbsp;signalement&nbsp;donnée</th>
                            <th scope="col" class="text-center">Nombre&nbsp;d'offre</th>
                            <th scope="col" class="text-center">Nombre&nbsp;d'avis</th>
                            <th scope="col">Suppr</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usersList as $users) { ?>
                            <tr>
                                <th class="align-middle" scope="row"><?= $users->id; ?></th>
                                <td class="align-middle"><?= $users->userName; ?></td>
                                <td class="align-middle"><?= $users->email; ?></td>
                                <td class="text-center align-middle"><?= $users->name; ?></td>
                                <td class="text-center align-middle"><?= $users->nbrReportsTaken; ?></td>
                                <td class="text-center align-middle"><?= $users->nbrReportsGifted; ?></td>
                                <td class="text-center align-middle"> <?= $users->nbrOffer; ?></td>
                                <td class="text-center align-middle"><?= $users->nbrOpinions; ?></td>
                                <td class="align-middle">
                                    <button type="button" class="btn" name="deleteUserBtn" data-bs-whatever="<?= $users->id; ?>" data-bs-toggle="modal" data-bs-target="#deleteAccount"><i class="fas fa-trash text-danger fs-4"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<form method="post" action="admin_liste_users">
    <div class="modal fade" id="deleteAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myAccountContactModalLabel" aria-hidden="true">
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
                        <input type="hidden" value="" name="deleteUser" id="deleteUser">
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