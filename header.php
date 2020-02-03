<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Site d'annonces | Accueil</title>
    <meta name="author" content="Laurence, Nadjim & Barry">
    <meta name="description" content="Achetez ou vendez chez Deuxième Vie à bas prix !">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed%7CThasadith" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<!-- Header -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    <a class="navbar-brand" href="index.php">
        <img src="images/logo/logo.png" class="image-logo" alt="image du logo deuxième vie">
        Deuxième Vie
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <!--ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
        </ul-->
        <ul class="navbar-nav ml-auto" >       
        <?php if(isset($_SESSION['utilisateur'])): ?>
                <?php if($_SESSION['utilisateur']['role'] === 'admin'): ?>
                    <li  class="nav-item">
                        <a class="nav-link bouton-beige" href="admin/index.php">Administration</a>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['utilisateur']['role'] === 'customer'): ?>
                    <li  class="nav-item">
                        <a class="nav-link bouton-beige" href="article_seller.php" >Espace vendeur</a>
                    </li>
                <?php endif; ?>
                    <li  class="nav-item">
                            <a class="nav-link bouton-beige" href="user_logout.php" class="site-menu-item">Déconnexion</a>
                    </li>
                <?php else: ?>
                    <li  class="nav-item">
                        <a class="nav-link bouton-beige" href="user_login.php">Connection</a>
                    </li>
                    <li  class="nav-item">
                        <a class="nav-link bouton-beige" href="user_register.php">Inscription</a>
                    </li>
        <?php endif; ?>
        <?php if(isset($_SESSION['utilisateur'])): ?>
                    <li  class="nav-item">
                        <p class="nav-link"> <?php echo $_SESSION['utilisateur']['name']; ?></p>
                    </li>
        <?php endif; ?>
        </ul>
        <!--form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form-->
    </div>
    </nav>

    <div class="header-padding">