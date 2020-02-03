<?php
session_start();
require_once("seller-check.php");
require_once('database.php');


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
    echo "les données sont valides";
    $maRequete = $db->prepare('UPDATE articles SET title = :boiteTitle, description = :boiteDescription, price = :boitePrice, 
    size = :boiteSize,  id_user = :boiteUserId, id_category = :boiteCategoryId, city = :boiteCity
    WHERE id = :boiteId');
    $maRequete->execute([
        "boiteTitle" => $_POST['title'],
        "boiteDescription" => $_POST['description'],
        "boitePrice" => $_POST['price'],
        "boiteSize" => $_POST['size'],
        "boiteUserId" => $_SESSION['utilisateur']['id'],
        "boiteCategoryId" => $_POST['category_id'],
        "boiteId" => $_GET['idArticle'],
        "boiteCity" => $_POST['city'] 
    ]);

    if(isset($_FILES['images_articles']) && $_FILES['images_articles']['name'] != "" ){
        /*
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
        */
        
        $cheminVersLimage = "images/".basename($_FILES['images_articles']['name']);
        move_uploaded_file(
            $_FILES['images_articles']['tmp_name'],
            $cheminVersLimage
        );
        
        $maRequete = $db->prepare('UPDATE images_articles SET image_path = :laBoiteImagePath WHERE id_article=:laBoiteIdArticles');
        $maRequete->execute([       
            "laBoiteImagePath" => $cheminVersLimage,
            "laBoiteIdArticles" => $_GET['idArticle']
        ]);
        
        
    }

}else{
    

}
header("Location: article_seller.php");
exit();
