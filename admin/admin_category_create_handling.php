<?php session_start(); ?>
<?php
//check 
require_once("admin-check.php");
require_once('../database.php');
if(
    isset($_POST['name'])
    && $_POST['name'] !== ''
    && strlen ($_POST['name']) <= 50
){
	$maRequete = $db->prepare('INSERT INTO categories (name)
	VALUE(:leNom)' );

	$maRequete->execute([
	    "leNom" =>$_POST['name']
	]);
}



header('Location: admin_categories.php');
exit();