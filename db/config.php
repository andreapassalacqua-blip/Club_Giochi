<?php
// Definiamo i dettagli per la connessione al database
$servername = "localhost"; // Indica l'host del database. In questo caso è il server locale.
$username = "root";        // Definiamo l'username per accedere a MySQL. 'root' è l'username predefinito.
$password = "123";            // Qui possiamo inserire la password di accesso al database MySQL, vuota se non configurata.
$dbname = "club_giochi";   // Questo è il nome del database a cui ci vogliamo connettere, in questo caso "club_giochi".

// Crea una nuova connessione a MySQL con i parametri precedenti
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se la connessione al database è riuscita
if ($conn->connect_error) {  // Se c'è un errore di connessione
    // Se la connessione fallisce, interrompi il programma e mostra il messaggio d'errore
    die("Connessione fallita: " . $conn->connect_error); 
    // La funzione die() interrompe l'esecuzione del codice, evitando che il programma continui senza la connessione al database
}
?>
