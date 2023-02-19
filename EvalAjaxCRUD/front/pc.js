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

  function getAllpcGames() {
    $.ajax({
      type: "GET",
      url: apiBaseUrl + "pc",
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

  function getpcGamesById() {
    let byId = document.getElementById("byId");
    const id = $("#id-pcGames").val();
    $.ajax({
      type: "GET",
      url: apiBaseUrl + "pc/" + id,
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

  function createpcGames() {
    let addpcGames = document.getElementById("add-pcGames-p");
    const pcGamesName = {
      name: $("#create-pcGames-name").val(),
      plateforme: $("#create-pcGames-pl").val(),
      support: $("#create-pcGames-supp").val(),
      note: $("#create-pcGames-note").val(),
      avancée: $("#create-pcGames-av").val(),
    };
    $.ajax({
      type: "POST",
      url: apiBaseUrl + "pc",
      data: JSON.stringify(pcGamesName),
      contentType: "application/json; charset=UTF-8",
      dataType: "json",
      success: (result) => {
        addpcGames.innerHTML =
          "Vous avez ajouté le jeu " + pcGamesName.name + " à la liste";
        getAllpcGames();
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

  function updatepcGamesById() {
    let updatepcGames = document.getElementById("update-pcGames-p");
    const id = $("#id-pcGames-update").val();
    const pcGamesName = {
      name: $("#name-pcGames-update").val(),
      plateforme: $("#update-pcGames-pl").val(),
      support: $("#update-pcGames-supp").val(),
      note: $("#update-pcGames-note").val(),
      avancée: $("#update-pcGames-av").val(),
    };
    $.ajax({
      type: "PUT",
      url: apiBaseUrl + "pc/" + id,
      contentType: "application/json; charset=UTF-8",
      data: JSON.stringify(pcGamesName),
      dataType: "json",
      success: (result) => {
        updatepcGames.innerHTML =
          "Vous avez bien mis à jour le jeu " + pcGamesName.name;
        getAllpcGames();
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

  function deletepcGamesById() {
    let deletepcGames = document.getElementById("byId");
    const id = $("#id-pcGames").val();
    $.ajax({
      type: "DELETE",
      url: apiBaseUrl + "pc/" + id,
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: (result) => {
        deletepcGames.innerHTML = "Le jeu a bien été supprimée";
        getAllpcGames();
        console.log(result);
      },
      error: (xhr, status, error) => {
        deletepcGames.innerHTML = "Aucun jeu trouvé avec l'Id " + id;
        console.log(xhr);
        console.log(status);
        console.log(error);
      },
    });
  }

  // Rajouter un eventlistener
  $("#create-button").click(createpcGames);
  $("#get-all-button").click(getAllpcGames);
  $("#get-by-id-button").click(getpcGamesById);
  $("#update-button").click(updatepcGamesById);
  $("#delete-by-id-button").click(deletepcGamesById);
});
