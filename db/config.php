<?php
$servername = "localhost";
$username = "root";  // O il tuo username MySQL
$password = "";      // O la tua password MySQL
$dbname = "club_giochi";  // Il tuo nome di database

// Crea connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>
