<?php session_start(); ?>
<?php 
require_once("admin-check.php");
require_once('../database.php');
if(
    isset($_POST['role'])
    && $_POST['role'] !== ''
    && strlen ($_POST['role']) <= 50
){
	
	$maRequete = $db->prepare('UPDATE users SET role = :boiteRole WHERE id = :boiteId' );

	$maRequete->execute([
	    "boiteRole" =>$_POST['role'],
	    "boiteId" =>$_GET['id']
	]);
}

header('Location: admin_users.php');
exit();