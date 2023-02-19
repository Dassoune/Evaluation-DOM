Evaluation NodeJS + Ajax
================================================
## Utilisation du CRUD et d'AJAX

Dans cette évaluation, je vais vous montrer l'utilisation du CRUD et d'AJax sur un fichier JSON se trouvant dans :
```
src/model/data.json
```
Afin de m'ameliorer dans l'écriture et la compréhension du CRUD et d'Ajax, je vais créer un fichier controller.js et route.js et un fichier .html et .js pour la partie front pour chaque tableau du fichier data.json.
Il est biensur possible d'utiliser une route et un controlleur généric pour s'éviter la répétion des fichiers et nous verrons cela dans une prochaine mise à jour.
```
Création des fichiers génériques en attente
```

Les codes sources se trouvent dans les fichiers controller.js, dans le dossier :
```
api/src/controller/
```

Les listes des routers se trouvent dans les fichiers route.js, dans le dossier :
```
api/src/routes/
```

Les pages de la partie front se trouvent dans le dossier :
```
front/
```

## Liste des routes

Je vais vous présenter les routes utilisées et pour se faire j'utiliserais seulement l'exemple du tableau "PC" afin de ne pas réécrire 6 fois les mêmes explications. 
Il suffit par la suite de remplacer "pc" par le support souhaité.

| Routes | Verbe | Exemple | Description |
| --- | --- | --- | --- |
| / | GET | http://localhost:3000/ | C'est une route par défaut qui permet de s'assurer que le serveur fonctionne normalement |
| /data | GET | http://localhost:3000/data | C'est une route qui permet d'afficher le contenu du fichier data.json |
| /:arrayName | GET | http://localhost:3000/pc | C'est une route qui permet de récupérer le contenu d'un tableau dans le fichier data.json
| /:arrayName/:id | GET | http://localhost:3000/pc/1 | C'est une route qui permet de récupérer une entrée dans un tableau par son ID dans le fichier data.json |
| /:arrayName/:name | GET | http://localhost:3000/pc/Hearthstone | C'est une route qui permet de récupérer une entrée dans un tableau par son nom dans le fichier data.json |
| /:arrayName/ | POST | http://localhost:3000/pc/ | C'est une route qui permet de créer une entrée dans un tableau dans le fichier data.json |
| /:arrayName/:id | PUT | http://localhost:3000/pc/5 | C'est une route qui permet de mettre à jour une entrée dans un tableau dans le fichier data.json |
| /:arrayName/:id | DELETE | http://localhost:3000/pc/1 | C'est une route qui permet de supprimer une entrée dans un tableau dans le fichier data.json |
| | | |

## Liste des librairies utilisées

| Librairie | Version | Raison |
| --- | --- | --- |
| Express | 4.18.12 |  Express sert de middleware pour manipuler les requêtes entrantes et les réponses sortantes |
| Body-parser | 1.20.1 |  Body-parser sert à accepter les données entrées dans le body des requêtes entrantes |
| Fs | 0.0.1-security | Fs sert à manipuler (lire - écrire) les fichiers JSON |
| Nodemon | 2.0.20 | Nodemon sert uniquement pour le développeur afin d'avoir un serveur en LiveReload |
| Cors | 2.8.5 | Cors sert à gérer les requêtes provenant de sources différentes |
| | | |

## Installation et utilisation du projet

* Assurez vous d'être à la racine du projet. 
* Ouvrez un nouveau terminal
* Assurez vous d'avoir installé Node avec la commande node -v, sinon installez Node via  https://nodejs.org
* Installez les dépendances nécessaires (FS, Express, Body-parser, CORS) via la commande npm install fs express body-parser cors
* Installez la dépendance Nodemon en utilisant la commande npm install nodemon --dev-save afin d'installer la dépendance uniquement pour le develeppeur
* Lancez le serveur en utilisant la commande npm start
* Utilisez les routes présentées plus haut dans votre client serveur (ThunderClient ou autre) pour utiliser l'application
* Ouvrez la page index.html dans votre navigateur
* Utilisez l'application en suivant les indications