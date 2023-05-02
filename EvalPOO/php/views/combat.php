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
                        <a class="nav-link" href="/views/dashboard_user.php">Mon compte</a>
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

<h2 style="text-align:center;">Paramètres de combat</h2>

<form class="" method="POST" action="/Combat/prepareFight" style="margin: auto; padding-left: 20vw;">
    <tr>
        <label for="Dresseur2" class="col-sm-2 col-form-label">Choisissez un adversaire</label>
        <td><select type="text" placeholder="Adversaire" id="nom" name="Dresseur2">
                <option value="IA" disabled>Ordinateur (à venir)</option>
                <option value="TEST Joueur Aléa">Dresseur Aléatoire</option>
            </select>
            <br><br>
            <div class="row align-items-start">
                <div class="col">
                    <table class="table table-striped table-dark col-sm-4 table-hover">
                        <h4>Choisissez un pokemon</h4>
                        <thead>
                            <tr class="d-flex">
                                <th scope="col" class="col-2">Nom</th>
                                <th scope="col" class="col-1">PV</th>
                                <th scope="col" class="col-1">PVMax</th>
                                <th scope="col" class="col-1">Puissance</th>
                                <th scope="col" class="col-1">Type</th>
                                <th scope="col" class="col-1">Choisir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pokemon = new Pokemon();
                            $results = $pokemon->getAllPokemon();
                            foreach ($results as $pokemon) { ?>
                                <form class="" method="POST" action="" style="margin: auto; padding-left: 20vw;">
                                    <tr class="d-flex">
                                        <input type="hidden" placeholder="ID Pokemon" id="id" name="id" value="<?php echo $pokemon['ID_pokemon'] ?>" />
                                        <td class="col-2" type="text" placeholder="nom" id="nom" name="nom" value=""><?php echo $pokemon['Nom'] ?></td>
                                        <td class="col-1" type="number" placeholder="pv" id="pv" name="pv" value=""><?php echo $pokemon['PV'] ?></td>
                                        <td class="col-1" type="number" placeholder="pvMax" id="pvMax" name="pvMax" value=""><?php echo $pokemon['PvMax'] ?></td>
                                        <td class="col-1" type="number" placeholder="puissance" id="puissance" name="puissance" value=""><?php echo $pokemon['Puissance'] ?></td>
                                        <td class="col-1" type="text" placeholder="type" id="type" name="type" value=""><?php echo $pokemon['Type'] ?></td>
                                        <td class="col-1"><input class="choose" type="checkbox" name="Pokemon1" value="<?php echo $pokemon['ID_pokemon'] ?>" onclick="onlyOne(this)" /></td>
                                    </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">
                <table class="table table-striped table-dark col-sm-4 table-hover">
                    <h4>Choisissez une potion</h4>
                    <thead>
                        <tr class="d-flex">
                            <th scope="col" class="col-2">Nom</th>
                            <th scope="col" class="col-1">Attribut</th>
                            <th scope="col" class="col-1">Choisir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $potion = new CombatDao();
                        $results = $potion->getAllPotions();
                        foreach ($results as $potion) { ?>
                            <tr class="d-flex">
                                <input type="hidden" placeholder="ID Potion" id="id" name="id" value="<?php echo $potion['ID_potion'] ?>" />
                                <td class="col-2" type="text" placeholder="nom" id="nom" name="nom" value=""><?php echo $potion['Nom'] ?></td>
                                <td class="col-1" type="number" placeholder="attribut" id="attribut" name="attribut" value=""><?php echo $potion['Attribut'] ?></td>
                                <td class="col-1"><input class="choose" type="checkbox" name="Potion1" value="<?php echo $potion['ID_potion'] ?>" onclick="onlyOne2(this)" /></td>
                            </tr>
</form>
<?php } ?>
</tbody>
</table>
</div>
</td>
</tr>
<br>
<tr>
    <td></td>
    <td></td>
    <td><input type="submit" name="" value="Combat" style="width:50%;" /></td>
    <td></td>
    <td></td>
</tr>
</form>
<br><br>
<script type="text/javascript" src="/views/assets/scripts/script.js"></script>