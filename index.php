<?php
require_once "libraries/models/Utilisateur.php";
require_once "libraries/models/Model.php";
require_once "libraries/models/Article.php";
require_once "libraries/models/Categorie.php";

session_name('user_login');
session_start();
if (isset($_SESSION['user_login'])) {
    $modelUser = new Utilisateur();
    $id = $_SESSION["user_login"];
    $user = $modelUser->selectUserById($id);
    if ($user['id_droits'] == 1) {
        include "partials/headerU.php";
    }
    elseif ($user['id_droits'] == 42) {
        include "partials/headerM.php";
    }
    elseif ($user['id_droits'] == 1337) {
        include "partials/headerA.php";
    }
}
else {
    include "partials/header.php";
}



$modelArticle = new Article();
$articles = $modelArticle->selectArticleR();


?>
        <!-- Main Content-->
        <h1 class = 'text-center'> <?php echo "Tous les articles de mon blog"; ?></h1>
        <?php 
        foreach ($articles as $article) {
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

                    if (isset($_SESSION['user_login'])) {
                        $modelUser = new Utilisateur();
                        $id = $_SESSION["user_login"];
                        $user = $modelUser->selectUserById($id);
                        if ($user['id_droits'] == 1) {
                            include "partials/footerU.php";
                        }
                        elseif ($user['id_droits'] == 42) {
                            include "partials/footerM.php";
                        }
                        elseif ($user['id_droits'] == 1337) {
                            include "partials/footerA.php";
                        }
                    }
                    else {
                        include "partials/footer.php";
                    }
?>
       