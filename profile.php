<?php 
require_once("include/init.php");

if(!userConnected()){
    header("location: index.php");
}



require_once("include/header.php");
?>


<main class="main">
    <section class="profile__info">
        <p class="profile__detail">Pseudo: <?= $_SESSION["user"]["pseudo"]; ?></p>
        <p class="profile__detail">Nom: <?= $_SESSION["user"]["lastName"]; ?></p>
        <p class="profile__detail">Prénom: <?= $_SESSION["user"]["firstName"]; ?></p>
        <p class="profile__detail">Téléphone: <?= $_SESSION["user"]["phone"]; ?></p>
        <p class="profile__detail">Email: <?= $_SESSION["user"]["email"]; ?></p>
    </section>
</main>





<?php require_once("include/footer.php"); ?>