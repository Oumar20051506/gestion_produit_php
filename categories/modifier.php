<?php
require_once "../config/database.php";
require_once "../config/auth.php";
securiser();

$db = new Database();
$conn = $db->connexion();

$id = $_GET['id'];
$cat = $conn->prepare("SELECT * FROM categories WHERE id=?");
$cat->execute([$id]);
$data = $cat->fetch();

if (isset($_POST['modifier'])) {
    $sql = "UPDATE categories SET name=?, description=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['name'], $_POST['description'], $id]);
    header("Location: liste.php");
}
?>

<form method="post">
    <input type="text" name="name" value="<?= $data['name'] ?>"><br>
    <textarea name="description"><?= $data['description'] ?></textarea><br>
    <button name="modifier">Modifier</button>
</form>