<?php

/* =====================================
   LABGENIUS - MACHINE DE SYNTHESE ADN
   Simulation du processus de synthèse
   HTML + PHP mélangés
===================================== */


/* ---------- Constantes ADN ---------- */

$VALID_BASES = ['A','T','G','C'];


/* ---------- Fonction validation ADN ---------- */

function validateDNA($sequence){

    // Vérifie si la séquence contient seulement A T G C

    return preg_match("/^[ATGC]+$/",$sequence);

}


/* ---------- Variables résultat ---------- */

$resultMessage = "";
$resultColor = "black";


/* ---------- Si formulaire envoyé ---------- */

if(isset($_POST['dna'])){

$dna = $_POST['dna'];


/* Validation ADN */

if(validateDNA($dna)){

/* Calcul complexité
Plus la séquence est longue plus c'est difficile */

$length = strlen($dna);


/* Taux réussite */

$successRate =
max(30, 100 - $length);


/* Résultat aléatoire */

$random =
rand(1,100);


/* Succès ou échec */

if($random <= $successRate){

$resultMessage =
"Synthèse réussie";

$resultColor = "green";

}else{

$resultMessage =
"Echec de la synthèse";

$resultColor = "red";

}

}else{

$resultMessage =
"Séquence ADN invalide";

$resultColor = "red";

}

}

?>



<!DOCTYPE html>

<html lang="fr">

<head>

<meta charset="UTF-8">

<title>Machine de Synthèse</title>

<link rel="stylesheet" href="css/style.css">

<script defer src="js/synthese.js"></script>

</head>


<body>


<!-- HEADER -->

<header>

<h1>LabGenius - Machine de Synthèse</h1>

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

<h2>Machine de Synthèse ADN</h2>



<!-- Formulaire ADN -->

<form method="POST">

<label>Entrer une séquence ADN :</label>

<br><br>

<input
type="text"
name="dna"
id="dnaField"
placeholder="ATGCGTAA"
>

<br><br>


<button type="submit" id="startButton">

Lancer Synthèse

</button>

</form>



<!-- Barre progression -->

<div class="progressContainer">

<div class="progressBar" id="progressBar">

</div>

</div>



<!-- Résultat PHP -->

<p style="color:<?php echo $resultColor; ?>">

<?php echo $resultMessage; ?>

</p>



</section>



<footer>

<p>LabGenius 2026</p>

</footer>


</body>

</html>