/* =====================================
   ADMIN JAVASCRIPT
   Gestion dynamique suppression et ajout
===================================== */

// Supprimer une séquence dynamiquement
const sequenceList = document.getElementById("sequenceList");

// Écouter les boutons supprimer
sequenceList.addEventListener("click", function(e){
    if(e.target.classList.contains("deleteBtn")){
        const index = e.target.dataset.index;

        // Confirmation
        if(confirm("Voulez-vous vraiment supprimer cette séquence ?")){
            // Créer un formulaire dynamique pour POST
            const form = document.createElement("form");
            form.method = "POST";

            const actionInput = document.createElement("input");
            actionInput.type = "hidden";
            actionInput.name = "action";
            actionInput.value = "delete";

            const indexInput = document.createElement("input");
            indexInput.type = "hidden";
            indexInput.name = "index";
            indexInput.value = index;

            form.appendChild(actionInput);
            form.appendChild(indexInput);

            document.body.appendChild(form);
            form.submit();
        }
    }
});