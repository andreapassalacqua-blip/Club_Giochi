<?php
//gestione_curatore.php

//includo il file di configurazione che contiene la connessione al database
include('../config/db.php'); 

//avvio la sessione per poter accedere ai dati dell'utente che ha effettuato il login
session_start(); 

//verifico se l'utente ha il ruolo di 'curatore', che è il ruolo richiesto per accedere a questa sezione
//se l'utente non ha questo ruolo, mostro un messaggio di errore e interrompo l'esecuzione della pagina
if ($_SESSION['ruolo'] !== 'Curatore') { 
    echo "Accesso negato. Devi essere un curatore per accedere a questa sezione."; //messaggio di errore
    exit; //interrompe il flusso di esecuzione se l'utente non è un curatore
}

//questa parte del codice è dedicata alla gestione dei giochi, dei prestiti e delle restituzioni
//qui posso aggiungere funzionalità per la gestione dei giochi (come aggiungere, modificare, eliminare giochi),
//dei prestiti (visualizzare i prestiti in corso, registrare nuovi prestiti, ecc.), e delle restituzioni (gestire la restituzione dei giochi).
//ad esempio, in questa sezione potrei aggiungere query SQL per recuperare o modificare i dati dei giochi o dei prestiti nel database.
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gestione Curatore</title> 
    <!--titolo della pagina che apparirà sulla scheda del browser-->
    <link rel="stylesheet" href="../style.css"> 
    <!--collego il foglio di stile per applicare la formattazione alla pagina-->
</head>
<body>
    <h1>Gestione Curatore</h1> 
    <!--questo è il titolo principale della pagina che indica che si tratta della sezione per il curatore-->
    
    <h2>Gestione Giochi</h2>
    <!--sottotitolo per la sezione di gestione dei giochi-->
    <!--qui posso inserire delle opzioni per aggiungere, modificare o eliminare giochi nel sistema-->
    
    <h2>Gestione Prestiti</h2>
    <!--sottotitolo per la sezione di gestione dei prestiti-->
    <!--in questa sezione il curatore può visualizzare chi ha preso in prestito un gioco e altre informazioni sui prestiti-->
    
    <h2>Gestione Restituzioni</h2>
    <!--sottotitolo per la sezione di gestione delle restituzioni-->
    <!--qui il curatore può gestire le restituzioni dei giochi da parte degli utenti-->
</body>
</html>
