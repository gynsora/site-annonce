<?php
include("header.php");
require_once('database.php'); 

// Requete de récupération de l'article
$maRequete = $db->prepare('SELECT articles.id, articles.title, articles.description, articles.price, articles.size, articles.published_at, users.phone, users.email, categories.name
                    FROM articles 
                    JOIN users ON articles.id_user = users.id
                    JOIN categories ON articles.id_category = categories.id
                    WHERE articles.id = :boiteId');

$maRequete->execute([
    "boiteId" => $_GET["idArticle"]
]);
$article = $maRequete->fetch();
// Récuperer les images liés au même article
$maRequete = $db->prepare('SELECT * FROM images_articles WHERE id_article = :boiteId');
$maRequete->execute([
    "boiteId" => $_GET["idArticle"]
]);
$images_articles =  $maRequete->fetch();

?>
<div class="starter-template">
<h1><i class="fas fa-award"></i> <?php echo htmlspecialchars($article['title']); ?> <i class="fas fa-award"></i></h1>
<hr>
</div>
<div class="row justify-content-center">
<div class="w-100"></div>
<div class="col-sm-4 mx-4 px-2">
<ul class="list-group">
    <li class="list-group-item active" style="background: #f5f5dc"><b><h4>Informations article</h4></b></li>
    <li class="list-group-item"><b><h5>Description du produit : </b><?php echo $article['description'] ;?></h5></li>
    <li class="list-group-item"><b><h5>Prix : </b><?php echo htmlspecialchars($article['price']) ;?>€</h5></li>
    <li class="list-group-item"><b><h5>Taille : </b><?php echo htmlspecialchars($article['size']) ;?></h5></li>
    <li class="list-group-item"><b><h5>Téléphone : </b><?php echo htmlspecialchars($article['phone']) ;?></h5></li>
    <li class="list-group-item"><b><h5>Email : </b><?php echo htmlspecialchars($article['email']) ;?></h5></li>
    <li class="list-group-item"><b><h5>Catégorie : </b><?php echo htmlspecialchars($article['name']) ;?></h5></li>
</ul>
    <li class="list-group-item" style="background: #f5f5dc"><h4><a href="index.php"><img src="images/fleche_retour.png"> Revenir sur tous nos articles</a></h4></li>
</div>
<div class="col-sm-4 mx-4 px-2">
    <ul class="list-group">
        <li class="list-group-item active" style="background: #f5f5dc"><b><h4>Photo article</h4></b></li>
        <li class="list-group-item">
    
        <img src="<?php echo $images_articles['image_path'] ;?>" class="img-fluid w-100"></li>
    </ul>
    <?php foreach($images_articles as $image):?>
    <?php endforeach; ?>
</div>
    </div>
<hr>
<?php include('footer.php');?>
