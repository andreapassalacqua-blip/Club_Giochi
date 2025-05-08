<?php
include('../db/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_gioco = $_POST['id_gioco'];
    $id_socio = $_POST['id_socio'];
    $data_prestito = date("Y-m-d");

    $sql = "INSERT INTO prestiti (id_gioco, id_socio, data_prestito) 
            VALUES ($id_gioco, $id_socio, '$data_prestito')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Prestito registrato con successo.";
    } else {
        echo "❌ Errore: " . $conn->error;
    }

    $conn->close();
}
?>

<h2>Prestito di un gioco</h2>
<form method="post">
    ID Gioco: <input type="number" name="id_gioco" required><br>
    ID Socio: <input type="number" name="id_socio" required><br>
    <input type="submit" value="Registra Prestito">
</form>
