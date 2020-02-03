<?php
if(
    !isset($_SESSION['utilisateur'])
    || $_SESSION['utilisateur']['role'] !== 'customer'
){
    header('Location: index.php');
    exit();
}