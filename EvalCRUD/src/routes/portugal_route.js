// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau Portugal
const portugalController = require("../controller/portugal_controller");

// C'est une route qui me permet de lire les données du tableau Portugal dans mon fichier data.json
// GET "/portugal"
// Ex: http://localhost:3000/portugal
router.get("/portugal", portugalController.getDataForPortugal);

//C'est une route qui me permet de récupérer une data par son id
//GET "/portugal/:id"
// Ex: http://localhost:3000/data/1
router.get("/portugal/:id", portugalController.getDataByIdForPortugal);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/portugal/:name"
// Ex: http://localhost:3000/data/1
router.get(
  "/portugal/search/:name",
  portugalController.getDataByNameForPortugal
);

// C'est une route qui me permet d'insérer des données dans mon tableau Portugal
// POST "/portugal"
// Ex: http://localhost:3000/data
router.post("/portugal", portugalController.createDataForPortugal);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/portugal/:id"
// Ex: http://localhost:3000/menu/1
router.put("/portugal/:id", portugalController.updateDataForPortugal);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/portugal/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/portugal/:id", portugalController.deleteDataForPortugal);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
