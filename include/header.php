<?php 
require_once('init.php');

// INSCRIPTION
if(isset($_POST["submitSignIn"])){
    $data = $dbConnect->prepare("INSERT INTO member VALUES (DEFAULT, :pseudo, :password, :lastName, :firstName, :phone, :email, :sex, 'member', NOW()");
    $data->bindValue(":pseudo", $_POST["pseudo"], PDO::PARAM_STR);
}
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
                    <?php if(!userConnected()): ?>
                    <p href="" class="drop__link">Connexion</p>
                    <p href="" class="drop__link signIn__link">Inscription</p>
                    <?php else: ?>
                    <a href="profile.php" class="drop__link">Profil</a>
                    <a href="" class="drop__link">Déconnexion</a>
                    <?php endif; ?>
                </div>
            </div>
        </header>

        <section class="signIn">
            <div class="signIn__main">
                <h2 class="signIn__title">Vous inscrire</h2>
                <form action="" class="signIn__form">
                    <div class="signIn__field">
                        <label class="signIn__label" for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" class="signIn__input" placeholder="Votre pseudo">
                    </div>

                    <div class="signIn__field">
                        <label class="signIn__label" for="lastName">Nom</label>
                        <input type="text" name="lastName" class="signIn__input" placeholder="Votre nom">
                    </div>

                    <div class="signIn__field">
                        <label class="signIn__label" for="firstName">Prénom</label>
                        <input type="text" name="firstName" class="signIn__input" placeholder="Votre prénom">
                    </div>

                    <div class="signIn__field">
                        <label for="sex" class="signIn__label">Sexe</label>
                        <select name="sex" id="sex" class="signIn__selector">
                            <option value="m">Homme</option>
                            <option value="f">Femme</option>
                        </select>
                    </div>

                    <div class="signIn__field">
                        <label class="signIn__label" for="email">Email</label>
                        <input type="email" name="email" class="signIn__input" placeholder="Votre email">
                    </div>

                    <div class="signIn__field">
                        <label class="signIn__label" for="phone">Téléphone</label>
                        <input type="text" name="phone" class="signIn__input" placeholder="Votre numéro de téléphone">
                    </div>

                    <div class="signIn__field">
                        <label class="signIn__label" for="password">Mot de passe</label>
                        <input type="password" name="password" class="signIn__input" placeholder="Votre mot de passe">
                    </div>

                    <div class="signIn__field">
                        <label class="signIn__label" for="passwordVerif">Confirmer le mot de passe</label>
                        <input type="password" name="passwordVerif" class="signIn__input" placeholder="Retapez votre mot de passe">
                    </div>

                    <button name="submitSignIn" class="signIn__btn">Inscription</button>
                </form>
            </div>
        </section>