<?php 
require_once('database.php');

if(
    isset($_POST['name'])
    && isset($_POST['password'])
    && isset($_POST['password_confirmation'])
    && isset($_POST['email'])
    && $_POST['name'] !== ''
    && $_POST['password'] !== ''
    && $_POST['password_confirmation'] !== ''
    && $_POST['email'] !== ''
    && $_POST['password'] === $_POST['password_confirmation']
    && strlen($_POST['name']) <= 50
    && strlen($_POST['password']) <= 50
    && strlen($_POST['email']) <= 255
){
    echo "Les données sont valides";
       
    if(isset($_FILES['avatar'])){
        
        if(getimagesize($_FILES['avatar']['tmp_name'])){ 
           $cheminVersLimage = "images/" . basename($_FILES['avatar']['name']);
            move_uploaded_file(
                $_FILES['avatar']['tmp_name'],
                $cheminVersLimage
            );
        }
    } 
   

    $maRequete = $db->prepare('INSERT INTO users(name, password, email, avatar, phone ) 
    VALUES(:boiteName, :boitePassword, :boiteEmail, :boiteAvatar, :boitePhone )');

    $insertion = $maRequete->execute([
        "boiteName" => $_POST['name'],
        "boitePassword" => password_hash($_POST['password'], PASSWORD_DEFAULT),
        "boiteEmail" => $_POST['email'],
        "boiteAvatar" =>  $cheminVersLimage,
        "boitePhone" => $_POST['phone']
    ]);
    if($insertion){
        header('Location:user_login.php');
        exit();
    }
}
else{
    echo "données invalides";
}
header("Location: user_register.php");


exit();


?>