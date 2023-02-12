// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau Portugal
const PortugalController = require("../controller/Portugal_controller");

// C'est une route qui me permet de lire les données du tableau Portugal dans mon fichier data.json
// GET "/Portugal"
// Ex: http://localhost:3000/Portugal
router.get("/Portugal", PortugalController.getDataPortugal);

//C'est une route qui me permet de récupérer une data par son id
//GET "/Portugal/:id"
// Ex: http://localhost:3000/data/1
router.get("/Portugal/:id", PortugalController.getDataByIdPortugal);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/Portugal/:name"
// Ex: http://localhost:3000/data/1
router.get("/Portugal/search/:name", PortugalController.getDataByNamePortugal);

// C'est une route qui me permet d'insérer des données dans mon tableau Portugal
// POST "/Portugal"
// Ex: http://localhost:3000/data
router.post("/Portugal", PortugalController.createDataPortugal);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/Portugal/:id"
// Ex: http://localhost:3000/menu/1
router.put("/Portugal/:id", PortugalController.updateDataPortugal);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/Portugal/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/Portugal/:id", PortugalController.deleteDataPortugal);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
