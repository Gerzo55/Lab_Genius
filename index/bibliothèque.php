<?php

/* =====================================
   LABGENIUS - BIBLIOTHEQUE GENOMIQUE
   HTML + PHP mélangés
===================================== */


/* ---------- Séquences pré-enregistrées ---------- */

$sequencesLibrary = [
    ["name" => "Gène Fluorescent", "sequence" => "ATGCGTAA"],
    ["name" => "Résistance Antibiotique", "sequence" => "TTGACGTA"],
    ["name" => "Gène Mutant", "sequence" => "CGTATGCA"]
];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
<title>Bibliothèque Génomique</title>
<link rel="stylesheet" href="css/style.css">
<script defer src="js/bibliotheque.js"></script>
</head>

<body>

<header>
<h1>LabGenius - Bibliothèque Génomique</h1>
<nav>
<a href="index.php">Dashboard</a>
<a href="sequenceur.php">Séquenceur</a>
<a href="synthese.php">Synthèse</a>
<a href="bibliotheque.php">Bibliothèque</a>
<a href="admin.php">Admin</a>
</nav>
</header>

<section class="dashboard">

<h2>Liste des séquences</h2>

<ul id="sequenceList">

<?php
/* Boucle pour afficher les séquences avec boutons */
foreach($sequencesLibrary as $seq){
    echo "<li>";
    echo "<strong>".$seq['name']."</strong> : ".$seq['sequence'];
    echo " <button class='loadBtn' data-seq='".$seq['sequence']."'>Charger</button>";
    echo " <button class='favBtn' data-seq='".$seq['sequence']."'>Favori</button>";
    echo "</li>";
}
?>

</ul>

<h3>Mes favoris</h3>
<ul id="favoritesList">
<!-- Favoris ajoutés avec JS -->
</ul>

</section>

<footer>
<p>LabGenius 2026</p>
</footer>

</body>
</html>