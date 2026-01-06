<?php
require_once "../config/database.php";
require_once "../config/auth.php";
securiser();

$db = new Database();
$conn = $db->connexion();

$id = $_GET['id'];

$check = $conn->prepare("SELECT COUNT(*) FROM produits WHERE categorie_id=?");
$check->execute([$id]);

if ($check->fetchColumn() == 0) {
    $stmt = $conn->prepare("DELETE FROM categories WHERE id=?");
    $stmt->execute([$id]);
}

header("Location: liste.php");