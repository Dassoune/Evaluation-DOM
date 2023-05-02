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
                    <a class="nav-link active" href="/views/classement.php">Classement</a>
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
                <?php require 'forms/log_in_form.php'; ?>
            <?php } else { ?>
                <a href="/Joueur/logOut">Deconnexion</a><br />
            <?php } ?>
        </div>
    </div>
</nav>
<div class="container-lg">
    <div class="container-lg">
        <div class="row align-items-start">
            <div class="col">
                <table class="table table-striped table-dark col-sm-4 table-hover">
                    <h4 style="text-align: center;">Meilleurs Dresseurs</h4>
                    <thead>
                        <tr class="d-flex">
                            <th scope="col" class="col-3">Joueur 1</th>
                            <th scope="col" class="col-2">Score</th>
                            <th scope="col" class="col-2">Nombre de combat</th>
                            <th scope="col" class="col-2">Nombre de victoires</th>
                            <th scope="col" class="col-3">Taux de victoires</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $classement = new Combat();
                        $results = $classement->topPlayers();
                        foreach ($results as $row) { ?>
                            <form class="" method="GET" action="/Combat/get" style="margin: auto; padding-left: 20vw;">
                                <tr class="d-flex">
                                    <td class="col-3" type="text" placeholder="ID Pokemon" id="id" name="id" value=""><?php echo $row['Username'] ?></td>
                                    <td class="col-2" type="text" placeholder="nom" id="nom" name="nom" value=""><?php echo $row['Score'] ?></td>
                                    <td class="col-2" type="text" placeholder="nom" id="nom" name="nom" value=""><?php $compt = $this->getAllFightsById($row['ID']);
                                                                                                                    echo count($compt)  ?></td>
                                    <td class="col-2" type="text" placeholder="nom" id="nom" name="nom" value=""><?php echo $this->calculWinner($row['ID']) ?></td>
                                    <td class="col-3" type="text" placeholder="nom" id="nom" name="nom" value=""><?php echo $this->pourcentage($row['ID']) . '%' ?></td>
                                </tr>
                            </form>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row align-items-start">
        <div class="col">
            <table class="table table-striped table-dark col-sm-4 table-hover">
                <h4 style="text-align: center;">Tous les combats</h4>
                <thead>
                    <tr class="d-flex">
                        <th scope="col" class="col-1">Joueur 1</th>
                        <th scope="col" class="col-2">Pokemon 1</th>
                        <th scope="col" class="col-1">Potion 1</th>
                        <th scope="col" class="col-1">Joueur 2</th>
                        <th scope="col" class="col-2">Pokemon 2</th>
                        <th scope="col" class="col-1">Potion 2</th>
                        <th scope="col" class="col-2">Vainqueur</th>
                        <th scope="col" class="col-2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $classement = new Combat();
                    $results = $classement->getAllFights();
                    foreach ($results as $row) { ?>
                        <form class="" method="GET" action="/Combat/get" style="margin: auto; padding-left: 20vw;">
                            <tr class="d-flex">
                                <td class="col-1" type="text" placeholder="ID Pokemon" id="id" name="id" value=""><?php echo $this->getName($row['ID_joueur1']) ?></td>
                                <td class="col-2" type="text" placeholder="nom" id="nom" name="nom" value=""><?php echo $this->getPokemon($row['ID_pokemon1']) ?></td>
                                <td class="col-1" type="text" placeholder="pv" id="pv" name="pv" value=""><?php echo $this->getPotionById($row['ID_potion1'])['Nom'] ?></td>
                                <td class="col-1" type="text" placeholder="pvMax" id="pvMax" name="pvMax" value=""><?php echo $this->getName($row['ID_joueur2']) ?></td>
                                <td class="col-2" type="text" placeholder="puissance" id="puissance" name="puissance" value=""><?php echo $this->getPokemon($row['ID_pokemon2']) ?></td>
                                <td class="col-1" type="text" placeholder="type" id="type" name="type" value=""><?php echo $this->getPotionById($row['ID_potion2'])['Nom'] ?></td>
                                <td class="col-2" type="text" placeholder="type" id="type" name="type" value=""><?php echo $this->getName($row['ID_vainqueur']) ?></td>
                                <td class="col-2" type="text" placeholder="type" id="type" name="type" value=""><?php echo $row['Date'] ?></td>

                            </tr>
                        </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>