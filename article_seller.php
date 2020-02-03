<?php include("header.php");
require_once("seller-check.php");
require_once("database.php");

$maRequete = $db->prepare('SELECT * FROM articles WHERE id_user = :boiteidUser ORDER BY published_at DESC');
$maRequete->execute([
    "boiteidUser" => $_SESSION['utilisateur']['id']    
]);
$articles = $maRequete->fetchAll();

?>

<div class="starter-template">
        <h1><i class="fas fa-award"></i> Mes articles à vendre <i class="fas fa-award"></i></h1>
<hr>  
</div>
<div class="col-md-10 mx-auto">

<table class="table table-bordered">
  <thead>
    <tr>
    <p><th scope="col" style="background: #f5f5dc">TITRE</th></p>
    <p><th scope="col" style="background: #f5f5dc">DESCRIPTION</th></p>
    <p><th scope="col" style="background: #f5f5dc">PRIX</th></p>
    <p><th scope="col" style="background: #f5f5dc">TAILLE</th></p>
    <p><th scope="col" style="background: #f5f5dc">DATE DE PUBLICATION</th></p>
    <p><th scope="col" style="background: #f5f5dc">VILLE</th></p>
    <p><th colspan="2" style="background: #f5f5dc">ACTIONS</th></p>
    </tr>
  </thead>
  <tbody>
  <?php foreach($articles as $article): ?>
    <tr>
      <th scope="row"><?php echo htmlspecialchars($article['title']); ?></th>
        <td><?php echo $article['description']; ?></td>
        <td><?php echo htmlspecialchars($article['price']); ?></td>
        <td><?php echo htmlspecialchars($article['size']); ?></td>
        <td><?php echo htmlspecialchars($article['published_at']); ?></td>
        <td><?php echo htmlspecialchars($article['city']); ?></td>
        <td><a href="article_seller_edit.php?idArticle=<?php echo $article["id"];?>">modifier</a></td>
        <td><a href="article_seller_delete.php?idArticle=<?php echo $article["id"];?>">supprimer</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</div>
<hr>
<div class="starter-template">
   <h3><a href="article_seller_create.php">Créer un nouvel article à vendre</a></h3>
</div>
<?php include('footer.php');?>
