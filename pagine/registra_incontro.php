<?php
// Includi il file di connessione al database
include('../config/db.php');

// Verifica se il modulo è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Estrai i dati dal modulo
    $data_incontro = $_POST['data_incontro'];
    $partecipanti = $_POST['partecipanti'];  // Un array di ID soci
    $vincitori = $_POST['vincitori'];        // Un array di ID soci

    // Prepara e esegui la query per registrare l'incontro nel database
    $query = "INSERT INTO incontri (data_incontro, partecipanti, vincitori) VALUES ('$data_incontro', '$partecipanti', '$vincitori')";
    $result = mysqli_query($conn, $query);

    // Verifica se la query è stata eseguita correttamente
    if ($result) {
        echo "Incontro registrato con successo!";
    } else {
        echo "Errore nel registrare l'incontro: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione Incontro</title>
    <link rel="stylesheet" href="../stile.css">
</head>
<body>
    <h1>Registrazione Incontro</h1>
    <form method="POST" action="">
        <label for="data_incontro">Data Incontro:</label><br>
        <input type="date" id="data_incontro" name="data_incontro" required><br><br>

        <label for="partecipanti">Partecipanti (separati da virgola):</label><br>
        <input type="text" id="partecipanti" name="partecipanti" required><br><br>

        <label for="vincitori">Vincitori (separati da virgola):</label><br>
        <input type="text" id="vincitori" name="vincitori" required><br><br>

        <input type="submit" value="Registra Incontro">
    </form>
</body>
</html>
