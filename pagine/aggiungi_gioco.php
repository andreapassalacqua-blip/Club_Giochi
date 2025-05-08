<?php
include('../db/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titolo = $_POST['titolo'];
    $categoria = $_POST['categoria'];
    $data_donazione = $_POST['data_donazione'];
    $id_donatore = $_POST['id_donatore'];

    // Verifica se esistono già 3 copie
    $check = $conn->query("SELECT COUNT(*) as copie FROM giochi WHERE titolo = '$titolo'");
    $copie = $check->fetch_assoc()['copie'];

    if ($copie < 3) {
        $sql = "INSERT INTO giochi (titolo, categoria, data_donazione, id_donatore)
                VALUES ('$titolo', '$categoria', '$data_donazione', " . ($id_donatore ? "'$id_donatore'" : "NULL") . ")";

        if ($conn->query($sql) === TRUE) {
            echo "✅ Gioco aggiunto con successo!";
        } else {
            echo "❌ Errore: " . $conn->error;
        }
    } else {
        echo "❌ Sono già presenti 3 copie di questo gioco.";
    }

    $conn->close();
}
?>

<h2>Aggiungi un nuovo gioco</h2>
<form method="post">
    Titolo: <input type="text" name="titolo" required><br>
    Categoria: <input type="text" name="categoria"><br>
    Data donazione: <input type="date" name="data_donazione" required><br>
    ID Donatore (facoltativo): <input type="number" name="id_donatore"><br>
    <input type="submit" value="Aggiungi">
</form>
