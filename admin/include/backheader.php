<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Annonceo admin</title>
</head>
<body>
    <header class="backHead">
        <aside class="back__nav">
            <div class="dash__link">
                <a href="index.php" class="back__link <?php activeBackLink('/admin/index.php'); ?>">Dashboard</a>
            </div>
            <div class="back__menu">
                <ul class="back__menu__list">
                    <li class="back__menu__link">
                        <a href="gestion_members.php" class="back__link <?php activeBackLink('/admin/gestion_members.php'); ?>">Membres</a>
                    </li>
                    <li class="back__menu__link">
                        <a href="gestion_annonces.php" class="back__link <?php activeBackLink('/admin/gestion_annonces.php'); ?>">Annonces</a>
                    </li>
                    <li class="back__menu__link">
                        <a href="gestion_comments.php" class="back__link <?php activeBackLink('/admin/gestion_comments.php'); ?>">Commentaires</a>
                    </li>
                </ul>
            </div>

            <div class="back__out__menu">
                <ul class="back__out__list">
                    <li class="backout__link">
                        <a href="../index.php" class="back__link">Quitter</a>
                    </li>
                    <li class="backout__link">
                        <a href="../index.php?action=logout" class="back__link">Déconnecter</a>
                    </li>
                </ul>
            </div>
        </aside>
    </header>


