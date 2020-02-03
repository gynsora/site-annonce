<?php session_start(); ?>
<?php 
require_once("admin-check.php");
require_once('../database.php');
if(
    isset($_POST['name'])
    && $_POST['name'] !== ''
    && strlen ($_POST['name']) <= 50
){
	
	$maRequete = $db->prepare('UPDATE categories SET name = :boiteName WHERE id = :boiteId' );

	$maRequete->execute([
	    "boiteName" =>$_POST['name'],
	    "boiteId" =>$_GET['id']
	]);
}

header('Location: admin_categories.php');
exit();