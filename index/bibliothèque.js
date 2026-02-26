/* =====================================
   BIBLIOTHEQUE JAVASCRIPT
   Charger séquences + favoris
===================================== */

// Récupération des listes

const sequenceList = document.getElementById("sequenceList");
const favoritesList = document.getElementById("favoritesList");

// Fonction pour charger séquence dans localStorage
function loadSequence(seq){
    localStorage.setItem("currentSequence", seq);
    alert("Séquence chargée dans l'éditeur : " + seq);
}

// Fonction pour ajouter un favori
function addFavorite(seq){
    // Récupérer favoris existants
    let favorites = JSON.parse(localStorage.getItem("favorites")) || [];
    if(!favorites.includes(seq)){
        favorites.push(seq);
        localStorage.setItem("favorites", JSON.stringify(favorites));
        renderFavorites();
    }
}

// Afficher les favoris
function renderFavorites(){
    let favorites = JSON.parse(localStorage.getItem("favorites")) || [];
    favoritesList.innerHTML = "";
    favorites.forEach(seq => {
        let li = document.createElement("li");
        li.innerText = seq;
        favoritesList.appendChild(li);
    });
}

// Écoute des boutons
sequenceList.addEventListener("click", function(e){
    if(e.target.classList.contains("loadBtn")){
        let seq = e.target.dataset.seq;
        loadSequence(seq);
    }
    if(e.target.classList.contains("favBtn")){
        let seq = e.target.dataset.seq;
        addFavorite(seq);
    }
});

// Initialiser favoris au chargement
renderFavorites();