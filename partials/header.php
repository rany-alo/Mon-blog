<?php
require_once "libraries/models/Utilisateur.php";
require_once "libraries/models/Model.php";
require_once "libraries/models/Article.php";
require_once "libraries/models/Categorie.php";
$modelArticle = new Article();
$articles = $modelArticle->selectArticleR();


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mon Blog</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html">Mon Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Accueil</a></li>
                        <li class="nav-item dropdown"> 
                        <a class="nav-link dropdown-toggle px-lg-3 py-3 py-lg-4" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" > 
                        Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink"> 
                            <li><a class='dropdown-item' href='index.php'>Tous</a></li>
                            <li><a class='dropdown-item' href='articles.php?id_categorie=1'>Front End</a></li>
                            <li><a class='dropdown-item' href='articles.php?id_categorie=2'>Back End</a></li>
                            <li><a class='dropdown-item' href='articles.php?id_categorie=3'>Frameworks</a></li>
                        </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="post.php">Connexion</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="inscription.php">Inscription</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Coding Blog</h1>
                            <span class="subheading">Un Blog pour les passionnés de programmation</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>