// On déclare une constante qui contiendra l'export du module FS
const fs = require("fs");

// GET ALLEMAGNE

exports.getDataAllemagne = (request, response) => {
  // Lecture du contenu du fichier
  fs.readFile("./src/model/data.json/", (err, data) => {
    // Si il y a une erreur dans la lecture on renvoie une erreur avec un message
    if (err) {
      response.status(500).json({
        message: "Erreur dans la lecture du fichier data",
        error: err,
      });
    } else {
      // Sinon on renvoie le contenu du tableau Allemagne
      response.status(200).json(JSON.parse(data).Allemagne);
    }
  });
};

// GET BY ID ALLEMAGNE

exports.getDataByIdAllemagne = (request, response) => {
  // Lecture du contenu du fichier
  fs.readFile("./src/model/data.json/", (err, data) => {
    // Si il y a une erreur dans la lecture on renvoie une erreur avec un message
    if (err) {
      response.status(500).json({
        message: "Erreur dans la lecture du fichier data",
        error: err,
      });
    } else {
      // Sinon on stock les données existante dans une constante
      const jsonData = JSON.parse(data);
      // On cherche dans le tableau Allemagne si l'id demandé existe
      const dataById = jsonData.Allemagne.find(
        (obj) => obj.id === parseInt(request.params.id)
      );
      // Si on trouve un objet avec cet id
      if (dataById) {
        // On renvoie l'objet demandé
        response.status(200).json(dataById);
      } else {
        // Sinon on renvoi une erreur avec un message
        response.status(404).json({
          message: "Aucun objet trouvé avec cet ID",
        });
      }
    }
  });
};

// GET BY NAME ALLEMAGNE

exports.getDataByNameAllemagne = (request, response) => {
  // Lecture du contenu du fichier
  fs.readFile("./src/model/data.json/", (err, data) => {
    // Si il y a une erreur dans la lecture on renvoie une erreur avec un message
    if (err) {
      response.status(500).json({
        message: "Erreur dans la lecture du fichier data",
        error: err,
      });
    } else {
      // Sinon on stock les données existante dans une constante
      const jsonData = JSON.parse(data);
      // On cherche dans le tableau Allemagne si le nom demandé existe
      const dataByName = jsonData.Allemagne.find(
        (obj) => obj.name === request.params.name
      );
      // Si on trouve un objet avec ce nom
      if (dataByName) {
        // On renvoie l'objet demandé
        response.status(200).json(dataByName);
      } else {
        // Sinon on renvoi une erreur avec un message
        response.status(404).json({
          message: "Aucun objet trouvé avec ce nom",
        });
      }
    }
  });
};

// POST ALLEMAGNE

exports.createDataAllemagne = (request, response) => {
  // Lecture du contenu du fichier
  fs.readFile("./src/model/data.json/", (err, data) => {
    // Si il y a une erreur dans la lecture on renvoie une erreur avec un message
    if (err) {
      response.status(500).json({
        message: "Erreur dans la lecture du fichier data",
        error: err,
      });
    } else {
      // Sinon on stock la longueur+1 du tableau Allemagne dans une constante
      const newID = JSON.parse(data).Allemagne.length + 1;
      // On crée et on stock dans une constante un nouvel objet avec le nouvel ID ainsi que le nom du fichier écrit dans le body
      const newCountry = {
        id: newID,
        name: request.body.name,
      };
      // On stock les données existante dans une constante
      const existingData = JSON.parse(data);
      // On push le nouvel objet dans le tableau Allemagne
      existingData.Allemagne.push(newCountry);
      fs.writeFile(
        "./src/model/data.json/",
        JSON.stringify(existingData),
        (writeErr) => {
          // Si il y a une erreur dans l'écriture on renvoie une erreur avec un message
          if (writeErr) {
            response.status(500).json({
              message: "Erreur dans l'écriture des données",
            });
          } else {
            // Sinon on renvoi un message de confirmation de l'ajout du nouvel objet
            response.status(200).json({
              message: "Les données ont été ajoutées avec succès !",
            });
          }
        }
      );
    }
  });
};

// PUT ALLEMAGNE

exports.updateDataAllemagne = (request, response) => {
  // Lecture du contenu du fichier
  fs.readFile("./src/model/data.json", (err, data) => {
    // Si il y a une erreur dans la lecture on renvoie une erreur avec un message
    if (err) {
      response.status(500).json({
        message: "Une erreur est survenue lors de la lecture des données",
        error: err,
      });
    } else {
      // On stock les données existante dans une constante
      const existingData = JSON.parse(data);
      // On cherche dans le tableau Allemagne si l'id demandé existe
      const dataById = existingData.Allemagne.find(
        (obj) => obj.id === parseInt(request.params.id)
      );
      if (!dataById) {
        // Si aucun objet avec cet ID n'est trouvé on renvoi une erreur avec un message
        response.status(404).json({
          message: "Aucun objet trouvé avec cet id",
          error: err,
        });
      } else {
        // On applique les modifications
        dataById.name = request.body.name;
        // On écrit les modifications dans le tableau Allemagne
        fs.writeFile(
          "./src/model/data.json",
          JSON.stringify(existingData),
          (writeErr) => {
            // Si il y a une erreur dans l'écriture on renvoie une erreur avec un message
            if (writeErr) {
              response.status(500).json({
                message:
                  "Une erreur est survenue lors de l'écriture des données",
              });
            } else {
              // Sinon on renvoi un message de confirmation de la mise à jour de l'objet
              response.status(200).json({
                message: "Les données ont été mises à jour avec succès",
              });
            }
          }
        );
      }
    }
  });
};

// DELETE ALLEMAGNE

exports.deleteDataAllemagne = (request, response) => {
  // Lecture du contenu du fichier
  fs.readFile("./src/model/data.json", (err, data) => {
    // Si il y a une erreur dans la lecture on renvoie une erreur avec un message
    if (err) {
      response.status(500).json({
        message: "Une erreur est survenue lors de la lecture des données",
        error: err,
      });
    } else {
      // On stock les données existante dans une constante
      const existingData = JSON.parse(data);
      // On cherche dans le tableau Allemagne si l'id demandé existe
      const dataById = existingData.Allemagne.find(
        (obj) => obj.id === parseInt(request.params.id)
      );
      if (!dataById) {
        // Si aucun objet avec cet ID n'est trouvé on renvoi une erreur avec un message
        response.status(404).json({
          message: "Aucun objet trouvé avec cet id",
          error: err,
        });
      } else {
        // On supprime l'objet en le définissant "vide"
        existingData.Allemagne = existingData.Allemagne.filter(
          (obj) => obj.id != parseInt(request.params.id)
        );
        // On écrit les modifications dans le tableau Allemagne
        fs.writeFile(
          "./src/model/data.json",
          JSON.stringify(existingData),
          (writeErr) => {
            // Si il y a une erreur dans la suppression on renvoie une erreur avec un message
            if (writeErr) {
              response.status(500).json({
                message:
                  "Une erreur est survenue lors de la suppression des données",
                error: err,
              });
            } else {
              // Sinon on renvoi un message de confirmation de la suppression de l'objet
              response.status(200).json({
                message: "Les données ont été supprimées avec succès",
              });
            }
          }
        );
      }
    }
  });
};
