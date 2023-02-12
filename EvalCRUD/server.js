//On importe la constante app qui provient du fichier app.js
const app = require("./app");

const port = 3000;
// On demande à Express d'exposer tout son contenue enregistré sur le port 3000 du serveur qui accueil l'application
app.listen(port, () => {
  // On lancera une chaine de caractères en terminal pour avoir un retour pour être sur que tout fonctionne
  console.log("l'application tourne sur le port " + port);
});
