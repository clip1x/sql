<?php
// Connexion à la base de données (à adapter avec vos propres paramètres)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";  // Assurez-vous que la base de données existe

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Requête SQL avec faille SQL (pas de préparation ou d'échappement des entrées)
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";

    // Exécution de la requête
    $result = $conn->query($sql);

    // Vérification du résultat
    if ($result->num_rows > 0) {
        // L'utilisateur existe et est authentifié
        echo "Bienvenue, " . $user;
    } else {
        // Identifiants incorrects
        echo "Identifiants incorrects!";
    }
}

// Fermer la connexion
$conn->close();
?>