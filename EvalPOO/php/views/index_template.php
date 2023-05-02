<?php
require_once 'views/header.php';
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
                        <a class="nav-link" href="Joueur/logIn">ADMINISTRATEUR</a>
                    <?php } else { ?>
                        <a class="nav-link" href="/Joueur/logIn">Mon compte</a>
                    <?php } ?>
                </li>
            </ul>
            <?php if (!isset($_SESSION['username'])) { ?>
                <?php require 'views/forms/log_in_form.php'; ?>
            <?php } else { ?>
                <a href="/Joueur/logOut">Deconnexion</a><br />
            <?php } ?>
        </div>
    </div>
</nav>
<?php
if (isset($_SESSION['username'])) { ?>
    <div class="">
        <br>
        <button type="button" class="col-lg-10 btn btn-outline-warning btn-lg" style="margin-left: 8vw;" onclick="window.location.href='/Combat/goFight'">Combattre</button>
    </div>
    <br><br>
<?php
} else { ?>
    <figure class="text-center">
        <blockquote class="blockquote">
            <p>Le nouveau jeu incontournable sur l'univers Pokémon, à tester de toute urgence !</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Pedro Love in <cite title="Source Title">The New York Times - 2023</cite>
        </figcaption>
    </figure>
<?php } ?>
<div class="clearfix">
    <img src="/views/assets/images/classement.jpg" class="col-md-6 float-md-end mb-3 ms-md-3" alt="...">

    <p>
        Rejoignez des milliers de dresseurs dans ce nouveau mode de combat unique et sans précèdent ! Gagnez vos combats et progressez dans le classement pour atteindre le rang Master ! </p>

    <p>
        Inscrivez-vous gratuitement, choisissez votre compagnon et combattez l'IA ou les autres dresseurs. Près de 150 pokémons disponibles pour des combats épiques ! </p>

    <p>
        Plus vous gagnerez de combats, plus vous monterez dans le classement. Atteignez le rang Master pour figurer dans le top des joueurs et tenter de gagner de superbes récompenses en jeu ! Vous pouvez également consulter le classement et les règles du jeu sans avoir besoin de vous inscrire. </p>
    <button type="button" class="col-lg-4 btn btn-outline-success btn-lg" style="margin-left: 8vw;" onclick="window.location.href='/Joueur/signIn'">S'inscrire</button>
</div>
<?php
