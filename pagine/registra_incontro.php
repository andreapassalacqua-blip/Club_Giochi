<?php
include('../db/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];
    $partecipanti = $_POST['partecipanti']; // Array
    $vincitori = $_POST['vincitori'];       // Array

    $conn->query("INSERT INTO incontri (data) VALUES ('$data')");
    $id_incontro = $conn->insert_id;

    foreach ($partecipanti as $id_socio) {
        $conn->query("INSERT INTO partecipazioni (id_incontro, id_socio) VALUES ($id_incontro, $id_socio)");
    }

    foreach ($vincitori as $id_socio) {
        $conn->query("INSERT INTO vittorie (id_incontro, id_socio) VALUES ($id_incontro, $id_socio)");
    }

    echo "✅ Incontro registrato con successo.";
}
?>

<h2>Registra un incontro</h2>
<form method="post">
    Data incontro: <input type="date" name="data" required><br><br>
    Partecipanti (ID separati da virgola): <input type="text" name="partecipanti[]"><br>
    Vincitori (ID separati da virgola): <input type="text" name="vincitori[]"><br>
    <input type="submit" value="Registra">
</form>
