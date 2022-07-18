<?php

    include "partials/header.php";
$modelArticleA = new Article();
    $id_categorie = null;
// On verifie si il y'en a un et que c'est un nombre entier.
if (!empty($_GET['id_categorie']) && ctype_digit($_GET['id_categorie'])) {
    $id_categorie = $_GET['id_categorie'];
}
if (!$id_categorie) {
    die("Vous devez préciser un paramètre `id` dans l'URL !");
}
$articlesA = $modelArticle->selectArticleByC($id_categorie);



?>
        <!-- Main Content-->
        <h1 class = 'text-center'> Les posts de mon blog</h1>
        <?php 
        foreach ($articlesA as $article) {
        echo "
        <div class='container px-4 px-lg-5'>
            <div class='row gx-4 gx-lg-5 justify-content-center'>
                <div class='col-md-10 col-lg-8 col-xl-7'>
                    <!-- Post preview-->
                    <div class='post-preview'>
                        <a href='post.html'>
                            <h2 class='post-title'>".$article['titre']. "</h2>
                        </a>
                        <p class='post-meta'>
                            Posted by
                            <a href='#!'>" .$article['login']. "</a></br>"
                             .$article['date']. "
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class='my-4' />
                </div>
            </div>
        </div>"
                    ;}

include 'partials/footer.php';
?>
       