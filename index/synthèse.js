/* =====================================
   SYNTHESE JAVASCRIPT
   Animation barre progression
===================================== */


/* ---------- Bouton synthèse ---------- */

let button =
document.getElementById("startButton");


button.addEventListener("click", function(){


/* Récupérer barre */

let bar =
document.getElementById("progressBar");


/* Position initiale */

let width = 0;


/* Animation */

let interval =
setInterval(function(){

width++;

bar.style.width =
width + "%";


/* Arrêt */

if(width >= 100){

clearInterval(interval);

}

},30);


});