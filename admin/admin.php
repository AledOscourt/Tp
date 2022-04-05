<?php
session_start();
if(!$_SESSION && $_SESSION['user']->id_roles != 1){
    header('Location: Accueil');
exit;
}
$pagesTitle = 'Dashboard';
require_once '../models/database.php';
require_once '../models/usersModel.php';
require_once '../models/offersModel.php';
require_once 'controllers/adminDashboardController.php';
require_once '../include/header.php';

?>


<div class="container-fluid my-md-5 py-3 shadow-lg">
    <div class="row mb-3">
        <h2 class="text-center pagesTitles text-white ">DashBoard</h2>
    </div>
    <div class="row">
        <?php require_once '../include/adminSidebar.php'; ?>
    </div>
    <div class="row d-md-flex gap-md-3 mx-md-2 my-3">
        <div class="col-lg border border-2 border-dark">
            <div class="d-flex align-items-center mt-2">
                <p class="col text-center my-0 me-auto h5 text-white">Nouvels&nbsp;utilisateurs</p><a class="col-auto btn btn-outline-info text-decoration-none" href="/TP/admin_liste_users">Voir plus</a>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-hover table-striped tableAdmin tableDashboard">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pseudo</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="text-center">Nombre&nbsp;de&nbsp;signalement&nbsp;reçue</th>
                            <th scope="col">Nombre&nbsp;d'avis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($newUsersList as $users) { ?>
                            <tr>
                                <th class="align-middle" scope="row"><?= $users->id; ?></th>
                                <td class="align-middle"><?= $users->userName; ?></td>
                                <td class="align-middle"><?= $users->email; ?></td>
                                <td class="text-center align-middle"><?= $users->nbrReportsTaken; ?></td>
                                <td class="text-center align-middle"><?= $users->nbrOpinions; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg border border-2 border-dark">
            <div class="d-flex align-items-center mt-2">
                <p class="col text-center my-0 me-auto h5 text-white">Nouvelles&nbsp;offres</p><a class="col-auto btn btn-outline-info text-decoration-none" href="/TP/admin_liste_offres">Voir plus</a>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-hover table-striped tableAdmin tableDashboard">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom&nbsp;d'une&nbsp;Pop</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Référence</th>
                            <th scope="col">Catégorie</th>
                            <th scope="col">Franchise</th>
                            <th scope="col">Exclusivité</th>
                            <th scope="col">Prix</th>
                            <th scope="col">nbr&nbsp;de&nbsp;click</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($offersList as $offers) { ?>
                        <tr>
                            <th scope="row" class="align-middle"><?= $offers->id; ?></th>
                            <td class="align-middle"><?= $offers->name; ?></td>
                            <td class="align-middle"><?= $offers->tags; ?></td>
                            <td class="align-middle text-center"><?= $offers->reference; ?></td>
                            <td class="align-middle"><?= $offers->cName; ?></td>
                            <td class="align-middle"><?= $offers->bName; ?></td>
                            <td class="align-middle"><?= $offers->excluName; ?></td>
                            <td class="align-middle"><?= $offers->price; ?></td>
                            <td class="text-center align-middle"><?= $offers->nbrClick; ?></td>
                        </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row d-md-flex gap-md-3 mx-md-1 my-3">
        <div class="col-md">
            <canvas id="chartUsers"></canvas>
        </div>
        <div class="col-md">
            <canvas id="chartOffers"></canvas>
        </div>
    </div>
</div>

<?php require_once '../include/footer.php'; ?>