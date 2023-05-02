<?php
session_start();
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
                    <a class="nav-link active" aria-current="page" href="/views/news.php">News</a>
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

<h2 style="text-align: center;">Quoi de neuf pour PokéFightClub ?</h2>
<h3>Avancée du site :</h3>
<div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="80" style="width: 65%"></div>
</div>
<h4 style="text-align: center;">65%</h4>

<h3>A venir sur le site :</h3>

<div class="list-group">
    <a href="" class="list-group-item list-group-item-action flex-column align-items-start active">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Nouvelle présentation des combats</h5>
            <small>in 1 week</small>
        </div>
        <p class="mb-1">Nouvelle présentation pour les combats, suivi en direct des Pv et PC des pokémons, affichage 
            des informations de l'adversaire, résumé du combat, prise en compte des types.
            </small>
    </a>
    <a href="" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Modification de l'avatar de l'utilisateur</h5>
            <small class="text-muted">in 2 days</small>
        </div>
        <p class="mb-1">La page règle</p>
        <small class="text-muted">Avec les différents bonus et malus.</small>
    </a>
    <a href="" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Publication du site</h5>
            <small class="text-muted">Maybe</small>
        </div>
        <p class="mb-1">Mis en production du site et possibilité de jouer en direct contre d'autres joueurs</p>
        <small class="text-muted">Objecti final ...</small>
    </a>
</div>