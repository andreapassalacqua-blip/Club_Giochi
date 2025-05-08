<?php
// Includi il file di connessione al database
include('../config/db.php');

// Verifica se il modulo è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Estrai i dati dal modulo
    $nome_gioco = $_POST['nome_gioco'];
    $data_acquisto = $_POST['data_acquisto'];
    $socio_donatore = $_POST['socio_donatore'];

    // Prepara e esegui la query per aggiungere il gioco nel database
    $query = "INSERT INTO giochi (nome_gioco, data_acquisto, socio_donatore) VALUES ('$nome_gioco', '$data_acquisto', '$socio_donatore')";
    $result = mysqli_query($conn, $query);

    // Verifica se la query è stata eseguita correttamente
    if ($result) {
        echo "Gioco aggiunto con successo!";
    } else {
        echo "Errore nell'aggiunta del gioco: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiungi Gioco</title>
    <link rel="stylesheet" href="../stile.css">
</head>
<body>
    <h1>Aggiungi un Nuovo Gioco</h1>
    <form method="POST" action="">
        <label for="nome_gioco">Nome Gioco:</label><br>
        <input type="text" id="nome_gioco" name="nome_gioco" required><br><br>

        <label for="data_acquisto">Data di Acquisto:</label><br>
        <input type="date" id="data_acquisto" name="data_acquisto" required><br><br>

        <label for="socio_donatore">Socio Donatore (se applicabile):</label><br>
        <input type="text" id="socio_donatore" name="socio_donatore"><br><br>

        <input type="submit" value="Aggiungi Gioco">
    </form>
</body>
</html>
