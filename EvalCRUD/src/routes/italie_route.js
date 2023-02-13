// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau Italie
const italieController = require("../controller/italie_controller");

// C'est une route qui me permet de lire les données du tableau Italie dans mon fichier data.json
// GET "/italie"
// Ex: http://localhost:3000/Italie
router.get("/italie", italieController.getDataForItalie);

//C'est une route qui me permet de récupérer une data par son id
//GET "/italie/:id"
// Ex: http://localhost:3000/data/1
router.get("/italie/:id", italieController.getDataByIdForItalie);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/italie/:name"
// Ex: http://localhost:3000/data/1
router.get("/italie/search/:name", italieController.getDataByNameForItalie);

// C'est une route qui me permet d'insérer des données dans mon tableau Italie
// POST "/italie"
// Ex: http://localhost:3000/data
router.post("/italie", italieController.createDataForItalie);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/italie/:id"
// Ex: http://localhost:3000/menu/1
router.put("/italie/:id", italieController.updateDataForItalie);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/italie/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/italie/:id", italieController.deleteDataForItalie);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
