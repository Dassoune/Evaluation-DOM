// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau pc
const pccontroller = require("../controller/pc_controller");

// C'est une route qui me permet de lire les données du tableau pc dans mon fichier data.json
// GET "/pc"
// Ex: http://localhost:3000/pc
router.get("/pc", pccontroller.getDataForpc);

//C'est une route qui me permet de récupérer une data par son id
//GET "/pc/:id"
// Ex: http://localhost:3000/data/1
router.get("/pc/:id", pccontroller.getDataByIdForpc);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/pc/:name"
// Ex: http://localhost:3000/data/1
router.get(
  "/pc/search/:name",
  pccontroller.getDataByNameForpc
);

// C'est une route qui me permet d'insérer des données dans mon tableau pc
// POST "/pc"
// Ex: http://localhost:3000/data
router.post("/pc", pccontroller.createDataForpc);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/pc/:id"
// Ex: http://localhost:3000/menu/1
router.put("/pc/:id", pccontroller.updateDataForpc);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/pc/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/pc/:id", pccontroller.deleteDataForpc);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
