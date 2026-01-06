<?php
require_once "../config/database.php";
require_once "../config/auth.php";
securiser();

$db = new Database();
$conn = $db->connexion();

if (isset($_POST['ajouter'])) {
    $sql = "INSERT INTO categories(name, description) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['name'], $_POST['description']]);
    header("Location: liste.php");
}
?>

<form method="post">
    <input type="text" name="name" placeholder="Nom catégorie" required><br>
    <textarea name="description" placeholder="Description"></textarea><br>
    <button name="ajouter">Ajouter</button>
</form>