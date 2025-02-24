<?php 
require_once('include/init.php');

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

        <div class="card">
            <div class="picture__box">
                <img src="assets/images/multimedia/ordinateur-01.jpg" alt="" class="picture">
            </div>
            <div class="details">
                <a href=""><h2 class="details__title">Un truc à vendre</h2></a>
                <p class="details__text">Un truc tellement formidable que tu vas pas y croire</p>
                <div class="seller__price">
                    <h3 class="seller">Jean-Kevin <span class="note">3 / 5</span></h3>
                    <p class="price">850€</p>
                </div>
            </div>
        </div>
        <hr>

        <a href="" class="see__more">Voir plus</a>
    </section>
</main>
    

<?php require_once('include/footer.php'); ?>