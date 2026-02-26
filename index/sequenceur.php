<?php

/* =====================================
   LABGENIUS - SEQUENCEUR ADN
   Page d'édition des séquences ADN
   HTML + PHP mélangés
===================================== */


/* ---------- Constantes ADN ---------- */

// Bases ADN autorisées

$VALID_BASES = ['A','T','G','C'];


/* ---------- Séquence par défaut ---------- */

$sequence = "ATGCGTAA";


/* ---------- Historique ---------- */

$history = [];


/* ---------- Fonction validation ADN ---------- */

function validateDNA($seq){

    // Expression régulière : seulement A T G C

    return preg_match("/^[ATGC]+$/",$seq);

}

?>


<!DOCTYPE html>

<html lang="fr">

<head>

<meta charset="UTF-8">

<title>Séquenceur ADN</title>

<link rel="stylesheet" href="css/style.css">

<script defer src="js/sequenceur.js"></script>

</head>


<body>



<!-- HEADER -->

<header>

<h1>LabGenius - Séquenceur ADN</h1>

<nav>

<a href="index.php">Dashboard</a>

<a href="sequenceur.php">Séquenceur</a>

<a href="synthese.php">Synthèse</a>

<a href="bibliotheque.php">Bibliothèque</a>

<a href="admin.php">Admin</a>

</nav>

</header>



<!-- SECTION PRINCIPALE -->

<section class="dashboard">

<h2>Éditeur de Génome</h2>


<!-- Champ ADN -->

<form method="POST">

<label>Séquence ADN :</label>

<br><br>

<input
type="text"
name="sequence"
id="dnaInput"
value="<?php echo $sequence; ?>"
>

<br><br>


<!-- Boutons -->

<button type="button" id="mutationButton">

Mutation aléatoire

</button>


<button type="submit">

Valider Séquence

</button>


</form>



<!-- Validation PHP -->

<?php

if(isset($_POST['sequence'])){

$userSequence = $_POST['sequence'];


/* Validation ADN */

if(validateDNA($userSequence)){

echo "<p>Séquence valide</p>";

}else{

echo "<p style='color:red'>Erreur : ADN invalide</p>";

}

}

?>



<!-- Historique -->

<h3>Historique</h3>

<ul id="historyList">

</ul>


</section>



<footer>

<p>LabGenius 2026</p>

</footer>


</body>

</html>