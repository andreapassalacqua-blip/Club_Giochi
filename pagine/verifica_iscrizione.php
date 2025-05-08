<?php
//includo il file di connessione al database
include('../config/db.php');

//avvio la sessione per accedere ai dati della sessione dell'utente
session_start();

//recupero l'ID del socio dalla sessione (assumiamo che l'ID del socio sia già salvato nella sessione)
$socio_id = $_SESSION['socio_id']; //esempio, l'ID del socio dovrebbe essere assegnato al momento del login

//eseguo una query per recuperare i dati del socio dal database
$query = "SELECT nome, cognome, anno_quota FROM soci WHERE id = $socio_id";
$result = mysqli_query($conn, $query);

//recupero i dati del socio sotto forma di array associativo
$socio = mysqli_fetch_assoc($result);

//verifico se l'anno della quota è uguale o superiore all'anno corrente per determinare se il socio è in regola
$is_in_regola = $socio['anno_quota'] >= date("Y");
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Verifica Iscrizione</title>
    <!--collego il foglio di stile CSS per la formattazione della pagina-->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Verifica Iscrizione</h1>
    <!--mostro i dettagli del socio, inclusi nome, cognome e anno della quota-->
    <p>Caro <?php echo $socio['nome']; ?>, <?php echo $socio['cognome']; ?>, la tua iscrizione è valida fino all'anno <?php echo $socio['anno_quota']; ?>.</p>
    
    <!--se il socio è in regola, mostro il messaggio che conferma la validità dell'iscrizione-->
    <?php if ($is_in_regola): ?>
        <p>Sei in regola con l'iscrizione annuale!</p>
    <?php else: ?>
        <!--se il socio non è in regola, mostro il messaggio che invita a rinnovare l'iscrizione-->
        <p>Non sei in regola con l'iscrizione annuale. Si consiglia di rinnovarla.</p>
    <?php endif; ?>
</body>
</html>
