<?php
//abilito la visualizzazione degli errori per facilitare il debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

//includo il file di connessione al database
include __DIR__ . '/../config/db.php';

//inizializzo variabili per i messaggi di errore o conferma
$error = "";
$success = "";

//verifico se il form è stato inviato con il metodo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //recupero i dati inviati tramite POST dal modulo
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $anno_quota = $_POST['anno_quota'];
    $ruolo = $_POST['ruolo'];

    //preparo la query SQL per inserire i dati nella tabella 'soci'
    $query = "INSERT INTO soci (nome, cognome, email, anno_quota, ruolo) 
              VALUES ('$nome', '$cognome', '$email', '$anno_quota', '$ruolo')";

    //eseguo la query
    //se la query è eseguita con successo, mostro un messaggio di conferma
    if (mysqli_query($conn, $query)) {
        $success = "Socio registrato con successo!";
    } else {
        //se c'è un errore nell'esecuzione della query, mostro l'errore
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
    <!--collego il foglio di stile CSS per la formattazione della pagina-->
    <link rel="stylesheet" href="../stile.css"> 
</head>
<body>

    <h2>Registra un nuovo socio</h2>

    <?php
    //mostro i messaggi di errore o successo se presenti
    if ($error) {
        echo "<div style='color: red;'>$error</div>";
    }
    if ($success) {
        echo "<div style='color: green;'>$success</div>";
    }
    ?>

    <!--modulo per inserire i dati del nuovo socio-->
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

    <!--link per tornare alla home page-->
    <a href="../index.php">Torna alla home</a>

</body>
</html>
