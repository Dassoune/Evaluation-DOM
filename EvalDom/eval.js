// Ici l'event du bouton toggle pour afficher/cacher la barre de nav

let nav = document.querySelector("#navwrap > div");

if (nav.style.display === "none") {
  nav.style.display = "block";
} else {
  nav.style.display = "none";
}
let button = document.querySelector("#navwrap > button");

button.addEventListener("click", function () {
  let nav = this.nextElementSibling;
  nav.style.display = nav.style.display === "none" ? "block" : "none";
}),
  false;

// Ici la fonction pour afficher les contenus des menus sur la page
function openCity(evt, number) {
  let i, menu, tablinks;
  menu = document.getElementsByClassName("menu");
  for (i = 0; i < menu.length; i++) {
    menu[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(number).style.display = "block";
  evt.currentTarget.className += " active";
}

function survol(param) {
  document.getElementById("rendu").src = param;
}

function insert_Row() {
  let input1 = document.getElementById("input1").value;
  let input2 = document.getElementById("input2").value;
  let tableRow = document.getElementById("sampleTable");
  let row = tableRow.insertRow(-1);
  let cell1 = row.insertCell(0);
  let cell2 = row.insertCell(1);
  cell1.innerHTML = input1;
  cell2.innerHTML = input2;
}

function js_style(element) {
  let text1 = document.getElementById("text1");
  var styl = element.selectedIndex;

  if (styl === 0) {
    text1.style.backgroundColor = "white";
    text1.style.color = "black";
  }

  if (styl === 1) {
    text1.style.backgroundColor = "purple";
    text1.style.color = "pink";
  }

  if (styl === 2) {
    text1.style.backgroundColor = "blue";
    text1.style.color = "yellow";
  }
  if (styl === 3) {
    text1.style.backgroundColor = "green";
    text1.style.color = "black";
  }
  if (styl === 4) {
    text1.style.backgroundColor =
      "rgb(" +
      Math.floor(Math.random() * 256) +
      "," +
      Math.floor(Math.random() * 256) +
      "," +
      Math.floor(Math.random() * 256) +
      ")";
    text1.style.color = "black";
  }
}

let array_list = document.getElementsByClassName("thelist");
let le1 = array_list[0];
let le2 = array_list[1];
let le3 = array_list[2];
let le4 = array_list[3];
let le5 = array_list[4];
let le6 = array_list[5];

function haut() {
  if (le1 == array_list[1]) {
    le2.insertAdjacentElement("beforebegin", le1);
  } else if (le1 == array_list[2]) {
    le3.insertAdjacentElement("beforebegin", le1);
  } else if (le1 == array_list[3]) {
    le4.insertAdjacentElement("beforebegin", le1);
  } else if (le1 == array_list[4]) {
    le5.insertAdjacentElement("beforebegin", le1);
  } else if (le1 == array_list[5]) {
    le6.insertAdjacentElement("beforebegin", le1);
  } else if (le1 == array_list[0]) {
    le6.insertAdjacentElement("afterend", le1);
  }
  console.log(array_list);
}

function bas() {
  if (le1 == array_list[0]) {
    le2.insertAdjacentElement("afterend", le1);
  } else if (le1 == array_list[1]) {
    le3.insertAdjacentElement("afterend", le1);
  } else if (le1 == array_list[2]) {
    le4.insertAdjacentElement("afterend", le1);
  } else if (le1 == array_list[3]) {
    le5.insertAdjacentElement("afterend", le1);
  } else if (le1 == array_list[4]) {
    le6.insertAdjacentElement("afterend", le1);
  } else if (le1 == array_list[5]) {
    le2.insertAdjacentElement("beforebegin", le1);
  }
}

function addchoice() {
  let ajout = document.getElementById("check").checked;
  let ajout2 = document.getElementById("check2").checked;
  let ajout3 = document.getElementById("check3").checked;
  let ajout4 = document.getElementById("check4").checked;

  if (ajout === true) {
    let ajout = document.getElementById("check").value;
    checkopt1.appendChild(document.createElement("option"));
    let lastopt = checkopt1[checkopt1.length - 1];
    lastopt.innerHTML = ajout;
  }
  if (ajout2 === true) {
    let ajout2 = document.getElementById("check2").value;
    checkopt1.appendChild(document.createElement("option"));
    let lastopt = checkopt1[checkopt1.length - 1];
    lastopt.innerHTML = ajout2;
  }
  if (ajout3 === true) {
    let ajout3 = document.getElementById("check3").value;
    checkopt1.appendChild(document.createElement("option"));
    let lastopt = checkopt1[checkopt1.length - 1];
    lastopt.innerHTML = ajout3;
  }
  if (ajout4 === true) {
    let ajout4 = document.getElementById("check4").value;
    checkopt1.appendChild(document.createElement("option"));
    let lastopt = checkopt1[checkopt1.length - 1];
    lastopt.innerHTML = ajout4;
  }
}

function addchoice2() {
  let ajout = document.getElementById("check").checked;
  let ajout2 = document.getElementById("check2").checked;
  let ajout3 = document.getElementById("check3").checked;
  let ajout4 = document.getElementById("check4").checked;

  if (ajout === true) {
    let ajout = document.getElementById("check").value;
    checkopt2.appendChild(document.createElement("Text"));
    checkopt2.innerHTML += ajout;
  }
  if (ajout2 === true) {
    let ajout2 = document.getElementById("check2").value;
    checkopt2.appendChild(document.createElement("Text"));
    checkopt2.innerHTML += ajout2;
  }
  if (ajout3 === true) {
    let ajout3 = document.getElementById("check3").value;

    checkopt2.appendChild(document.createElement("Text"));
    checkopt2.innerHTML += ajout3;
  }
  if (ajout4 === true) {
    let ajout4 = document.getElementById("check4").value;
    checkopt2.appendChild(document.createElement("Text"));
    checkopt2.innerHTML += ajout4;
  }
}
