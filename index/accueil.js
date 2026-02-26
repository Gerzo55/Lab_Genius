
/* ===============================
   DASHBOARD JAVASCRIPT
   Gestion des interactions
================================ */


/* ---------- Bouton actualiser ---------- */

// On récupère le bouton

let button =
document.getElementById("refreshButton");


// On ajoute un événement click

button.addEventListener("click", function(){

// Message affiché

alert("Les données ont été actualisées");

});



/* ---------- Animation compteur ---------- */

// On récupère l'élément HTML

let sequenceDisplay =
document.getElementById("sequenceNumber");


// On récupère la valeur PHP affichée

let finalValue =
parseInt(sequenceDisplay.innerText);


// Valeur de départ

let counter = 0;


// Animation

let animation =
setInterval(function(){

counter++;

sequenceDisplay.innerText = counter;


// Arrêt animation

if(counter >= finalValue){

clearInterval(animation);

}

},100);