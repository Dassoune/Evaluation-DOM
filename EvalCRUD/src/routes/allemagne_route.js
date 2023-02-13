// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau Allemagne
const allemagnecontroller = require("../controller/allemagne_controller");

// C'est une route qui me permet de lire les données du tableau Allemagne dans mon fichier data.json
// GET "/allemagne"
// Ex: http://localhost:3000/allemagne
router.get("/allemagne", allemagnecontroller.getDataForAllemagne);

//C'est une route qui me permet de récupérer une data par son id
//GET "/allemagne/:id"
// Ex: http://localhost:3000/data/1
router.get("/allemagne/:id", allemagnecontroller.getDataByIdForAllemagne);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/allemagne/:name"
// Ex: http://localhost:3000/data/1
router.get(
  "/allemagne/search/:name",
  allemagnecontroller.getDataByNameForAllemagne
);

// C'est une route qui me permet d'insérer des données dans mon tableau Allemagne
// POST "/allemagne"
// Ex: http://localhost:3000/data
router.post("/allemagne", allemagnecontroller.createDataForAllemagne);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/allemagne/:id"
// Ex: http://localhost:3000/menu/1
router.put("/allemagne/:id", allemagnecontroller.updateDataForAllemagne);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/allemagne/:id"
// Ex: http://localhost:3000/menu/1
router.delete("/allemagne/:id", allemagnecontroller.deleteDataForAllemagne);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
