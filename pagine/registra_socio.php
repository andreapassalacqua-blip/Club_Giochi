<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Includi il file di connessione al database
include __DIR__ . '/../config/db.php';

// Variabili per eventuali messaggi di errore o conferma
$error = "";
$success = "";

// Verifica se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal form
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $anno_quota = $_POST['anno_quota'];
    $ruolo = $_POST['ruolo'];

    // Prepara la query SQL per inserire i dati
    $query = "INSERT INTO soci (nome, cognome, email, anno_quota, ruolo) 
              VALUES ('$nome', '$cognome', '$email', '$anno_quota', '$ruolo')";

    // Esegui la query
    if (mysqli_query($conn, $query)) {
        $success = "Socio registrato con successo!";
    } else {
        $error = "Errore nella registrazione del socio: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registra Socio</title>
    <link rel="stylesheet" href="../stile.css"> <!-- Aggiungi il tuo CSS -->
</head>
<body>

    <h2>Registra un nuovo socio</h2>

    <?php
    // Mostra i messaggi di errore o successo
    if ($error) {
        echo "<div style='color: red;'>$error</div>";
    }
    if ($success) {
        echo "<div style='color: green;'>$success</div>";
    }
    ?>

    <!-- Form per inserire i dati del socio -->
    <form method="POST" action="registra_socio.php">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="cognome">Cognome:</label><br>
        <input type="text" id="cognome" name="cognome" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="anno_quota">Anno della quota:</label><br>
        <input type="number" id="anno_quota" name="anno_quota" required><br><br>

        <label for="ruolo">Ruolo:</label><br>
        <select id="ruolo" name="ruolo">
            <option value="Regolare">Regolare</option>
            <option value="Donatore">Donatore</option>
            <option value="Curatore">Curatore</option>
        </select><br><br>

        <input type="submit" value="Registra Socio">
    </form>

    <a href="../index.php">Torna alla home</a>

</body>
</html>
