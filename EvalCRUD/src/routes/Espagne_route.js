// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau Espagne
const EspagneController = require("../controller/Espagne_controller");

// C'est une route qui me permet de lire les données du tableau Espagne dans mon fichier data.json
// GET "/Espagne"
// Ex: http://localhost:3000/Espagne
router.get("/Espagne", EspagneController.getDataEspagne);

//C'est une route qui me permet de récupérer une data par son id
//GET "/Espagne/:id"
// Ex: http://localhost:3000/data/1
router.get("/Espagne/:id", EspagneController.getDataByIdEspagne);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/Espagne/:name"
// Ex: http://localhost:3000/data/1
router.get(
  "/Espagne/search/:name",
  EspagneController.getDataByNameEspagne
);

// C'est une route qui me permet d'insérer des données dans mon tableau Espagne
// POST "/Espagne"
// Ex: http://localhost:3000/data
router.post("/Espagne", EspagneController.createDataEspagne);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/Espagne/:id"
// Ex: http://localhost:3000/menu/1
router.put("/Espagne/:id", EspagneController.updateDataEspagne);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/Espagne/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/Espagne/:id", EspagneController.deleteDataEspagne);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
