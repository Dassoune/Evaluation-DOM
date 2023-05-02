<?php
@session_start();
require 'header.php';
?>
<style>
    body {
        background-color: #343a40;
        color: white;
    }
</style>
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
                        <a class="nav-link active" href="/Joueur/logIn">ADMINISTRATEUR</a>
                    <?php } else { ?>
                        <a class="nav-link" href="/Joueur/logIn">Mon compte</a>
                    <?php } ?>
                </li>
            </ul>
            <?php if (!isset($_SESSION['username'])) {
                require 'views/forms/log_in_form.php';
            } else { ?>
                <a href="/Joueur/logOut">Deconnexion</a><br />
            <?php } ?>
        </div>
    </div>
</nav>
<h3 style="text-align: center;">
    Dashboard Administrateur
</h3>
<br />
<img src="/views/assets/images/admin_avatar.jpg" class="rounded mx-auto d-block" alt="..." style="width:120px">
<br /><br />
<div class="container-lg">
    <div class="row align-items-start table-responsive">
        <div class="col">
            <table class="table table-striped table-dark col-md-4 table-hover">
                <h4 style="text-align: center;">Ajouter un Pokemon</h4>
                <thead>
                    <tr>
                        <th scope="col" style="width:20%">Nom</th>
                        <th scope="col" style="width:20%">PV</th>
                        <th scope="col" style="width:20%">PVMax</th>
                        <th scope="col" style="width:20%">Puissance</th>
                        <th scope="col" style="width:20%">Type</th>
                    </tr>
                </thead>
                <tbody>
                    <form class="" method="POST" action="/Pokemon/createPokemon" style="margin: auto; padding-left: 20vw;">
                        <tr>
                            <td><input type="text" placeholder="Nom Pokemon" id="nom" name="nom" /></td>
                            <td><input type="number" placeholder="pv" id="pv" name="pv" /></td>
                            <td><input type="number" placeholder="pvMax" id="pvMax" name="pvMax" /></td>
                            <td><input type="number" placeholder="puissance" id="puissance" name="puissance" /></td>
                            <td><input type="text" placeholder="type" id="type" name="type" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><input type="submit" name="" value="Créer" style="width:100%;" /></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row align-items-start">
        <div class="col">
            <table class="table table-striped table-dark col-sm-4 table-hover">
                <h4 style="text-align: center;">Modifier ou supprimer un Pokemon</h4>
                <thead>
                    <tr class="d-flex">
                        <th scope="col" class="col-1">ID</th>
                        <th scope="col" class="col-2">Nom</th>
                        <th scope="col" class="col-1">PV</th>
                        <th scope="col" class="col-1">PVMax</th>
                        <th scope="col" class="col-1">Puissance</th>
                        <th scope="col" class="col-1">Type</th>
                        <th scope="col" class="col-2">Modifier / Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pokemon = new Personnage();
                    $results = $pokemon->getAllPokemon();
                    foreach ($results as $pokemon) { ?>
                        <form class="" method="GET" action="/Pokemon/getAll" style="margin: auto; padding-left: 20vw;">
                            <tr class="d-flex">
                                <td class="col-1"><input type="number" placeholder="ID Pokemon" id="id" name="id" value="<?php echo $pokemon['ID_pokemon'] ?>" /></td>
                                <td class="col-2"><input type="text" placeholder="nom" id="nom" name="nom" value="<?php echo $pokemon['Nom'] ?>" /></td>
                                <td class="col-1"><input type="number" placeholder="pv" id="pv" name="pv" value="<?php echo $pokemon['PV'] ?>" /></td>
                                <td class="col-1"><input type="number" placeholder="pvMax" id="pvMax" name="pvMax" value="<?php echo $pokemon['PvMax'] ?>" /></td>
                                <td class="col-1"><input type="number" placeholder="puissance" id="puissance" name="puissance" value="<?php echo $pokemon['Puissance'] ?>" /></td>
                                <td class="col-1"><input type="text" placeholder="type" id="type" name="type" value="<?php echo $pokemon['Type'] ?>" /></td>
                                <td class="col-2"><input type="submit" name="" value="Modifier" style="width:49%;" /><input type="submit" name="" value="Supprimer" style="width:49%;" /></td>
                            </tr>
                        </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row align-items-start table-responsive">
        <div class="col">
            <table class="table table-striped table-dark col-sm-4 table-hover">
                <h4 style="text-align: center;">Supprimer un Joueur</h4>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Score</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $user = new UserDao();
                    $results = $user->getAllUsers();
                    foreach ($results as $user) { ?>
                        <form class="" method="POST" action="/Joueur/deleteUser" style="margin: auto; padding-left: 20vw;">
                            <tr>
                                <td><?php echo $user['ID'] ?><input type="hidden" placeholder="ID" id="id" name="id" value="<?php echo $user['ID'] ?>" /></td>
                                <td><?php echo $user['Username'] ?></td>
                                <td><?php echo $user['Email'] ?></td>
                                <td><?php echo $user['Score'] ?></td>
                                <td><input type="submit" value="Supprimer" />
                                </td>
                            </tr>
                        </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row align-items-start table-responsive">
        <div class="col">
            <table class="table table-striped table-dark col-sm-4 table-hover">
                <h4 style="text-align: center;">Modifier un Joueur</h4>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Score</th>
                        <th scope="col">Modifier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $user = new UserDao();
                    $results = $user->getAllUsers();
                    foreach ($results as $user) { ?>
                        <form class="" method="POST" action="/Joueur/update" enctype="multipart/form-data" style="margin: auto; padding-left: 20vw;">
                            <tr>
                                <td><input type="number" placeholder="ID" id="id" name="id" value="<?php echo $user['ID'] ?>" /></td>
                                <td><input type="text" placeholder="Username" id="Username" name="newpseudo" value="<?php echo $user['Username'] ?>" /></td>
                                <td><input type="email" placeholder="email" id="email" name="newmail" value="<?php echo $user['Email'] ?>" /></td>
                                <td><input type="number" placeholder="score" id="score" name="score" value="<?php echo $user['Score'] ?>" /></td>
                                <td><input type="submit" value="Modifier" />
                                </td>
                            </tr>
                        </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>