<?php require_once('header.php'); 
/**formulaire-min-height  role="form"*/
?>
<div class="container formulaire-min-height">    
    <form action="user_register_handling.php" method="POST" enctype="multipart/form-data" class="" >
        <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>        
        
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Pseudo*</label>
            <div class="col-sm-9">
                <input type="text" id="firstName" name="name" placeholder="Saisir votre pseudo" class="form-control " maxlength="50" required autofocus >
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email*</label>
            <div class="col-sm-9">
                <input type="email" id="email" name="email" placeholder="Saisir votre mail" class="form-control" maxlength="255" required autofocus >
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-sm-3 control-label">Téléphone</label>
            <div class="col-sm-9">
                <input type="text" id="phone" name="phone" placeholder="saisir votre numéro de téléphone" class="form-control" maxlength="25"  autofocus >
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Mot de passe*</label>
            <div class="col-sm-9">
                <input type="password" id="password" name="password" placeholder="saisir votre mot de passe"  class="form-control" maxlength="50" required autofocus >
            </div>
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="col-sm-6 control-label">Mot de passe (confirmation)*</label>
            <div class="col-sm-9">
                <input type="password" id="password_confirmation" name="password_confirmation"  placeholder="resaisir votre mot de passe" class="form-control" maxlength="50" required autofocus >
            </div>
        </div>
        <div class="form-group">
            <label for="avatar" class="col-sm-6 control-label">Selectionnez votre avatar</label>
            <div class="col-sm-9">
                <input type="file" name="avatar" id="avatar" >
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block col-sm-3">S'inscrire</button>
    </form>
</div>

<?php require_once('footer.php'); ?>
