<?php

class Personnage extends Controller
{
    public $id;
    public $nom;
    public $pv;
    public $pvMax;
    public $puissance;
    public $type;
    public $potion;

    public function __construct()
    {
        // $this->nom = $nom;
        // $this->pv = $pv;
        // $this->pvMax = $pvMax;
        // $this->puissance = $puissance;
        // $this->type = $type;
    }

    public function create()
    {
        $nom = $_POST['nom'];
        $pv = $_POST['pv'];
        $pvMax = $_POST['pvMax'];
        $puissance = $_POST['puissance'];
        $type = $_POST['type'];
        $db = connectDb();
        $sql = "INSERT INTO Pokemon (nom,pv,pvMax,puissance,type)
              VALUES ('$nom','$pv','$pvMax','$puissance','$type')";
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function deletePokemon($id)
    {
        $db = connectDb();
        $sql = "DELETE FROM Pokemon WHERE id='$id'";
        $stmt = $db->prepare($sql);
        if ($stmt->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
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

    public function getOne($idPokemon)
    {

        $db = connectDb();
        $sql = "SELECT * FROM Pokemon WHERE ID_pokemon = $idPokemon";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
}
