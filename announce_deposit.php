<?php 
require_once("include/init.php");

if(!userConnected()){
    header("location: index.php");
}

$categoryData = $dbConnect->query("SELECT * FROM category");
$category = $categoryData->fetchAll(PDO::FETCH_ASSOC);


if(isset($_POST["submit"]) && $_SERVER['REQUEST_METHOD'] === 'POST'){
    echo '<pre>'; print_r($_POST); echo '</pre>';
    // echo '<pre>'; print_r($_FILES); echo '</pre>';
    $categorySelect = $dbConnect->query("SELECT * FROM category WHERE title = '$_POST[category]'");
    $categoryId = $categorySelect->fetch(PDO::FETCH_ASSOC);

    $error = false;
    foreach($_POST as $key => $value){
        if($key != "submit" && empty($value)){
            $errorMsg = "<small class='error__message'>Merci de  remplir ce champ</small>";
            $error = true;
        }
    }

    if($error === false){
        foreach($_FILES as $key => $value){
            if(!empty($_FILES[$key]["name"])){
                $allowedExtensions = ["jpg", "jpeg", "png", "webp"];
                $fileUploaded = new SplFileInfo($_FILES[$key]['name']);
                
                $fileExtension = $fileUploaded->getExtension();
                $goodExtension = array_search($fileExtension, $allowedExtensions);
        
                if($goodExtension === false){
        
                }else{
                    $pictureName = $_POST["title"] . "-" . $_FILES[$key]["name"];
                    $pictureFolder = RACINE . "assets/images-annonces/$pictureName";
                    copy($_FILES[$key]["tmp_name"], $pictureFolder);
                }
            }
        }
    
        $pictureData = $dbConnect->prepare("INSERT INTO photo VALUES (DEFAULT, :photo1, :photo2, :photo3, :photo4, :photo5)");
        $pictureData->bindValue(":photo1", URL . "assets/images-annonces/" . $_POST["title"] . "-" . $_FILES["picture1"]["name"]);
        if(!empty($_FILES["picture2"]["name"])){
            $pictureData->bindValue(":photo2", URL . "assets/images-annonces/" . $_POST["title"] . "-" . $_FILES["picture2"]["name"]);
        }else{ $pictureData->bindValue(":photo2", NULL);}
        if(!empty($_FILES["picture3"]["name"])){
            $pictureData->bindValue(":photo3", URL . "assets/images-annonces/" . $_POST["title"] . "-" . $_FILES["picture3"]["name"]);
        }else{ $pictureData->bindValue(":photo3", NULL);}
        if(!empty($_FILES["picture4"]["name"])){
            $pictureData->bindValue(":photo4", URL . "assets/images-annonces/" . $_POST["title"] . "-" . $_FILES["picture4"]["name"]);
        }else{ $pictureData->bindValue(":photo4", NULL);}
        if(!empty($_FILES["picture5"]["name"])){
            $pictureData->bindValue(":photo5", URL . "assets/images-annonces/" . $_POST["title"] . "-" . $_FILES["picture5"]["name"]);
        }else{ $pictureData->bindValue(":photo5", NULL);}
        $pictureData->execute();
        $photoId = $dbConnect->lastInsertId();
    
        $announceData = $dbConnect->prepare("INSERT INTO annonce VALUES (DEFAULT, :member_id, '$photoId', :category_id, :title, :short_description, :long_description, :price, :photo, :country, :city, :address, :zipcode, NOW())");
    
        $announceData->bindValue(":member_id", $_SESSION['user']['id_member'], PDO::PARAM_INT);
        $announceData->bindValue(":category_id", $categoryId['id_category'], PDO::PARAM_INT);
        $announceData->bindValue(":title", $_POST["title"], PDO::PARAM_STR);
        $announceData->bindValue(":short_description", $_POST["shortDesc"], PDO::PARAM_STR);
        $announceData->bindValue(":long_description", $_POST["longDesc"], PDO::PARAM_STR);
        $announceData->bindValue(":price", $_POST["price"]);
        $announceData->bindValue(":photo", URL . "assets/images-annonces/" . $_POST["title"] . "-" . $_FILES["picture1"]["name"], PDO::PARAM_STR);
        $announceData->bindValue(":country", $_POST["country"], PDO::PARAM_STR);
        $announceData->bindValue(":city", $_POST["city"], PDO::PARAM_STR);
        $announceData->bindValue(":address", $_POST["address"], PDO::PARAM_STR);
        $announceData->bindValue(":zipcode", $_POST["zipcode"], PDO::PARAM_INT);
        $announceData->execute();
    }
    
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
                        <?php if(isset($errorMsg)) echo $errorMsg; ?>
                    </div>
        
                    <div class="deposit__field">
                        <label for="shortDesc" class="deposit__label">Description courte</label>
                        <textarea type="text" name="shortDesc" class="deposit__input" rows=3 placeholder="Un résumé de l'annonce"></textarea>
                        <?php if(isset($errorMsg)) echo $errorMsg; ?>
                    </div>
        
                    <div class="deposit__field">
                        <label for="longDesc" class="deposit__label">Description longue</label>
                        <textarea type="text" name="longDesc" class="deposit__input" rows=5 placeholder="Description détaillée de l'annonce"></textarea>
                        <?php if(isset($errorMsg)) echo $errorMsg; ?>
                    </div>
        
                    <div class="deposit__field">
                        <label for="price" class="deposit__label">Prix</label>
                        <input type="text" name="price" class="deposit__input" placeholder="Prix">
                        <?php if(isset($errorMsg)) echo $errorMsg; ?>
                    </div>
        
                    <div class="deposit__field">
                        <label for="category" class="deposit__label">Catégorie</label>
                        <select name="category" id="category">
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
                        <?php if(isset($errorMsg)) echo $errorMsg; ?>
                    </div>
        
                    <div class="deposit__field">
                        <label for="city" class="deposit__label">Ville</label>
                        <input type="text" name="city" class="deposit__input" placeholder="Ville">
                        <?php if(isset($errorMsg)) echo $errorMsg; ?>
                    </div>
        
                    <div class="deposit__field">
                        <label for="address" class="deposit__label">Adresse</label>
                        <textarea type="text" name="address" class="deposit__input" placeholder="Addresse" rows=3></textarea>
                        <?php if(isset($errorMsg)) echo $errorMsg; ?>
                    </div>
        
                    <div class="deposit__field">
                        <label for="zipcode" class="deposit__label">Code postal</label>
                        <input type="text"  name="zipcode"class="deposit__input" placeholder="Code postal">
                        <?php if(isset($errorMsg)) echo $errorMsg; ?>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="deposit__btn">Déposer votre annonce</button>
        </form>
    </section>
</main>


<?php require_once("include/footer.php"); ?>