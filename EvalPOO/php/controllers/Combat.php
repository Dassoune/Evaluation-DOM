<?php

class Combat extends CombatDao
{

    public $idJoueur1;
    public $idJoueur2;
    public $idpokemon1;
    public $idpokemon2;
    public $idpotion1;
    public $idpotion2;
    public $date;

    public function get()
    {
        $classement = new CombatDao();
        $results['results'] = $classement->getAllPokemon();
        $this->set($results);
        $this->render('classement');
    }

    public function getName($id)
    {
        $db = connectDb();
        $sql = "SELECT Username FROM Users WHERE id =?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($id));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user['Username'];
    }

    public function getPokemon($id){
        $db = connectDb();
        $sql = "SELECT Nom FROM Pokemon WHERE ID_pokemon =?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($id));
        $pokemon = $stmt->fetch(PDO::FETCH_ASSOC);
        return $pokemon['Nom'];
    }

    public function getPotionById($id)
    {
        $db = connectDb();
        $sql = "SELECT * FROM Potion WHERE ID_potion =?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($id));
        $potion = $stmt->fetch(PDO::FETCH_ASSOC);
        return $potion;
        
    }

    public function goFight(){
        $this->render('combat');
    }

    public function fight()
    {
        echo "<br>";
        echo 'Le joueur ' . $this->idJoueur1['Username'] . ' se bat contre le joueur ' . $this-> idJoueur2['Username'];
        echo "<br>";
        echo $this-> idJoueur1['Username'] . ' a choisi ' . $this->idpokemon1['Nom'] . ' et ' . $this-> idJoueur2['Username'] . ' a choisi ' . $this-> idpokemon2['Nom'];
        echo "<br>";
        echo
        $this-> idJoueur1['Username'] . ' a choisi ' . $this->idpotion1['Nom'] . ' et ' . $this-> idJoueur2['Username'] . ' a choisi ' . $this-> idpotion2['Nom'];
        echo "<br>";
    }

    public function prepareFight()
    {
        $this->idpokemon1 = $_POST['Pokemon1'];
        $pokemon1 = $this->getPokemonById($this->idpokemon1);
        $pokemon1 = $pokemon1[0];

        $this->idpokemon2 = $this->randPokemon($pokemon1['ID_pokemon']);
        $pokemon2 = $this->idpokemon2[0];

        $this->idJoueur1 = $this->getDresseurById($_SESSION['id']);
        $dresseur1 = $this->idJoueur1[0];

        $dresseur2 = $this->randFighter($_SESSION['id']);
        $dresseur2 = $dresseur2[0];
        $this->idJoueur2 = $this->getDresseurById($dresseur2['ID']);

        $this->idpotion1 = $_POST['Potion1'];
        $potion1 = $this->getPotionById($this->idpotion1);
        $potion1 = $potion1;

        $this->idpotion2 = $this->randPotion($potion1['ID_potion']);
        $potion2 = $this->idpotion2[0];

        $combat = new Combat();
        $combat->idJoueur1 = $dresseur1['Username'];
        $combat->idJoueur2 = $dresseur2['Username'];
        $combat->idpokemon1 = $pokemon1['Nom'];
        $combat->idpokemon2 = $pokemon2['Nom'];
        $combat->idpotion1 = $potion1['Nom'];
        $combat->idpotion2 = $potion2['Nom'];
        date_default_timezone_set('Europe/Paris');
        $date = date('d-m-Y H:i');
        $combat->date = $date;

        $count = 1;
        $this->render('fight');
        echo "<br>";
        echo '<h2 style="text-align:center;">' . $dresseur1['Username'] . ' se bat contre ' . $dresseur2['Username'] . '</h2>';
        echo '<h3 style="text-align:center;">' . $dresseur1['Username'] . ' a choisi ' . $pokemon1['Nom'] . ' et ' . $dresseur2['Username'] . ' a choisi ' . $pokemon2['Nom'] . '</h3>';     
        echo
        '<h4 style="text-align:center;">' . $dresseur1['Username'] . ' a choisi la potion de ' . $potion1['Nom'] . ' et ' . $dresseur2['Username'] . ' a choisi la potion de ' . $potion2['Nom'] . '</h4>';
        echo "<br>";
        while ($count < 100) {
            echo "<br>";
            echo "<h3 style='text-align:center;'>Manche " . $count . "</h3>";
            echo "<br>";
            if ($count == 5) {
                echo "<br>";
                $this->boitPotion($pokemon1, $potion1['ID_potion']);
                if ($potion1['ID_potion'] == 1) {
                    $pokemon1['PV'] += 15;
                }
                if ($potion1['ID_potion'] == 2) {
                    $pokemon1['Puissance'] += 5;
                }
                echo "<br>";
                $this->boitPotion($pokemon2, $potion2['ID_potion']);
                if ($potion2['ID_potion'] == 1) {
                    $pokemon2['PV'] += 15;
                }
                if ($potion2['ID_potion'] == 2) {
                    $pokemon2['Puissance'] += 5;
                }
                echo "<br>";
            }
            if ($this->estVivant($pokemon1['PV'])) {
                $pokemon1['Puissance'] = $pokemon1['Puissance'];
                $manche = $combat->attaque($pokemon2, $pokemon1, $pokemon2['Puissance']);
                flush();
                sleep(1);
                $pokemon1['PV'] -= $manche;
            } else {
                echo $pokemon2['Nom'] . " attaque " . $pokemon1['Nom'] . " et lui inflige " . $pokemon2['Puissance'] . " points de dégâts";
                echo '<br>';
                echo $pokemon1['Nom'] . " est mort !";
                echo '<br>';
                echo $pokemon2['Nom'] . " a gagné ! ";
                $this->recordFight($dresseur1['ID'], $dresseur2['ID'], $pokemon1['ID_pokemon'], $pokemon2['ID_pokemon'], $potion1['ID_potion'], $potion2['ID_potion'], $dresseur2['ID'], $pokemon2['ID_pokemon'], $combat->date);
                $this->addPoints($dresseur2['ID']);
                die();
            }
            if ($this->estVivant($pokemon2['PV'])) {
                $pokemon2['Puissance'] = $pokemon2['Puissance'];
                $manche = $combat->attaque($pokemon1, $pokemon2, $pokemon1['Puissance']);
                flush();
                sleep(1);
                $pokemon2['PV'] -= $manche;
            } else {
                echo $pokemon1['Nom'] . " attaque " . $pokemon2['Nom'] . " et lui inflige " . $pokemon1['Puissance'] . " points de dégâts";
                echo '<br>';
                echo $pokemon2['Nom'] . " est mort!";
                echo '<br>';
                echo $pokemon1['Nom'] . " a gagné ! ";
                $this->recordFight($dresseur1['ID'], $dresseur2['ID'], $pokemon1['ID_pokemon'], $pokemon2['ID_pokemon'], $potion1['ID_potion'], $potion2['ID_potion'], $dresseur1['ID'], $pokemon1['ID_pokemon'], $combat->date);
                $this->addPoints($dresseur1['ID']);
                die();
            }
            $count++;
        }
        
        
    }
}
