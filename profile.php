<?php 
require_once("include/init.php");

if(!userConnected()){
    header("location: index.php");
}



require_once("include/header.php");
?>


<main class="main">
    <section class="profile__info">
        <h3 class="profile__title"><?= $_SESSION["user"]["pseudo"]; ?></h3>

        <div class="profile__segment">
            <p class="profile__detail">Nom: <?= $_SESSION["user"]["lastName"]; ?></p>
            <p class="profile__detail">Prénom: <?= $_SESSION["user"]["firstName"]; ?></p>
        </div>

        <div class="profile__segment">
            <p class="profile__detail">Téléphone: <?= $_SESSION["user"]["phone"]; ?></p>
            <p class="profile__detail">Email: <?= $_SESSION["user"]["email"]; ?></p>
        </div>
    </section>
</main>





<?php require_once("include/footer.php"); ?>