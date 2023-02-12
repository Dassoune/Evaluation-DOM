// On déclare une constante qui contiendra l'export du module express
const express = require("express");

// On déclare une constante qui lance une fonction express() qui crée une application express
const app = express();

// On déclare une constante qui contiendra l'export du module body-parser
const bodyParser = require("body-parser");

// On déclare nos constantes afin d'importer nos routes dans l'application
const GeneralRoute = require("./src/routes/General_route");
const AllemagneRoute = require("./src/routes/Allemagne_route");
const AngleterreRoute = require("./src/routes/Angleterre_route");
const EspagneRoute = require("./src/routes/Espagne_route");
const FranceRoute = require("./src/routes/France_route");
const ItalieRoute = require("./src/routes/Italie_route");
const PortugalRoute = require("./src/routes/Portugal_route");

// On indique à Express d'utiliser bodyParser pour lire le contenu du body en json
app.use(bodyParser.json());

// On enregistre les différents routes de l'application
app.use(GeneralRoute);
app.use(AllemagneRoute);
app.use(AngleterreRoute);
app.use(EspagneRoute);
app.use(FranceRoute);
app.use(ItalieRoute);
app.use(PortugalRoute);

// On exporte la constante app pour la rendre utilisable dans les autres fichiers
module.exports = app;
