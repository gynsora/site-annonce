<?php include("header_admin.php");
require_once("admin-check.php");
require_once('../database.php');

?>

<div class="container">
	<h1 class="text-center">Ajout de catégorie</h1>
		<div class="div-form-center">
			<form action="admin_category_create_handling.php" method="POST">
			<div class="form-group">
				<label >Nom de la catégorie</label>
				<input type="text" class="form-control" name="name">
			</div>
			
			<button type="submit" class="btn btn-primary">Ajouter</button>
			</form>
		</div>
		<div class="text-center link-return">
			<a href="admin_categories.php" class="btn btn-success">Retour à la page de gestion des catégories</a>    
		</div>  
</div>


<?php include("footer_admin.php");?>