// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau Italie
const ItalieController = require("../controller/Italie_controller");

// C'est une route qui me permet de lire les données du tableau Italie dans mon fichier data.json
// GET "/Italie"
// Ex: http://localhost:3000/Italie
router.get("/Italie", ItalieController.getDataItalie);

//C'est une route qui me permet de récupérer une data par son id
//GET "/Italie/:id"
// Ex: http://localhost:3000/data/1
router.get("/Italie/:id", ItalieController.getDataByIdItalie);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/Italie/:name"
// Ex: http://localhost:3000/data/1
router.get("/Italie/search/:name", ItalieController.getDataByNameItalie);

// C'est une route qui me permet d'insérer des données dans mon tableau Italie
// POST "/Italie"
// Ex: http://localhost:3000/data
router.post("/Italie", ItalieController.createDataItalie);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/Italie/:id"
// Ex: http://localhost:3000/menu/1
router.put("/Italie/:id", ItalieController.updateDataItalie);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/Italie/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/Italie/:id", ItalieController.deleteDataItalie);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
