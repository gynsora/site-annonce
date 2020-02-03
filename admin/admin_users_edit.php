<?php 
include("header_admin.php");
require_once("admin-check.php");
require_once("../database.php"); 

$maRequete = $db->prepare('SELECT * FROM users WHERE id = :boiteId');
$maRequete->execute([
    "boiteId" => $_GET["idCategory"]
]);
$user = $maRequete->fetch();

?>

<div class="container">    
    <div class="card m-auto" style="width: 18rem;">
    <?php if($user['avatar'] ): ?>
        <img src="../<?php echo $user['avatar'] ?>" class="card-img-top" alt="avatar de <?php echo $user['name']; ?>">
    <?php endif; ?>
        <div class="card-body">
            <h5 class="card-title text-center"><?php echo $user['name']; ?></h5>
            <p class="card-text">
                <div>Mail: <?php echo $user['email'] ?></div>
                <div>Numéro: <?php echo $user['phone'] ?></div>
            </p>
        </div>
    </div>
    <h1 class="text-center">Modification du  rôle de l'utilisateur</h1>
    <div class="div-form-center">
        <form action="admin_users_edit_handling.php?id=<?php echo $user['id']; ?>" method="POST">
        <div class="form-group">
            <div><h5>Rôle</h5></div>
            <input type="radio" name="role" value="customer"
                    <?php if($user['role'] == "customer"){
                        echo "checked" ;
                    } ?>
            >
            <label >customer</label>
            <input type="radio" name="role" value="admin"
                    <?php if($user['role'] == "admin"){
                        echo "checked" ;
                    } ?>
            >
            <label >admin</label>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
    <div class="text-center link-return">
        <a href="admin_users.php" class="btn btn-success">Retour à la page de gestion des utilisateur</a>    
    </div>           
</div>



<?php include('footer_admin.php');?>