// On déclare une constante qui contiendra l'export du module express
const express = require("express");

// On déclare une constante qui lance une fonction express() qui crée une application express
const app = express();

// On déclare une constante qui contiendra l'export du module body-parser
const bodyParser = require("body-parser");

const cors = require("cors");

// On déclare nos constantes afin d'importer nos routes dans l'application
// const indexRoute = require("./src/routes/index_route");
const allGamesRoute = require("./src/routes/allGames_route");
const pcRoute = require("./src/routes/pc_route");
const playstationRoute = require("./src/routes/playstation_route");
const retroRoute = require("./src/routes/retro_route");
const switchRoute = require("./src/routes/switch_route");
const xboxRoute = require("./src/routes/xbox_route");

// On indique à Express d'utiliser bodyParser pour lire le contenu du body en json
app.use(bodyParser.json());

app.use(cors());

// On enregistre les différents routes de l'application
// app.use(indexRoute);
app.use(allGamesRoute);
app.use(pcRoute);
app.use(playstationRoute);
app.use(retroRoute);
app.use(switchRoute);
app.use(xboxRoute);

// On exporte la constante app pour la rendre utilisable dans les autres fichiers
module.exports = app;
