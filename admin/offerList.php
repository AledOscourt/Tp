<?php
session_start();
if($_SESSION['user']->id_roles != 1 & !$_SESSION){
    header('Location: Accueil');
exit;
}
$pagesTitle = 'Liste des offres';
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
                            <th scope="col">Voir</th>
                            <th scope="col">Modif</th>
                            <th scope="col">Suppr</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">172</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td class="text-center">4</td>
                            <td class="text-center">10$</td>
                            <td><i class="far fa-eye text-info fs-4"></i></td>
                            <td><i class="fas fa-user-cog text-warning fs-4 ms-1"></i></td>
                            <td><i class="fas fa-trash text-danger fs-4 ms-2"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

<?php require_once '../include/footer.php'; ?>