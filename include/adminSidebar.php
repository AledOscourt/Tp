<button class="btn btn-outline-primary col-xl-4 col-lg-6 col-md-8 col-10 mx-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminSideBar" aria-controls="adminSideBar">Gestionnaire admin</button>

<div class="offcanvas bg-dark offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="adminSideBar" aria-labelledby="adminSideBarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="adminSideBarLabel">Gestionnaire admin</h5>
        <button type="button" class="btn-close text-reset bg-secondary" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="adminSidebar container-fluid d-grid gap-2 my-5">
            <li class="row align-items-center <?= $_SERVER['PHP_SELF'] == '/TP/admin/admin.php' ? 'gestionBtnActive' : '' ?>">
                <a class="text-decoration-none text-white" href="/TP/Dashboard">DashBoard</a>
            </li>
            <li class="row align-items-center <?= $_SERVER['PHP_SELF'] == '/TP/admin/usersGestion.php' ? 'gestionBtnActive' : '' ?>">
                <a class="text-decoration-none text-white " href="/TP/admin_liste_users">Liste d'utilisateur</a>
            </li>
            <li class="row align-items-center <?= $_SERVER['PHP_SELF'] == '/TP/admin/opinionList.php' || $_SERVER['PHP_SELF'] == '/TP/admin/offerList.php' ? 'gestionBtnActive' : '' ?> " data-bs-target="#offerGestion" data-bs-toggle="collapse">
                <a class="text-decoration-none text-white">Gestion des offres</a>
            </li>
            <ul class="collapse adminSubSidebar container-fluid <?= $_SERVER['PHP_SELF'] == '/TP/admin/offerList.php' || $_SERVER['PHP_SELF'] == '/TP/admin/opinionList.php' ? 'show' : '' ?>" id="offerGestion">
                <li class="row p-2 px-3 <?= $_SERVER['PHP_SELF'] == '/TP/admin/offerList.php' ? 'gestionBtnActive' : '' ?>">
                    <a class="text-decoration-none text-white" href="/TP/admin_liste_offres">voir toutes les offres</a>
                </li>
                <li class="row p-2 px-3 <?= $_SERVER['PHP_SELF'] == '/TP/admin/opinionList.php' ? 'gestionBtnActive' : '' ?>">
                    <a class="text-decoration-none text-white" href="/TP/admin_liste_avis">voir tous les avis</a>
                </li>
            </ul>
            <li class="row align-items-center <?= $_SERVER['PHP_SELF'] == '/TP/admin/popList.php' || $_SERVER['PHP_SELF'] == '/TP/admin/addPop.php' ? 'gestionBtnActive' : '' ?>" data-bs-target="#popGestion" data-bs-toggle="collapse">
                <a class="text-decoration-none text-white">Gestion des Pop</a>
            </li>
            <ul class="collapse adminSubSidebar container-fluid <?= $_SERVER['PHP_SELF'] == '/TP/admin/popList.php' || $_SERVER['PHP_SELF'] == '/TP/admin/addPop.php' ? 'show' : '' ?>" id="popGestion">
                <li class="row p-2 px-3 <?= $_SERVER['PHP_SELF'] == '/TP/admin/popList.php' ? 'gestionBtnActive' : '' ?>">
                    <a class="text-decoration-none text-white" href="/TP/admin_liste_pops">voir toutes les pop</a>
                </li>
                <li class="row p-2 px-3 <?= $_SERVER['PHP_SELF'] == '/TP/admin/addPop.php' ? 'gestionBtnActive' : '' ?>">
                    <a class="text-decoration-none text-white" href="/TP/admin_ajout_pops">Ajouter une pop</a>
                </li>
            </ul>
            <li class="row align-items-center <?= $_SERVER['PHP_SELF'] == '/TP/admin/addCategory.php' || $_SERVER['PHP_SELF'] == '/TP/admin/categoryList.php' ? 'gestionBtnActive' : '' ?> " data-bs-target="#categoryGestion" data-bs-toggle="collapse">
                <a class="text-decoration-none text-white">Gestion de catégorie</a>
            </li>
            <ul class="collapse adminSubSidebar container-fluid <?= $_SERVER['PHP_SELF'] == '/TP/admin/addCategory.php' || $_SERVER['PHP_SELF'] == '/TP/admin/categoryList.php' ? 'show' : '' ?>" id="categoryGestion">
                <li class="row p-2 px-3 <?= $_SERVER['PHP_SELF'] == '/TP/admin/categoryList.php' ? 'gestionBtnActive' : '' ?>">
                    <a class="text-decoration-none text-white " href="/TP/admin_liste_categorie">Liste de catégories</a>
                </li>
                <li class="row p-2 px-3 <?= $_SERVER['PHP_SELF'] == '/TP/admin/addCategory.php' ? 'gestionBtnActive' : '' ?>">
                    <a class="text-decoration-none text-white" href="/TP/admin_ajout_categorie">Ajouter une catégories</a>
                </li>
            </ul>
            <li class="row align-items-center <?= $_SERVER['PHP_SELF'] == '/TP/admin/brandsList.php' || $_SERVER['PHP_SELF'] == '/TP/admin/addBrands.php' ? 'gestionBtnActive' : '' ?> " data-bs-target="#brandsGestion" data-bs-toggle="collapse">
                <a class="text-decoration-none text-white">Gestion de franchise</a>
            </li>
            <ul class="collapse adminSubSidebar container-fluid <?= $_SERVER['PHP_SELF'] == '/TP/admin/brandsList.php' || $_SERVER['PHP_SELF'] == '/TP/admin/addBrands.php' ? 'show' : '' ?>" id="brandsGestion">
                <li class="row p-2 px-3 <?= $_SERVER['PHP_SELF'] == '/TP/admin/brandsList.php' ? 'gestionBtnActive' : '' ?>">
                    <a class="text-decoration-none text-white " href="admin_liste_franchise">Liste de franchise</a>
                </li>
                <li class="row p-2 px-3 <?= $_SERVER['PHP_SELF'] == '/TP/admin/addBrands.php' ? 'gestionBtnActive' : '' ?>">
                    <a class="text-decoration-none text-white" href="admin_ajout_franchise">Ajouter une franchise</a>
                </li>
            </ul>
        </ul>
    </div>
</div>
