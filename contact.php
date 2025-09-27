<?php
// Configuration de la base de données
$host = "localhost";
$user = "root";     // Mets ton utilisateur MySQL
$pass = "";         // Mets ton mot de passe MySQL (si vide, laisse comme ça)
$db   = "Portfolio";

// Connexion à MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécuriser les données
    $name    = $conn->real_escape_string($_POST['name']);
    $email   = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // Requête SQL
    $sql = "INSERT INTO contact_messages (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Votre message a été envoyé avec succès !";
    } else {
        echo "❌ Erreur : " . $conn->error;
    }
}

$conn->close();
?>
