<?php
require_once "../config/database.php";
require_once "../config/auth.php";
securiser();

$db = new Database();
$conn = $db->connexion();

$id = $_GET['id'];
$req = $conn->prepare("SELECT * FROM produits WHERE id=?");
$req->execute([$id]);
$p = $req->fetch();

if (isset($_POST['modifier'])) {
    $sql = "UPDATE produits SET name=?, prix=?, quantite=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['name'],
        $_POST['prix'],
        $_POST['quantite'],
        $id
    ]);
    header("Location: liste.php");
}
?>
<link rel="stylesheet" href="../assets/css/style.css">
<form method="post">
    <input type="text" name="name" value="<?= $p['name'] ?>"><br>
    <input type="number" name="prix" value="<?= $p['prix'] ?>"><br>
    <input type="number" name="quantite" value="<?= $p['quantite'] ?>"><br>
    <button name="modifier">Modifier</button>
</form>