// On déclare une constante qui contiendra l'export du module Express
const express = require("express");
// On déclare une constante pour stocker les routes grace à la fonction router du module Express
const router = express.Router();
// On déclare une constante pour définier le chemin vers les fonctions du tableau retro
const retrocontroller = require("../controller/retro_controller");

// C'est une route qui me permet de lire les données du tableau retro dans mon fichier data.json
// GET "/retro"
// Ex: http://localhost:3000/retro
router.get("/retro", retrocontroller.getDataForretro);

//C'est une route qui me permet de récupérer une data par son id
//GET "/retro/:id"
// Ex: http://localhost:3000/data/1
router.get("/retro/:id", retrocontroller.getDataByIdForretro);

//C'est une route qui me permet de récupérer une data par son nom
//GET "/retro/:name"
// Ex: http://localhost:3000/data/1
router.get(
  "/retro/search/:name",
  retrocontroller.getDataByNameForretro
);

// C'est une route qui me permet d'insérer des données dans mon tableau retro
// POST "/retro"
// Ex: http://localhost:3000/data
router.post("/retro", retrocontroller.createDataForretro);

// C'est une route qui permet de mettre à jour une donnée en se basant sur son ID
// PUT "/retro/:id"
// Ex: http://localhost:3000/menu/1
router.put("/retro/:id", retrocontroller.updateDataForretro);

// C'est une route qui permet de supprimer une donnée en se basant sur son ID
// DELETE "/retro/:id"
// Ex: http://localhost:3000/menu/1
router.delete(
  "/retro/:id",
  retrocontroller.deleteDataForretro
);

// On exporte la fonction router() pour la rendre utilisable dans l'application
module.exports = router;
