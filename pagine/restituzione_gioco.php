<?php
// Includi il file di connessione al database
include('../config/db.php');

// Verifica se il modulo è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Estrai i dati dal modulo
    $id_gioco = $_POST['id_gioco'];
    $id_socio = $_POST['id_socio'];
    $data_restituzione = $_POST['data_restituzione'];

    // Prepara e esegui la query per registrare la restituzione nel database
    $query = "INSERT INTO restituzioni (id_gioco, id_socio, data_restituzione) VALUES ('$id_gioco', '$id_socio', '$data_restituzione')";
    $result = mysqli_query($conn, $query);

    // Verifica se la query è stata eseguita correttamente
    if ($result) {
        echo "Restituzione registrata con successo!";
    } else {
        echo "Errore nel registrare la restituzione: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restituzione Gioco</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Restituzione Gioco</h1>
    <form method="POST" action="">
        <label for="id_gioco">ID Gioco:</label><br>
        <input type="number" id="id_gioco" name="id_gioco" required><br><br>

        <label for="id_socio">ID Socio:</label><br>
        <input type="number" id="id_socio" name="id_socio" required><br><br>

        <label for="data_restituzione">Data Restituzione:</label><br>
        <input type="date" id="data_restituzione" name="data_restituzione" required><br><br>

        <input type="submit" value="Registra Restituzione">
    </form>
</body>
</html>
