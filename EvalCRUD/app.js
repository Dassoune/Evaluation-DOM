// On déclare une constante qui contiendra l'export du module express
const express = require("express");

// On déclare une constante qui lance une fonction express() qui crée une application express
const app = express();

// On déclare une constante qui contiendra l'export du module body-parser
const bodyParser = require("body-parser");

// On déclare nos constantes afin d'importer nos routes dans l'application
const generalRoute = require("./src/routes/general_route");
const allemagneRoute = require("./src/routes/allemagne_route");
const angleterreRoute = require("./src/routes/angleterre_route");
const espagneRoute = require("./src/routes/espagne_route");
const franceRoute = require("./src/routes/france_route");
const italieRoute = require("./src/routes/italie_route");
const portugalRoute = require("./src/routes/portugal_route");

// On indique à Express d'utiliser bodyParser pour lire le contenu du body en json
app.use(bodyParser.json());

// On enregistre les différents routes de l'application
app.use(generalRoute);
app.use(allemagneRoute);
app.use(angleterreRoute);
app.use(espagneRoute);
app.use(franceRoute);
app.use(italieRoute);
app.use(portugalRoute);

// On exporte la constante app pour la rendre utilisable dans les autres fichiers
module.exports = app;
