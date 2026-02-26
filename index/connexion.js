/* =====================================
   LOGIN JAVASCRIPT
   Pré-validation formulaire
===================================== */

// Récupération du formulaire
const loginForm = document.querySelector("form");

// Écoute de l'événement submit
loginForm.addEventListener("submit", function(e) {
    
    // Récupérer les valeurs des champs
    const username = loginForm.username.value.trim();
    const password = loginForm.password.value.trim();
    
    // Vérifier si vide
    if(username === "" || password === ""){
        e.preventDefault(); // Empêche l'envoi du formulaire
        alert("Veuillez remplir tous les champs !");
        return false;
    }
});