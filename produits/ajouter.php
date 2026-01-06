<?php
require_once "../config/database.php";
require_once "../config/auth.php";
securiser();

$db = new Database();
$conn = $db->connexion();

if (isset($_POST['ajouter'])) {
    $sql = "INSERT INTO produits(name,prix,quantite)
            VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['name'],
        $_POST['prix'],
        $_POST['quantite']
    ]);
    header("Location: liste.php");
}
?>
<link rel="stylesheet" href="../assets/css/style.css">
<form method="post">
    <input type="text" name="name" placeholder="Nom"><br>
    <input type="number" name="prix" placeholder="Prix"><br>
    <input type="number" name="quantite" placeholder="Quantité"><br>
    <button name="ajouter">Ajouter</button>
</form>