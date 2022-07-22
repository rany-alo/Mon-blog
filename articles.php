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

$modelArticleA = new Article();
$id_categorie = null;
if (!empty($_GET['id_categorie']) && ctype_digit($_GET['id_categorie'])) {
    $id_categorie = $_GET['id_categorie'];
}
if (!$id_categorie) {
    die("Vous devez préciser un paramètre `id` dans l'URL !");
}
$articlesA = $modelArticleA->selectArticleByC($id_categorie);



?>
        <!-- Main Content-->
        <?php 
        foreach ($articlesA as $article) {
        echo "
        <h1 class = 'text-center'>"  .$article['nom']. "</h1>
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
       