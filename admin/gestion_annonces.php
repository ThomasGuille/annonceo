<?php 
require_once("../include/init.php");

$dataSummary = $dbConnect->query("SELECT member.pseudo, annonce.title, annonce.short_description, annonce.photo, annonce.record_date FROM annonce JOIN member ON annonce.member_id = member.id_member");
$announceSummary = $dataSummary->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>'; print_r($announceSummary); echo '</pre>';

require_once("include/backheader.php");
?>

<main class="back__main">
    <section class="users">
        <h2 class="user__title">Membres</h2>
        <table class="user__table">
            <tr class="user__table__head">
                <td class="user__table__title">Pseudo</td>
                <td class="user__table__title">Titre</td>
                <td class="user__table__title">Résumé</td>
                <td class="user__table__title">Photo</td>
                <td class="user__table__title">Date de publication</td>
            </tr>

            <?php foreach($announceSummary as $annouce): ?>
                <tr class="announce__summary">
                    <?php foreach($annouce as $key => $value): if($key == 'photo'): ?>
                        <td class="announce__sum__cell"><div class="sum__cell"><img class="photo__sum" src="<?= $value; ?>" alt="" class="photo__summary"></div></td>
                    <?php else: ?>
                        <td class="announce__sum__cell"><div class="sum__cell"><?= $value; ?></div></td>
                    <?php endif; endforeach; ?>
                    <td class="announce__eye"><div class="sum__cell"><i class="fa-solid fa-eye"></i></div></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>

<?php require_once("include/backfooter.php"); ?>