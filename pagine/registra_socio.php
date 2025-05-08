<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('../db/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $anno = date("Y");

    $sql = "INSERT INTO soci (nome, cognome, email, anno_iscrizione, ultima_quota_versata, ruolo)
            VALUES ('$nome', '$cognome', '$email', $anno, $anno, 'Regolare')";

    if ($conn->query($sql) === TRUE) {
        echo "OTTIMO! Socio registrato con successo!";
    } else {
        echo "MH Errore: " . $conn->error;
    }

    $conn->close();
}
?>

<h2>Registra nuovo socio</h2>
<form method="post">
    Nome: <input type="text" name="nome" required><br>
    Cognome: <input type="text" name="cognome" required><br>
    Email: <input type="email" name="email" required><br>
    <input type="submit" value="Registra">
</form>
