<?php

/* ===============================
   LABGENIUS DASHBOARD
   Page Accueil / Tableau de Bord
   HTML + PHP mélangés
================================ */

/* ---------- Données simulées ---------- */

// Nom du laboratoire
$labName = "LabGenius Virtual Lab";

// Nombre total de séquences ADN
$totalSequences = 6;

// Nombre d'expériences en cours
$runningExperiments = 2;

// Tableau contenant les dernières séquences ADN
$recentSequences = [
    "ATGCGTAA",
    "TTGACGTA",
    "CGTATGCA",
    "GGATCCAA"
];

// Date actuelle
$currentDate = date("d/m/Y");

?>


<!DOCTYPE html>

<html lang="fr">

<head>

<meta charset="UTF-8">

<title>LabGenius Dashboard</title>

<!-- Feuille de style globale -->
<link rel="stylesheet" href="css/style.css">

<!-- Script JavaScript -->
<script defer src="js/dashboard.js"></script>

</head>


<body>



<!-- ===============================
HEADER
Contient le titre et le menu
================================ -->

<header>

<h1><?php echo $labName; ?></h1>

<nav>

<!-- Menu principal -->

<a href="index.php">Dashboard</a>

<a href="sequenceur.php">Séquenceur</a>

<a href="synthese.php">Synthèse</a>

<a href="bibliotheque.php">Bibliothèque</a>

<a href="admin.php">Admin</a>

</nav>

</header>



<!-- ===============================
SECTION DASHBOARD
Affiche les informations principales
================================ -->

<section class="dashboard">

<h2>Tableau de Bord</h2>

<!-- Affichage de la date -->

<p>

Date du jour :

<?php echo $currentDate; ?>

</p>



<!-- ===============================
CARTES STATISTIQUES
================================ -->

<div class="cards">



<!-- Carte nombre de séquences -->

<div class="card">

<h3>Nombre de Séquences ADN</h3>

<p id="sequenceNumber">

<?php echo $totalSequences; ?>

</p>

</div>



<!-- Carte expériences en cours -->

<div class="card">

<h3>Expériences en cours</h3>

<p>

<?php echo $runningExperiments; ?>

</p>

</div>


</div>



<!-- ===============================
LISTE DES SEQUENCES RECENTES
================================ -->

<h3>Séquences récentes</h3>

<ul>

<?php

/* Boucle PHP
   Permet d'afficher toutes les séquences */

foreach($recentSequences as $sequence){

echo "<li>$sequence</li>";

}

?>

</ul>



<!-- Bouton d'actualisation -->

<button id="refreshButton">

Actualiser les données

</button>


</section>



<!-- ===============================
FOOTER
================================ -->

<footer>

<p>

LabGenius © 2026

</p>

</footer>



</body>

</html>