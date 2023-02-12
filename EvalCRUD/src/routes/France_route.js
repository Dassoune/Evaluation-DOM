// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau France
const FranceController = require("../controller/France_controller");

// C'est une route qui me permet de lire les données du tableau France dans mon fichier data.json
// GET "/France"
// Ex: http://localhost:3000/France
router.get("/France", FranceController.getDataFrance);

//C'est une route qui me permet de récupérer une data par son id
//GET "/France/:id"
// Ex: http://localhost:3000/data/1
router.get("/France/:id", FranceController.getDataByIdFrance);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/France/:name"
// Ex: http://localhost:3000/data/1
router.get("/France/search/:name", FranceController.getDataByNameFrance);

// C'est une route qui me permet d'insérer des données dans mon tableau France
// POST "/France"
// Ex: http://localhost:3000/data
router.post("/France", FranceController.createDataFrance);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/France/:id"
// Ex: http://localhost:3000/menu/1
router.put("/France/:id", FranceController.updateDataFrance);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/France/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/France/:id", FranceController.deleteDataFrance);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
