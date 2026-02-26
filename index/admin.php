<?php
/* =====================================
   LABGENIUS - PAGE ADMIN
   Gestion des séquences ADN
   PHP + HTML + Sessions
===================================== */

/* ---------- Démarrer la session ---------- */
session_start();

/* ---------- Vérification si l'utilisateur est connecté ---------- */
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

/* ---------- Variables pour gérer les séquences ---------- */
$sequences = [
    ["name" => "Gène Fluorescent", "sequence" => "ATGCGTAA"],
    ["name" => "Résistance Antibiotique", "sequence" => "TTGACGTA"],
    ["name" => "Gène Mutant", "sequence" => "CGTATGCA"]
];

/* ---------- Message pour feedback ---------- */
$message = "";

/* ---------- Ajouter une séquence ---------- */
if(isset($_POST['action']) && $_POST['action'] === "add"){
    $name = trim($_POST['name']);
    $sequence = strtoupper(trim($_POST['sequence']));
    
    if($name !== "" && preg_match("/^[ATGC]+$/", $sequence)){
        $sequences[] = ["name" => $name, "sequence" => $sequence];
        $message = "Séquence ajoutée avec succès !";
    } else {
        $message = "Erreur : Nom ou séquence invalide (seulement A,T,G,C)";
    }
}

/* ---------- Supprimer une séquence ---------- */
if(isset($_POST['action']) && $_POST['action'] === "delete"){
    $index = $_POST['index'];
    if(isset($sequences[$index])){
        array_splice($sequences, $index, 1);
        $message = "Séquence supprimée !";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Admin - LabGenius</title>
<link rel="stylesheet" href="css/style.css">
<script defer src="js/admin.js"></script>
</head>

<body>

<header>
<h1>LabGenius - Administration</h1>
<nav>
<a href="index.php">Dashboard</a>
<a href="sequenceur.php">Séquenceur</a>
<a href="synthese.php">Synthèse</a>
<a href="bibliotheque.php">Bibliothèque</a>
<a href="admin.php">Admin</a>
<a href="login.php">Déconnexion</a>
</nav>
</header>

<section class="dashboard">

<h2>Bonjour, <?php echo $_SESSION['username']; ?> (Admin)</h2>

<!-- Message PHP -->
<?php
if($message !== ""){
    echo "<p style='color:green;'>$message</p>";
}
?>

<h3>Ajouter une séquence ADN</h3>
<form id="addForm" method="POST">
<input type="hidden" name="action" value="add">
<label>Nom de la séquence :</label><br>
<input type="text" name="name" required><br><br>
<label>Séquence ADN :</label><br>
<input type="text" name="sequence" required placeholder="ATGCGTAA"><br><br>
<button type="submit">Ajouter</button>
</form>

<h3>Liste des séquences existantes</h3>
<ul id="sequenceList">
<?php foreach($sequences as $index => $seq): ?>
<li>
<strong><?php echo $seq['name']; ?></strong> : <?php echo $seq['sequence']; ?>
<button class="deleteBtn" data-index="<?php echo $index; ?>">Supprimer</button>
</li>
<?php endforeach; ?>
</ul>

</section>

<footer>
<p>LabGenius 2026</p>
</footer>

</body>
</html>