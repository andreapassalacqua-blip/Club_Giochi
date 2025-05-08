<?php
//includo il file di connessione al database
include('../config/db.php');

//verifico se il modulo è stato inviato tramite il metodo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    //estraggo i dati inviati dal modulo
    //id_gioco è l'id del gioco che viene preso in prestito
    //id_socio è l'id del socio che prende in prestito il gioco
    //data_prestito è la data in cui il prestito viene effettuato
    $id_gioco = $_POST['id_gioco'];
    $id_socio = $_POST['id_socio'];
    $data_prestito = $_POST['data_prestito'];

    //preparo la query SQL per inserire i dati del prestito nella tabella 'prestiti'
    $query = "INSERT INTO prestiti (id_gioco, id_socio, data_prestito) VALUES ('$id_gioco', '$id_socio', '$data_prestito')";

    //eseguo la query
    $result = mysqli_query($conn, $query);

    //verifico se la query è stata eseguita correttamente
    //se la query è andata a buon fine, mostro un messaggio di successo
    if ($result) {
        echo "Prestito registrato con successo!"; 
    } else {
        //se c'è un errore nell'esecuzione della query, mostro l'errore
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
    <!--collego il foglio di stile per la formattazione della pagina-->
    <link rel="stylesheet" href="../stile.css">
</head>
<body>
    <h1>Registrazione Prestito Gioco</h1> 
    <!--titolo principale della pagina-->

    <form method="POST" action="">
        <!--form che invia i dati al server utilizzando il metodo POST-->
        
        <label for="id_gioco">ID Gioco:</label><br>
        <input type="number" id="id_gioco" name="id_gioco" required><br><br>
        <!--campo di input per l'id del gioco da prendere in prestito-->
        
        <label for="id_socio">ID Socio:</label><br>
        <input type="number" id="id_socio" name="id_socio" required><br><br>
        <!--campo di input per l'id del socio che prende in prestito il gioco-->
        
        <label for="data_prestito">Data Prestito:</label><br>
        <input type="date" id="data_prestito" name="data_prestito" required><br><br>
        <!--campo di input per la data del prestito-->

        <input type="submit" value="Registra Prestito">
        <!--pulsante per inviare il modulo-->
    </form>
</body>
</html>
