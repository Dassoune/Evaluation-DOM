// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau playstation
const playstationcontroller = require("../controller/playstation_controller");

// C'est une route qui me permet de lire les données du tableau playstation dans mon fichier data.json
// GET "/playstation"
// Ex: http://localhost:3000/playstation
router.get("/playstation", playstationcontroller.getDataForplaystation);

//C'est une route qui me permet de récupérer une data par son id
//GET "/playstation/:id"
// Ex: http://localhost:3000/data/1
router.get("/playstation/:id", playstationcontroller.getDataByIdForplaystation);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/playstation/:name"
// Ex: http://localhost:3000/data/1
router.get("/playstation/search/:name", playstationcontroller.getDataByNameForplaystation);

// C'est une route qui me permet d'insérer des données dans mon tableau playstation
// POST "/playstation"
// Ex: http://localhost:3000/data
router.post("/playstation", playstationcontroller.createDataForplaystation);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/playstation/:id"
// Ex: http://localhost:3000/menu/1
router.put("/playstation/:id", playstationcontroller.updateDataForplaystation);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/playstation/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/playstation/:id", playstationcontroller.deleteDataForplaystation);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
