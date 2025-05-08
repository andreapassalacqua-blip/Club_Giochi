<?php
//giochi_donati.php

//includo il file di configurazione che contiene la connessione al database
include('../config/db.php'); 

//avvio la sessione per poter accedere ai dati dell'utente che ha effettuato il login
session_start(); 

//recupero l'id del socio dalla sessione
//questo id viene usato per filtrare i giochi donati dal socio specifico
$socio_id = $_SESSION['socio_id']; //ad esempio

//scrivo una query sql per recuperare il nome e la data di acquisto dei giochi donati dal socio
//la query unisce le tabelle 'giochi' e 'soci' sulla base dell'id del socio
$query = "SELECT g.nome, g.data_acquisto FROM giochi g JOIN soci s ON g.donato_da = s.id WHERE s.id = $socio_id";

//eseguo la query e salvo il risultato nella variabile $result
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Giochi Donati</title> 
    <!--titolo della pagina che appare sulla scheda del browser-->
    <link rel="stylesheet" href="../style.css"> 
    <!--collego il foglio di stile per la formattazione della pagina-->
</head>
<body>
    <h1>Giochi Donati</h1> 
    <!--titolo principale della pagina-->

    <table>
        <tr>
            <th>Nome Gioco</th>
            <th>Data Acquisto</th>
        </tr>
        <!--inizio un ciclo while che scorre tutti i giochi restituiti dalla query-->
        <?php while ($game = mysqli_fetch_assoc($result)): ?>
            <tr>
                <!--visualizzo il nome e la data di acquisto del gioco per ogni riga-->
                <td><?php echo $game['nome']; ?></td>
                <td><?php echo $game['data_acquisto']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
