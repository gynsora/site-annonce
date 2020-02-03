<?php require_once("header.php");
// Se connecter à la base de données, avec les bons identifiants
require_once('database.php');

$maRequete = $db->prepare('SELECT * FROM articles ORDER BY published_at DESC');
$maRequete->execute();
$articles = $maRequete->fetchAll();
?>


<!-- Carousel col-xl-12 d-block -->

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/carousel/01.jpg" class="d-block w-100" alt="...">
            <div class="container">
                <div class="carousel-caption ">
                    <div class=" col-lg-6 mx-auto c-background">
                        <h2 class="display-4"><img src="images/logo/logo_ligne.png"></h2>
                        <p class="lead">Voir tous nos articles.</p>
                        <a href="#Notre sélection d'articles à shopper !" class="btn-3 button-v"><span>Voir</span></a>
                    </div>
                 </div>                
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/carousel/02.jpg" class="d-block w-100" alt="...">
            <div class="container">
                <div class="carousel-caption">
                    <div class=" col-lg-6 mx-auto c-background">
                        <h2 class="display-4"><img src="images/logo/logo_ligne.png"></h2>
                        <p class="lead">Voir tous nos articles.</p>
                        <a href="#Notre sélection d'articles à shopper !" class="btn-3 button-v"><span>Voir</span></a>
                    </div>                     
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/carousel/03.jpg" class="d-block w-100" alt="...">
            <div class="container">
                <div class="carousel-caption">
                    <div class=" col-lg-6 mx-auto c-background">
                        <h2 class="display-4"><img src="images/logo/logo_ligne.png"></h2>
                        <p class="lead">Voir tous nos articles.</p>
                        <a href="#Notre sélection d'articles à shopper !" class="btn-3 button-v"><span>Voir</span></a>
                    </div>                     
                </div>
            </div>
        </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>




    
        <div class="starter-template">
            <div id="Notre sélection d'articles à shopper !">
            <h1><i class="fas fa-award"></i> Notre sélection d'articles à shopper ! <i class="fas fa-award"></i></h1>
            </div>
            <hr>
        </div>
        <div class="container-fluid">
            
                <div class="row">
    <?php foreach($articles as $article):?>

                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card text-center">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo htmlspecialchars($article['title']); ?></h2>
                    <?php 
                        $maRequete = $db->prepare('SELECT * FROM images_articles  WHERE id_article = :boiteIdArticle'); 
                        $maRequete->execute([
                            "boiteIdArticle" => $article['id']
                        ]);
                        $image_article = $maRequete->fetch();
                            echo '<a href="article_single.php?idArticle='.$article['id'].'"> <img src= "'.$image_article['image_path'].'" class="img-fluid w-100" ></a>' ;
                    ?>   
                                <p><?php echo $article['description']; ?></p>
                                <p><?php echo $article['published_at']; ?></p>
                                <p><a href="carte_map.html" target="_blank"><?php echo htmlspecialchars($article['city']); ?></a></p>
                            </div>
                        </div>
                    </div>
            
    <?php endforeach; ?>
                </div>
            
        </div> 
 
<hr>   
<?php require_once("footer.php"); ?>






