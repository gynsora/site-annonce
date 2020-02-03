<?php require_once('header.php'); 
require_once("seller-check.php");
require_once('database.php');

$maRequete = $db->prepare(
    'SELECT *
    FROM articles
    WHERE id = :boiteId
    ');

$maRequete->execute([
    "boiteId" => $_GET["idArticle"]
]);

$article = $maRequete->fetch();

$maRequete = $db->prepare('SELECT * FROM categories');
$maRequete->execute();
$categories = $maRequete->fetchAll();

// Récuperer les images liés au même article
$maRequete = $db->prepare('SELECT * FROM images_articles WHERE id_article = :boiteId');
$maRequete->execute([
    "boiteId" => $_GET["idArticle"]
]);
$images_articles =  $maRequete->fetch();



?>

 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>

<div class="starter-template">
        <h1><i class="fas fa-award"></i> Modifier votre article... <i class="fas fa-award"></i></h1>
<hr>  
</div>

<div class="col-sm-12 col-12 col-md-9 col-lg-6 col-xl-5 mx-auto">
    

<form action="article_seller_edit_handling.php?idArticle=<?php echo $article['id']; ?>" method="POST" enctype="multipart/form-data">
    <div>
        <div class="text-center ">
            <img src="<?php echo $images_articles['image_path']?>" class="image-form-edit">

        </div>
        <label>   
            <div>Prendre une autre image</div>
            <input type="file" name="images_articles">     
        </label>
    </div>
    <label for="title">
        <div>titre</div>
        <input type="text" name="title" maxlength="255" required
        value="<?php echo htmlspecialchars($article['title']); ?>">
    </label>
    <div>
        <label for="description">
            <div>Description</div>
            <textarea name="description"  cols="30" rows="10" ><?php echo $article['description']; ?></textarea>
        </label>
    </div>
    <label for="price">
        <div>prix</div>
        <input type="text" name="price" maxlength="255" required value="<?php echo htmlspecialchars($article['price']); ?>">
    </label>
    <label for="size">
        <div>size</div>
        <input type="text" name="size" maxlength="15" required value="<?php echo htmlspecialchars($article['size']); ?>">
    </label>
    <div>
        <label for="city">
            <div>Ville</div>
            <input type="text" name="city" maxlength="255" required value="<?php echo htmlspecialchars($article['city']); ?>">
        </label>
    </div>
    <label for="name">
        <div>Catégories</div>
        <div>
            <?php foreach($categories as $categorie): ?>    
                <input type="radio" name="category_id" value="<?php echo $categorie['id']; ?>"
                <?php if($article['id_category'] == $categorie['id']){
                    echo "checked" ;
                } ?>
                >
                <label ><?php echo $categorie['name']; ?></label>
            <?php endforeach ; ?>
        </div>
    </label>
    
    <div>
        <button class="btn bouton-beige" type="submit">Modifier</button>
    </div>
</form>
</div>
<hr>
<?php require_once('footer.php'); ?>
  