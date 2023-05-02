<?php
@session_start();
require_once 'header.php';
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
                        <a class="nav-link" href="Joueur/logIn">ADMINISTRATEUR</a>
                    <?php } else { ?>
                        <a class="nav-link active" href="/Joueur/logIn">Mon compte</a>
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
<h3 style="text-align: center;">
    Bonjour <?php echo $_SESSION['username'] ?> !
</h3>
<br />
<img src="/views/assets/images/avatarPika.jpg" class="rounded mx-auto d-block" alt="..." style="width:120px">
<br /><br />
<div class="container-lg">
    <div class="row align-items-start">
        <div class="col">
            <table class="table table-striped table-dark col-md-4 table-hover">
                <h4 style="text-align: center;">Vos informations Personnelles</h4>
                <thead>
                    <tr>
                        <th scope="col">Nom d'utilisateur</th>
                        <th scope="col">Adresse email</th>
                        <th scope="col">Mot de passe</th>
                        <th scope="col">Avatar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $_SESSION['username'] ?></td>
                        <td><?php echo $_SESSION['mail'] ?></td>
                        <td>**********</td>
                        <td><img src="/views/assets/images/avatarPika.jpg" class="rounded mx-auto d-block" alt="..." style="width:50px"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href=" javascript: document.body.scrollIntoView(false);">Editer mon profil</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col">
            <table class="table table-striped table-dark col-md-4 table-hover">
                <h4 style="text-align: center;">Vos Pokemons préférés</h4>
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Combats disputés</th>
                        <th scope="col">Nombre de victoires</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>A venir...</td>
                        <td>A venir...</td>
                        <td>A venir...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br /><br />
    <table class="table table-striped table-dark col-md-4 table-hover">
        <h4 style="text-align: center;">Vos combats disputés</h4>
        <thead>
            <tr>
                <th scope="col">Numéro de combat</th>
                <th scope="col">Date</th>
                <th scope="col">Pokemon choisi</th>
                <th scope="col">Adversaire</th>
                <th scope="col">Resultat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $historique = new Combat;
            $results = $historique->getAllFightsById($_SESSION['id']);
            foreach ($results as $row) {
                @$count++;
            ?>
                <tr>
                    <td class="col" type="text" placeholder="ID Pokemon" id="id" name="id" value=""><?php echo $count ?></td>
                    <td class="col" type="text" placeholder="nom" id="nom" name="nom" value=""><?php echo $row['Date'] ?></td>
                    <td class="col" type="text" placeholder="pv" id="pv" name="pv" value=""><?php
                                                                                            if ($row['ID_joueur1'] == $_SESSION['id']) {
                                                                                                echo $historique->getPokemonById($row['ID_pokemon1'])[0]['Nom'];
                                                                                            } else {
                                                                                                echo $historique->getPokemonById($row['ID_pokemon2'])[0]['Nom'];
                                                                                            }
                                                                                            ?></td>
                    <td class="col" type="text" placeholder="pvMax" id="pvMax" name="pvMax" value=""><?php echo $this->getName($row['ID_joueur2']) ?></td>
                    <td class="col" type="text" placeholder="pvMax" id="pvMax" name="pvMax" value=""><?php
                                                                                                        if ($row['ID_vainqueur'] == $_SESSION['id']) {
                                                                                                            echo "Gagné";
                                                                                                        } else {
                                                                                                            echo "Perdu";
                                                                                                        } ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<br /><br />

<div class="row align-items-start">
    <div class="col">
        <table class="table table-striped table-dark col-md-4 table-hover">
            <h4 style="text-align: center;">Modifier vos informations Personnelles</h4>
            <thead>
                <tr>
                    <th scope="col">Nom d'utilisateur</th>
                    <th scope="col">Adresse email</th>
                    <th scope="col">Mot de passe</th>
                    <th scope="col">Confirmation</th>
                    <th scope="col">Avatar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form method="POST" action="/Joueur/update" enctype="multipart/form-data">
                        <td> <input type="text" name="newpseudo" value="<?php echo $_SESSION['username'] ?>"></td>
                        <td><input type="text" name="newmail" value="<?php echo $_SESSION['mail'] ?>"></td>
                        <td><input type="password" name="newmdp1" placeholder="Mot de passe"></td>
                        <td><input type="password" name="newmdp2" placeholder="Confirmation mot de passe"></td>
                        <td><img src="/views/assets/images/avatarPika.jpg" class="rounded mx-auto d-block" alt="..." style="width:50px"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" value="Mettre à jour" /></td>
                    <td></td>
                    <td></td>
                </tr>
                </form>
            </tbody>
        </table>
    </div>
</div>
<h5 style="text-align: center;">
    <a href="/Joueur/deleteThisUser" style="color:red;">Supprimer votre compte définitivement</a>
</h5>