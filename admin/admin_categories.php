<?php
include("header_admin.php");
require_once("admin-check.php");
/*creer un check pour verifié si la personne est connecter en tant qu'admin
require_once("seller-check.php"); ou mettre ça dans le header_admin*/
require_once("../database.php");

$maRequete = $db->prepare('SELECT * FROM categories');
$maRequete->execute();
$categories = $maRequete->fetchAll();

?>
<div class="container">
    <h1 class="text-center">Liste des catégories d'articles</h1>
    <a href="admin_category_create.php" class="m-auto">Créer une nouvelle catégorie d'articles</a>
    <div class="div-form-center">
        <table class="table table-bordered m-auto ">
            <thead >
                <th scope="col" style="background: #f5f5dc" class="text-center">NOM CATEGORIE</th>
                <th colspan="2" style="background: #f5f5dc" class="text-center">ACTIONS</th>
            </thead>
            <tbody>
            <?php foreach($categories as $categorie): ?>
                <tr>
                    <td class="text-center"><?php echo $categorie['name']; ?></td>
                    <td class="text-center">
                        <a href="admin_category_edit.php?idCategory=<?php echo $categorie["id"];?>" class="btn btn-warning ">modifier</a>
                        <a href="admin_category_delete.php?idCategory=<?php echo $categorie["id"];?>" class="btn btn-danger ">supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('footer_admin.php');?>