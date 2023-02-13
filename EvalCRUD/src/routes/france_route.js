// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau France
const franceController = require("../controller/france_controller");

// C'est une route qui me permet de lire les données du tableau France dans mon fichier data.json
// GET "/france"
// Ex: http://localhost:3000/france
router.get("/france", franceController.getDataForFrance);

//C'est une route qui me permet de récupérer une data par son id
//GET "/france/:id"
// Ex: http://localhost:3000/data/1
router.get("/france/:id", franceController.getDataByIdForFrance);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/france/:name"
// Ex: http://localhost:3000/data/1
router.get("/france/search/:name", franceController.getDataByNameForFrance);

// C'est une route qui me permet d'insérer des données dans mon tableau France
// POST "/france"
// Ex: http://localhost:3000/data
router.post("/france", franceController.createDataForFrance);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/france/:id"
// Ex: http://localhost:3000/menu/1
router.put("/france/:id", franceController.updateDataForFrance);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/france/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/france/:id", franceController.deleteDataForFrance);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
