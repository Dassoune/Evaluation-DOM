// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions des datas
const generalController = require("../controller/general_controller");

// C'est une route par défaut qui renvoie une chaine de caractères
// GET "/"
//exemple : http://localhost:3000/
router.get("/", generalController.default);

// C'est une route qui va permettre d'afficher toutes les données contenu dans le fichier data.json
// GET "/data"
// http://localhost:3000/data
router.get("/data", generalController.getAllData);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
