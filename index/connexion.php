<?php
/* =====================================
   LABGENIUS - PAGE CONNEXION SÉCURISÉE
   Utilisation de hash pour mots de passe
   et sessions pour reconnaitre l'utilisateur
===================================== */

/* ---------- Démarrer la session ---------- */
session_start();

/* ---------- Utilisateurs simulés ----------
   Chaque mot de passe est hashé avec password_hash()
   Exemple : password_hash("1234", PASSWORD_DEFAULT)
------------------------------------------- */

$users = [
    ["username" => "admin", "password" => '$2y$10$k7O4xY5pCG0iyLVy.lczFOLvclih0rZ09kUEvXvblcD1AmOK7/JnW'], // 1234
    ["username" => "user1", "password" => '$2y$10$gO7xF5rF8K6qZs9B1pF2v.k6cY/3A0sC1nYxVQ6VbzZlx5QkVUR5y'] // abcd
];

$message = "";

/* ---------- Traitement formulaire ---------- */
if(isset($_POST['username']) && isset($_POST['password'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $found = false;

    foreach($users as $user){
        if($user['username'] === $username){
            // Vérifier mot de passe hashé
            if(password_verify($password, $user['password'])){
                $found = true;
                $_SESSION['username'] = $username; // Stocker l'utilisateur en session
            }
            break;
        }
    }

    if($found){
        // Redirection vers Dashboard
        header("Location: index.php");
        exit;
    } else {
        $message = "Nom d'utilisateur ou mot de passe incorrect";
    }
}

/* ---------- Fonction pour vérifier si l'utilisateur est connecté ----------
   On peut utiliser cette fonction sur les autres pages
-------------------------------------------------------------------------- */
function isLoggedIn(){
    return isset($_SESSION['username']);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Connexion - LabGenius</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
<h1>LabGenius - Connexion</h1>
<nav>
<a href="index.php">Dashboard</a>
<a href="sequenceur.php">Séquenceur</a>
<a href="synthese.php">Synthèse</a>
<a href="bibliotheque.php">Bibliothèque</a>
<a href="admin.php">Admin</a>
</nav>
</header>

<section class="dashboard">

<h2>Connexion</h2>

<form method="POST">

<label>Nom d'utilisateur :</label><br>
<input type="text" name="username" required><br><br>

<label>Mot de passe :</label><br>
<input type="password" name="password" required><br><br>

<button type="submit">Se connecter</button>

</form>

<!-- Message d'erreur PHP -->
<?php
if($message !== ""){
    echo "<p style='color:red;'>$message</p>";
}
?>

</section>

<footer>
<p>LabGenius 2026</p>
</footer>

</body>
</html>