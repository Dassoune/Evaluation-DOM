<?php

class Pokemon extends Personnage
{

    public function createPokemon()
    {
        if ($this->create()) {
            echo "Pokemon crée avec succès !";
        } else {
            echo "Erreur dans la création du Pokémon !";
        }
    }

    public function get()
    {
        $pokemon = new Personnage();
        $results['results'] = $pokemon->getAllPokemon();
        $this->set($results);
        $this->render('dashboard_admin');
       
    }

    public function delete()
    {
        $id = $_POST['id'];
        if ($this->deletePokemon($id)) {
            echo "Pokemon supprimé avec succès !";
        } else {
            echo "Erreur dans la suppression du Pokémon !";
    }
    }

    public function estVivant($pv)
    {   
        if ($pv > 0){
            return TRUE;
        }
    }

    public function boitPotion($pokemon,$potion)
    {
        if ($potion == 1 ){
            $result = $this->addPV($pokemon, 15);
        }
        if ($potion == 2 ){
            $result = $this->addPC($pokemon, 5);
        }
        return $result;
    }

    public function attaque($attaquant,$adversaire,$puissance)
    {
        echo $attaquant['Nom'] . ' attaque ' . $adversaire['Nom'];
        echo '<br>';
        echo $attaquant['Nom'] . ' inflige ' . $puissance . ' points de dégâts à ' . $adversaire['Nom'];
        echo '<br>';
        $result = $this->subPV($adversaire, $puissance);
        return $result;
    }

    public function addPV($pokemon, $nombre)
    {
        $pokemon['PV'] += $nombre;
        echo $pokemon['Nom']. ' boit une potion de soin... '. '<br>';
        echo $pokemon['Nom'] . " a récupéré " . $nombre . " points de vies !" . '<br>' ;
        return $nombre;
    }

    public function addPC($pokemon, $nombre){
        $pokemon['Puissance'] +=  $nombre;
        echo $pokemon['Nom'].' boit une potion de puissance... '. '<br>';
        echo $pokemon['Nom']. " a gagné ". $nombre. " points de combat" . '<br>';
        return $nombre;
    }

    public function subPV($pokemon, $nombre)
    {
        $this->pv - $nombre;
        echo "Il reste ". $pokemon['PV']. " points de vie à ". $pokemon['Nom'];
        echo "<br>";
        return $nombre;
    }

}
