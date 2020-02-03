<?php 
session_start();

require_once("seller-check.php");

/**
 * EFFECTUER LA SUPPRESSION DE L'ARTICLE DONT L'ID EST INDQUE DANS L'URL
 */

require_once('database.php'); 


$maRequete = $db->prepare('DELETE FROM articles WHERE id = :boiteId');
$maRequete->execute([
    "boiteId" => $_GET["idArticle"]
]);

 header('location: article_seller.php');
 exit();
