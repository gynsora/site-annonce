<?php 
include("header_admin.php");
require_once("admin-check.php");
require_once("../database.php"); 

$maRequete = $db->prepare('SELECT * FROM categories WHERE id = :boiteId');
$maRequete->execute([
    "boiteId" => $_GET["idCategory"]
]);
$category = $maRequete->fetch();

?>

<div class="container">
	<div class="div-form-center">
		<h1 class="text-center">Modification de catégorie</h1>
		<form action="admin_category_edit_handling.php?id=<?php echo $category['id']; ?>" method="POST">
		<div class="form-group">
			<label >Nom de la catégorie</label>
			<input type="text" class="form-control" name="name" value="<?php echo $category['name']; ?>">
		</div>
		<button type="submit" class="btn btn-primary">Modifier</button>
		</form>
	</div>
	<div class="text-center link-return">
        <a href="admin_categories.php" class="btn btn-success">Retour à la page de gestion des catégories</a>    
    </div>  
</div>

<?php include('footer_admin.php');?>