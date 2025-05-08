<?php
// Includi il file di connessione al database
include('../config/db.php');

// Verifica se il modulo è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Estrai i dati dal modulo
    $id_gioco = $_POST['id_gioco'];
    $id_socio = $_POST['id_socio'];
    $data_prestito = $_POST['data_prestito'];

    // Prepara e esegui la query per aggiungere il prestito nel database
    $query = "INSERT INTO prestiti (id_gioco, id_socio, data_prestito) VALUES ('$id_gioco', '$id_socio', '$data_prestito')";
    $result = mysqli_query($conn, $query);

    // Verifica se la query è stata eseguita correttamente
    if ($result) {
        echo "Prestito registrato con successo!";
    } else {
        echo "Errore nel registrare il prestito: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestito Gioco</title>
    <link rel="stylesheet" href="../stile.css">
</head>
<body>
    <h1>Registrazione Prestito Gioco</h1>
    <form method="POST" action="">
        <label for="id_gioco">ID Gioco:</label><br>
        <input type="number" id="id_gioco" name="id_gioco" required><br><br>

        <label for="id_socio">ID Socio:</label><br>
        <input type="number" id="id_socio" name="id_socio" required><br><br>

        <label for="data_prestito">Data Prestito:</label><br>
        <input type="date" id="data_prestito" name="data_prestito" required><br><br>

        <input type="submit" value="Registra Prestito">
    </form>
</body>
</html>
