<?php 
require_once("include/init.php");

if(!userConnected()){
    header("location: index.php");
}

$categoryData = $dbConnect->query("SELECT * FROM category");
$category = $categoryData->fetchAll(PDO::FETCH_ASSOC);

$categorySelect = $dbConnect->query("SELECT * FROM category WHERE title = '$_POST[category]'");
$categoryId = $categorySelect->fetch(PDO::FETCH_ASSOC);
print_r($categoryId);

if(isset($_POST["submit"]) && $_SERVER['REQUEST_METHOD'] === 'POST'){
    echo '<pre>'; print_r($_POST); echo '</pre>';
    // echo '<pre>'; print_r($_FILES); echo '</pre>';
    
    if(!empty($_FILES["picture1"]["name"])){
        $allowedExtensions = ["jpg", "jpeg", "png", "webp"];
        $fileUploaded = new SplFileInfo($_FILES['picture1']['name']);
        
        $fileExtension = $fileUploaded->getExtension();
        // echo $fileExtension . '<br>';
        $goodExtension = array_search($fileExtension, $allowedExtensions);
        // echo $goodExtension;

        if($goodExtension === false){

        }else{
            $pictureName = $_POST["title"] . "-" . $_FILES["picture1"]["name"];
            $pictureUrl = URL . "assets/images_annonces/$pictureName";
            $pictureFolder = RACINE . "assets/images-annonces/$pictureName";
            // echo $pictureFolder;
            copy($_FILES["picture1"]["tmp_name"], $pictureFolder);
        }
    }

    $announceData = $dbConnect->prepare("INSERT INTO annonce VALUES (DEFAULT, $_SESSION[user][id_member], photo $categoryId[id_category], :title, :short_description, :long_description, :price, :photo, :country, :city, :address, :zipcode, NOW())");

    $announceData->bindValue(":title", $_POST["title"], PDO::PARAM_STR);
    $announceData->bindValue(":short_description", $_POST["shortDesc"], PDO::PARAM_STR);
    $announceData->bindValue(":long_description", $_POST["longDesc"], PDO::PARAM_STR);
    $announceData->bindValue(":price", $_POST["price"], PDO::PARAM_STR);
    $announceData->bindValue(":photo", $pictureUrl, PDO::PARAM_STR);
    $announceData->bindValue(":country", $_POST["country"], PDO::PARAM_STR);
    $announceData->bindValue(":city", $_POST["city"], PDO::PARAM_STR);
    $announceData->bindValue(":address", $_POST["address"], PDO::PARAM_STR);
    $announceData->bindValue(":zipcode", $_POST["zipcode"], PDO::PARAM_STR);
    $announceData->execute();
}

require_once('include/header.php');
?>


<main class="main">
    <section class="announce__deposit__main">
        <form method="post" action="" class="announce__deposit" enctype="multipart/form-data">
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
                        <input type="file" name="picture1" class="picture__select">
                        <input type="file" name="picture2" class="picture__select">
                        <input type="file" name="picture3" class="picture__select">
                        <input type="file" name="picture4" class="picture__select">
                        <input type="file" name="picture5" class="picture__select">
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