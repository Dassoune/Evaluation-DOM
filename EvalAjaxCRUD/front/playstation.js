document.getElementById("banniere").onclick = function returnToIndex() {
  location.href = "./index.html";
};

document.getElementById("pc-btn").onclick = function pcPage() {
  location.href = "./pc.html";
};

document.getElementById("playstation-btn").onclick =
  function playstationPage() {
    location.href = "./playstation.html";
  };

document.getElementById("xbox-btn").onclick = function xboxPage() {
  location.href = "./xbox.html";
};

document.getElementById("switch-btn").onclick = function switchPage() {
  location.href = "./switch.html";
};

document.getElementById("retro-btn").onclick = function retroPage() {
  location.href = "./retro.html";
};

document.getElementById("allgames-btn").onclick = function allGamesPage() {
  location.href = "./tous.html";
};

$(document).ready(() => {
  const apiBaseUrl = "http://localhost:3000/";

  function getAllPlaystationGames() {
    $.ajax({
      type: "GET",
      url: apiBaseUrl + "playstation",
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: (result) => {
        let html = "";
        let tab = document.getElementById("all-games-table");
        result.forEach((obj) => {
          html +=
            "<tr>" +
            "<td>" +
            obj.id +
            "</td>" +
            "<td>" +
            obj.name +
            "</td>" +
            "<td>" +
            obj.plateforme +
            "</td>" +
            "<td>" +
            obj.support +
            "</td>" +
            "<td>" +
            obj.note +
            "</td>" +
            "<td>" +
            obj.avancée +
            "</td>" +
            "</tr>";
          tab.innerHTML = html;
        });
        $("#test").html(tab);
      },
      error: (xhr, status, error) => {
        console.log(xhr);
        alert("status: " + status + "error: " + error);
      },
    });
  }

  function getPlaystationGamesById() {
    let byId = document.getElementById("byId");
    const id = $("#id-PlaystationGames").val();
    $.ajax({
      type: "GET",
      url: apiBaseUrl + "playstation/" + id,
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: (result) => {
        byId.innerHTML =
          " Pour l'id " + result.id + "," + " le jeu est " + result.name;
        console.log(result);
      },
      error: (xhr, status, error) => {
        byId.innerHTML = "Aucun jeu trouvé avec l'Id " + id;
        console.log(xhr);
        console.log(status);
        console.log(error);
      },
    });
  }

  function createPlaystationGames() {
    let addPlaystationGames = document.getElementById("add-PlaystationGames-p");
    const PlaystationGamesName = {
      name: $("#create-PlaystationGames-name").val(),
      plateforme: $("#create-PlaystationGames-pl").val(),
      support: $("#create-PlaystationGames-supp").val(),
      note: $("#create-PlaystationGames-note").val(),
      avancée: $("#create-PlaystationGames-av").val(),
    };
    $.ajax({
      type: "POST",
      url: apiBaseUrl + "playstation",
      data: JSON.stringify(PlaystationGamesName),
      contentType: "application/json; charset=UTF-8",
      dataType: "json",
      success: (result) => {
        addPlaystationGames.innerHTML =
          "Vous avez ajouté le jeu " +
          PlaystationGamesName.name +
          " à la liste";
        getAllPlaystationGames();
        console.log(result);
      },
      error: (xhr, status, error) => {
        console.log(xhr);
        console.log(status);
        console.log(error);
        alert("status: " + status + "error: " + error);
      },
    });
  }

  function updatePlaystationGamesById() {
    let updatePlaystationGames = document.getElementById(
      "update-PlaystationGames-p"
    );
    const id = $("#id-PlaystationGames-update").val();
    const PlaystationGamesName = {
      name: $("#name-PlaystationGames-update").val(),
      plateforme: $("#update-PlaystationGames-pl").val(),
      support: $("#update-PlaystationGames-supp").val(),
      note: $("#update-PlaystationGames-note").val(),
      avancée: $("#update-PlaystationGames-av").val(),
    };
    $.ajax({
      type: "PUT",
      url: apiBaseUrl + "playstation/" + id,
      contentType: "application/json; charset=UTF-8",
      data: JSON.stringify(PlaystationGamesName),
      dataType: "json",
      success: (result) => {
        updatePlaystationGames.innerHTML =
          "Vous avez bien mis à jour le jeu " + PlaystationGamesName.name;
        getAllPlaystationGames();
        console.log(result);
      },
      error: (xhr, status, error) => {
        console.log(xhr);
        console.log(status);
        console.log(error);
        alert("status: " + status + "error: " + error);
      },
    });
  }

  function deletePlaystationGamesById() {
    let deletePlaystationGames = document.getElementById("byId");
    const id = $("#id-PlaystationGames").val();
    $.ajax({
      type: "DELETE",
      url: apiBaseUrl + "playstation/" + id,
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: (result) => {
        deletePlaystationGames.innerHTML = "Le jeu a bien été supprimée";
        getAllPlaystationGames();
        console.log(result);
      },
      error: (xhr, status, error) => {
        deletePlaystationGames.innerHTML = "Aucun jeu trouvé avec l'Id " + id;
        console.log(xhr);
        console.log(status);
        console.log(error);
      },
    });
  }

  // Rajouter un eventlistener
  $("#create-button").click(createPlaystationGames);
  $("#get-all-button").click(getAllPlaystationGames);
  $("#get-by-id-button").click(getPlaystationGamesById);
  $("#update-button").click(updatePlaystationGamesById);
  $("#delete-by-id-button").click(deletePlaystationGamesById);
});
