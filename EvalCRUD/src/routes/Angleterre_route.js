// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau Angleterre
const AngleterreController = require("../controller/Angleterre_controller");

// C'est une route qui me permet de lire les données du tableau Angleterre dans mon fichier data.json
// GET "/Angleterre"
// Ex: http://localhost:3000/Angleterre
router.get("/Angleterre", AngleterreController.getDataAngleterre);

//C'est une route qui me permet de récupérer une data par son id
//GET "/Angleterre/:id"
// Ex: http://localhost:3000/data/1
router.get("/Angleterre/:id", AngleterreController.getDataByIdAngleterre);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/Angleterre/:name"
// Ex: http://localhost:3000/data/1
router.get(
  "/Angleterre/search/:name",
  AngleterreController.getDataByNameAngleterre
);

// C'est une route qui me permet d'insérer des données dans mon tableau Angleterre
// POST "/Angleterre"
// Ex: http://localhost:3000/data
router.post("/Angleterre", AngleterreController.createDataAngleterre);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/Angleterre/:id"
// Ex: http://localhost:3000/menu/1
router.put("/Angleterre/:id", AngleterreController.updateDataAngleterre);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/Angleterre/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/Angleterre/:id", AngleterreController.deleteDataAngleterre);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
