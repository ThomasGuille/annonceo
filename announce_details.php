<?php 
require_once('include/init.php');

$data = $dbConnect->prepare("SELECT * FROM annonce 
JOIN member ON annonce.member_id = member.id_member 
WHERE annonce.id_annonce = :id");
$data->bindValue(":id", $_GET["id"], PDO::PARAM_INT);
$data->execute();

$detailsAnnounce = $data->fetch(PDO::FETCH_ASSOC);
// echo '<pre>'; print_r($detailsAnnounce); echo '</pre>';

$dataPicture = $dbConnect->prepare("SELECT photo.photo1, photo.photo2, photo.photo3, photo.photo4, photo.photo5 
FROM photo JOIN annonce ON photo.id_photo = annonce.photo_id
WHERE annonce.id_annonce = :idPic");
$dataPicture->bindValue(":idPic", $_GET["id"], PDO::PARAM_INT);
$dataPicture->execute();

$pictures = $dataPicture->fetch(PDO::FETCH_ASSOC);
// echo '<pre>'; print_r($pictures); echo '</pre>';

$date = date_create($detailsAnnounce["record_date"]);

require_once('include/header.php');
?>

<main class="main">
    <section class="details__announce">
        <div class="details__head">
            <h3 class="announce__details__title"><?= $detailsAnnounce["title"]; ?></h3>
            <div class="contact__btn">Contactez moi</div>
        </div>
        <hr>
        <div class="photo__text">
            <div class="photo">
                <div class="photo__box"><img src="<?= $pictures["photo1"]; ?>" alt="" class="photo__big"></div>
                <br>
                <div class="photo__select">
                    <?php foreach($pictures as $key => $value): if(!empty($value)): ?>
                        <img class="photo__small" src="<?= $value; ?>" alt="" onclick="pictureSelect(this)">
                    <?php endif; endforeach; ?>
                </div>
            </div>
            <div class="text">
                <h4 class="description__title">Description</h4>
                <br>
                <p class="description"><?= $detailsAnnounce["long_description"]; ?></p>
            </div>
        </div>
        <div class="infos">
            <p><span class="infos__details">Date de publication: </span><?= date_format($date, "d/m/Y"); ?></p>
            <p>Vendeur: <?= $detailsAnnounce["pseudo"]; ?></p>
            <p>Prix: <?= $detailsAnnounce["price"]; ?>€</p>
            <p>Adresse: <?= $detailsAnnounce["address"]; ?>, <?= $detailsAnnounce["zipcode"]; ?> <?= $detailsAnnounce["city"]; ?>, <?= $detailsAnnounce["country"]; ?></p>
        </div>
    </section>
</main>


<?php require_once('include/footer.php'); ?>