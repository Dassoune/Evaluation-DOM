// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau xbox
const xboxcontroller = require("../controller/xbox_controller");

// C'est une route qui me permet de lire les données du tableau xbox dans mon fichier data.json
// GET "/xbox"
// Ex: http://localhost:3000/xbox
router.get("/xbox", xboxcontroller.getDataForxbox);

//C'est une route qui me permet de récupérer une data par son id
//GET "/xbox/:id"
// Ex: http://localhost:3000/data/1
router.get("/xbox/:id", xboxcontroller.getDataByIdForxbox);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/xbox/:name"
// Ex: http://localhost:3000/data/1
router.get("/xbox/search/:name", xboxcontroller.getDataByNameForxbox);

// C'est une route qui me permet d'insérer des données dans mon tableau xbox
// POST "/xbox"
// Ex: http://localhost:3000/data
router.post("/xbox", xboxcontroller.createDataForxbox);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/xbox/:id"
// Ex: http://localhost:3000/menu/1
router.put("/xbox/:id", xboxcontroller.updateDataForxbox);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/xbox/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/xbox/:id", xboxcontroller.deleteDataForxbox);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
