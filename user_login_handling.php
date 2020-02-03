<?php session_start(); 
require_once('database.php');

if(
    isset($_POST['name'])
    && isset($_POST['password'])
    && $_POST['name'] !== ''
    && $_POST['password'] !== ''
){
    $maRequete = $db->prepare('SELECT * FROM users WHERE name= :boitePseudo ');
    $maRequete->execute([
        "boitePseudo" => $_POST['name']
    ]);
    $user = $maRequete->fetch();
    
    if($user && password_verify($_POST['password'],$user['password'])){        
        $_SESSION['utilisateur'] = $user;
        header('Location: index.php');
        exit();
    }else{
        header('Location: user_login.php');
        exit();
    }
    /*
    if($user && $_POST['password'] == $user['mdp']){
        $_SESSION['utilisateur'] = $user;
        header('Location: index.php');
        exit();
    }*/

}

?>
