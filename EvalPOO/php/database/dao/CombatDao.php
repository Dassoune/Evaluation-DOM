<?php

class CombatDao extends Pokemon
{

    
    public function getPokemonById($id)
    {
        $db = connectDb();
        $sql = "SELECT * FROM Pokemon WHERE ID_pokemon =?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($id));
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getDresseurById($id)
    {
        $db = connectDb();
        $sql = "SELECT * FROM Users WHERE ID =?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($id));
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllPokemon()
    {
        $db = connectDb();
        $sql = "SELECT * FROM Pokemon";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }

    public function getAllPotions()
    {
        $db = connectDb();
        $sql = "SELECT * FROM Potion";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }

    public function getPotionById($id)
    {
        $db = connectDb();
        $sql = "SELECT * FROM Potion WHERE ID_potion = $id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }

    public function getAllFights()
    {
        $db = connectDb();
        $sql = "SELECT * FROM Combat
        INNER JOIN Pokemon ON Pokemon.ID_pokemon = Combat.ID_pokemon1 AND Combat.ID_pokemon2
        INNER JOIN Potion ON Potion.ID_potion = Combat.ID_potion1 AND Combat.ID_potion2
        INNER JOIN Users ON Users.ID = Combat.ID_joueur1 AND Combat.ID_joueur2
        ORDER BY Date DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }

    public function topPlayers()
    {
        $db = connectDb();
        $sql = "SELECT * FROM Users
        ORDER BY Score DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }

    public function randPokemon($data)
    {  $db = connectDB();
        $sql = "SELECT * FROM Pokemon WHERE ID_pokemon <> '$data' ORDER BY RAND() LIMIT 1";
        $stmt = $db->query($sql);
        $randPokemon = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $randPokemon;
    }

    public function randFighter($data)
    {
        $db = connectDB();
        $sql = "SELECT * FROM Users WHERE ID <> '$data' ORDER BY RAND() LIMIT 1";
        $stmt = $db->query($sql);
        $randFighter = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $randFighter;
    }

    public function randPotion($data)
    {
        $db = connectDB();
        $sql = "SELECT * FROM Potion WHERE ID_potion <> '$data' ORDER BY RAND() LIMIT 1";
        $stmt = $db->query($sql);
        $randPotion = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $randPotion;
    }

    public function recordFight($ID_joueur1, $ID_joueur2, $ID_pokemon1, $ID_pokemon2, $ID_potion1, $ID_potion2, $ID_vainqueur, $ID_pokemon_vainqueur, $Date){
        $db = connectDB();
        $sql = "INSERT INTO Combat (ID_joueur1, ID_joueur2, ID_pokemon1, ID_pokemon2, ID_potion1, ID_potion2, ID_vainqueur, ID_pokemon_vainqueur, Date) VALUES ('$ID_joueur1', '$ID_joueur2', '$ID_pokemon1', '$ID_pokemon2', '$ID_potion1', '$ID_potion2', '$ID_vainqueur', '$ID_pokemon_vainqueur', '$Date')";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }

    public function addPoints($joueur)
    {
        $db = connectDB();
        $sql = "UPDATE Users SET Score = Score + 3 WHERE ID = $joueur";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }

    public function getAllFightsById($id)
    {
        $db = connectDb();
        $sql = "SELECT * FROM Combat WHERE ID_joueur1 = '$id' OR ID_joueur2 = '$id'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }

    public function calculWinner($id){
        $db = connectDB();
        $sql = "SELECT * FROM Combat WHERE ID_vainqueur = '$id'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return count($results);
    }

    public function pourcentage($id){
        $victoires = $this->calculWinner($id);
        $nbCombats = $this->getAllFightsById($id);
        $nbCombats = count($nbCombats);

        $percent = $victoires / $nbCombats * 100;
        return intval($percent);
    }
}