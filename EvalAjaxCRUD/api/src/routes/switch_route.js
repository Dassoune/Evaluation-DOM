// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau switch
const switchcontroller = require("../controller/switch_controller");

// C'est une route qui me permet de lire les données du tableau switch dans mon fichier data.json
// GET "/switch"
// Ex: http://localhost:3000/switch
router.get("/switch", switchcontroller.getDataForswitch);

//C'est une route qui me permet de récupérer une data par son id
//GET "/switch/:id"
// Ex: http://localhost:3000/data/1
router.get("/switch/:id", switchcontroller.getDataByIdForswitch);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/switch/:name"
// Ex: http://localhost:3000/data/1
router.get("/switch/search/:name", switchcontroller.getDataByNameForswitch);

// C'est une route qui me permet d'insérer des données dans mon tableau switch
// POST "/switch"
// Ex: http://localhost:3000/data
router.post("/switch", switchcontroller.createDataForswitch);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/switch/:id"
// Ex: http://localhost:3000/menu/1
router.put("/switch/:id", switchcontroller.updateDataForswitch);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/switch/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/switch/:id", switchcontroller.deleteDataForswitch);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
