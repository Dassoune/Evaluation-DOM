// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau Allemagne
const AllemagneController = require("../controller/Allemagne_controller");

// C'est une route qui me permet de lire les données du tableau Allemagne dans mon fichier data.json
// GET "/Allemagne"
// Ex: http://localhost:3000/Allemagne
router.get("/Allemagne", AllemagneController.getDataAllemagne);

//C'est une route qui me permet de récupérer une data par son id
//GET "/Allemagne/:id"
// Ex: http://localhost:3000/data/1
router.get("/Allemagne/:id", AllemagneController.getDataByIdAllemagne);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/Allemagne/:name"
// Ex: http://localhost:3000/data/1
router.get("/Allemagne/search/:name",AllemagneController.getDataByNameAllemagne);

// C'est une route qui me permet d'insérer des données dans mon tableau Allemagne
// POST "/Allemagne"
// Ex: http://localhost:3000/data
router.post("/Allemagne", AllemagneController.createDataAllemagne);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/Allemagne/:id"
// Ex: http://localhost:3000/menu/1
router.put("/Allemagne/:id", AllemagneController.updateDataAllemagne);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/Allemagne/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/Allemagne/:id", AllemagneController.deleteDataAllemagne);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
