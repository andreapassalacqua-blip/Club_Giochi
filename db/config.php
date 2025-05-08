<?php
$host = "localhost";
$user = "root"; // Cambia se hai un utente diverso
$password = ""; // Inserisci la tua password se esiste
$dbname = "club_giochi";

// Connessione al database
$conn = new mysqli($host, $user, $password, $dbname);

// Verifica connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>
