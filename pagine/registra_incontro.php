<?php
//includo il file di connessione al database
include('../config/db.php'); 

//verifico se il modulo è stato inviato tramite il metodo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    //estraggo i dati inviati dal modulo
    //data_incontro è la data in cui si è svolto l'incontro
    //partecipanti è un array contenente gli ID dei soci che hanno partecipato all'incontro
    //vincitori è un array contenente gli ID dei soci che hanno vinto l'incontro
    $data_incontro = $_POST['data_incontro'];
    $partecipanti = $_POST['partecipanti']; //array di ID soci
    $vincitori = $_POST['vincitori']; //array di ID soci

    //preparo la query SQL per inserire i dati dell'incontro nella tabella 'incontri'
    $query = "INSERT INTO incontri (data_incontro, partecipanti, vincitori) VALUES ('$data_incontro', '$partecipanti', '$vincitori')";

    //eseguo la query
    $result = mysqli_query($conn, $query);

    //verifico se la query è stata eseguita correttamente
    //se la query è andata a buon fine, mostro un messaggio di successo
    if ($result) {
        echo "Incontro registrato con successo!"; 
    } else {
        //se c'è un errore nell'esecuzione della query, mostro l'errore
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
    <!--collego il foglio di stile per la formattazione della pagina-->
    <link rel="stylesheet" href="../stile.css">
</head>
<body>
    <h1>Registrazione Incontro</h1> 
    <!--titolo principale della pagina-->

    <form method="POST" action="">
        <!--form che invia i dati al server utilizzando il metodo POST-->
        
        <label for="data_incontro">Data Incontro:</label><br>
        <input type="date" id="data_incontro" name="data_incontro" required><br><br>
        <!--campo di input per la data dell'incontro-->
        
        <label for="partecipanti">Partecipanti (separati da virgola):</label><br>
        <input type="text" id="partecipanti" name="partecipanti" required><br><br>
        <!--campo di input per gli ID dei partecipanti separati da virgola-->
        
        <label for="vincitori">Vincitori (separati da virgola):</label><br>
        <input type="text" id="vincitori" name="vincitori" required><br><br>
        <!--campo di input per gli ID dei vincitori separati da virgola-->

        <input type="submit" value="Registra Incontro">
        <!--pulsante per inviare il modulo-->
    </form>
</body>
</html>
