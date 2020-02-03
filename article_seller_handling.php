<?php
session_start();
require_once("seller-check.php");
require_once("database.php");

var_dump($_POST);
if(
    isset($_POST['title'])
    && isset($_POST['price'])
    && isset($_POST['size'])
    && isset($_POST['category_id'])
    && $_POST['title'] !== ''
    && $_POST['price'] !== ''
    && $_POST['size'] !== ''
    && $_POST['category_id'] !== ''    
){
    $maRequete = $db->prepare('INSERT INTO articles(title ,description ,price ,size ,published_at , id_user,id_category) 
    VALUES(:boiteTitle,:boiteDescription, :boitePrice, :boiteSize , NOW(), :boiteUserId, :boiteCategoryId ) ');
    $maRequete->execute([
        "boiteTitle" => $_POST['title'],
        "boiteDescription" => $_POST['description'],
        "boitePrice" => $_POST['price'],
        "boiteSize" => $_POST['size'],
        "boiteUserId" => $_SESSION['utilisateur']['id'],
        "boiteCategoryId" => $_POST['category_id']
    ]);
   
}
else{
    echo "données invalides.";
}
header('Location: article_seller.php') ;