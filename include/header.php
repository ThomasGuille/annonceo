<?php 
require_once('init.php');
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Annonceo Accueil</title>
</head>
<body>

    <div class="container">
        <header class="head">
            <a href="index.php" class="logo__link">Annonceo</a>
            <a href="" class="nav__link">Qui sommes nous</a>
            <a href="" class="nav__link">Contact</a>
            <div class="search__field">
                <input class="search__input" name="searchField" type="text" placeholder="Recherche...">
            </div>
            <div class="nav__dropDown">
                <div class="member__dropdown">
                    <i class="fa-solid fa-user icon__member"></i>
                    <p class="nav__link">Espace membre</p>
                </div>
                <div class="member__drop__link">
                    
                    <a href="" class="drop__link">Connexion</a>
                    <a href="" class="drop__link">Inscription</a>

                    <a href="profile.php" class="drop__link">Profil</a>
                    <a href="" class="drop__link">Déconnexion</a>
                </div>
            </div>
        </header>