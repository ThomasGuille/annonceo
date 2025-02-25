<?php 
require_once("include/init.php");

if(!userConnected()){
    header("location: index.php");
}

$categoryData = $dbConnect->query("SELECT * FROM category");
$category = $categoryData->fetchAll(PDO::FETCH_ASSOC);



require_once('include/header.php');
?>


<main class="main">
    <section class="announce__deposit__main">
        <form method="post" action="" class="announce__deposit">
            <div class="deposit__fields__block">
                <div class="deposit__form">
                    <div class="deposit__field">
                        <label for="title" class="deposit__label">Titre</label>
                        <input type="text" name="title" class="deposit__input" placeholder="Titre de l'annonce">
                    </div>
        
                    <div class="deposit__field">
                        <label for="shortDesc" class="deposit__label">Description courte</label>
                        <textarea type="text" name="shortDesc" class="deposit__input" rows=3 placeholder="Un résumé de l'annonce"></textarea>
                    </div>
        
                    <div class="deposit__field">
                        <label for="longDesc" class="deposit__label">Description longue</label>
                        <textarea type="text" name="longDesc" class="deposit__input" rows=5 placeholder="Description détaillée de l'annonce"></textarea>
                    </div>
        
                    <div class="deposit__field">
                        <label for="price" class="deposit__label">Prix</label>
                        <input type="text" name="price" class="deposit__input" placeholder="Prix">
                    </div>
        
                    <div class="deposit__field">
                        <label for="category" class="deposit__label">Catégorie</label>
                        <select name="category" id="category">
                            <option value="allCat" class="category__option">Toutes les catégories</option>
                            <?php foreach($category as $value): ?>
                                <option value="<?= $value["title"]; ?>"><?= $value["title"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
    
                <div class="deposit__form">
                    <div class="deposit__field">
                        <label for="picture" class="deposit__label">Photo (au moins 1 obligatoire)</label>
                        <input type="file" name="picture1" class="picture__select" placeholder="Titre de l'annonce">
                        <input type="file" name="picture2" class="picture__select" placeholder="Titre de l'annonce">
                        <input type="file" name="picture3" class="picture__select" placeholder="Titre de l'annonce">
                        <input type="file" name="picture4" class="picture__select" placeholder="Titre de l'annonce">
                        <input type="file" name="picture5" class="picture__select" placeholder="Titre de l'annonce">
                    </div>
        
                    <div class="deposit__field">
                        <label for="country" class="deposit__label">Pays</label>
                        <input type="text" name="country" class="deposit__input" placeholder="Pays">
                    </div>
        
                    <div class="deposit__field">
                        <label for="city" class="deposit__label">Ville</label>
                        <input type="text" name="city" class="deposit__input" placeholder="Ville">
                    </div>
        
                    <div class="deposit__field">
                        <label for="address" class="deposit__label">Adresse</label>
                        <textarea type="text" name="address" class="deposit__input" placeholder="Addresse" rows=3></textarea>
                    </div>
        
                    <div class="deposit__field">
                        <label for="zipcode" class="deposit__label">Code postal</label>
                        <input type="text"  name="zipcode"class="deposit__input" placeholder="Code postal">
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="deposit__btn">Déposer votre annonce</button>
        </form>
    </section>
</main>


<?php require_once("include/footer.php"); ?>