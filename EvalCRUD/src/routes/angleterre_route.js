// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau Angleterre
const angleterreController = require("../controller/angleterre_controller");

// C'est une route qui me permet de lire les données du tableau Angleterre dans mon fichier data.json
// GET "/angleterre"
// Ex: http://localhost:3000/angleterre
router.get("/angleterre", angleterreController.getDataForAngleterre);

//C'est une route qui me permet de récupérer une data par son id
//GET "/angleterre/:id"
// Ex: http://localhost:3000/data/1
router.get("/angleterre/:id", angleterreController.getDataByIdForAngleterre);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/angleterre/:name"
// Ex: http://localhost:3000/data/1
router.get(
  "/angleterre/search/:name",
  angleterreController.getDataByNameForAngleterre
);

// C'est une route qui me permet d'insérer des données dans mon tableau Angleterre
// POST "/angleterre"
// Ex: http://localhost:3000/data
router.post("/angleterre", angleterreController.createDataForAngleterre);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/angleterre/:id"
// Ex: http://localhost:3000/menu/1
router.put("/angleterre/:id", angleterreController.updateDataForAngleterre);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/angleterre/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/angleterre/:id", angleterreController.deleteDataForAngleterre);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
