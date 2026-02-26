
/* =====================================
   SEQUENCEUR JAVASCRIPT
   Mutation ADN + Historique
===================================== */


/* ---------- Bases ADN ---------- */

const bases = ['A','T','G','C'];


/* ---------- Mutation ADN ---------- */

let mutationButton =
document.getElementById("mutationButton");


mutationButton.addEventListener("click",function(){


/* Récupérer la séquence */

let input =
document.getElementById("dnaInput");

let sequence =
input.value;


/* Vérifier si vide */

if(sequence.length == 0){

alert("Aucune séquence");

return;

}


/* Choisir position aléatoire */

let position =
Math.floor(Math.random()*sequence.length);


/* Choisir base aléatoire */

let newBase =
bases[Math.floor(Math.random()*4)];


/* Transformer en tableau */

let array =
sequence.split("");


/* Remplacer */

array[position] =
newBase;


/* Nouvelle séquence */

let newSequence =
array.join("");


/* Mettre dans le champ */

input.value =
newSequence;


/* Ajouter historique */

addHistory(newSequence);


});



/* ---------- Historique ---------- */

function addHistory(sequence){

let list =
document.getElementById("historyList");


let li =
document.createElement("li");


li.innerText =
sequence;


list.appendChild(li);


}