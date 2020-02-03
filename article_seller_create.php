<?php include("header.php"); 
require_once("seller-check.php");
require_once("database.php");

$maRequete = $db->prepare('SELECT * FROM categories');
$maRequete->execute();
$categories = $maRequete->fetchAll();

?>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>


<div class="starter-template">
        <h1><i class="fas fa-award"></i> Votre nouvel article à vendre... <i class="fas fa-award"></i></h1>
<hr>  
</div>
<div class="col-sm-12 col-12 col-md-9 col-lg-6 col-xl-5 mx-auto">
    <form action="article_seller_create_handling.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="title">
                <div>Titre</div>
                <input type="text" name="title" maxlength="255" required>
            </label>
        </div>
        <div class="form-group">
            <label for="description">
                <div>Description</div>
                <textarea name="description" ></textarea>
            </label>
        </div>
        <label for="price">
            <div>prix</div>
            <input type="text" name="price" maxlength="255" required>
        </label>
        <label for="size">
            <div>Taille</div>
            <input type="text" name="size" maxlength="15" required>
        </label>
        <div class="form-group">
            <label for="city">
                <div>Ville</div>
                <input type="text" name="city" maxlength="255" required>
            </label>
        </div>
        <label for="name">
            <div>Catégories</div>
            <div>
                <?php foreach($categories as $categorie): ?>    
                    <input type="radio" name="category_id" value="<?php echo $categorie['id']; ?>">
                    <label ><?php echo $categorie['name']; ?></label>
                <?php endforeach ; ?>
            </div>
        </label>
        
        <label>   
            <div>Images de l'annnonce</div>
            <input type="file" name="images_articles[]" required multiple>     
        </label>

        <div>
            <button class="btn bouton-beige" type="submit">Ajouter Article</button>
        </div>

    </form>
</div>

<hr>
<?php include('footer.php');?>
