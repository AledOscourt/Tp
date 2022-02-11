<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CollectingPop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/vapor/bootstrap.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <!--**********************************************************************Header*********************************************************************** -->
    <header class="container-fluid bg-dark position-sticky top-0 shadow-lg">
        <section id="header">
            <div class="row align-items-center py-2 d-lg-flex d-none">
                <h1 class=" col text-start"><a class="ms-lg-2 text-decoration-none businessName" href="Accueil">CollectingPop</a></h1>
                <form class="d-flex col">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <div class="d-flex col align-items-center justify-content-start fs-4">
                    <?php if (!$_SESSION) { ?>
                        <div class="col text-end">
                            <a class="text-decoration-none star" href="Connexion"><i class="fas fa-star"></i></a>
                        </div>
                        <div class="col text-center user">
                            <a class="text-decoration-none" href="Connexion" id="navbarDropdownMenuLink" aria-expanded="true"><i class="fas fa-user"></i></a>
                        </div>

                    <?php } else { ?>
                        <div class="col text-end">
                            <a class="text-decoration-none star" href="Liste_d-envie"><i class="fas fa-star"></i></a>
                        </div>
                        <div class="col text-center user">
                            <a class="text-decoration-none justify-content-center m-0 d-flex" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true"><?php if (!is_null($_SESSION['user']->profilePicture)) { ?> <img src="<?= $_SESSION['user']->profilePicture; ?>" class="imgNavbarLogIn" alt="profilPhoto">
                                <?php } else { ?>
                                    <i class="fas fa-user"></i>
                                <?php } ?></a>
                            <ul class="dropdown-menu userDropdownMenu text-decoration-none text-center p-2" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item " href="Profil">Profil</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="Liste_d-envie">Liste d'envie</a>
                                </li>
                                <?php if ($_SESSION['user']->id_roles == 1) { ?>
                                    <li>
                                        <a class="dropdown-item text-secondary" href="Dashboard">Dashboard</a>
                                    </li>
                                <?php } ?>
                                <li>
                                    <a class="dropdown-item text-danger" href="signOut.php">Deconnexion</a>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!--**********************************************************************Navbar*********************************************************************** -->
        <section class="navbarSection row shadow">
            <nav class="navbar navbar-expand-lg bg-dark " id="navbar">

                <button class="navbar-toggler col-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon align-items-center"><i class="fas fa-bars"></i></span>
                </button>
                <a class="navbar-brand d-lg-none d-flex h2 col-sm-2 col text-center businessName" href="Accueil">CollectingPop</a>
                <form class=" navbar-brand d-lg-none d-md-flex d-none col">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <?php if (!$_SESSION) { ?>
                    <div class="d-lg-none col-auto align-items-center fs-6 d-flex">
                        <a class="navbar-brand text-decoration-none col-2 me-3" href="Connexion"><i class="fas fa-star"></i></a>
                        <div class="user ms-4">
                            <a class="text-decoration-none navbar-brand" href="Connexion" id="navbarDropdownMenuLink" aria-expanded="true"><i class="fas fa-user"></i></a>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="d-lg-none col-sm-3 col-4 align-items-center justify-content-around fs-6 d-flex">
                        <a class="navbar-brand text-decoration-none col-2" href="Liste_d-envie"><i class="fas fa-star"></i></a>
                        <div class="user col-sm-4 col-5">
                            <a class="navbar-brand text-decoration-none user text-center m-0" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true"><?php if (!is_null($_SESSION['user']->profilePicture)) { ?> <img src="<?= $_SESSION['user']->profilePicture; ?>" class="imgNavbarLogIn" alt="profilPhoto">
                                <?php } else { ?>
                                    <i class="fas fa-user"></i>
                                <?php } ?></a>
                            <ul class="dropdown-menu userDropdownMenu text-center text-decoration-none p-2" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="Profil">Profil</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="Liste_d-envie">Liste d'envie</a>
                                </li>
                                <?php if ($_SESSION['user']->id_roles == 1) { ?>
                                    <li>
                                        <a class="dropdown-item text-secondary" href="Dashboard">Dashboard</a>
                                    </li>
                                <?php } ?>
                                <li>
                                    <a class="dropdown-item text-danger" href="signOut.php">Deconnexion</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="col-lg d-flex navbar-nav justify-content-between mx-5 h4 " id="firstNavbar">
                        <li class="nav-item d-flex align-items-center col text-center">
                            <a class="nav-link col-lg col-11" href="#" id="category">Catégorie</a><i class="fas fa-caret-right text-white col-1 d-lg-none d-inline"></i>
                        </li>
                        <li class="nav-item d-flex align-items-center col text-center">
                            <a class="nav-link col-lg col-11" href="#" id="brand">Franchise </a><i class="fas fa-caret-right text-white col-1 d-lg-none d-inline"></i>
                        </li>
                        <li class="nav-item d-flex align-items-center col text-center">
                            <a class="nav-link col-lg col-11" href="#" id="exclusivity">Exclusivité </a><i class="fas fa-caret-right text-white col-1 d-lg-none d-inline"></i>
                        </li>
                        <li class="nav-item d-flex align-items-center col text-center">
                            <a class="nav-link col-lg col-11" href="Nouveauté" id="comingSoon">Coming soon</a>
                        </li>
                    </ul>
                    <ul class="col-lg navbar-nav d-none animate__animated animate__fadeIn animate__fast bg-dark fixed-top" id="subNavbar">
                        <li class="nav-item h4 mt-4 ms-3">
                            <a class="nav-link" href="#" id="navBackButton"><i class="fas fa-caret-left"></i><span class="ms-3">Back</span></a>
                        </li>
                        <li class="nav-item h4 ms-3">
                            <hr class="dropdown-divider mx-5">
                        </li>
                        <li class="nav-item h4 ms-3">
                            <ul class="col navbar-nav text-center align-items-center mt-5" id="subSubNavbar">
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--**********************************************************************Seconde Navbar*********************************************************************** -->
            <div class="container-fluid bg-dark d-none" id="secondNavbar">
                <div class="row">
                    <ul class="nav col py-2 align-items-center fs-5 text-center" id="secondNavList">
                    </ul>
                </div>
            </div>
        </section>
    </header>