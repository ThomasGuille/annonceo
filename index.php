<?php 
require_once('include/init.php');

$data = $dbConnect->query("SELECT annonce.id_annonce, annonce.photo, annonce.title, annonce.short_description, member.pseudo, annonce.price, annonce.record_date
 FROM annonce JOIN member ON annonce.member_id = member.id_member
 ORDER BY annonce.record_date DESC
");
$announceDisp = $data->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>'; print_r($announceDisp); echo '</pre>';

require_once('include/header.php');
?>

    
<main class="main">
    <aside class="filter__nav">
        <div class="side__dropdown">
            <p class="side__title">Catégories</p>
            <div class="dropDown">
                <div class="side__dropdown__btn" onclick="displayDropdown(this)">
                    <span class="filter__item">Toutes les catégories</span>
                    <span class="chevron__box"><i class="fa-solid fa-chevron-down chevron"></i></span>
                </div>
                <div class="side__dropdown__link">
                    <?php echo 'essai dropdown js'; ?>
                </div>
            </div>
        </div>

        <div class="side__dropdown">
            <p class="side__title">Région</p>
            <div class="dropDown">
                <div class="side__dropdown__btn" onclick="displayDropdown(this)">
                    <span class="filter__item">Toutes les régions</span>
                    <span class="chevron__box"><i class="fa-solid fa-chevron-down chevron"></i></span>
                </div>
                <div class="side__dropdown__link">
                    <?php echo 'essai dropdown js'; ?>
                </div>
            </div>
        </div>

        <div class="side__dropdown">
            <p class="side__title">Membres</p>
            <div class="dropDown">
                <div class="side__dropdown__btn" onclick="displayDropdown(this)">
                    <span class="filter__item">Tous les membres</span>
                    <span class="chevron__box"><i class="fa-solid fa-chevron-down chevron"></i></span>
                </div>
                <div class="side__dropdown__link">
                    <?php echo 'essai dropdown js'; ?>
                </div>
            </div>
        </div>
    </aside>

    <section class="section__main">
        <div class="sort__dropdown">
            <div class="dropDown">
                <div class="sort__dropdown__btn" onclick="displayDropdown(this)">
                    <span class="filter__item">Trier par date</span>
                    <span class="chevron__box"><i class="fa-solid fa-chevron-down chevron"></i></span>
                </div>
                <div class="side__dropdown__link">
                    <?php echo 'essai dropdown js'; ?>
                </div>
            </div>
        </div>

        <hr>

        <?php foreach($announceDisp as $key => $value): ?>
            <a href="announce_details.php?id=<?= $announceDisp[$key]["id_annonce"]; ?>"><div class="card">
                <div class="picture__box">
                    <img src="<?= $announceDisp[$key]["photo"]; ?>" alt="" class="picture">
                </div>
                <div class="details">
                    <h2 class="details__title"><?= $announceDisp[$key]["title"]; ?></h2>
                    <p class="details__text"><?= $announceDisp[$key]["short_description"]; ?></p>
                    <div class="seller__price">
                        <h3 class="seller"><?= $announceDisp[$key]["pseudo"]; ?> <span class="note">3 / 5</span></h3>
                        <p class="price"><?= $announceDisp[$key]["price"]; ?>€</p>
                    </div>
                </div>
            </div></a>
            <hr>
        <?php endforeach; ?>

        <a href="" class="see__more">Voir plus</a>
    </section>
</main>
    

<?php require_once('include/footer.php'); ?>