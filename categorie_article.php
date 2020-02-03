<?php
require_once("header.php");

require_once('database.php');

$requeteCat = $db->prepare(
    'SELECT * 
    FROM articles
    WHERE id_category = :boiteCatId');
    
$requeteCat->execute([
    'boiteCatId' => $_GET['id_category']
]);

$articles = $requeteCat->fetchAll();

?>

<h1>Liste de tous les articles de la catégorie</h1>
<?php foreach ($articles as $article): ?>
    <article class="post">
    <h2>
        <a href="article_single.php?idArticle=<?php echo $article['id']; ?>">
            <?php echo $article['title']; ?>
        </a>
    </h2>
    <p><?php echo $article['description']; ?></p>
    <p><?php echo $article['published_at']; ?></p>
    <p><?php echo $article['id']; ?></p>
    </article>
<?php endforeach; ?>
  
<?php require_once("footer.php"); ?>