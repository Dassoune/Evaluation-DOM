<?php
@session_start();
include 'header.php';
?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/">PokéFC</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/views/news.php">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/views/regles.php">Règles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Combat/get">Classement</a>
                </li>
                <li class="nav-item"><?php if (!isset($_SESSION['username'])) { ?>
                        <a class="nav-link" href="/Joueur/signIn">S'inscrire</a>
                    <?php } elseif ($_SESSION['username'] == 'admin') { ?>
                        <a class="nav-link" href="/Joueur/logIn">ADMINISTRATEUR</a>
                    <?php } else { ?>
                        <a class="nav-link" href="/Joueur/logIn">Mon compte</a>
                    <?php } ?>
                </li>
            </ul>
            <?php if (!isset($_SESSION['username'])) { ?>
                <?php require './forms/log_in_form.php'; ?>
            <?php } else { ?>
                <a href="/Joueur/logOut">Deconnexion</a><br />
            <?php } ?>
        </div>
    </div>
</nav>