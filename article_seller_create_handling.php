<?php
session_start();
require_once("seller-check.php");
require_once("database.php");

if(
    isset($_POST['title'])
    && isset($_POST['price'])
    && isset($_POST['size'])
    && isset($_POST['category_id'])
    && isset($_POST['city'])
    && $_POST['title'] !== ''
    && $_POST['price'] !== ''
    && $_POST['size'] !== ''
    && $_POST['category_id'] !== ''  
    && $_POST['city'] !== ''  
){
    var_dump($_FILES["images_articles"]);
    echo '<pre>' ;
    var_dump($_FILES["images_articles"]);
    echo '</pre>' ;
    var_dump($_POST['city']) ;
   
    $maRequete = $db->prepare('INSERT INTO articles(title ,description ,price ,size , published_at, city , id_user, id_category) 
    VALUES(:boiteTitle,:boiteDescription, :boitePrice, :boiteSize , NOW() ,:boiteCity, :boiteUserId, :boiteCategoryId ) ');
    $maRequete->execute([
        "boiteTitle" => $_POST['title'],
        "boiteDescription" => $_POST['description'],
        "boitePrice" => $_POST['price'],
        "boiteSize" => $_POST['size'],
        "boiteUserId" => $_SESSION['utilisateur']['id'],
        "boiteCategoryId" => $_POST['category_id'],
        "boiteCity" => $_POST['city']
    ]);
    
    
    $lastId=$db->lastInsertId();
    

    if(isset($_FILES['images_articles'])){
        foreach($_FILES['images_articles']['tmp_name'] as $key =>$tmp){
            if(getimagesize($tmp)){
                $cheminVersLimage = "images/".basename($_FILES['images_articles']['name'][$key]);
                move_uploaded_file(
                    $tmp,
                    $cheminVersLimage
                );
                
                $maRequete = $db->prepare('INSERT INTO images_articles (id_article,image_path) 
                VALUE(:laBoiteIdArticles,:laBoiteImagePath)');
                $maRequete->execute([       
                    "laBoiteImagePath" => $cheminVersLimage,
                    "laBoiteIdArticles" => $lastId
                ]);
                
            }
        }
        
    }
   
}
else{
    echo "données invalides.";
}
header('Location: article_seller.php') ;