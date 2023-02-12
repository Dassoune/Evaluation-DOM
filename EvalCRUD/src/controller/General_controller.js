// On déclare une constante qui contiendra l'export du module FS
const fs = require("fs");

// DEFAULT ROAD

// On envoi une requête par défaut
exports.default = (requete, response) => {
  // On renvoi un message pour signaler que le serveur répond
  response.send("Jusqu'ici tout va bien");
};

// GET ALL DATA

exports.getAllData = (request, response) => {
  // Lecture du contenu du fichier
  fs.readFile("./src/model/data.json", (err, data) => {
    // Si il y a une erreur dans la lecture on renvoie une erreur avec un message
    if (err) {
      response.status(500).json({
        message: "Erreur dans la lecture du fichier data",
        error: err,
      });
      // Sinon on renvoie le contenu du fichier data.json
    } else {
      response.status(200).json(JSON.parse(data));
    }
  });
};
