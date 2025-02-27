<?php 
require_once("../include/init.php");

$data = $dbConnect->query("SELECT pseudo, lastName, firstName, phone, email, civility, status, join_date FROM member");
$userData = $data->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>'; print_r($userData); echo '</pre>';

require_once("include/backheader.php");
?>

<main class="back__main">
    <section class="users">
        <h2 class="user__title">Membres</h2>
        <table class="user__table">
            <tr class="user__table__head">
                <td class="user__table__title">Pseudo</td>
                <td class="user__table__title">Nom</td>
                <td class="user__table__title">Prénom</td>
                <td class="user__table__title">Téléphone</td>
                <td class="user__table__title">Email</td>
                <td class="user__table__title">Sexe</td>
                <td class="user__table__title">Statut</td>
                <td class="user__table__title">Date d'inscription</td>
            </tr>

            <?php foreach($userData as $key => $user): if($user["status"] == "member"): ?>
                <tr class="user__table__details">
                    <?php foreach($user as $value): ?>
                        <td class="user__table__cell"><?= $value ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endif; endforeach; ?>
        </table>
    </section>

    <section class="users">
        <h2 class="user__title">Admin</h2>
        <table class="user__table">
            <tr class="user__table__head">
                <td class="user__table__title">Pseudo</td>
                <td class="user__table__title">Nom</td>
                <td class="user__table__title">Prénom</td>
                <td class="user__table__title">Téléphone</td>
                <td class="user__table__title">Email</td>
                <td class="user__table__title">Sexe</td>
                <td class="user__table__title">Statut</td>
                <td class="user__table__title">Date d'inscription</td>
            </tr>

            <?php foreach($userData as $key => $user): if($user["status"] == "admin"): ?>
                <tr class="user__table__details">
                    <?php foreach($user as $value): ?>
                        <td class="user__table__cell"><?= $value ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endif; endforeach; ?>
        </table>
    </section>
</main>

<?php require_once("include/backfooter.php"); ?>