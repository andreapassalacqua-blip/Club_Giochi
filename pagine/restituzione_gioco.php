<?php
//includo il file di connessione al database
include('../config/db.php');

//verifico se il modulo è stato inviato con il metodo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //estraggo i dati inviati tramite POST dal modulo
    $id_gioco = $_POST['id_gioco'];
    $id_socio = $_POST['id_socio'];
    $data_restituzione = $_POST['data_restituzione'];

    //preparo la query SQL per inserire la restituzione nel database
    $query = "INSERT INTO restituzioni (id_gioco, id_socio, data_restituzione) VALUES ('$id_gioco', '$id_socio', '$data_restituzione')";
    
    //eseguo la query
    $result = mysqli_query($conn, $query);

    //verifico se la query è stata eseguita correttamente
    if ($result) {
        //se la query ha avuto successo, mostro un messaggio di conferma
        echo "Restituzione registrata con successo!";
    } else {
        //se la query ha fallito, mostro un messaggio di errore
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
    <!--collego il foglio di stile CSS per la formattazione della pagina-->
    <link rel="stylesheet" href="../stile.css">
</head>
<body>
    <h1>Restituzione Gioco</h1>
    <!--form per registrare la restituzione del gioco-->
    <form method="POST" action="">
        <label for="id_gioco">ID Gioco:</label><br>
        <!--input per l'ID del gioco che si sta restituendo-->
        <input type="number" id="id_gioco" name="id_gioco" required><br><br>

        <label for="id_socio">ID Socio:</label><br>
        <!--input per l'ID del socio che restituisce il gioco-->
        <input type="number" id="id_socio" name="id_socio" required><br><br>

        <label for="data_restituzione">Data Restituzione:</label><br>
        <!--input per la data della restituzione-->
        <input type="date" id="data_restituzione" name="data_restituzione" required><br><br>

        <!--bottone per inviare il modulo e registrare la restituzione-->
        <input type="submit" value="Registra Restituzione">
    </form>
</body>
</html>
