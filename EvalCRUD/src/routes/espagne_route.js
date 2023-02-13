// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau Espagne
const espagneController = require("../controller/espagne_controller");

// C'est une route qui me permet de lire les données du tableau Espagne dans mon fichier data.json
// GET "/espagne"
// Ex: http://localhost:3000/espagne
router.get("/espagne", espagneController.getDataForEspagne);

//C'est une route qui me permet de récupérer une data par son id
//GET "/espagne/:id"
// Ex: http://localhost:3000/data/1
router.get("/espagne/:id", espagneController.getDataByIdForEspagne);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/espagne/:name"
// Ex: http://localhost:3000/data/1
router.get("/espagne/search/:name", espagneController.getDataByNameForEspagne);

// C'est une route qui me permet d'insérer des données dans mon tableau Espagne
// POST "/espagne"
// Ex: http://localhost:3000/data
router.post("/espagne", espagneController.createDataForEspagne);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/espagne/:id"
// Ex: http://localhost:3000/menu/1
router.put("/espagne/:id", espagneController.updateDataForEspagne);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/espagne/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/espagne/:id", espagneController.deleteDataForEspagne);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
