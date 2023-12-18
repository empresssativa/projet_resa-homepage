<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <!-- swiper for slider -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
        <link rel="stylesheet" href="style.css">
        
    </head>

    <body class="bg-light">
        <!-- navbar  -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">

            <div class="container-fluid">
                <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">
                    <img src="./pictures/logo.png" alt="Logo" width="80" height="64">
                </a>

                <a class="navbar-brand" href="index.php">Bokit Hotel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="actus.php">Nos actualités</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="rooms.php" > Chambres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 20 20">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg> -->
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 20 20" >
                        <a class="nav-link" href="formViewCart.php"><path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/></a>
                    </svg>
                   

    <!-- changement Inscription/User -->

                    <?php if(!isset($_SESSION['user_id'])) {?>
                        <div class="d-flex" role="search">
                            <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#inscriptionModal">
                                Inscription
                            </button>
                        </div>
                    <?php }else { ?>
                        <div class="d-flex" role="search">
                        <a href="profil.php"><button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2">
                                Mon espace
                            </button>
                        </div>
                    <?php } ?>

                    <!-- fin changement Inscription/user -->

                    <!-- changement connexion/déconnexion -->
                    <?php if(!isset($_SESSION['user_id'])) { ?>
                        <div class="d-flex" role="search">
                            <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                                Connexion
                            </button>
                        </div>
                    
                    <?php } else { ?>
                        <div class="d-flex" role="search">
                           <a href="logout.php" ><button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" href="logout.php">
                                Déconnexion
                            </button></a>
                        </div>
                    <?php } ?>
                    <!-- fin changement connexion/déconnexion --> 
                    </div>
                </div>
            </div>
        </nav>

            <!-- bouton d'inscription -->
        <div class="modal fade" id="inscriptionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="register.php" method="POST"> 
                        <div class="modal-header">
                            <h5 class="modal-title d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i> Inscription
                            </h5>
                            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control shadow-none" name="lastname">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Prénom</label>
                                <input type="text" class="form-control shadow-none" name="firstname">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Numéro de téléphone</label>
                                <input type="phone" class="form-control shadow-none" name="phone">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control shadow-none" name="email">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" class="form-control shadow-none" name="password">
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <button type="submit" class="btn btn-dark shadow-none" name="submit">Connexion</button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>

        <!-- bouton d'inscription fin -->

        <!-- Login button -->

        <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="conect_ogin.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i> User Login
                            </h5>
                            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Address e-mail</label>
                                <input type="email" class="form-control shadow-none" name="email">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" class="form-control shadow-none" name="password">
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <button type="submit" class="btn btn-dark shadow-none">Connexion</button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="errorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="index.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title d-flex align-items-center">
                                <i class="bi bi-person-circle fs-3 me-2"></i> Alert !
                            </h5>
                            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <p class="text-danger" >Veuillez vous inscrire ou vous connecter pour faire une réservation, s'il vous plaît !</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <button type="submit" class="btn btn-dark shadow-none">Retour</button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
        <!-- login button end -->

        <!-- navbar end  -->
    <body>