<?php
include('../db/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_prestito = $_POST['id_prestito'];
    $data_restituzione = date("Y-m-d");

    $sql = "UPDATE prestiti SET data_restituzione = '$data_restituzione' WHERE id = $id_prestito";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Restituzione registrata con successo.";
    } else {
        echo "❌ Errore: " . $conn->error;
    }

    $conn->close();
}
?>

<h2>Restituzione gioco</h2>
<form method="post">
    ID Prestito: <input type="number" name="id_prestito" required><br>
    <input type="submit" value="Registra Restituzione">
</form>
