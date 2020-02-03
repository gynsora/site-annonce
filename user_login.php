<?php include("header.php"); ?>
<div class="text-center formulaire-min-height connection-padding">
    <form action="user_login_handling.php" method="POST" class="form-signin">
        <img class="mb-4" src="images/logo/logo.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Connection</h1>
        <div>
            <label>
                <div>Pseudo</div>
                <input type="text" class="form-control" name="name" maxlength="50" placeholder="Entrez votre pseudo" required autofocus>
            </label>
        </div>
        <div>
            <label>
                <div>Mot de Passe</div>
                <input type="password" class="form-control" name="password"  placeholder="Entrez votre mot de passe" maxlength="50" required>
            </label>   
        </div>
        <div>
        <button type="submit" class="btn bouton-beige">Connection</button>
        </div>
    </form>
</div>
<?php include("footer.php"); ?>


