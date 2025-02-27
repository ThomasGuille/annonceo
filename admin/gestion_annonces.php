<?php 
require_once("../include/init.php");

$dataSummary = $dbConnect->query("SELECT annonce.id_annonce, member.pseudo, annonce.title, annonce.short_description, annonce.photo, annonce.record_date FROM annonce JOIN member ON annonce.member_id = member.id_member");
$announceSummary = $dataSummary->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>'; print_r($announceSummary); echo '</pre>';

require_once("include/backheader.php");
?>

<main class="back__main">
    <section class="users">
        <h2 class="user__title">Membres</h2>
        <table class="user__table">
            <thead>

                <tr class="user__table__head">
                    <th class="user__table__title">Pseudo</th>
                    <th class="user__table__title">Titre</th>
                    <th class="user__table__title">Résumé</th>
                    <th class="user__table__title">Photo</th>
                    <th class="user__table__title">Date de publication</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($announceSummary as $announce): ?>
                    <tr class="announce__summary">
                        <?php foreach($announce as $key => $value): if($key != "id_annonce"): if($key == 'photo'): ?>
                            <td class="announce__sum__cell"><div class="sum__cell"><img class="photo__sum" src="<?= $value; ?>" alt="" class="photo__summary"></div></td>
                        <?php else: ?>
                            <td class="announce__sum__cell"><div class="sum__cell"><?= $value; ?></div></td>
                        <?php endif; endif; endforeach; ?>
                        <td class="announce__eye"><div class="sum__cell"><a href="?action=details&id=<?= $announce["id_annonce"]; ?>"><i class="fa-solid fa-eye"></i></a></div></td>
                    </tr>


                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>

<?php require_once("include/backfooter.php"); ?>